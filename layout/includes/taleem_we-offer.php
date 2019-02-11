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
 * Weoffer.php.
 *
 * @package     theme_taleem
 * @copyright   2018 VWThemes, vwthemes.com/lms-themes
 * @author      VWThemes
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

  $weofferno = get_config('theme_taleem', 'weofferno');
  $checkboxweoffer = get_config('theme_taleem', 'checkboxweoffer');
  $weoffercolor = get_config('theme_taleem', 'weoffercolor');

?>
<section id="we-offer" style="<?php if ($checkboxweoffer == 1){echo 'display:block;';}
else {echo 'display: none;';} ?>background: <?php echo $weoffercolor; ?>">
  <div class="container">
    <?php
      $tabheading = get_config('theme_taleem', 'weoffertitle');
    ?>
  <div class="we-offer">
    <div class="titlebar with-felements">
      <h2><?php echo($tabheading); ?></h2>
      <div class="line"><span class="bottomline"></span></div>
    </div>
  </div>
    <ul class="nav nav-tabs">
       <?php for($i= 1; $i<= $weofferno; $i++) {
        $tabtitle= get_config('theme_taleem', 'weoffertabtitle'.$i);
      ?>
        <li class="active-class"><a data-toggle="tab" href="#menu<?php echo($i); ?>"><?php echo($tabtitle); ?></a></li>
        <?php } ?>
    </ul>

    <div class="tab-content">
      <?php for($i= 1; $i<= $weofferno; $i++) {
        $tabtext= get_config('theme_taleem', 'weoffertabtext'.$i);
        $weofferimg = theme_taleem_render_weofferimg($i, 'weofferimage'.$i);
      ?>
      <div id="menu<?php echo($i); ?>" class="tab-pane fade in <?php if($i ==1){echo('active');}?>">
        <div class="row">
         <div class="col-md-6 weoffers"> 
            <img src="<?php echo($weofferimg); ?>">
          </div>
          <div class="col-md-6">
            <p><?php echo($tabtext); ?></p>
          </div>
      </div>
        </div>
      <?php } ?>
    </div>
  </div>

</section>