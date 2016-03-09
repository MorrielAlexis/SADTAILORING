@extends('layouts.master')

@section('content')

	<a style="color:black" class="btn btn-large center-text light-green accent-1" href="{{URL::to('transaction/walk')}}">Back to Main Menu</a>

	<div class = "main-wrapper">	
		<div class="row">
	      <div class="col s12 m12 l12">
	      	<span class="page-title"><h4>Choose Product</h4></span>
	      </div>
    	</div>   
  	</div>

  	<div class = "container">
	  	<div class="row">
	      	<div class="col s12 m12 l12">
		        <div class="card-panel">
		          	<div class="card-content">
		          		<div class = "row">
				    		<div class = "col s6">
				    			<center><button style="color:black" class="modal-trigger btn btn-small center-text light-green accent-1" href="#modalSpecs">Choose Design from Catalogue</button></center>
				    		</div>
				    		<div class = "col s6">
				    			<center><button style="color:black" class="modal-trigger btn btn-small center-text light-green accent-1" href="#modalSpecs">Upload Design</button></center>
				    		</div>
				    	</div> 
				    	 <div class = "row">

						    <div class="col s12 m12 l12 overflow-x">
						    	<table class = "centered">
						    		<thead>
						    			<tr>
						    				<th>Order No.</th>
						    				<th>Garment Type</th>
						    				<th>Garment Name</th>
						    				<th>Garment Image</th>
						    				<th>Quantity</th>
						    				<th>Fabric Type</th>
						    				<th>Swatch Fabric Name</th>
						    				<th>Swatch Image</th>
						    				<th>Swatch Code</th>
						    			</tr>
						    		</thead>
						    		<tbody>
						    			<tr>
						    				<td>1</td>
						    				<td>Uniform</td>
						    				<td>Women's Uniform</td>
						    				<td><img class="img hoverable" src="img/uniform3.jpg"></td>
						    				<td>1</td>
						    				<td>Linen</td>
						    				<td>Linen Keme</td>
						    				<td><img class="img hoverable" src="imgSwatches/citadel alpine.jpg"></td>
						    				<td>LINK001</td>
						    			</tr>
						    			<tr>
						    				<td>Gown</td>
						    				<td>Tube Cocktail</td>
						    				<td><img class="img hoverable" src="img/gown2.jpg"></td>
						    				<td>1</td>
						    				<td>Cotton</td>
						    				<td>Cotton Keme</td>
						    				<td><img class="img hoverable" src="imgSwatches/citadel grape.jpg"></td>
						    				<td>COT001</td>
						    			</tr>
						    		</tbody>
						    	</table>
						    </div>
				                  
				            <div class = "clearfix"></div>
				        </div>
		          	</div>
		        </div>
		    </div>
		</div>
	</div>	        
                        


@stop