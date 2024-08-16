@extends('layouts.app')
@include('partials.header_admin')

@section('content')

<style>
html, body {
    height: 100%;
    margin: 0;
    font-family: Arial, sans-serif;
}

body {
    padding-top: 20px; 
    display: flex;
    justify-content: center; 
    align-items: flex-start; 
}

#container {
    width: 100%;
    max-width: 1200px;
    padding: 20px;
    background-color: #030420;
    color: #fff;
    border-radius: 10px;
    box-shadow: none;
    box-sizing: border-box;
    margin-top: 20px; 
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 80px;
    margin-bottom: 80px;


}

#main {
    width: 100%;
    max-width: 1000px;
    padding: 20px;
    color: #030420;
    border-radius: 10px;
    text-align: right;
}

#main h1 {
    font-size: 2rem;
    color: #ff5d0d;
    margin-bottom: 20px;
}

#main a.btn,
#main button.btn-danger {
    display: inline-block;
    padding: 10px 20px;
    background-color: #397eb7;
    color: #fff;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s, transform 0.1s;
    font-size: 1rem;
    margin-bottom: 20px;
    border: none;
    cursor: pointer;
}

#main a.btn:hover,
#main a.btn:active,
#main button.btn-danger:hover,
#main button.btn-danger:active {
    background-color: #ff5d0d;
    transform: scale(0.98);
}

#main button.btn-danger {
    background-color: #ff5d0d;
}

#main table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #fff;
    color: #030420;
    direction: rtl; 
}

#main table th, #main table td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: right;
}

#main table th {
    background-color: #397eb7;
    color: #fff;
}

#main table td {
    font-family: 'Arial', sans-serif;
}

#main table td.title {
    font-size: 1.2rem;
    font-weight: bold;
    color: #333;
}

#main table td.description {
    font-size: 1rem;
    color: #666;
}

#main table td img {
    max-width: 100px;
    height: auto;
}

#main .description p {
    margin: 0;
}

#main .description p.new-line {
    display: block;
    margin-top: 10px;
    font-size: 1rem;
    color: #666;
}

</style>

<div id="container">
    <div id="main">
        <h1>إدارة العملاء</h1>

        <a href="{{ route('clients.create') }}" class="btn">إضافة عميل جديد</a>

        <section>
            <table>
                <thead>
                    <tr>
                        <th>العنوان</th>
                        <th>الصورة</th>
                        <th>الوصف</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                    <tr>
                        <td class="title">{{ $client->title }}</td>
                        <td><img src="{{ asset('images/' . $client->image) }}" alt="{{ $client->title }}"></td>
                        <td class="description">
                            @foreach(explode("\n", $client->description) as $line)
                                @if(Str::startsWith(trim($line), '*'))
                                    <p class="new-line">{{ trim(substr($line, 1)) }}</p>
                                @else
                                    <p>{{ trim($line) }}</p>
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('clients.edit', $client->id) }}" class="btn">تعديل</a>
                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this client?')">حذف</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

@endsection
