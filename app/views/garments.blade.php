@extends('layouts.master')

@section('content')
  <div class="main-wrapper">
    <div class="row">
      <div class="col s12 m12 l12">
      <span class="page-title"><h4>Garments</h4></span>
    </div>

    <div class="row">
    <div class="col s12 m12 l6">
       <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#addGCategory">ADD GARMENT CATEGORY</button>
     </div>
   </div>
  </div>

    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
            <span class="card-title"><h5><center>Garments(Category)</center></h5></span>
          <div class="divider"></div>
          <div class="card-content">

            <table class = "centered" align = "center" border = "1">
              <thead>
                  <tr>
                    <th data-field="id">Garment ID</th>
                    <th data-field="garmentName">Garment Name</th>
                    <th data-field="garmentDescription">Garment Description</th>
                  </tr>
              </thead>

              <tbody>
                    <td>id</td>
                    <td>Uniform</td>
                    <td>Daily use. For office.</td>
                    <td>
                    <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#editGCategory">EDIT</button>
          
               
                <!-- Modal Structure for Edit Garment Category> -->
                <div id="editGCategory" class="modal modal-fixed-footer">
                  <div class="modal-content">
                  <font color = "teal"><h5><center>Edit Garment Category </center></h5>
                 </font>
                 <p> 
                    <!-- <form action="/editGCategory" method="POST"> -->
                      <div class="input-field">
                            <label for="garment_id">Garment ID: </label>
                            <input value="GarmentID "id="GarmentID" name="GarmentID" type="text" class="validate" readonly>
                      </div>

                      <div class="input-field">
                         <input value="GarmentName" id="GarmentName" name="GarmentName"type="text" class="validate">
                         <label for="garment_name">Garment Name: </label>
                      </div>

                      <div class="input-field">
                         <input id="GarmentDescription" id="GarmentDescription" name="GarmentDescription" type="text" class="validate">
                         <label for="garment_description">Garment Desription: </label>
                      </div>
                    </p>
                  </div>

                <div class="modal-footer">
                  <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">UPDATE</a>
                   <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a> 
                </div>
              </form>
            </td>
          </tr>
          
        </tbody>
      </table>
        
         
         <!--    <Modal for Add Garment Category> -->
          <div id="addGCategory" class="modal modal-fixed-footer">
            <div class="modal-content">
                <font color = "teal"><h5><center> Add A Garment Category </h5></center></font> 
                <p>
                  <!-- <form action="/addGCategory" method="POST"> -->

                      <div class="input-field">
                            <label for="garment_id">Garment ID: </label>
                            <input value="GarmentID "id="GarmentID" name="GarmentID" type="text" class="validate" readonly>
                      </div>

                      <div class="input-field">
                             <input value="GarmentName" id="GarmentName" name="GarmentName" type="text" class="validate">
                             <label for="garment_name">Garment Name: </label>
                      </div>

                      <div class="input-field">
                             <input value="GarmentDescription" id="GarmentDescription" name="GarmentDescription" type="text" class="validate">
                             <label for="garment_description">Garment Desription: </label>
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
    $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'left' // Displays dropdown with edge aligned to the left of button
      }
      );
    </script>

    <script>
      $(document).ready(function(){
      $('select').material_select();
      });
    </script>



@stop