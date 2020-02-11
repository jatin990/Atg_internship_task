<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    {{-- <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
    @else
    <a href="{{ route('login') }}">Login</a>

    @if (Route::has('register'))
    <a href="{{ route('register') }}">Register</a>
    @endif
    @endauth
    </div>
    @endif --}}

    <div class="content">
        <div class="title m-b-md">
            ATG
        </div>

        {{-- <form id='register' action="{{route('api.data.post')}}" method="post"> --}}

        {{-- @if(Session::has('message'))

        @endif --}}
        <span class="alert alert-sucess" role="alert">
            <strong id="message"></strong>
        </span>

        <div class="row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input type="text" class="form-control" name="name" value="" required autofocus>
                <div>
                    {{-- @error('name')
                    
                    @enderror --}}
                    <div>
                        <strong id="name"></strong>
                    </div>
                </div>
            </div>
        </div>
        @csrf

        <div class="row">
            <label for="pincode" class="col-md-4 col-form-label text-md-right">{{ __('pincode') }}</label>

            <div class="col-md-6">
                <input type="text" class="form-control " name="pincode" value="" required autofocus>
                <div>
                    {{-- @error('pincode') --}}
                    <div>
                        <strong id="pincode"></strong>
                    </div>
                    {{-- @enderror --}}
                </div>
            </div>
        </div>


        <div class="row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('email') }}</label>

            <div class="col-md-6">
                <input type="text" class="form-control @error('email')  @enderror" name="email" value="" required
                    autofocus>
                <div>
                    {{-- @error('email') --}}
                    <div>
                        <strong id="email"></strong>
                    </div>
                    {{-- @enderror --}}
                </div>
            </div>
        </div>

        <div class="row">
            <button type="button" name="Submit" id="Submit" class="btn btn-success">Submit</button>
        </div>

        </form>
    </div>
    </div>
</body>

<script>
    $(document).ready(function() {

function load_data(name,pincode,email) {
$.ajax({
headers: {
"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
},
url: "{{ route('api.data.post') }}",
method: "POST",
data: {
name: name,
pincode:pincode,
email:email,
},
dataType: "json",
success: function(data) {
    if(data.status==0){
$('#message').html('');
        $('#name').html('');
        $('#pincode').html('');
        $('#email').html('');
        if(data.errors.name)
        $('#name').html(data.errors.name);
        if(data.errors.pincode)
        $('#pincode').html(data.errors.pincode);
        if(data.errors.email)
        $('#email').html(data.errors.email);
}
if(data.status==1){
$('#name').html('');
$('#pincode').html('');
$('#email').html('');
$("input[name=name]").val('');
$("input[name=pincode]").val('');
$("input[name=email]").val('');
$('#message').html('Data submitted successfully')
}
}
    });
}

    $("#Submit").click(function() {
        var name = $("input[name=name]").val();
        var pincode = $("input[name=pincode]").val();
        var email = $("input[name=email]").val();
        load_data(name,pincode,email);
    });
});
</script>

</html>