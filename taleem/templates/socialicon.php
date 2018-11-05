{{!
    This file is part of Moodle - http://moodle.org/

    Moodle is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    Moodle is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Moodle.  If not, see <http://www.gnu.org/licenses/>.
}}
{{!
    @template theme_taleem/footer.
    Taleem footer layout template.
}}
<footer id="footer" class="py-3 bg-dark text-light">
{{#blockarrange}}
    <div class="footer-main">
        <div class="container">
            <div class="row">
                {{# block3}}
                <div class="{{colclass}}">
                    <div class="social-media">
                        <h4>{{footerbtitle3}}</h4>
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
                {{/ block3}}
            </div>
        </div>
    </div>
{{/blockarrange}}
{{#copyright}}
<div class="footer-foot">
    <div class="container">{{{copyright}}}</div>
</div>
{{/copyright}}

</footer>

<footer>
{{{output.standard_footer_html}}}

{{# output.page_doc_link }}
    <p class="helplink">{{{ output.page_doc_link }}}</p>
{{/ output.page_doc_link }}

{{{ output.standard_end_of_body_html }}}

</footer>

{{#js}}
require(['theme_boost/loader']);
require(['theme_boost/drawer'], function(mod) {
    mod.init();
});
{{/js}}