
@inject('category','App\models\Category')


        
                      <div class="form-group"> 
                        <label for="name">Adress</label>
                        {!! Form::text('title',null,[
                          'class' => 'form-control',
                        ]) !!}
                      </div>

                      <div class="form-group">
                          <label for="content">Contante</label>
                          {!! Form::textarea('content', null , [
                              'class' => 'form-control'
                          ]) !!}
                      </div>

                      <div class="form-group">
                          <label for="image">Image</label>
                          {!! Form::file('image', null , [
                              'class' => 'form-control'
                          ]) !!}
                      </div>

                      <div class="form-group">
                            <label for="category_id">Category</label>
                            {!! Form::select('category_id',$category->pluck('name', 'id') , old('category_id'),
                            ['class'=>'form-control', 'placeholder' => '..............']) !!}
                        </div>

                
                      <div class="form-group"> 
                          <button class="btn btn-success" type="submit">Save</button>
                          
                      </div>
                
                     
                    
                       </div>
              <!-- /.card-body -->