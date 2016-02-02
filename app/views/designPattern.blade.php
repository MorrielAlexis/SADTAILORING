@extends('layouts.master')

@section('content')
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
                    <td>Garment Name</td>
              			<td>Pattern Name</td>
                    <td>imagelink</td>
              			<td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit">EDIT</button>
              			


              		</tbody>
              		</table>

              		<div id="edit" class="modal">
           			<div class = "label"><font color = "teal" size = "+3" back >&nbsp Design Pattern
                 </font> </div>
           			<div class="modal-content">
           			<div class="input-field">
                  <select>
                    <option value="" disabled selected>Type Name</option>
                    <option value="1">Garment 1</option>
                    <option value="2">Garment 2</option>
                  </select>
                  <label>Garment Name:</label>
                </div>      
                <div class="input-field">
                 <input id="PatternName" type="text" class="validate">
                 <label for="pattern_name">Patterm Name: </label>
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
                <div class = "label"><font color = "teal" size = "+3" back >&nbsp Design Pattern
                 </font> </div>
                <div class="modal-content">
                <div class="input-field">
                  <select>
                    <option value="" disabled selected>Type Name</option>
                    <option value="1">Garment 1</option>
                    <option value="2">Garment 2</option>
                  </select>
                  <label>Garment Name:</label>
                </div>      
                <div class="input-field">
                 <input id="PatternName" type="text" class="validate">
                 <label for="pattern_name">Patterm Name: </label>
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
