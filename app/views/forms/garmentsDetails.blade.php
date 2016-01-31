<!DOCTYPE html>
<html>
	<head>
		<title>"Garments"</title>
		  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- STYLES START -->
    {{ HTML::style('css/materialize.min.css') }}
    
	</head>
	<body>


    <div class="row">
    	<div class="col s12 m12 l12">
    		<div class="card-panel">
   		    	<span class="card-title"><h4>Garments Details</h4></span>
   				<div class="divider"></div>
    			<div class="card-content">

    			<a class="waves-effect waves-light btn modal-trigger" href="#add">ADD</a>
    
      				<table class = "centered" align = "center" border = "1">
       				<thead>
          				<tr>
              			<th data-field="id">Garment Details ID</th>
             		   	<th data-field="name">Category Name</th>
                    <th data-field="name">Product Name</th>
              			<th data-field="address">Product Description</th>
              			</tr>
              		<thead>
              		<tbody>
              			<td>001</td>
              			<td>Garment to</td>
                    <td>Product to</td>
              			<td>Pro Desc</td>
              			<td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit">EDIT</button>
              			


              		</tbody>
              		</table>

              	<div id="edit" class="modal">
           			<div class = "label"><font color = "teal" size = "+3" back >&nbsp Garments </font> </div>
           			<div class="modal-content">

            		<div class = "label"><font size = "+2"> <b>Garments Details</b> </font></div>
            		<p></p>
            		<div class = "label">Garment Details ID: </div>
           			<div class="input"> <input type="text" placeholder="" readonly = "readonly"> </div>
                <div class = "label">Category Name: </div>
                <div class="input"><input type="text" placeholder="Category Name"> </div>
                <div class = "label">Product Name: </div>
                 <div class="input-field">
                  <select>
                    <option value="" disabled selected>Product</option>
                    <option value="1">Product 1</option>
                    <option value="2">Product 2</option>
                    <option value="3">Product 3</option>
                  </select>
                </div>  
                
           			<div class = "label">Product Description: </div>
           			<div class="input"><input type="text" placeholder="Product Description"> </div>
           			<div class="modal-footer">
         		   		<a href="cancel" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
           				 <a href="save" class=" modal-action modal-close waves-effect waves-green btn-flat">Save</a>	
           			</div>

    			</div>

    		
    			</div>
    		</div>

    			<div id="add" class="modal">
           			<div class = "label"><font color = "teal" size = "+3" back >&nbsp Category Information </font> </div>
           			<div class="modal-content">

            		<div class = "label"><font size = "+2"> <b>Garments Category Information</b> </font></div>
            		<p></p>
                <div class = "label">Garment Details ID: </div>
                <div class="input"> <input type="text" placeholder="" readonly = "readonly"> </div>
                <div class = "label">Category Name: </div>
                <div class="input"><input type="text" placeholder="Category Name"> </div>
                <div class = "label">Product Name: </div>
                 <div class="input-field">
                  <select>
                    <option value="" disabled selected>Product</option>
                    <option value="1">Product 1</option>
                    <option value="2">Product 2</option>
                    <option value="3">Product 3</option>
                  </select>
                </div>  
                
                <div class = "label">Product Description: </div>
                <div class="input"><input type="text" placeholder="Product Description"> </div>
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