@extends('layout.master')

@section('content')


<style>
body 
{
     background-image: url("css/coconut1.jpg"); 
     background-position: bottom right; 
     background-size: 300px; 
     background-repeat: repeat-x;
     background-repeat: no-repeat;

</style>
</body>

	<div class="container">	    
	<div class="card-header bg-primary mt-3">
		<h1 style="text-align:center;font-weight: bold;">{{$production->order_no}}</h1>
	</div>
</div>
	<div class="container my-3 px-5">

		<div class="row">

			@if(!$production->isForecast)
				<form method="PATCH" action="/{{$production->id}}/forecast">
					 {{ csrf_field() }}
					<button type="submit" class="btn btn-danger">Forecast</button>
				</form>
			@endif

			@if($production->isForecast)
				<form method="PATCH" action="/{{$production->id}}/unforecast">
					 {{ csrf_field() }}
					<button type="submit" class="btn btn-success">Confirmed</button>
				</form>
			@endif

			&nbsp;

			@if(!$production->isDone)
				<form method="PATCH" action="/{{$production->id}}/confirm">
					 {{ csrf_field() }}
					<button type="submit" class="btn btn-primary">Finish Production</button>
				</form>
			@endif

			@if($production->isDone)
				<form method="PATCH" action="/{{$production->id}}/unconfirm">
					 {{ csrf_field() }}
					<button type="submit" class="btn btn-warning">Unfinish Production</button>
				</form>
			@endif
		</div>

	</div>
	<div class="container">
		<div class="card">
		  <div class="card-body">
		  	<div class="row">
		  	<div class="col">
			  	<table class="">
			  		<tr>
			    		<th>Customer Name:<th>
		    			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		    			<td>{{ $production->customer->name }} <td>

					</tr>

			  		<tr>
			    		<th>Production Number:<th>
		    			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		    			<td>{{ $production->order_no }} <td>

					</tr>
			  		<tr>
			    		<th> Commodity: <th>
		    			<td></td>
		    			<td>{{ $production->commodity->name }} <td>
					</tr>
			  		<tr>
			    		<th> Quantity: <th>
		    			<td></td>
		    			<td>{{ $production->quantity }} <td>
					</tr>
					<tr>
			    		<th> Forecast: <th>
		    			<td></td>
		    			<td>{{ $production->isForecast ? 'Yes' : 'No' }} <td>
					</tr>
			  		<tr>
			    		<th> Produced: <th>
		    			<td></td>
		    			<td>{{ $production->isDone ? 'Yes' : 'No' }} <td>
					</tr>
					
		    	</table>
	    	</div>

<div class="col">
			  	<table class="">
			  		<tr>
			    		<th>Planned Start: <th>
		    			<td>&nbsp;&nbsp;&nbsp;</td>
		    			<td>{{ Carbon\Carbon::parse( $production->planned_start)->toFormattedDateString() }} <td>

					</tr>
			  		<tr>
			    		<th> Planned End: <th>
			    		<td></td>
		    			<td>{{ Carbon\Carbon::parse( $production->planned_end)->toFormattedDateString() }} <td>
		    		</tr>
			  		<tr>
			    		<th> Actual Start: <th>
			    		<td></td>
		    			<td>{{ Carbon\Carbon::parse( $production->actual_start)->toFormattedDateString() }} <td>
					</tr>
			  		<tr>
			    		<th> Actual End: <th>
			    		<td></td>
		    			<td>{{ Carbon\Carbon::parse( $production->actual_end)->toFormattedDateString() }} </td>
		    			<td> <td>
					</tr>
					<tr>
			    		<th> Notes: <th>
		    			<td></td>
		    			<td>{{ $production->notes }} <td>
					</tr>
			  		
		    	</table>
	    	</div>

	    </div>
		  </div>
		</div>
	</div>


	<div class="container mt-3">
		<table class="table table-striped border"> 
			<thead>
				<tr>
					<th>Date</th>
					<th>Done By</th>
					<th>Events</th>
				</tr>
			</thead>
			<tbody>
				@foreach($logs as $log)
					<tr>
						<b><td> {{ $log->created_at->toFormattedDateString()}}</td></b>
						<td> {{ $log->user->name}}</td>
						<td>{{$log->description}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{{ $logs->links() }}
	</div>

@endsection