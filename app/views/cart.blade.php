@extends('layouts.master')

@section('content')

	<div class = "main-wrapper" style="margin-top:30px">	
		<div class="row">
	      <div class="col s12 m12 l12">
	      	<span class="page-title"><h4>Cart</h4></span>
	      </div>
    	</div>
  	</div>

  	<div class="row">
      	<div class="col s12 m12 l12">
	        <div class="card-panel">
	          	<div class="card-content">
	          		<div class = "row">
	          			<div class = "col s12 m12 l12 overflow-x">
	          				<table class = "striped centered">
	          					<thead>
	          						<tr>
	          							<th>Garment Type</th>
	          							<th>Garment Name</th>
	          							<th>Garment Segment Name</th>
	          							<th>Segment Pattern</th>
	          							<th>Quantity</th>
	          							<th>Price</th>
	          							<th>Measurement</th>
	          						</tr>
	          					</thead>
	          					<tbody>
	          						<tr>
	          							<td>Uniform</td>
	          							<td>Women's Uniform</td>
	          							<td>Skirt</td>
	          							<td>Pencil Cut</td>
	          							<td>1</td>
	          							<td>Php 500.00</td>
	          							<td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" href="#modalMeas">Record</button></td>	
	          						</tr>

	          						<tr>
	          							<td>Uniform</td>
	          							<td>Women's Uniform</td>
	          							<td>Sleeve</td>
	          							<td>Long Cut</td>
	          							<td>1</td>
	          							<td>Php 500.00</td>
	          							<td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" href="#modalMeasTop">Record</button></td>
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

	<div id="modalMeasTop" class="modal modal-fixed-footer">
		<div class = "modal-content">
			<h3>Record Measurement Here</h3>
			<div class = "row">
				<div class = "input field col s4">
                	<input  id="neck" name="neck" type="text">
                	<label for="neck">Neck: </label>
				</div>
				<div class = "col s2">
					<label>cm</label>
				</div>

				<div class = "input field col s4">
                	<input  id="chest" name="chest" type="text">
                	<label for="chest">Chest: </label>
				</div>
				<div class = "col s2">
					<label>cm</label>
				</div>

				<div class = "input field col s4">
                	<input  id="shoulder" name="shoulder" type="text">
                	<label for="shoulder">Shoulder: </label>
				</div>
				<div class = "col s2">
					<label>cm</label>
				</div>

				<div class = "input field col s4">
                	<input  id="biceps" name="biceps" type="text">
                	<label for="biceps">Biceps:</label>
				</div>
				<div class = "col s2">
					<label>cm</label>
				</div>

				<div class = "input field col s4">
                	<input  id="shortsleeve" name="shortsleeve" type="text">
                	<label for="shortsleeve">Short Sleeve Length:</label>
				</div>
				<div class = "col s2">
					<label>cm</label>
				</div>

				<div class = "input field col s4">
                	<input  id="arm" name="arm" type="text">
                	<label for="arm">Arm Length:</label>
				</div>
				<div class = "col s2">
					<label>cm</label>
				</div>

				<div class = "input field col s4">
                	<input  id="seat" name="seat" type="text">
                	<label for="seat">Length to Seat:</label>
				</div>
				<div class = "col s2">
					<label>cm</label>
				</div>

				<div class = "input field col s4">
                	<input  id="waist" name="waist" type="text">
                	<label for="waist">Waist:</label>
				</div>
				<div class = "col s2">
					<label>cm</label>
				</div>

				<div class = "input field col s4">
                	<input  id="wrist" name="wrist" type="text">
                	<label for="wrist">Wrist:</label>
				</div>
				<div class = "col s2">
					<label>cm</label>
				</div>

			</div>	
		</div>
		<div class = "modal-footer">
			<button type="submit" class=" waves-effect waves-green btn-flat">Add</button>  
             <button type="button" onclick="clearData()" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</button>
		</div>	
	</div>   

	
	<div id="modalMeasTop" class="modal modal-fixed-footer">
		<div class = "modal-content">
			<h3>Record Measurement Here</h3>
			<div class = "row">
				<div class = "input field col s4">
                	<input  id="neck" name="neck" type="text">
                	<label for="neck">Neck: </label>
				</div>
				<div class = "col s2">
					<label>cm</label>
				</div>

				<div class = "input field col s4">
                	<input  id="chest" name="chest" type="text">
                	<label for="chest">Chest: </label>
				</div>
				<div class = "col s2">
					<label>cm</label>
				</div>

				<div class = "input field col s4">
                	<input  id="shoulder" name="shoulder" type="text">
                	<label for="shoulder">Shoulder: </label>
				</div>
				<div class = "col s2">
					<label>cm</label>
				</div>

				<div class = "input field col s4">
                	<input  id="biceps" name="biceps" type="text">
                	<label for="biceps">Biceps:</label>
				</div>
				<div class = "col s2">
					<label>cm</label>
				</div>

				<div class = "input field col s4">
                	<input  id="shortsleeve" name="shortsleeve" type="text">
                	<label for="shortsleeve">Short Sleeve Length:</label>
				</div>
				<div class = "col s2">
					<label>cm</label>
				</div>

				<div class = "input field col s4">
                	<input  id="arm" name="arm" type="text">
                	<label for="arm">Arm Length:</label>
				</div>
				<div class = "col s2">
					<label>cm</label>
				</div>

				<div class = "input field col s4">
                	<input  id="seat" name="seat" type="text">
                	<label for="seat">Length to Seat:</label>
				</div>
				<div class = "col s2">
					<label>cm</label>
				</div>

				<div class = "input field col s4">
                	<input  id="waist" name="waist" type="text">
                	<label for="waist">Waist:</label>
				</div>
				<div class = "col s2">
					<label>cm</label>
				</div>

				<div class = "input field col s4">
                	<input  id="wrist" name="wrist" type="text">
                	<label for="wrist">Wrist:</label>
				</div>
				<div class = "col s2">
					<label>cm</label>
				</div>

			</div>	
		</div>
		<div class = "modal-footer">
			<button type="submit" class=" waves-effect waves-green btn-flat">Add</button>  
             <button type="button" onclick="clearData()" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</button>
		</div>	
	</div>     	


@stop