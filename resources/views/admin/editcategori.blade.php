@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">
				  <h2>Редактировать категорию</h2>
							
						<form method="POST" action="{{action('CategoriController@update',['categories'=>$categori->id])}}" enctype="multipart/form-data" >
							{{ csrf_field() }}
							
							<label>Название</label>
							<input type="text" name="name" value="{{ $categori->name }}" class="form-control" /><br>
							<input type="hidden" name="_method" value="put"/>
							<input type="hidden" name="_token" value="{{csrf_token()}}"/>
							<input type = 'submit' value = "Изменить категорию"  class="btn btn-primary btn-lg active" />
						</form>	
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
