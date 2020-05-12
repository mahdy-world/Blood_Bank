@extends('layouts\app')
@inject('client','App\models\Client')

@inject('city','App\models\City')


@inject('donation','App\models\DonationRequest')

@inject('blood_type','App\models\BloodType')


@section('content-wrapper')
<!-- Content Header (Page header) -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>طلبات التبرع</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url(route('home.index'))}}">الرئيسية</a></li>
              <li class="breadcrumb-item active">طلبات التبرع</li>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
            @include('flash::message')
              
              
    
        @if(count($records))

          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
              <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>العمر</th>
                <th>نوع فصيلة الدم</th>
                <th>عدد اكياس الدم</th>
                <th>اسم المستشفي</th>
                <th>المكان</th>
                <th>المدينة</th>
                <th>رقم الهاتف</th>
                <th>ملاحظات</th>
                <th>العميل</th>
                <th class="text-center">حذف</th>
              </tr>
              </tehead>
              <tbody>
                <tr>
                  @foreach($records as $record)
                    <tr>
                       <td>{{$loop->iteration}}</td>
                       <td>{{$record->name}}</td> 
                       <td>{{$record->age}}</td> 
                       <td>{{$record->blood_type_id}}</td> 
                       <td>{{$record->number_of_bags}}</td> 
                       <td>{{$record->hospital_name}}</td> 
                       <td>{{$record->lat}} {{$record->lng}}</td> 
                       <td>{{$record->city->name}}</td> 
                       <td>{{$record->number_phone}}</td> 
                       <td>{{$record->notes}}</td> 
                       <td>{{$record->client->name}}</td>
                       
                       <td class="text-center">
                       {!! Form::open([
                       'action' => ['DonationrequiestController@destroy' ,$record->id ],
                       'method' => 'delete'
                       
                       
                       ]) !!}

                       <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> </button>
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