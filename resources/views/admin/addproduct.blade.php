@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
					<h2>Добавить товар:</h2>
					
						@if ($errors->any())
							@foreach ($errors->all() as $error)
								<span class="help-block">
									<strong>{{ $error }}</strong>
								</span>
							@endforeach
						@endif
						
						
						<form method="POST" action="{{action('ProductController@store')}}" enctype="multipart/form-data" >
							{{ csrf_field() }}
							
							<label>Название</label>
							<input type="text" name="title" class="form-control" placeholder="например: Мягкий диван" /><br>
							
							<label>Превью товара</label>
							<input type="file" name="prev_photo" class="btn " /><br>

							<label>Категория</label><br>
								@foreach ($categories as $category)
									<p><input type="checkbox" name="category[]" value="{{ $category->id }}" > {{ $category->name }}</p>
								@endforeach
								
							<label>Цена</label> 
							<input type="text" name="price"  class="form-control" /> <br>
							
							<label>Описание</label>
							<textarea name="description"  class="form-control" id="editor1"></textarea><br>
							
							<input type = 'submit' value = "Добавить"  class="btn btn-primary btn-lg active" />
						</form>				
						@if(Session::has('message'))
						{{Session::get('message')}}
						@endif
				</div>
			</div>
		</div>
   </div>
</div>

@endsection
