@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">
				  <h2>Категории</h2>
							@if(Session::has('message'))
								{{Session::get('message')}}
							@endif
							
						<table style="width: 100%;" class="showproduct">
							<th>Название</th>
							<th></th>
							<th></th>
						
						@foreach($categories as $categori)
							<tr>
								<td>{{ $categori->name }}</td>
								<td><a href="{{action('CategoriController@edit',['categori'=>$categori->id])}}">Изменить</a></td>
								<td>
									<form method="POST" action="{{action('CategoriController@destroy',['categori'=>$categori->id])}}">
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
