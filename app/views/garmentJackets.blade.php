@extends('layouts.master')

@section('content')
	<a style="color:black" class="btn btn-large center-text light-green accent-1" href="{{URL::to('/alteration')}}">Previous</a>
	<div class = "main-wrapper">	
		<div class="row">
	      <div class="col s12 m12 l12">
	      	<span class="page-title"><h4>Jackets</h4></span>
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
		          				<input type="checkbox" class="filled-in" id="shorten" />
      							<label for="shorten">Shorten (Php 50.00)</label>
		          			</div>
		          			<div class = "col s3">
		          				<input type="checkbox" class="filled-in" id="slim" />
      							<label for="slim">Slim (PHP 50.00)</label>
		          			</div>
		          			<div class = "col s3">
		          				<input type="checkbox" class="filled-in" id="shortenCuff" />
      							<label for="shortenCuff">Shorten Sleeves (Php 50.00)</label>
		          			</div>
		          			<div class = "col s3">
		          				<input type="checkbox" class="filled-in" id="shortenShoulder" />
      							<label for="shortenShoulder">Shorten Shoulder (Php 50.00)</label>
		          			</div>	
		          		</div>
		          		<div class = "row">
		          			<div class = "col s3">
		          				<input type="checkbox" class="filled-in" id="slimSleeve" />
      							<label for="slimSleeve">Slim Sleeves (Php 50.00)</label>
		          			</div>
		          			<div class = "col s3">
		          				<input type="checkbox" class="filled-in" id="shoulder" />
      							<label for="shoulder">Adjust Shoulder(PHP 50.00)</label>
		          			</div>
		          			<div class = "col s3">
		          				<input type="checkbox" class="filled-in" id="darts"  />
      							<label for="darts">Add Darts (PHP 50.00)</label>
		          			</div>
		          			<div class = "col s3">
		          				<input type="checkbox" class="filled-in" id="lining"  />
      							<label for="lining">Replace Lining (PHP 50.00)</label>
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