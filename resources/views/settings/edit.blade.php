@extends('master\app')
@inject('model','App\models\Setting')



@section('content-wrapper')
<!-- Content Header (Page header) -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>الاعدادت</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url(route('home'))}}">الرئيسية</a></li>
             
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
            
              <div class="card-body">
             
              {!! Form::model($model,[
                'action' => ['SettingsController@update',$model->id],
                'method' => 'get'
                
                ]) !!}
               
                @include('flash::message')
                <div class="form-group">
                    <label for="name">رابط فيس بوك</label>
                    {!! Form::text('facebook_url',null,[
                    'class' => 'form-control'
                 ]) !!}

                    <label for="name">رابط تويتر</label>
                    {!! Form::text('twitter',null,[
                    'class' => 'form-control'
                 ]) !!}

                    <label for="name">رابط يوتيوب</label>
                    {!! Form::text('youtube_url',null,[
                    'class' => 'form-control'
                 ]) !!}

                    <label for="name">رابط انستجرام</label>
                    {!! Form::text('instagram_url',null,[
                    'class' => 'form-control'
                 ]) !!}

                    <label for="name">رابط جوجل بلس</label>
                    {!! Form::text('google_url',null,[
                    'class' => 'form-control'
                 ]) !!}

                    <label for="name">واتس اب</label>
                    {!! Form::text('whatsapp',null,[
                    'class' => 'form-control'
                 ]) !!}

                    <hr>

                    <label for="name">الهاتف</label>
                    {!! Form::text('phone',null,[
                    'class' => 'form-control'
                 ]) !!}

                    <label for="name">الإيميل</label>
                    {!! Form::text('email',null,[
                    'class' => 'form-control'
                 ]) !!}

                    <label for="name">عن التطبيق</label>
                    {!! Form::text('about_app',null,[
                    'class' => 'form-control'
                 ]) !!}

                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">تعديل</button>
                </div>

               
             
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>

    <!-- Main content -->
   
      
      
        
  </div>

    
@endsection

