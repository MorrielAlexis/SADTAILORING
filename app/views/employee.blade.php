@extends('layouts.master')

@section('content')
  <div class="main-wrapper">
    <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Employees</h4></span>
      </div>
    </div>

    <div class="row">
      <div class="col s12 m12 l12">
       <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#newemp">ADD NEW EMPLOYEE</button>
       <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#modal1">VIEW INACTIVE EMPLOYEES</button>
     </div>
    </div>
  </div>

  <!--MODAL: VIEW ALL EMPLOYEES-->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>INACTIVE EMPLOYEES</h4>
      <table class="centered" border="1">
        <thead>
          <tr>
            <th data-field="id">Employee ID</th>
            <th data-field="firstname">First Name</th>
            <th data-field="middlename">Middle Name</th>
            <th data-field="lastname">Last Name</th>          
            <th data-field="Age">Age</th>
            <th data-field="Sex">Sex</th>
            <th data-field="address">Address</th>
            <th data-field="Role">Role</th>
            <th data-field="cellphone">Cellphone No.</th>
            <th data-field="Landline">Phone No.</th>
            <th data-field="email">Email Address</th>
          </tr>
        </thead>

        <tbody>
          @foreach($employee2 as $employee2)
          @if($employee2->boolIsActive == 0)
            <tr>
                  <td>{{ $employee2->strEmployeeID }}</td>
                  <td>{{ $employee2->strEmpFName }}</td>
                  <td>{{ $employee2->strEmpMName }}</td>
                  <td>{{ $employee2->strEmpLName }}</td>
                  <td>{{ $employee2->strEmpAge }} </td>
                  <td>
                    @if($employee2->strSex == 'M') Male
                    @else Female
                    @endif
                  </td>
                  <td>{{ $employee2->strEmpAddress }} </td>
                  <td>{{ $employee2->strEmpRoleName}}</td>                  
                  <td>{{ $employee2->strCellNo }}</td> 
                  <td>{{ $employee2->strPhoneNo }}</td>
                  <td>{{ $employee2->strEmailAdd }}</td>
                  <td>
                  <form action="{{URL::to('reactEmployee')}}" method="POST">
                  <input type="hidden" value="{{ $employee2->strEmployeeID }}" id="reactID" name="reactID">
                  <button type="submit" class="waves-effect waves-green btn btn-small center-text">REACTIVATE</button>
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
   		    <span class="card-title"><h5><center>Employee Profile</center></h5></span>
   				<div class="divider"></div>
    			<div class="card-content">
            <div class="col s12 m12 l12 overflow-x">
      			<table class = "centered" border = "1">
       				<thead>
          			<tr>
                  <th data-field="id">Employee ID</th>
                  <th data-field="firstname">First Name</th>
                  <th data-field="middlename">Middle Name</th>
                  <th data-field="lastname">Last Name</th>          
                  <th data-field="Age">Age</th>
                  <th data-field="Sex">Sex</th>
                  <th data-field="address">Address</th>
                  <th data-field="Role">Role</th>
                  <th data-field="cellphone">Cellphone No.</th>
                  <th data-field="Landline">Phone No.</th>
                  <th data-field="email">Email Address</th>
              	</tr>
              </thead>

              <tbody>
                @foreach($employee as $employee)
                  @if($employee->boolIsActive == 1)
                <tr>
              		<td>{{ $employee->strEmployeeID }}</td>
                  <td>{{ $employee->strEmpFName }}</td>
                  <td>{{ $employee->strEmpMName }}</td>
                  <td>{{ $employee->strEmpLName }}</td>
                  <td>{{ $employee->strEmpAge }} </td>
                  <td>
                    @if($employee->strSex == 'M') Male
                    @else Female
                    @endif
                  </td>
                  <td>{{ $employee->strEmpAddress }} </td>
                  <td>{{ $employee->strEmpRoleName}}</td>                  
                  <td>{{ $employee->strCellNo }}</td> 
                  <td>{{ $employee->strPhoneNo }}</td>
                  <td>{{ $employee->strEmailAdd }}</td>
              		<td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit{{$employee->strEmployeeID}}">EDIT</button></td>
                  <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#del{{$employee->strEmployeeID}}">DELETE</button>
                            
                    <!-- <Modal Structure for Edit Employee>   -->
                    <div id="edit{{$employee->strEmployeeID}}" class="modal modal-fixed-footer">
                      <form action="{{URL::to('editEmployee')}}" method="POST">
                        <div class="modal-content">
                          <font color = "teal"><h5><center>Edit Employee Information </center></h5></font> 
                          <p>

                          <div class="input-field">
                            <label for="first_name">Employee ID: </label>
                            <input value="{{$employee->strEmployeeID}}" id="editEmpID" name="editEmpID" type="text" class="validate" readonly>
                          </div>

                          <div class="input-field">
                            <input required value="{{$employee->strEmpFName}}" id="editFirstName" name="editFirstName" type="text" class="validateFirst">
                            <label for="first_name">Employee First Name: </label>
                          </div>

                          <div class="input-field">
                            <input required value="{{$employee->strEmpMName}}" id="editMiddleName" name="editMiddleName" type="text" class="validateMiddle">
                            <label for="middle_name">Employee Middle Name: </label>
                          </div>

                          <div class="input-field">
                            <input required value="{{$employee->strEmpLName}}" id="editLastName" name="editLastName" type="text" class="validateLast">
                            <label for="LastName">Employee Last Name: </label>
                          </div>

                          <div class="input-field">
                            <input required value="{{$employee->strEmpAddress}}" id="editAddress" name="editAddress" type="text" class="validateAddress">
                            <label for="Address">Address: </label>
                          </div>

                          <div class="input-field">
                            <input required value="{{$employee->strEmpAge}}" id="editAge" name="editAge" type="text" class="validateAge" maxlength="3">
                            <label for="Age">Age: </label>
                          </div>  

                          <div class="input-field">                                                    
                            <select required name='editRoles'>
                                @foreach($roles as $id=>$name)
                                    @if($employee->strRole == $id)
                                      <option selected value="{{ $id }}">{{ $name }}</option>
                                    @else
                                      <option value="{{ $id }}">{{ $name }}</option>
                                    @endif
                                @endforeach
                            </select>    
                            <label >Role</label>
                          </div>   

                          <div class="input-field">                                                    
                            <select required name='editSex'>
                              <option disabled>Sex</option>
                                  @if($employee->strSex == "M")
                                    <option selected value="{{$employee->strSex}}">Male</option>
                                    <option value="F">Female</option>
                                  @else
                                    <option value="M">Male</option>
                                    <option selected value="{{$employee->strSex}}">Female</option>
                                  @endif
                            </select>    
                            <label>Sex</label>
                          </div>   

                          <div class="input-field">
                            <input required value="{{$employee->strCellNo}}" id="editCellNo" name="editCellNo" type="text" class="validateCell" maxlength="11">
                            <label for="cellphone_number">Cellphone Number: </label>
                          </div>

                          <div class="input-field">
                            <input value="{{$employee->strPhoneNo}}" id="editPhoneNo" name="editPhoneNo" type="text" class="validatePhone">
                            <label for="landline_number">Landline Number: </label>
                          </div>

                          <div class="input-field">
                            <input value="{{$employee->strEmailAdd}}" id="editEmail" name="editEmail"type="text" class="validate">
                            <label for="email">Email Address: </label>
                          </div>
                          </p>
                        </div>

                        <div class="modal-footer">
                          <button type="submit" class="waves-effect waves-green btn-flat">UPDATE</button>
                          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
                        </div>                  
                      </form>
                    </div> 

                    <!-- Modal for (SOFT) delete Employee -->
                    <div id="del{{$employee->strEmployeeID}}" class="modal modal-fixed-footer">
                      <form action="{{URL::to('delEmployee')}}" method="POST">
                        <div class="modal-content">
                          <font color = "teal"><h5><center>Are you sure you want to delete?</center></h5></font> 
                          <p>
                    
                            <div class="input-field">
                              <label for="first_name">Employee ID: </label>
                              <input value="{{$employee->strEmployeeID}}" id="delEmpID" name="delEmpID" type="text" class="validate" readonly>
                            </div>

                            <div class="input-field">
                              <input value="{{$employee->strEmpFName}}" id="delFirstName" name="delFirstName" type="text" class="validate" readonly>
                              <label for="first_name">Employee First Name: </label>
                            </div>

                            <div class="input-field">
                              <input value="{{$employee->strEmpMName}}" id="delMiddleName" name="delMiddleName" type="text" class="validate" readonly>
                              <label for="middle_name">Employee Middle Name: </label>
                            </div>

                            <div class="input-field">
                              <input value="{{$employee->strEmpLName}}" id="delLastName" name="delLastName" type="text" class="validate" readonly>
                              <label for="LastName">Employee Last Name: </label>
                            </div>

                            <div class="input-field">                                                    
                              <select name='editRoles'>
                                <option disabled>Pick a role</option>
                                  @foreach($roles as $id=>$name)
                                    @if($employee->strRole == $id)
                                      <option selected value="{{ $id }}" disabled>{{ $name }}</option>
                                    @else
                                      <option value="{{ $id }}" disabled>{{ $name }}</option>
                                    @endif
                                  @endforeach
                              </select>    
                            </div>
                          </p> 
                        </div>   

                        <div class="modal-footer">
                          <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
                          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
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
                
          <!-- <Modal Structure for Add Employee> -->
    			<div id="newemp" class="modal modal-fixed-footer">
            <form action="{{URL::to('addEmployee')}}" method="POST" id="addEmployee" class="employee-form" name="addEmployee">
              <div class="modal-content">
                <font color = "teal"><h5><center>ADD NEW EMPLOYEE</center></h5></font>
                <p>

                  <div class="input-field">
                    <label for="empID">Employee ID: </label>
                    <input value="{{$newID}}" id="addEmpID" name="addEmpID" type="text" class="validate" readonly>                      
                  </div>

                  <div class="input-field">
                    <input required id="addFirstName" name="addFirstName" type="text" class="validateFirst">
                    <label for="first_name">*First Name: </label>
                  </div>

                  <div class="input-field">
                    <input required id="addMiddleName" name="addMiddleName" type="text" class="validateMiddle">
                    <label for="middle_name">*Middle Name: </label>
                  </div>

                  <div class="input-field">
                    <input required id="addLastName" name="addLastName" type="text" class="validateLast">
                    <label for="last_name">*Last Name: </label>
                  </div>

                  <div class="input-field">
                    <input required id="addAddress" name="addAddress" type="text" class="validateAddress">
                    <label for="Address">*Address: </label>
                  </div>

                  <div class="input-field">
                    <input required id="addAge" name="addAge" type="text" class="validateAge" maxlength="3">
                    <label for="Age">*Age: </label>
                  </div>  

                  <div class="input-field">
                    <select name='addRoles' id='addRoles' required>
                      @foreach($roles as $id=>$name)
                        <option value="{{ $id }}" selected>{{ $name }}</option>
                      @endforeach
                    </select>   
                    <label>Role</label>
                  </div>      

                  <div class="input-field">
                    <select value="" name='addSex' id='addSex' required>
                      <option value="M">Male</option>
                      <option value="F">Female</option>
                    </select>    
                    <label >Sex</label>
                  </div>   
                   
                  <div class="input-field">
                    <input required id="addCellNo" name="addCellNo" type="text" class="validateCell" maxlength="11">
                    <label for="cellphone_number">*Cellphone Number: </label>
                    <span id="left"></span>
                  </div>

                  <div class="input-field">
                    <input id="addPhoneNo" name="addPhoneNo" type="text" class="validatePhone">
                    <label for="landline_number">Landline Number: </label>
                  </div>

                  <div class="input-field">
                    <input id="addEmail" name="addEmail" type="email" class="validate">
                    <label for="email" data-error="wrong" data-success="right">Email Address: </label>
                  </div>

                </p>
              </div>

              <div class="modal-footer">
                <button type="submit" id="send" name="send" class="modal-action waves-effect waves-green btn-flat">ADD</button>
                <button type="button" onclick="clearData()" class="modal-action modal-close waves-effect waves-green btn-flat">CANCEL</button>
              </div>
            </form>
          </div>
          
            <!-- <End for Add Employee> -->

            </div>
        </div>
      </div>
     </div>
          
        

@stop


@section('scripts')
    <script>
    $( document ).ready(function() {
    
      $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'left' // Displays dropdown with edge aligned to the left of button
      });

      $('select').material_select();

    });
    </script>
  
    <script>
      function clearData(){
          document.getElementById("addFirstName").value = "";
          document.getElementById("addMiddleName").value = "";
          document.getElementById("addLastName").value = "";
          document.getElementById("addAddress").value = "";
          document.getElementById("addAge").value = "";
          document.getElementById("addCellNo").value = "";
          document.getElementById("addPhoneNo").value = "";
          document.getElementById("addEmail").value = "";
      }

    </script>

    <script type="text/javascript">
      $('.validateFirst').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateFirst').blur('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });      

      $('.validateMiddle').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateMiddle').blur('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateLast').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateLast').blur('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateAddress').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      //Validate Blank
      $('.validateAddress').blur('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      //Validate Numbers
      $('.validateAge').on('input', function() {
        var input=$(this);
        var re = /^[0-9]/;
        var is_email=re.test(input.val());
        if(is_email){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      //Kapag Number
      $('.validateAge').keyup(function() {
        var numbers = $(this).val();
        $(this).val(numbers.replace(/\D/, ''));
      });

      $('.validateAge').blur('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateCell').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateCell').keyup(function() {
        var numbers = $(this).val();
        $(this).val(numbers.replace(/\D/, ''));
        $(this).val($(this).val().replace(/(\d{4})\-?(\d{3})\-?(\d{4})/,'$1-$2-$3'))
      });


      

      //Validate Blank
      $('.validateCell').blur('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

       $('.validatePhone').keyup(function() {
        var numbers = $(this).val();
        $(this).val(numbers.replace(/\D/, ''));
        
      });

    </script>

@stop