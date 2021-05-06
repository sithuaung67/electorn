<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>StarZone Login</title>
    <link rel="stylesheet" href="{{asset('css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="icon" type="image/png" href="{{asset('../../favicon.ico')}}">

</head>
<body>

    <div class="container">
        
        <div class="login">
            <form action="{{route('login')}}" method="POST" class="login-form" id="appointment-form" autocomplete="off">
                @csrf
                <h2>Login to admin</h2>
                <div class="form-group-1">
                   
                    <input type="email" name="email" id="email" placeholder="Email" required />

                    <input type="password" name="password" id="password" placeholder="Password" required />
                  
                </div>
                <div class="form-check">
                    <h4>
                    <label for="agree-term" class="label-agree-term">
                        <a href="http://app.myinthidarjewellery.com/" target="_blank" class="term-service">MTD2020</a>
                    </label>
                    <label for="agree-term" class="label-agree-term" style="margin-left: 5px;">
                        <a href="http://data.myinthidarjewellery.com/" target="_blank" class="term-service">MTD2019</a>
                    </label>
                </h4>
                </div>
                <div class="form-submit">
                    <button type="submit" class="submit" id="submit">login</button>
                   
                </div>
            </form>
        </div>

    </div>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    
</body>
</html>