@extends('layouts.master')

@section('content')

	<div class = "main-wrapper">	
		<div class="row">
	      <div class="col s12 m12 l12">
	      	<span class="page-title"><h4>Job Order Progress</h4></span>
	      </div>
    </div>
  </div>

  	<div class="row">
      	<div class="col s12 m12 l12">
	        <div class="card-panel">
	          	<div class="card-content">
	          		<div class="col s12 m12 l12 overflow-x">
                  <div class = "row">
                    <div class="input-field col s12">
                      <select>
                        <option value="" disabled selected>Choose Job Order</option>
                        <option value="1">JobOrder001</option>
                        <option value="2">JobOrder002</option>
                      </select>
                      <label>Choose Job Order:</label>
                    </div>

                    <div class="input-field col s12">
                      <input id = "jobOrder" name="jobOrder" type="text" value = "JobOrder001" readonly>
                      <label for="jobOrder">Job Order: </label>
                    </div>

                    <div class="input-field col s12">
                      <input id = "cusName" name="cusName" type="text" value = "Marc Delim" readonly>
                      <label for="cusName">Customer: </label>
                    </div>

                    <div class = "row">
                      <center><label><font color = "black" size = "+1">Order Details</font></label></center>
                      <div class = "col s4">
                        <br>
                        <center><label><font color = "black">Order Garment</font></label></center>
                      </div>

                      <div class = "col s4">
                        <br>
                        <center><label><font color = "black">Quantity</font></label></center>
                      </div>

                      <div class = "col s4">
                        <br>
                        &nbsp
                      </div> 

                      <div class="divider col s12"></div>
                     
                      <div class = "col s4">
                        <br>
                        <center><img class="responsive-img hoverable" src="../img/uniform3.jpg"></center>
                      </div>

                      <div class = "col s4">
                        <br>
                        <center><label><font color = "black">2</font></label></center>
                      </div>

                      <div class = "col s4">
                        <button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" href="#modalSpecs">Order Specifications</button></td>
                      </div>
                    </div>
                    <div class = "col s4">
                      <center><label><font color= "black">Women's Uniform</font></label></center>

                    </div>

                  </div>
                    

                </div>
                  
                <div class = "clearfix"></div>
	        	</div>
	    	</div>
		  </div>
	 </div>

  <div id="modalSpecs" class="modal modal-fixed-footer" style="width:700px">
    <div class="modal-content">

      <h3>Order Specifications</h3>
       

    </div>

    <div class="modal-footer">                  
      <button type="button" class=" modal-action modal-close waves-effect waves-green btn-flat">CLOSE</a>                    
    </div>
  </div> 



@stop

@section('scripts')
	<script>
    $(document).ready(function() {
    $('select').material_select();
    });
  </script>

@stop