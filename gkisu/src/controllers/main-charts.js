function ctrGetTheNearestSermon()
{
    let dt = new Date();
    let dd = dt.getDate();
    let mm = dt.getMonth()+1;
    let yyyy = dt.getFullYear();
    let todayDate = yyyy+"-"+mm+"-"+dd;
    let ajaxResult = "";
    
    myj.ajax({
        type: "POST",
        async: false,
        data: { "todayDate":todayDate, "action":"getNearestSermonDate" },
        url: "/gkisu/src/models/main-charts.inc.php",
        dataType: "json",
        complete:function(data){
            ajaxResult = JSON.parse(data.responseText);
        }
    });
    //console.log(ajaxResult);
    return ajaxResult;
}

function ctrGetTotalAttendeesRegistered(sermonID)
{
    console.log("getTotalAttendeesRegistered",sermonID);
    let ajaxResult = "";
    myj.ajax({
        type: "POST",
        data: { "action":"getTotalAttendeedRegistered", "sermonID":sermonID},
        url: "/gkisu/src/models/main-charts.inc.php",
        dataType: "json",
        complete:function(data){
            console.log(data)
            if(!typeof data.responseText === "undefined") ajaxResult = JSON.parse(data.responseText);
        }
    });
    return ajaxResult;
}

function ctrDrawDonutChart()
{
    let colors = ['#007bff','#28a745','#333333','#c3e6cb','#dc3545','#6c757d'];

    let donutOptions = {
        cutoutPercentage: 50, 
        legend: {position:'bottom', padding:5, labels: {pointStyle:'square', usePointStyle:true}}
    };

    var chDonutData1 = {
        labels: ['Attendees Booked', 'Left Capacity'],
        datasets: [
          {
            backgroundColor: colors.slice(2,3),
            borderWidth: 1,
            data: [7, 543]
          }
        ]
    };

    var chDonut1 = myj('#chartBooking1');
    if (chDonut1) {
        new Chart(chDonut1, {
            type: 'doughnut',
            data: chDonutData1,
            options: donutOptions
        });
    }
}

let chart01Title = "Booking Chart - Sermon";


function initMainChartsFunction() {

    return {
        getTheNearestSermon: function(){
            return ctrGetTheNearestSermon();
        },

        getTotalAttendeesRegistered: function(sermonID){
            return ctrGetTotalAttendeesRegistered(sermonID);
        },

        drawDonutChart: function(){
            return ctrDrawDonutChart();
        }
    }
}