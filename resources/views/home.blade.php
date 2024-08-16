@extends('layouts.app')

@section('content')
<style>
html, body {
    height: 100%; 
    margin: 0; 
    display: flex; 
    align-items: center; 
    justify-content: center; 
    overflow: hidden; 
}

#container {
    width: 100%;
    max-width: 1200px;
    padding: 20px;
    background-color: #030420; 
    color: #fff;
    border-radius: 10px; 
    text-align: center;
    box-shadow: none; 
    box-sizing: border-box; 
    overflow: auto; 
}

#header {
    margin-top: 0; 
}

#header .logo img {
    width: 100px; 
    height: auto; 
    margin-bottom: 20px;
}

#header .content {
    margin-bottom: 20px;
}

#header .inner h1 {
    font-size: 2.5rem; 
    color: #ff5d0d;
    margin-bottom: 10px;
}

#header .inner p {
    font-size: 1.5rem; 
    color: #ddd; 
    margin-bottom: 30px; 
}

#header nav {
    margin-top: 20px;
}

#header nav ul {
    list-style: none;
    padding: 0;
    display: flex;
    justify-content: center;
    gap: 15px; 
    margin: 0;
}

#header nav ul li {
    display: inline;
}

#header nav ul li a {
    text-decoration: none;
    padding: 10px 20px;
    background-color: #397eb7; 
    color: #fff;
    border-radius: 5px;
    transition: background-color 0.3s, transform 0.1s;
    font-size: 1rem; 
}

#header nav ul li a:hover,
#header nav ul li a:active {
    background-color: #ff5d0d; 
    transform: scale(0.98); 
}

#main {
    margin: 20px auto;
    padding: 20px;
    color: #fff;
    border-radius: 10px; 
}

</style>
<div id="container">
    <header id="header">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </div>
        <div class="content">
            <div class="inner">
                <h1>بانوراما القصيم للبرمجة والتصميم</h1>
                <p>نقدم لعملائنا أفضل الحلول والخدمات الرقميـة المتكاملة</p>
            </div>
        </div>
        <nav>
            <ul>
                <li><a href="{{ url('/login') }}" class="button">تسجيل الدخول</a></li>
                <li><a href="{{ url('/contact') }}">تواصل معنا</a></li>
                <li><a href="{{ url('/clients') }}">عملائنا</a></li>
                <li><a href="{{ url('/services') }}">خدماتنا</a></li>
                <li><a href="{{ url('/about') }}">من نحن</a></li>

            </ul>
        </nav>
    </header>

    <div id="main">
    </div>
</div>
@endsection
