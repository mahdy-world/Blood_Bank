@extends('front\master')
@section('content')

<section id="breedcrumb">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{url('blood')}}">الرئيسية</a></li>
                              <li class="breadcrumb-item active" aria-current="page">تسجيل الدخول </li>
                            </ol>
                          </nav>

              </div>
          </div>
          <div class="row">
            <div class="col-md-12">
                <div class="article-content shadow">
                    <p class="content">
                        <img class="log-logo" src="{{asset('')}}website/imgs/logo.png">
                    @if($message = Session::get('error'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{url('cheacklogin')}}" id="login">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <input type="text" name="number_phone" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp"
                                   placeholder="الجوال">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                   placeholder="كلمة المرور">
                        </div>
                        <div class="form-check ">
                            <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                <label class="custom-control-label" for="customControlInline">تذكرني</label>
                            </div>
                        </div>
                        <div class="did-u-forget clearfix">
                            <a class="forget-pass" href="{{url('/client/reset/password')}}"><p class="forget ">هل نسيت كلمة المرور</p></a>
                            <img class="complian forget" src="{{asset('')}}website/imgs/complain.png">
                        </div>
                        <div class="form-btns">
                            <button type="submit" class="btn btn-login">دخول</button>
                            <a href="{{url('/client/register')}}"><span class="btn btn-new">انشاء حساب جديد</span></a>
                        </div>
                    </form>
                    <div class="form-btns">
                    </div>
                </div>

            </div>

        </div>
      </div>
</section>

@endsection