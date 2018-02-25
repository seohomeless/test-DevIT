@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-body">
					<h2>Товары:</h2>
					
							@if(Session::has('message'))
								{{Session::get('message')}}
							@endif
							
						<table style="width: 100%;" class="showproduct">
						<th>Фото</th>
						<th>Заголовок</th>
						<th>Описание</th>
						<th></th>
						<th></th>
						@foreach($products as $product)
						
						<tr>
						<td><img src="/img/{{ $product->photo }}" style="width: 160px; height: auto;" /> </td>
						<td>{{ $product->title }}</td>
						<td>Цена: {{ $product->price }} грн.
						<br>{{ str_limit(strip_tags($product->description), 100) }}...
						<br><a href="/tovar/{{ $product->id }}">Подробнее</a>
						</td>
						<td><a href="{{action('ProductController@edit',['products'=>$product->id])}}">Изменить</a></td>
						<td>
							<form method="POST" action="{{action('ProductController@destroy',['product'=>$product->id])}}">
								<input type="hidden" name="_method" value="delete"/>
								<input type="hidden" name="_token" value="{{csrf_token()}}"/>
								<input type="submit" value="Удалить"/>
							</form>
						</td>
						</tr>		
						@endforeach
						
						</table>
				</div>
			</div>
		</div>
   </div>
</div>

@endsection
