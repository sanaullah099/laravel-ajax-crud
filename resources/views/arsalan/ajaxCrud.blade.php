<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Arsalan index of laravelAjaxCrud</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        
        <!-- Styles -->
        

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <div class="container">
           <!--  <a href="create" class="btn btn-primary">Retrive</a> -->
            <h1>Well Come to Laravel AJAX CRUD</h1>
           <form id="ajaxform">
            @csrf()
              <div class="form-group w-50">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name"  placeholder="Enter Name">
              </div>
              <div class="form-group w-50">
                <label for="phone">Phone</label>
                <input type="number" class="form-control" name="phone"  placeholder="Enter Phone">
              </div>
              <div class="form-group w-50">
                <label for="city">City</label>
                <select name="city" class="form-control">
                    <option value="islamabad">Islamabad</option>
                    <option value="karachi">Karachi</option>
                    <option value="peshawar">Peshawar</option>
                    <option value="lahore">Lahore</option>
                    <option value="quetta">Quetta</option>
                </select>
              </div>
              <div class="form-group w-50">
                <label for="email">Email address</label>
                <input type="email" class="form-control  W-50" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
             <!--  <div class="form-group w-50">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image" id="image">
              </div> -->
              <!-- <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
              </div> -->
              <button type="submit" class="btn btn-primary save-data" id="submit">Submit</button>
            </form>
            <br>
            <label for="ajax-data">Total number fo Record</label>
            <input type="text" id="ajax-data" disabled="">
            <br><br>
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">S.No</th>
                  <th scope="col">Primary Key</th>
                  <th scope="col">Name</th>
                  <th scope="col">Phone</th>
                  <th scope="col">City</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody id="ajax">
                <!-- table of ajax -->
              </tbody>
            </table>

<!-- ================================Modal for edit===================================-->
                <div class="modal fade bd-example-modal-lg" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                       <div class="modal-header">
                            <h5 class="modal-title">Update Form</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form id="ajaxUform">
                            @csrf()
                              <div class="form-group w-50">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" >
                              </div>
                              <div class="form-group w-50">
                                <label for="phone">Phone</label>
                                <input type="number" class="form-control" name="phone" id="phone" placeholder="Enter Phone">
                              </div>
                              <div class="form-group w-50">
                                <label for="city">City</label>
                                <select name="city" class="form-control" id="city">
                                    <option value="islamabad">Islamabad</option>
                                    <option value="karachi">Karachi</option>
                                    <option value="peshawar">Peshawar</option>
                                    <option value="lahore">Lahore</option>
                                    <option value="quetta">Quetta</option>
                                </select>
                              </div>
                              <div class="form-group w-50">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control  W-50" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                              </div>
                              <input type="hidden" name="editId" id="editId">
                              <button type="submit" class="btn btn-primary save-data" id="submitupdate">Submit</button>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                    </div>
                  </div>
                </div>
<!-- ==========================================end edit modal=============================-->

        </div>
        <script>
//  =================================Fetch Record From DB Table==================>
            function ajaxResponse(){
                 $.ajax({
                    url: "ajax-response",
                    method: "get",
                    success: function(response){
                          var html = '';
                          var i=1;
                        response.data.forEach(function(element){
                            
                            html+='<tr>';
                            html+='<td>'+ i + '</td>';
                            html+='<td>'+ element.id + '</td>';
                            html+='<td>'+ element.name + '</td>';
                            html+='<td>'+ element.phone + '</td>';
                            html+='<td>'+ element.city + '</td>';
                            html+='<td>'+ element.email + '</td>';
                            html+='<td>'+
                                `<button class="btn btn-sm btn-danger del" data-id=${element.id}> Del </button>` +
                                `<button class="btn btn-sm btn-warning edit"  data-toggle="modal" data-target=".bd-example-modal-lg" data-id=${element.id}> Edit </button>` 
                              + '</td>';
                              i++;
                            html+='</tr>'; 
                            
                            console.log(element);
                        });
                         $('#ajax').html(html);
                        var no_of_rows = $('#ajax tr').length;
                        $('#ajax-data').val(no_of_rows);
                    }
                });
            }
            $(document).ready(function(){
               ajaxResponse();
            });

              $(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });
//  =================================END Fetch Record From DB Table=============================

// ============================DELETE===========================================================
              // var deleteID
              // $(document).on('click', '.del', function(){
              //   deleteID = $(this).data('id');
              // });
               $(document).on('click', '.del', function(e){
                e.preventDefault();
                deleteID = $(this).data('id');
                var id = deleteID;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                url: `ajax-delete/${id}`,
                method: 'DELETE',
                success: function(result) {
                     alert("deleted successfully");
                    ajaxResponse();
                },
                error: function(e) {
                    console.log(e);
                    console.log('error in code');
                }
                });
            });
// =====================================End Delete=======================================

// =====================================Edit show========================================
               $(document).on('click', '.edit', function(e){
                e.preventDefault();
                editID = $(this).data('id');
                var id = editID;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                url: `ajax-show/${id}`,
                method: 'GET',
                success: function(result) {
                   if(result) {
                    $("#editId").val(result.data.id);
                    $("#name").val(result.data.name);
                    $("#phone").val(result.data.phone);
                    $("#city").val(result.data.city);
                    $("#email").val(result.data.email);
                }
            }
                });
            });
// =========================End Edit show===================================================

// =========================update==========================================================
                 $('#submitupdate').click(function(e) {
                    e.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "ajax-update",
                        method: 'PUT',
                        data: {
                            id:$("#editId").val(),
                            name: $('#name').val(),
                            phone: $('#phone').val(),
                            city: $('#city').val(),
                            email: $('#email').val()
                        },
                        success: function(result) {
                            $("#updateModal").modal('hide');
                             ajaxResponse();
                        }
                    });
                });
// =========================End update========================================================

 // =========================Create===========================================================

          $(".save-data").click(function(event){
              event.preventDefault();

              let name = $("input[name=name]").val();
              let phone = $("input[name=phone]").val();
              let city = $("select[name=city]").val();
              let email = $("input[name=email]").val();
              // let _token   = $('meta[name="csrf-token"]').attr('content');

              $.ajax({
                url: "ajax-store",
                type:"POST",
                data:{
                  name:name,
                  phone:phone,
                  city:city,
                  email:email,
                  // _token: _token
                },
                success:function(response){
                    ajaxResponse();                  // console.log(response);
                  // if(response) {
                  //   $('.success').text(response.success);
                    $("#ajaxform")[0].reset();
                  }
               });
               });
          // function del(){
          //   alert('Allah k fazal o karam sy delete hoga');
          // }
// =========================End create========================================================
        </script>
<!--         <script type="text/javascript">
            $('#submit').click(function(e){
                e.preventDefault()
                $.ajax({
                    url: 'ajax-store',
                    data: $('#form').serialize(),
                    type: 'post',
                    success: function(result){
                        alert(result);
                    },
                    error: function(result){
                        alert(result);
                    }
                    });
                // alert($(`#email`).val() + ` and ` + $(`#password`).val());
            });
        </script> -->
    </body>
</html>
