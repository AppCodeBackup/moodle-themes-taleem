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
 * frontpage.php
 *
 * @package   theme_taleem
 * @copyright 2018 VWThemes, vwthemes.com/lms-themes
 * @author    VWThemes
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();
$fontsselect = get_config('theme_taleempro', 'fontsselect');

global $OUTPUT, $PAGE;
$html = theme_taleem_get_html_for_settings($OUTPUT, $PAGE);

if (right_to_left()) {
    $regionbsid = 'region-bs-main-and-post';
} else {
    $regionbsid = 'region-bs-main-and-pre';
}

$courserenderer = $PAGE->get_renderer('core', 'course');

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
</head>

<body onload="hideDiv()" <?php echo $OUTPUT->body_attributes(); ?>>
<div id="loader"><div class="lds-ripple"><div></div><div></div></div></div>

<?php echo $OUTPUT->standard_top_of_body_html() ?>

<?php
    require_once(dirname(__FILE__) . '/includes/header.php');
    echo $taleemheaderlayout;
    require_once(dirname(__FILE__) . '/includes/taleem_topbar.php');
?>

<!--E.O.Custom theme header-->
<link rel="stylesheet" href="<?php echo theme_taleem_theme_url(); ?>/style/slick.css" />

<?php
$toggleslideshow = theme_taleem_get_setting('toggleslideshow');
if ($toggleslideshow == 1) {
    require_once(dirname(__FILE__) . '/includes/taleem_slider.php');
}

?>
<div id="page" class="container">
    <header id="page-header" class="clearfix">
        <?php echo $html->heading; ?>
        <div id="page-navbar" class="clearfix">
            <nav class="breadcrumb-nav"><?php echo $OUTPUT->navbar(); ?></nav>
            <div class="breadcrumb-button"><?php echo $OUTPUT->page_heading_button(); ?></div>
        </div>
    </header>
    <div id="page-content" class="row">
    <?php
    if (!empty($PAGE->blocks->region_has_content('side-pre', $OUTPUT))) {
        $sidepreclass = 'col-md-9';
    } else {
        $sidepreclass = 'col-md-12';
    }
    ?>
        <div id="<?php echo $regionbsid ?>" class="<?php echo $sidepreclass; ?>">
            <?php
                echo $OUTPUT->course_content_header();
                echo $OUTPUT->main_content();
                echo $OUTPUT->course_content_footer();
            ?>
        </div>
        <?php echo $OUTPUT->blocks('side-pre', 'col-md-3'); ?>

    </div>
    <?php echo (!empty($taleemflatnavbar)) ? $taleemflatnavbar : ""; ?>
</div>

<?php
    require_once(dirname(__FILE__) . '/includes/taleem_we-offer.php');
    require_once(dirname(__FILE__) . '/includes/footer.php');
    echo $footerlayout;
?>
<!--E.O.Custom theme footer-->

<style>
body{
    font-family: <?php echo $fontsselect; ?>
}
.lds-ripple {
  position: relative;
  width: 64px;
  height: 64px;
  position: absolute;
  top: 50%;
  right: 50%;
}
.lds-ripple div {
  position: absolute;
  border: 4px solid #6bf50b;
  opacity: 1;
  border-radius: 50%;
  animation: lds-ripple 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
}
.lds-ripple div:nth-child(2) {
  animation-delay: -0.5s;
}
@keyframes lds-ripple {
  0% {
    top: 28px;
    left: 28px;
    width: 0;
    height: 0;
    opacity: 1;
  }
  100% {
    top: -1px;
    left: -1px;
    width: 58px;
    height: 58px;
    opacity: 0;
  }
}
#loader {
    background: #fff;
    height: 100vh;
}

</style>

<script>
  function hideDiv() {
      document.getElementById('loader').style.display = "none";
  }
</script>   
</body>
</html>