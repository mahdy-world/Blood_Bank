@extends('master\app')

@inject('model','App\User')



@section('content-wrapper')
<!-- Content Header (Page header) -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url(route('home'))}}">Main</a></li>
              <li class="breadcrumb-item active">Add User</li>
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
              @include('category.validationerrors')

              {!! Form::model($model ,[ 'action' => 'UserController@store' ]) !!}

              @include('users.form')
              
              {!! Form::close() !!}  
             
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>

    <!-- Main content -->
   
      
      
        
  </div>

    
@endsection

