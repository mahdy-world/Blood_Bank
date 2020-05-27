{!! Form::model($model ,[ 'action' => 'CategoryController@store' ]) !!}
        
                      <div class="form-group"> 
                        <label for="name">Name</label>
                        {!! Form::text('name',null,[
                          'class' => 'form-control',
                        ]) !!}
                      </div>
                
                      <div class="form-group"> 
                          <button class="btn btn-success" type="submit">ٍSave</button>
                          
                      </div>
                
                     
                    
                       </div>
              <!-- /.card-body -->