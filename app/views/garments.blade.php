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
      <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#modal1">VIEW INACTIVE GARMENTS</button>
     </div>
   </div>
  </div>

  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>INACTIVE GARMENTS</h4>
      <table class = "centered" align = "center" border = "1">
        <thead>
          <tr>
            <!--<th data-field="id">Garment Details ID</th>-->
            <th data-field="name">Category Name</th>
            <th data-field="address">Category Description</th>
            <th>Reactivate</th>
          </tr>
        </thead>

        <tbody>
            @foreach($category2 as $category2)
            @if($category2->boolIsActive == 0)
            <tr>
              <!--<td>{{ $category2->strGarmentCategoryID }}</td>-->
              <td>{{ $category2->strGarmentCategoryName }}</td>
              <td>{{ $category2->strGarmentCategoryName }}</td>
              <td>{{ $category2->strGarmentCategoryDesc }}</td>
              <td>
                <form action="{{URL::to('reactGarmentCategory')}}" method="POST">
                  <input type="hidden" id="reactID" name="reactID" value="{{$category2->strGarmentCategoryID}}">
                  <button type="submit" class="waves-effect waves-light btn btn-small center-text">REACTIVATE</button>
                </form>
              </td>
            </tr>
            @endif
            @endforeach
        </tbody>
      </table>
    </div>
  
    <!--MODAL FOOTER-->
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">CLOSE</a>
    </div>
  </div>


    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
          <span class="card-title"><h5><center>Garments(Category)</center></h5></span>
          <div class="divider"></div>
          <div class="card-content">

            <div class = "col s12 m12 l12 overflow-x">

            <table class = "table centered data-garments" align = "center" border = "1">
              <thead>
                  <tr>
                    <!--<th data-field="id">Garment ID</th>-->
                    <th data-field="garmentName">Garment Name</th>
                    <th data-field="garmentDescription">Garment Description</th>
                    <th data-field="Edit">Edit</th>
                    <th>Delete</th>
                  </tr>
              </thead>

              <tbody>
                @foreach($category as $category)
                  @if($category->boolIsActive == 1)
                  <tr>
                    <!--<td>{{ $category->strGarmentCategoryID }}</td>-->
                    <td>{{ $category->strGarmentCategoryName }}</td>
                    <td>{{ $category->strGarmentCategoryDesc }}</td>
                    <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit{{ $category->strGarmentCategoryID }}">EDIT</button></td>
                    <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#del{{ $category->strGarmentCategoryID }}">DELETE</button></td>
              
                      <!-- Modal Structure for Edit Garment Category> -->
                      <div id="edit{{ $category->strGarmentCategoryID }}" class="modal modal-fixed-footer">
                        <font color = "teal"><h5><center>Edit Garment Category </center></h5></font>
                        <form action="{{URL::to('editGarmentCategory')}}" method="POST">
                          <div class="modal-content">
                            <p> 
                            
<<<<<<< HEAD
                              <div class="input-field">
                                <input value="{{ $category->strGarmentCategoryID }}" id="editGarmentID" name="editGarmentID" type="text" class="" readonly>
                                <label for="garment_id">Garment ID: </label>
=======
                             <div class="input-field">
                                <input value="{{ $category->strGarmentCategoryID }}" id="editGarmentID" name="editGarmentID" type="hidden">
>>>>>>> daa8166192366910383034471522dbb013250a5b
                              </div>

                              <div class="input-field">
                                <input required value="{{ $category->strGarmentCategoryName }}" id="editGarmentName" name="editGarmentName"type="text" class="validateGarmentName">
                                <label for="garment_name">*Garment Name: </label>
                              </div>

                              <div class="input-field">
                      
                               <input required value= "{{ $category->strGarmentCategoryDesc }}" id="editGarmentDescription" name="editGarmentDescription" name="GarmentDescription" type="text" class="validateGarmentDesc">

                                <label for="garment_description">*Garment Desription: </label>
                              </div>
                            </p>
                          </div>

                          <div class="modal-footer">
                            <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">UPDATE</button>
                            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a> 
                          </div>
                        </form>
                      </div>
                      <!--///////////////////////DELETE/////////////////////-->
                      <div id="del{{ $category->strGarmentCategoryID }}" class="modal modal-fixed-footer">
                        <font color = "teal"><h5><center>Are you sure you want to delete? </center></h5></font>
                        <form action="{{URL::to('delGarmentCategory')}}" method="POST">
                          <div class="modal-content">
                            <p> 
                            
                              <div class="input-field">
<<<<<<< HEAD
                                <input value="{{ $category->strGarmentCategoryID }}" id="delGarmentID" name="delGarmentID" type="text" class="" readonly>
                                <label for="garment_id">Garment ID: </label>
=======
                                <input value="{{ $category->strGarmentCategoryID }}" id="delGarmentID" name="delGarmentID" type="hidden">
>>>>>>> daa8166192366910383034471522dbb013250a5b
                              </div>

                              <div class="input-field">
                                <input required pattern="[A-Za-z\s]+" value="{{ $category->strGarmentCategoryName }}" type="text" class="" readonly>
                                <label for="garment_name">Garment Name: </label>
                              </div>

                              <div class="input-field">
                      
                               <input  value= "{{ $category->strGarmentCategoryDesc }}" type="text" class="" readonly>

                                <label for="garment_description">Garment Desription: </label>
                              </div>
                            </p>
                          </div>

                          <div class="modal-footer">
                            <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">OK</button>
                            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a> 
                          </div>
                        </form>
                      </div>
                  </tr>
                  @endif
                @endforeach
              </tbody>
            </table>

            </div>

            <div class = "clearfix">

            </div>
             
         <!--    <Modal for Add Garment Category> -->
            <div id="addGCategory" class="modal modal-fixed-footer">
              <font color = "teal"><h5><center> Add A Garment Category </center></h5></font>
              <form action="{{URL::to('addGarmentCategory')}}" method="POST" id="addGarmentCategory" name="addGarmentCategory"> 

                <div class="modal-content">

                  <p>               
                    <div class="input-field">
<<<<<<< HEAD
                      <input value="{{$newID}}" id="addGarmentID" name="addGarmentID" type="text" class="" readonly>
                      <label for="garment_id">Garment ID: </label>
=======
                      <input value="{{$newID}}" id="addGarmentID" name="addGarmentID" type="hidden">
>>>>>>> daa8166192366910383034471522dbb013250a5b
                    </div>

                    <div class="input-field">
                      <input required id="addGarmentName" name="addGarmentName" type="text" class="validateGarmentName">
                      <label for="garment_name">*Garment Name: </label>
                    </div>

                    <div class="input-field">
                      <input required id="addGarmentDesc" name="addGarmentDesc" type="text" class="validateGarmentDesc">
                      <label for="garment_description">*Garment Desription: </label>
                    </div>
                  </p>
                </div>

                <div class="modal-footer">
                  <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">ADD</button>
                  <vutton type="button" onclick="clearData()" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</button> 
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

    <script>
      function clearData(){
          document.getElementById("addGarmentDesc").value = "";
          document.getElementById("addGarmentName").value = "";
      }
    </script>

    <script type="text/javascript">
      $('.validateGarmentName').on('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z," "]+$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      //Kapag Number
      $('.validateGarmentName').keyup(function() {
        var name = $(this).val();
        $(this).val(name.replace(/\d/, ''));
      });     

      $('.validateGarmentName').blur('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z," "]+$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      }); 

      $('.validateGarmentDesc').on('input', function() {
        var input=$(this);
        var is_desc=input.val();
        if(is_desc){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateGarmentDesc').blur('input', function() {
        var input=$(this);
        var is_desc=input.val();
        if(is_desc){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      }); 
 

    </script>

             <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">

      $(document).ready(function() {

          $('.data-garments').DataTable();

      } );
    </script>
@stop