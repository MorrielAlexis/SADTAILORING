@extends('layouts.master')

@section('content')

	<div class = "main-wrapper">	
		<div class="row">
	      <div class="col s12 m12 l12">
	      	<span class="page-title"><h4>Walk in Customer</h4></span>
	      </div>
    	</div>
  	</div>

  	<div class = "container">
	  	<div class="row">
	      	<div class="col s12 m12 l12">
		        <div class="card-panel">
		          	<div class="card-content">
		          		<div class = "col s12">
		          			<label><font size= "+2" color = "black">Choose Customer Type</font></label>
		          		</div>		

		          		<div class = "row">
		          			<div class ="col s6">
		          				<br>
		          				<center><a style="color:black" class="btn btn-large center-text light-green accent-1" href="{{URL::to('/customerIndividual')}}">Individual Customer</a></center>
	                  		</div>
	                  		<div class ="col s6">
	                  			<br>
		          				<center><a style="color:black" class="btn btn-large center-text light-green accent-1" href="{{URL::to('/customerCompany')}}">Company Customer</a></center>
	                  		</div>	          			
		          		</div>	
		          	</div>
		        </div>
		    </div>
		</div>
	</div>          	


@stop