@extends('master\app')
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
            <h1>قائمة المستخدمين </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url(route('home'))}}">الرئيسية</a></li>
              <li class="breadcrumb-item active">قائمة المتخدمين</li>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
            @include('flash::message')
              <div class="card-header">
                
                <a href="{{url(route('users.create'))}}" class="btn btn-primary" > اضافة جديد </a> 
              </div>
              
    
        @if(count($records))

          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
              <tr>
                <th>#</th>
                <th>اسم </th>
                <th>البريد الالكتروني </th>
                <th>رتب المستخدم</th>
                <th class="text-center">تعديل</th>
                <th class="text-center">حذف</th>
              </tr>
              </tehead>
              <tbody>
                <tr>
                  @foreach($records as $record)
                    <tr>
                       <td>{{$loop->iteration}}</td>
                       <td>{{$record->name}}</td> 
                       <td>{{$record->email}}</td> 
                       <td>
                        @foreach($record->roles as $role)
                          <div class="btn btn-success">{{$role->display_name}}</div>
                        @endforeach
                       
                       </td> 

                       <td class="text-center"><a  href="{{url(route('users.edit',$record->id))}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                       </td>
                       <td class="text-center">
                       {!! Form::open([
                       'action' => ['UserController@destroy' ,$record->id ],
                       'method' => 'delete'
                       
                       
                       ]) !!}

                      {{--<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> </button> --}} 
                       <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure？')"><i class="fa fa-trash"></i></button>
                       {!! Form::close() !!}
                       
                       
                       </td>
                       
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
              <!-- /.card-body -->
              
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>

      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    </div>
        

    
      
        
  </div>

    
@endsection