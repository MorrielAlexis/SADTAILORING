
@extends('layouts.master')

@section('content')

	<div class = "main-wrapper" style="margin-top:30px">	
		<div class="row">
	      <div class="col s12 m12 l12">
	      	<span class="page-title"><h4>Collection</h4></span>
	      </div>
    	</div>
  	</div>


	<div class = "row" style="margin:20px;">

		<div class = "col s7 m7 l7" style="background:#b0bec5; padding:40px;  border:3px outset white;">			
			<div class="input-field col s12" style="padding-left:200px">
		          <input style="color:black" disabled id="cust_id" type="text" class="validate" value="IND00001"></input>
		          <label for="cust_id" style="color:black"><font size="+1">CUSTOMER ID:</font></label>
  			</div>

  			<div class="input-field col s12" style="padding-left:200px">
		          <input style="color:black" disabled id="cust_name" type="text" class="validate" value="BUENAVIDES, HONEY MAY A."></input>
		          <label for="cust_name" style="color:black"><font size="+1">CUSTOMER NAME:</font></label>
  			</div>

  			<div class="input-field col s12" style="padding-left:200px">
  				<label style="color:black"><font size="+1">CUSTOMER TYPE:</font></label>
				    <select class="browser-default">
				    	  <option value="1" disabled selected>--- Choose customer type ---</option>
					      <option value="1">Individual</option>
					      <option value="2">Company</option>
				    </select>
			</div>

			<div class="input-field col s12" style="padding-left:200px">
				<label style="color:black"><font size="+1">PAYMENT TYPE:</font></label>
				    <select class="browser-default">
				    	  <option value="1" disabled selected>--- Choose payment type ---</option>
					      <option value="1">Cheque/Check</option>
					      <option value="2">Cash</option>
				    </select>
			</div>

			<div class="modal-footer" style="padding-left:200px; margin-top:310px">
  				<button class="waves-effect waves-dark btn light-green accent-1" style="color:black;  margin-right:15px"><i class="material-icons left">system_update_alt</i>Save</button>
	  			<button class="waves-effect waves-dark btn light-green accent-1" style="color:black;"><i class="material-icons left">delete</i>Discard</button>
  			</div>

		</div>

		<div class = "col s4 m4 l4" style="background:#b0bec5; margin-left:20px; border:3px outset white;">
			<div class="col s12" style="margin-top:30px; padding-top:20px; padding-bottom:25px">
				<div class="input-field col s12" style="padding-left:200px">
		          <input style="color:red" disabled id="amount_total" type="text" class="validate" value="Php 2,000.00"></input>
		          <label for="amount_total" style="color:red; padding-left:30px"><font size="+2">AMOUNT TOTAL:</font></label>
  				</div>
  				<div class="col s12 divider" style="margin-bottom:45px; background-color:#455a64; height:2px"></div>
  				<div class="input-field col s12" style="padding-left:200px">
		          <input style="color:black" disabled id="downpayment" type="text" class="validate" value="Php 1,000.00"></input>
		          <label for="downpayment" style="color:black; padding-left:30px"><font size="+0.5">DOWNPAYMENT (50%):</font> </label>
  				</div>	
  				<div class="input-field col s12" style="padding-left:200px">
		          <input style="color:black" disabled id="amount_tender" type="text" class="validate" value="Php 3,000.00"></input>
		          <label for="amount_tender" style="color:black; padding-left:30px"><font size="+0.5">AMOUNT TENDERED:</font> </label>
  				</div>	
  				<div class="input-field col s12" style="padding-left:200px">
		          <input style="color:black" disabled id="change" type="text" class="validate" value="Php 1,000.00"></input>
		          <label for="change" style="color:black; padding-left:30px"><font size="+0.5">CHANGE:</font> </label>
  				</div>
  			</div>
		</div>


		<div class = "col s11 m11 l11" style="background:#b0bec5; margin-top:50px; margin-left:10px; padding:40px;  border:3px outset white;">			
			<label><left>Order Summary</left></label>
			<label style="padding-left:600px">March 12, 2016 2:30AM</label>
			<div class="input-field col s12" style="padding-left:10px">
				
				<div class="col s12" style="margin-top:5px; background:white; padding-top:20px; padding-bottom:25px; border:2px outset gray;">
					<table class = "table centered" border = "1">
					<div class="divider"></div>
	       				<thead>
		          			<tr>
		          				 <th data-field="job_order">JOB ORDER ID</th>
		                 		 <th data-field="order">PRODUCT AVAILED</th>  
		                 		 <th data-field="quantity">QUANTITY</th>
		                 		 <th data-field="price">ORDER PRICE</th>
		                 		 <th data-field="detail">DETAIL</th>
		                 	</tr>
	                 	</thead>
	                 	<tbody>
	                 		<tr>
	                 			<td>JO0001</td>
	                 			<td>Uniform</td>
	                 			<td>2</td>
	                 			<td>1000.00</td>
	                 			<td><a><u>Expand order detail</u></a></td>
	                 		</tr>
	                 		<tr>
	                 			<td>JO0002</td>
	                 			<td>Gown</td>
	                 			<td>1</td>
	                 			<td>500.00</td>
	                 			<td><a><u>Expand order detail</u></a></td>
	                 		</tr>
	                 		<tr>
	                 			<td>JO0003</td>
	                 			<td>Dress</td>
	                 			<td>1</td>
	                 			<td>500.00</td>
	                 			<td><a><u>Expand order detail</u></a></td>
	                 		</tr>
	                 	</tbody>
                 	</table> 

	  			</div>

			</div>
		</div>

	</div>


@stop

 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
 <script type="text/javascript" src="js/materialize.min.js"></script>
 <script type="text/javascript">
	 $(document).ready(function() {
	    $('select').material_select();
	  });
 </script>
