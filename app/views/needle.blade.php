@extends('layouts.master')

@section('content')
	<div class="main-wrapper">
    <div class="row">
      <div class="col s12 m12 l12">
      <span class="page-title"><h4>Needle</h4></span>
      </div>

      <div class="row">
        <div class="col s12 m12 l6">
           <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#addNeedle">ADD Needle</button>
        </div>
      
    </div>



    <div class="row">
    	<div class="col s12 m12 l12">
    		<div class="card-panel">
   		    	<span class="card-title"><h5><center>Needle</center></h5></span>
   				<div class="divider"></div>
    			<div class="card-content">
    
      				<table class = "centered" align = "center" border = "1">
       				   <thead>
          				<tr>
                    <th date-field= "Needle ID">Needle ID</th>
             				<th data-field="Needle Name">Needle Name</th>
                    <th data-field="Needle Size">Needle Size</th>
                    <th data-field="Needle Color">Needle Color</th>
                    <th data-field="Needle">Needle</th>
              			<th data-field="Image">Image</th>
              		</tr>
                 </thead>

              		<tbody>
              			<td>001</td>
                    <td>Needle Name</td>
              			<td>Needle Size</td>
              			<td>Needle Color</td>
              			<td>Needle</td>
                    <td>image</td>
              			<td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#editNeedle">EDIT</button>
              		</tbody>
              </table>

              	<div id="editNeedle" class="modal modal-fixed-footer">
           				 <font color = "teal" ><center><h5>Edit Needle</h5></center>
                 	 </font> 

           			  <div class="modal-content">
                  
                			<div class="input-field">
                				<input id="NeedleName" type="text" class="validate">
                				<label for="Needle_Name"> Needle Name </label>
                			</div>

                			<div class="input-field">
                				<input id="NeedleSize" type="text" class="validate">
                				<label for="Needle_Size"> Needle Size </label>
                			</div>

                			<div class="input-field">
                				<input id="NeedleColor" type="text" class="validate">
                				<label for="Needle_Color"> Needle Color </label>
                			</div>


                			<div class="input-field">
                				<input id="Needle" type="text" class="validate">
                				<label for="Needle"> Needle </label>
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

                    <br>
                    <br> 

                  </div>       		   		
                  <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn btn-flat">UPDATE</a>
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn btn-flat">CANCEL</a>  
           			  </div>

    			       </div>
                

    			        <div id="addNeedle" class="modal modal-fixed-footer">
                    <font color = "teal"><h5><center>Add Needle </center></h5>
                    </font> 
                    <div class="modal-content">
                  
                      <div class="input-field">
                        <input id="NeedleName" type="text" class="validate">
                        <label for="Needle_Name"> Needle Name </label>
                      </div>

                      <div class="input-field">
                        <input id="NeedleSize" type="text" class="validate">
                        <label for="Needle_Size"> Needle Size </label>
                      </div>

                      <div class="input-field">
                        <input id="NeedleColor" type="text" class="validate">
                        <label for="Needle_Color"> Needle Color </label>
                      </div>


                      <div class="input-field">
                        <input id="Needle" type="text" class="validate">
                        <label for="Needle"> Needle </label>
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

                    <br>
                    <br> 

                  </div>                
                  <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn btn-flat">UPDATE</a>
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn btn-flat">CANCEL</a>  
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