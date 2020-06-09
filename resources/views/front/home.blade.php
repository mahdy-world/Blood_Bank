@extends('front\master')
@inject('bloodType', 'App\models\BloodType')

@section('title')
<title>بنك الدم الرئيسية </title>
@endsection
@section('content')

     <!-- Header-->
      <header id="header">
        <div class="container-fluid">
          <div class="header-text">
          <h1 class="head-text">{{$settings->intro_title}}</h1>
          <p class="follow-text">{{$settings->intro}}</p>
              <a href="#"><button class="btn login-btn">المزيد</button></a>
              </div>
        </div>
      </header>
<section id="about">
<div class="container-fluid">
<p class="about-text">بنك الدم هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
  يطلع على صورة حقيقية لتصميم الموقع
  </p>
</div>
</section>

   <!-- articles -->
   <section id="articles">
  <h2 class="articles-head">المقالات </h2>
  <div class="container custom" style="direction: ltr">
    <div class="owl-carousel owl-theme" id="owl-articles">

      @foreach($posts as $post)
        <div class="item">
          <div class="card" style="width: 22rem;">
            <i onclick="toggleFavourite(this)"  class="fab fa-gratipay first-heart"></i>
            <img class="card-img-top" src="{{$post->image}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">{{$post->title}} </h5>
              <p class="card-text">{{$post->content}}
                </p>
              <a href="{{url('post/'.$post->id)}}"><button class="btn details-btn">التفاصيل </button></a>
            </div>
          </div>


    </div>

    @endforeach
    
  </div>

</div>
</section>

   <!-- call us section  -->
   <section id="call-us">
    <h3 class="call-us-head">اتـــصل بنا</h3>
    <P class="call-us-follow-text">يمكنكم الاتصال بنا للاستفسار عن المعلومات وسيتم التواصل معكم فوراً </P>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
        <div class="whatsup">
          <p id="number">+002 0124545454</p>
          <img class="whats-logo" src="{{asset('Front/imgs/whats.png')}}">


        </div>
      </div>

      </div>
    </div>
   </section>

   <!-- mobile app   -->
   <section id="mobile-app">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <P class="app-head">تطبيق بنك الدم</P>
          <P class="app-text">{{$settings->intro}}</P>
          <p class="availbale">متـــوفر علي </p>
          <div class="stores">
            <img src="{{asset('Front/imgs/whats.png')}}">
            <img src="{{asset('Front/imgs/ios.png')}}">


          </div>
        </div>
        <div class="col-md-6">
          <img class="app image-responsive" src="{{asset('Front/imgs/App.png')}}">
        </div>

      </div>

    </div>
   </section>

   @endsection('content')

 