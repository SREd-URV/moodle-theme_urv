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
 * @package    theme_urv
 * @author     Jordi Pujol-Ahulló <jordi.pujol@urv.cat>
 * @copyright  2014 Servei de Recursos Educatius (http://www.sre.urv.cat)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Called when initializing the web page. We need to add a system-wide central region
 * for blocks.
 * @param moodle_page $page current page.
 */
function theme_urv_page_init(moodle_page $page)
{
    $all = $page->blocks->get_regions();

    if (false === array_search('side-content', $all)) {
        $page->blocks->add_region('side-content');
    }
}

/**
 * Serves any files associated with the theme settings.
 *
 * @param stdClass $course
 * @param stdClass $cm
 * @param context $context
 * @param string $filearea
 * @param array $args
 * @param bool $forcedownload
 * @param array $options
 * @return bool
 */
function theme_urv_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = array())
{
    if ($context->contextlevel == CONTEXT_SYSTEM &&
        ($filearea === 'logo' || $filearea === 'categorylogo' || $filearea === 'backgroundimage')) {

        $theme = theme_config::load('urv');
        // By default, theme files must be cache-able by both browsers and proxies.
        if (!array_key_exists('cacheability', $options)) {
            $options['cacheability'] = 'public';
        }
        return $theme->setting_file_serve($filearea, $args, $forcedownload, $options);
    } else {
        send_file_not_found();
    }
}

/**
 * Extra LESS code to inject. We invoke to the parent function and append the styles
 * for the given categories with customized logos.
 *
 *
 * @param theme_config $theme The theme config object.
 * @return string Raw LESS code.
 */
function theme_urv_extra_less($theme)
{
    $content = theme_more_extra_less($theme);

    // if theme has not categories with customized logos, do nothing else.
    if (empty($theme->settings->categorieswithcustomizedlogo)) {
        return $content;
    }

    // we have categories with customized logos. build extra css's

    $categories = explode(',', $theme->settings->categorieswithcustomizedlogo);
    foreach ($categories as $catid) {
        $logo = 'logo' . $catid;
        $theme->settings->$logo = '/' . $logo . '.png';
        $logourl = $theme->setting_file_url($logo, 'categorylogo');
        $content .= 'a.logo.' . $logo . '{
    background: url(' . $logourl . ') no-repeat 0 0;
    display: block;
    float: left;
    height: 75px;
    margin: 0;
    padding: 0;
    width: 100%;
}

.dir-rtl a.logo.' . $logo . ' {
    background: url(' . $logourl . ') no-repeat 100% 0;
    display: block;
    float: right;
}';
        unset($theme->settings->$logo);
    }
    return $content;
}

/**
 * Returns an object containing HTML for the areas affected by settings.
 *
 * We rely on Clean specific logic, but replacing wherever applicable,
 * the logo image.
 *
 * @param renderer_base $output Pass in $OUTPUT.
 * @param moodle_page $page Pass in $PAGE.
 * @return stdClass An object with the following properties:
 *      - navbarclass A CSS class to use on the navbar. By default ''.
 *      - heading HTML to use for the heading. A logo if one is selected or the default heading.
 *      - footnote HTML to use as a footnote. By default ''.
 */
function theme_urv_get_html_for_settings(renderer_base $output, moodle_page $page)
{
    $return = new stdClass;

    $return->navbarclass = '';
    if (!empty($page->theme->settings->invert)) {
        $return->navbarclass .= ' navbar-inverse';
    }

    if (!empty($page->theme->settings->logo)) {
        $return->heading = theme_urv_get_html_for_logo($output, $page);
    } else {
        $return->heading = $output->page_heading();
    }

    $return->footnote = '';
    if (!empty($page->theme->settings->footnote)) {
        $return->footnote = '<div class="footnote text-center">' . format_text($page->theme->settings->footnote) . '</div>';
    }

    return $return;
}

/**
 * Generates the HTML code necessary to show the current category logo. If there is no customized category applicable,
 * default theme logo will be shown.
 *
 * @param renderer_base $output
 * @param moodle_page $page
 * @return string HTML for the logo.
 */
function theme_urv_get_html_for_logo(renderer_base $output, moodle_page $page)
{
    global $CFG;
    $customizedcatidarray = explode(',', $page->theme->settings->categorieswithcustomizedlogo);
    $customizedcatids = array_flip($customizedcatidarray);
    unset($customizedcatidarray);

    // 1. check if we are in the front page. Then, use default logo.
    $currentcatids = $page->categories; //lazy evaluation: get them in memory
    if (empty($currentcatids)) {
        return html_writer::link($CFG->wwwroot, '', array('title' => get_string('home'), 'class' => 'logo'));
    }

    // 2. otherwise, look for the deepest category with customized logo.
    $catfound = false;
    foreach ($currentcatids as $id => $cat) {
        if (isset($customizedcatids[$id])) {
            $catfound = $cat;
            break;
        }
    }
    // 2.1. none was matched: then, we will show the default logo.
    if (false === $catfound) {
        return html_writer::link($CFG->wwwroot, '', array('title' => get_string('home'), 'class' => 'logo'));
    }

    // 2.2. we have found a category with customized logo
    $overrideclass = 'logo' . $catfound->id;
    return html_writer::link($CFG->wwwroot, '',
            array('title' => get_string('home'), 'class' => 'logo ' . $overrideclass));
}

/**
 * Gets the HTML to show all generated logos.
 * @return string HTML showing all generated logos.
 */
function theme_urv_get_html_for_all_logos()
{
    global $CFG, $DB, $OUTPUT;

    $theme = theme_config::load('urv');

    if (empty($theme->settings->categorieswithcustomizedlogo)) {
        return get_string('nologos', 'theme_urv');
    }

    $customizedcategories = $theme->settings->categorieswithcustomizedlogo;
    $table = new html_table();
    $table->head = array(get_string('currentimage', 'badges'), get_string('name'), get_string('description'));
    $rows = array();
    $sql = "
    SELECT
        id, name, description
    FROM
        {course_categories}
    WHERE
        id IN ($customizedcategories)";
    $categories = $DB->get_records_sql($sql);

    foreach ($categories as $cat) {

        $logo = 'logo' . $cat->id;
        $theme->settings->$logo = '/' . $logo . '.png';
        $logourl = $theme->setting_file_url($logo, 'categorylogo');
        unset($theme->settings->$logo);
        $desc = clean_param($cat->description, PARAM_NOTAGS);
        $desc = trim(preg_replace('/\s+/', ' ', $desc));
        $name = clean_param($cat->name, PARAM_NOTAGS);
        $name = trim(preg_replace('/\s+/', ' ', $name));

        $rows[] = array(html_writer::img($logourl, $name), $name, $desc);

    }
    $table->data = $rows;

    return html_writer::table($table);
}

/**
 * Builds logos for each selected category to customize.
 *
 * @throws Exception
 */
function theme_urv_build_category_logos()
{
    global $PAGE;

    // we have to build all logos again, since values has changed.
    $fs = get_file_storage();

    $args = new stdClass();
    $args->component = 'theme_urv';

    // get settings from DB, since $PAGE->theme->settings is cached and outdated.
    $settings = get_config('theme_urv');

    if (empty($settings->categorieswithcustomizedlogo)) {
        return;
    }

    $catlist = theme_urv_get_category_list($settings->categorieswithcustomizedlogo);

    foreach ($catlist as $cat) {
        theme_urv_store_customized_logo($args, $fs, $settings, $cat);
    }
}

/**
 * Loads the file class for the given setting.
 *
 * @param file_storage $fs file storage
 * @param int $contextid system context id
 * @param string $component the theme component name
 * @param string $filearea the file area
 * @param string $setting the setting filename
 * @return stored_file the file for the given setting
 * @throws Exception if file was not found.
 */
function theme_urv_get_file(file_storage $fs, $contextid, $component, $filearea, $setting)
{
    $setting = ltrim($setting, '/'); // be sure there is no starting slash
    $fullpath = rtrim("/{$contextid}/{$component}/{$filearea}/0/{$setting}", '/');

    $file = $fs->get_file_by_hash(sha1($fullpath));
    if (!$file) {
        throw new Exception('Could not load file for fullpath \'' . $fullpath . '\'for setting \'' . $setting . '\'');
    }
    return $file;
}

/**
 * Gets the absolute path for the given file.
 * @global object $CFG global configuration
 * @param stored_file $file file to get its absolute path
 * @return string absolute path for this file from the pool.
 */
function theme_urv_get_absolute_filepath(stored_file $file)
{
    global $CFG;
    $hash = $file->get_contenthash();
    return $CFG->dataroot . '/filedir/' . $hash[0] . $hash[1] . '/' . $hash[2] . $hash[3] . '/' . $hash;
}

/**
 * Returns the absolute path for the temp directory where to place temporary categories' logos, before
 * including them into the pool.
 *
 * @global object $CFG global configuration.
 * @return string absolute directory path for placing categories' logos.
 * @throws Exception if
 */
function theme_urv_get_tempdir()
{
    global $CFG;
    ignore_user_abort(true);
    $tempdir = $CFG->dataroot . '/temp/theme_urv';
    if (!is_dir($tempdir) || !is_writable($tempdir)) {
        theme_urv_recursive_rmdir($tempdir);
        if (!@mkdir($tempdir, $CFG->directorypermissions, true)) {
            throw new Exception('Could not build temp directory \'' . $tempdir . '\' for building categories\' logos.');
        }
    }

    return $tempdir;
}

/**
 * Deletes all temporary files (if any) and the temporary directory for categories' logos.
 *
 * @param string $dir directory to clean up.
 */
function theme_urv_recursive_rmdir($dir)
{
    foreach (glob($dir . '/*') as $file) {
        if (is_dir($file)) {
            theme_urv_recursive_rmdir($file);
        } else {
            @unlink($file);
        }
    }
    @rmdir($dir);
}

/**
 * Builds a customized logo for the given category $cat.
 * @param object $args data necessary to build a logo.
 * @param file_storage $fs file storage class.
 * @param type $settings theme settings.
 * @param object $cat current category to work with (object with id and text attributes).
 */
function theme_urv_store_customized_logo(stdClass $args, file_storage $fs, $settings, stdClass $cat)
{
    // prepare all parameters to build a logo
    if (!isset($args->tempdir)) {
        $args->tempdir = theme_urv_get_tempdir();
    }
    if (!isset($args->contextid)) {
        $syscontext = context_system::instance();
        $args->contextid = $syscontext->id;
    }
    if (!isset($args->component)) {
        $args->component = 'theme_urv';
    }
    if (!isset($args->baselogofile)) {
        $args->baselogofile = theme_urv_get_file($fs, $args->contextid, $args->component, 'baselogo',
            $settings->baselogo);
    }
    if (!isset($args->filerecordprototype)) {
        $args->filerecordprototype = (object)array(
                'contextid' => $args->contextid,
                'component' => $args->component,
                'filearea' => 'categorylogo',
                'itemid' => 0,
                'filepath' => '/',
                'filename' => '', //to be replaced
                'timecreated' => '', //to be replaced
                'timemodified' => '', //to be replaced
                'userid' => $args->baselogofile->get_userid(),
                'source' => '', //to be replaced
                'author' => $args->baselogofile->get_author(),
                'license' => $args->baselogofile->get_license(),
                'status' => 0,
                'sortorder' => 0,
        );
    }
    if (!isset($args->fonttypefile)) {
        $args->fonttypefile = theme_urv_get_file($fs, $args->contextid, $args->component, 'fonttype',
            $settings->fonttype);
    }
    if (!isset($args->absolutepathfonttype)) {
        $args->absolutepathfonttype = theme_urv_get_absolute_filepath($args->fonttypefile);
    }
    if (!isset($args->fontsize)) {
        $args->fontsize = $settings->baselogotextsize;
    }
    if (!isset($args->rotation)) {
        $args->rotation = $settings->rotation;
    }
    if (!isset($args->red)) {
        // http://php.net/manual/es/function.hexdec.php
        $color = hexdec(ltrim($settings->baselogotextcolor, '#'));
        $args->red = 0xFF & ($color >> 0x10);
        $args->green = 0xFF & ($color >> 0x8);
        $args->blue = 0xFF & $color;
    }
    if (!isset($args->x)) {
        $args->x = $settings->xposition;
        $args->y = $settings->yposition;
    }

    // 1. create an image object
    $baselogoimage = $args->baselogofile->get_content();
    $baselogo = imagecreatefromstring($baselogoimage);

    // 2. define the text color
    $imagetextcolor = imagecolorallocate($baselogo, $args->red, $args->green, $args->blue);

    // 3. print text over the base logo
    imagettftext($baselogo, $args->fontsize, $args->rotation, $args->x, $args->y, $imagetextcolor,
        $args->absolutepathfonttype, $cat->text);

    // 4. store it temporary in a file
    $tempfile = $args->tempdir . '/logo' . $cat->id;
    if (!imagepng($baselogo, $tempfile)) {
        throw new Exception('Could not create customized logo for category ' . $cat->text . ' (' . $cat->id . ')');
    }
    $newlogo = clone($args->filerecordprototype);
    $newlogo->filename = 'logo' . $cat->id . '.png';
    $newlogo->source = $newlogo->filename;
    $newlogo->timecreated = time();
    $newlogo->timemodified = $newlogo->timecreated;

    // 5. load into the pool
    // before loading into pool, be sure it does not exist at all.
    $exists = $fs->get_file($newlogo->contextid, $newlogo->component, $newlogo->filearea, $newlogo->itemid, $newlogo->filepath, $newlogo->filename);
    if ($exists) {
        $exists->delete();
    }
    $fs->create_file_from_pathname($newlogo, $tempfile);

    // 6. free resources
    @unlink($tempfile);
    imagedestroy($baselogo);
}

/**
 * Builds a list of category items with the id and text to show in the customized logo.
 * @global type $DB
 * @param string $categories list of category ids separated by commas.
 * @return array empty array if no $categories were set, or an array of object otherwise.
 */
function theme_urv_get_category_list($categories)
{
    global $DB;

    if (empty($categories)) {
        return array();
    }

    $sql = "SELECT cc.id, cc.name, cc.description
            FROM {course_categories} cc
            WHERE cc.id IN ($categories)";
    $rs = $DB->get_recordset_sql($sql);
    $catlist = array();
    foreach ($rs as $cat) {
        $catlist[] = theme_urv_get_category_item($cat);
    }
    return $catlist;
}

/**
 * Given a record from a category, return an item object with its id and a text.
 * The text will be the description if not empty, or its name otherwise.
 * @param object $cat course_category record with at least id, name and description.
 * @return \stdClass with id and text attributes.
 */
function theme_urv_get_category_item(stdClass $cat)
{
    $desc = clean_param($cat->description, PARAM_NOTAGS);
    $desc = trim(preg_replace('/\s+/', ' ', $desc));
    $title = clean_param($cat->name, PARAM_NOTAGS);
    $title = trim(preg_replace('/\s+/', ' ', $title));
    $item = new stdClass();
    $item->id = $cat->id;
    $item->text = (empty($desc)) ? $title : $desc;
    return $item;
}
