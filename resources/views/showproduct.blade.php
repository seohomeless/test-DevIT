@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
	
	
	 
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">

                <div class="panel-body">
				<h1>{{ $showproduct->title }}</h1>
				<img src="/img/{{ $showproduct->photo }}" style="max-width: 300px; height: auto; float: left; padding-right: 20px;" />
				<br><strong>{{ $showproduct->price }} грн.</strong>
				<br>{!! $showproduct->description !!}
				
                </div>
            </div>
        </div>
    </div>
</div>
@endsection