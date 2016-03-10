@extends('layouts.master')

@section('content')
	
	<a style="color:black" class="btn btn-large center-text light-green accent-1" href="{{URL::to('/trans')}}"h>Previous</a>

	<div class = "main-wrapper">	
		<div class="row">
	      <div class="col s12 m12 l12">
	      	<span class="page-title"><h4>Alterations</h4></span>
	      </div>
    	</div>
  	</div>

  	<div class = "container">
	  	<div class="row">
	      	<div class="col s12 m12 l12">
		        <div class="card-panel">
		          	<div class="card-content">
		          		<h5><b>Choose Segment to be Alter</b></h5>
		          		<div class = "row">
			          		<div class = "col s4">
			          			<center><a style="color:black;" class="btn btn-large center-text light-green accent-1" href="{{URL::to('/tops')}}">Tops, Shirts & Blouses</a></center>
							</div>
							<div class = "col s4">
								<center><a style="color:black;" class="btn btn-large center-text light-green accent-1" href="{{URL::to('/pants')}}">Pants & Bottoms</a></center>
							</div>
							<div class = "col s4">
								<center><a style="color:black;" class="btn btn-large center-text light-green accent-1" href="{{URL::to('/denim')}}">Denim</a></center>
							</div>
						</div>
						<div class = "row">
							<div class = "col s4">
								<center><a style="color:black;" class="btn btn-large center-text light-green accent-1" href="{{URL::to('/jackets')}}">Jacket & Coats</a></center>
							</div>
							<div class = "col s4">
								<center><a style="color:black;" class="btn btn-large center-text light-green accent-1" href="{{URL::to('/dresses')}}">Dresses & Skirts</a></center>
							</div>
							<div class = "col s4">
								<center><a style="color:black;" class="btn btn-large center-text light-green accent-1" href="{{URL::to('/others')}}">Other</a></center>
							</div>	
						</div>
		          	</div>
		        </div>
		    </div>
		</div>
	</div>		          		
@stop
@section('scripts')
	<script type="text/javascript">
		$(document).ready(function() {
	    $('select').material_select();
	  });
	</script>
@stop