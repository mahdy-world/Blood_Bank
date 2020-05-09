{!! Form::model($model ,[ 'action' => 'GovernorateController@store' ]) !!}
        
                      <div class="form-group"> 
                        <label for="name">الاسم</label>
                        {!! Form::text('name',null,[
                          'class' => 'form-control',
                        ]) !!}
                      </div>
                
                      <div class="form-group"> 
                          <button class="btn btn-success" type="submit">حفظ</button>
                          
                      </div>
                
                     
                    
                       </div>
              <!-- /.card-body -->