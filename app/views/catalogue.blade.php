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
            </thead>

            <tbody>
              @foreach($catalogue as $catalogue)
              <tr>
                <td>{{ $catalogue->strCatalogueID }}</td>
                <td>{{ $catalogue->strGarmentCategoryName }}</td>
              	<td>{{ $catalogue->strCatalogueName }}</td>
              	<td>{{ $catalogue->txtCatalogueDesc }}</td>
                <td>Click here to view image </td>
              	<td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#editCatalogue">EDIT</button>
                        
                  <div id="editCatalogue" class="modal modal-fixed-footer">
                    <font color = "teal" ><center><h5>Edit Catalogue Details</h5></center></font> 
                    <div class="modal-content">
                      <p>

                      <div class="input-field">
                        <input value="editCatalogueID" id="editCatalogueID" name="editCatalogueID" type="text" class="validate" readonly = "readonly">
                        <label for="catalogue_id">Catalogue ID: </label>
                      </div>

                      <div class="input-field">
                        <select>
                          <option value="" disabled selected>Catalogue Category</option>
                          <option value="1">Gowns</option>
                          <option value="2">Tuxedo</option>
                        </select>
                        <label> Catalogue Category</label>
                      </div>      

                      <div class="input-field">
                        <input id="editCatalogueName" name = "editCatalogueName"  value = "editCatalogueName" type="text" class="validate">
                        <label for="Catalogue_Name"> Catalogue Name </label>
                      </div>

                      <div class="input-field">
                        <input id="editCategoryDesc" name = "editCategoryDesc" value = "editCategoryDesc" type="text" class="validate">
                        <label for="Category_Desc">Category Description </label>
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

                      </p>
                      <br><br>
                    </div>

                  
                    <div class="modal-footer">
                      <a href="#!" class="modal-action modal-close waves-effect waves-green btn btn-flat">UPDATE</a>
                      <a href="#!" class="modal-action modal-close waves-effect waves-green btn btn-flat">CANCEL</a>  
                    </div>
                  </div>


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
                <select>
                  <option value="" disabled selected>Catalogue Category</option>
                  <option value="1">Gown</option>
                  <option value="2">Uniform</option>
                </select>
                <label> Catalogue Category</label>
              </div>      

              <div class="input-field">
                <input id="addCatalogueName" name = "addCatalogueName" type="text" class="validate">
                <label for="Catalogue_Name"> Catalogue Name </label>
              </div>

              <div class="input-field">
                <input id="addCategoryDesc" name="addCategoryDesc" type="text" class="validate">
                <label for="Category_Desc">Category Description </label>
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

              </p>
              <br><br>
            </div> 
            
            <div class="modal-footer">                  
              <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">ADD</a>
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