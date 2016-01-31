<!DOCTYPE html>
<html>
	<head>
		<title>"Customer Company"</title>
		  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- STYLES START -->
    {{ HTML::style('css/materialize.min.css') }}
    
	</head>

	<body>

  		  <!-- Modal Trigger -->
  <a class="waves-effect waves-light btn modal-trigger" href="#modal1">ADD</a>
  <div class="col s12 m12 l12 overflow-x">
   <table class="responsive-table">
     
        <thead>
          <tr>
              <th data-field="id">Company ID</th>
              <th data-field="name">Company Name</th>
              <th data-field="contact">Contact Person</th>
              <th data-field="address">Address</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>2013-04227-MN-0</td>
            <td>Marc Joseph Delim</td>
            <td>Leony Delim</td>
            <td>Marikina</td>
          </tr>
        </tbody>

      </table>
    </div>
    
    
<div>    
  <p></p>
  <p></p>
<button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit">Edit</button>
<button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#delete">Delete</button>
</div>
            
  <!-- Modal Structure -->
  <div id="modal1" class="modal">
  	<button data-target="modal1" class="btn modal-trigger">Company Profile</button>
    <div class="modal-content">

        <div class = "label"><font size = "+2"> <b>Personal Information</b> </font>
        </div>
        <p></p>

       <div class = "label">Company Name: 
        </div>
        <div class="input">
        <input type="text" placeholder="Company Name">
        </div>
        <div class = "label">Company Description: 
        </div>
        <div class="input">
        <input type="text" placeholder="Company Description">
        </div>
        <div class = "label">Company Address: 
        </div>
        <div class="input">
        <input type="text" placeholder="Company Address">
        </div>
        <div class = "label">Contact Person: 
        </div>
        <div class="input">
        <input type="text" placeholder="Contact Person">
        </div>
        <p></p>
        <div class = "label"><b><font size = "+2">Contact Details</b></font>
        </div>
        <p></p>
        <div class = "label">Landline Number:
        </div>
        <div class="input">
        <input type="text" placeholder="Landline Number"></div>
       <div class = "label">Fax Number: 
        </div>
        <div class="input">
        <input type="text" placeholder="Fax Number">
        </div>
        <div class = "label">Cellphone Number: 
        </div>
        <div class="input">
        <input type="text" placeholder="Cellphone">
        </div>



            
            
    <div class="modal-footer">
      <a href="cancel" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
      <a href="save" class=" modal-action modal-close waves-effect waves-green btn-flat">Save</a>
      
    </div>
  </div>
      {{ HTML::script('js/jquery-2.1.4.min.js') }}
      {{ HTML::script('js/materialize.min.js') }}
      {{ HTML::script('js/forModal.js') }}
  	 

          
                              
		
	</body>
	

</html>
