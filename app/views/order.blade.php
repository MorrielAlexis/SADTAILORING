@extends('layouts.master')

@section('content')
	
	<a style="color:black" class="btn btn-large center-text light-green accent-1" href="{{URL::to('/trans')}}">Previous</a>

	<div class = "main-wrapper">	
		<div class="row">
	      <div class="col s12 m12 l12">
	      	<span class="page-title"><h4>Made to Order</h4></span>
	      </div>
    	</div>
  	</div>

  	<div class = "container">
	  	<div class="row">
	      	<div class="col s12 m12 l12">
		        <div class="card-panel">
		          	<div class="card-content">
		          		<div class = "col s12">
		          			<label><font size= "+2" color = "black">Choose one</font></label>
		          		</div>		

		          		<div class = "row">
		          			<div class ="col s4">
		          				<br>
		          				<center><a style="color:black" class="btn btn-large center-text light-green accent-1" href="{{URL::to('/orderCatalogue')}}">CATALOGUE DESIGN</a></center>
	                  		</div>
	                  		<div class ="col s4">
	                  			<br>
		          				<center><a style="color:black" class="btn btn-large center-text light-green accent-1" href="{{URL::to('/orderPersonalize')}}">PERSONALIZE DESIGN</a></center>
	                  		</div>	
	                  		<div class ="col s4">
	                  			<br>
		          				<center><a style="color:black" class="btn btn-large center-text light-green accent-1" href="{{URL::to('/orderUpload')}}">UPLOAD DESIGN</a></center>
	                  		</div>          			
		          		</div>	
		          	</div>
		        </div>
		    </div>
		</div>
	</div>
@stop