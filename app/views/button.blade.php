<!DOCTYPE html>
<html>
<head>

    <title>Button</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    {{ HTML::style('css/materialize.min.css') }}
    {{ HTML::style('css/style.css') }}
    

</head>
<body>

	<div class="main-wrapper">
    <div class="row">
      <div class="col s12 m12 l12">
      <span class="page-title"><h4>Button</h4></span>
      </div>

      <div class="row">
        <div class="col s12 m12 l6">
           <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#addButton">ADD Button</button>
        </div>
      
    </div>



    <div class="row">
    	<div class="col s12 m12 l12">
    		<div class="card-panel">
   		    	<span class="card-title"><h5><center>Button</center></h5></span>
   				<div class="divider"></div>
    			<div class="card-content">
    
      				<table class = "centered" align = "center" border = "1">
       				   <thead>
          				<tr>
                    <th date-field= "Button ID">Button ID</th>
             				<th data-field="Button Name">Button Name</th>
                    <th data-field="Button Size">Button Size</th>
                    <th data-field="Button Color">Button Color</th>
                    <th data-field="Button">Button</th>
              			<th data-field="Image">Image</th>
              		</tr>
                 </thead>

              		<tbody>
              			<td>001</td>
                    <td>Button Name</td>
              			<td>Button Size</td>
              			<td>Button Color</td>
              			<td>Button</td>
                    <td>image</td>
              			<td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#editButton">EDIT</button>
              		</tbody>
              </table>

              	<div id="editButton" class="modal modal-fixed-footer">
           				 <font color = "teal" ><center><h5>Edit Button</h5></center>
                 	 </font> 

           			  <div class="modal-content">
                  
                			<div class="input-field">
                				<input id="ButtonName" type="text" class="validate">
                				<label for="Button_Name"> Button Name </label>
                			</div>

                			<div class="input-field">
                				<input id="ButtonSize" type="text" class="validate">
                				<label for="Button_Size"> Button Size </label>
                			</div>

                			<div class="input-field">
                				<input id="ButtonColor" type="text" class="validate">
                				<label for="Button_Color"> Button Color </label>
                			</div>


                			<div class="input-field">
                				<input id="Button" type="text" class="validate">
                				<label for="Button"> Button </label>
                			</div>
           			
                			<div class="file-field input-field">
               					<div class="btn">
               						<span>Upload Image</span>
              						<input type="file">
             					</div>

               				<div class="file-path-wrapper">
             					  <input class="file-path validate" type="text">
               				</div>

                    </div>

                    <br>
                    <br> 

                  </div>       		   		
                  <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn btn-flat">UPDATE</a>
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn btn-flat">CANCEL</a>  
           			  </div>

    			       </div>
                

    			        <div id="addButton" class="modal modal-fixed-footer">
                    <font color = "teal"><h5><center>Add Button </center></h5>
                    </font> 
                    <div class="modal-content">
                  
                      <div class="input-field">
                        <input id="ButtonName" type="text" class="validate">
                        <label for="Button_Name"> Button Name </label>
                      </div>

                      <div class="input-field">
                        <input id="ButtonSize" type="text" class="validate">
                        <label for="Button_Size"> Button Size </label>
                      </div>

                      <div class="input-field">
                        <input id="ButtonColor" type="text" class="validate">
                        <label for="Button_Color"> Button Color </label>
                      </div>


                      <div class="input-field">
                        <input id="Button" type="text" class="validate">
                        <label for="Button"> Button </label>
                      </div>
                
                      <div class="file-field input-field">
                        <div class="btn">
                          <span>Upload Image</span>
                          <input type="file">
                      </div>

                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                      </div>

                    </div>

                    <br>
                    <br> 

                  </div>                
                  <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn btn-flat">UPDATE</a>
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn btn-flat">CANCEL</a>  
                  </div>

                 </div>		
              </div>	



    {{ HTML::script('js/jquery-2.1.4.min.js') }}
    {{ HTML::script('js/materialize.min.js') }}
    {{ HTML::script('js/forModal.js') }}
    {{ HTML::script('js/forDropdown.js') }}
    {{ HTML::script('js/inputfield.js')}}

    <script>
      $(document).ready(function(){
      // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
      $('.modal-trigger').leanModal();
      });
    </script>

     <script>
      $(document).ready(function(){
      $('select').material_select();
      });
    </script>

  </div>

</body>

</html>