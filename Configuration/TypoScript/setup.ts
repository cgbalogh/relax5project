
plugin.tx_relax5project_project {
    view {
        templateRootPaths.0 = EXT:relax5project/Resources/Private/Templates/
        templateRootPaths.1 = {$plugin.tx_relax5project_project.view.templateRootPath}
        partialRootPaths.0 = EXT:relax5project/Resources/Private/Partials/
        partialRootPaths.1 = {$plugin.tx_relax5project_project.view.partialRootPath}
        layoutRootPaths.0 = EXT:relax5project/Resources/Private/Layouts/
        layoutRootPaths.1 = {$plugin.tx_relax5project_project.view.layoutRootPath}
    }
    persistence {
        storagePid = {$plugin.tx_relax5project_project.persistence.storagePid}
        #recursive = 1
    }
    features {
        #skipDefaultArguments = 1
        # if set to 1, the enable fields are ignored in BE context
        ignoreAllEnableFieldsInBe = 0
        # Should be on by default, but can be disabled if all action in the plugin are uncached
        requireCHashArgumentForActionArguments = 1
    }
    mvc {
        #callDefaultActionIfActionCantBeResolved = 1
    }
}

plugin.tx_relax5project_dashboard {
    view {
        templateRootPaths.0 = EXT:relax5project/Resources/Private/Templates/
        templateRootPaths.1 = {$plugin.tx_relax5project_dashboard.view.templateRootPath}
        partialRootPaths.0 = EXT:relax5project/Resources/Private/Partials/
        partialRootPaths.1 = {$plugin.tx_relax5project_dashboard.view.partialRootPath}
        layoutRootPaths.0 = EXT:relax5project/Resources/Private/Layouts/
        layoutRootPaths.1 = {$plugin.tx_relax5project_dashboard.view.layoutRootPath}
    }
    persistence {
        storagePid = {$plugin.tx_relax5project_dashboard.persistence.storagePid}
        #recursive = 1
    }
    features {
        #skipDefaultArguments = 1
        # if set to 1, the enable fields are ignored in BE context
        ignoreAllEnableFieldsInBe = 0
        # Should be on by default, but can be disabled if all action in the plugin are uncached
        requireCHashArgumentForActionArguments = 1
    }
    mvc {
        #callDefaultActionIfActionCantBeResolved = 1
    }
}

plugin.tx_relax5project_mockup {
    view {
        templateRootPaths.0 = EXT:relax5project/Resources/Private/Templates/
        templateRootPaths.1 = {$plugin.tx_relax5project_mockup.view.templateRootPath}
        partialRootPaths.0 = EXT:relax5project/Resources/Private/Partials/
        partialRootPaths.1 = {$plugin.tx_relax5project_mockup.view.partialRootPath}
        layoutRootPaths.0 = EXT:relax5project/Resources/Private/Layouts/
        layoutRootPaths.1 = {$plugin.tx_relax5project_mockup.view.layoutRootPath}
    }
    persistence {
        storagePid = {$plugin.tx_relax5project_mockup.persistence.storagePid}
        #recursive = 1
    }
    features {
        #skipDefaultArguments = 1
        # if set to 1, the enable fields are ignored in BE context
        ignoreAllEnableFieldsInBe = 0
        # Should be on by default, but can be disabled if all action in the plugin are uncached
        requireCHashArgumentForActionArguments = 1
    }
    mvc {
        #callDefaultActionIfActionCantBeResolved = 1
    }
}

# these classes are only used in auto-generated templates
plugin.tx_relax5project._CSS_DEFAULT_STYLE (
    textarea.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    input.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    .tx-relax5project table {
        border-collapse:separate;
        border-spacing:10px;
    }

    .tx-relax5project table th {
        font-weight:bold;
    }

    .tx-relax5project table td {
        vertical-align:top;
    }

    .typo3-messages .message-error {
        color:red;
    }

    .typo3-messages .message-ok {
        color:green;
    }
)

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

page.includeCSS {
   relax5projectCss = EXT:relax5project/Resources/Public/Styles/relax5project.css
   relax5projectLess = EXT:relax5project/Resources/Public/Less/relax5project.less
}

page.includeJSFooter {
  relax5projectJs = EXT:relax5project/Resources/Public/Scripts/relax5project.js
  relax5projectJs.forceOnTop = 0

  canvasJs = https://canvasjs.com/assets/script/canvasjs.min.js
}

plugin.tx_relax5project_project {
  settings {
    personShowPid = {$plugin.tx_relax5core.settings.personShowPid}
    companyShowPid = {$plugin.tx_relax5core.settings.companyShowPid}
    projectShowPid = {$plugin.tx_relax5project_project.settings.projectShowPid}

    timeHorizonIntervalList = {$plugin.tx_relax5project_project.settings.timeHorizonIntervalList}
    timeHorizonFormat = {$plugin.tx_relax5project_project.settings.timeHorizonFormat}
    timeHorizonQuarters = {$plugin.tx_relax5project_project.settings.timeHorizonQuarters}
  }
}

plugin.tx_relax5project_dashboard {
  persistence {
    storagePid = {$plugin.tx_relax5project_project.persistence.storagePid}
  }

  settings {
    storagePid = {$plugin.tx_relax5project_project.persistence.storagePid}
    projectListShowPid = {$plugin.tx_relax5project_project.settings.projectListShowPid}
    altProjectListShowPid = {$plugin.tx_relax5project_project.settings.altProjectListShowPid}

    appointmentsPendingPid = {$plugin.tx_relax5project_project.settings.appointmentsPendingPid}
    personListPid = {$plugin.tx_relax5project_project.settings.personListPid}
    companyListPid = {$plugin.tx_relax5project_project.settings.companyListPid}
  }
}

plugin.tx_relax5project_mockup {
  persistence {
    storagePid = {$plugin.tx_relax5project_project.persistence.storagePid}
  }

  settings {
    storagePid = {$plugin.tx_relax5project_project.persistence.storagePid}
  }
}

plugin.tx_relax5project_print {
  persistence {
    storagePid = {$plugin.tx_relax5project_project.persistence.storagePid}
  }

  settings {
    storagePid = {$plugin.tx_relax5project_project.persistence.storagePid}
  }
}

plugin.tx_relax5project_xmlexport < plugin.tx_relax5project_print

plugin.tx_relax5project_project {
    features {
        # Should be on by default, but can be disabled if all action in the plugin are uncached
#        requireCHashArgumentForActionArguments = 0
    }
}

plugin.tx_relax5project_print {
    view {
        templateRootPaths.0 = EXT:relax5project/Resources/Private/Templates/
        templateRootPaths.1 = {$plugin.tx_relax5core_core.view.templateRootPath}
        partialRootPaths.0 = EXT:relax5project/Resources/Private/Partials/
        partialRootPaths.1 = {$plugin.tx_relax5core_core.view.partialRootPath}
        layoutRootPaths.0 = EXT:relax5project/Resources/Private/Layouts/
        layoutRootPaths.1 = {$plugin.tx_relax5core_core.view.layoutRootPath}
    }
}
config.tx_extbase.persistence.classes {
    CGB\Relax5core\Domain\Model\Appointment {
      mapping {
#        tableName = tx_relax5core_domain_model_appointment
         recordType = Tx_Relax5core_Appointment
      }
    }
}

xml = PAGE
xml {
  typeNum = 1102
  1 = TEXT
  1.value = <?xml version="1.0" encoding="UTF-8"?>
  10 =< tt_content.list.20.relax5project_xmlexport

  config {
    disableAllHeaderCode = 1
#    xmlprologue = xml_10
    additionalHeaders = Content-type:text/xml
    xhtml_cleaning = 0
    admPanel = 0
    debug = 0
  }
}

print < page
print {
  typeNum = 9997
  10 =< tt_content.list.20.relax5project_print

  includeCSS {
    printCss = EXT:relax5project/Resources/Public/Styles/relax5project_print.css
  }

  #includeJS < page.includeJS
  #includeJSFooter < page.includeJSFooter

  #headerData < page.headerData
}

