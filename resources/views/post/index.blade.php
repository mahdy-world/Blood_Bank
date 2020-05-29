@extends('master\app')
@inject('client','App\models\Client')
@inject('governorates','App\models\Governorate')
@inject('city','App\models\City')
@inject('category','App\models\Category')


@section('content-wrapper')

<!-- Content Header (Page header) -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Posts</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url(route('home'))}}">Main</a></li>
              <li class="breadcrumb-item active">Posts</li>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
            @include('flash::message')
              <div class="card-header">
                
                <a href="{{url(route('post.create'))}}" class="btn btn-primary" > اضافة جديد </a> 
              </div>
              
    
        @if(count($records))

          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Contant</th>
                <th>Image</th>
                <th>Category</th>
                <th class="text-center">Edit</th>
                <th class="text-center">Delete</th>
              </tr>
              </tehead>
              <tbody>
                <tr>
                  @foreach($records as $record)
                    <tr>
                       <td>{{$loop->iteration}}</td>
                       <td>{{$record->title}}</td> 
                       <td>{{$record->content}}</td> 
                      
                       <td>
                        <img src="{{$record->image}}"  width="50px" height="50px">
                       </td> 

                       <td>{{$record->category->name}}</td> 
                       
                       <td class="text-center"><a  href="{{url(route('post.edit',$record->id))}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                       </td>
                       <td class="text-center">
                       {!! Form::open([
                       'action' => ['PostController@destroy' ,$record->id ],
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