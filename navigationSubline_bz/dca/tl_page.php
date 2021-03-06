<?php

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2012 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Joe Ray Gregory @ borowiakziehe KG
 * @author     Joe Ray Gregory <jrgregory@borowiakziehe.de>
 * @package    Backend
 * @license    LGPL
 * @filesource
 */

$GLOBALS['TL_DCA']['tl_page']['list']['label']['label_callback'] = array('tl_navigationSubline', 'addSublineToLabel');


$GLOBALS['TL_DCA']['tl_page']['palettes']['regular'] = str_replace
(
	'title',
	'title,subLineBz',
	$GLOBALS['TL_DCA']['tl_page']['palettes']['regular']
);

$GLOBALS['TL_DCA']['tl_page']['palettes']['forward'] = str_replace
(
	'title',
	'title,subLineBz',
	$GLOBALS['TL_DCA']['tl_page']['palettes']['forward']
);

$GLOBALS['TL_DCA']['tl_page']['palettes']['redirect'] = str_replace
(
	'title',
	'title,subLineBz',
	$GLOBALS['TL_DCA']['tl_page']['palettes']['redirect']
);

$GLOBALS['TL_DCA']['tl_page']['fields']['subLineBz'] =  array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_page']['subLineBz'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>255, 'tl_class' => 'clr long'),
	'sql'                     => "varchar(255) NOT NULL default ''"
);

class tl_navigationSubline extends tl_page
{

    public function addSublineToLabel($row, $label, DataContainer $dc=null, $imageAttribute='', $blnReturnImage=false, $blnProtected=false)
    {

        if(!empty($row['subLineBz'])) {

            $label .= ' <span style="color:#b3b3b3;padding-left:3px">[' . $row['subLineBz'] . ']</span>';

        }

        return parent::addIcon($row, $label, $dc, $imageAttribute, $blnReturnImage, $blnProtected);

    }

}