@extends('layouts.master')

@section('content')
  <div class="main-wrapper">
    <div class="row">
      <div class="col s12 m12 l12">
      <span class="page-title"><h4>Employees</h4></span>
    </div>


  <div class="row">
    <div class="col s12 m12 l6">
       <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#newemp">ADD NEW EMPLOYEE</button>
     </div>
   </div>
  </div>

    <div class="row">
    	<div class="col s12 m12 l12">
    		<div class="card-panel">
   		    	<span class="card-title"><h5><center>Employee Profile</center></h5></span>
   				<div class="divider"></div>

    			<div class="card-content">
      			<table class = "centered" align = "center" border = "1">
       				<thead>
          			<tr>
              	    <th data-field="id">Employee ID</th>
             		    <th data-field="firstname">First Name</th>
                    <th data-field="lastname">Last Name</th>
                    <th data-field="address">Address</th>
                    <th data-field="Age">Age</th>
                    <th data-field="Role">Role</th>
                    <th data-field="cellphone">Cellphone No.</th>
                    <th data-field="Landline">Phone No.</th>
                    <th data-field="email">Email Address</th>
              	</tr>
              </thead>

              <tbody>
                @foreach($employee as $employee)
                <tr>
              		<td>{{ $employee->strEmployeeID }}</td>
                  <td>{{ $employee->strEmpFName }}</td>
                  <td>{{ $employee->strEmpLName }}</td>
                  <td>{{ $employee->strEmpAddress }} </td>
                  <td>{{ $employee->strEmpAge }} </td>
                  <td>{{ $employee->strEmpRoleName}}</td>
                  <td>{{ $employee->strCellNo }}</td> 
                  <td>{{ $employee->strPhoneNo }}</td>
                  <td>{{ $employee->strEmailAdd }}</td>
              		<td>
                  <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#{{$employee->strEmployeeID}}">EDIT</button>

                                  
                <!-- <Modal Structure for Edit Employee>   -->
              <div id="{{$employee->strEmployeeID}}" class="modal modal-fixed-footer">
                <div class="modal-content">
                  <font color = "teal"><h5><center>Edit Employee Information </center></h5></font> 
                  <p>
                    <form action="/editEmployee" method="POST">
                          <div class="input-field">
                            <label for="first_name">Employee ID: </label>
                            <input value="{{$employee->strEmployeeID}}" id="EmpID" name="EmpID" type="text" class="validate" readonly>
                          </div>

                          <div class="input-field">
                            <label for="first_name">Employee First Name: </label>
                            <input value="{{$employee->strEmpFName}}" id="FirstName" name="FirstName" type="text" class="validate">
                          </div>

                          <div class="input-field">
                            <input value="{{$employee->strEmpLName}}" id="LastName" name="LastName" type="text" class="validate">
                            <label for="LastName">Employee Last Name: </label>
                          </div>

                          <div class="input-field">
                            <input value="{{$employee->strEmpAddress}}" id="Address" name="Address" type="text" class="validate">
                            <label for="Address">Address: </label>
                          </div>

                          <div class="input-field">
                            <input value="{{$employee->strEmpAge}}" id="Age" name="Age" type="text" class="validate">
                            <label for="Age">Age: </label>
                          </div>  

                          <div class="input-field">                                                    
                              <select name='roles'>
                              <option disabled>Pick a role</option>
                                @foreach($roles as $id=>$name)
                                    @if($employee->strRole == $id)
                                      <option selected value="{{ $id }}">{{ $name }}</option>
                                    @else
                                      <option value="{{ $id }}">{{ $name }}</option>
                                    @endif
                                @endforeach
                            </select>    
                          </div>      
                             
                          <div class="input-field">
                            <input value="{{$employee->strCellNo}}" id="CellNo" name="CellNo" type="text" class="validate">
                            <label for="cellphone_number">Cellphone Number: </label>
                          </div>

                          <div class="input-field">
                            <input value="{{$employee->strPhoneNo}}" id="PhoneNo" name="PhoneNo" type="text" class="validate">
                            <label for="landline_number">Landline Number: </label>
                          </div>

                          <div class="input-field">
                            <input value="{{$employee->strEmailAdd}}" id="Email" name="Email"type="text" class="validate">
                            <label for="email">Email Address: </label>
                          </div>
                        </p>
                      </div>

                      <div class="modal-footer">
                        <button type="submit" class="waves-effect waves-green btn-flat">UPDATE</button>
                         <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
                      </div>                  
                    </form>
              </td>
            </tr>
            @endforeach
          </tbody>
          </table>
          
            <!-- <Modal Structure for Add Employee> -->
    			  <div id="newemp" class="modal modal-fixed-footer">
              <div class="modal-content">
                <font color = "teal"><h5><center>ADD NEW EMPLOYEE</h5></center></font>
                <p>
                  <form action="/addEmployee" method="POST">
                    <div class="input-field">
                      <label for="empID">Employee ID: </label>
                      <input value="{{$newID}}" id="EmpID" name="EmpID" type="text" class="validate" readonly>                      
                    </div>

                    <div class="input-field">
                      <input id="FirstName" name="FirstName" type="text" class="validate">
                      <label for="first_name">First Name: </label>
                    </div>

                    <div class="input-field">
                      <input id="LastName" name="LastName" type="text" class="validate">
                      <label for="last_name">Last Name: </label>
                    </div>

                    <div class="input-field">
                      <input id="Address" name="Address" type="text" class="validate">
                      <label for="Address">Address: </label>
                    </div>

                    <div class="input-field">
                      <input id="Age" name="Age" type="text" class="validate">
                      <label for="Age">Age: </label>
                    </div>  

                      <div class="input-field">
                        <select name='roles'>
                              <option selected disabled>Pick a role</option>
                                @foreach($roles as $id=>$name)
                                <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                        </select>   
                      </div>      
                   
                      <div class="input-field">
                        <input id="CellNo" name="CellNo" type="text" class="validate">
                        <label for="cellphone_number">Cellphone Number: </label>
                      </div>

                      <div class="input-field">
                        <input id="PhoneNo" name="PhoneNo" type="text" class="validate">
                        <label for="landline_number">Landline Number: </label>
                      </div>

                      <div class="input-field">
                        <input id="Email" name="Email" type="email" class="validate">
                        <label for="email" data-error="wrong" data-success="right">Email Address: </label>
                      </div>
                </p>
              </div>
                      <div class="modal-footer">
                        <button type="submit" class=" modal-action modal-close waves-effect waves-green btn-flat">ADD</button>
                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a>
                      </div>
                </form>
            <!-- <End for Add Employee> -->
@stop


@section('scripts')
    <script>
      $(document).ready(function(){
      // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
      $('.modal-trigger').leanModal();
      });
    </script>

    <script>
    $(document).ready(function(){
      $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'left' // Displays dropdown with edge aligned to the left of button
      }
      );
    }
    
    </script>

    <script>
      $(document).ready(function(){
      $('select').material_select();
      });
    </script>

@stop