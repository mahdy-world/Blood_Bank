@extends('master\app')

@section('content-wrapper')
<!-- Content Header (Page header) -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit City</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url(route('home'))}}">Main</a></li>
              <li class="breadcrumb-item active">Edit City</li>
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
              @include('city.validationerrors')
              @include('flash::message')

              <div class="box-body">
                            {!! Form::model($model, [
                                'action' => ['CityController@update',$model->id],
                                'method' =>'put'
                            ]) !!}
                                @include('city.form')
                            {!! Form::close() !!}
                        </div>
             
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>

    <!-- Main content -->
   
      
      
        
  </div>

    
@endsection

