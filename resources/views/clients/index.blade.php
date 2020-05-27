@extends('master\app')
@section('content-wrapper')


<!-- Content Header (Page header) -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Clinets</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url(route('home'))}}">Main</a></li>
              <li class="breadcrumb-item active">Clinets</li>
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
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Date</th>
              <th>The Last Donation Requst</th>
              <th>Blood_Type</th>
              <th>City</th>
              <th>Governorate</th>
              <th class="text-center">Interaction  !!</th>
              <th class="text-center">Delete</th>
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