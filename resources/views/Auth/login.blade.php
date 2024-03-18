<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>

<body class="h-screen  flex">

    <div class="w-1/2 m-auto p-3 bg-purple-500 rounded-xl">
        <h1 class="text-2xl text-center mb-2 font-bold">Login</h1>
        <img src="images/login.jpg
        " alt="">
        <form class="flex flex-col rounded-lg  drop-shadow-2xl gap-2" action="{{ url('/register') }}" method="POST">
            @csrf
            <input class="p-2 rounded-lg" type="email" name="email" placeholder="Enter Your Email">
            <input class="p-2 rounded-lg" type="password" name="password" placeholder="Enter Your Password">
            <input class="bg-black rounded-lg text-white font-medium p-2" type="submit" name="sbt"
                value="Login">
        </form>
        <p class="text-center font-medium">Or</p>
        <p class="text-center">Don't have an account ? <a href="{{url('/register')}}" class="text-slate-50 font-medium">Register
                Here</a></p>
    </div>





</body>

</html>
