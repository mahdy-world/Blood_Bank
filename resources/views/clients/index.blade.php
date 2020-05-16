@extends('layouts\app')
@section('content-wrapper')


<!-- Content Header (Page header) -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>العملاء</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url(route('home.index'))}}">الرئيسية</a></li>
              <li class="breadcrumb-item active">العملاء</li>
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
              <th>البريد الالكترونى</th>
              <th>رقم الهاتف</th>
              <th>تاريخ الميلاد</th>
              <th>تاريج التبرع الاخير</th>
              <th>نوع فصيله الدم</th>
              <th>المدينه</th>
              <th>المحافظه</th>
              <th class="text-center">التفاعل  !!</th>
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
              <td>{{$record->number_phone}}</td>
              <td>{{$record->date_of_birth}}</td>
              <td>{{$record->last_donation_data}}</td>
              <td>{{$record->blood_type_id}}</td>
              <td>{{$record->city->name}}</td>
              <td>{{$record->city->governorate->name}}</td>




      @if($record->is_active == 1)
      <td class="text-center">
              {!! Form::open([
                  'action' => ['ClientController@is_active',$record->id],
                  'method' => 'put'
              ]) !!}
              <button type="submit" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> متفاعل</button>
              {!! Form::close() !!}
          </td>
      @else
          <td class="text-center">
              {!! Form::open([
                  'action' => ['ClientController@is_active',$record->id],
                  'method' => 'put'
              ]) !!}
              <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-edit"></i> غير متفاعل</button>
              {!! Form::close() !!}
          </td>
      @endif
          <td class="text-center">
          {!! Form::open([
          'action' => ['ClientController@destroy' ,$record->id ],
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