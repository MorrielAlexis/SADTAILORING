<!DOCTYPE html>
<html>
	<head>
		<title>Design Pattern</title>
		  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- STYLES START -->
    {{ HTML::style('css/materialize.min.css') }}
    
	</head>
	<body>


    <div class="row">
    	<div class="col s12 m12 l12">
    		<div class="card-panel">
   		    	<span class="card-title"><h4>Design Pattern</h4></span>
   				<div class="divider"></div>
    			<div class="card-content">

    			<a class="waves-effect waves-light btn modal-trigger" href="#add">ADD</a>
    
      				<table class = "centered" align = "center" border = "1">
       				<thead>
          				<tr>
                    <th date-field= "Catalog ID">Design Pattern ID</th>
              			<th data-field="Garment Name">Garment Name </th>
             		  	<th data-field="Pattern Name">Pattern Name</th>
              			<th data-field="Pattern Image">Pattern Image</th>
              			</tr>
              		<thead>
              		<tbody>

              			<td>001</td>
                    <td>Type Name</td>
              			<td>President</td>
                    <td>imagelink</td>
              			<td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit">EDIT</button>
              			


              		</tbody>
              		</table>

              		<div id="edit" class="modal">
           			<div class = "label"><font color = "teal" size = "+3" back >&nbsp Design Pattern
                 </font> </div>
           			<div class="modal-content">

            		<div class = "label"><font size = "+2"> <b>Design Pattern</b> </font></div>
            		<p></p>
                <div class = "label">Design Pattern ID: </div>
                <div class="input"> <input type="text" readonly = "readonly" placeholder=""> </div>
            		<div class = "label">Garment Name: </div>
           			<div class="input-field">
                  <select>
                    <option value="" disabled selected>Type Name</option>
                    <option value="1">Garment 1</option>
                    <option value="2">Garment 2</option>
                  </select>
                </div>      
           			<div class = "label">Pattern Name </div>
           			<div class="input"><input type="text" placeholder="Catalog Name"> </div>
                <div class = "label">Image:</div>
                 <button class = "teal button">Upload Image</button>
                 <img class="materialboxed" align = "center" data-caption="A picture of some deer and tons of trees" width="150" src="http://th01.deviantart.net/fs70/PRE/i/2013/126/1/e/nature_portrait_by_pw_fotografie-d63tx0n.jpg">
                
           			<div class="modal-footer">
         		   		<a href="cancel" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
           				 <a href="save" class=" modal-action modal-close waves-effect waves-green btn-flat">Save</a>	
           			</div>

    			</div>

    		
    			</div>
    		</div>

    			<div id="add" class="modal">
           			<div class = "label"><font color = "teal" size = "+3" back >&nbsp Catalogue </font> </div>
           			<div class="modal-content">

            		<div class = "label"><font size = "+2"> <b>Swatches</b> </font></div>
            		<p></p>
                <div class = "label">Design Pattern ID: </div>
                <div class="input"> <input type="text" readonly = "readonly" placeholder=""> </div>
                <div class = "label">Garment Name: </div>
                <div class="input-field">
                  <select>
                    <option value="" disabled selected>Type Name</option>
                    <option value="1">Garment 1</option>
                    <option value="2">Garment 2</option>
                  </select>
                </div>      
                <div class = "label">Pattern Name </div>
                <div class="input"><input type="text" placeholder="Catalog Name"> </div>
                <div class = "label">Image:</div>
                 <button class = "teal button">Upload Image</button>
                 <img class="materialboxed" align = "center" data-caption="A picture of some deer and tons of trees" width="150" src="http://th01.deviantart.net/fs70/PRE/i/2013/126/1/e/nature_portrait_by_pw_fotografie-d63tx0n.jpg">
                
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