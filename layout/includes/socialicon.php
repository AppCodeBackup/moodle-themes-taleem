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
 * The maintenance layout.
 *
 * @package   theme_taleem
 * @copyright 2018 VWThemes, vwthemes.com/moodle-themes
 * @author    VWThemes
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();
?>
{{#blockarrange}}
    <div class="footer-main">
        <div class="container">
            <div class="row">
                {{# block1}}
                <div class="{{colclass}}">
                    <div class="social-media">
                        <h4>{{socialicon}}</h4>
                        <ul>
                            {{# fburl}}
                            <li class="smedia-01">
                                <a href="{{fburl}}" target="_blank">
                                    <span class="media-icon">
                                    <i class="fa {{fb}}"></i>
                                    </span>
                                    <span class="media-name">{{fbn}}</span>
                                </a>
                            </li>
                            {{/ fburl}}

                            {{# twurl}}
                            <li class="smedia-02">
                                <a href="{{twurl}}" target="_blank">
                                    <span class="media-icon">
                                    <i class="fa {{tw}}"></i>
                                    </span>
                                    <span class="media-name">{{twn}}</span>
                                </a>
                            </li>
                            {{/ twurl}}

                            {{# gpurl}}
                            <li class="smedia-03">
                                <a href="{{gpurl}}" target="_blank">
                                    <span class="media-icon">
                                    <i class="fa {{gp}}"></i>
                                    </span>
                                    <span class="media-name">{{gpn}}</span>
                                </a>
                            </li>
                            {{/ gpurl}}

                            {{# pinurl}}
                            <li class="smedia-04">
                                <a href="{{pinurl}}" target="_blank">
                                   <span class="media-icon">
                                   <i class="fa {{pi}}"></i>
                                   </span>
                                   <span class="media-name">{{pin}}</span>
                                </a>
                            </li>
                            {{/ pinurl}}
                        </ul>
                    </div>
                </div>
                {{/ block1}}
            </div>
        </div>
    </div>
