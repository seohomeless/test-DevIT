@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">
				  <h2>Добавить категорию</h2>
						@if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
						
						<form method="POST" action="{{action('CategoriController@store')}}" enctype="multipart/form-data" >
							{{ csrf_field() }}
							
							<label>Название</label>
							<input type="text" name="name" class="form-control" placeholder="например: диван" /><br>
							<input type = 'submit' value = "Добавить"  class="btn btn-primary btn-lg active" />
						</form>	
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
