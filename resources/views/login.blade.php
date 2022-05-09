<html>

    <head>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>


    <body class="bg-[#38003c] w-full h-full flex flex-row items-center justify-center">

    <div class="bg-blue-50 h-[700px] w-[400px] p-3">

        <div class="items-center flex flex-column">

            <p class="m-5">If you are a new user, please sign up below:</p>

            @if (session('success'))
                <div class="alert alert-success">
                {{ session('success') }}
                </div>
            @endif

            @if (session('failure'))
                <div class="alert alert-danger">
                {{ session('failure') }}
               
                </div>
            @endif

            <form action="/sign-up" method="post">
            {{ csrf_field() }}
                <div class="flex flex-column items-start">
                    <label>Username:</label>
                    <input class="p-2 h-[30px]" name="new_user">
                </div>

                <div class="flex flex-column items-start">
                    <label>Email:</label>
                    <input class="p-2 h-[30px]" name="new_email">
                </div>

                <div class="flex flex-column items-start">
                    <label>Password:</label>
                    <input class="p-2 h-[30px]" name="new_password">
                </div>

                <button type="submit" class="bg-green-200 w-full" name="signup">Sign Up</button>
            </form>

        </div>

        <div class="items-center flex flex-column">

            <p class="m-5">Or if you are an existing user, pleasee log in:</p>

            @if (session('failure'))
                <div class="alert alert-danger">
                {{ session('failure') }}
                </div>
            @endif

            <form action="/user-log-in">
            {{ csrf_field() }}
                <div class="flex flex-column items-start">
                    <label>Username:</label>
                    <input class="p-2 h-[30px]" name="enter_user">
                </div>

                <div class="flex flex-column items-start">
                    <label>Password:</label>
                    <input class="p-2 h-[30px]" name="enter_password"> 
                </div>

                <button type="submit" class="bg-green-200 w-full" name="login">Log In</button>
            </form>

        </div>

    </div>

    

    </body>

</html>