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
 * Strings for component 'theme_taleem', language 'en'
 *
 * @package   theme_taleem
 * @copyright 2018 VWThemes, vwthemes.com/lms-themes
 * @author    VWThemes
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// ------------ We Offer ------------
$string['weoffercolor'] = 'Section background Color';
$string['weoffercolordesc'] = 'This option will give background color to section';
$string['theme_taleem_weofferblock'] = 'We Offer Section';
$string['weofferheading'] = 'We Offer';
$string['theme_taleempro_weofferblock'] = 'We Offer Setting';
$string['weoffertitle'] = 'Main Heading';
$string['weoffertitledesc'] = '';
$string['weofferno'] = 'No of Tabs To Display';
$string['weoffernodesc'] = '';
$weofferno= get_config('theme_taleempro', 'weofferno');
for($i= 1; $i<= $weofferno; $i++)
{
    $string['weoffertabtitle'.$i] = 'Tab Title '.$i;
    $string['weoffertabtext'.$i] = 'Tab Text '.$i;
    $string['weofferimagetitle'.$i] = 'Tab Image '.$i;
}
$string['fontsselect'] = 'Front Page Font Select';
$string['fontsselectdesc'] = '';
$string['Roboto'] = 'Roboto';
$string['Open Sans'] = 'Open Sans';
$string['Montserrat'] = 'Montserrat';
$string['Nunito'] = 'Nunito';
$string['PT Sans'] = 'PT Sans';
$string['green'] = 'Green';

$string['about'] = 'About';
$string['aboutus'] = 'About Us';
$string['pluginname'] = 'Taleem';
$string['footeraddress'] = 'Footer Address';
$string['choosereadme'] = '<div class="clearfix"><div class="theme_screenshot"><img class=img-polaroid src="taleem/pix/screenshot.jpg"/><h3>Theme Credits</h3><p><h3>Taleem theme</h3><p>This theme is based on the Boost based Moodle theme.</p><p>Authors: VWThemes<br>Contact: support@vwthemes.com<br>Website: <a href="http://www.vwthemes.com/lms-themes">www.vwthemes.com/lms-themes</a><br></p>';
$string['configtitle'] = 'Taleem';
$string['connectus'] = 'Connect with us';
$string['contact'] = 'Contact';
$string['customcss'] = 'Custom CSS';
$string['customcssdesc'] = 'Whatever CSS rules you add to this textarea will be reflected in every page, making for easier customization of this theme.';
$string['defaultfooteraddress'] = '616 Thatcher Dr.Eden Prairie, MN 55347';
$string['defaultfooteremailid'] = 'support@vwthemes.com';
$string['defaultfooterfooterphoneno'] = '860-229-7118';
$string['footeremailid'] = 'Email';
$string['fburls'] = 'Facebook';
$string['fburls_default'] = 'https://www.facebook.com';
$string['fburlsdesc'] = 'The Facebook url of your organisation.';
$string['promotedcoursesheading'] = 'Our Featured Courses';
$string['footbgimg'] = 'Background Image';
$string['footbgimgdesc'] = 'Background Image size should be following size 1345 X 517';
$string['footerheading'] = 'Footer Blocks';
$string['topbarheading'] = 'Top Blocks';
$string['footerlogos'] = 'Footer Logo';
$string['footerlogos'] = 'Enable Footer Logo';
$string['footerlogosdesc'] = 'Please upload your custom footer logo here if you want to add it to the footer.<br>The image should be 80px high and any reasonable width (minimum:205px) that suits.';
$string['topbarnote'] = 'Topbarfooterphones';
$string['topbarnotedesc'] = 'Whatever you add to this textarea will be displayed in the footer throughout your Moodle site.Please give the either language key or text.For ex: lang:display or Display';
$string['footertexts'] = 'footertexts';
$string['footertextsdefault'] = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and tronic typesetting, sheets taining Lorem Ipsum passages.';
$string['footertextsdesc'] = 'Whatever you add to this textarea will be displayed in the footer throughout your Moodle site.Please give the either language key or text.For ex: lang:display or Display';
$string['frontpageheading'] = 'Front page';
$string['gpurls'] = 'Google+';
$string['gpurls_default'] = 'https://www.google.com/+yourgoogleplusid';
$string['gpurlsdesc'] = 'The Google+ url of your organisation.';
$string['headerheading'] = 'Header';
$string['logo'] = 'Logo';
$string['logodesc'] = 'Please upload your custom logo here if you want to add it to the header.
                       <br>The image should be 50px high and any reasonable width (minimum:235px) that suits.';
$string['totalslides'] = 'Number of slides';
$string['totalslides_desc'] = 'Number of slides on the slider.';
$string['numberoftmonials'] = 'Number of Testimonials';
$string['numberoftmonials_desc'] = 'Number of Testimonials on the Home Page.';
$string['footerfooterphoneno'] = 'Footer Phone No';
$string['pinurls'] = 'Pinterest';
$string['pinurls_default'] = 'https://in.pinterest.com/yourpinterestname/';
$string['pinurlsdesc'] = 'The Pinterest url of your organisation.';
$string['knowmore'] = 'Know More';
$string['region-side-post'] = 'Right';
$string['region-side-pre'] = 'Left';
$string['signup'] = 'Sign up';
$string['slideshowheading'] = 'Slide Show Block';
$string['slideshowheadingsub'] = 'Slide Show';
$string['slidecaption'] = 'Slide caption';
$string['slidecaptiondefault'] = 'Learning Management System';
$string['slidecaptiondesc'] = 'Enter the caption text to use for the slide';
$string['slideimage'] = 'Slide image';
$string['slideimagedesc'] = 'The image should be 1366px X 385px.';
$string['slideno'] = 'Slide {$a->slide}';
$string['slidenodesc'] = 'Enter the settings for slide {$a->slide}.';	
$string['toggleslideshow'] = 'Slide show display';
$string['slideshowdesc'] = 'Choose if you wish to hide or show the slide show.';
$string['twurls'] = 'Twitter';
$string['twurls_default'] = 'https://twitter.com';
$string['twurlsdesc'] = 'The Twitter url of your organisation.';
$string['themegeneralsettings'] = 'General';
$string['patternselect'] = 'Site Color Scheme';
$string['patternselectdesc'] = 'Select the color scheme you want to have for your site.';
$string['colorscheme'] = 'Color Scheme';
$string['topbarblock'] = 'Top Bar Block';
$string['footerblock'] = 'Footer Block';

$string['title'] = 'Title';
$string['footercolumn2titledefault'] = 'Quick Links';
$string['footercolumn3titledefault'] = 'Follow Us';
$string['footercolumn4titledefault'] = 'Contact';
$string['footerblink'] = 'Footer Block Link';
$string['footerblink2default'] = 'lang:aboutus|http://www.example.com/about-us.php lang:termsofuse|http://www.example.com/terms-of-use.php lang:faq|http://www.example.com/faq.php lang:support|http://www.example.com/support.php lang:contact|http://www.example.com/contact.php';
$string['footerblink_desc'] = 'You can configure a Footer Block Links here to be shown by themes. Each line consists of some menu text either language key or text, a link URL (optional),separated by pipe characters.For example:
<pre>
lang:moodlecommunity|https://moodle.org
Moodle Support|https://moodle.org/support
</pre>';
$string['medianame1'] = 'Facebook';
$string['medianame2'] = 'Twitter';
$string['medianame3'] = 'Google Plus';
$string['medianame4'] = 'Pinterest';

$string['smedia1'] = 'Facebook';
$string['smedia2'] = 'Twitter';
$string['smedia3'] = 'Google Plus';
$string['smedia4'] = 'Pinterest';

$string['mediaicon1'] = 'fa fa-facebook-f';
$string['mediaicon2'] = 'fa fa-twitter';
$string['mediaicon3'] = 'fa fa-google-plus';
$string['mediaicon4'] = 'fa fa-pinterest-p';
$string['default_color'] = 'Default color scheme';
$string['color_schemes_heading'] = 'Color Schemes';
$string['promotedtitledefault'] = 'Our Featured courses';
$string['promotedtitledesc'] = 'Please give the Our Featured Course block title, either language key or Text.For ex: lang:display or Display';
$string['pcourseenable'] = 'Enable Our Featured courses';
$string['login'] = 'Login';
$string['link'] = 'Link';
$string['text'] = 'Text';
$string['icon'] = 'Icon';
$string['loginheader'] = 'Login into your account';
$string['faicondesc'] = 'Enter the name of the icon you wish to use.  List is <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" target="_new">here</a>. Just enter what is after the "fa-".';


$string['termsofuse'] = 'Terms of use';
$string['faq'] = 'FAQ';
$string['support'] = 'Support';
$string['copyright'] = 'Copyright';
$string['copyright_default'] = '<p class="text-center">© 2019 - VW Education Pro Theme| Design & Developed by<a href="http://www.vwthemes.com/lms-themes">vwthemes</a>.';
$string['footeremail'] = 'E-mail:';
$string['Dingley'] = "Dingley";
$string['dark_cyan'] = "Dark Cyan";
$string['lavender'] = "Lavender";
$string['blue'] = "Blue";
$string['warm_red'] = "Warm Red";
$string['black'] = "Black";
$string['footerphones'] = "footerphones";
$string['topbaremail'] = "Top Bar Email";