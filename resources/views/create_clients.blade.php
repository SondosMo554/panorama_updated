@extends('layouts.app')
@include('partials.header_admin')

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
    max-width: 800px; 
    padding: 30px;
    background-color: #030420;
    color: #fff;
    border-radius: 15px; 
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    box-sizing: border-box;
    direction: rtl; 
    margin-bottom: 50px;

}

.edit-client-form {
    background-color: #fff; 
    color: #000;
    border-radius: 15px; 
    padding: 30px; 
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}

.edit-client-form h2 {
    font-size: 2.2rem; 
    color: #ff5d0d;
    margin-bottom: 20px;
    text-align: right; 
}

.edit-client-form .form-group {
    margin-bottom: 20px; 
}

.edit-client-form label {
    display: block;
    margin-bottom: 8px; 
    font-size: 1.1rem;
    text-align: right;
}

.edit-client-form input,
.edit-client-form textarea {
    width: 100%;
    padding: 12px; 
    border-radius: 8px;
    border: 1px solid #ddd;
    font-size: 1rem;
    box-sizing: border-box;
    background-color: #f6fbff;
}

.edit-client-form button {
    width: 100%;
    padding: 12px; 
    background-color: #397eb7; 
    color: #fff;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.1s;
}

.edit-client-form button:hover,
.edit-client-form button:active {
    background-color: #ff5d0d;
    transform: scale(0.98);
}

#image-preview {
    margin-top: 10px; 
}

#image-preview img {
    max-width: 100%; 
    border-radius: 8px;
}
</style>

<div id="container">
    <div class="edit-client-form">
        <h2>إضافة عميل جديد</h2>

        <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">العنوان:</label>
                <input type="text" class="form-control" name="title" id="title" required>
            </div>

            <div class="form-group">
                <label for="image">الصورة:</label>
                <input type="file" class="form-control" name="image" id="image" onchange="previewImage(event)">
                <div id="image-preview">
                    <img id="preview" src="#" style="display:none;" width="100" alt="Image Preview">
                </div>
            </div>

            <div class="form-group">
                <label for="description">الوصف:</label>
                <textarea class="form-control" name="description" id="description" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">إضافة عميل</button>
        </form>
    </div>
</div>

<script>
function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('preview');
    const imagePreview = document.getElementById('image-preview');

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }

        reader.readAsDataURL(input.files[0]);
    } else {
        preview.style.display = 'none';
    }
}
</script>
@endsection
