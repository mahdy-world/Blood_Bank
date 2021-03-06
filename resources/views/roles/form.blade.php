@inject('per','App\models\Permission')
{!! Form::model($model ,[ 'action' => 'RoleController@store' ]) !!}
        
                      <div class="form-group"> 
                        <label for="name">Name</label>
                        {!! Form::text('name',null,[
                          'class' => 'form-control',
                        ]) !!}
                      </div>


                      <div class="form-group"> 
                        <label for="display_name">Name viwer</label>
                        {!! Form::text('display_name',null,[
                          'class' => 'form-control',
                        ]) !!}
                      </div>

                      <div class="form-group"> 
                        <label for="description">الوصف</label>
                        {!! Form::textarea('description',null,[
                          'class' => 'form-control',
                        ]) !!}
                      </div>

                      <div class="form-group"> 
                        <label for="name">Permissions</label>
                        <div class="row">

                            @foreach($per->all() as $permission)
                              <div class=" col-sm-3">
                                <div class="checkbox">
                                  <label>
                                    <input type="checkbox" name="permissions_list[]" value="{{$permission->id}}" 

                                    @if($model->hasPermission($permission->name))
                                      checked
                                      @endif
                                    >
                                    {{$permission->display_name}}
                                   
                                  </label>
                                </div>

                                </div>

                            @endforeach

                        </div>
                        
                      </div>
                
                      <div class="form-group"> 
                          <button class="btn btn-success" type="submit">Save</button>
                          
                      </div>
                
                     
                    
                       </div>
              <!-- /.card-body -->
@push('scripts')


@endpush
