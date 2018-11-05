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
