@extends('layouts.master')

@section('content')
	<a style="color:black" class="btn btn-large center-text light-green accent-1" href="{{URL::to('/alteration')}}">Previous</a>
	<div class = "main-wrapper">	
		<div class="row">
	      <div class="col s12 m12 l12">
	      	<span class="page-title"><h4>Other</h4></span>
	      </div>
    	</div>
  	</div>

  	<div class = "container">
	  	<div class="row">
	      	<div class="col s12 m12 l12">
		        <div class="card-panel">
		          	<div class="card-content">
		          		<h5><b>Choose Alter Services Offered</b></h5>
		          		<br>
		          		<div class = "row">
		          			<div class = "col s3">
		          				<input type="checkbox" class="filled-in" id="addRemove" />
      							<label for="addremove">Add/Remove Zippers/Buttons (Php 50.00)</label>
		          			</div>
		          			<div class = "col s3">
		          				<input type="checkbox" class="filled-in" id="zipper" />
      							<label for="zipper">Move Zipper (PHP 50.00)</label>
		          			</div>
		          			<div class = "col s3">
		          				<input type="checkbox" class="filled-in" id="heavily" />
      							<label for="heavily">Heavily Embellished Items (PHP 50.00) </label>
		          			</div>
		          			<div class = "col s3">
		          				<input type="checkbox" class="filled-in" id="hem" />
      							<label for="hem">Hem Leather (PHP 50.00) </label>
		          			</div>	
		          		</div>
		          		<div class = "row">
			          		<div class = "col s6">&nbsp</div>
			          		<div class="input-field col s6">
			                  <input id="total" name = "total" type="text" readonly>
			                  <label for="total"> Total Price </label>
			                </div>
			                <div class="input-field col s12">
			                  <input id="note" name = "note" type="text" readonly>
			                  <label for="note"> Note:</label>
			                </div>
			          	</div>

			        	<center><a style="color:black" class="btn btn-large center-text light-green accent-1" href="">Place Order</a></center>
		          	</div>
		        </div>
		    </div>
		</div>
	</div>	         	
@stop