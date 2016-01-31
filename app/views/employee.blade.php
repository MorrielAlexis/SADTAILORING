<!DOCTYPE html>
<html>
	<head>
		<title>"Employee Profile"</title>
		  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- STYLES START -->
    {{ HTML::style('css/materialize.min.css') }}
    
	</head>
	<body>



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
              		  <td>2013-04227-MN-0</td>
                    <td>Marc Joseph</td>
                    <td> Delim</td>
                    <td> 19</td>
                    <td> basketball</td>
                    <td>Marikina</td>
                    <td>09351610917</td> 
                    <td>6551837</td>
                    <td>1234567</td>
                    <td>marcjosephdelim@gmail.com</td>
              			<td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit">EDIT</button>
              			


              		</tbody>
              		</table>

                 <div id="edit" class="modal">
                 <div class = "label"><font color = "teal" size = "+3" back >&nbsp Employee </font> </div>
                 <div class="modal-content">

                 <div class = "label"><font size = "+2"> <b>Employee Information</b> </font>
                 </div>
                 <p></p>
                 <div class = "label">Employee ID: </div>
                 <div class="input"> <input type="text" readonly = "readonly" placeholder=""> </div>
                 <div class = "label">First Name: </div>
                 <div class="input"> <input type="text" placeholder="First Name"> </div>
                 <div class = "label">Last Name: </div>
                 <div class="input"> <input type="text" placeholder="Last Name"> </div>
                 <div class = "label">Address:</div>
                 <div class="input"> <input type="text" placeholder="Address"> </div>
                 <div class = "label">Age </div>
                 <div class="input"> <input type="text" placeholder="Age"> </div>
                <div class = "label">Role: </div>      

                  <div class="input-field">
                  <select>
                    <option value="" disabled selected>Role</option>
                    <option value="1">Production Manager</option>
                    <option value="2">Sewer</option>
                    <option value="3">Cutter</option>
                    <option value="4">Runner</option>
                  </select>
                </div>      
                 
              
                 <div class = "label">Cellphone Number: </div>
                 <div class="input"> <input type="text" placeholder="Cellphone"> </div>
                 <div class = "label">Landline Number: </div>
                 <div class="input"> <input type="text" placeholder="Landline Number"></div>
                 <div class = "label">Fax Number: </div>
                 <div class="input"> <input type="text" placeholder="Fax Number"></div>
                 <div class = "label">Email Address: </div>
                 <div class="input"> <input type="text" placeholder="Email"> </div>
            
            
                 <div class="modal-footer">
                 <a href="cancel" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
                 <a href="save" class=" modal-action modal-close waves-effect waves-green btn-flat">Save</a>
      
                  </div>

    			</div>

    		
    			</div>
    		</div>

    			<div id="add" class="modal">
           			<div class = "label"><font color = "teal" size = "+3" back >&nbsp Employee </font> </div>
                 <div class="modal-content">

                 <div class = "label"><font size = "+2"> <b>Employee Information</b> </font>
                 </div>
                 <p></p>
                 <div class = "label">Employee ID: </div>
                 <div class="input"> <input type="text" readonly = "readonly" placeholder=""> </div>
                 <div class = "label">First Name: </div>
                 <div class="input"> <input type="text" placeholder="First Name"> </div>
                 <div class = "label">Last Name: </div>
                 <div class="input"> <input type="text" placeholder="Last Name"> </div>
                 <div class = "label">Address:</div>
                 <div class="input"> <input type="text" placeholder="Address"> </div>
                 <div class = "label">Age </div>
                 <div class="input"> <input type="text" placeholder="Age"> </div>
                  <div class = "label">Role: </div>      

                  <div class="input-field">
                  <select>
                    <option value="" disabled selected>Role</option>
                    <option value="1">Production Manager</option>
                    <option value="2">Sewer</option>
                    <option value="3">Cutter</option>
                    <option value="4">Runner</option>
                  </select>
                </div>      
                 
              
                 <div class = "label">Cellphone Number: </div>
                 <div class="input"> <input type="text" placeholder="Cellphone"> </div>
                 <div class = "label">Landline Number: </div>
                 <div class="input"> <input type="text" placeholder="Landline Number"></div>
                 <div class = "label">Fax Number: </div>
                 <div class="input"> <input type="text" placeholder="Fax Number"></div>
                 <div class = "label">Email Address: </div>
                 <div class="input"> <input type="text" placeholder="Email"> </div>
            
            
                 <div class="modal-footer">
                 <a href="cancel" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
                 <a href="save" class=" modal-action modal-close waves-effect waves-green btn-flat">Save</a>
      
                  </div>

    	</div>
    </div>	




    {{ HTML::script('js/jquery-2.1.4.min.js') }}
    {{ HTML::script('js/materialize.min.js') }}
    {{ HTML::script('js/forModal.js') }}
    {{ HTML::script('js/forDropdown.js') }}
    {{ HTML::script('js/inputfield.js')}}


	</body>
</html>