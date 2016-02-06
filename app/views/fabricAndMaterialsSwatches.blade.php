@extends('layouts.master')
 
@section('content')

<div class="main-wrapper">
    <div class="row">
      <div class="col s12 m12 l12">
      <span class="page-title"><h4>Swatches</h4></span>
    </div>

       <div class="row">
        <div class="col s12 m12 l6">
           <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#addSwatches">ADD NEW SWATCH</button>
         </div>
      </div>
     </div>
    <div class="row">
    	<div class="col s12 m12 l12">
    		<div class="card-panel">
   		    	<span class="card-title"><h5><center>Swatches Details</h5></center></span>
   				<div class="divider"></div>
    			<div class="card-content">

    	
    
      				<table class = "centered" align = "center" border = "1">
       				<thead>
          				<tr>
                    <th date-field= "Swatch ID">Swatch ID</th>
              			<th data-field="fabric type Name">Fabric Type Name</th>
             		  	<th data-field="SwatchName">Swatch Name</th>
                    <th data-field="SwatchCode">Swatch Code</th>
              			<th data-field="Image">Image</th>
              			</tr>
              		</thead>
              		<tbody>

              			<td>id</td>
                    <td>Silk</td>
              			<td>Martina Chuchu</td>
              			<td>MC2345</td>
                    <td>imagelink</td>
              			<td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#editSwatches">EDIT</button>
              			


              		</tbody>
              		</table>
                <p>
              	<div id="editSwatches" class="modal modal-fixed-footer">
           			<font color = "teal"> <center><h5>Edit Swatches Details</h5></center></font> 
           			<div class="modal-content">

                <div class="input-field">
                  <select>
                    <option value="" disabled selected>Select Fabric Type</option>
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
                </p>
              </div>
                <div class="modal-footer">
                  <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">UPDATE</a>
                   <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a>  
                </div>

    			</div>

    		
    			</div>
    		</div>
          <p>
    			<div id="addSwatches" class="modal modal-fixed-footer">
           			<font color = "teal"><center><h5> Add Swatch </h5></center>
                 </font> 
                <div class="modal-content">

                <div class="input-field">
                  <select>
                    <option value="" disabled selected>Select Fabric</option>
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
                </p>
              </div>

                <div class="modal-footer">
                  <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">ADD</a>
                   <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a>  
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