@extends('layouts.app')
@include('partials.header')

@section('content')
<style>
.service-container {
    background-color: #030420;
    border-radius: 10px;
    padding: 20px;
    margin: 0 auto 20px;
    max-width: 800px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    text-align: right;
    direction: rtl;
}

.service-container h2 {
    font-size: 2rem;
    color: #ff5d0d;
    margin-bottom: 15px;
}

.service-container .image-container {
    text-align: right;
    margin-bottom: 15px;
}

.service-container img {
    max-width: 50%;
    height: auto;
    border-radius: 10px;
}

.service-container p {
    font-size: 1.3rem;
    font-weight: 600;
    color: #ffffff;
    line-height: 1.8;
}

article#services {
    margin-top: 50px;
    margin-bottom: 100px;
}

.service-container .description p {
    margin: 0;
}

.service-container .description p.new-line {
    display: block;
    margin-top: 10px;
    font-size: 1rem;
    color: #d1e8ff;
}
</style>

<article id="services">
    @foreach($services as $service)
        <div class="service-container">
            <h2 class="major">{{ $service->title }}</h2>
            <div class="image-container">
                <img src="{{ asset('images/' . $service->image) }}" alt="{{ $service->title }}">
            </div>
            <div class="description">
                @foreach(explode("\n", $service->description) as $line)
                    @if(Str::startsWith(trim($line), '*'))
                        <p class="new-line">{{ trim(substr($line, 1)) }}</p>
                    @else
                        <p>{{ trim($line) }}</p>
                    @endif
                @endforeach
            </div>
        </div>
    @endforeach
</article>
@endsection
