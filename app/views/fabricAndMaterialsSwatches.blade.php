@extends('layouts.master')
    
@section('content')
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
                    <th date-field= "fabric type ID">Fabric Type ID</th>
              			<th data-field="fabric type Name">Fabric Type Name</th>
             		  	<th data-field="SwatchName">Swatch Name</th>
                    <th data-field="SwatchCode">Swatch Code</th>
              			<th data-field="Image">Image</th>
              			</tr>
              		<thead>
              		<tbody>

              			<td>id</td>
                    <td>Fabric Tyoe Name</td>
              			<td>Swatch Name</td>
              			<td>Swatch Code</td>
                    <td>imagelink</td>
              			<td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit">EDIT</button>
              			


              		</tbody>
              		</table>

              	<div id="edit" class="modal">
           			<div class = "label"><font color = "teal" size = "+3" back >&nbsp Swatches
                 </font> </div>
           			<div class="modal-content">

                <div class="input-field">
                  <select>
                    <option value="" disabled selected>Type Name</option>
                    <option value="1">Fabric 1</option>
                    <option value="2">Fabric 2</option>
                  </select>
                  <label>Fabric Type Name: </label>
                </div>  

                <div class="input-field">
                 <input id="SwatchName" type="text" class="validate">
                 <label for="swatch_name">Swatch Name: </label>
                </div>    

                <div class="input-field">
                 <input id="SwatchCode" type="text" class="validate">
                 <label for="swatch_code">Swatch Code: </label>
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

                <div class="modal-footer">
                  <a href="#!" class=" modal-action modal-close waves-effect waves-green btn">Cancel</a>
                   <a href="#!" class=" modal-action modal-close waves-effect waves-green btn">Save</a>  
                </div>

    			</div>

    		
    			</div>
    		</div>

    			<div id="add" class="modal">
           			<div class = "label"><font color = "teal" size = "+3" back >&nbsp Swatches
                 </font> </div>
                <div class="modal-content">

                <div class="input-field">
                  <select>
                    <option value="" disabled selected>Type Name</option>
                    <option value="1">Fabric 1</option>
                    <option value="2">Fabric 2</option>
                  </select>
                  <label>Fabric Type Name: </label>
                </div>  

                <div class="input-field">
                 <input id="SwatchName" type="text" class="validate">
                 <label for="swatch_name">Swatch Name: </label>
                </div>    

                <div class="input-field">
                 <input id="SwatchCode" type="text" class="validate">
                 <label for="swatch_code">Swatch Code: </label>
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

                <div class="modal-footer">
                  <a href="#!" class=" modal-action modal-close waves-effect waves-green btn">Cancel</a>
                   <a href="#!" class=" modal-action modal-close waves-effect waves-green btn">Save</a>  
                </div>
    	</div>
    </div>	

@stop

@section('scripts')
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
@stop