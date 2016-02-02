@extends('layouts.master')

@section('content')
    <div class="row">
    	<div class="col s12 m12 l12">
    		<div class="card-panel">
   		    	<span class="card-title"><h4>Role</h4></span>
   				<div class="divider"></div>
    			<div class="card-content">

    			<a class="waves-effect waves-light btn modal-trigger" href="#add">ADD</a>
    
      				<table class = "centered" align = "center" border = "1">
       				<thead>
          				<tr>
              			<th data-field="id">Role ID</th>
             		  	<th data-field="name">Role Name</th>
              			<th data-field="address">Role Description</th>
              			</tr>
              		<thead>
              		<tbody>
              			<td>ID</td>
              			<td>Role Name </td>
              			<td>Role Desc</td>
              			<td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit">EDIT</button>
              			


              		</tbody>
              		</table>

              <div id="edit" class="modal">
           			<div class = "label"><font color = "teal" size = "+3" back >&nbsp Employee Role </font> </div>
           			<div class="modal-content">

                <div class="input-field">
                 <input id="RoleName" type="text" class="validate">
                 <label for="role_name">Role Name: </label>
                </div>

                <div class="input-field">
                 <input id="RoleDescription" type="text" class="validate">
                 <label for="role_description">Role Description: </label>
                </div>

           			<div class="modal-footer">
         		   		<a href="#!" class=" modal-action modal-close waves-effect waves-green btn">Cancel</a>
           				 <a href="#!" class=" modal-action modal-close waves-effect waves-green btn">Save</a>	
           			</div>

    			   </div>

    		
    			</div>
    		</div>

    			<div id="add" class="modal">
                <div class = "label"><font color = "teal" size = "+3" back >&nbsp Employee Role </font> </div>
                <div class="modal-content">

                <div class="input-field">
                 <input id="RoleName" type="text" class="validate">
                 <label for="role_name">Role Name: </label>
                </div>

                <div class="input-field">
                 <input id="RoleDescription" type="text" class="validate">
                 <label for="role_description">Role Description: </label>
                </div>

                <div class="modal-footer">
                  <a href="#!" class=" modal-action modal-close waves-effect waves-green btn">Cancel</a>
                   <a href="#!" class=" modal-action modal-close waves-effect waves-green btn">Save</a> 
                </div>

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