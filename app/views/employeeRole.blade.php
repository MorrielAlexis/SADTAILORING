@extends('layouts.master')

@section('content')


  @if (Session::has('message'))

    @endif

  <div class="main-wrapper">
    <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Employee-Roles</h4></span>
      </div>
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
          <div class="col s12 m12 l12 overflow-x">
         
      		<table class = "table centered data-role" border = "1">
       			<thead>
          		<tr>
              	<th data-field="id">Role ID</th>
             		 <th data-field="name">Role Name</th>
              	<th data-field="address">Role Description</th>
                 <th data-field="Edit">Action</th>
              </tr>
            </thead>

            <tbody>
              @foreach($role as $role)
              @if($role->boolIsActive == 1)
              <tr>
                <td>{{ $role->strEmpRoleID }}</td>
                <td>{{ $role->strEmpRoleName }}</td>
                <td>{{ $role->strEmpRoleDesc }}</td>
                <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit{{$role->strEmpRoleID}}">EDIT</button>
                  <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#del{{$role->strEmpRoleID}}">DELETE</button>
                 		
                  <div id="edit{{$role->strEmpRoleID}}" class="modal modal-fixed-footer">
                    <form action="{{URL::to('editRole')}}" method="POST">
                      <div class="modal-content">
                        <font color = "teal" size = "+3" back ><center><h5> Edit Role Details </h5></center></font>
                        <p>
                  
                          <div class="input-field">
                            <input value="{{$role->strEmpRoleID}}" id="editRoleID" name="editRoleID" type="text" class="validate" readonly>
                            <label for="role_id">Role ID: </label>
                          </div>

                          <div class="input-field">
                            <input pattern="[A-Za-z\s]+" value="{{$role->strEmpRoleName}}" id="editRoleName" name="editRoleName" type="text" class="validate">
                            <label for="role_name">Role Name: </label>
                          </div>

                          <div class="input-field">
                            <input  value="{{$role->strEmpRoleDesc}}" id="editRoleDescription" name="editRoleDescription" type="text" class="validate">
                            <label for="role_description">Role Description: </label>
                          </div>  
                        </p>    
                      </div>

                      <div class="modal-footer">
                        <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">UPDATE</button>
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a> 
                      </div>
                    </form>
                  </div>
                  <!---/////////////////DELETE ROLE//////////////////////-->
                  <div id="del{{$role->strEmpRoleID}}" class="modal modal-fixed-footer">
                    <form action="{{URL::to('delRole')}}" method="POST">
                      <div class="modal-content">
                        <font color = "teal" size = "+3" back ><center><h5> Are you sure you want to delete? </h5></center></font>
                        <p>
                  
                          <div class="input-field">
                            <input value="{{$role->strEmpRoleID}}" id="delRoleID" name="delRoleID" type="text" class="validate" readonly>
                            <label for="role_id">Role ID: </label>
                          </div>

                          <div class="input-field">
                            <input pattern="[A-Za-z\s]+" value="{{$role->strEmpRoleName}}" type="text" class="validate" readonly>
                            <label for="role_name">Role Name: </label>
                          </div>

                          <div class="input-field">
                            <input  value="{{$role->strEmpRoleDesc}}" type="text" class="validate" readonly>
                            <label for="role_description">Role Description: </label>
                          </div>  
                        </p>    
                      </div>

                      <div class="modal-footer">
                        <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">OK</button>
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a> 
                      </div>
                    </form>
                  </div>



                </td>
              </tr>
              @endif
            @endforeach
            </tbody>
          </table>
          </div>

          <div class = "clearfix">

          </div>
        
    			<div id="addRole" class="modal">
            <font color = "teal" size = "+3" back ></h5><center> Add Employee Role </center></h5></font>
            <form action="{{URL::to('addRole')}}" method="POST">

              <div class="modal-content">
                <p>
                  <div class="input-field">
                    <input value="{{$newID}}" id="addRoleID" name="addRoleID" type="text" class="validate" readonly>
                    <label for="role_id">Role ID: </label>
                  </div>
                        
                  <div class="input-field">
                    <input required pattern="[A-Za-z\s]+" id="addRoleName" name="addRoleName" type="text" class="validate">
                    <label for="role_name">Role Name: </label>
                  </div>

                  <div class="input-field">
                    <input pattern="[A-Za-z\s]+" id="addRoleDescription" name="addRoleDescription" type="text" class="validate">
                    <label for="role_description">Role Description: </label>
                  </div>
                </p>
              </div>

                <div class="modal-footer">
                  <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">ADD</button>
                  <button type="button" onclick="clearData()" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a> 
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@stop

@section('scripts')
  <script>
      function clearData(){
          document.getElementById("addRoleDescription").value = "";
          document.getElementById("addRoleName").value = "";
      }
    </script>

       <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">

      $(document).ready(function() {

          $('.data-role').DataTable();

      } );
    </script>


@stop