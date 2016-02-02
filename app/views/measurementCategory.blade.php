@extends('layouts.master')
  
@section('content')
    <div class="row">
    	<div class="col s12 m12 l12">
    		<div class="card-panel">
   		    	<span class="card-title"><h4>Measurement Category</h4></span>
   				<div class="divider"></div>
    			<div class="card-content">

    			<a class="waves-effect waves-light btn modal-trigger" href="#add">ADD</a>
    
      				<table class = "centered" align = "center" border = "1">
       				<thead>
          				<tr>
                    <th data-field = "id"> Category ID </th>
              			<th data-field="category">Category</th>
             		  	<th data-field="GarmentName">Garment Name</th>
              			<th data-field="MeasurementName">Measurement Name</th>
              			</tr>
              		<thead>
              		<tbody>
              			<td>ID</td>
              			<td>Category </td>
              			<td>Garment Name</td>
                    <td>Measurement Name</td>
              			<td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit">EDIT</button>
            
              		</tbody>
              		</table>

              	<div id="edit" class="modal">
           			<div class = "label"><font color = "teal" size = "+3" back >&nbsp Measurement Category </font> </div>
           			<div class="modal-content">   

                <div class="input-field">
                  <select>
                    <option value="" disabled selected>Category</option>
                    <option value="1">Uniform</option>
                    <option value="2">Gowns</option>
                  </select>
                  <label>Category</label>
                </div>     
    

                  <div class="input-field">
                  <select>
                    <option value="" disabled selected>Garment Name</option>
                    <option value="1">Blouse</option>
                    <option value="2">Pants</option>
                  </select>
                  <label>Garment Name</label>
                </div>    
  

                  <div class="input-field">
                  <select>
                    <option value="" disabled selected>Measurement Name</option>
                    <option value="1">Measurement 1</option>
                    <option value="2">Measurement 2</option>
                  </select>
                  <label>Measurement Name</label>
                </div>    

           			<div class="modal-footer">
         		   		<a href="#!" class=" modal-action modal-close waves-effect waves-green btn">Cancel</a>
           				 <a href="#!" class=" modal-action modal-close waves-effect waves-green btn">Save</a>	
           			</div>

    			</div>

    		
    			</div>
    		</div>

    			<div id="add" class="modal">
           			<div class = "label"><font color = "teal" size = "+3" back >&nbsp Measurement Category </font> </div>
                <div class="modal-content">   

                <div class="input-field">
                  <select>
                    <option value="" disabled selected>Category</option>
                    <option value="1">Uniform</option>
                    <option value="2">Gowns</option>
                  </select>
                  <label>Category</label>
                </div>     
    

                  <div class="input-field">
                  <select>
                    <option value="" disabled selected>Garment Name</option>
                    <option value="1">Blouse</option>
                    <option value="2">Pants</option>
                  </select>
                  <label>Garment Name</label>
                </div>    
  

                  <div class="input-field">
                  <select>
                    <option value="" disabled selected>Measurement Name</option>
                    <option value="1">Measurement 1</option>
                    <option value="2">Measurement 2</option>
                  </select>
                  <label>Measurement Name</label>
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