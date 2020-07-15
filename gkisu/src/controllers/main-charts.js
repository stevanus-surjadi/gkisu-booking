async function ctrGetTheNearestSermon()
{
    let dt = new Date();
    let dd = dt.getDate();
    let mm = dt.getMonth()+1;
    let yyyy = dt.getFullYear();
    let todayDate = yyyy+"-"+mm+"-"+dd;
    let ajaxResult; 
    try{
        ajaxResult = await myj.ajax({
            type: "POST",
            data: { "todayDate":todayDate, "action":"getNearestSermonDate" },
            url: "gkisu/src/models/main-charts.inc.php",
            dataType: "json"
        });
    }
    catch(error)
    {
        console.log(error);
    }
    return ajaxResult;
}

async function ctrGetSermonDataForPrevWeeks()
{
    let dt = new Date();
    let dd = dt.getDate();
    let mm = dt.getMonth()+1;
    let yyyy = dt.getFullYear();
    let todayDate = yyyy+"-"+mm+"-"+dd;
    let ajaxResult; 
    try{
        ajaxResult = await myj.ajax({
            type: "POST",
            data: { "todayDate":todayDate, "action":"getSermonDataForPrevWeeks" },
            url: "gkisu/src/models/main-charts.inc.php",
            dataType: "json"
        });
    }
    catch(error)
    {
        console.log(error);
    }
    return ajaxResult;
}

async function ctrGetSermonDataForPrevMonth()
{
    let dt = new Date();
    let dd = dt.getDate();
    let mm = dt.getMonth()+1;
    let yyyy = dt.getFullYear();
    let todayDate = yyyy+"-"+mm+"-"+dd;
    let ajaxResult; 
    try{
        ajaxResult = await myj.ajax({
            type: "POST",
            data: { "todayDate":todayDate, "action":"getSermonDataForPrevMonth" },
            url: "gkisu/src/models/main-charts.inc.php",
            dataType: "json"
        });
    }
    catch(error)
    {
        console.log(error);
    }
    return ajaxResult;
}

async function ctrGetTotalAttendeesRegistered(sermonID)
{
    let ajaxResult;
    try{
        ajaxResult = await myj.ajax({
            type: "POST",
            data: { "action":"getTotalAttendeesRegistered", "sermonID":sermonID},
            url: "gkisu/src/models/main-charts.inc.php",
            dataType: "json"
        });
    }
    catch (error)
    {
        console.log(error);
    }

    return ajaxResult;
}

function ctrDrawDonutChart(ChartData,index)
{
    let colors = ['#007bff','#28a745','#333333','#c3e6cb','#dc3545','#6c757d'];

    let capacity = (parseInt(ChartData['capacity']));
    let attendees = ChartData['totalAttendees'];

    let donutOptions = {
        cutoutPercentage: 50, 
        legend: {position:'bottom', padding:5, labels: {pointStyle:'circle', usePointStyle:true}}
    };

    let chDonutData1 = {
        labels: ['Attendees Booked', 'Left Capacity'],
        datasets: [
          {
            backgroundColor: colors.slice(2,3),
            borderWidth: 1,
            data: [ attendees, (capacity - attendees) ]
          }
        ]
    };

    let chDonut1 = myj('#chartBooking'+index);
    if (chDonut1) {
        new Chart(chDonut1, {
            type: 'doughnut',
            data: chDonutData1,
            options: donutOptions
        });
    }
}

function ctrDrawBarGroupChart(ChartData,index,barLabel,barGroupLabel)
{
    let barData = {
        labels: [ barGroupLabel ],
        datasets:[  { 
                        label: barLabel[0],
                        backgroundColor: "",
                        data: []
                    },
                    {
                        label: barLabel[1],
                        backgroundColor: "",
                        data: []
                    },
                    {
                        label: barLabel[2],
                        backgroundColor: "",
                        data: []
                    }]
    };
    let ctx = myj("#myChart");
    if(ctx) {
        new Chart(ctx, {
            type: 'Bar',
            data: data
        });
    }
}

let chart01Title = "Booking Chart - Sermon";

function initMainChartsFunction() {

    return {
        getTheNearestSermon: function(){
            return ctrGetTheNearestSermon();
        },

        getSermonDataForPrevWeeks: function(){
            return ctrGetSermonDataForPrevWeeks();
        },

        getSermonDataForPrevMonth: function(){
            return ctrGetSermonDataForPrevMonth();
        },

        getTotalAttendeesRegistered: function(sermonID){
            return ctrGetTotalAttendeesRegistered(sermonID);
        },

        drawDonutChart: function(ChartData,index){
            return ctrDrawDonutChart(ChartData,index);
        }
    }
}