<!DOCTYPE html>
<html>
  <head>
    <title>Insert Update and Delete record with AJAX in Laravel</title>
    <!-- provide the csrf token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --> <!-- jQuery CDN -->
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
  </head>
  <body>

    <table border='1' id='userTable' style='border-collapse: collapse;'>
      <thead>
        <tr>
          <th>Name</th>
          <th>Phone</th>
          <th>City</th>
          <th>Email</th>
<!--           <th>Image</th>
 -->          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><input type='text' id='name'></td>
          <td><input type='text' id='phone' ></td>
          <td><input type='text' id='city' ></td>
          <td><input type='text' id='email' ></td>
<!--           <td><input type='file' id='image' ></td>
 -->          <td><input type='button' id='submit' value='Add'></td>
        </tr>
      </tbody>
    </table>

<!-- Script -->
<script type='text/javascript'>
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

$(document).ready(function(){

  // Fetch records
  fetchRecords();

  // Add record
  $('#submit').click(function(){

    var name = $('#name').val();
    var phone = $('#phone').val();
    var city = $('#city').val();
    var email = $('#email').val();
    // var image = $('#image').val();

    if(name != '' && phone != '' && email != ''){
      $.ajax({
        url: 'addUser',
        type: 'post',
        data: {_token: CSRF_TOKEN,name: name,phone: phone,city: city,email: email},
        success: function(response){

          if(response > 0){
            var id = response;
            var findnorecord = $('#userTable tr.norecord').length;

            if(findnorecord > 0){
              $('#userTable tr.norecord').remove();
            }
            var tr_str = "<tr>"+
            "<td align='center'><input type='text' value='" + name + "' id='name_"+id+"'  ></td>" +
            "<td align='center'><input type='text' value='" + phone + "' id='phone_"+id+"'></td>" +
            "<td align='center'><input type='text' value='" + city + "' id='city_"+id+"'></td>" +
            "<td align='center'><input type='email' value='" + email + "' id='email_"+id+"' disabled></td>" +
            // "<td align='center'><input type='file' value='" + image + "' id='image_"+id+"'></td>" +
            "<td align='center'><input type='button' value='Update' class='update' data-id='"+id+"' ><input type='button' value='Delete' class='delete' data-id='"+id+"' ></td>"+
            "</tr>";

            $("#userTable tbody").append(tr_str);
          }else if(response == 0){
            alert('Username already in use.');
          }else{
            alert(response);
          }

          // Empty the input fields
          $('#name').val('');
          $('#name').val('');
          $('#email').val('');
        }
      });
    }else{
      alert('Fill all fields');
    }
  });

});

// Update record
$(document).on("click", ".update" , function() {
  var edit_id = $(this).data('id');

  var name = $('#name_').val();
  var phone = $('#phone_').val();
  var city = $('#city_').val();
  var email = $('#email_').val();
  var image = $('#image_').val();

  if(name != '' && email != ''){
    $.ajax({
      url: 'updateUser',
      type: 'post',
      data: {_token: CSRF_TOKEN,name: name,phone: phone,city: city, email: email,image: image},
      success: function(response){
        alert(response);
      }
    });
  }else{
    alert('Fill all fields');
  }
});

// Delete record
$(document).on("click", ".delete" , function() {
  var delete_id = $(this).data('id');
  var el = this;
  $.ajax({
    url: 'deleteUser/'+delete_id,
    type: 'get',
    success: function(response){
      $(el).closest( "tr" ).remove();
      alert(response);
    }
  });
});

// Fetch records
function fetchRecords(){
  $.ajax({
    url: 'getUsers',
    type: 'get',
    dataType: 'json',
    success: function(response){

      var len = 0;
      $('#userTable tbody tr:not(:first)').empty(); // Empty <tbody>
      if(response['data'] != null){
        len = response['data'].length;
      }

      if(len > 0){
        for(var i=0; i<len; i++){

          var id = response['data'][i].id;
          var name = response['data'][i].name;
          var phone = response['data'][i].phone;
          var city = response['data'][i].city;
          var email = response['data'][i].email;
          var image = response['data'][i].image;


          var tr_str = "<tr>" +
          "<td align='center'><input type='text' value='" + name + "' id='name_"+id+"' disabled></td>" +
          "<td align='center'><input type='text' value='" + phone + "' id='phone_"+id+"'></td>" + 
          "<td align='center'><input type='text' value='" + city + "' id='city"+id+"'></td>"+
          "<td align='center'><input type='email' value='" + email + "' id='email_"+id+"'></td>" +
          "<td align='center'><input type='text' value='" + image + "' id='image_"+id+"'></td>"
          "<td align='center'><input type='button' value='Update' class='update' data-id='"+id+"' ><input type='button' value='Delete' class='delete' data-id='"+id+"' ></td>"+
          "</tr>";

          $("#userTable tbody").append(tr_str);

        }
      }else{
        var tr_str = "<tr class='norecord'>" +
        "<td align='center' colspan='4'>No record found.</td>" +
        "</tr>";

        $("#userTable tbody").append(tr_str);
      }

    }
  });
}
</script>

  </body>
</html>