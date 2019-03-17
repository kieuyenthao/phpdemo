$(document).ready(function() {
    var nav = new DayPilot.Navigator("nav");
    nav.showMonths = 3;
    nav.skipMonths = 3;
    nav.init();
    nav.select("2001-01-01");

    var day = new DayPilot.Calendar("dpDay");
    day.viewType = "Day";
    addEventHandlers(day);
    day.init();

    var week = new DayPilot.Calendar("dpWeek");
    week.viewType = "Week";
    addEventHandlers(week);
    week.init();

    var month = new DayPilot.Month("dpMonth");
    addEventHandlers(month);
    month.init();

    function addEventHandlers(dp) {

        // Delete event
        dp.eventDeleteHandling = "Update";
        dp.onEventDeleted = function (args) {
            $.ajax({
                url:"deleteEventCalendar.php",
                method:"POST",
                data:{id: args.e.id()},
                dataType:"json",
                success:function($response){
                    if ($response == 1) {
                        alert("Deleted event");
                    }
                }
            });
        };

        // Move event
        dp.onEventMoved = function (args) {
            $.ajax({
                url:"updateEventCalendar.php",
                method:"POST",
                data:{
                    id: args.e.id(),
                    newStart: args.newStart.toString(),
                    newEnd: args.newEnd.toString()},
                dataType:"json",
                success:function($response){
                    if ($response == 1) {
                        alert("Moved event");
                    }
                }
            });
        };

        // Resize event
        dp.onEventResized = function (args) {
            $.ajax({
                url:"updateEventCalendar.php",
                method:"POST",
                data:{
                    id: args.e.id(),
                    newStart: args.newStart.toString(),
                    newEnd: args.newEnd.toString()},
                dataType:"json",
                success:function($response){
                    if ($response == 1) {
                        alert("Resized event");
                    }
                }
            });
        };

        // event creating
        dp.onTimeRangeSelected = function (args) {
            console.log(args);
            var name = prompt("New event name:", "Event");
            dp.clearSelection();
            if (!name) return;
            var e = new DayPilot.Event({
                start: args.start,
                end: args.end,
                resource: args.resource,
                text: name
            });
            dp.events.add(e);

            $.ajax({
                url:"addEventCalendar.php",
                method:"POST",
                data:{
                    start: args.start.toString(),
                    end: args.end.toString(),
                    name: name,
                    resource: args.resource},
                dataType:"json",
                success:function($response){
                    if ($response == 1) {
                        alert("Created event");
                    }
                }
            });
        };
    }

    // Switch event type (follow day/month/year)
    var switcher = new DayPilot.Switcher({
        triggers: [
            {id: "buttonDay", view: day },
            {id: "buttonWeek", view: week},
            {id: "buttonMonth", view: month}
        ],
        navigator: nav,
        selectedClass: "selected-button",
        onChanged: function(args) {
            switcher.events.load("showEventCalendar.php");
        }
    });

    switcher.select("buttonDay");
});