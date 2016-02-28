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
       <button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="Add a new role to the table" href="#addRole">ADD A NEW ROLE</button>
      <button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="View deleted roles from the table" href="#modal1">VIEW INACTIVE ROLES</button>
      </div>
    </div>
  </div>

  <!--MODAL: VIEW ALL ROLES-->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h5><font color = "#1b5e20"><center>Inactive Roles</center> </font> </h5>
      <table class = "table centered data-reactRole" align = "center" border = "1">
            <thead>
              <tr>
                <th data-field="id">Role ID</th>
                 <th data-field="name">Role Name</th>
                <th data-field="address">Role Description</th>
                 <th data-field="Edit">Reactivate</th>
              </tr>
            </thead>

            <tbody>
              @foreach($role2 as $role2)
              @if($role2->boolIsActive == 0)
              <tr>
                <td>{{ $role2->strEmpRoleID }}</td>
                <td>{{ $role2->strEmpRoleName }}</td>
                <td>{{ $role2->strEmpRoleDesc }}</td>
                <td>
                  <form action="{{URL::to('reactRole')}}" method="POST">
                    <input type="hidden" value="{{ $role2->strEmpRoleID }}" id="reactID" name="reactID">
                    <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="Returns data of position to the table">REACTIVATE</button>
                  </form>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
      </table>
    </div>
  
    <!--MODAL FOOTER-->
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">CLOSE</a>
    </div>
  </div>

  <div class="row">
    <div class="col s12 m12 l12">
    	<div class="card-panel">
        <span class="card-title"><h5 style="color:#1b5e20"><center>Roles</center></h5></span>
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
                <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="Edit data of role" href="#edit{{$role->strEmpRoleID}}">EDIT</button>
                    <button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="Delete role from table" href="#del{{$role->strEmpRoleID}}">DELETE</button>
                </td>	
                  <div id="edit{{$role->strEmpRoleID}}" class="modal modal-fixed-footer">
                    <form action="{{URL::to('editRole')}}" method="POST">
                      <div class="modal-content">
                        <h5><font color = "#1b5e20"><center>Edit role</center> </font> </h5>
                        <p>
                  
                          <div class="input-field">
                            <input value="{{$role->strEmpRoleID}}" id="editRoleID" name="editRoleID" type="text" class="" readonly>
                            <label for="role_id">Role ID: </label>
                          </div>

                          <div class="input-field">
                            <input required pattern="[A-Za-z\s]+" value="{{$role->strEmpRoleName}}" id="editRoleName" name="editRoleName" type="text" class="validate">
                            <label for="role_name">*Role Name: </label>
                          </div>

                          <div class="input-field">
                            <input required value="{{$role->strEmpRoleDesc}}" id="editRoleDescription" name="editRoleDescription" type="text" class="validate">
                            <label for="role_description">*Role Description: </label>
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
                        <h5><font color = "#1b5e20"><center>Are you sure you want to delete?</center> </font> </h5>
                        <p>
                  
                          <div class="input-field">
                            <input value="{{$role->strEmpRoleID}}" id="delRoleID" name="delRoleID" type="text" class="" readonly>
                            <label for="role_id">Role ID: </label>
                          </div>

                          <div class="input-field">
                            <input pattern="[A-Za-z\s]+" value="{{$role->strEmpRoleName}}" type="text" class="" readonly>
                            <label for="role_name">Role Name: </label>
                          </div>

                          <div class="input-field">
                            <input  value="{{$role->strEmpRoleDesc}}" type="text" class="" readonly>
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
              </tr>
              @endif
            @endforeach
            </tbody>
          </table>
        </div>
          <div class = "clearfix">

          </div>
        
    			<div id="addRole" class="modal">
            <h5><font color = "#1b5e20"><center>Add a Role</center> </font> </h5>
            <form action="{{URL::to('addRole')}}" method="POST">

              <div class="modal-content">
                <p>
                  <div class="input-field">
                    <input value="{{$newID}}" id="addRoleID" name="addRoleID" type="text" class="" readonly>
                    <label for="role_id">Role ID: </label>
                  </div>
                        
                  <div class="input-field">
                    <input required pattern="[A-Za-z\s]+" id="addRoleName" name="addRoleName" type="text" class="validate">
                    <label for="role_name">*Role Name: </label>
                  </div>

                  <div class="input-field">
                    <input required pattern="[A-Za-z\s]+" id="addRoleDescription" name="addRoleDescription" type="text" class="validate">
                    <label for="role_description">*Role Description: </label>
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
          $('.data-reactRole').DataTable();
          $('select').material_select();

      } );
    </script>

      <!--TOOLTIP SCRIPT-->
  <script type="text/javascript">
    $(document).ready(function(){
      $('.tooltipped').tooltip({delay: 50});
  }); 
  </script>

@stop