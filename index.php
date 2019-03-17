<!DOCTYPE html>
<html>
<head>
    <title>HTML5 Calendar with Day/Week/Month Views (JavaScript, PHP)</title>

    <!-- calender view stylesheet -->
    <link type="text/css" rel="stylesheet" href="view/asset/css/layout.css" />

    <!-- event stylesheet -->
    <link type="text/css" rel="stylesheet" href="view/asset/css/event.css" />

    <!-- helper libraries -->
    <!-- <script src="js/jquery-1.9.1.min.js" type="text/javascript"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- daypilot libraries -->
    <script src="view/asset/js/daypilot-all.min.js" type="text/javascript"></script>
    <script src="view/asset/js/event.js" type="text/javascript">  </script>

</head>
<body>
<div id="header">
    <div class="bg-help">
        <div class="inBox">
            <h1 id="logo"><a href='http://code.daypilot.org/27988/html5-calendar-with-day-week-month-views-javascript-php'>HTML5 Calendar with Day/Week/Month Views (JavaScript, PHP)</a></h1>
            <hr class="hidden" />
        </div>
    </div>
</div>
<div class="shadow"></div>
<div class="hideSkipLink">
</div>
<div class="main">

    <div style="float:left; width: 160px;">
        <div id="nav"></div>
    </div>
    <div style="margin-left: 160px;">
        <div class="space buttons">
            <a id="buttonDay" href="#">Day</a>
            <a id="buttonWeek" href="#">Week</a>
            <a id="buttonMonth" href="#">Month</a>
        </div>
        <div id="dpDay"></div>
        <div id="dpWeek"></div>
        <div id="dpMonth"></div>
    </div>

</div>
<div class="clear">
</div>

</body>
</html>

