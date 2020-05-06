@extends('layouts\app')
@inject('client','App\models\Client')
@inject('governorates','App\models\Governorate')
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
            <h1>المحافظات</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
              <li class="breadcrumb-item active">المحافظات</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    &nbsp; &nbsp; &nbsp; &nbsp;
    <a href="{{url(route('governorate.create'))}}" class="btn btn-primary" > اضافة جديد </a> 
  
        @if(count($records))

          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
              <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>تعديل</th>
                <th>حذف</th>
              </tr>
              </tehead>
              <tbody>
                <tr>
                  @foreach($records as $record)
                    <tr>
                       <td>{{$loop->iteration}}</td>
                       <td>{{$record->name}}</td> 
                       <td><a class="btn btn-success">تعديل</a></td>
                       <td><a class="btn btn-danger">حذف</a></td>
                       
                    </tr>
                  @endforeach
                </tr>
              </tbody>
            </table>
          </div>


        @else
            <div class="alert alert-danger" role="alert">
                لاتوجد بيانات للعرض
            </div>
        @endif    
    
      
        
  </div>

    
@endsection