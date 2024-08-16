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

.alert-success {
    padding: 15px;
    margin-bottom: 20px;
    background-color: #4CAF50;
    color: white;
    border-radius: 5px;
    text-align: center;
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
                <p>نقدم لعملائنا أفضل الحلول والخدمات الرقمية المتكاملة</p>
            </div>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        تسجيل الخروج
                    </a>
                </li>
                <li><a href="{{ route('view.messages') }}">عرض الرسائل</a></li>
                <li><a href="{{ route('manage.clients') }}">إدارة العملاء</a></li>
                <li><a href="{{ route('manage.services') }}">إدارة الخدمات</a></li>
            </ul>
        </nav>
    </header>

    <div id="main">
        
        <h2>مرحبًا بك في لوحة التحكم</h2>
    </div>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
@endsection
