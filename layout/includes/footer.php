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
 * The footer layout.
 *
 * @package   theme_taleem
 * @copyright 2018 VWThemes, vwthemes.com/lms-themes
 * @author    VWThemes
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

user_preference_allow_ajax_update('drawer-open-nav', PARAM_ALPHA);
require_once($CFG->libdir . '/behat/lib.php');

$taleembodyattributes = $OUTPUT->body_attributes($taleemextraclasses);
$taleemregionmainsettingsmenu = $OUTPUT->region_main_settings_menu();

$footerlogos = !empty(theme_taleem_get_setting('footerlogos')) ? 1 : 0;

$footertexts = !empty(theme_taleem_get_setting('footertexts')) ? theme_taleem_get_setting('footertexts', 'format_text') : '';
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


?>

<footer id="footer" class="py-3 bg-dark text-light">
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="footer-desc">
                        <div class="logo-footer">
                            <a href="{{{ config.wwwroot }}}/?redirect=0">
                                <img src="<?php echo($logourl); ?>" width="183" height="67" alt="Taleem">
                            </a>
                        </div>
                        <p><?php echo($footertexts); ?></p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-nav">
                        <h4><?php echo($footercolumn2title); ?></h4>
                        <ul>
                           <?php echo($footerlinks); ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="social-media">
                        <h4><?php echo($footercolumn3title); ?></h4>
                        <ul>
                            <li class="smedia-01">
                                <a href="<?php echo($fburls); ?>" target="_blank">
                                    <span class="media-icon">
                                    <i class="fa <?php echo($fb); ?> footericon"></i>
                                    </span>
                                    <span class="media-name"><?php echo($fbn); ?></span>
                                </a>
                            </li>
                            <li class="smedia-02">
                                <a href="<?php echo($twurls); ?>" target="_blank">
                                    <span class="media-icon">
                                    <i class="fa <?php echo($tw); ?> footericon"></i>
                                    </span>
                                    <span class="media-name"><?php echo($twn); ?></span>
                                </a>
                            </li>
                            <li class="smedia-03">
                                <a href="<?php echo($gpurls); ?>" target="_blank">
                                    <span class="media-icon">
                                    <i class="fa <?php echo($gp); ?> footericon"></i>
                                    </span>
                                    <span class="media-name"><?php echo($gpn); ?></span>
                                </a>
                            </li>
                            <li class="smedia-04">
                                <a href="<?php echo($pinurls); ?>" target="_blank">
                                   <span class="media-icon">
                                   <i class="fa <?php echo($pi); ?> footericon"></i>
                                   </span>
                                   <span class="media-name"><?php echo($pin); ?></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-contact">
                        <h4><?php echo($footercolumn4title); ?></h4>
                        <p><i class="fa fa-map-marker"></i> <?php echo($footeraddress); ?></p>
                            <p><i class="fa fa-footerphones-square"></i> <?php echo($footerphones); ?>: <?php echo($footerfooterphoneno); ?></p>
                            <p><i class="fa fa-envelope"></i> <?php echo($mail); ?> <a class="mail-link" href="mailto:<?php echo($footeremailid); ?>"><?php echo($footeremailid); ?></a>
                          </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

 <?php $footerlayout = $OUTPUT->render_from_template('theme_taleem/footer', $taleemtemplatecontext); ?>
<div class="footer-foot">
    <div class="container"><?php echo($copyright); ?></div>
</div>

</footer>

<style scoped>
.fa.fa-facebook-f.footericon {
    padding: 0px 13px;
    margin-top: 0px;
    border-radius: 65px;    
}
.fa.fa-twitter.footericon {
    padding: 0px 11px;
    margin-top: 0px;
    border-radius: 65px;
}
.fa.fa-google-plus.footericon {
    padding: 0px 8px;
    margin-top: 0px;
    border-radius: 65px;
}
.fa.fa-pinterest-p.footericon {
    padding: 0px 13px;
    margin-top: 0px;
    border-radius: 65px;
}
</style>