 @section('content')

    <div class="main-wrapper">
      <div class="row">
        <div class="col s12 m12 l12">
        <span class="page-title"><h4>Measurement Information</h4></span>
        </div>
      </div>

      <div class="row">
        <div class="col s12 m12 l6">
          <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#addMeasurementInfo"> ADD MEASUREMENT INFO </button>
        </div>
      </div>
    </div>

    <div class="row">
    	<div class="col s12 m12 l12">
    		<div class="card-panel">
   				<div class="divider"></div>
    			 <div class="card-content">

     				<table class = "centered" align = "center" border = "1">
       				<thead>
          			<tr>
                  <th data-field = "id"> Measurement ID </th>
              		<th data-field="category">Measurement Name</th>
             		  <th data-field="MeasurementName">Segment Name</th>
              		<th data-field="MeasurementName">Sleeve</th>
              	</tr>
              </thead>
              <tbody>
              	<td>001</td>
              	<td>Uniform</td>
              	<td>Blouse</td>
                <td>Measurement Name</td>
              	<td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#editMeasurementInfo">EDIT</button>
              		
                  <div id="editMeasurementInfo" class="modal modal-fixed-footer">
                    <font color = "teal"><center><h5> Edit Measurement Info </h5></center></font> 
                    <div class="modal-content"> 
                      <p>

                      <div class="input-field">
                        <input value="editMeasurementID "id="editMeasurementID" name="editMeasurementID" type="text" class="validate" readonly>
                        <label for="measurement_id">Measurement ID: </label>
                      </div>

                      <div class="input-field">
                        <select>
                          <option value="" disabled selected> Select A Measurement Category:</option>
                          <option value="1">Uniform</option>
                          <option value="2">Gowns</option>
                        </select>
                        <label> Measurement Category </label>
                      </div>     
    

                      <div class="input-field">
                        <select>
                          <option value="" disabled selected> Selec a Segment </option>
                          <option value="1">Blouse</option>
                          <option value="2">Pants</option>
                        </select>
                        <label>Segment Name</label>
                      </div>    
  

                      <div class="input-field">
                        <select>
                          <option value="" disabled selected> Select Measurement Name </option>
                          <option value="1">Bust</option>
                          <option value="2">Sleeve</option>
                        </select>
                        <label>Measurement Name</label>
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

    			         <div id="addMeasurementInfo" class="modal modal-fixed-footer">
           			      <font color = "teal"> <center><h5>Add Measurement Information </h5></center></font> 
                      <div class="modal-content">
                        <p>

                        <div class="input-field">
                          <input value="addMeasurementID "id="addMeasurementID" name="addMeasurementID" type="text" class="validate" readonly>
                          <label for="measurement_id">Measurement ID: </label>
                        </div>
   
                        <div class="input-field">
                          <select>
                            <option value="" disabled selected> Select a Measurement Category</option>
                            <option value="1">Uniform</option>
                            <option value="2">Gowns</option>
                          </select>
                          <label> Measurement Category</label>
                        </div> 

                        <div class="input-field">
                          <select>
                            <option value="" disabled selected> Select a Segment </option>
                            <option value="1">Blouse</option>
                            <option value="2">Pants</option>
                          </select>
                          <label>Segment Name</label>
                        </div>    
  
                        <div class="input-field">
                          <select>
                            <option value="" disabled selected> Select a Measurement Name</option>
                            <option value="1">Sleever</option>
                            <option value="2">Collar</option>
                          </select>
                          <label>Measurement Name</label>
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