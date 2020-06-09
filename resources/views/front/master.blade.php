<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css"
    integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

   <!-- custom CSS -->
   <link rel="stylesheet" href="{{asset('Front/css/owl.carousel.min.css')}}">
   <link rel=stylesheet href="{{asset('Front/css/owl.theme.default.min.css')}}">
   <link rel="stylesheet" href="{{asset('Front/css/hover-min.css')}}">
       <link rel="stylesheet" href="{{asset('Front/css/style.css')}}">
     <!-- custom font -->
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">

    @yield('title')
  </head>
  <body>
     <!-- top nav section -->
    <section id="top-nav">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
              <div class="lang">
                  <span><a href="#" id="arabic">عربى</a></span>
                  <span><a href="#" id="en">EN</a></span>
                </div>
          </div>
          <div class="col-md-4">
           <div class="social-media">
              <a href="{{$settings->facebook}}" target="blank"> <i class="fab fa-facebook-f"></i> </a>
              <a href="{{$settings->instagram}}" target="blank"> <i class="fab fa-instagram"></i></a>
              <a href="{{$settings->twitter}}" target="blank"><i class="fab fa-twitter"></i></a>
              <a href="{{$settings->whats_app}}" target="blank"><i class="fab fa-whatsapp"></i> </a>

           </div>

          </div>
          <div class="col-md-4">
              <div class="contact">

                  <p class="email"> bloodbank@gmail.com</p>

                  <i class="fas fa-envelope-square email "></i>
                  <p class="phone "> +966506954964
                    </p>
                    <i class="fas fa-phone-volume phone hvr-buzz"></i>
                </div>

            </div>
        </div>

      </div>
    </section>
     <!-- oradaniry nav section -->
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="nav-logo " href="{{url('blood')}}"><img class="logo" src="{{asset('Front/imgs/logo.png')}}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">

              <a class="nav-link " href="{{url('blood')}}">الرئيسية   </a>
              <span class="test"></span>



            </li>
            <li class="nav-item">
              <a class="nav-link border-left" href="#">عن بنك الدم </a>
            </li>
            <li class="nav-item">
              <a class="nav-link border-left" href="{{url('posts')}}">المقالات</a>
            </li>
            <li class="nav-item">
                <a class="nav-link border-left" href="donations.html">طلبات التبرع</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link border-left" href="{{url('aboute')}}">من نحن</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link border-left" href="{{url('contactUs')}}">اتصل بنا </a>
                  </li>
          </ul>
          @if(auth()->guard('clients')->check())
            <span class="navbar-text">
                <a href="{{url('client/donationRequest')}}"><button class="btn login-btn shadow">طلب تبرع</button></a>
            </span>
            <span class="navbar-text" style="margin-right: 15px">
                <a href="{{url('client/logout')}}"><button class="btn login-btn shadow">الخروج</button></a>
            </span>
        @else
            <span class="navbar-text">
           <a class="new-account" href="{{url('showsignup')}}">انشاء حــساب جديد</a>
           <a href="{{url('showlogin')}}"><button class="btn login-btn shadow">دخول</button></a>
          </span>
        @endif
        </div>
      </nav>

     <!-- Header-->
      @yield('content')

    <!--  FOOTER -->
<footer id="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <img class="footer-logo" src="{{asset('Front/imgs/logo.png')}}">
        <p class="footer-text">بنك الدم هذا النص هو مثال لنص يمكن ان يستبدل فى نفس المساحه, لقد تم توليد هذا النص من مولد النص العربى حيث يمكنك توليد مثل هذا النص أو العديد من النصوص الاخرى إضافة الى زيادة عدد الحروف التى يولدها التطبيق يطلع على صوره حقيقية للتصميم</p>
      </div>
      <div class="col-md-4">
        <ul class="footer-list">
          <a href="{{url('posts')}}"><li> الرئيسيه</li></a>
            <a href="#"><li> عن بنك الدم </li></a>
            <a href="{{url('posts')}}"> <li> المقالات </li></a>
            <a href="#"><li> طلبات التبرع </li></a>
            <a href="{{url('aboute')}}"> <li> من نحن </li></a>
            <a href="{{url('contactUs')}}">  <li> اتصل بنا </li></a>

        </ul>
        </div>
        <div class="col-md-4 change-position">
        <p class="footer-subtext">مـتــوفر علي </p>
        <img class="footer-android" src="{{asset('Front/imgs/google1.png')}}">
        <img class="footer-ios" src="{{asset('Front/imgs/ios1.png')}}">

          </div>

    </div>
  </div>

</footer>
<section id="last-footer">
<div class="container">
<div class="row">
<div class="col-md-4">
  <div class="social-media">
      

              <a href="{{$settings->facebook}}" target="blank"> <i class="fab fa-facebook-f hvr-float"></i> </a>
              <a href="{{$settings->instagram}}" target="blank"> <i class="fab fa-instagram hvr-float"></i></a>
              <a href="{{$settings->twitter}}" target="blank"><i class="fab fa-twitter hvr-float"></i></a>
              <a href="{{$settings->whats_app}}" target="blank"><i class="fab fa-whatsapp hvr-float"></i> </a>


 </div>

</div>
<div class="col-md-8">
<p class="copys"> جميع الحقوق محفوظ ل <span id="website-name"> بنك الدم وابداع تك </span> &copy;2019 </p>

</div>

</div>
<p class="myname">Made with <i class="fas fa-heart"></i> by Ahmed Elmahdy</p>
</div>


</section>

<!-- loader  -->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js" integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">var scrolltotop={setting:{startline:100,scrollto:0,scrollduration:1e3,fadeduration:[500,100]},controlHTML:'<img src="https://i1155.photobucket.com/albums/p559/scrolltotop/arrow92.png" />',controlattrs:{offsetx:5,offsety:5},anchorkeyword:"#top",state:{isvisible:!1,shouldvisible:!1},scrollup:function(){this.cssfixedsupport||this.$control.css({opacity:0});var t=isNaN(this.setting.scrollto)?this.setting.scrollto:parseInt(this.setting.scrollto);t="string"==typeof t&&1==jQuery("#"+t).length?jQuery("#"+t).offset().top:0,this.$body.animate({scrollTop:t},this.setting.scrollduration)},keepfixed:function(){var t=jQuery(window),o=t.scrollLeft()+t.width()-this.$control.width()-this.controlattrs.offsetx,s=t.scrollTop()+t.height()-this.$control.height()-this.controlattrs.offsety;this.$control.css({left:o+"px",top:s+"px"})},togglecontrol:function(){var t=jQuery(window).scrollTop();this.cssfixedsupport||this.keepfixed(),this.state.shouldvisible=t>=this.setting.startline?!0:!1,this.state.shouldvisible&&!this.state.isvisible?(this.$control.stop().animate({opacity:1},this.setting.fadeduration[0]),this.state.isvisible=!0):0==this.state.shouldvisible&&this.state.isvisible&&(this.$control.stop().animate({opacity:0},this.setting.fadeduration[1]),this.state.isvisible=!1)},init:function(){jQuery(document).ready(function(t){var o=scrolltotop,s=document.all;o.cssfixedsupport=!s||s&&"CSS1Compat"==document.compatMode&&window.XMLHttpRequest,o.$body=t(window.opera?"CSS1Compat"==document.compatMode?"html":"body":"html,body"),o.$control=t('<div id="topcontrol">'+o.controlHTML+"</div>").css({position:o.cssfixedsupport?"fixed":"absolute",bottom:o.controlattrs.offsety,right:o.controlattrs.offsetx,opacity:0,cursor:"pointer"}).attr({title:"Scroll to Top"}).click(function(){return o.scrollup(),!1}).appendTo("body"),document.all&&!window.XMLHttpRequest&&""!=o.$control.text()&&o.$control.css({width:o.$control.width()}),o.togglecontrol(),t('a[href="'+o.anchorkeyword+'"]').click(function(){return o.scrollup(),!1}),t(window).bind("scroll resize",function(t){o.togglecontrol()})})}};scrolltotop.init();</script>


    <script src="{{asset('Front/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('Front/js/main.js')}}"></script>
  </body>
</html>
