<!doctype html>
<html lang='en'>
<head>
    <title>@yield('title')</title>
    <meta charset='utf-8'>
    <link href='/css/layouts/main.css' rel='stylesheet'>
    @yield('head')
</head>
<body>

<header>
@if(Auth::user())
    <nav class='navigation-user'>
    <ul>
        <ul>
            <li><a href='/'>Home</a></li>
            <li><a href='/dramas'>Drama Collection</a></li>
            <li><a href='/dramas/add'>Add a Drama Record</a></li>
            <li><a href='/latest-reviews'>Latest Drama Reviews</a></li>
            <li><a href='/userdash'>My Own Reviews</a></li>
        </ul>

    
</nav>
@else
<nav class='navigation-non-user'>
    <ul>
        <ul>
            <li><a href='/'>Home</a></li>
            <li><a href='/dramas'>Drama Collection</a></li>
            <li><a href='/register'>Create an Account</a></li>
            <li><a href='/login'>Login</a></li>

        </ul>

    
</nav>

@endif

@if(Auth::user())
<div id='logout-style'>
<h2>
    {{ Auth::user()->name }}, 
    <form method='POST' id='logout' action='/logout'>
                    {{ csrf_field() }}
                    <a href='#' onClick='document.getElementById("logout").submit();'>Logout</a>
                </form>
</h2>
</div>

@endif

</header>

<section>
    @if(session('flash-alert'))
    {{ session('flash-alert') }}
    @endif

    @yield('content')
</section>

<footer>
    <p>@Kristy Sun | CSCI E-15 | Google Fonts: Rubrik | 2021 </p>
</footer>

</body>
</html>