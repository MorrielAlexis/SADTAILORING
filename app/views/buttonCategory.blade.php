<!DOCTYPE html>
<html>
	<head>
		<title>Buttons</title>
		  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- STYLES START -->
    {{ HTML::style('css/materialize.min.css') }}
    
	</head>
	<body>


    <div class="row">
    	<div class="col s12 m12 l12">
    		<div class="card-panel">
   		    	<span class="card-title"><h4>Button</h4></span>
   				<div class="divider"></div>
    			<div class="card-content">

    			<a class="waves-effect waves-light btn modal-trigger" href="#add">ADD</a>
    
      				<table class = "centered" align = "center" border = "1">
       				<thead>
          				<tr>
              			<th data-field="id">Button Category ID</th>
             		  	<th data-field="ButtonCategoryName">Button Category Name</th>
              			<th data-field="ButtonCategoryDescription">Button Category Description</th>
              			</tr>
              		<thead>
              		<tbody>
              			<td>001</td>
              			<td>Button Category</td>
              			<td>Button Category des</td>
              			<td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit">EDIT</button>
              			


              		</tbody>
              		</table>

              		<div id="edit" class="modal">
           			<div class = "label"><font color = "teal" size = "+3" back >&nbsp Button
                 </font> </div>
           			<div class="modal-content">

            		<div class = "label"><font size = "+2"> <b>Button Category</b> </font></div>
            		<p></p>
            		<div class = "label">Button Category ID: </div>
           			<div class="input"> <input type="text" placeholder="" readonly = "readonly"> </div>
           			<div class = "label">Button Category Name: </div>
           			<div class="input"><input type="text" placeholder="Button Category Name"> </div>
           			<div class = "label">Button Category Description:</div>
           			<div class="input"> <input type="text" placeholder="Button Category Description"> </div>
           			<div class="modal-footer">
         		   		<a href="cancel" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
           				 <a href="save" class=" modal-action modal-close waves-effect waves-green btn-flat">Save</a>	
           			</div>

    			</div>

    		
    			</div>
    		</div>

    			<div id="add" class="modal">
           			<div class = "label"><font color = "teal" size = "+3" back >&nbsp Button </font> </div>
           			<div class="modal-content">

            		<div class = "label"><font size = "+2"> <b>Button Category</b> </font></div>
                <p></p>
                <div class = "label">Button Category ID: </div>
                <div class="input"> <input type="text" placeholder="" readonly = "readonly"> </div>
                <div class = "label">Button Category Name: </div>
                <div class="input"><input type="text" placeholder="Button Category Name"> </div>
                <div class = "label">Button Category Description:</div>
                <div class="input"> <input type="text" placeholder="Button Category Description"> </div>
                <div class="modal-footer">
                  <a href="cancel" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
                   <a href="save" class=" modal-action modal-close waves-effect waves-green btn-flat">Save</a>  
                </div>

    	</div>
    </div>	


    {{ HTML::script('js/jquery-2.1.4.min.js') }}
    {{ HTML::script('js/materialize.min.js') }}
    {{ HTML::script('js/forModal.js') }}



	</body>
</html>