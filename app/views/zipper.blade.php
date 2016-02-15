@extends('layouts.master')

@section('content')
	<div class="main-wrapper">
    <div class="row">
      <div class="col s12 m12 l12">
      <span class="page-title"><h4>Zipper</h4></span>
      </div>
    </div>

    <div class="row">
      <div class="col s12 m12 l6">
          <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#addZipper">ADD Zipper</button>
      </div>      
    </div>
  </div>



  <div class="row">
    <div class="col s12 m12 l12">
      <div class="card-panel">
       <span class="card-title"><h5><center>Zipper</center></h5></span>
        <div class="divider"></div>
        <div class="card-content">
    
          <table class = "centered" align = "center" border = "1">
            <thead>
              <tr>
                <th date-field= "Zipper ID">Zipper ID</th>
                <th data-field="Zipper Name">Zipper Name</th>
                <th data-field="Zipper Size">Zipper Size</th>
                <th data-field="Zipper Color">Zipper Color</th>
                <th data-field="Zipper">Zipper</th>
                <th data-field="Image">Image</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>001</td>
                <td>Zipper Name</td>
                <td>Zipper Size</td>
                <td>Zipper Color</td>
                <td>Zipper</td>
                <td>image</td>
                <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#editZipper">EDIT</button>
                      
                  <div id="editZipper" class="modal modal-fixed-footer">
                    <font color = "teal" ><center><h5>Edit Zipper</h5></center></font> 

                    <div class="modal-content">

                      <div class="input-field">
                        <input id="editZipperID" name = "editZipperID" value = "editZipperID" readonly = "readonly" type="text" class="validate">
                        <label for="Zipper_ID"> Zipper ID: </label>
                      </div>
                  
                      <div class="input-field">
                        <input id="editZipperName" name = "editZipperName" value = "editZipperName" type="text" class="validate">
                        <label for="Zipper_Name"> Zipper Name </label>
                      </div>

                      <div class="input-field">
                        <input id="editZipperSize" name = "editZipperSize" value = "editZipperSize" type="text" class="validate">
                        <label for="Zipper_Size"> Zipper Size </label>
                      </div>

                      <div class="input-field">
                        <input id="editZipperColor" name = "editZipperColor" value = "editZipperColor" type="text" class="validate">
                        <label for="Zipper_Color"> Zipper Color </label>
                      </div>

                      <div class="input-field">
                        <input id="Zipper" type="text" class="validate">
                        <label for="Zipper"> Zipper </label>
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

                      <br><br> 

                    </div>    

                    <div class="modal-footer">
                      <a href="#!" class="modal-action modal-close waves-effect waves-green btn btn-flat">UPDATE</a>
                      <a href="#!" class="modal-action modal-close waves-effect waves-green btn btn-flat">CANCEL</a>  
                    </div>

                  </div>
                </td>
              </tr>
            </tbody>
          </table>

          <div id="addZipper" class="modal modal-fixed-footer">
            <font color = "teal"><h5><center>Add Zipper </center></h5></font> 
            <div class="modal-content">

              <div class="input-field">
                <input id="addZipperID" name = "addZipperID" value = "addZipperID" readonly = "readonly" type="text" class="validate">
                <label for="Zipper_ID"> Zipper ID: </label>
              </div>
                  
              <div class="input-field">
                <input id="addZipperName" name = "addZipperName" type="text" class="validate">
                <label for="Zipper_Name"> Zipper Name </label>
              </div>

              <div class="input-field">
                <input id="addZipperSize" name = "addZipperSize" type="text" class="validate">
                <label for="Zipper_Size"> Zipper Size </label>
              </div>

              <div class="input-field">
                <input id="addZipperColor" name = "addZipperColor" type="text" class="validate">
                <label for="Zipper_Color"> Zipper Color </label>
              </div>


              <div class="input-field">
                <input id="addZipper" name = "addZipper" type="text" class="validate">
                <label for="Zipper"> Zipper </label>
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
            </div>
            <br><br> 
               
            <div class="modal-footer">
              <a href="#!" class="modal-action modal-close waves-effect waves-green btn btn-flat">UPDATE</a>
              <a href="#!" class="modal-action modal-close waves-effect waves-green btn btn-flat">CANCEL</a>  
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