@extends('layouts.master')

@section('content')

	<div class = "main-wrapper" style="margin-top:30px">	
		<div class="row">
	      <div class="col s12 m12 l12">
	      	<span class="page-title"><h4>Collection</h4></span>
	      </div>
    	</div>
  	</div>

  	<div div class = "col s12 m12 l12"  style="background:#80d8ff; opacity:0.75; margin-top:20px; margin-right:15px; margin-left:10px; padding:25px;">
  		<div class="col s4 m4 l4">
  		<label style="color:black; margin-left:50px"><font size="+0.90">Billing Month</label>
  				<a><span class="badge">
  				<select class="browser-default">
					<option value="1" disabled selected>--Choose Month--</option>
					<option value="2">January</option>
					<option value="3">February</option>
					<option value="4">March</option>
					<option value="5">April</option>
					<option value="6">May</option>
					<option value="7">June</option>
					<option value="8">July</option>
					<option value="9">August</option>
					<option value="10">September</option>
					<option value="11">October</option>
					<option value="12">November</option>
					<option value="13">December</option>
				</select>
				</span></a>
		</div>

		<div class="col s4 m4 l4">
  		<label style="color:black; margin-left:50px"><font size="+0.90">Billing Year</label>
  			<a><span class="badge">
  			<select class="browser-default">
					<option value="1" disabled selected>--Choose Year--</option>
					<option value="2">2016</option>
					<option value="3">2015</option>
					<option value="4">2014</option>
					<option value="5">2013</option>
					<option value="6">2012</option>
					<option value="7">2011</option>
					<option value="8">2010</option>
					<option value="9">2009</option>
					<option value="10">2008</option>
					<option value="11">2007</option>
					<option value="12">2006</option>
					<option value="13">2005</option>
				</select>
			</span></a>
  		</div>

  		<div class="col s4 m4 l4">
  		<label style="color:black; margin-left:50px"><font size="+0.90">Billing Day</label>
  			<a><span class="badge">
  			<select class="browser-default">
					<option value="1" disabled selected>--Choose Day--</option>
					<option value="2">1</option>
					<option value="3">2</option>
					<option value="4">3</option>
					<option value="5">4</option>
					<option value="6">5</option>
					<option value="7">6</option>
					<option value="8">7</option>
					<option value="9">8</option>
					<option value="10">9</option>
					<option value="11">10</option>
					<option value="12">11</option>
					<option value="13">12</option>
					<option value="13">13</option>
					<option value="13">14</option>
					<option value="13">15</option>
					<option value="13">16</option>
					<option value="13">17</option>
					<option value="13">18</option>
					<option value="13">19</option>
					<option value="13">20</option>
					<option value="13">21</option>
					<option value="13">22</option>
					<option value="13">23</option>
					<option value="13">24</option>
					<option value="13">25</option>
					<option value="13">26</option>
					<option value="13">27</option>
					<option value="13">28</option>
					<option value="13">29</option>
					<option value="13">30</option>
					<option value="13">31</option>
				</select>
				</span></a>
  		</div>

  		<div class="col s4 m4 l4">
  		<label style="color:black; margin-left:50px"><font size="+0.90">Total No. of Customer</label><a><span class="badge">3</span></a>
  		</div>

  		<div class="col s4 m4 l4" >
  		<label style="color:black; margin-left:50px;"><font size="+0.90">Update</label><a><span class="new badge">0</span></a>
  		</div>
  	
  	<button class="waves-effect waves-dark btn light-green accent-1" style="color:black; margin-left:900px"><i class="material-icons left">done_all</i>Go</button>

  	</div>

  	<div class = "col s12 m12 l12" style="background:white; margin-top:20px; margin-right:15px; margin-left:10px; padding:25px;  border:3px outset gray;">				
			<div class="input-field col s12" style="padding-left:10px">
				<div class="col s12" style="margin-top:5px; background:white; padding-top:20px; padding-bottom:25px;">
					<table class = "table centered" border = "10px">
	       				<div class="input-field col s4" style="padding-left:200px; background:#80d8ff">
	       					<label style="color:black">Customer Type:</label>
								    <select class="browser-default">
								    	  <option value="1" disabled selected>--- Choose customer type ---</option>
									      <option value="1">Individual</option>
									      <option value="2">Company</option>
								    </select>
						</div>
						<br><br>
						<div class="divider"></div>

	       				<thead>
		          			<tr>
		          				 <th data-field="cust_id">Customer ID</th>
		                 		 <th data-field="name">Name</th>  
		                 		 <th data-field="payment_type">Payment Type</th>
		                 		 <th data-field="total_amount">Total Amount</th>
		                 		 <th data-field="downpayment">Downpayment</th>
		                 	</tr>
	                 	</thead>
	                 	<tbody>
	                 		<tr>
	                 			<td>COM 001</td>
	                 			<td>Bayer Inc</td>
	                 			<td>Check</td>
	                 			<td>12,000.00</td>
	                 			<td>6,000.00</td>
	                 		</tr>
	                 		<tr>
	                 			<td>COM 002</td>
	                 			<td>Nestle</td>
	                 			<td>Check</td>
	                 			<td>12,000.00</td>
	                 			<td>6,000.00</td>
	                 		</tr>
	                 		<tr>
	                 			<td>COM 002</td>
	                 			<td>Twitter</td>
	                 			<td>Check</td>
	                 			<td>16,000.00</td>
	                 			<td>8,000.00</td>
	                 		</tr>
	                 	</tbody>
                 	</table> 
	  			</div>

			</div>

			<div class="divider"></div>

			<div class="modal-footer" style="margin-left:600px; margin-top:50px">
  				<button class="waves-effect waves-dark btn light-green accent-1" style="color:black;  margin-right:25px"><i class="material-icons left">system_update_alt</i>Print</button>
	  			<button class="waves-effect waves-dark btn light-green accent-1" style="color:black;"><i class="material-icons left">delete</i>Remove Data</button>
  			</div>
		</div>


@stop