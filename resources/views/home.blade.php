@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
	
		<div class="col-md-3 col-md-offset-0">	
			<div class="panel panel-default">
				<div class="panel-body">
					<ul class="menu">
					@foreach($categories as $categori)
						<li><a href="/categories/{{ $categori->id }}">{{ $categori->name }}</a></li>
					@endforeach
					</ul>
				</div>
			</div>
			Товаров на сайте: {{ $countproducts }} 
			<br>Категорий на сайте: {{ $countcategories }} 
		</div>
	 
        <div class="col-md-9 col-md-offset-0">
            <div class="panel panel-default">

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
				    <h2>Товары</h2>		
								
					@foreach($products as $product)
						<div class="tovar"><span class="price">Цена: {{ $product->price }} грн.</span>
						<img src="/img/{{ $product->photo }}"><a href="/tovar/{{ $product->id }}"><h3>{{ $product->title }}</h3></a>
						<p>{{ str_limit(strip_tags($product->description), 150) }}...
						<p><a href="/tovar/{{ $product->id }}">Подробнее</a>
						</div>
					@endforeach
					
					{{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


					