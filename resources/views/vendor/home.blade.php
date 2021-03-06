@extends('layouts.master')

@section('title')
Home
@endsection

@section('content')
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-sm-4">
                    @if($atl_ctr === 1)
                        <div class="alert alert-success">{{ \Config::get('facility.front_ctr_d') }} Center is ONLINE</div>
                    @else
                        <div class="alert alert-danger">{{ \Config::get('facility.front_ctr_d') }} Center is OFFLINE</div>
                    @endif
                    @if($atl_app === 1)
                        <div class="alert alert-success"> C90 TRACON is ONLINE</div>
                    @else
                        <div class="alert alert-danger">C90 TRACON is OFFLINE</div>
                    @endif
                    @if($atl_twr === 1)
                        <div class="alert alert-success">{{ \Config::get('facility.front_mjr_d') }} ATCT is ONLINE</div>
                    @else
                        <div class="alert alert-danger">{{ \Config::get('facility.front_mjr_d') }} ATCT is OFFLINE</div>
                    @endif
                    @if($clt_twr === 1)
                        <div class="alert alert-success">{{ \Config::get('facility.front_mnr_d') }} ATCT is ONLINE</div>
                    @else
                        <div class="alert alert-danger">{{ \Config::get('facility.front_mnr_d') }} ATCT is OFFLINE</div>
                    @endif
                </div>
				                <div class="col-sm-8">
                    <h1 class="display-4"><b>ZAU Chicago ARTCC</b></h1>
                    <p class="lead">Welcome! Chicago ARTCC provides ATC Services for Chicago O'Hare, the world's 2nd busiest airport and features a Class Bravo airport, Chicago O'Hare (KORD) as well as several Class Charlies and is a short hop away way from popular destinations like Saint Louis, Minneapolis, New York and Washington D.C. Come fly with us, and enjoy the challenges or come control with us and join our
	training program!</p>
                </div>
            </div>
        </div>
    </div>
<div class="container">
    <hr>
    <div class="row">
        <div class="col-sm-6">
            <center><h4><i class="fas fa-newspaper"></i> News</h4></center>
            @if(count($news) > 0)
                @foreach($news as $c)
                    <p>{{ $c->date }} - <b>{{ $c->title }}</b></p>
                @endforeach
            @else
                <center><i><p>No news to show.</p></i></center>
            @endif
        </div>
        <div class="col-sm-6">
            <center><h4><i class="fas fa-calendar-alt"></i> Calendar</h4></center>
            @if(count($calendar) > 0)
                @foreach($calendar as $c)
                    <p>{{ $c->date }} ({{ $c->time }}) - <b>{{ $c->title }}</b></p>
                @endforeach
            @else
                <center><i><p>No calendar events to show.</p></i></center>
            @endif
        </div>
    </div>
	<div class="row">
	        <div class="col-sm-12">
            <center><h4><i class="fas fa-plane"></i> Events</h4></center>
            @if($events->count() > 0)
                @foreach($events as $e)
                    <img src="{{ $e->banner_path }}" width="100%" alt="{{ $e->name }}">
                    <p></p>
                @endforeach
            @else
                <center><i><p>No events to show.</p></i></center>
            @endif
        </div>
	</div>
    <hr>
    <div class="row">
        <div class="col-sm-6">
            <center><h4><i class="fa fa-cloud"></i> Weather</h4></center>
            <div class="table">
                <table class="table table-bordered table-sm">
                    <thead>
                        <th scope="col"><center>Airport</center></th>
                        <th scope="col"><center>Conditions</center></th>
                        <th scope="col"><center>Wind</center></th>
                        <th scope="col"><center>Altimeter</center></th>
                    </thead>
                    <tbody>
                        @if($airports->count() > 0)
                            @foreach($airports as $a)
                                <tr>
                                    <td><a href="/pilots/airports/view/{{ $a->id }}"><center>{{ $a->ltr_4 }}</center></a></td>
                                    <td><center>{{ $a->visual_conditions }}</center></td>
                                    <td><center>{{ $a->wind }}</center></td>
                                    <td><center>{{ $a->altimeter }}</center></td>
                                </tr>
                            @endforeach
                        @else
                            <td colspan="4"><div align="center"><i>No Airports to Show</i></div></td>
                        @endif
                        <tr>
                            @if($metar_last_updated != null)
                                <td colspan="4"><div align="right"><i class="fas fa-sync-alt fa-spin"></i> Last Updated {{ $metar_last_updated }}Z</div></td>
                            @else
                                <td colspan="4"><div align="right"><i class="fas fa-sync-alt fa-spin"></i> Last Updated N/A</div></td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-6">
            <center><h4><i class="fa fa-broadcast-tower"></i> Online Controllers</h4></center>
            <div class="table">
                <table class="table table-bordered table-sm">
                    <thead>
                        <th scope="col"><center>Position</center></th>
                        <th scope="col"><center>Frequency</center></th>
                        <th scope="col"><center>Controller</center></th>
                        <th scope="col"><center>Time Online</center></th>
                    </thead>
                    <tbody>
                        @if($controllers->count() > 0)
                            @foreach($controllers as $c)
                                <tr>
                                    <td><center>{{ $c->position }}</center></td>
                                    <td><center>{{ $c->freq }}</center></td>
                                    <td><center>{{ $c->name }}</center></td>
                                    <td><center>{{ $c->time_online }}</center></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4"><center><i>No Controllers Online</i></center></td>
                            </tr>
                        @endif
                        <tr>
                            <td colspan="4"><div align="right"><i class="fas fa-sync-alt fa-spin"></i> Last Updated {{ $controllers_update }}Z</div></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <hr>
    <center><h4><i class="fa fa-plane"></i> Flights Currently Within {{ \Config::get('facility.name_short') }} Airspace</h4></center>
    <div class="table">
        <table class="table table-bordered table-sm">
            <thead>
                <th scope="col"><center>Callsign</center></th>
                <th scope="col"><center>Pilot Name</center></th>
                <th scope="col"><center>Aircraft Type</center></th>
                <th scope="col"><center>Departure</center></th>
                <th scope="col"><center>Arrival</center></th>
                <th scope="col"><center>Route</center></th>
            </thead>
            <tbody>
                @if($flights->count() > 0)
                    @foreach($flights as $c)
                        <tr>
                            <td><center>{{ $c->callsign }}</center></td>
                            <td><center>{{ $c->pilot_name }}</center></td>
                            <td><center>{{ $c->type }}</center></td>
                            <td><center>{{ $c->dep }}</center></td>
                            <td><center>{{ $c->arr }}</center></td>
                            <td><center>{{ str_limit($c->route, 50) }}</center></td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6"><center><i>No Pilots in {{ \Config::get('facility.name_short') }} Airspace</i></center></td>
                    </tr>
                @endif
                <tr>
                    <td colspan="6"><div align="right"><i class="fas fa-sync-alt fa-spin"></i> Last Updated {{ $flights_update }}Z</div></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
