@extends('layouts.master')

@section('content')

  <div class="main-wrapper">
    <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Catalogue</h4></span>
      </div>
    </div>

    <div class="row">
      <div class="col s12 m12 l6">
        <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#addCatalogue">ADD DESIGN</button>
        <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#modal1">VIEW INACTIVE CATALOGUE DESIGNS</button>
      </div>
    </div>
  </div>

<!-- MODAL: VIEW ALL DESIGN IN CATALOGUE-->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>INACTIVE CATALOGUE DESIGNS</h4>
        <table class="centered" border="1">

          <thead>
            <tr>
              <th data-field= "Catalogue ID">Catalogue ID</th>
              <th data-field="Catalogue Category">Catalogue Category</th>
              <th data-field="Catalogue Name">Catalogue Name</th>
              <th data-field="Description">Description</th>
              <th data-field="Image">Image</th>
            </tr>
          </thead>
          <tbody>
            @foreach($catalogue2 as $catalogue2)
            @if($catalogue2->boolIsActive == 0)
              <tr>
                <td>{{ $catalogue2->strCatalogueID }}</td>
                <td>{{ $catalogue2->strCatalogueCategory }}</td>
                <td>{{ $catalogue2->strCatalogueName }}</td>
                <td>{{ $catalogue2->strCatalogueDesc }}</td>
                <td>Click here to view image</td>
                <td>
                  <form action="/reactCatalogueDesign" method="POST">
                    <input type="hidden" value="{{ $catalogue2->strCatalogueID }}" id="reactID" name="reactID">
                    <button type="submit" class="waves-effect waves-green btn btn-small center-text">REACTIVATE</button>
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
        <span class="card-title"><h5><center>Catalogue Details</center></h5></span>
        <div class="divider"></div>
              
        <div class="card-content">

          <div class="col s12 m12 l12 overflow-x">
    
      		<table class = "centered" align = "center" border = "1">
            <thead>
          		<tr>
                <th data-field= "Catalogue ID">Catalogue ID</th>
                <th data-field="Catalogue Category">Catalogue Category</th>
             		<th data-field="Catalogue Name">Catalogue Name</th>
                <th data-field="Description">Description</th>
                <th data-field="Image">Image</th>
              </tr>
            </thead>

            <tbody>
              @foreach($catalogue as $catalogue)
              @if($catalogue->boolIsActive == 1)
              <tr>
                <td>{{ $catalogue->strCatalogueID }}</td>
                <td>{{ $catalogue->strGarmentCategoryName }}</td>
              	<td>{{ $catalogue->strCatalogueName }}</td>
              	<td>{{ $catalogue->strCatalogueDesc }}</td>
                <td>Click here to view image </td>
              	<td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit{{$catalogue->strCatalogueID}}">EDIT</button></td>
                <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#del{{$catalogue->strCatalogueID}}">DELETE</button>

                  <div id="edit{{$catalogue->strCatalogueID}}" class="modal modal-fixed-footer">
                    <font color = "teal" ><center><h5>Edit Catalogue Details</h5></center></font> 
                    <div class="modal-content">
                      <p>
                      <form action="/editCatalogueDesign" method="POST">
                      <div class="input-field">
                        <input value="{{$catalogue->strCatalogueID}}" id="editCatalogueID" name="editCatalogueID" type="text" class="validate" readonly>
                      </div>

                      <div class="input-field">
                        <select id="editCategory" name="editCategory"> 
                          <option value="" disabled >Catalogue Category</option>
                            @foreach($category as $id=>$name)
                              @if($catalogue->strCatalogueCategory == $id)
                                <option value="{{$id}}" selected>{{$name}}</option>
                              @else
                                <option value="{{$id}}">{{$name}}</option>
                              @endif
                            @endforeach
                        </select>
                      </div>      


                      <div class="input-field">
                        <input required pattern="[A-Za-z\' ]+"value="{{$catalogue->strCatalogueName}}" id="editCatalogueName" name = "editCatalogueName" type="text" class="validate">
                        <label for="Catalogue_Name"> Catalogue Name </label>
                      </div>

                      <div class="input-field">
                        <input required pattern="[A-Za-z\' ]+" value="{{$catalogue->strCatalogueDesc}}" id="editCatalogueDesc" name = "editCatalogueDesc" type="text" class="validate">
                        <label for="Category_Desc">Catalogue Description </label>
                      </div>

                      <div class="file-field input-field">
                        <div class="btn">
                          <span>Upload Image</span>
                          <input type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                        </div>

                        <div class="file-path-wrapper">
                          <input class="file-path validate" type="text">
                        </div>
                      </div>

                      </p>
                      <br><br>
                    </div>

                  
                    <div class="modal-footer">
                      <button type="submit" class="modal-action  waves-effect waves-green btn btn-flat">UPDATE</button>
                      <a href="#!" class="modal-action  waves-effect waves-green btn btn-flat">CANCEL</a>  
                    </div>
                  </form>
                </div>



            <!-- DELETE DESIGN IN CATALOGUE -->
            <div id="del{{ $catalogue->strCatalogueID }}" class="modal modal-fixed-footer">
              <font color = "teal"><center><h5>Are you sure you want to delete?</h5></center></font>
                 <div class="modal-content">
                  <p>
                    <form action="/delCatalogueDesign" method="POST">
                      <div class="input-field">
                        <input value="{{$catalogue->strCatalogueID}}" id="delCatalogueID" name="delCatalogueID" text="text" readonly class="validate" >
                        <label for="catalogue_id">CATALOGUE ID: </label>
                      </div>

                      <div class="input-field">
                        <select name="editCategory">
                          <option disabled>Pick a Category</option>
                            @foreach($category as $id=>$name)
                              @if($catalogue->strCatalogueCategory == $id)
                              <option selected value="{{ $id }}" disabled>{{ $name }}</option>
                              @endif
                            @endforeach
                        </select>
                      </div>


                      <div class="input-field">
                        <input value="{{ $catalogue->strCatalogueName }}" type="text" class="validate" readonly>
                        <label for="catalogue_name"> CATALOGUE NAME: </label>
                      </div>
                    </div>
                      <div class="modal-footer">
                        <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">GO</button>
                        <a href="#!" class=" modal-action  waves-effect waves-green btn-flat">CANCEL</a> 
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



            <!-- ADD DESIGN IN CATALOGUE -->

          <div class = "clearfix">

          </div>

          <div id="addCatalogue" class="modal modal-fixed-footer">
            <font color = "teal"><h5><center>Add Catalogue </center></h5></font> 
            <div class="modal-content">
              <p>
              <form action='/addCatalogueDesign' method="POST">
              <div class="input-field">
                <input value="{{$newID}}" id="addCatalogueID" name="addCatalogueID" type="text" class="validate" readonly>
                <label for="Catalogue_id">Catalogue ID: </label>
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
                <input pattern="[A-Za-z\' ]+" id="addCatalogueName" name = "addCatalogueName" type="text" class="validate" required>
                <label for="Catalogue_Name"> Catalogue Name </label>
              </div>

              <div class="input-field">
                <input required pattern="[A-Za-z\' ]+" id="addCatalogueDesc" name="addCatalogueDesc" type="text" class="validate">
                <label for="Category_Desc">Category Description </label>
              </div>

              <div class="file-field input-field">
                <div class="btn">
                  <span>Upload Image</span>
                  <input type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                </div>

                <div class="file-path-wrapper">
                  <input id="addImage" name="addImage" class="file-path validate" type="text">
                </div>
              </div>

              </p>
              <br><br>
            </div> 
            
            <div class="modal-footer">                  
              <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">ADD</button>
              <button type="button" onclick="clearData()" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a>                    
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
      $('select').material_select();
      });
    </script>

@stop