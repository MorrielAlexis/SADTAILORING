@extends('layouts.master')

@section('content')
<div class="main-wrapper">
    <div class="row">
      <div class="col s12 m12 l12">
      <span class="page-title"><h4>Measurement Parts</h4></span>
    </div>

       <div class="row">
        <div class="col s12 m12 l6">
           <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#addMeasurementPart">ADD NEW PART</button>
         </div>
      </div>
     </div>


    <div class="row">
    	<div class="col s12 m12 l12">
    		<div class="card-panel">
   		    	<span class="card-title"><h5><center>Measurement Parts</center></h5></span>
   				<div class="divider"></div>
    			<div class="card-content">
      				<table class = "centered" align = "center" border = "1">
       				<thead>
          				<tr>
              			<th data-field="id">Measurement ID</th>
             		  	<th data-field="name">Measurement Name</th>
              			<th data-field="description">Measurement Description</th>
              			</tr>
              		</thead>
              		<tbody>
              			<td>ID</td>
              			<td>Measurement Name</td>
              			<td>Measurement Description</td>
              			<td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#editMeasurementPart">EDIT</button>
                 		</tbody>
              		</table>

                  <p>
              	<div id="editMeasurementPart" class="modal modal-fixed-footer">
           			<font color = "teal"><center><h5> Edit Measurement Part</h5></center></font> 
           			<div class="modal-content">

            		<div class="input-field">
                 <input id="MeasurementName" type="text" class="validate">
                 <label for="measurement_name"> Measurement Name: </label>
                </div>
                <div class="input-field">
                 <input id="MeasurementDescription" type="text" class="validate">
                 <label for="measurement_description">Measurement Description: </label>
                </div>
              </p>
            </div>

           			<div class="modal-footer">
         		   		<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">UPDATE</a>
           				 <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a>	
           			</div>

    			</div>

    		
    			</div>
    		</div>

          <p>
    			<div id="addMeasurementPart" class="modal modal-fixed-footer">
           			<font color = "teal"><h5><center> Add New Measurement Part </center></h5></font> 
                <div class="modal-content">

                <div class="input-field">
                 <input id="MeasurementName" type="text" class="validate">
                 <label for="measurement_name"> Measurement Name: </label>
                </div>
                <div class="input-field">
                 <input id="MeasurementDescription" type="text" class="validate">
                 <label for="measurement_description">Measurement Description: </label>
                </div>
              </p>
            </div>

                <div class="modal-footer">
                  <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">ADD</a>
                   <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a> 
                </div>
    	</div>
    </div>	

@stop

@section('scripts')
    <script>
      $(document).ready(function(){
      // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
      $('.modal-trigger').leanModal();
      });
    </script>


@stop
