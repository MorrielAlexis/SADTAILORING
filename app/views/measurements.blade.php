@extends('layouts.master')

@section('content')


  <p><h4 style="lightpink">Measurements</h4></p>
  <div class="row">
    
    <!--Measurement Tabs-->
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"><a style="color:teal" href="#tabCategory"><b>Category</b></a></li>
        <li class="tab col s3"><a style="color:teal" href="#tabDetails"><b>Details</b></a></li>
      </ul>
    </div>
    
    <!--Tab Contents-->
    <!--Measurement Category-->
    <div id="tabCategory" class="hue col s12">

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
          <span class="card-title"><h5><center>Measurement Category</center></h5></span>
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
                <tr>
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
                    </div>
                  </td>
                </tr>
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
        </div>
       </div> 
      </div>  
    </div>

  
    </div>
    <!--END OF MEASUREMENT CATEGORY-->

    <div id="tabDetails" class="hue col s12">

    <div class="main-wrapper">
      <div class="row">
        <div class="col s12 m12 l12">
        <span class="page-title"><h4>Measurement Parts</h4></span>
        </div>
      </div>

      <div class="row">
        <div class="col s12 m12 l6">
          <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#addMeasurementPart">ADD NEW PART</button>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
          <span class="card-title"><h5><center>Measurement Parts</center></h5></span>
          <div class="divider"></div>
          <div class="card-content">

            <table class = "centered" align = "center" border = "1">
              <thead>
                <tr>
                  <th data-field="id">Measurement ID</th>
                  <th data-field="name">Measurement Name</th>
                  <th data-field="description">Measurement Description</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>ID</td>
                  <td>Measurement Name</td>
                  <td>Measurement Description</td>
                  <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#editMeasurementPart">EDIT</button>
                       
                    <div id="editMeasurementPart" class="modal modal-fixed-footer">
                      <font color = "teal"><center><h5> Edit Measurement Part</h5></center></font> 
                      <div class="modal-content">
                        <p>

                        <div class="input-field">
                          <input value="editMeasurementPartID "id="editMeasurementPartID" name="editMeasurementPartID" type="text" class="validate" readonly>
                          <label for="measurement_id">Measurement ID: </label>
                        </div>

                        <div class="input-field">
                          <input id="editMeasurementName" value = "editMeasurementName" name = "editMeasurementName" type="text" class="validate">
                          <label for="measurement_name"> Measurement Name: </label>
                        </div>

                        <div class="input-field">
                          <input id="editMeasurementDesc" value = "editMeasurementDesc" name = "editMeasurementDesc" type="text" class="validate">
                          <label for="measurement_desc">Measurement Description: </label>
                        </div>
                        </p>
                      </div>

                      <div class="modal-footer">
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">UPDATE</a>
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a>  
                      </div>
                    </div>

                  </td>
                </tr>
              </tbody>
            </table>
          
            <div id="addMeasurementPart" class="modal modal-fixed-footer">
              <font color = "teal"><h5><center> Add New Measurement Part </center></h5></font> 
              <div class="modal-content">
                <p>

                <div class="input-field">
                  <input value="addMeasurementPartID "id="addMeasurementPartID" name="addMeasurementPartID" type="text" class="validate" readonly>
                  <label for="measurement_id">Measurement ID: </label>
                </div>

                <div class="input-field">
                  <input id="addMeasurementName" name= "addMeasurementName" type="text" class="validate">
                  <label for="measurement_name"> Measurement Name: </label>
                </div>

                <div class="input-field">
                  <input id="addMeasurementDesc" name ="addMeasurementDesc" type="text" class="validate">
                  <label for="measurement_desc">Measurement Description: </label>
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
      </div>
    </div>      
    </div>

  </div>

@stop

@section('scripts')
    <script>
     $(document).ready(function(){
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