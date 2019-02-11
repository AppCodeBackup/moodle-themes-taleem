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
 * A two column layout for the boost theme.
 *
 * @package   theme_boost
 * @copyright 2016 Damyon Wiese
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

user_preference_allow_ajax_update('drawer-open-nav', PARAM_ALPHA);
require_once($CFG->libdir . '/behat/lib.php');

if (isloggedin()) {
    $taleemnavdraweropen = (get_user_preferences('drawer-open-nav', 'true') == 'true');
} else {
    $taleemnavdraweropen = false;
}
$taleemextraclasses = [];
if ($taleemnavdraweropen) {
    $taleemextraclasses[] = 'drawer-open-left';
}
$taleembodyattributes = $OUTPUT->body_attributes($taleemextraclasses);
$taleemblockshtml = $OUTPUT->blocks('side-pre');
$taleemhasblocks = strpos($taleemblockshtml, 'data-block=') !== false;
$taleemregionmainsettingsmenu = $OUTPUT->region_main_settings_menu();
$taleemtemplatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    'sidepreblocks' => $taleemblockshtml,
    'taleemhasblocks' => $taleemhasblocks,
    'taleembodyattributes' => $taleembodyattributes,
    'taleemnavdraweropen' => $taleemnavdraweropen,
    'taleemregionmainsettingsmenu' => $taleemregionmainsettingsmenu,
    'hastaleemregionmainsettingsmenu' => !empty($taleemregionmainsettingsmenu)
];

$taleemtemplatecontext['flatnavigation'] = $PAGE->flatnav;
echo $OUTPUT->render_from_template('theme_boost/column2', $taleemtemplatecontext);

