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
	<div class="card-header bg-warning mt-3">
		<h1 style="text-align:center;font-weight: bold;">Create Production Plan</h1>

	</div>
</div>

<div class="container mt-3">
	<form method="POST" action="/calendars">
		 {{ csrf_field() }}
		 
		<div class="form-group">
		    <b><label for="exampleFormControlSelect1">Customer Name/Plant Activity:</label></b>
		    <select class="form-control" name ="customer_id">

		    	@foreach ($customers as $customer)
		    		<option value="{{$customer->id}}">{{ $customer->name}}</option>
		    	@endforeach  		    
  		    </select>
	  </div>


			<div class="form-group">
			<b><label for="title" color = "blue">Production Name:</label></b>
		    <input type="text" class="form-control" name="order_no" required>
		</div>

		<div class="form-group">
		    <b><label for="exampleFormControlSelect1">Commodity/Activity:</label></b>
		    <select class="form-control" name ="commodity_id">

		    	@foreach ($products as $product)
		    		<option value="{{$product->id}}">{{ $product->name}}</option>
		    	@endforeach  		    
  		    </select>
	  </div>


		<div class="form-group">
			<b><label for="title">Quantity:</label></b>
		    <input type="text" class="form-control" name="quantity" required>
		</div>


		<div class="form-group">
			<b><label for="planned_start">Production Start:</label></b>
		    <input type="date" class="form-control" name="planned_start">
		</div>


		<div class="form-group">
			<b><label for="planned_end">Production End:</label></b>
		    <input type="date" class="form-control" name="planned_end">
		</div>

		<div class="form-group">
		    <b><label for="notes">Notes:</label></b>
		    <textarea class="form-control" name="notes" rows="3"></textarea>
  		</div>

		
		<button type="submit" class="btn btn-primary">Submit</button>
	</form> 
</div>

@endsection