@extends('layouts.master')

@section('content')

  <div class="main-wrapper">
        <!--Add Employee-->
         @if (Input::get('success') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added employee!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif


      <!--Edit Employee-->
      @if (Input::get('successEdit') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully edited employee!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif


      <!--Delete Employee-->
     @if (Input::get('successDel') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully deleted employee!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif


      <!--Reactivate Employee-->
      @if (Input::get('successRec') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added back employee!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif

       <!--  <Duplicate Error Message>   -->
    @if (Input::get('success') == 'duplicate')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel red">
              <span class="black-text" style="color:black">Record already exists!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif

      <!--  <Data Dependency Message> -->
       @if (Input::get('success') == 'beingUsed')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel red">
              <span class="black-text" style="color:black">Someone is still assigned to this role!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif


    <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Employees</h4></span>
      </div>
    </div>

    <div class="row">
      <div class="col s12 m12 l12">
       <button style="color:black; margin-right:35px; margin-left: 20px" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to add a new employee to the table" href="#newemp">ADD NEW EMPLOYEE</button>
     </div>
    </div>
  </div>


    <div class="row">
    	<div class="col s12 m12 l12">
    		<div class="card-panel">
   		    <span class="card-title"><h5 style="color:#1b5e20"><center>Employee Profile</center></h5></span>
   				<div class="divider"></div>
    			<div class="card-content">
            <div class="col s12 m12 l12 overflow-x">

      			<table class = "table centered data-employee" border = "1">
       				<thead>
          			<tr>
                  <th data-field="firstname">Employee Name</th>         
                  <th data-field="dtEmpBday">Date of Birth</th>
                  <th data-field="Sex">Sex</th>
                  <th data-field="address">Address</th>
                  <th data-field="Role">Role</th>
                  <th data-field="cellphone">Cellphone No.</th>
                  <th data-field="cellphone">Cellphone No. (alt)</th>
                  <th data-field="Landline">Phone No.</th>
                  <th data-field="email">Email Address</th>
                  <th data-field="Edit">Edit</th>
                  <th data-field="Delete">Deactivate</th>
              	</tr>
              </thead>

              <tbody>
                @foreach($employee as $employee)
                  @if($employee->boolIsActive == 1)
                <tr>
                  <td>{{ $employee->strEmpFName }} {{ $employee->strEmpMName }} {{ $employee->strEmpLName }}</td>
                  <td>{{ $employee->dtEmpBday }} </td>
                  <td>
                    @if($employee->strSex == 'M') Male
                    @else Female
                    @endif
                  </td>
                  <td>{{ $employee->strEmpAddress }} </td>
                  <td>{{ $employee->strEmpRoleName}}</td>                  
                  <td>{{ $employee->strCellNo }}</td> 
                  <td>{{ $employee->strCellNoAlt }}</td> 
                  <td>{{ $employee->strPhoneNo }}</td>
                  <td>{{ $employee->strEmailAdd }}</td>
              		<td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit data of employee" href="#edit{{$employee->strEmployeeID}}">EDIT</button></td>
                  <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of employee from table" href="#del{{$employee->strEmployeeID}}">DEACTIVATE</button>
                  
               <!-- <Modal Structure for Edit Employee>   -->
                    <div id="edit{{$employee->strEmployeeID}}" class="modal modal-fixed-footer">
                        <div class="modal-content">
                          <h5><font color = "#1b5e20"><center>Edit Employee Profile</center> </font> </h5>
                      <form action="{{URL::to('editEmployee')}}" method="POST"> 
                          <p>
                          <div class="input-field">
                            <label for="first_name">Employee ID: </label>
                            <input value="{{$employee->strEmployeeID}}" id="editEmpID" name="editEmpID" type="text" class="" readonly>
                          </div>

                          <div class="input-field">
                            <input required value="{{$employee->strEmpFName}}" id="editFirstName" name="editFirstName" type="text" class="validateFirst">
                            <label for="first_name">*Employee First Name: </label>
                          </div>

                          <div class="input-field">
                            <input value="{{$employee->strEmpMName}}" id="editMiddleName" name="editMiddleName" type="text" class="validateMiddle">
                            <label for="middle_name">Employee Middle Name: </label>
                          </div>

                          <div class="input-field">
                            <input required value="{{$employee->strEmpLName}}" id="editLastName" name="editLastName" type="text" class="validateLast">
                            <label for="LastName">*Employee Last Name: </label>
                          </div>

                          <div class="input-field">
                            <input required value="{{$employee->strEmpAddress}}" id="editAddress" name="editAddress" type="text" class="validateAddress">
                            <label for="Address">*Address: </label>
                          </div>

                          <div>
                            <p><font size = "-1" color = "gray">*Date of Birth:</font></p>
                            <input id="editdtEmpBday" name="editdtEmpBday" type="date" class = "datepicker">
                          </div>  

                          <div class="input-field">                                                    
                            <select required name='editRoles'>
                                @foreach($roles as $role)
                                    @if($employee->strRole == $role->strEmpRoleID AND $role->boolIsActive == 1)
                                      <option selected value="{{ $role->strEmpRoleID }}">{{ $role->strEmpRoleName }}</option>
                                    @elseif($role->boolIsActive == 1)
                                      <option value="{{ $role->strEmpRoleID }}">{{ $role->strEmpRoleName }}</option>
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
                            <label for="cellphone_number">*Cellphone Number: </label>
                          </div>

                          <div class="input-field">
                            <input value="{{$employee->strCellNoAlt}}" id="editCellNoAlt" name="editCellNoAlt" type="text" class="validateCellAlt" maxlength="11">
                            <label for="cellphone_number">Cellphone Number: (alternate)</label>
                          </div>

                          <div class="input-field">
                            <input value="{{$employee->strPhoneNo}}" id="editPhoneNo" name="editPhoneNo" type="text" class="validatePhone" maxlength="10">
                            <label for="landline_number">Landline Number: </label>
                          </div>

                          <div class="input-field">
                            <input  value="{{$employee->strEmailAdd}}" id="editEmail" name="editEmail"type="text" class="validateEmail">
                            <label for="email">Email Address: </label>
                          </div>
                          <br><br>
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
                        <div class="modal-content">
                          <h5><font color = "#1b5e20"><center>Are you sure you want to deactivate?</center> </font> </h5>
                            <form action="{{URL::to('delEmployee')}}" method="POST">
                          <p>
                            <div class="input-field">
                              <label for="first_name">Employee ID: </label>
                              <input value="{{$employee->strEmployeeID}}" id="delEmpID" name="delEmpID" type="text" class="" readonly>
                            </div>

                            <div class="input-field">
                              <input value="{{$employee->strEmpFName}}" id="delFirstName" name="delFirstName" type="text" class="" readonly>
                              <label for="first_name">Employee First Name: </label>
                            </div>

                            <div class="input-field">
                              <input value="{{$employee->strEmpMName}}" id="delMiddleName" name="delMiddleName" type="text" class="" readonly>
                              <label for="middle_name">Employee Middle Name: </label>
                            </div>

                            <div class="input-field">
                              <input value="{{$employee->strEmpLName}}" id="delLastName" name="delLastName" type="text" class="" readonly>
                              <label for="LastName">Employee Last Name: </label>
                            </div>

                            <div class="input-field">       
                                <input type="text" value="{{$employee->strEmpRoleName}}" readonly>                                                                               
                            </div>

                          <div class="input-field">
                            <input id="delInactiveEmp" name = "delInactiveEmp" value = "{{$employee->strEmployeeID}}" type="hidden">
                          </div>

                          <div class="input-field">
                            <input id="delInactiveReason" name = "delInactiveReason" value = "{{$employee->strInactiveReason}}" type="text" class="validate" required>
                            <label for="fax"> *Reason for Deactivation: </label>
                          </div>
                          <br><br>
                          </p> 
                        </div>   

                        <div class="modal-footer">
                          <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
                          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
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
                
          <!-- <Modal Structure for Add Employee> -->
    			<div id="newemp" class="modal modal-fixed-footer">
              <div class="modal-content">
            <form action="{{URL::to('addEmployee')}}" method="POST" id="addEmployee" class="employee-form" name="addEmployee">
                <h5><font color = "#1b5e20"><center>Add an Employee</center> </font> </h5>
                <p>

                  <div class="input-field">
                    <label for="empID">Employee ID: </label>
                    <input value="{{$newID}}" id="addEmpID" name="addEmpID" type="text" class="" readonly>                      
                  </div>

                  <div class="input-field">
                    <input required id="addFirstName" name="addFirstName" type="text" class="validateFirst">
                    <label for="first_name">*First Name: </label>
                  </div>

                  <div class="input-field">
                    <input id="addMiddleName" name="addMiddleName" type="text" class="validateMiddle">
                    <label for="middle_name">Middle Name: </label>
                  </div>

                  <div class="input-field">
                    <input required id="addLastName" name="addLastName" type="text" class="validateLast">
                    <label for="last_name">*Last Name: </label>
                  </div>

                  <div class="input-field">
                    <input required id="addAddress" name="addAddress" type="text" class="validateAddress">
                    <label for="Address">*Address: </label>
                  </div>

                  <div>
                    <p><font size = "-1" color = "gray">*Date of Birth:</font></p>
                    <input id="adddtEmpBday" name="adddtEmpBday" type="date" class = "datepicker">
                  </div>

                  <div class="input-field">
                    <select name='addRoles' id='addRoles' required>
                      @foreach($roles as $roles2)
                        @if($roles2->boolIsActive == 1)
                          <option value="{{ $roles2->strEmpRoleID }}" selected>{{ $roles2->strEmpRoleName }}</option>
                        @endif
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
                    <input id="addCellNoAlt" name="addCellNoAlt" type="text" class="validateCellAlt" maxlength="11">
                    <label for="cellphone_number">Cellphone Number: (alternate) </label>
                    <span id="left"></span>
                  </div>

                  <div class="input-field">
                    <input id="addPhoneNo" name="addPhoneNo" type="text" class="validatePhone" maxlength="10">
                    <label for="landline_number">Landline Number: </label>
                  </div>

                  <div class="input-field">
                    <input id="addEmail" name="addEmail" type="email" class="validateEmail">
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

      // $('.validateMiddle').blur('input', function() {
      //   var input=$(this);
      //   var is_name=input.val();
      //   if(is_name){input.removeClass("invalid").addClass("valid");}
      //   else{input.removeClass("valid").addClass("invalid");}
      // });

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

      $('.validateCell').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateCell').keyup(function() {
        var numbers = $(this).val();
        $(this).val(numbers.replace(/\D/, ''));
        $(this).val($(this).val().replace(/(\d{4})\-?(\d{3})\-?(\d{4})/,'($1)-$2-$3'))
      });

      $('.validateCellAlt').on('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateCellAlt').keyup(function() {
        var numbers = $(this).val();
        $(this).val(numbers.replace(/\D/, ''));
        $(this).val($(this).val().replace(/(\d{4})\-?(\d{3})\-?(\d{4})/,'($1)-$2-$3'))
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

       $('.validatePhone').keyup(function() {
        var numbers = $(this).val();
        $(this).val(numbers.replace(/\D/, ''));
        $(this).val($(this).val().replace(/(\d{3})\-?(\d{3})\-?(\d{4})/,'($1)-$2-$3'))
      }); 


      $('.validateEmail').on('input', function() {
        var input=$(this);
        var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        var is_email=re.test(input.val());
        if(is_email){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

    </script>

    <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">

      $(document).ready(function() {

          $('.data-employee').DataTable();

      } );

    </script>


    <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">

      $(document).ready(function() {

          $('.data-reactEmployee').DataTable();
          $('select').material_select();

          setTimeout(function () {
            $('#success-message').hide();
        }, 5000);

      } );

    </script>
    
      <!--TOOLTIP SCRIPT-->
<script type="text/javascript">
    $(document).ready(function(){
      $('.tooltipped').tooltip({delay: 50});
  }); 
</script>

    <script type="text/javascript">
      $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
      });
        
    </script>

@stop