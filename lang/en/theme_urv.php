<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Theme URV lang file.
 *
 * @package    theme_urv
 * @author     Jordi Pujol-Ahulló <jordi.pujol@urv.cat>
 * @copyright  2014 Servei de Recursos Educatius (http://www.sre.urv.cat)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['backgroundfixed'] = 'Background fixed';
$string['backgroundfixed_desc'] = 'Use this setting to fix the background image to the page.';
$string['backgroundimage'] = 'Background image';
$string['backgroundimage_desc'] = 'The image to display as a background of the site.';
$string['backgroundposition'] = 'Background position';
$string['backgroundposition_desc'] = 'The position of the background image.';
$string['backgroundpositioncenterbottom'] = 'Center bottom';
$string['backgroundpositioncentercenter'] = 'Center center';
$string['backgroundpositioncentertop'] = 'Center top';
$string['backgroundpositionleftbottom'] = 'Left bottom';
$string['backgroundpositionleftcenter'] = 'Left center';
$string['backgroundpositionlefttop'] = 'Left top';
$string['backgroundpositionrightbottom'] = 'Right bottom';
$string['backgroundpositionrightcenter'] = 'Right center';
$string['backgroundpositionrighttop'] = 'Right top';
$string['backgroundrepeat'] = 'Background repeat';
$string['backgroundrepeat_desc'] = 'Defines the way the background image will be repeated.';
$string['backgroundrepeatnorepeat'] = 'No repeat';
$string['backgroundrepeatrepeat'] = 'Repeat';
$string['backgroundrepeatrepeatx'] = 'Repeat horizontally';
$string['backgroundrepeatrepeaty'] = 'Repeat vertically';
$string['baselogo'] = 'Base logo';
$string['baselogodesc'] = 'Base logo image used when building customized logos. Text will be printed over it.';
$string['baselogotextcolor'] = 'Text colour';
$string['baselogotextcolordesc'] = 'The colour of the text printed over the base logo image.';
$string['baselogotextsize'] = 'Text size';
$string['baselogotextsizedesc'] = 'The size of the text printed over the base logo image.';
$string['bodybackground'] = 'Background colour';
$string['bodybackground_desc'] = 'The main colour to use for the background.';
$string['categoriesconfig'] = 'Customizing course category logos';
$string['categoriesconfigdesc'] = 'Below you will find the necessary elements to customize course category logos.'
    . ' Customized logos are built from a base logo image and a text written over it.'
    . ' The text will consist of the description of the category (if not empty) or its title.'
    . ' So you can customize the category logo by doing as follows:'
    . ' <ol>'
    . ' <li>Upload a base logo image.</li>'
    . ' <li>Customize colour, position and rotation for the text into that base image.</li>'
    . ' <li>Choose the course categories to apply a customized logo.'
    . ' To do so, we have to write down a short text into the category\'s description. Otherwise, it will use its title.</li>'
    . ' </ol>'
    . ' When you save these settings, all customized logos will be generated all at once whenever necessary.';
$string['categorieswithcustomizedlogo'] = 'Categories to customize';
$string['categorieswithcustomizedlogodesc'] = 'The list of course categories to use customized logos.'
    . ' It is highly recommended to only select one category when defining and customizing the category logos.'
    . ' Once customized logo is built correctly, then select all categories as necessary.';
$string['choosereadme'] = '<p>URV is a theme based on More.</p>';

$string['configtitle'] = 'URV';
$string['contentbackground'] = 'Main content background colour';
$string['contentbackground_desc'] = 'The background colour of the main content of the site, leave empty for none.';

$string['customcss'] = 'Custom CSS';
$string['customcssdesc'] = 'Whatever CSS rules you add to this textarea will be reflected in every page, making for easier customization of this theme.';

$string['fonttype'] = 'Font type';
$string['fonttypedesc'] = 'The font type specified will be used when customizing base logo image. If empty, default font type will be used.';
$string['footnote'] = 'Footnote';
$string['footnotedesc'] = 'Whatever you add to this textarea will be displayed in the footer throughout your Moodle site.';

$string['invert'] = 'Invert navbar';
$string['invertdesc'] = 'Swaps text and background for the navbar at the top of the page between black and white.';

$string['linkcolor'] = 'Link colour';
$string['linkcolor_desc'] = 'The colour of the links.';
$string['logo'] = 'Logo';
$string['logodesc'] = 'Please upload your custom logo here if you want to add it to the header.<br>
If the height of your logo is more than 75px add the following CSS rule to the Custom CSS box below.<br>
a.logo {height: 100px;} or whatever height in pixels the logo is.';

$string['pluginname'] = 'URV';

$string['region-side-post'] = 'Right';
$string['region-side-pre'] = 'Left';
$string['region-side-content'] = 'Center';
$string['rotation'] = 'Text rotation';
$string['rotationdesc'] = 'Text rotation used when writing onto the base logo image.';
$string['secondarybackground'] = 'Secondary background colour';
$string['secondarybackground_desc'] = 'The background colour of any secondary content, such as blocks.';
$string['textcolor'] = 'Text colour';
$string['textcolor_desc'] = 'The colour of the text.';

$string['xposition'] = 'X position';
$string['xpositiondesc'] = 'X position where the text will start writing onto the base logo image (from left to right).';
$string['yposition'] = 'Y position';
$string['ypositiondesc'] = 'Y position where the text will start writing onto the base logo image (from top to down).';

$string['categorylogos'] = 'Generated category logos';
$string['categorylogosdesc'] = 'All these category logos are automatically generated by this theme. <strong>We show them just for review.</strong>';
$string['nologos'] = 'There is no logo to show, since there is no course category selected.';
