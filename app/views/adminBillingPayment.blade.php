@extends('layouts.master')

@section('content')

	<div class = "main-wrapper">	
		<div class="row">
	      <div class="col s12 m12 l12">
	      	<span class="page-title"><h4>Bill A Customer</h4></span>
	      </div>
    	</div>
  	</div>

<div class="col s12" style="background:black; opacity:0.80; margin-top:20px; padding-top:20px; padding-bottom:25px; border:3px inset #bdbdbd;"></div>

	<div class = "row" style="margin:20px;">
		<div class = "col s6 m6 l6" style="background:white; padding:40px;  border:8px outset #00b0ff;">
	  		<label style="color:red; padding-left:13px"><font size="+3"><b>Payment Details</b></font></label>
	  		<div class="col s12">
	  			<div class="divider" style="background-color:#757575; height:3px"></div>
	  			<div class="divider" style="background-color:#757575; height:3px; margin-top:3px; margin-bottom:30px"></div>
	  		</div>
	  		<br><br>
	  			<div class="input-field col s12">
		          <input disabled id="cust_name" type="text" class="validate"></input>
		          <label for="cust_name" style="color:gray">Customer Name: </label>
  				</div>
	  			<div class="input-field col s12">
				    <select>
				    	  <option value="1" disabled selected></option>
					      <option value="1">Individual</option>
					      <option value="2">Company</option>
				    </select>
				    <label style="color:gray">Customer Type: </label>
				</div>
	  			<div class="input-field col s12">
				    <select>
				    	  <option value="1" disabled selected></option>
					      <option value="1">Cheque/Check</option>
					      <option value="2">Cash</option>
				    </select>
				    <label style="color:gray">Payment Type: </label>
				</div>

			<div class="container col s12" style="margin-top:30px; padding-top:20px; padding-bottom:25px; border:3px inset #bdbdbd;">
				<div class="input-field col s12" style="padding-left:150px">
		          <input disabled id="order_num" type="text" class="validate"></input>
		          <label for="order_num" style="color:gray; padding-left:30px">Order Number: </label>
  				</div>
				<div class="input-field col s12" style="padding-left:150px">
		          <input disabled id="amount_received" type="text" class="validate"></input>
		          <label for="amount_received" style="color:gray; padding-left:30px">Amount Received: </label>
  				</div>
  				<div class="input-field col s12" style="padding-left:150px">
		          <input disabled id="amount_balance" type="text" class="validate"></input>
		          <label for="amount_balance" style="color:gray; padding-left:30px">Amount To Pay: </label>
  				</div>	
  			</div>
  			<div class="modal-footer" style="padding-left:200px; margin-top:570px">
  				<button class="waves-effect waves-dark btn light-green accent-1" style="color:black;  margin-right:15px"><i class="material-icons left">input</i>Edit</button>
	  			<button class="waves-effect waves-dark btn light-green accent-1" style="color:black;"><i class="material-icons left">system_update_alt</i>Save</button>
  			</div>
  	</div>

	  	<div class = "col s6 m6 l6" style="background:white; padding:40px;  border:8px inset #c6ff00;">
		  		<label style="color:#01579b;"><font size="+3"><b>Order Summary</b></font></label>
		  		<div class="col s12">
		  			<div class="divider" style="background-color:#757575; height:3px"></div>
		  			<div class="divider" style="background-color:#757575; height:3px; margin-top:3px; margin-bottom:30px"></div>
		  		</div>

				<div class="container col s12" style="margin-top:20px; padding-top:20px; padding-bottom:25px; border:3px inset #bdbdbd;">
					<table class = "table centered" border = "1">
	       				<thead>
		          			<tr>
		          				<th data-field="quantity">Quantity</th>
		                 		 <th data-field="order">Products Availed</th>   
		                 		 <th data-field="price">Unit Price</th>
		                 	</tr>
	                 	</thead>
	                 	<tbody>
	                 		<tr>
	                 			<td>1</td>
	                 			<td>Uniform - Blouse</td>
	                 			<td>500.00</td>
	                 		</tr>
	                 		<tr>
	                 			<td>2</td>
	                 			<td>Uniform - Skirts</td>
	                 			<td>1000.00</td>
	                 		</tr>
	                 		<tr>
	                 			<td>1</td>
	                 			<td>Uniform - Pants</td>
	                 			<td>1500.00</td>
	                 		</tr>
	                 	</tbody>
                 	</table>    
	  			</div>
	  	</div>

	  	<div class = "col s6 m6 l6" style="background:white; padding-left:42px; padding-right:42px; border:8px inset #ff5252;">
		  	<div class="input-field col s12" style="padding-left:300px">
		          <input disabled id="sub_total" type="text" class="validate"></input>
		          <label for="sub_total" style="color:gray;">Sub Total: </label>
  			</div>
  			<div class="input-field col s12" style="padding-left:300px">
		          <input disabled id="vat" type="text" class="validate"></input>
		          <label for="vat" style="color:gray;">Vatable (12%): </label>
  			</div>
  			<div class="input-field col s12" style="padding-left:300px">
		          <input disabled id="downpayment" type="text" class="validate"></input>
		          <label for="downpayment" style="color:gray;">Downpayment (50%): </label>
  			</div>
  			<div class="col s12">
		  			<div class="divider" style="background-color:red; margin-top:5px;"></div>
		  	</div>
  			<div class="input-field col s12" style="padding-left:300px">
		          <input disabled id="grand_total" type="text" class="validate" style="color:red"><font size="+2"></font></input>
		          <label for="grand_total" style="color:red;"><font size="+2"><b>Grand Total: </b></font></label>
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


