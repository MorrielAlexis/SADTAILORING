@extends('layouts.master')

@section('content')

<h1>Materials Purchasing</h1>

<div id="materialsPurchasing">
	<div class = "row" style="margin:20px;">
		<div class = "col s6 m6 l6" style="background:white; padding-left:42px; padding-right:42px; border:8px inset #00e676;">
			<label style="color:#01579b;"><font size="+3"><b>Materials Purchases</b></font></label>
			  	<div class="col s12">
			  			<div class="divider" style="background-color:#757575; height:3px"></div>
			  			<div class="divider" style="background-color:#757575; height:3px; margin-top:3px; margin-bottom:30px"></div>
			  	</div>
			  	<div class="container col s12" style="margin-top:20px; padding-top:20px; padding-bottom:25px; border:3px inset #bdbdbd;">
					<table class = "table centered" border = "1">
	       				<thead>
	       					<h5><center>Fabrics</center><h5>
		          			<tr>
		          				<th data-field="yard">Yard</th>
		                 		 <th data-field="fabric_type">Fabric Type</th>
		                 		 <th data-field="swatch_code">Swatch Code</th>   
		                 		 <th data-field="price">Price Per Yard</th>
		                 	</tr>
	                 	</thead>
	                 	<tbody>
	                 		<tr>
	                 			<td>3</td>
	                 			<td>Cotton</td>
	                 			<td>#COT0123</td>
	                 			<td>500.00</td>
	                 		</tr>
	                 		<tr>
	                 			<td>2</td>
	                 			<td>Linen</td>
	                 			<td>#LIN034</td>
	                 			<td>1000.00</td>
	                 		</tr>
	                 		<tr>
	                 			<td>3</td>
	                 			<td>Silk</td>
	                 			<td>#SIL001</td>
	                 			<td>1500.00</td>
	                 		</tr>
	                 	</tbody>
                 	</table>    
	  			</div>
	  	</div>
	 </div>
@stop