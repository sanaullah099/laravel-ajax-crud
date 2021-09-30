<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>index of laravelAjaxCrud</title>

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
            <h4>Update Operation</h4>

            <form id="form">
            @csrf()
              <div class="form-group w-50">
                <label for="email">Email address</label>
                <input type="email" class="form-control  W-50" id="email" value="{{$edit->email}}" name="email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group w-50">
                <label for="password">Password</label>
                <input type="text" class="form-control" name="password" id="password" value="{{$edit->password}}">
              </div>
              <input type="hidden" name="id" id="id" value="{{$edit->id}}">
              <button type="submit" class="btn btn-primary" id="submit">Submit</button>
            </form>
            

        </div>

        <script type="text/javascript">
            $('#submit').click(function(e){
                e.preventDefault()
                $.ajax({
                    url: '{{url("update/".$edit->id)}}',
                    data: $('#form').serialize(),
                    type: 'post'
                    });
            });
        </script>
    </body>
</html>
