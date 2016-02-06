@extends('layouts.master')

@section('content')
  <div class="main-wrapper">
    <div class="row">
      <div class="col s12 m12 l12">
      <span class="page-title"><h4>Fabric Type</h4></span>
    </div>

       <div class="row">
        <div class="col s12 m12 l6">
           <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#addFabricType">ADD FABRIC TYPE</button>
         </div>
      </div>
     </div>

  

    <div class="row">
    	<div class="col s12 m12 l12">
    		<div class="card-panel">
   		    	<span class="card-title"><h5><center>Fabric Type</center></h5></span>
   				<div class="divider"></div>
    			<div class="card-content">
    
      				<table class = "centered" align = "center" border = "1">
       				<thead>
          				<tr>
              			<th data-field="id">Fabric Type ID</th>
             		  	<th data-field="fabricName">Fabric Type Name</th>
              			<th data-field="fabricDescription">Fabric Description</th>
              			</tr>
              		</thead>
              		<tbody>
              			<td>id</td>
              			<td>Linen</td>
              			<td>Hot and silky. For formal events.</td>
              			<td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#editFabricType">EDIT</button>
              		</tbody>
              		</table>
                  <p>
              	<div id="editFabricType" class="modal modal-fixed-footer">
           			  <font color = "teal"><center><h5> Edit Fabric Type Details</h5></center>
                 </font> 
           			<div class="modal-content">

                <div class="input-field">
                 <input id="FabricName" type="text" class="validate">
                 <label for="fabric_name">Fabric Name: </label>
                </div>

                <div class="input-field">
                 <input id="FabricDescription" type="text" class="validate">
                 <label for="fabric_description">Fabric Desription: </label>
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
    			<div id="addFabricType" class="modal modal-fixed-footer">
                  <font color = "teal"><center><h5> Add Fabric Type</h5></center>
                 </font> 
                <div class="modal-content">

                <div class="input-field">
                 <input id="FabricName" type="text" class="validate">
                 <label for="fabric_name">Fabric Name: </label>
                </div>

                <div class="input-field">
                 <input id="FabricDescription" type="text" class="validate">
                 <label for="fabric_description">Fabric Desription: </label>
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