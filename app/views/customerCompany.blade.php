<!DOCTYPE html>
<html>
	<head>
		<title>"Customer Company"</title>
		  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- STYLES START -->
    {{ HTML::style('css/materialize.min.css') }}
    
	</head>

	<body>


    <div class="row">
    <div class="col s12 m12 l12">
    <div class="card-panel">
    <span class="card-title"><h4>Customer Profile - Company</h4></span>
    <div class="divider"></div>
    <div class="card-content">

  		  <!-- Modal Trigger -->
     <a class="waves-effect waves-light btn modal-trigger" href="#add">ADD</a>
    
      <table class = "centered" align = "center" border = "1">
        <thead>
          <tr>
              <th data-field="id">Company ID</th>
              <th data-field="name">Company Name</th>
              <th data-field="address">Address</th>
              <th data-field="contact">Contact Person</th>
              <th data-field="Landline">Landline No.</th>
              <th data-field="fax">Fax No.</th>
              <th data-field="cellphone">Cellphone No.</th>
              <th data-field="email">Email Address</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            
            <td>2013-04227-MN-0</td>
            <td>Marc Joseph Delim</td>
            <td>Marikina</td>
            <td>Leony Delim</td>
            <td>6551837</td>
            <td>1234567</td>
            <td>09351610917</td>
            <td>marcjosephdelim@gmail.com</td>          
            <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit">EDIT</button></td>

            </tr>
        </tbody>
      </table>
                <!-- Modal Structure -->
            <div id="edit" class="modal">
            <div class = "label"><font color = "teal" size = "+3" back >&nbsp Company Profile </font> </div>
            <div class="modal-content">

            <div class = "label"><font size = "+2"> <b>Personal Information</b> </font>
            </div>
            <p></p>

            <div class = "label">Company ID: </div>
            <div class="input"> <input type="text" readonly = "readonly"> </div>
            <div class = "label">Company Name: </div>
            <div class="input"> <input type="text" placeholder="Company Name"> </div>
            <div class = "label">Company Description: </div>
            <div class="input"><input type="text" placeholder="Company Description"> </div>
            <div class = "label">Company Address:</div>
            <div class="input"> <input type="text" placeholder="Company Address"> </div>
            <div class = "label">Contact Person: </div>
            <div class="input"> <input type="text" placeholder="Contact Person"> </div>
            <p></p>
            <div class = "label"><b><font size = "+2">Contact Details</b></font></div>
            <p></p>
            <div class = "label">Landline Number: </div>
            <div class="input"> <input type="text" placeholder="Landline Number"></div>
            <div class = "label">Fax Number: </div>
            <div class="input"> <input type="text" placeholder="Fax Number"></div>
            <div class = "label">Cellphone Number: </div>
            <div class="input"> <input type="text" placeholder="Cellphone"> </div>
            <div class = "label">Email Address: </div>
            <div class="input"> <input type="email" placeholder="Email"> </div>



            
            
            <div class="modal-footer">
            <a href="cancel" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
            <a href="save" class=" modal-action modal-close waves-effect waves-green btn-flat">Save</a>
      
           </div>
  
          
    </div> 
  </div>
    
    

            
  <!-- Modal Structure --> 
      <div id="add" class="modal">
            <div class = "label"><font color = "teal" size = "+3" back >&nbsp Company Profile </font> </div>
            <div class="modal-content">

            <div class = "label"><font size = "+2"> <b>Personal Information</b> </font>
            </div>
            <p></p>

            <div class = "label">Company ID: </div>
            <div class="input"> <input type="text" readonly = "readonly"> </div>
            <div class = "label">Company Name: </div>
            <div class="input"> <input type="text" placeholder="Company Name"> </div>
            <div class = "label">Company Description: </div>
            <div class="input"><input type="text" placeholder="Company Description"> </div>
            <div class = "label">Company Address:</div>
            <div class="input"> <input type="text" placeholder="Company Address"> </div>
            <div class = "label">Contact Person: </div>
            <div class="input"> <input type="text" placeholder="Contact Person"> </div>
            <p></p>
            <div class = "label"><b><font size = "+2">Contact Details</b></font></div>
            <p></p>
            <div class = "label">Landline Number: </div>
            <div class="input"> <input type="text" placeholder="Landline Number"></div>
            <div class = "label">Fax Number: </div>
            <div class="input"> <input type="text" placeholder="Fax Number"></div>
            <div class = "label">Cellphone Number: </div>
            <div class="input"> <input type="text" placeholder="Cellphone"> </div>
            <div class = "label">Email Address: </div>
            <div class="input"> <input type="email" placeholder="Email"> </div>



            
            
            <div class="modal-footer">
            <a href="cancel" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
            <a href="save" class=" modal-action modal-close waves-effect waves-green btn-flat">Save</a>
      
           </div>
  	     
          
      </div>

     </div>  
    </div> 
   
      {{ HTML::script('js/jquery-2.1.4.min.js') }}
      {{ HTML::script('js/materialize.min.js') }}
      {{ HTML::script('js/forModal.js') }}
  	 

          
                              
		
  </body>
	

</html>
