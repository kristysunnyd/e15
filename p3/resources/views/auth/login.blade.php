@extends('layouts/main')

@section('content')
    <div id='login'>
    <h1>Login</h1>

    Don’t have an account? <a href='/register'>Register here...</a>

    <form method='POST' action='/login'>

        {{ csrf_field() }}

        <label for='email'>E-Mail Address</label>
        <input id='email' type='email' name='email' value='{{ old('email') }}' autofocus>
        @include('includes.error-field', ['fieldName' => 'email'])
        <br>

        <label for='password'>Password</label>
        <input id='password' type='password' name='password'>
        @include('includes.error-field', ['fieldName' => 'password'])
        <br>
        <label>
            <input type='checkbox' name='remember' {{ old('remember') ? 'checked' : '' }}> Remember Me
        </label>
        <br>
        <button type='submit' class='btn btn-primary'>Login</button>

    </a>

    </form>
    </div>

@endsection