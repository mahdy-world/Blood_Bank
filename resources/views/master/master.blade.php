@extends('master/app')
@inject('client','App\models\Client')
@inject('governorates','App\models\Governorate')
@inject('city','App\models\City')
@inject('categories','App\models\Category')
@inject('posts','App\models\Post')
@inject('donation','App\models\DonationRequest')
@inject('contact','App\models\Contact')
@inject('user','App\User')


@section('content-wrapper')
<!-- Content Header (Page header) -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ControlPanel</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Main</a></li>
              <li class="breadcrumb-item active">ControlPanel</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Public</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            
          </div>
        </div>
        <div class="card-body">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$governorates->count()}}</h3>

                <p>Governorates</p>
              </div>
              <div class="icon">
                <i class="fas fa-flag"></i>
              </div>
              <a href="{{url(route('governorate.index'))}}" class="small-box-footer">
                View<i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$city->count()}}</h3>

                <p>Citis</p>
              </div>
              <div class="icon">
                <i class="fas fa-map"></i>
              </div>
              <a href="{{url(route('city.index'))}}" class="small-box-footer">
               View <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$categories->count()}}</h3>

                <p>Categories</p>
              </div>
              <div class="icon">
                <i class="fas fa-list-ul"></i>
              </div>
              <a href="{{url(route('category.index'))}}" class="small-box-footer">
               View <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$posts->count()}}</h3>

                <p>Posts</p>
              </div>
              <div class="icon">
              <i class="fas fa-scroll"></i>
              </div>
              <a href="{{url(route('post.index'))}}" class="small-box-footer">
                View <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-gray">
              <div class="inner">
                <h3>{{$donation->count()}}</h3>

                <p>Donation Requests</p>
              </div>
              <div class="icon">
              <i class="fas fa-box-open"></i>
              </div>
              <a href="{{url(route('donationrequest.index'))}}" class="small-box-footer">
                View <i class="fas fa-arrow-circle-left"></i>
              </a>
            </div>
          </div>

          
          <!-- ./col -->
        </div>
        </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Private</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            
          </div>
        </div>
        <div class="card-body">
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{$contact->count()}}</h3>

                <p>ContactUS</p>
              </div>
              <div class="icon">
              <i class="fas fa-comments"></i>
              </div>
              <a href="{{url(route('contant.index'))}}" class="small-box-footer">
                View<i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box bg-">
              <div class="inner">
                <h3>{{$client->count()}}</h3>

                <p>Clients</p>
              </div>
              <div class="icon">
              <i class="fas fa-users"></i>
              </div>
              <a href="{{url(route('client.index'))}}" class="small-box-footer">
               View <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$user->count()}}</h3>

                <p>Users</p>
              </div>
              <div class="icon">
              <i class="fas fa-user-secret"></i> 
              </div>
              <a href="{{url(route('users.index'))}}" class="small-box-footer">
               View <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          
        </div>
        </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

    
@endsection