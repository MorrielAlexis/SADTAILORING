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

              	<div id="edit" class="modal modal-fixed-footer">
           			<div class = "label"><font color = "teal" size = "+3" back >&nbsp Button Category
                 </font> </div>
           			<div class="modal-content">

                <div class="input-field">
                 <input id="ButtonCategoryName" type="text" class="validate">
                 <label for="button_category_name">Button Category Name: </label>
                </div>
                <div class="input-field">
                 <input id="ButtonCategoryDescription" type="text" class="validate">
                 <label for="buttom_category_description">Button Category Description: </label>
                </div>

         		   		<a href="save" class=" modal-action modal-close waves-effect waves-green btn">Save</a> 
                  <a href="cancel" class=" modal-action modal-close waves-effect waves-green btn">Cancel</a>
           			</div>

    			</div>

    		
    			</div>
    		</div>

    			<div id="add" class="modal modal-fixed-footer">
                <div class = "label"><font color = "teal" size = "+3" back >&nbsp Button Category
                 </font> </div>
                <div class="modal-content">
                <p></p>

                <div class="input-field">
                 <input id="ButtonCategoryName" type="text" class="validate">
                 <label for="last_name">Button Category Name: </label>
                </div>
                <div class="input-field">
                 <input id="ButtonCategoryDescription" type="text" class="validate">
                 <label for="last_name">Button Category Description: </label>
                </div >

                  <div class col s6>
                  <a href="save" class=" modal-action modal-close waves-effect waves-green btn">Save</a> 
                  <a href="cancel" class=" modal-action modal-close waves-effect waves-green btn">Cancel</a>
                </div>
                    
                </div>

    	</div>
    </div>	


    {{ HTML::script('js/jquery-2.1.4.min.js') }}
    {{ HTML::script('js/materialize.min.js') }}
    {{ HTML::script('js/forModal.js') }}



	</body>
</html>