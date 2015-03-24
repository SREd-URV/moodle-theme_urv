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

$string['backgroundfixed'] = 'Fons fixat';
$string['backgroundfixed_desc'] = 'Usa aquesta configuració per fixar la imatge de fons a la pàgina.';
$string['backgroundimage'] = 'Imatge de fons';
$string['backgroundimage_desc'] = 'La imatge que es mostrarà com a fons del lloc web.';
$string['backgroundposition'] = 'Posició al fons';
$string['backgroundposition_desc'] = 'La posició de la imatge de fons.';
$string['backgroundpositioncenterbottom'] = 'Centrat i a sota';
$string['backgroundpositioncentercenter'] = 'Centrat i al mig';
$string['backgroundpositioncentertop'] = 'Centrat i a dalt';
$string['backgroundpositionleftbottom'] = 'A l\'esquerra i a sota';
$string['backgroundpositionleftcenter'] = 'A l\'esquerra i al mig';
$string['backgroundpositionlefttop'] = 'Al\'esquerra i a dalt';
$string['backgroundpositionrightbottom'] = 'A la dreta i a sota';
$string['backgroundpositionrightcenter'] = 'A la dreta i al mig';
$string['backgroundpositionrighttop'] = 'A la dreta i a dalt';
$string['backgroundrepeat'] = 'Repetir el fons';
$string['backgroundrepeat_desc'] = 'Si actiu, es repetirà la imatge de fons.';
$string['backgroundrepeatnorepeat'] = 'Sense repetició';
$string['backgroundrepeatrepeat'] = 'Repetir';
$string['backgroundrepeatrepeatx'] = 'Repetir horitzontalment';
$string['backgroundrepeatrepeaty'] = 'Repetir verticalment';
$string['baselogo'] = 'Logo de base';
$string['baselogodesc'] = 'Imatge a emprar com a base per als logos de les categories. El text personalitzat s\'hi escriurà a sobre.';
$string['baselogotextcolor'] = 'Color del text';
$string['baselogotextcolordesc'] = 'Color del text que s\'imprimirà sobre la imatge base.';
$string['baselogotextsize'] = 'Mida del text';
$string['baselogotextsizedesc'] = 'Mida del text que s\'imprimirà sobre la imatge base.';
$string['bodybackground'] = 'Color de fons';
$string['bodybackground_desc'] = 'El color principal de fons.';
$string['categoriesconfig'] = 'Personalització dels logos de les categories de cursos';
$string['categoriesconfigdesc'] = 'A sota trobaràs els elements necessaris per personalitzar els logos de les categories de cursos.'
    . ' Els logos personalitzats es generen a partir d\'una imatge base i un text que s\'hi imprimeix a sobre.'
    . ' El text consisteix en la descripció de la categoria (si existeix) o bé el seu títol.'
    . ' Si un curs o apartat no apareix sota cap categoria amb personalització de logo, s\'emprarà el logo del tema.'
    . ' Per tant, per personalitzar els logos de les categories només cal fer el següent:'
    . ' <ol>'
    . ' <li>Pujar una imatge base per als logos.</li>'
    . ' <li>Personalitzar el color del text i la seva posició i rotació dins de la imatge base.</li>'
    . ' <li>Seleccionar les categories de cursos de les que volem veure un logo personalitzat.'
    . ' Per personalitzar el logo, hem d\'escriure un text breu a la descripció de la categoria. Altrament s\'usarà el seu títol.</li>'
    . ' </ol>'
    . ' Hem de tenir en compte que quan es guardi aquesta configuració es regeneraran TOTS els logos sempre que sigui necessari.';
$string['categorieswithcustomizedlogo'] = 'Categories a personalitzar';
$string['categorieswithcustomizedlogodesc'] = 'Aquest és el llistat de categories de cursos que tindran un logo personalitzat.'
    . ' És altament recomanable només seleccionar una sola categoria mentres es va definint el color, posició i rotació del text a imprimir-hi.'
    . ' Una vegada estigui ben definit, aleshores sí podrem seleccionar totes les categories desitjades.';
$string['choosereadme'] = '<p>URV és un tema basat en el More.</p>';

$string['configtitle'] = 'URV';
$string['contentbackground'] = 'Color de fons per la zona del contingut principal';
$string['contentbackground_desc'] = 'Color de fons per la zona del contingut principal del lloc. Deixa\'l buit per no aplicar-hi cap color.';

$string['customcss'] = 'CSS personalitzat';
$string['customcssdesc'] = 'Qualsevol regla CSS que hi incorporis es veruà aplicada a cada pàgina, personalitzant aquest tema';

$string['fonttype'] = 'Tipus de font';
$string['fonttypedesc'] = 'Pots indicar el tipus de font a emprar quan s\'imprimeixi el text sobre la imatge base.';
$string['footnote'] = 'Nota al peu de pàgina';
$string['footnotedesc'] = 'El que incorporis aquí es veruà al peu de pàgina a tota pàgina de Moodle';

$string['invert'] = 'Invertir la barra de navegació';
$string['invertdesc'] = 'Intercanvia el color text i fons de la barra de navegació de dalt de la pàgina entre blanc i negre.';

$string['linkcolor'] = 'Color dels enllaços';
$string['linkcolor_desc'] = 'El color dels enllaços.';
$string['logo'] = 'Logo';
$string['logodesc'] = 'Si us plau, puja el logo personalitzat aquí si vols afegir-lo a la capçalera.<br>
Si l\'altura del teu logo és més de 75px afegeix regles CSS al "CSS personalitzat" a sota.<br>
a.logo {height: 100px;} o qualsevol altra altura que tingui la imatge.';

$string['pluginname'] = 'URV';

$string['region-side-post'] = 'Dreta';
$string['region-side-pre'] = 'Esquerra';
$string['region-side-content'] = 'Centrat';
$string['rotation'] = 'Rotació del text';
$string['rotationdesc'] = 'Aquesta és la rotació del text (en grau) quan s\'imprimeixi sobre la imatge base.';
$string['secondarybackground'] = 'Color de fons secundari';
$string['secondarybackground_desc'] = 'El color de fons de qualsevol contingut secundari, com ara blocs.';
$string['textcolor'] = 'Color de text';
$string['textcolor_desc'] = 'El color del text.';

$string['xposition'] = 'Posició X';
$string['xpositiondesc'] = 'Posició a l\'eix X on el text començarà a escriure\'s sobre la imatge base (d\'esquerra a dreta).';
$string['yposition'] = 'Posició Y';
$string['ypositiondesc'] = 'Posició a l\'eix Y on el text començarà a escriure\'s sobre la imatge base (de dalt a baix).';

$string['categorylogos'] = 'Logos generats per les categories';
$string['categorylogosdesc'] = 'Aquests són els logos generats automàticament per les categories seleccionades. <strong>Es mostren aquí només per consulta.</strong>';
