@extends('layouts.master')

@section('content')

  <div class="main-wrapper">
    <!--Add Catalogue-->
    @if (Input::get('success') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added catalogue design!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif

    @if (Input::get('success') == 'duplicate')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel red">
              <span class="black-text" style="color:black">Duplicate catalogue design!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif


    <!--Edit Catalogue-->
    @if (Input::get('successEdit') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully edited catalogue design!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif

    <!--Delete Catalogue-->
    @if (Input::get('successDel') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully deleted catalogue design!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif

      <!--Reactivate Catalogue-->
      @if (Input::get('successRec') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added back catalogue design!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif

    
    <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Catalogue</h4></span>
      </div>
    </div>

    <div class="row">
      <div class="col s12 m12 l12">
        <button style="color:black; margin-right:35px; margin-left: 20px" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to add a new catalogue design to the table" href="#addCatalogue">ADD DESIGN</button>
        <button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to view deleted catalogue designs from the table" href="#modal1">VIEW INACTIVE CATALOGUE DESIGNS</button>
      </div>
    </div>
  </div>

<!-- MODAL: VIEW ALL DESIGN IN CATALOGUE-->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h5><font color = "#1b5e20"><center>Inactive Catalogue Designs</center> </font> </h5>
        <table class="centered" border="1">

          <thead>
            <tr>
              <!--<th data-field= "Catalogue ID">Catalogue ID</th>-->
              <th data-field="Catalogue Category">Catalogue Category</th>
              <th data-field="Catalogue Name">Catalogue Name</th>
              <th data-field="Description">Description</th>
              <th data-field="Image">Image</th>
              <th data-field="Image">Reason for Inactivation</th>
            </tr>
          </thead>
          <tbody>
            @foreach($catalogue2 as $catalogue2)
            @if($catalogue2->boolIsActive == 0)
              <tr>
                <!--<td>{{ $catalogue2->strCatalogueID }}</td>-->
                <td>{{ $catalogue2->strGarmentCategoryName }}</td>
                <td>{{ $catalogue2->strCatalogueName }}</td>
                <td>{{ $catalogue2->strCatalogueDesc }}</td>
                <td><img class="materialboxed" width="100%" height="100%" src="{{URL::asset($catalogue2->strCatalogueImage)}}"></td>
                <td>{{ $catalogue2->strInactiveReason }}</td>
                <td>
                  <form action="{{URL::to('reactCatalogueDesign')}}" method="POST">
                    <input type="hidden" value="{{ $catalogue2->strCatalogueID }}" id="reactID" name="reactID">
                    <input type="hidden" value="{{ $catalogue2->strCatalogueID }}" id="reactInactiveCatalogueID" name="reactInactiveCatalogueID" >
                    <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to return data of customer to the table">REACTIVATE</button>
                  </form>
                </td>
              </tr>
              @endif
              @endforeach
          </tbody>
        </table>
      </div>

       <!--MODAL FOOTER -->
        <div class="modal-footer">
          <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">CLOSE</a>
        </div>  
  </div>



  <div class="row">
    <div class="col s12 m12 l12">
    	<div class="card-panel">
        <span class="card-title"><h5 style="color:#1b5e20"><center>Catalogue Details</center></h5></span>
        <div class="divider"></div>
              
        <div class="card-content">

          <div class="col s12 m12 l12 overflow-x">
    
      		<table class = "table centered data-catalogue" align = "center" border = "1">
            <thead>
          		<tr>
                <!--<th data-field= "Catalogue ID">Catalogue ID</th>-->
                <th data-field="Catalogue Category">Catalogue Category</th>
             		<th data-field="Catalogue Name">Catalogue Name</th>
                <th data-field="Description">Description</th>
                <th data-field="Image">Image</th>
                <th data-field="Edit">Action</th>
                 <th data-field="Edit">Action</th>
              </tr>
            </thead>

            <tbody>
              @foreach($catalogue as $catalogue)
              @if($catalogue->boolIsActive == 1)
              <tr>
                <!--<td>{{ $catalogue->strCatalogueID }}</td>-->
                <td>{{ $catalogue->strGarmentCategoryName }}</td>
              	<td>{{ $catalogue->strCatalogueName }}</td>
              	<td>{{ $catalogue->strCatalogueDesc }}</td>
                <td><img class="materialboxed" width="100%" height="100%" src="{{URL::asset($catalogue->strCatalogueImage)}}"></td>
              	<td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit catalogue design detail" href="#edit{{$catalogue->strCatalogueID}}">EDIT</button></td>
                <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of catalogue design from the table" href="#del{{$catalogue->strCatalogueID}}">DELETE</button>

                  <div id="edit{{$catalogue->strCatalogueID}}" class="modal modal-fixed-footer">
                    <h5><font color = "#1b5e20"><center>Edit Catalogue Design</center> </font> </h5>
                    <div class="modal-content">
                      <p>
                      <form action="{{URL::to('editCatalogueDesign')}}" method="POST" enctype="multipart/form-data">
                      <div class="input-field">

                        <input value="{{$catalogue->strCatalogueID}}" id="editCatalogueID" name="editCatalogueID" type="text" class="" readonly>

                      </div>

                      <div class="input-field">
                        <select id="editCategory" name="editCategory"> 
                            @foreach($category as $id=>$name)
                              @if($catalogue->strCatalogueCategory == $id)
                                <option value="{{$id}}" selected>{{$name}}</option>
                              @else
                                <option value="{{$id}}">{{$name}}</option>
                              @endif
                            @endforeach
                        </select>
                        <label>Category</label>
                      </div>      


                      <div class="input-field">
                        <input required value="{{$catalogue->strCatalogueName}}" id="editCatalogueName" name = "editCatalogueName" type="text" class="validateCatalogueName">
                        <label for="Catalogue_Name"> *Catalogue Name </label>
                      </div>

                      <div class="input-field">
                        <input  required value="{{$catalogue->strCatalogueDesc}}" id="editCatalogueDesc" name = "editCatalogueDesc" type="text" class="validateCatalogueDesc">
                        <label for="Category_Desc">*Catalogue Description </label>
                      </div>

                      <div class="file-field input-field">
                        <div style="color:black" class="btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
                          <span>Upload Image</span>
                          <input id="editImg" name="editImg" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                        </div>

                        <div class="file-path-wrapper">
                          <input value="{{$catalogue->strCatalogueImage}}" id="editImage" name="editImage" class="file-path validate" type="text">
                        </div>
                      </div>

                      </p>
                      <br><br>
                    </div>

                  
                    <div class="modal-footer">
                      <button type="submit" class="waves-effect waves-green btn-flat">Update</button>
                      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>  
                    </div>
                  </form>
                </div>

            <!-- DELETE DESIGN IN CATALOGUE -->
            <div id="del{{ $catalogue->strCatalogueID }}" class="modal modal-fixed-footer">
              <h5><font color = "#1b5e20"><center>Are you sure you want to delete?</center> </font> </h5>
                 <div class="modal-content">
                  <p>
                    <form action="{{URL::to('delCatalogueDesign')}}" method="POST">
                      <div class="input-field">
                        <input value="{{$catalogue->strCatalogueID}}" id="delCatalogueID" name="delCatalogueID" type="hidden">
 
                      </div>

                      <div class="input-field">
                        <input value="{{ $catalogue->strGarmentCategoryName }}" type="text" class="validate" readonly>
                        <label for="catalogue_name"> Catalogue Category: </label>
                      </div>

                      <div class="input-field">
                        <input value="{{ $catalogue->strCatalogueName }}" type="text" class="validate" readonly>
                        <label for="catalogue_name"> Catalogue Name: </label>
                      </div>

                      <div class="input-field">
                        <input value="{{ $catalogue->strCatalogueDesc }}" type="text" class="validate" readonly>
                        <label for="catalogue_name"> Catalogue Description: </label>
                      </div>
                      
                      <div class="input-field">
                        <input value="{{ $catalogue->strCatalogueID }}" id="delInactiveCatalogueID" name="delInactiveCatalogueID" type="hidden">
                      </div>

                      <div class="input-field">
                        <input value="{{ $catalogue->strInactiveReason }}" id="delInactiveReason" name="delInactiveReason" type="text" class="validate" required>
                        <label for="catalogue_name"> *Reason for Inactivation: </label>
                      </div>
                    </p>
                    </div>

                      <div class="modal-footer">
                        <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
                          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a> 
                      </div>
                    </form>                 
                 </div>
                 </td>
            </tr>
            @endif
            @endforeach 
          </tbody>
        </table>  
      </div>  
           

          <div class = "clearfix">

          </div>

             <!-- ADD DESIGN IN CATALOGUE -->
          <div id="addCatalogue" class="modal modal-fixed-footer">
            <h5><font color = "#1b5e20"><center>Add Catalogue Design</center> </font> </h5> 
            <div class="modal-content">
              <p>
              <form action='{{URL::to('addCatalogueDesign')}}' method="POST" enctype="multipart/form-data">
              <div class="input-field">
                <input value="{{$newID}}" id="addCatalogueID" name="addCatalogueID" type="hidden">
 
              </div>

              <div class="input-field">
                <select id="addCategory" name="addCategory">
                    @foreach($category as $id=>$name)
                      <option value="{{$id}}">{{$name}}</option>
                    @endforeach   
                </select>
                <label>Category</label>
              </div>      

              <div class="input-field">
                <input required id="addCatalogueName" name = "addCatalogueName" type="text" class="validateCatalogueName">
                <label for="Catalogue_Name"> *Catalogue Name </label>
              </div>

              <div class="input-field">
                <input  id="addCatalogueDesc" name="addCatalogueDesc" type="text" class="validateCatalogueDesc">
                <label for="Category_Desc">*Category Description </label>
              </div>

              <div class="file-field input-field">
                  <div style="color:black" class="btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
                    <span>Upload Image</span>
                    <input id="addImg" name="addImg" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                  </div>
                
                  <div class="file-path-wrapper">
                    <input id="addImage" name="addImage" class="file-path validate" type="text" readonly="readonly">
                  </div>
                </div>

              </p>
              <br><br>
            </div> 
            
            <div class="modal-footer">                  
              <button type="submit" class=" waves-effect waves-green btn-flat">Add</button>  
              <button type="button" onclick="clearData()" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</button>                    
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
      function clearData(){
          document.getElementById('addCatalogueName').value = "";
          document.getElementById('addCatalogueDesc').value = "";
          document.getElementById('addImage').value = "";
      }
    </script>

     <script>
      $(document).ready(function(){
    $('.materialboxed').materialbox();
     });
    </script>

     <script>
      $(document).ready(function(){
      $('select').material_select();
      });
    </script>

    <script type="text/javascript">
      $('.validateCatalogueName').on('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z," "]+$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      //Kapag Number
      $('.validateCatalogueName').keyup(function() {
        var name = $(this).val();
        $(this).val(name.replace(/\d/, ''));
      });     

      $('.validateCatalogueName').blur('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z," "]+$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      }); 

      $('.validateCatalogueDesc').on('input', function() {
        var input=$(this);
        var is_desc=input.val();
        if(is_desc){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateCatalogueDesc').blur('input', function() {
        var input=$(this);
        var is_desc=input.val();
        if(is_desc){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

    </script>


           <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">

      $(document).ready(function() {

          $('.data-catalogue').DataTable();
          $('select').material_select();

          setTimeout(function () {
            $('#success-message').hide();
        }, 5000);

      } );
    </script>
@stop