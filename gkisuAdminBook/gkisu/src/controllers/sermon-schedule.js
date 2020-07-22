function formIsValidation(oTime,oStartDate,oEndDate)
{
  let errIndex = 0;
  let errMsg = "";
  
  //alert(oStartDate.length);

  if(!myj('#scheduleName').val()){
    errIndex++;
    errMsg+="Schedule Name cannot be empty<br>";
  }
  if(typeof oStartDate === "undefined"){
    errIndex++;
    errMsg+="Start Date cannot be empty<br>";
  }
  if(typeof oEndDate === "undefined"){
    errIndex++;
    errMsg+="End Date cannot be empty<br>";
  }
  if(typeof oTime === "undefined"){
    errIndex++;
    errMsg+="Time cannot be empty<br>";
  }
  if(!myj('#inputCapacity').val()){
    errIndex++;
    errMsg+="Capacity cannot be empty<br>";
  }

  if(errIndex!=0){
    myj('#displayStatus').addClass('alert alert-danger').html(errMsg).show();
    return false;
  }else {
    //successMsg="New Schedule successfully saved";
    myj('#displayStatus').removeClass('alert-danger').hide();
    return true;
  }
}

function ctrSaveSermonSchedule()
{
    let oStartDate = myj('#pickupStartDate').data('date');
    let oEndDate = myj('#pickupEndDate').data('date');
    let oTime = myj('#pickupTime').data('date');
    let oInterval = myj('#selectInterval').children('option:selected').val();
    let oScheduleName = myj('#scheduleName').val();

    let _bodyData = myj('#formSchedule').serializeArray();
    _bodyData.push( { name:"pickupStartDate", value: oStartDate},
                    { name:"pickupEndDate", value: oEndDate},
                    { name:"pickupTime", value: oTime}
                  );
    if(formIsValidation(oTime,oStartDate,oEndDate))
    {
        let _action = "saveSchedule";
        _bodyData.push( {name:"action", value:_action} );
        myj.ajax({
            type: "POST",
            url: "gkisu/src/models/sermon-schedule.inc.php",
            data:  _bodyData,
            success: function(data){
                let ajaxMsg = data + " schedules has successfully added";
                myj('#displayStatus').html(ajaxMsg).removeClass('alert-danger').addClass('alert-success').show();
            }
        });
    }   
}

function ctrDisplaySermonSchedule()
{
    let dt = myj('#sermonSchedule').DataTable({
        "ServerSide": false,
        "draw": 1,
        "ajax":{
           type: "POST",
           data: {"action":"loadSermonSchedule"},
           url: "gkisu/src/models/sermon-schedule.inc.php",
           dataSrc: function(data) {
                      if(data == "no data"){
                        return [];
                      }
                      return data;
                    },
          dataFilter: function(data) {
                      let json = myj.parseJSON(data);
                      recordsTotal = json.total;
                      return data;
                    }
         },
        "columns": [
          { "title": "Sermon ID", "data": "sermonID"},
          { "title": "Sermon Name", "data": "sermonName"},
          { "title": "Sermon Date Time", "data": "sermonDateTime"},
          { "title": "Capacity", "data": "capacity"},
          { "title": "Action", "data": "action",
          "defaultContent": `<button id=\"btnActionDelete\" 
                              class=\"btnActionDelete btn btn-secondary\">
                              Delete</button>`}
         ],
         "buttons": [
           'excelHtml5',
           'csvHtml5',
           'pdfHtml5'
         ],
         "scroller": false,
         "dom": 'BSfrtipl',
         "order": [[1, "asc" ]],
         "responsive": false,
         "scrollY": '600px',
         "scrollX": true,
         "scrollCollapse": true,
         "paging": true,
         "pageLength": 5,
         "lengthChange": true,
         "lengthMenu" : [[5,10,25,50,-1],[5,10,25,50,"All"]],
         "searching": true,
         "ordering": true,
         "info": true,
         "autoWidth": false,
         "fixedColumns": false,
         "bProcessing": false,
      });
    return dt;
}

function ctrDeleteSermonSchedule(param1)
{
    console.log(param1);
    
    let sermonID = param1['sermonID'];
    let sermonName = param1['sermonName'];
    let sermonDateTime = param1['sermonDateTime'];
    let sermonCapactiy = param1['capacity'];
    //console.log(sermonID);
    //DELETE SAFETY
    let confirmMsg = "You are about to erase a sermon schedule.\nPlease be noted that this action cannot be undone!\nAre you sure to delete this sermon schedule?\n";
    confirmMsg += "\nSermon name: " + sermonName;
    confirmMsg += "\nSermon date time: " + sermonDateTime; 
    confirmMsg += "\nCapcity: " + sermonCapactiy;
    if(confirm(confirmMsg)) {
      //alert("setujuh");
      let int1 = Math.floor(Math.random()*10)+1;
      let int2 = Math.floor(Math.random()*10)+1;
      if(prompt(int1 + "+" +int2) == int1+int2) {
        _bodyData = ({"sermonID":sermonID, "action":"deleteSermonSchedule"});
        //console.log(_bodyData);
        myj.ajax({
          type: 'POST',
          data: _bodyData,
          dataType: "json",
          url: "gkisu/src/models/sermon-schedule.inc.php",
          success: function(data){
            //console.log(data['affectedRows']);
            if(data['affectedRows'] == 1){
                //alert("delete success");
                let ajaxMsg = data['affectedRows'] + " sermon has been deleted successfully";
                myj('#mainDisplayStatus').html(ajaxMsg).removeClass('alert-danger').addClass('alert-success').show();
            }
          },
          complete:function(data){
              myj('#sermonSchedule').DataTable().ajax.reload();
          }
        });
      }else{
        alert("Wrong value! Action cancelled!");
      }

      
    };
}

function initSermonScheduleFunction()
{
    return {
        saveSermonSchedule: function(){
            return ctrSaveSermonSchedule();
        },

        deleteSermonSchedule: function(param1){
            console.log(param1);
            return ctrDeleteSermonSchedule(param1);
        },

        displaySermonSchedule: function(){
            return ctrDisplaySermonSchedule();
        }
    }
}