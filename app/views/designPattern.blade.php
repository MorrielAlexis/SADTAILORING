@extends('layouts.master')


@section('content')
  <div class="main-wrapper">
    <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Design Pattern</h4></span>
      </div>
    </div>

    <div class="row">
      <div class="col s12 m12 l6">
          <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#addDesign">ADD DESIGN PATTERN</button>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col s12 m12 l12">
    	<div class="card-panel">
   		    <span class="card-title"><h5><center>Design Pattern Details</center></h5></span>
   			<div class="divider"></div>

    		<div class="card-content"> 
      				<table class = "centered" align = "center" border = "1">
       				 <thead>
          				<tr>
                    <th data-field= "Catalog ID">Design Pattern ID</th>
              			<th data-field="Garment Name">Segment Name </th>
             		  	<th data-field="Pattern Name">Pattern Name</th>
              			<th data-field="Pattern Image">Pattern Image</th>
              		</tr>
                </thead>

                <tbody>
              		<td>001</td>
                  <td>Skirt</td>
              		<td>Pencil Cut</td>
                  <td>imagelink</td>
              		<td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#editDesign">EDIT</button>
              	     <div id="editDesign" class="modal modal-fixed-footer">
                      <font color = "teal"><center><h5> Edit Design Pattern Details</h5></center></font>
                      <div class="modal-content">
                      <p>

                      <div class="input-field">
                        <input value= "editPatternID" id="editPatternID" name= "editPatternID" type="text" readonly= "readonly" class="validate">
                        <label for="pattern_id">Pattern ID: </label>
                     </div>

                      <div class="input-field">
                        <select>
                          <option value="" disabled selected>Choose a segment:</option>
                          <option value="1">Skirt</option>
                          <option value="2">Coat</option>
                        </select>
                        <label>Segment Name:</label>
                      </div>   

                      <div class="input-field">
                        <input value = "editPatternName" id="editPatternName" name= "editPatternName" type="text" class="validate">
                        <label for="pattern_name">Pattern Name: </label>
                      </div>

                      <div class="file-field input-field">
                        <div class="btn">
                          <span>Upload Image</span>
                          <input type="file">
                        </div>
                        <div class="file-path-wrapper">
                          <input class="file-path validate" type="text">
                        </div>
                      </p>
                    </div>
                  
 
                    <div class="modal-footer">
                      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">UPDATE</a>
                      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a> 
                    </div>
                  </td>
                </tbody>
              </table>
           
    			         <div id="addDesign" class="modal modal-fixed-footer">
                    <font color = "teal" ><center><h5> Add Design Pattern </h5></center>
                    </font> 
                    <div class="modal-content">
                      <p>

                      <div class="input-field">
                        <input value = "addPatternID" id="addPatternID" name= "addPatternID" type="text" readonly= "readonly" class="validate">
                        <label for="pattern_id">Pattern ID: </label>
                      </div>

                      <div class="input-field">
                        <select>
                        <option value="" disabled selected>Choose a segment:</option>
                        <option value="1">Skirt</option>
                        <option value="2">Coat</option>
                        </select>
                        <label>Segment Name:</label>
                      </div>   

                      <div class="input-field">
                        <input id="addPatternName" name= "addPatternName" type="text" class="validate">
                        <label for="pattern_name">Pattern Name: </label>
                      </div>

                      <div class="file-field input-field">
                        <div class="btn">
                          <span>Upload Image</span>
                          <input type="file">
                        </div>
                        <div class="file-path-wrapper">
                          <input class="file-path validate" type="text">
                        </div>

                      </p>
    	             </div>


                    <div class="modal-footer">
                      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">UPDATE</a>
                      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a> 
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
