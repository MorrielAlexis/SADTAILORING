<!DOCTYPE html>
<html>
	<head>
		<title>"Customer Individual"</title>
		  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- STYLES START -->
    {{ HTML::style('css/materialize.min.css') }}
    
	</head>

	<body>


    <div class="row">
    <div class="col s12 m12 l12">
    <div class="card-panel">
    <span class="card-title"><h4>Customer Profile - Individual</h4></span>
    <div class="divider"></div>
    <div class="card-content">

  		  <!-- Modal Trigger -->
     <a class="waves-effect waves-light btn modal-trigger" href="#add">ADD</a>
    
      <table class = "centered" align = "center" border = "1">
        <thead>
          <tr>
              <th data-field="id">Indivual ID</th>
              <th data-field="name">First Name</th>
              <th data-field="name">Last Name</th>
              <th data-field="address">Address</th>
              <th data-field="email">Email Address</th>
              <th data-field="cellphone">Cellphone No.</th>
              <th data-field="Landline">Phone No.</th>
              <th data-field="fax">Fax No.</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            
            <td>2013-04227-MN-0</td>
            <td>Marc Joseph</td>
            <td> Delim</td>
            <td>Marikina</td>
            <td>marcjosephdelim@gmail.com</td>
            <td>09351610917</td> 
            <td>6551837</td>
            <td>1234567</td>        
            <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit">EDIT</button></td>

            </tr>
        </tbody>
      </table>
                <!-- Modal Structure -->
            <div id="edit" class="modal">
            <div class = "label"><font color = "teal" size = "+3" back >&nbsp Individual Profile </font> </div>
            <div class="modal-content">

            <div class = "label"><font size = "+2"> <b>Personal Information</b> </font>
            </div>
            <p></p>
            <div class = "label">Customer ID: </div>
            <div class="input"> <input type="text" readonly = "readonly" placeholder=""> </div>
            <div class = "label">First Name: </div>
            <div class="input"> <input type="text" placeholder="First Name"> </div>
            <div class = "label">Last Name: </div>
            <div class="input"> <input type="text" placeholder="Last Name"> </div>
            <div class = "label">Address:</div>
            <div class="input"> <input type="text" placeholder="Address"> </div>
            <div class = "label">Email Address: </div>
            <div class="input"> <input type="email" placeholder="Email"> </div>
            <div class = "label">Cellphone Number: </div>
            <div class="input"> <input type="text" placeholder="Cellphone"> </div>
            <div class = "label">Landline Number: </div>
            <div class="input"> <input type="text" placeholder="Landline Number"></div>
            <div class = "label">Contact Person: </div>
            <div class = "label">Fax Number: </div>
            <div class="input"> <input type="text" placeholder="Fax Number"></div>
            
            
            <div class="modal-footer">
            <a href="cancel" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
            <a href="save" class=" modal-action modal-close waves-effect waves-green btn-flat">Save</a>
      
           </div>
  
          
    </div> 
  </div>
    

    

            
  <!-- Modal Structure --> 
      <div id="add" class="modal">
            <div class = "label"><font color = "teal" size = "+3" back >&nbsp Individual Profile </font> </div>
            <div class="modal-content">

            <div class = "label"><font size = "+2"> <b>Personal Information</b> </font>
            </div>
            <p></p>

            <div class = "label">Customer ID: </div>
            <div class="input"> <input type="text" readonly = "readonly" placeholder=""> </div>
            <div class = "label">First Name: </div>
            <div class="input"> <input type="text" placeholder="First Name"> </div>
            <div class = "label">Last Name: </div>
            <div class="input"> <input type="text" placeholder="Last Name"> </div>
            <div class = "label">Address:</div>
            <div class="input"> <input type="text" placeholder="Address"> </div>
            <div class = "label">Email Address: </div>
            <div class="input"> <input type="email" placeholder="Email"> </div>
            <div class = "label">Cellphone Number: </div>
            <div class="input"> <input type="text" placeholder="Cellphone"> </div>
            <div class = "label">Landline Number: </div>
            <div class="input"> <input type="text" placeholder="Landline Number"></div>
            <div class = "label">Contact Person: </div>
            <div class = "label">Fax Number: </div>
            <div class="input"> <input type="text" placeholder="Fax Number"></div>



            
            
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
