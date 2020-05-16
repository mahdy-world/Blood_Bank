
@inject('category','App\models\Category')


        
                      <div class="form-group"> 
                        <label for="name">العنوان</label>
                        {!! Form::text('title',null,[
                          'class' => 'form-control',
                        ]) !!}
                      </div>

                      <div class="form-group">
                          <label for="content">المحتوى</label>
                          {!! Form::textarea('content', null , [
                              'class' => 'form-control'
                          ]) !!}
                      </div>

                      <div class="form-group">
                          <label for="image">الصورة</label>
                          {!! Form::file('image', null , [
                              'class' => 'form-control'
                          ]) !!}
                      </div>

                      <div class="form-group">
                            <label for="category_id">القسم</label>
                            {!! Form::select('category_id',$category->pluck('name', 'id') , old('category_id'),
                            ['class'=>'form-control', 'placeholder' => '..............']) !!}
                        </div>

                
                      <div class="form-group"> 
                          <button class="btn btn-success" type="submit">حفظ</button>
                          
                      </div>
                
                     
                    
                       </div>
              <!-- /.card-body -->