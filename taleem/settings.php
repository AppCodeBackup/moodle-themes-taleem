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
 * settings.php
 *
 * This is built using the boost template to allow for new theme's using
 * Moodle's new Boost theme engine
 *
 * @package     theme_taleem
 * @copyright   2018 VWThemes, vwthemes.com/moodle-themes
 * @author      VWThemes
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die;

$settings = null;

if (is_siteadmin()) {
    $settings = new theme_boost_admin_settingspage_tabs('themesettingtaleem', get_string('configtitle', 'theme_taleem'));
    $ADMIN->add('themes', new admin_category('theme_taleem', 'Taleem'));

    /* General Settings */
    $temp = new admin_settingpage('theme_taleem_general', get_string('themegeneralsettings', 'theme_taleem'));

    // Logo file setting.
    $name = 'theme_taleem/logo';
    $title = get_string('logo', 'theme_taleem');
    $description = get_string('logodesc', 'theme_taleem');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Custom CSS file.
    $name = 'theme_taleem/customcss';
    $title = get_string('customcss', 'theme_taleem');
    $description = get_string('customcssdesc', 'theme_taleem');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Color schemes.
    $colorscheme = get_string('colorscheme', 'theme_taleem');
    $defaultcolor = get_string('default_color', 'theme_taleem');
    $colorhdr = get_string('color_schemes_heading', 'theme_taleem');

    // Theme Color scheme chooser.
    $name = 'theme_taleem/patternselect';
    $title = get_string('patternselect', 'theme_taleem');
    $description = get_string('patternselectdesc', 'theme_taleem');
    $default = 'default';
    $choices = array(
        'default' => get_string( 'green', 'theme_taleem'),
        '1' => get_string('lavender', 'theme_taleem'),
        '2' => get_string('blue', 'theme_taleem'),
        '3' => get_string('warm_red', 'theme_taleem'),
        '4' => get_string('dark_cyan', 'theme_taleem')
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Theme Color scheme static content.
    $pimg = array();
    global $CFG;
    $cp = $CFG->wwwroot.'/theme/taleem/pix/color/';
    $pimg = array(
            $cp.'default.jpg' , $cp.'colorscheme-1.jpg', $cp.'colorscheme-2.jpg',
            $cp.'colorscheme-3.jpg' , $cp.'colorscheme-4.jpg');

    $themepattern = '<ul class="thumbnails theme-color-schemes"><li class=""><div class="thumbnail"><img src="'.$pimg[0].'" alt="default" width="100" height="100"/><h6>'.get_string( "default", 'theme_taleem' ).'</h6></div></li><li class=""><div class="thumbnail"><img src="'.$pimg[1].'" alt="pattern1" width="100" height="100"/><h6>'.get_string("color_1", 'theme_taleem').'</h6></div></li><li class=""><div class="thumbnail"><img src="'.$pimg[2].'" alt="pattern2" width="100" height="100"/><h6>'.get_string("color_2", 'theme_taleem').'</h6></div></li><li class=""><div class="thumbnail"><img src="'.$pimg[3].'" alt="pattern3" width="100" height="100"/><h6>'.get_string("color_3", 'theme_taleem').'</h6></div></li><li class=""><div class="thumbnail"><img src="'.$pimg[4].'" alt="pattern4" width="100" height="100"/><h6>'.get_string("color_4", 'theme_taleem').'</h6></div></li></ul>';

    $temp->add(new admin_setting_heading('theme_taleem_patternheading', '', $themepattern));

    // Promoted Courses Start.
    // Promoted Courses Heading.
    $name = 'theme_taleem_promotedcoursesheading';
    $heading = get_string('promotedcoursesheading', 'theme_taleem');
    $information = '';
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Enable / Disable Promoted Courses.
    $name = 'theme_taleem/pcourseenable';
    $title = get_string('pcourseenable', 'theme_taleem');
    $description = '';
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $temp->add($setting);

    // Promoted courses Block title.
    $name = 'theme_taleem/promotedtitle';
    $title = get_string('pcourses', 'theme_taleem').' '.get_string('title', 'theme_taleem');
    $description = get_string('promotedtitledesc', 'theme_taleem');
    $default = 'lang:promotedtitledefault';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $name = 'theme_taleem/promotedcourses';
    $title = get_string('pcourses', 'theme_taleem');
    $description = get_string('pcoursesdesc', 'theme_taleem');
    $default = array();

    $courses[0] = '';
    $cnt = 0;
    if ($ccc = get_courses('all', 'c.sortorder ASC', 'c.id,c.shortname,c.visible,c.category')) {
        foreach ($ccc as $cc) {
            if ($cc->visible == "0" || $cc->id == "1") {
                continue;
            }
            $cnt++;
            $courses[$cc->id] = $cc->shortname;
            // Set some courses for default option.
            if ($cnt < 8) {
                $default[] = $cc->id;
            }
        }
    }
    $coursedefault = implode(",", $default);
    $setting = new admin_setting_configtextarea($name, $title, $description, $coursedefault);
    $temp->add($setting);
    $settings->add($temp);
    // Promoted Courses End.

    /*Slideshow Settings Start.*/
    $temp = new admin_settingpage('theme_taleem_slideshow', get_string('slideshowheading', 'theme_taleem'));
    $temp->add(new admin_setting_heading('theme_taleem_slideshow', get_string('slideshowheadingsub', 'theme_taleem'),
    format_text(get_string('slideshowdesc', 'theme_taleem'), FORMAT_MARKDOWN)));

    // Display Slideshow.
    $name = 'theme_taleem/toggleslideshow';
    $title = get_string('toggleslideshow', 'theme_taleem');
    $description = get_string('toggleslideshowdesc', 'theme_taleem');
    $yes = get_string('yes');
    $no = get_string('no');
    $default = 1;
    $choices = array(1 => $yes , 0 => $no);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $temp->add($setting);

    // Number of slides.
    $name = 'theme_taleem/numberofslides';
    $title = get_string('numberofslides', 'theme_taleem');
    $description = get_string('numberofslides_desc', 'theme_taleem');
    $default = 3;
    $choices = array(
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5',
        6 => '6',
        7 => '7',
        8 => '8',
        9 => '9',
        10 => '10',
        11 => '11',
        12 => '12',
    );
    $temp->add(new admin_setting_configselect($name, $title, $description, $default, $choices));

    $numberofslides = get_config('theme_taleem', 'numberofslides');
    for ($i = 1; $i <= $numberofslides; $i++) {

        // This is the descriptor for Slide One.
        $name = 'theme_taleem/slide' . $i . 'info';
        $heading = get_string('slideno', 'theme_taleem', array('slide' => $i));
        $information = get_string('slidenodesc', 'theme_taleem', array('slide' => $i));
        $setting = new admin_setting_heading($name, $heading, $information);
        $temp->add($setting);

        // Slide Image.
        $name = 'theme_taleem/slide' . $i . 'image';
        $title = get_string('slideimage', 'theme_taleem');
        $description = get_string('slideimagedesc', 'theme_taleem');
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'slide' . $i . 'image');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);

        // Slide Caption.
        $name = 'theme_taleem/slide' . $i . 'caption';
        $title = get_string('slidecaption', 'theme_taleem');
        $description = get_string('slidecaptiondesc', 'theme_taleem');
        $default = 'lang:slidecaptiondefault';
        $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
        $temp->add($setting);

        // Slider button.
        $name = 'theme_taleem/slide' . $i . 'urltext';
        $title = get_string('slidebutton', 'theme_taleem');
        $description = get_string('slidebuttondesc', 'theme_taleem');
        $default = 'lang:knowmore';
        $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_TEXT);
        $temp->add($setting);

        // Slide button link.
        $name = 'theme_taleem/slide'.$i.'url';
        $title = get_string('slidebuttonurl', 'theme_taleem');
        $description = get_string('slidebuttonurldesc', 'theme_taleem');
        $default = 'http://www.example.com/';
        $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
        $temp->add($setting);
    }
        $settings->add($temp);
    /* Slideshow Settings End*/



  /* Top Bar Settings start */
   $temp = new admin_settingpage('theme_taleem_topbar', get_string('topbarheading', 'theme_taleem'));
   // Top Bar Block1.
   $name = 'theme_taleem_topbarblockheading';
   $heading = get_string('topbarblock', 'theme_taleem');
   $information = '';
   $setting = new admin_setting_heading($name, $heading, $information);
   $temp->add($setting);

   /* Top Bar phone & Email id Content */
   $name = 'theme_taleem/topbarnote';
   $title = get_string('topbarnote', 'theme_taleem');
   $description = get_string('topbarnotedesc', 'theme_taleem');
   $default = '(000) 123-456';
   $setting = new admin_setting_configtext($name, $title, $description, $default);
   $temp->add($setting);

   $name = 'theme_taleem/topbaremail';
   $title = get_string('topbaremail', 'theme_taleem');
   $description = get_string('topbaremaildesc', 'theme_taleem');
   $default = 'info@gmail.com';
   $setting = new admin_setting_configtext($name, $title, $description, $default);
   $temp->add($setting);
   $settings->add($temp);

	/* Top Bar Settings END */

    
    /* Footer Settings start */
    $temp = new admin_settingpage('theme_taleem_footer', get_string('footerheading', 'theme_taleem'));

    // Footer Block1.
    $name = 'theme_taleem_footerblock1heading';
    $heading = get_string('footerblock', 'theme_taleem').' 1 ';
    $information = '';
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Enable / Disable Footer logo.
    $name = 'theme_taleem/footerblklogo';
    $title = get_string('footerblklogo', 'theme_taleem');
    $description = '';
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $temp->add($setting);

    /* Footer Footnote Content */
    $name = 'theme_taleem/footnote';
    $title = get_string('footnote', 'theme_taleem');
    $description = get_string('footnotedesc', 'theme_taleem');
    $default = 'lang:footnotedefault';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $temp->add($setting);
    /* Footer Block1. */

    /* Footer Block2. */
    $name = 'theme_taleem_footerblock2heading';
    $heading = get_string('footerblock', 'theme_taleem').' 2 ';
    $information = '';
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    $name = 'theme_taleem/footerbtitle2';
    $title = get_string('footerblock', 'theme_taleem').' '.get_string('title', 'theme_taleem').' 2 ';
    $description = get_string('footerbtitle_desc', 'theme_taleem');
    $default = 'lang:footerbtitle2default';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $name = 'theme_taleem/footerblink2';
    $title = get_string('footerblink', 'theme_taleem').' 2';
    $description = get_string('footerblink_desc', 'theme_taleem');
    $default = get_string('footerblink2default', 'theme_taleem');
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $temp->add($setting);
    /* Footer Block2 */

    /* Footer Block3 */
    $name = 'theme_taleem_footerblock3heading';
    $heading = get_string('footerblock', 'theme_taleem').' 3 ';
    $information = '';
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    $name = 'theme_taleem/footerbtitle3';
    $title = get_string('footerblock', 'theme_taleem').' '.get_string('title', 'theme_taleem').' 3 ';
    $description = get_string('footerbtitle_desc', 'theme_taleem');
    $default = 'lang:footerbtitle3default';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    /* Facebook,Pinterest,Twitter,Google+ Settings */
    $name = 'theme_taleem/fburl';
    $title = get_string('fburl', 'theme_taleem');
    $description = get_string('fburldesc', 'theme_taleem');
    $default = get_string('fburl_default', 'theme_taleem');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $name = 'theme_taleem/twurl';
    $title = get_string('twurl', 'theme_taleem');
    $description = get_string('twurldesc', 'theme_taleem');
    $default = get_string('twurl_default', 'theme_taleem');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $name = 'theme_taleem/gpurl';
    $title = get_string('gpurl', 'theme_taleem');
    $description = get_string('gpurldesc', 'theme_taleem');
    $default = get_string('gpurl_default', 'theme_taleem');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $name = 'theme_taleem/pinurl';
    $title = get_string('pinurl', 'theme_taleem');
    $description = get_string('pinurldesc', 'theme_taleem');
    $default = get_string('pinurl_default', 'theme_taleem');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);
    /* Footer Block3. */

    /* Facebook,Pinterest,Twitter,Google+ Settings */
    $name = 'theme_taleem/fburl';
    $title = get_string('fburl', 'theme_taleem');
    $description = get_string('fburldesc', 'theme_taleem');
    $default = get_string('fburl_default', 'theme_taleem');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $name = 'theme_taleem/twurl';
    $title = get_string('twurl', 'theme_taleem');
    $description = get_string('twurldesc', 'theme_taleem');
    $default = get_string('twurl_default', 'theme_taleem');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $name = 'theme_taleem/gpurl';
    $title = get_string('gpurl', 'theme_taleem');
    $description = get_string('gpurldesc', 'theme_taleem');
    $default = get_string('gpurl_default', 'theme_taleem');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $name = 'theme_taleem/pinurl';
    $title = get_string('pinurl', 'theme_taleem');
    $description = get_string('pinurldesc', 'theme_taleem');
    $default = get_string('pinurl_default', 'theme_taleem');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);
    /* Footer Block3. */
    

    /* Footer Block4. */
    $name = 'theme_taleem_footerblock4heading';
    $heading = get_string('footerblock', 'theme_taleem').' 4 ';
    $information = '';
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Fooer Block Title 4.
    $name = 'theme_taleem/footerbtitle4';
    $title = get_string('footerblock', 'theme_taleem').' '.get_string('title', 'theme_taleem').' 4 ';
    $description = get_string('footerbtitle_desc', 'theme_taleem');
    $default = 'lang:footerbtitle4default';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    /* Address , Phone No ,Email */
    $name = 'theme_taleem/address';
    $title = get_string('address', 'theme_taleem');
    $description = '';
    $default = get_string('defaultaddress', 'theme_taleem');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $name = 'theme_taleem/phoneno';
    $title = get_string('phoneno', 'theme_taleem');
    $description = '';
    $default = get_string('defaultphoneno', 'theme_taleem');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $name = 'theme_taleem/emailid';
    $title = get_string('emailid', 'theme_taleem');
    $description = '';
    $default = get_string('defaultemailid', 'theme_taleem');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    // Copyright.
    $name = 'theme_taleem/copyright';
    $title = get_string('copyright', 'theme_taleem');
    $description = '';
    $default = get_string('copyright_default', 'theme_taleem');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $settings->add($temp);
    /* Footer Block4 */
    /*  Footer Settings end */

}