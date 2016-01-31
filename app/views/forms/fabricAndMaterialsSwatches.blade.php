<!DOCTYPE html>+
<html>
	<head>
		<title>Fabric and Materials</title>
		  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- STYLES START -->
    {{ HTML::style('css/materialize.min.css') }}
    
	</head>
	<body>


    <div class="row">
    	<div class="col s12 m12 l12">
    		<div class="card-panel">
   		    	<span class="card-title"><h4>Swatches</h4></span>
   				<div class="divider"></div>
    			<div class="card-content">

    			<a class="waves-effect waves-light btn modal-trigger" href="#add">ADD</a>
    
      				<table class = "centered" align = "center" border = "1">
       				<thead>
          				<tr>
              			<th data-field="fabric type Name">Fabric Type Name</th>
             		  	<th data-field="SwatchName">Swatch Name</th>
                    <th data-field="SwatchCode">Swatch Code</th>
              			<th data-field="Image">Image</th>
              			</tr>
              		<thead>
              		<tbody>
              			<td>001</td>
              			<td>President</td>
              			<td>run a certain group</td>
                    <td>imagelink</td>
              			<td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit">EDIT</button>
              			


              		</tbody>
              		</table>

              		<div id="edit" class="modal">
           			<div class = "label"><font color = "teal" size = "+3" back >&nbsp Fabric and Materials
                 </font> </div>
           			<div class="modal-content">

            		<div class = "label"><font size = "+2"> <b>Swatches</b> </font></div>
            		<p></p>
            		<div class = "label">Fabric Type Name: </div>
           			<div class="input-field">
                  <select>
                    <option value="" disabled selected>Type Name</option>
                    <option value="1">Fabric 1/option>
                    <option value="2">Fabric 2</option>
                  </select>
                </div>      
           			<div class = "label">Swatch Name: </div>
           			<div class="input"><input type="text" placeholder="Swatch Name"> </div>
           			<div class = "label">Swatch Code:</div>
           			<div class="input"> <input type="text" placeholder="Swatch Code"> </div>
                <div class = "label">Image:</div>
                <div class="input"> <input type="text" placeholder="Image"> </div>
           			<div class="modal-footer">
         		   		<a href="cancel" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
           				 <a href="save" class=" modal-action modal-close waves-effect waves-green btn-flat">Save</a>	
           			</div>

    			</div>

    		
    			</div>
    		</div>

    			<div id="add" class="modal">
           			<div class = "label"><font color = "teal" size = "+3" back >&nbsp Fabric Materials </font> </div>
           			<div class="modal-content">

            		<div class = "label"><font size = "+2"> <b>Swatches</b> </font></div>
            		<p></p>
            		<div class = "label">Fabric Type Name: </div>
                <div class="input-field">
                  <select>
                    <option value="" disabled selected>Type Name</option>
                    <option value="1">Fabric 1</option>
                    <option value="2">Fabric 2</option>
                  </select
                </div>      
                <div class = "label">Swatch Name: </div>
                <div class="input"><input type="text" placeholder="Swatch Name"> </div>
                <div class = "label">Swatch Code:</div>
                <div class="input"> <input type="text" placeholder="Swatch Code"> </div>
                <div class = "label">Image:</div>
                <div class="input"> <input type="text" placeholder="Image"> </div>
                <div class="modal-footer">
                  <a href="cancel" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
                   <a href="save" class=" modal-action modal-close waves-effect waves-green btn-flat">Save</a>  
                </div>
    	</div>
    </div>	


    {{ HTML::script('js/jquery-2.1.4.min.js') }}
    {{ HTML::script('js/materialize.min.js') }}
    {{ HTML::script('js/forModal.js') }}
    {{ HTML::script('js/inputfield.js')}}



	</body>
</html>