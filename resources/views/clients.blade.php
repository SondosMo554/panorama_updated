@extends('layouts.app')
@include('partials.header')


@section('content')
<style>
.client-container {
    background-color: #030420;
    border-radius: 10px;
    padding: 20px;
    margin: 0 auto 20px;
    max-width: 800px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    text-align: right;
    direction: rtl;
}

.client-container h2 {
    font-size: 2rem;
    color: #ff5d0d;
    margin-bottom: 15px;
}

.client-container .image-container {
    text-align: right;
    margin-bottom: 15px;
}

.client-container img {
    max-width: 50%;
    height: auto;
    border-radius: 10px;
}

.client-container p {
    font-size: 1.3rem;
    font-weight: 600;
    color: #ffffff;
    line-height: 1.8;
}

article#work {
    margin-top: 50px;
    margin-bottom: 100px;
}

</style>

<article id="work">
    @foreach($clients as $client)
        <div class="client-container">
            <h2 class="major">{{ $client->title }}</h2>
            <div class="image-container">
                <img src="{{ asset('images/' . $client->image) }}" alt="{{ $client->title }}">
            </div>
            <p>{{ $client->description }}</p>
        </div>
    @endforeach
</article>
@endsection
