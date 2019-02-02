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
 * @copyright   2018 VWThemes, vwthemes.com/lms-themes
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

    $name = 'theme_taleem/fontsselect';
    $title = get_string('fontsselect', 'theme_taleem');
    $description = get_string('fontsselectdesc', 'theme_taleem');
    $default = 'Nunito, sans-serif';
    $choices = array(
        'Roboto, sans-serif' => get_string( 'Roboto', 'theme_taleem'),
        'Open Sans, sans-serif' => get_string('Open Sans', 'theme_taleem'),
        'Montserrat, sans-serif' => get_string('Montserrat', 'theme_taleem'),
        'Nunito, sans-serif' => get_string('Nunito', 'theme_taleem'),
        'PT Sans, sans-serif' => get_string('PT Sans', 'theme_taleem')
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    $settings->add($temp);
    // Promoted Courses End.

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
    $default = '860-229-7118';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $name = 'theme_taleem/topbaremail';
    $title = get_string('topbaremail', 'theme_taleem');
    $description = get_string('topbaremaildesc', 'theme_taleem');
    $default = 'support@vwthemes.com';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);
    $settings->add($temp);
    /* Top Bar Settings END */

    /*Frontpage Slideshow Settings Start.*/
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


// -------------- We Offer --------------------

    $temp = new admin_settingpage('theme_taleem_weoffer', get_string('weofferheading', 'theme_taleem'));
    $name = 'theme_taleem_weoffermaintitle';
    $heading = get_string('theme_taleem_weofferblock', 'theme_taleem');
    $information = '';
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    $name = 'theme_taleem/checkboxweoffer';
    $title = 'Enable we Offer Section';
    $description = '';
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $temp->add($setting);

    // Section colour setting.
    $name = 'theme_taleem/weoffercolor';
    $title = get_string('weoffercolor', 'theme_taleem');
    $description = get_string('weoffercolordesc', 'theme_taleem');
    $default = '';
    $previewconfig = null;
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_taleem/weoffertitle';
    $title = get_string('weoffertitle', 'theme_taleem');
    $description = get_string('weoffertitledesc', 'theme_taleem');
    $default = 'We Offer';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $name = 'theme_taleem/weofferno';
    $title = get_string('weofferno', 'theme_taleem');
    $description = get_string('weoffernodesc', 'theme_taleem');
    $default = '3';
    $choices = array(
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5',
        6 => '6',
    );
    $temp->add(new admin_setting_configselect($name, $title, $description, $default, $choices));
    $temp->add($setting);


    $weofferno= get_config('theme_taleem', 'weofferno');
    $tabbutton = array('Education','Employment', 'Knowledge');
    for($i= 1; $i<= $weofferno; $i++){

        $name = 'theme_taleem/lineonly'.$i;
        $title = 'TAB '.$i;
        $setting = new admin_setting_heading($name, $title, $information);
        $temp->add($setting);

        $name = 'theme_taleem/weoffertabtitle'.$i;
        $title = get_string('weoffertabtitle'.$i, 'theme_taleem');
        $default = $tabbutton[$i-1];;
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $temp->add($setting);


        $name = 'theme_taleem/weoffertabtext'.$i;
        $title = get_string('weoffertabtext'.$i, 'theme_taleem');
        $default = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries but also the leap into electronic typesetting remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum';    
        $setting = new admin_setting_configtextarea($name, $title, $description, $default);
        $temp->add($setting);
        
        $name = 'theme_taleem/weofferimage'.$i;
        $title = get_string('weofferimagetitle'.$i, 'theme_taleem');
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'weofferimage'.$i);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);
    }
    $settings->add($temp);

    /* Footer Settings start */
    $temp = new admin_settingpage('theme_taleem_footer', get_string('footerheading', 'theme_taleem'));
    // Footer Block1.
    $name = 'theme_taleem_footerblock1heading';
    $heading = get_string('footerblock', 'theme_taleem').' 1 ';
    $information = '';
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Enable / Disable Footer logo.
    $name = 'theme_taleem/footerlogos';
    $title = get_string('footerlogos', 'theme_taleem');
    $description = '';
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $temp->add($setting);

    /* Footer footertexts Content */
    $name = 'theme_taleem/footertexts';
    $title = get_string('footertexts', 'theme_taleem');
    $description = get_string('footertextsdesc', 'theme_taleem');
    $default = 'lang:footertextsdefault';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $temp->add($setting);
    /* Footer Block1. */

    /* Footer Block2. */
    $name = 'theme_taleem_footerblock2heading';
    $heading = get_string('footerblock', 'theme_taleem').' 2 ';
    $information = '';
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    $name = 'theme_taleem/footercolumn2title';
    $title = get_string('footerblock', 'theme_taleem').' '.get_string('title', 'theme_taleem').' 2 ';
    $description = get_string('footerbtitle_desc', 'theme_taleem');
    $default = 'lang:footercolumn2titledefault';
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

    $name = 'theme_taleem/footercolumn3title';
    $title = get_string('footerblock', 'theme_taleem').' '.get_string('title', 'theme_taleem').' 3 ';
    $description = get_string('footerbtitle_desc', 'theme_taleem');
    $default = 'lang:footercolumn3titledefault';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    /* Facebook,Pinterest,Twitter,Google+ Settings */
    $name = 'theme_taleem/fburls';
    $title = get_string('fburls', 'theme_taleem');
    $description = get_string('fburlsdesc', 'theme_taleem');
    $default = get_string('fburls_default', 'theme_taleem');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $name = 'theme_taleem/twurls';
    $title = get_string('twurls', 'theme_taleem');
    $description = get_string('twurlsdesc', 'theme_taleem');
    $default = get_string('twurls_default', 'theme_taleem');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $name = 'theme_taleem/gpurls';
    $title = get_string('gpurls', 'theme_taleem');
    $description = get_string('gpurlsdesc', 'theme_taleem');
    $default = get_string('gpurls_default', 'theme_taleem');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $name = 'theme_taleem/pinurls';
    $title = get_string('pinurls', 'theme_taleem');
    $description = get_string('pinurlsdesc', 'theme_taleem');
    $default = get_string('pinurls_default', 'theme_taleem');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);
    /* Footer Block3. */

    /* Facebook,Pinterest,Twitter,Google+ Settings */
    $name = 'theme_taleem/fburls';
    $title = get_string('fburls', 'theme_taleem');
    $description = get_string('fburlsdesc', 'theme_taleem');
    $default = get_string('fburls_default', 'theme_taleem');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $name = 'theme_taleem/twurls';
    $title = get_string('twurls', 'theme_taleem');
    $description = get_string('twurlsdesc', 'theme_taleem');
    $default = get_string('twurls_default', 'theme_taleem');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $name = 'theme_taleem/gpurls';
    $title = get_string('gpurls', 'theme_taleem');
    $description = get_string('gpurlsdesc', 'theme_taleem');
    $default = get_string('gpurls_default', 'theme_taleem');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $name = 'theme_taleem/pinurls';
    $title = get_string('pinurls', 'theme_taleem');
    $description = get_string('pinurlsdesc', 'theme_taleem');
    $default = get_string('pinurls_default', 'theme_taleem');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);
    /* Footer Block3. */
    $name = 'theme_taleem_footerblock4heading';
    $heading = get_string('footerblock', 'theme_taleem').' 4 ';
    $information = '';
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // Fooer Block Title 4.
    $name = 'theme_taleem/footercolumn4title';
    $title = get_string('footerblock', 'theme_taleem').' '.get_string('title', 'theme_taleem').' 4 ';
    $description = get_string('footerbtitle_desc', 'theme_taleem');
    $default = 'lang:footercolumn4titledefault';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    /* footeraddress , Phone No ,Email */
    $name = 'theme_taleem/footeraddress';
    $title = get_string('footeraddress', 'theme_taleem');
    $description = '';
    $default = get_string('defaultfooteraddress', 'theme_taleem');
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