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
      </div>
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
            </thead

            <tbody>
              @foreach($catalogue as $catalogue)
              <tr>
                <td>{{ $catalogue->strCatalogueID }}</td>
                <td>{{ $catalogue->strGarmentCategoryName }}</td>
              	<td>{{ $catalogue->strCatalogueName }}</td>
              	<td>{{ $catalogue->strCatalogueDesc }}</td>
                <td>Click here to view image </td>
              	<td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit{{$catalogue->strCatalogueID}}">EDIT</button>
                        
                  <div id="edit{{$catalogue->strCatalogueID}}" class="modal modal-fixed-footer">
                    <font color = "teal" ><center><h5>Edit Catalogue Details</h5></center></font> 
                    <div class="modal-content">
                      <p>
                      <form action="/editCatalogue" method="POST">
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
                        <input value="{{$catalogue->strCatalogueName}}" id="editCatalogueName" name = "editCatalogueName" type="text" class="validate">
                        <label for="Catalogue_Name"> Catalogue Name </label>
                      </div>

                      <div class="input-field">
                        <input value="{{$catalogue->strCatalogueDesc}}" id="editCatalogueDesc" name = "editCatalogueDesc" type="text" class="validate">
                        <label for="Category_Desc">Category Description </label>
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
                  </div>
                </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

          </div>

          <div class = "clearfix">

          </div>

          <div id="addCatalogue" class="modal modal-fixed-footer">
            <font color = "teal"><h5><center>Add Catalogue </center></h5></font> 
            <div class="modal-content">
              <p>
              <form action='/addCatalogue' method="POST">
              <div class="input-field">
                <input value="{{$newID}}" id="addCatalogueID" name="addCatalogueID" type="text" class="validate" readonly>
                <label for="Catalogue_id">Catalogue ID: </label>
              </div>

              <div class="input-field">
                <select id="addCategory" name="addCategory">
                  <option disabled selected>Pick a category</option>
                    @foreach($category as $id=>$name)
                      <option value="{{$id}}">{{$name}}</option>
                    @endforeach   
                </select>
              </div>      

              <div class="input-field">
                <input id="addCatalogueName" name = "addCatalogueName" type="text" class="validate" required>
                <label for="Catalogue_Name"> Catalogue Name </label>
              </div>

              <div class="input-field">
                <input id="addCatalogueDesc" name="addCatalogueDesc" type="text" class="validate">
                <label for="Category_Desc">Category Description </label>
              </div>

              <div class="file-field input-field">
                <div class="btn">
                  <span>Upload Image</span>
                  <input type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                </div>

                <div class="file-path-wrapper">
                  <input id="path" name="path" class="file-path validate" type="text">
                </div>
              </div>

              </p>
              <br><br>
            </div> 
            
            <div class="modal-footer">                  
              <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">ADD</button>
              <a href="#!" class=" modal-action  waves-effect waves-green btn-flat">CANCEL</a>                    
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
      $(document).ready(function(){
      // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
      $('.modal-trigger').leanModal({
          dismissible: false
        });
      });
    </script>

     <script>
      $(document).ready(function(){
      $('select').material_select();
      });
    </script>

@stop