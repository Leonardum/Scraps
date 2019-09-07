<?php
include_once('header.html');
?>

<body>
        
    <body onload="calendar()">

        <div class="calendar">


            <div class="month">
                
                <div class="prevnext" onclick="prevNext('previous')">
                    <span>&#10094;</span>
                </div>
                <div class="monthYear">
                    <span class="dropdown" style="float: none;">
                        <span id="monthName" class="goldText"></span>
                        <ul class="dropdown-content">
                            <li>
                                <a onclick="">January</a>
                            </li>
                            <li>
                                <a onclick="">February</a>
                            </li>
                            <li>
                                <a onclick="">March</a>
                            </li>
                            <li>
                                <a onclick="">April</a>
                            </li>
                            <li>
                                <a onclick="">May</a>
                            </li>
                            <li>
                                <a onclick="">June</a>
                            </li>
                            <li>
                                <a onclick="">July</a>
                            </li>
                            <li>
                                <a onclick="">August</a>
                            </li>
                            <li>
                                <a onclick="">September</a>
                            </li>
                            <li>
                                <a onclick="">October</a>
                            </li>
                            <li>
                                <a onclick="">November</a>
                            </li>
                            <li>
                                <a onclick="">December</a>
                            </li>
                        </ul>
                    </span>
                    <br>
                    <span id="year" contenteditable="true" style="font-size:18px;"></span>
                    
                </div>
                <div class="prevnext" onclick="prevNext('next')">
                    <span>&#10095;</span>
                </div>
            </div>


            <div class="weekdays">
                <div class="weekday">Mo</div>
                <div class="weekday">Tu</div>
                <div class="weekday">We</div>
                <div class="weekday">Th</div>
                <div class="weekday">Fr</div>
                <div class="weekday">Sa</div>
                <div class="weekday">Su</div>
            </div>


            <div id="days" class="days"></div>

        </div>
        
    </body>
    
    <script type="text/javascript" src="./js/calendar.js?v1"></script>

</body>


<?php
include_once('footer.html');
?>