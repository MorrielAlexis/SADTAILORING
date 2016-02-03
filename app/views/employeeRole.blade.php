@extends('layouts.master')

@section('content')
 <div class="main-wrapper">
    <div class="row">
      <div class="col s12 m12 l12">
      <span class="page-title"><h4>Employee-Roles</h4></span>
    </div>



    <div class="row">
    <div class="col s12 m12 l6">
       <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#addRole">ADD A NEW ROLE</button>
     </div>
   </div>
  </div>


    <div class="row">
    	<div class="col s12 m12 l12">
    		<div class="card-panel">
   		    	<span class="card-title"><h5><center>Roles</center></h5></span>
   				<div class="divider"></div>
    			<div class="card-content">
      				<table class = "centered" align = "center" border = "1">
       				 <thead>
          				<tr>
              			<th data-field="id">Role ID</th>
             		  	<th data-field="name">Role Name</th>
              			<th data-field="address">Role Description</th>
              			</tr>
              		</thead>
              		<tbody>
              			<td>ID</td>
              			<td>Production Manager</td>
              			<td>In charge in supervising every transaction.</td>
              			<td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#editRole">EDIT</button>
                 		</tbody>
              		</table>
              <p>
              <div id="editRole" class="modal">
           			<div class = "label"><font color = "teal" size = "+3" back ><center><h5> Edit Role Details </h5></center></font> </div>
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
         		   		<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">UPDATE</a>
           				<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a>	
           			</div>

    			   </div>

    		
    			</div>
    		</div>

    			<div id="addRole" class="modal">
                <div class = "label"><font color = "teal" size = "+3" back ></h5><center> Add Employee Role </h5></center></font> </div>
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
                  <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">ADD</a>
                   <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a> 
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