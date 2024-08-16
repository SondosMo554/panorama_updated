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
    direction: rtl; 
}

#container {
    width: 100%;
    max-width: 1000px; 
    padding: 50px; 
    background-color: #030420; 
    color: #fff;
    border-radius: 20px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3); 
    box-sizing: border-box; 
}

.login-form {
    background-color: #fff; 
    color: #000; 
    border-radius: 20px; 
    padding: 50px; 
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3); 
    text-align: right; 
}

.login-form h2 {
    font-size: 2.8rem; 
    color: #ff5d0d; 
    margin-bottom: 30px; 
}

.login-form .form-group {
    margin-bottom: 30px; 
}

.login-form label {
    display: block;
    margin-bottom: 12px; 
    font-size: 1.3rem; 
}

.login-form input {
    width: 100%;
    padding: 16px;
    border-radius: 10px;
    border: 1px solid #ddd; 
    font-size: 1.2rem; 
    background-color: #f6fbff; 
    box-sizing: border-box; 
}

.login-form button {
    width: 100%;
    padding: 16px; 
    background-color: #397eb7; 
    color: #fff; 
    border: none;
    border-radius: 10px;
    font-size: 1.3rem;
    cursor: pointer; 
    transition: background-color 0.3s, transform 0.1s;
}

.login-form button:hover,
.login-form button:active {
    background-color: #ff5d0d; 
    transform: scale(0.98); 
}

</style>

<div id="container">
    <div class="login-form">
        <h2>تسجيل الدخول</h2>
        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">اسم المستخدم</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">كلمة المرور</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">تسجيل الدخول</button>
        </form>
    </div>
</div>
@endsection
