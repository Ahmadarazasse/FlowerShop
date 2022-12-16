<html>

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }

        body {
            background: #fff;
        }

        .input-field input[type=date]:focus+label,
        .input-field input[type=text]:focus+label,
        .input-field input[type=email]:focus+label,
        .input-field input[type=password]:focus+label {
            color: #e91e63;
        }

        .input-field input[type=date]:focus,
        .input-field input[type=text]:focus,
        .input-field input[type=email]:focus,
        .input-field input[type=password]:focus {
            border-bottom: 2px solid #e91e63;
            box-shadow: none;
        }
    </style>
</head>

<body>
    <main>
        <div class="section"></div>
        <div class="section"></div>
        <center>
            <a href="/" class="brand-logo black-text center" style="font-size: 30px"><span
                    class="pink-text ">Fill</span> Flower</a>
            <h3 class="">Sign UP</h3>
            <div class="section"></div>
            <div class="container">
                <div class="z-depth-1 grey lighten-4 row"
                    style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

                    <form class="col s12" action="{{ route('users.store') }}" method="POST">
                        @csrf

                        <div class='row'>
                            <div class='input-field col s12'>
                                <input class='validate' type='text' name='name' id='name' />
                                <label for='name'>Username</label>
                                @error('name')
                                    <div class=" red-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class='input-field col s12'>
                                <input class='validate' type='email' name='email' id='email' />
                                <label for='email'>Email</label>
                            </div>
                            <div class=" red-text">{{ session()->get('emailerror') }}</div>
                            @error('email')
                                <div class=" red-text">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class='row'>

                            <div class='input-field col s12'>
                                <input class='validate' type='password' name='password' id='password'
                                    autocomplete="current-password" />
                                <label for='password'>Password</label>
                            </div>
                            @error('password')
                                <div class=" red-text">{{ $message }}</div>
                            @enderror
                            <div class='input-field col s12'>
                                <input class='validate' type='password' name='cpassword' id='cpassword' />
                                <label for='cpassword'>Confirm Password</label>
                            </div>
                            <div class=" red-text">{{ session()->get('error') }}</div>
                        </div>

                        <br />
                        <center>
                            <div class='row'>
                                <button type='submit' class='col s12 btn btn-large waves-effect pink'>Sign up</button>
                            </div>
                        </center>
                    </form>
                </div>
            </div>
            <a href="{{ route('users.index') }}" class="pink-text">I have account</a>
        </center>


    </main>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js">
    </script>
</body>

</html>
