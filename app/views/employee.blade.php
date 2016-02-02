@extends('layouts.master')

@section('content')
    <div class="row">
    	<div class="col s12 m12 l12">
    		<div class="card-panel">
   		    	<span class="card-title"><h4>Employee Profile</h4></span>
   				<div class="divider"></div>
    			<div class="card-content">

    			<a class="waves-effect waves-light btn modal-trigger" href="#add">ADD</a>
    
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
                    <th data-field="fax">Fax No.</th>
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
                        <td>fax</td>
                        <td>email</td>
              			<td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit">EDIT</button>
              			


              		</tbody>
              		</table>

                 <div id="edit" class="modal">
                 <div class = "label"><font color = "teal" size = "+3" back >&nbsp Employee Information </font> </div>
                 <div class="modal-content">

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
              
            
            
                 <div class="modal-footer">
                 <a href="#!" class=" modal-action modal-close waves-effect waves-green btn">Cancel</a>
                 <a href="#!" class=" modal-action modal-close waves-effect waves-green btn">Save</a>
      
                  </div>

    			</div>

    		
    			</div>
    		</div>

    			<div id="add" class="modal">
                 <div class = "label"><font color = "teal" size = "+3" back >&nbsp Employee Information </font> </div>
                 <div class="modal-content">

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
              
            
            
                 <div class="modal-footer">
                 <a href="#!" class=" modal-action modal-close waves-effect waves-green btn">Cancel</a>
                 <a href="#!" class=" modal-action modal-close waves-effect waves-green btn">Save</a>
      
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