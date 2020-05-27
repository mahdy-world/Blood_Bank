@inject('models','App\models\Governorate')

<div class="form-group"> 
<label for="name">Name</label>
    {!! Form::text('name', null , [
        'class' => 'form-control'
    ]) !!}
</div>

<div class="form-group">
    <label for="governorate_id">Governorates</label>
    {!! Form::select('governorate_id',$models->pluck('name', 'id') , old('governorate_id'),
     ['class'=>'form-control', 'placeholder' => '..............']) !!}
</div>
<div class="form-group">
    <button class="btn btn-primary" type="submit">Save</button>
</div>