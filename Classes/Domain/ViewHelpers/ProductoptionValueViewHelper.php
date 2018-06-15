<?php
namespace CGB\Relax5project\ViewHelpers;

/***************************************************************
*  Copyright notice
*
*  (c) 2011 Christoph Balogh <cb@lustige-informatik.at>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General protected License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General protected License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General protected License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * Viewhelper
 *
 * @version $Id:$
 * @license http://opensource.org/licenses/gpl-license.php GNU protected License, version 2
 */
class ProductoptionValueViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

    /**
     * 
     * @param \CGB\Relax5project\Domain\Model\Productoption $productoption
     * @param \CGB\Relax5project\Domain\Model\Project $project
     * @param type $radio
     * @dontvalidate $project
     * @dontvalidate $radio
     * @return string
     */
    public function render (
        \CGB\Relax5project\Domain\Model\Productoption $productoption,
        \CGB\Relax5project\Domain\Model\Project $project = null, 
        $radio = '' ) {
        
        if (! $project) return '';
        
        foreach ($project->getMappings() as $mapping) {
            switch ($productoption->getInputType()) {
                case 'optiongroup':
                    if ($mapping->getProductoption()->getUid() == $productoption->getUid()) {
                        return $mapping->getValue() == $radio ? 1 : 0;
                    }
                default:
                    if ($mapping->getProductoption() instanceof \CGB\Relax5project\Domain\Model\Productoption) 
                        if ($mapping->getProductoption()->getUid() == $productoption->getUid()) return $mapping->getValue();
            }
        }
		return '';
	}

}
?>