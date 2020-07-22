function ctrLoadSelectSermonDateTime(paramDate)
{
    $select = myj('#selectSermonDateTime').select2({
      theme: "bootstrap4",
      tags: true,
      //dropdownParent: myj('#modalSample'),
      placeholder: function() {
        myj(this).data('placeholder');
      },
      ajax: {
        url: "gkisu/src/models/booking-validation.inc.php",
        type: "POST",
        dataType: "json",
        delay: 250,
        data: function(params){
          //console.log(params);
          return {  
            searchTerm: params.term,
            //pageLimit: 10,
            sermonDate:paramDate,
            action: "loadSermonSelect2bs4"
          };
        },
        processResults: function(data) {
          let dataTransform = [];
          myj.each(data, function(key, value) {
            dataTransform.push({
              "id":value.sermonID,
              "text":value.sermonDateTime
            });
          });
          return {
            "results":dataTransform
          };
        },
        cache: false
      }
    });
}

function ctrLoadDataTableBookingConfirmation(sermonData)
{
    //console.log(sermonData[0]['sermonID']);
    let _bodyData = new Array;
    _bodyData.push ({"action":"loadBookingConfirmation",
                    "sermonID":sermonData[0]['sermonID'],
                    "sermonDateTime":sermonData[0]['sermonDateTime']});
    console.log(_bodyData);

    let dt = myj('#sermonBooking').DataTable({
        "ServerSide": true,
        "draw": 1,
        "ajax":{
           type: "POST",
           data: {  "action":"loadBookingConfirmation",
                    "sermonID":sermonData[0]['sermonID'],
                    "sermonDateTime":sermonData[0]['sermonDateTime']
                },
           url: "gkisu/src/models/booking-validation.inc.php",
           dataSrc: function(data) {
                      return data;
                    },
           dataFilter: function(data) {
                      let json = myj.parseJSON(data);
                      recordsTotal = json.total;
                      return data;
                    }
         },
        "columns": [
          { "title": "BookingID", "data": "bookingID"},
          { "title": "Sermon Name", "data": "sermonName"},
          { "title": "Sermon Schedule", "data": "sermonDateTime"},
          { "title": "Fullname", "data": "fullname"},
          { "title": "Attendees","data": "pax"}, 
          { "title": "Mobile", "data": "mobile"}
         ],
         "buttons": [
           'excelHtml5',
           'csvHtml5',
           'pdfHtml5'
         ],
         "retrieve": true,
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
    //console.log(dt);
    return dt;
}

function initBookingValidationFunction(){
    
    return {
        loadSelectSermonDateTime: function(paramDate){
            return ctrLoadSelectSermonDateTime(paramDate);
        },

        loadDataTableBookingConfirmation: function(sermonData){
            return ctrLoadDataTableBookingConfirmation(sermonData);
        }
    }
    
}