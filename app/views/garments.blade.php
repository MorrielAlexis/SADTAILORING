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

            <div class = "col s12 m12 l12 overflow-x">

            <table class = "centered" align = "center" border = "1">
              <thead>
                  <tr>
                    <th data-field="id">Garment ID</th>
                    <th data-field="garmentName">Garment Name</th>
                    <th data-field="garmentDescription">Garment Description</th>
                  </tr>
              </thead>

              <tbody>
                @foreach($category as $category)
                  <tr>
                    <td>{{ $category->strGarmentCategoryID }}</td>
                    <td>{{ $category->strGarmentCategoryName }}</td>
                    <td>{{ $category->strGarmentCategoryDesc }}</td>
                    <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#{{ $category->strGarmentCategoryID }}">EDIT</button>
              
                      <!-- Modal Structure for Edit Garment Category> -->
                      <div id="{{ $category->strGarmentCategoryID }}" class="modal modal-fixed-footer">
                        <font color = "teal"><h5><center>Edit Garment Category </center></h5></font>
                        <form action="/editGarmentCategory" method="POST">
                          <div class="modal-content">
                            <p> 
                            
                              <div class="input-field">
                                <input value="{{ $category->strGarmentCategoryID }}" id="editGarmentID" name="editGarmentID" type="text" class="validate" readonly>
                                <label for="garment_id">Garment ID: </label>
                              </div>

                              <div class="input-field">
                                <input required value="{{ $category->strGarmentCategoryName }}" id="editGarmentName" name="editGarmentName"type="text" class="validate">
                                <label for="garment_name">Garment Name: </label>
                              </div>

                              <div class="input-field">
                                <input required value= "{{ $category->strGarmentCategoryDesc }}" id="editGarmentDescription" name="editGarmentDescription" name="GarmentDescription" type="text" class="validate">
                                <label for="garment_description">Garment Desription: </label>
                              </div>
                            </p>
                          </div>

                          <div class="modal-footer">
                            <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">UPDATE</button>
                            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a> 
                          </div>
                        </form>
                      </div>
                   </td>
                  </tr>
                @endforeach
              </tbody>
            </table>

            </div>

            <div class = "clearfix">

            </div>
             
         <!--    <Modal for Add Garment Category> -->
            <div id="addGCategory" class="modal modal-fixed-footer">
              <font color = "teal"><h5><center> Add A Garment Category </center></h5></font>
              <form action="/addGarmentCategory" method="POST" id="addGarmentCategory" name="addGarmentCategory"> 

                <div class="modal-content">

                  <p>               
                    <div class="input-field">
                      <input value="{{$newID}}" id="addGarmentID" name="addGarmentID" type="text" class="validate" readonly>
                      <label for="garment_id">Garment ID: </label>
                    </div>

                    <div class="input-field">
                      <input required id="addGarmentName" name="addGarmentName" type="text" class="validate">
                      <label for="garment_name">Garment Name: </label>
                    </div>

                    <div class="input-field">
                      <input id="addGarmentDesc" name="addGarmentDesc" type="text" class="validate">
                      <label for="garment_description">Garment Desription: </label>
                    </div>
                  </p>
                </div>

                <div class="modal-footer">
                  <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">ADD</button>
                  <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a> 
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
@stop

@section('scripts')
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