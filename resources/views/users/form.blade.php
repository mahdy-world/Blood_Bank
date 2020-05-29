@inject('role','App\models\Role')
{!! Form::model($model ,[ 'action' => 'UserController@store' ]) !!}
<?php
$roles = $role->pluck('display_name', 'id')->toArray();
?>

        
<div class="form-group"> 
  <label for="name">Name</label>
  {!! Form::text('name',null,[
    'class' => 'form-control',
  ]) !!}
</div>

<div class="form-group"> 
  <label for="email">Email</label>
  {!! Form::email('email',null,[
    'class' => 'form-control',
  ]) !!}
</div>

<div class="form-group"> 
  <label for="password">Password</label>
  {!! Form::password('password',[
    'class' => 'form-control',
  ]) !!}
</div>

<div class="form-group"> 
  <label for="password_confirmation">Password confirmed</label>
  {!! Form::password('password_confirmation',[
    'class' => 'form-control',
  ]) !!}
</div>

<div class="form-group">
    <label for="roles_list">Roles List</label>
    {!! Form::select('roles_list[]',$roles,null, [
    'class'=>'form-control select2',
    'multiple' => 'multiple'
    ]) !!}


<div class="form-group"> 
    <button class="btn btn-success" type="submit">Add</button>
    
</div>



</div>
<!-- /.card-body -->