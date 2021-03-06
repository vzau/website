@extends('layouts.landing')

@section('title')
Welcome
@endsection

@section('content')
<br>
		<img src="https://picsum.photos/1200/250?blur" class="img-responsive rounded shadow-lg" width="100%" alt="...">
<br>
<br>
	<a href="https://pirep.chicagoartcc.org/">
		<img src="https://picsum.photos/1201/251?blur" class="img-responsive rounded shadow-lg" width="100%" alt="...">
	</a>
    <div class="card o-hidden border-0 shadow-lg my-4">
        <div class="row no-gutters">
          <div class="col-lg-7">
				<img src="https://picsum.photos/800/250?blur" class="card-img img-fluid">
		  </div>
          <div class="col-lg-5">
            <div class="p-5 text-center">
				<h4 class="text-primary">
					Airport Charts & Weather
				</h4>
			            {!! Form::open(['action' => 'FrontController@searchAirport']) !!}
                <div class="form-inline justify-content-center">
                    {!! Form::text('apt', null, ['placeholder' => 'Search Airport (ICAO)', 'class' => 'form-control']) !!}
                    &nbsp;
                    <button class="btn btn-success" type="submit">Search</button>
                </div>
            {!! Form::close() !!}
				</div>
              </div>
            </div>
          </div>
        </div>

@endsection
