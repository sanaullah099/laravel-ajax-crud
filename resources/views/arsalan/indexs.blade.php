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
           <form id="form">
            @csrf()
              <div class="form-group w-50">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
              </div>
              <div class="form-group w-50">
                <label for="phone">Phone</label>
                <input type="number" class="form-control" name="phone" id="phone" placeholder="Enter Phone">
              </div>
              <div class="form-group w-50">
                <label for="city">City</label>
                <select name="city">
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
              <div class="form-group w-50">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image" id="image">
              </div>
              <!-- <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
              </div> -->
              <button type="submit" class="btn btn-primary" id="submit">Submit</button>
            </form>


        </div>
        <script type="text/javascript">
            $('#submit').click(function(e){
                e.preventDefault()
                $.ajax({
                    url: 'ars-formsubmit',
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
        </script>
    </body>
</html>
