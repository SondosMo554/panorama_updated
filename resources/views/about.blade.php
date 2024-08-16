@extends('layouts.app')
@include('partials.header')

@section('content')
<style>

.about-container {
    background-color: #030420; 
    border-radius: 10px; 
    padding: 20px; 
    margin: 0 auto 20px; 
    max-width: 800px; 
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1); 
    text-align: right; 
    direction: rtl; 
}

.about-container h2 {
    font-size: 2rem; 
    color: #ff5d0d; 
    margin-bottom: 15px; 
}

.about-container .image-container {
    text-align: right; 
    margin-bottom: 15px; 
}

.about-container img {
    max-width: 50%; 
    height: auto; 
    border-radius: 10px; 
}

.about-container p {
    font-size: 1.3rem; 
    font-weight: 600; 
    color: #ffffff; 
    line-height: 1.8; 
}

article#about {
    margin-top: 50px;
    margin-bottom: 100px;
}

</style>

<article id="about" class="about-container">
    <h2 class="major">من نحن</h2>
    <figure class="image-container">
        <img src="{{ asset('images/pic03.jpg') }}" alt="About Us" class="main-image" />
    </figure>
    <div class="text-content">
        <p>
            إيمانًا منا بأهمية البرمجة والعالم الرقمي في حياتنا، كنا نحن بانوراما القصيم من الرواد في هذه المجالات، حيث نسعى للارتقاء بمجال التصميم والبرمجة لتكون من كبرى الصروح بالمملكة والشرق الأوسط في تصميم وبرمجة المواقع وتطبيقات الجوال والبرامج الإدارية والمحاسبية.
        </p>
        <p>
            نهدف دائمًا لإرضاء كافة العملاء لدينا من خلال تقديم مجموعة من الخدمات المميزة. نسعى لخلق وتنمية جسور التعاون والشراكة وتبادل الخبرات بين المبرمجين في مختلف تخصصاتهم، ونستهدف إعداد برامج متميزة تلبي الاحتياجات الحقيقية للمجتمع وسوق العمل مع تطويرها المستمر. ندرب المبرمجين حديثي التخرج لنرتقي بـالمستويات المهارية في جميع مجالات البرمجة من الأنشطة الأساسية لخدمة المجتمع المدني.
        </p>
        <p>
            رسالتنا هي خلق مجتمع واعِ فكريًا ومتطور علميًا، قادرًا على مواكبة العالم الرقمي بأسهل الطرق وأبسطها.
        </p>
    </div>
</article>
@endsection
