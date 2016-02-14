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
                @foreach($role as $role)
                <tr>
                	<td>{{ $role->strEmpRoleID }}</td>
                	<td>{{ $role->strEmpRoleName }}</td>
                	<td>{{ $role->txtEmpRoleDesc }}</td>
                	<td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#{{$role->strEmpRoleID}}">EDIT</button>
                 		
              <div id="{{$role->strEmpRoleID}}" class="modal modal-fixed-footer">
                <div class="modal-content">
                  <font color = "teal" size = "+3" back ><center><h5> Edit Role Details </h5></center></font>
                  <p>
                  <form action="/editRole" method="POST">
                    <div class="input-field">
                      <input value="{{$role->strEmpRoleID}}" id="editRoleID" name="editRoleID" type="text" class="validate" readonly>
                      <label for="role_id">Role ID: </label>
                    </div>

                    <div class="input-field">
                      <input value="{{$role->strEmpRoleName}}" id="editRoleName" name="editRoleName" type="text" class="validate">
                      <label for="role_name">Role Name: </label>
                    </div>

                    <div class="input-field">
                      <input value="{{$role->txtEmpRoleDesc}}" id="editRoleDescription" name="editRoleDescription" type="text" class="validate">
                      <label for="role_description">Role Description: </label>
                    </div>  
                    </p>    
    			       </div>

                    <div class="modal-footer">
                      <button type="submit" class=" modal-action modal-close waves-effect waves-green btn-flat">UPDATE</button>
                      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a> 
                    </div>
                  </form>
                </td>
              </tr>
            @endforeach
            </tbody>
            </table>

    			<div id="addRole" class="modal modal-fixed-footer">
            <font color = "teal" size = "+3" back ></h5><center> Add Employee Role </h5></center></font>
              <div class="modal-content">
              <p>
                <form action="/addRole" method="POST">
                  <div class="input-field">
                    <input value="{{$newID}}" id="addRoleID" name="addRoleID" type="text" class="validate" readonly>
                    <label for="role_id">Role ID: </label>
                  </div>
                        
                  <div class="input-field">
                    <input id="addRoleName" name="addRoleName" type="text" class="validate">
                    <label for="role_name">Role Name: </label>
                  </div>

                  <div class="input-field">
                    <input id="addRoleDescription" name="addRoleDescription" type="text" class="validate">
                    <label for="role_description">Role Description: </label>
                  </div>
              </p>
              </div>
                  <div class="modal-footer">
                    <button type="submit" class=" modal-action modal-close waves-effect waves-green btn-flat">ADD</button>
                    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a> 
                  </div>
              </form>

@stop

@section('scripts')
    <script>
      $(document).ready(function(){
      // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
      $('.modal-trigger').leanModal();
      });
    </script>


@stop