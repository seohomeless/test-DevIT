@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
					<h2>Изменить товар:</h2>

						<form method="POST" action="{{action('ProductController@store')}}" enctype="multipart/form-data" >
							{{ csrf_field() }}
							
							<label>Название</label>
							<input type="text" name="title" value="{{ $producti->title }}" class="form-control"  /><br>
							
							<label>Превью товара</label>
							<input type="file" name="prev_photo"  class="btn" /><br>

							<label>Категория</label><br>
										
								@foreach($categories as $category)
									<p><input type="checkbox" name="category[]" id="myCheckbox" class="my{{ $category->id }}" value="{{ $category->id }}" > {{ $category->name }}</p>
								@endforeach
							
							<label>Цена</label> 
							<input type="text" name="price" value="{{ $producti->price }}" class="form-control" /> <br>
							
							<label>Описание</label>
							<textarea name="description" class="form-control" id="editor1">{{ $producti->description }}</textarea><br>
							
							<input type = 'submit' value = "Изменить товар"  class="btn btn-primary btn-lg active" />
						</form>				
						@if(Session::has('message'))
						{{Session::get('message')}}
						@endif
						
						

				</div>
			</div>
		</div>
   </div>
</div>
<script>
@foreach($categorivibrani as $categorivibran)
		$('.my{{ $categorivibran->categori_id }}').attr('checked', 'check');
@endforeach	
</script>
@endsection


