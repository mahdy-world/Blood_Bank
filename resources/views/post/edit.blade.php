@extends('layouts\app')
@inject('client','App\models\Client')
@inject('city','App\models\City')
@inject('categories','App\models\Category')
@inject('posts','App\models\Post')
@inject('donation','App\models\DonationRequest')
@inject('contact','App\models\Contact')


@section('content-wrapper')
<!-- Content Header (Page header) -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>تعديل المقال</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url(route('home.index'))}}">الرئيسية</a></li>
              <li class="breadcrumb-item active">تعديل المقال</li>
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
             
             <!-- errors message -->
              @include('post.validationerrors')

              {!! Form::model($model ,[ 
              
              'action' => ['PostController@update' ,$model->id],
              'method' => 'Put',
              'files'  =>  true
              
              ]) !!}

              @include('post\form')
              
              {!! Form::close() !!}  
             
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>

    <!-- Main content -->
   
      
      
        
  </div>

    
@endsection

