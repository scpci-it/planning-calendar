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

	<link href="{{ asset('css/fullcalendar.css') }}" rel="stylesheet">

<div class="container">	    
	<div class="card-header bg-primary mt-3">
		<h1 style="text-align:center;font-weight: bold;">Plant Schedule</h1>
	</div>
</div>

<div class="container">

		@if($flash = session('message'))
			<div class="alert alert-success mt-3" role="alert">
				{{ $flash }}
			</div>
		@endif
</div>

		<div id='calendar' class ='container mt-3'></div>

@endsection

@section('scripts')

	<script src="{{ asset('js/jquery1.11.3.js') }}"></script>
	<script src="{{ asset('js/moment.js') }}"></script>
	<script src="{{ asset('js/fullcalendar.js') }}"></script>
			
	<script>
	    $(document).ready(function() {

	        $('#calendar').fullCalendar({

	            height : 650,
	            editable : true,
	            eventLimit: true,


       			header: {
			        left: 'prev,next today',
			        center: 'title',
			        right: 'listDay,listWeek,listMonth'
		      	},

	            events : [
	            
	            	@foreach($productions as $production)
	            	{
	                   	id : '{{ $production->id }}',
	                   	url : '{{ $production->id }}',
	                    title : '{!!$production->order_no!!} - {{ $production->commodity->name}}',
	                    start : '{{ $production->actual_start }}',
	                    end : 	'{{ \Carbon\Carbon::parse($production->actual_end)->addDays(1)}}',
	                    allDay : true,
	                    color : '{{$production->customer->color}}',
	                    textColor : '{{$production->customer->text_color}}',
	                    borderColor : '{{$production->customer->border_color}}',
	                   
	                    
	                    

	                },

	                @endforeach

	            ],
					

		      	views: {
			        listDay: { buttonText: 'Day' },
			        listWeek: { buttonText: 'Week' },
			        listMonth: { buttonText: 'Month' }
		      	},



	             eventResize: function(event, delta, revertFunc) {

					axios({
						method: 'post',
						url: '/calendar/update',
						data: {
					    	start: event.start,
					    	end: event.end,
					    	id: event.id,
					  	}
					}).then(
						(response)=>{console.log(response.data)},
						(error)=>{console.log(error)}
						);

			  	},

				eventDrop: function(event, delta, revertFunc) {

					axios({
						method: 'post',
						url: '/calendar/update',
						data: {
					    	start: event.start,
					    	end: event.end,
					    	id: event.id,
					  	}
					}).then(
						(response)=>{console.log(response.data)},
						(error)=>{console.log(error)}
						);
				}
	                   
	        })
	    });
	</script>

@endsection

