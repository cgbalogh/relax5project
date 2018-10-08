/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var resultEnableList = [
    [1,2,3,4,6],
    [2,3,4,5,6],
    [3,4,6],
    [3,4,6],
    [3,4,5,6],
    [2,3,4,5,6],
    [2,3,4,6],
    [2,3,4,6],
    [2,3,4,5,6],
    [2,3,4,5,6]
];

var result = null;
var chart = null;
var test = null;
var addProjectClickCounter = 0;

$(document).ready(function() {
    // initiate product details
    // activateLoadProducts();
    
    // check for touch device
    if (isTouchDevice()) {
        $('.rlx5-item-project-header .rlx5-buttons').show();
    }
    
    // loadProjects
    loadProjects();
    
    // activateProceedAppointment
    activateProceedAppointment();
    
    // activateReloadProject reloads the products without fetchiing the whole page
    activateReloadProject();
    
    
    activateMoveProject();
    
    
    activatePieChart();
    
    
    activateStateToggle ();
    
    
    activateAddProject();
    
    
    activateMap();
});


/**
 * 
 * @param {type} selector
 * @param {type} scope
 * @param {type} targetselector
 * @param {type} uri
 * @returns {undefined}
 */
function loadProjects() {
    uri = $('._loadProjects').attr('loadprojects');
    person = parseInt($('._focusobjectid[focus="person"]').attr('uid'));
    company = parseInt($('._focusobjectid[focus="company"]').attr('uid'));

    if (person > 0) {
      para = 'tx_relax5project_project[load]=1&tx_relax5project_project[person]=' + person;
    } else if (company > 0) {
      para = 'tx_relax5project_project[load]=1&tx_relax5project_project[company]=' + company;
    }
    

    if (typeof(uri) !== 'undefined') {
        $.post(
            uri, 
            para, 
            function(data) {
                $( '#rlx5-project-container' ).html(data);
                autoAjax();
                activateAddProject();
            });
    }
}

/**
 * activateLoadProducts
 * activates the products reload
 *
 * @param {string} selector
 * @param {string} scope
 * @returns {undefined}
 */
function activateLoadProducts ( selector, scope, targetselector, uri, prefix ) { 
	$( selector, scope).unbind('change').change(function(){
        $.post(uri, 'tx_relax5project_project[prefix]=' + prefix + '&tx_relax5project_project[productgroup]=' + $(this).val() + '&tx_relax5project_project[parent]=' + $(this).attr('parent'), function(data) {$( targetselector ).html(data);});
	});
}

function activateReloadProject () {
    $('.rlx5-project-reload').click(function(){
        uri = $(this).attr('href');
        $.blockUI({
            fadeIn: 50,
            fadeOut: 50,
            timeout: 15000,
            message: null,
            css: {border: 'none', width: 'auto', height: 'auto', margin: 'auto', zIndex: 99999 },
            overlayCSS: {background: 'url(typo3conf/ext/extbase_ajax/Resources/Public/Icons/spinner.svg) no-repeat center center #000', opacity: 0.3}
        });
        $.post(uri, null, function(data) {
            result = data;
            $('div.rlx5-info').html($('div.rlx5-info', result).html());
            $('div.rlx5-item-project-data').html($('div.rlx5-item-project-data', data).html())
            $('div.rlx5-item-project-product').html($('div.rlx5-item-project-product', data).html())
            $('div.rlx5-project-headerdata').html($('div.rlx5-project-headerdata', data).html())
            $('.rlx5-projectstates').html($('.rlx5-projectstates', data));
            autoAjax();
            activateProceedAppointment();
            
            $.unblockUI();
        });
    });
}

/**
 * activateLoadProductoptions
 * activates the products reload
 *
 * @param {string} selector
 * @param {string} scope
 * @returns {undefined}
 */
function activateLoadProductoptions ( selector, scope, targetselector, uri ) { 
	$( selector, scope).unbind('change').change(function(){
        $.post(uri, 'tx_relax5project_project[productgroup]=' + $('#project_productgroup_select').val() + '&tx_relax5project_project[product]=' + $('#project_product_select').val(), function(data) {$( targetselector ).html(data);});
	});
}

/**
 * checkProductoptions
 * 
 * @returns {undefined}
 */
function checkProductoptions () {
    var condition;
    var showConj;
    var showDisj;
    var conjList;
    var disjList;
    var show;
    
    $('[optionid]').each(function(){
        conditionString = $(this).attr('condition');
        myOptionUid = $(this).attr('optionid');
        
        disjList = conditionString.split("~");
        showDisj = false;
        for (var iDisj = 0; iDisj < disjList.length; iDisj++) {
            disjCondition = disjList[iDisj];
        
            conjList = disjCondition.split("+");
            showConj = true;

            for (var iConj = 0; iConj < conjList.length; iConj++) {
                condition = conjList[iConj];
                splitCondition = condition.split("=");
                optionUid = splitCondition[0];

                if (optionUid[0] == '!') {
                    optionUid = optionUid.substr(1);
                    negate = true;
                } else {
                    negate = false;
                }

                requiredValueList = splitCondition[1];
                if (typeof(requiredValueList) != 'undefined') {
                    requiredValueArray = requiredValueList.split('|');
                    var productgroupSelect = false;

                    for (k = 0; k < requiredValueArray.length; k++) {
                        if (requiredValueArray[k][0] == '#') {
                            compareOptionUid = requiredValueArray[k].substr(1);
                            requiredValueArray[k] = $('[optionid=' + compareOptionUid + ']').val()
                        } else if (requiredValueArray[k].substr(0,3) == 'pg:') {
                            compareProductgroupUid = requiredValueArray[k].substr(3);
                            productgroupSelect = productgroupSelect || (compareProductgroupUid == $('#projectProductgroup').val());
                        }
                    }

                    if (( requiredValueArray.indexOf($('[optionid=' + optionUid + ']').val()) >= 0 ) || productgroupSelect)  {
                        showConj = showConj && (! negate);
                    } else {
                        showConj = showConj && (negate);
                    }
                }
            }        
            
            showDisj = showDisj || showConj;
            
        }
        if (showDisj) {
            $('#productoption_wrap_' + myOptionUid).show();
            $('#productoption_wrap_' + myOptionUid).addClass('is_visible');
            $('#productoption_wrap_' + myOptionUid + ' *').removeAttr('disabled');
        } else {
            $('#productoption_wrap_' + myOptionUid + ' *').attr('disabled','disabled');
            $('#productoption_wrap_' + myOptionUid).removeClass('is_visible');
            $('#productoption_wrap_' + myOptionUid).hide();
        }
        $('.disabled').attr('disabled','disabled');
        
    });
}

/**
 * 
 * @param {type} selector
 * @param {type} onoff
 * @returns {unresolved}
 */
function activate(selector, onoff) {
    if (onoff) {
        enable(selector);
    } else {
        disable(selector);
    }
    return onoff;
}

/**
 * 
 * @param {type} selector
 * @returns {undefined}
 */
function enable(selector) {
    $(selector).removeAttr('disabled').removeClass('disabled');
}

/**
 * 
 * @param {type} selector
 * @returns {undefined}
 */
function disable(selector) {
    $(selector).attr('disabled',true).addClass('disabled');
}

/**
 * checkVisibleOptions
 * 
 * @param {type} ignoreList
 * @param {type} ignoreCheckboxes
 * @returns {allSet|Boolean}
 */
function checkVisibleOptions ( ignoreList, ignoreCheckboxes ) {
    if (typeof(ignoreList) == 'undefined') ignoreList = '';
    if (typeof(ignoreCheckboxes) == 'undefined') ignoreCheckboxes = false;
    ignoreListArray = ignoreList.split(',');
    
    allSet = true;
    $('.is_visible > [optionid]').each(function(){
        $el = $(this);
        
        optionid = $el.attr('optionid');
        
        if (ignoreListArray.indexOf(optionid) >= 0) {
            // element is on ignorelist
        } else {
            if (($el.attr('type') == 'checkbox')) {
                if (! ignoreCheckboxes) allSet = allSet && $el.prop('checked');
            } else {
                allSet = allSet && (($el.val() != '') && ($el.val() != '0'))
            }
        }
    });
    return allSet;
}

/**
 * checkOptions
 * 
 * @param {type} optionList
 * @returns {allSet|Boolean}
 */
function checkOptions ( optionList ) {
    if (typeof(optionList) == 'undefined') optionList = '';
    
    allSet = true;
    $(optionList).each(function(){
        $el = $(this);

        if (($el.attr('type') == 'checkbox')) {
            allSet = allSet && $el.prop('checked');
        } else {
            allSet = allSet && (($el.val() != '') && ($el.val() != '0'))
        }
        
    });
    return allSet;
}


/**
 * 
 * @param {type} project
 * @param {type} mode
 * @returns {.$@call;parseJSON.ok}
 */
function checkProjectAddress ( project, mode ) {
    return true;
    if ( (typeof(project) == 'undefined') || (project == 0) ) {
        project = $('#projectUid').attr('projectUid');
    }
    
    arguments = {
        format: 'json', 
        controller: 'Project', 
        action: 'checkAddress', 
        mode: mode, 
        project: project 
    };
    url= createUrl( dfaExtensionPrefix, arguments, 1102 );	
    response = $.ajax({
        url: url,
        async: false
    });
    var result = $.parseJSON(response.responseText);
    return result.ok;
}


/**
 * 
 * @returns {undefined}
 */
function activateProceedAppointment () {
    var buttons = [{
        text: 'Ok',
        click: function(){
            $('.rlx5-project-withappointment1').button("disable");
            $('.rlx5-project-withappointment2').button('disable');
            
            enableOnResult = $('[name=tx_relax5project_project\\[appointment\\]\\[result\\]]').filter(':checked').val();
            enableOnNextAction = $('[name=tx_relax5project_project\\[appointment\\]\\[nextAction\\]]').filter(':checked').val();
            
            $('[enableonresult='+enableOnResult+'][enableonnextaction='+enableOnNextAction+']').button('enable');
            $('[enableonresult=0][enableonnextaction='+enableOnNextAction+']').button('enable');
            $('[enableonresult='+enableOnResult+'][enableonnextaction=0]').button('enable');
            
            $('.rlx5-project-withappointment').button('disable');
            $('.rlx5-project-withappointment0').button('disable');
            
            // $('[enableonresult=0][enableonnextaction=0]').button('enable');
            
            $('.rlx5-appointment-resultgrid').dialog('close')
            
            if ( $('.rlx5-projectstate-button:not(.ui-button-disabled)').length == 1) {
                $('.rlx5-projectstate-button:not(.ui-button-disabled)').click();
            }
            if ( $('.rlx5-projectstate-button:not(.ui-button-disabled)').length == 0) {
                if (typeof(enableOnNextAction) != 'undefined') {
                    $('.rlx5-project-selectedappointment').removeClass('rlx5-project-selectedappointment');
                    modalMessageInvoke("Warnung", "Es gibt keine Aktion, die mit diesem Ergebnis verbunden ist!", "Ok");
                }
            }
        }
    }];
    
    $('[name=tx_relax5project_project\\[appointment\\]\\[nextAction\\]]').prop('disabled',true);
    $('[name=tx_relax5project_project\\[appointment\\]\\[nextAction\\]]').next('label').addClass('disabled');

    // this will be called if appointment tr is clicked
    // $('[name=tx_relax5project_project\\[appointment\\]\\[checkappointment\\]]').closest('tr').find('td').click(function(){

    $('[name=tx_relax5project_project\\[appointment\\]\\[checkappointment\\]]').closest('tr').find('td').on('click touch', function(){        
        if ($(this).closest('tr').hasClass('rlx5-project-selectedappointment')) {
            // appointment has been selected before
            // unselect appointment and reset all values in result and nextAction
            $(this).closest('tr').removeClass('rlx5-project-selectedappointment');
            $(this).closest('tr').find('input[type=radio]').prop('checked', false);
            $('[name=tx_relax5project_project\\[appointment\\]\\[result\\]]').prop('checked', false);
            $('[name=tx_relax5project_project\\[appointment\\]\\[nextAction\\]]').prop('checked', false)
            
            $('[name=tx_relax5project_project\\[appointment\\]\\[nextAction\\]]').prop('disabled', true);
            $('[name=tx_relax5project_project\\[appointment\\]\\[nextAction\\]]').parent().find('label').addClass('disabled');
            
            $('[data-ui-disabled=1]').button('disable');
            $('.rlx5-project-withappointment').button('enable');
            $('.rlx5-project-withappointment0').button('enable');
            $('.rlx5-project-withappointment2').button('enable');
        } else {
            $('.rlx5-project-selectedappointment').removeClass('rlx5-project-selectedappointment');
            $(this).closest('tr').addClass('rlx5-project-selectedappointment');
            $(this).closest('tr').find('input[type=radio]').prop('checked', true);

            $('#postdata').data('value', $(this).closest('tr').attr('appointment'));

            $('#description').val($(this).closest('tr').attr('details'));
            $('[contenteditable=true]').html($(this).closest('tr').attr('details'));
            $('input[type=radio]', '.rlx5-appointment-resultgrid').prop('checked',false);
            $('.rlx5-appointment-resultgrid').dialog({buttons:buttons, minWidth:600});

            // hard coded enabling/disabling of result possibilities
            if ($(this).closest('tr').attr('appointmenttype')==1) {
                $('[resultelement=7],[resultelement=8],[resultelement=9]').hide();
            }
        }
    });

    // $('[name=tx_relax5project_project\\[appointment\\]\\[checkappointment\\]]').click(function(){
    //    $(this).closest('tr').addClass('rlx5-project-selectedappointment');
    //    $('.rlx5-appointment-result').dialog({buttons:buttons});
    // });

    $('[name=tx_relax5project_project\\[appointment\\]\\[result\\]]').change(function(){
        enableNextActionArray = resultEnableList[parseInt($(this).val())-1];
        
        $('[name=tx_relax5project_project\\[appointment\\]\\[nextAction\\]]').each(function(){resultEnabler('nextAction', $(this).val(), false);});
        for(i = 0; i < enableNextActionArray.length; i++) {
            resultEnabler('nextAction', enableNextActionArray[i], true);
        }
    });

    $('[name=tx_relax5project_project\\[appointment\\]\\[nextAction\\]]').change(function(){
        $(this).next().next('input,select').prop('disabled', false);
    });

    if ($('#_appointment').attr('appointment')) {
        $('tr[appointment='+ $('#_appointment').attr('appointment') +']').addClass('rlx5-project-selectedappointment')
    }

}

/**
 * 
 * @param {type} id
 * @param {type} value
 * @param {type} enable
 * @returns {undefined}
 */
function resultEnabler( id, value, enable ) {
    if (enable) {
        $('#' + id + '_' + value).prop('disabled', false);
        $('[for=' + id + '_' + value + ']').removeClass('disabled');
    } else {
        $('#' + id + '_' + value).prop('disabled', true);
        $('[for=' + id + '_' + value + ']').addClass('disabled');
    }
}


/**
 * 
 * @returns {undefined}
 */
function proceedAcquisition() {
    return;
    $('.dt-mainrow').click(function(){
        uri = $('._proceedAppointments').attr('proceedAppointments');
        id = $(this).attr('id').split('_')[1];
        $.post(uri, 'tx_relax5project_project[appointment]=' + id, function(data){
            $('#proceedAppointment').html(data);
            $('#proceedAppointment').dialog({width:'1200px'});
            activateProceedAppointment();
            autoAjax();
            $('[appointment=' + id + '] td').click();
        });
    });
}


/**
 * 
 * @param {type} data
 * @param {type} total
 * @param {type} text
 * @returns {undefined}
 */
function pieChart( data, total, text, container ) {
	chart = new CanvasJS.Chart(container,
	{
		title: {
			text: total + " " + text
		},
		legend: {
			maxWidth: 500,
			itemWidth: 240
		},
		data: [
		{
			type: "pie",
			showInLegend: true,
			legendText: "{y}: {indexLabel}",
			dataPoints: data,
            startAngle: 270,
            click: function(e) {
                test = e;
                dataPointClass = e.dataPoint.uid;
                if (typeof(dataPointClass) == "string") {
                    dataPointClass = dataPointClass.split('%').join('\\%');
                    // dataPointClass = dataPointClass.replace('%', '\\%');
                }
                var url = $('._listProjects_' + dataPointClass).attr('listProjects');

                win = window.open(url, '_blank');
                win.focus();
            },            
		}
        ]
    });
  	chart.render();
    
    $('#' + container).click(function(e){
        // var activePoints = chart.getElementsAtEvent(e);
        // => activePoints is an array of points on the canvas that are at the same position as the click event.
    });
}


/**
 * 
 * @param {type} data
 * @param {type} total
 * @param {type} text
 * @returns {undefined}
 */
function columnChart( data, total, text ) {
	chart = new CanvasJS.Chart("chartContainer2",
	{
		title: {
			text: total + " " + text
		},
		legend: {
			maxWidth: 500,
			itemWidth: 240
		},
		data: [
		{
			showInLegend: true,
			legendText: "{y} {indexLabel} ({uid})",
			dataPoints: data,
            click: function(e) {
                test = e;
                var url = $('._listProjects_' + e.dataPoint.uid).attr('listProjects');
                win = window.open(url, '_blank');
                win.focus();
            },            
		}
        ]
    });
  	chart.render();
    
    $('#chartContainer').click(function(e){
        // var activePoints = chart.getElementsAtEvent(e);
        // => activePoints is an array of points on the canvas that are at the same position as the click event.
    });
}

/**
 * 
 * @returns {undefined}
 */
function activatePieChart () {
    if (typeof(total) !== 'undefined') {
        pieChart ( data, total, text, 'chartContainer' );
        pieChart ( groupedData, groupedTotal, groupedText, 'groupedChartContainer' );
    }
    // columnChart ( data, total, text );
}

/**
 * 
 * @returns {undefined}
 */
function activateMoveProject() {
    $('.draggable').draggable(
        {
            revert: 'invalid'
        });
    $('.rlx5-relation-wrap').droppable(
      {
        hoverClass: 'ui-draggable-dragging', 
        drop: function(e, ui){
            uri = $('._moveProject').attr('moveproject');
            project = ui.draggable.attr('projectuid');
            person = $(this).attr('personuid');
            
            if (typeof(uri) !== 'undefined') {
                $.blockUI({message: ''});
                $.post(uri, 'tx_relax5project_project[project]=' + project + '&tx_relax5project_project[person]=' + person, function(data) {;});
                setTimeout(location.reload.bind(location), 500);
            }
        }
      });
}


function activateStateToggle ()  {
    $('#rlx5-project-statetoggle').button().click(function(){
        if ($(this).hasClass('rlx5-project-state-visible')) {
            $(this).removeClass('rlx5-project-state-visible');
            $('.rlx5-buttons-td:not(:has(>.rlx5-projectstate-button))').closest('tr').hide()
            $('.rlx5-state-metabutton-expand').show()
            $('.rlx5-state-metabutton-collapse').hide()
        } else {
            $(this).addClass('rlx5-project-state-visible');
            $('.rlx5-buttons-td:not(:has(>.rlx5-projectstate-button))').closest('tr').show()
            $('.rlx5-state-metabutton-expand').hide()
            $('.rlx5-state-metabutton-collapse').show()
        }
    });
    
    $('#rlx5-project-appointmenttoggle').button().click(function(){
        if ($(this).hasClass('rlx5-project-appointment-visible')) {
            $(this).removeClass('rlx5-project-appointment-visible');
            $('tr.rlx5-appointments-when0').fadeOut();
            $('.rlx5-appointment-metabutton-expand').show()
            $('.rlx5-appointment-metabutton-collapse').hide()
        } else {
            $(this).addClass('rlx5-project-appointment-visible');
            $('tr.rlx5-appointments-when0').fadeIn();
            $('.rlx5-appointment-metabutton-expand').hide()
            $('.rlx5-appointment-metabutton-collapse').show()
        }
    });
    
    if ($('data#feUserSettings').data('hide_states_without_actions')) {
        $('#rlx5-project-statetoggle').click();
    }
}

function activateAddProject() {
    if ($('[data-addproject]').data('addproject') == '1') {
        if (addProjectClickCounter <= 1) {
            $('.ui-button','.rlx5-project').click();
            addProjectClickCounter++;
        }
    }
}