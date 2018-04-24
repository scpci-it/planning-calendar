@extends('layout.master')

@section('content')

  		<style>
		body  {   
	     background-image: url("css/coconut1.jpg"); 
	     background-position: bottom right; 
	     background-size: 300px; 
	     background-repeat: repeat-x;
	     background-repeat: no-repeat;
	  
		}
		</style>
		</body>	

<div class="container">
	  <div class="card">
	    <div class="card-header bg-success">

	    	<center><h1 style="text-align:center;font-weight: bold;">Plant Activities</h1></center>

		</div>
		</div>

		
<div class="container">
	<table class="table">
	    <thead>
	      <tr>
	        <th>Order No</th>
	        <th>Commodity or Activity</th>
	        <th>Actual Start</th>
	        <th>Actual End</th>
	    
	      </tr>
	    </thead>
	    <tbody>             

	    	@foreach($productions as $production)
		      <tr>
		        <td><a href = "{{$production->id}}">{{ $production->order_no }}</td></a>
		        <td>{{ $production->commodity->name }}</td>
		        <td>{{ Carbon\Carbon::parse($production->actual_start)->toFormattedDateString()}}</td>
		        <td>{{ Carbon\Carbon::parse($production->actual_end)->toFormattedDateString()}}</td>
		      </tr>
	      	@endforeach	      	
    		
	    </tbody>
  	</table>

  	{{ $productions->links() }}
</div>

@endsection

