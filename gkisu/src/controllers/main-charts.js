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

function ctrDrawBarGroupChart(ChartData)
{
    let totalAttendees = new Array();
    let barLabels = new Array();

    for(let i=0;i<ChartData.length;i++){
        totalAttendees.push(ChartData[i]['totalAttendees']);
        barLabels.push(ChartData[i]['sermonDate']+" "+ChartData[i]['sermonTime']);
    }
    console.log("barLabels: ",barLabels);


    let barData = {
        labels: barLabels ,
        datasets:   [{ 
                        label: "# of Attendees",
                        data: totalAttendees,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                          ],
                          borderWidth:1
                    }]
    };

    let chartOptions = { options: {
        responsive: false,
        scales: {
          xAxes: [{
            ticks: {
              maxRotation: 90,
              minRotation: 80
            }
          }],
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    }
    let ctx = myj("#chartSummary1");
    if(ctx) {
        new Chart(ctx, {
            type: 'bar',
            data: barData,
            options: chartOptions
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
        },

        drawBarGroupChart: function(ChartData){
            return ctrDrawBarGroupChart(ChartData);
        }
    }
}