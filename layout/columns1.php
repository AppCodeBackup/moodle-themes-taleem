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
 * The one column layout.
 *
 * @package   theme_taleem
 * @copyright 2018 VWThemes, vwthemes.com/lms-themes
 * @author    VWThemes
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// Get the HTML for the settings bits.
user_preference_allow_ajax_update('drawer-open-nav', PARAM_ALPHA);
require_once($CFG->libdir . '/behat/lib.php');

if (isloggedin()) {
    $navdraweropen = (get_user_preferences('drawer-open-nav', 'true') == 'true');
} else {
    $navdraweropen = false;
}
$extraclasses = [];
if ($navdraweropen) {
    $extraclasses[] = 'drawer-open-left';
}

$bodyattributes = $OUTPUT->body_attributes($extraclasses);
$blockshtml = $OUTPUT->blocks('side-pre');
$hasblocks = strpos($blockshtml, 'data-block=') !== false;
$regionmainsettingsmenu = $OUTPUT->region_main_settings_menu();

echo (!empty($flatnavbar)) ? $flatnavbar : "";

$logo = theme_taleem_frontpage_logo_url();
$surl = new moodle_url('/course/search.php');

$footerlogos = !empty(theme_taleem_get_setting('footerlogos')) ? 1 : 0;

$footertexts = !empty(theme_taleem_get_setting('footertexts')) ? 
theme_taleem_get_setting('footertexts', 'format_text') : '';
$footertexts = theme_taleem_lang($footertexts);

$footercolumn2title = !empty(theme_taleem_get_setting('footercolumn2title')) ? 
theme_taleem_get_setting('footercolumn2title', 'format_text') : '';
$footercolumn2title = theme_taleem_lang($footercolumn2title);

$footercolumn3title = !empty(theme_taleem_get_setting('footercolumn3title')) ? 
theme_taleem_get_setting('footercolumn3title', 'format_text') : '';
$footercolumn3title = theme_taleem_lang($footercolumn3title);

$footercolumn4title = !empty(theme_taleem_get_setting('footercolumn4title')) ? 
theme_taleem_get_setting('footercolumn4title', 'format_text') : '';
$footercolumn4title = theme_taleem_lang($footercolumn4title);

$footerlinks = theme_taleem_create_urls('footerblink2');
$logourl = theme_taleem_frontpage_logo_url();

$fburls    = theme_taleem_get_setting('fburls');
$fburls    = trim($fburls);
$twurls    = theme_taleem_get_setting('twurls');
$twurls    = trim($twurls);
$gpurls    = theme_taleem_get_setting('gpurls');
$gpurls    = trim($gpurls);
$pinurls   = theme_taleem_get_setting('pinurls');
$pinurls   = trim($pinurls);

$socialurl = ($fburls != '' || $pinurls != '' || $twurls != '' || $gpurls != '') ? 1 : 0;

$fb = get_string('mediaicon1', 'theme_taleem');
$tw = get_string('mediaicon2', 'theme_taleem');
$gp = get_string('mediaicon3', 'theme_taleem');
$pi = get_string('mediaicon4', 'theme_taleem');

$fbn = get_string('medianame1', 'theme_taleem');
$twn = get_string('medianame2', 'theme_taleem');
$gpn = get_string('medianame3', 'theme_taleem');
$pin = get_string('medianame4', 'theme_taleem');

$footeraddress = theme_taleem_get_setting('footeraddress') ? theme_taleem_get_setting('footeraddress') : '';
$footeremailid  = theme_taleem_get_setting('footeremailid');
$footerfooterphoneno  = theme_taleem_get_setting('footerfooterphoneno');
$mail = get_string('footeremail', 'theme_taleem');
$footerphones = get_string('footerphones', 'theme_taleem');

$copyright = theme_taleem_get_setting('copyright');

$block1 = ($footerlogos != '' || $footertexts != '') ? 1 : 0;
$block2 = ($footercolumn2title != '' || $footerlinks != '') ? 1 : 0;
$block3 = ($footercolumn3title != '' || $socialurl != 0) ? 1 : 0;
$block4 = ($footeraddress != '' || $footeremailid != '' || $footerfooterphoneno != '') ? 1 : 0;

$blockarrange = $block1 + $block2 + $block3 + $block4;

switch ($blockarrange) {
    case 4:
        $colclass = 'col-md-3';
        break;
    case 3:
        $colclass = 'col-md-4';
        break;
    case 2:
        $colclass = 'col-md-6';
        break;
    case 1:
        $colclass = 'col-md-12';
        break;
    case 0:
        $colclass = '';
        break;
    default:
        $colclass = 'col-md-3';
    break;
}

$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    'sidepreblocks' => $blockshtml,
    'hasblocks' => $hasblocks,
    'bodyattributes' => $bodyattributes,
    'navdraweropen' => $navdraweropen,
    'regionmainsettingsmenu' => $regionmainsettingsmenu,
    'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu),
    'logo' => $logo,
    'surl' => $surl,

    'footerlogos' => $footerlogos,
    'footertexts' => $footertexts,
    'footercolumn2title' => $footercolumn2title,
    'footercolumn3title' => $footercolumn3title,
    'footercolumn4title' => $footercolumn4title,
    'footerlinks' => $footerlinks,
    'logourl' => $logourl,
    'fburls' => $fburls,
    'pinurls' => $pinurls,
    'twurls' => $twurls,
    'gpurls' => $gpurls,
    'fb' => $fb,
    'pi' => $pi,
    'tw' => $tw,
    'gp' => $gp,
    'fbn' => $fbn,
    'pin' => $pin,
    'twn' => $twn,
    'gpn' => $gpn,
    'socialurl' => $socialurl,
    'footeraddress' => $footeraddress,
    'footerfooterphoneno' => $footerfooterphoneno,
    'footeremailid' => $footeremailid,
    'footerphones' => $footerphones,
    'mail' => $mail,
    'copyright' => $copyright,
    'block1' => $block1,
    'block2' => $block2,
    'block3' => $block3,
    'block4' => $block4,
    'colclass' => $colclass,
    'blockarrange' => $blockarrange
];

$templatecontext['flatnavigation'] = $PAGE->flatnav;
$flatnavbar = $OUTPUT->render_from_template('theme_boost/nav-drawer', $templatecontext);
echo $OUTPUT->render_from_template('theme_taleem/columns1', $templatecontext);