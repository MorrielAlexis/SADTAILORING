@extends('layouts.master')

@section('content')
    <div class="row">
    	<div class="col s12 m12 l12">
    		<div class="card-panel">
   		    	<span class="card-title"><h4>Fabric and Materials</h4></span>
   				<div class="divider"></div>
    			<div class="card-content">

    			<a class="waves-effect waves-light btn modal-trigger" href="#add">ADD</a>
    
      				<table class = "centered" align = "center" border = "1">
       				<thead>
          				<tr>
              			<th data-field="id">Fabric Type ID</th>
             		  	<th data-field="fabricName">Fabric Name</th>
              			<th data-field="fabricDescription">Fabric Description</th>
              			</tr>
              		<thead>
              		<tbody>
              			<td>id</td>
              			<td>Fabric Name</td>
              			<td>Fabric Description</td>
              			<td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit">EDIT</button>
              			


              		</tbody>
              		</table>

              	<div id="edit" class="modal">
           			  <div class = "label"><font color = "teal" size = "+3" back >&nbsp Fabric Type
                 </font> </div>
           			<div class="modal-content">

                <div class="input-field">
                 <input id="FabricName" type="text" class="validate">
                 <label for="fabric_name">Fabric Name: </label>
                </div>

                <div class="input-field">
                 <input id="FabricDescription" type="text" class="validate">
                 <label for="fabric_description">Fabric Desription: </label>
                </div>

           			<div class="modal-footer">
         		   		<a href="cancel" class=" modal-action modal-close waves-effect waves-green btn">Cancel</a>
           				 <a href="save" class=" modal-action modal-close waves-effect waves-green btn">Save</a>	
           			</div>

    			</div>

    		
    			</div>
    		</div>

    			<div id="add" class="modal">
                  <div class = "label"><font color = "teal" size = "+3" back >&nbsp Fabric Type
                 </font> </div>
                <div class="modal-content">

                <div class="input-field">
                 <input id="FabricName" type="text" class="validate">
                 <label for="fabric_name">Fabric Name: </label>
                </div>

                <div class="input-field">
                 <input id="FabricDescription" type="text" class="validate">
                 <label for="fabric_description">Fabric Desription: </label>
                </div>

                <div class="modal-footer">
                  <a href="cancel" class=" modal-action modal-close waves-effect waves-green btn">Cancel</a>
                   <a href="save" class=" modal-action modal-close waves-effect waves-green btn">Save</a> 
                </div>
    	</div>
    </div>	

@stop

@section('scripts')
    {{ HTML::script('js/jquery-2.1.4.min.js') }}
    {{ HTML::script('js/materialize.min.js') }}
    {{ HTML::script('js/forModal.js') }}

@stop