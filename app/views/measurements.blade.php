@extends('layouts.master')

@section('content')


  <p><h4 style="lightpink">Measurements</h4></p>
  <div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"><a href="#test1">Category</a></li>
        <li class="tab col s3"><a href="#test2">Details</a></li>
      </ul>
    </div>
  
  <div id="test1" class="hue col s12">

  <div class="main-wrapper">
    <div class="row">
      

      <div class="row">
        <div class="col s12 m12 l6">
           <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#addMeasurementInfo"> ADD MEASUREMENT INFO </button>
         </div>
      </div>
     </div>

    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
            <span class="card-title"><h5><center>Measurement Information</center></h5></span>
          <div class="divider"></div>
          <div class="card-content">

    
              <table class = "centered" align = "center" border = "1">
              <thead>
                  <tr>
                    <th data-field = "id"> Measurement ID </th>
                    <th data-field="category">Garment Name</th>
                    <th data-field="GarmentName">Segment Name</th>
                    <th data-field="MeasurementName">Measurement Name</th>
                    </tr>
                  </thead>
                  <tbody>
                    <td>001</td>
                    <td>Uniform</td>
                    <td>Blouse</td>
                    <td>Measurement Name</td>
                    <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#editMeasurementInfo">EDIT</button>
                  </tbody>
                  </table>
                <p>
                  <div id="editMeasurementInfo" class="modal modal-fixed-footer">
                  <font color = "teal"><center><h5> Edit Measurement Info </h5></center></font> 
                  <div class="modal-content">   

                  <div class="input-field">
                    <select>
                      <option value="" disabled selected> Select A Garment Category:</option>
                      <option value="1">Uniform</option>
                      <option value="2">Gowns</option>
                    </select>
                    <label> Garment Category </label>
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

          </div>

        
          </div>
        </div>
          <p>
          <div id="addMeasurementInfo" class="modal modal-fixed-footer">
                <div class = "label"><font color = "teal" size = "+3" back > Add Measurement Info </font> </div>
                <div class="modal-content">   

                <div class="input-field">
                  <select>
                    <option value="" disabled selected> Select a Garment Category</option>
                    <option value="1">Uniform</option>
                    <option value="2">Gowns</option>
                  </select>
                  <label> Garment Category</label>
                </div>     
    

                  <div class="input-field">
                  <select>
                    <option value="" disabled selected> Select a Segment Name</option>
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

    </div>
    <div id="test2" class="hue col s12">
      

    </div>
  </div>

@stop

@section('scripts')
    <script>
     $(document).ready(function)({
	     	$('ul.tabs').tabs();
  			});
    </script>
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

	