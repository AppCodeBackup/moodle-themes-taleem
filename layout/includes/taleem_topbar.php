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
 * topbar.php
 *
 * @package     theme_taleem
 * @copyright   2018 VWThemes, vwthemes.com/lms-themes
 * @author      VWThemes
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * topbar
 * @return string
 */
function topbar_content() {
    $topbarnote = theme_taleem_get_setting('topbarnote', true);
    $topbarnote = theme_taleem_lang($topbarnote);

    $topbaremail = theme_taleem_get_setting('topbaremail', true);
    $topbaremail = theme_taleem_lang($topbaremail);

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

    $tabcontent = html_writer::start_tag('div', array('class' => 'Topbarsdiv test'));
    $tabcontent .= html_writer::start_tag('div', array('id' => 'tab_content', 'class' => 'container'));
    $tabcontent .= html_writer::start_tag('div', array('id' => '', 'class' => 'row'));

      $tabcontent .= html_writer::start_tag('div', array('id' => '', 'class' => 'col-md-3 col-sm-4 col-lg-2 topbar-email'));
        $tabcontent .= html_writer::start_tag('i', array('class' => 'fa fa-mobile'));
         $tabcontent .= html_writer::end_tag('i');
          $tabcontent .= $topbarnote;
      $tabcontent .= html_writer::end_tag('div');

      $tabcontent .= html_writer::start_tag('div', array('id' => '', 'class' => 'col-md-3 col-sm-4 col-lg-3 topbar-email'));
        $tabcontent .= html_writer::start_tag('i', array('class' => 'fa fa-envelope'));
          $tabcontent .= html_writer::end_tag('i');
          $tabcontent .= $topbaremail;
      $tabcontent .= html_writer::end_tag('div');

      $tabcontent .= html_writer::start_tag('div', array('id' => '', 'class' => 'col-md-6 col-sm-4 col-lg-7 media-icon'));
        $tabcontent .= html_writer::start_tag('a', array('href' => $fburls));
            $tabcontent .= html_writer::start_tag('i', array('class' => $fb));
            $tabcontent .= html_writer::end_tag('i');
        $tabcontent .= html_writer::end_tag('a');

        $tabcontent .= html_writer::start_tag('a', array('href' => $twurls));
          $tabcontent .= html_writer::start_tag('i', array('class' => $tw));
          $tabcontent .= html_writer::end_tag('i');
        $tabcontent .= html_writer::end_tag('a');

        $tabcontent .= html_writer::start_tag('a', array('href' => $gpurls));
          $tabcontent .= html_writer::start_tag('i', array('class' => $gp));
          $tabcontent .= html_writer::end_tag('i');
        $tabcontent .= html_writer::end_tag('a');

        $tabcontent .= html_writer::start_tag('a', array('href' => $pinurls));
          $tabcontent .= html_writer::start_tag('i', array('class' => $pi));
          $tabcontent .= html_writer::end_tag('i');
        $tabcontent .= html_writer::end_tag('a');
      $tabcontent .= html_writer::end_tag('div');
    $tabcontent .= html_writer::end_tag('div');
    $tabcontent .= html_writer::end_tag('div');
    $tabcontent .= html_writer::end_tag('div');
    return $tabcontent;
}

echo topbar_content();
?>



<style>
i.fa.fa-twitter {
    background: #fa8842 !important;
    padding: 14px 11px;
    margin-top: -7px;
    color: #fff;
    margin-right: 5px;
}
i.fa.fa-facebook-f {
    background: #97ce34;
    padding: 14px 14px;
    margin-top: -7px;
    color: #fff;
    margin-right: 5px;
}
i.fa.fa-google-plus {
    background: #2aace8;
    padding: 14px 8px;
    margin-top: -7px;
    color: #fff;
    margin-right: 5px;
}
i.fa.fa-pinterest-p {
    background: #8E558F;
    padding: 14px 13px;
    margin-top: -7px;
    color: #fff;
}
.fa.fa-mobile,.fa.fa-envelope {
    font-size: 19px;
    padding-right: 8px;
}

.col-md-6.media-icon {
    text-align: right;
}
.col-md-3.topbar-email {
    text-align: left;
    font-weight: bold;
}

@media (max-width: 767px) and (min-width: 576px) {
i.fa.fa-twitter {
    padding: 10px 8px !important;  
}
i.fa.fa-google-plus {
    padding: 10px 6px !important;
}
i.fa.fa-pinterest-p {
    padding: 10px 10px !important;    
}
i.fa.fa-facebook-f {
    padding: 10px 11px !important;
}
}
</style>