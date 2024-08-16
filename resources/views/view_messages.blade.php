@extends('layouts.app')
@include('partials.header_admin')

@section('content')
<style>
.background-container {
    margin: 0 auto 20px;
    max-width: 800px;
    border-radius: 10px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    position: relative;
}

.message-container {
    background-color: #030420;
    border-radius: 10px;
    padding: 20px;
    margin-top: 60px;
    margin-bottom: 20px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    text-align: right;
    direction: rtl;
}

.message-name {
    font-size: 1.5rem;
    color: #ff5d0d;
    margin-bottom: 10px;
}

.message-email, .message-text, .message-date {
    font-size: 1.3rem;
    font-weight: 600;
    line-height: 1.8;
    margin-bottom: 10px;
}

.message-label {
    color: #397eb7;
}

.message-value {
    color: #ffffff;
}

.message-date {
    display: block;
}

article#view-messages {
    margin-top: 50px;
    margin-bottom: 100px;
}

#view-messages p {
    font-size: 1.3rem;
    color: #ffffff;
    margin-top: 20px;
}

#main button.btn-danger {
    display: inline-block;
    padding: 10px 20px;
    background-color: #ff5d0d; 
    color: #fff;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s, transform 0.1s;
    font-size: 1rem;
    border: none;
    cursor: pointer;
}

#main button.btn-danger:hover,
#main button.btn-danger:active {
    background-color: #ff3a00; 
    transform: scale(0.98);
}
</style>



<article id="view-messages">
    <div class="background-container">
        @if($messages->isEmpty())
        <div class="message-container">
            <p>لا توجد رسائل.</p>
        </div>
        @else
            @foreach($messages as $message)
                <div class="message-container">
                    <h3 class="message-name">{{ $message->name }}</h3>
                    <p class="message-email"><span class="message-label">البريد الإلكتروني:</span> <span class="message-value">{{ $message->email }}</span></p>
                    <p class="message-text"><span class="message-label">الرسالة:</span> <span class="message-value">{{ $message->message }}</span></p>
                    <p class="message-date"><span class="message-label">تاريخ الإرسال:</span> <span class="message-value">{{ $message->created_at->timezone('Asia/Riyadh')->format('Y-m-d') }}</span></p>
                    <p class="message-date"><span class="message-label">الساعة:</span> <span class="message-value">{{ $message->created_at->timezone('Asia/Riyadh')->format('H:i') }}</span></p>
                    
                    <form action="{{ route('messages.destroy', $message->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this message?')">حذف</button>
                    </form>
                </div>
            @endforeach
        @endif
    </div>
</article>

@endsection
