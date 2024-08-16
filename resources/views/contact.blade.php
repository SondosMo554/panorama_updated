@extends('layouts.app')
@include('partials.header')

@section('content')
<style>
    html, body {
        height: 100%;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow-x: hidden; 
        overflow-y: auto; 
    }

    #container {
        width: 100%;
        max-width: 800px; 
        padding: 30px;
        background-color: #030420;
        color: #fff;
        border-radius: 15px; 
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        box-sizing: border-box;
        margin-top: 50px;
        margin-bottom: 100px; 
    }

    #contact {
        width: 100%;
        background-color: #fff;
        color: #000;
        border-radius: 15px; 
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        padding: 20px 30px; 
        box-sizing: border-box;
    }

    #contact h2 {
        font-size: 2.2rem; 
        color: #ff5d0d;
        margin-bottom: 20px;
        text-align: right; 
    }

    .fields {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }

    .field {
        flex: 1;
        margin-bottom: 15px; 
    }

    .field.half {
        flex: 1 1 calc(50% - 15px);
    }

    .field label {
        display: block;
        margin-bottom: 8px; 
        font-size: 1.1rem;
        text-align: right;
    }

    .field input,
    .field textarea {
        width: 100%;
        padding: 12px; 
        border-radius: 8px;
        border: 1px solid #ddd;
        font-size: 1rem;
        box-sizing: border-box;
        background-color: #f6fbff;
    }

    .actions {
        display: flex;
        justify-content: flex-start;
        text-align: left;
        gap: 10px;
        margin-top: 20px;
        margin-left: -40px; 
        direction: ltr; 
    }

    .actions li {
        list-style: none;
    }

    .primary {
        background-color: #397eb7;
        color: #fff;
        border: none;
        padding: 12px; 
        border-radius: 8px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.1s;
    }

    .primary:hover,
    .primary:active {
        background-color: #ff5d0d;
        transform: scale(0.98);
    }

    .reset {
        background-color: #ff5d0d;
        color: #fff;
        border: none;
        padding: 12px; 
        border-radius: 8px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.1s;
    }

    .reset:hover,
    .reset:active {
        background-color: #397eb7;
        transform: scale(0.98);
    }

    .icons {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 20px;
    }

    .icons li {
        list-style: none;
    }

    .icons .icon {
        font-size: 1.3rem;
        color: #333;
        text-decoration: none;
    }

    .icons .icon:hover {
        color: #397eb7;
    }

    .icons .icon .label {
        display: none;
    }
</style>
<div id="container">
    <article id="contact">
        <h2 class="major">اترك لنا رسالتك</h2>
        <form method="post" action="{{ route('contact.store') }}">
            @csrf
            <div class="fields">
                <div class="field half">
                    <label for="email">البريد الالكتروني</label>
                    <input type="email" name="email" id="email" required />
                </div>
                <div class="field half">
                    <label for="name">الاسم</label>
                    <input type="text" name="name" id="name" required />
                </div>
                
                <div class="field">
                    <label for="message">الرسالة</label>
                    <textarea name="message" id="message" rows="4" required></textarea>
                </div>
            </div>
            <ul class="actions">
                <li><input type="submit" value="ارسال" class="primary" /></li>
                <li><input type="reset" value="مسح" class="reset" /></li>
            </ul>
        </form>

        <!-- Social Media Icons -->
        <ul class="icons">
            <li><a href="https://x.com/Panorama_Q" class="icon fa-brands fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="https://facebook.com/palqassim" class="icon fa-brands fa-facebook-f"><span class="label">Facebook</span></a></li>
            <li><a href="https://api.whatsapp.com/send/?phone=9660553172552" class="icon fa-brands fa-whatsapp"><span class="label">Whatsapp</span></a></li>
            <li><a href="https://snapchat.com/t/mh05HGb6" class="icon fa-brands fa-snapchat"><span class="label">Snapchat</span></a></li>
            <li><a href="https://tiktok.com/@panorama_alqassim" class="icon fa-brands fa-tiktok"><span class="label">Tiktok</span></a></li>
            <li><a href="https://instagram.com/palqassim/" class="icon fa-brands fa-instagram"><span class="label">Instagram</span></a></li>
        </ul>
    </article>
</div>
@endsection
