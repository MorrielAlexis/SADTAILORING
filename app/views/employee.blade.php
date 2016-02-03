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
   		    	<span class="card-title"><h6>Employee Profile</h6></span>
   				<div class="divider"></div>
    			<div class="card-content">
      				<table class = "centered" align = "center" border = "1">
       				<thead>
          			<tr>
              	     <th data-field="id">EMP ID</th>
             		 <th data-field="firstname">First Name</th>
                    <th data-field="lastname">Last Name</th>
                    <th data-field="address">Address</th>
                    <th data-field="Age">Age</th>
                    <th data-field="Role">Role</th>
                    <th data-field="cellphone">Cellphone No.</th>
                    <th data-field="Landline">Phone No.</th>
                    <th data-field="email">Email Address</th>
              			</tr>
              		<thead>
              		<tbody>
              		    <td>id</td>
                        <td>First Name</td>
                        <td> Last Name</td>
                        <td> Address </td>
                        <td> age </td>
                        <td>Role</td>
                        <td>cp number</td> 
                        <td>phone</td>
                        <td>email</td>
              			<td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit">EDIT</button>
              		</tbody>
              		</table>

                  <!-- <Modal Structure>   -->
                 <div id="edit" class="modal modal-fixed-footer">
                   <div class="modal-content">
                    <font color = "teal"><h5><center>Edit Employee Information </center></h5></font> 
                    <p>
                    <div class="input-field">
                      <label for="first_name">Employee First Name: </label>
                      <input id="empFirstName" type="text" class="validate">
                    </div>

                    <div class="input-field">
                      <input id="empLastName" type="text" class="validate">
                      <label for="last_name">Employee Last Name: </label>
                    </div>

                      <div class="input-field">
                       <input id="empAddress" type="text" class="validate">
                       <label for="Address">Address: </label>
                      </div>

                      <div class="input-field">
                       <input id="empAge" type="text" class="validate">
                       <label for="Age">Age: </label>
                      </div>  

                      <div class="input-field">
                        <select>
                          <label>Role</label>
                          <option value="" disabled selected>Pick a role</option>
                          <option value="1">Production Manager</option>
                          <option value="2">Sewer</option>
                          <option value="3">Cutter</option>
                          <option value="4">Runner</option>
                        </select>
                       </div>      
                       
                      <div class="input-field">
                       <input id="Cellphone Number" type="text" class="validate">
                       <label for="cellphone_number">Cellphone Number: </label>
                      </div>

                      <div class="input-field">
                       <input id="Landline Number" type="text" class="validate">
                       <label for="landline_number">Landline Number: </label>
                      </div>

                      <div class="input-field">
                       <input id="Fax Number" type="text" class="validate">
                       <label for="Fax_number">Fax Number: </label>
                      </div>

                      <div class="input-field">
                       <input id="Email" type="text" class="validate">
                       <label for="email">Email Address: </label>
                      </div>
              </p>
            </div>
              
           <div class="modal-footer">
               <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
               <button type= "submit"class="waves-effect waves-green btn-flat">DONE EDITING</a>
            </div>
        </div>
 			  </div>
    		</div>

          <!-- <Modal Structure for Add Employee> -->
    			<div id="newemp" class="modal modal-fixed-footer">
                 <div class = "label"><font color = "teal" size = "+3" back ><h5><center>ADD NEW EMPLOYEE</h5></center></font> </div>
                 <div class="modal-content">
                <p>

                <div class="input-field">
                 <input id="FirstName" type="text" class="validate">
                 <label for="first_name">First Name: </label>
                </div>

                <div class="input-field">
                 <input id="LastName" type="text" class="validate">
                 <label for="last_name">Last Name: </label>
                </div>

                <div class="input-field">
                 <input id="Address" type="text" class="validate">
                 <label for="Address">Address: </label>
                </div>

                <div class="input-field">
                 <input id="Age" type="text" class="validate">
                 <label for="Age">Age: </label>
                </div>  

                  <div class="input-field">
                  <select>
                    <option value="" disabled selected>Pick a role</option>
                    <option value="1">Production Manager</option>
                    <option value="2">Sewer</option>
                    <option value="3">Cutter</option>
                    <option value="4">Runner</option>
                  </select>
                  <label>Role</label>
                </div>      
                 
                <div class="input-field">
                 <input id="Cellphone Number" type="text" class="validate">
                 <label for="cellphone_number">Cellphone Number: </label>
                </div>

                <div class="input-field">
                 <input id="Landline Number" type="text" class="validate">
                 <label for="landline_number">Landline Number: </label>
                </div>

                <div class="input-field">
                 <input id="Fax Number" type="text" class="validate">
                 <label for="Fax_number">Fax Number: </label>
                </div>

                <div class="input-field">
                 <input id="Email" type="text" class="validate">
                 <label for="email">Email Address: </label>
                </div>
              </p>
            </div>
          
            
                 <div class="modal-footer">
                 <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a>
                 <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">ADD</a>
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

    <script>
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
    </script>

    <script>
      $(document).ready(function(){
      $('select').material_select();
      });
    </script>

@stop