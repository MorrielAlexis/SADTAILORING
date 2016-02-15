@extends('layouts.master')
 
@section('content')

  <div class="main-wrapper">
    <div class="row">
      <div class="col s12 m12 l12">
      <span class="page-title"><h4>Swatches</h4></span>
      </div>
    </div>

    <div class="row">
      <div class="col s12 m12 l12">
        <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#addSwatches">ADD NEW SWATCH</button>
        <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#modal1">VIEW ALL SWATCHES</button>
      </div>
    </div>
  </div>

  <!--MODAL: VIEW ALL EMPLOYEES-->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>ALL SWATCHES</h4>
      <table class="centered" border="1">
        <thead>
          <tr>
            <th date-field="Swatch ID">Swatch ID </th>
            <th data-field="Swatch fabric type Name">Swatch Fabric Type Name</th>
            <th data-field="SwatchName">Swatch Name</th>
            <th data-field="SwatchCode">Swatch Code</th>
            <th data-field="SwatchImage">Image</th>
          </tr>
        </thead>

        <tbody>
            @foreach($swatch as $swatch)
              @if($swatch->boolIsActive == 1)
            <tr>
              <td>{{ $swatch->strSwatchID }}</td>
              <td>{{ $swatch->strSwatchFabricTypeName }}</td>
              <td>{{ $swatch->strSwatchName }}</td>
              <td>{{ $swatch->strSwatchCode }}</td>
              <td>{{ $swatch->strSwatchImageLink }}</td>
              <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#">REACTIVATE</button></td>
            </tr>
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
   		    	<span class="card-title"><h5><center>Swatches Details</h5></center></span>
            <div class="divider"></div>
            <div class="card-content">
              <div class="col s12 m12 l12 overflow-x">
   
      				<table class = "centered" align = "center" border = "1">
       				 <thead>
          				<tr>
                    <th date-field="Swatch ID">Swatch ID</th>
              			<th data-field="Swatch fabric type Name">Swatch Fabric Type Name</th>
             		  	<th data-field="SwatchName">Swatch Name</th>
                    <th data-field="SwatchCode">Swatch Code</th>
              			<th data-field="SwatchImage">Image</th>
              			</tr>
                </thead>

              	<tbody>
                  <tr>
              		  <td>id</td>
                    <td>Silk</td>
              		  <td>Martina Chuchu</td>
              		  <td>MC2345</td>
                    <td>imagelink</td>
              		  <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#editSwatches">EDIT</button>

                      <div id="editSwatches" class="modal modal-fixed-footer">
                        <font color = "teal"> <center><h5>Edit Swatches Details</h5></center></font> 
                        <div class="modal-content">
                          <p>

                          <div class="input-field">
                            <input value = "editSwatchID" id="editSwatchID" name= "editSwatchID" type="text" readonly = "readonly" class="validate">
                            <label for="swatch_id">Swatch ID: </label>
                          </div>

                          <div class="input-field">
                            <select name='editSwatches'>
                              <option value="" disabled selected>Select Fabric Type</option>
                              <option value="1">Fabric 1</option>
                              <option value="2">Fabric 2</option>
                            </select>
                            <label>Fabric Type Name: </label>
                          </div>  

                          <div class="input-field">
                            <input id="editSwatchName" value = "editSwatchName" name = "editSwatchName" type="text" class="validate">
                            <label for="swatch_name">Swatch Name: </label>
                          </div>    

                          <div class="input-field">
                            <input id="editSwatchCode" value = "editSwatchCode" name = "editSwatchCode" type="text" class="validate">
                            <label for="swatch_code">Swatch Code: </label>
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
                          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">UPDATE</a>
                          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a>  
                        </div>

                      </div> 
                    </td> 
                  </tr>                    
                </tbody>
              </table>

              </div>

              <div class = "clearfix">

              </div>

           <!--    <Modal Structure for Add swatches> -->
              <div id="addSwatches" class="modal modal-fixed-footer">
                <form action="/addSwatch" method="POST" id="addSwatch" name="addSwatch">
                <font color = "teal"><center><h5> Add Swatch </h5></center></font> 
                <div class="modal-content">
                  <p>

                  <div class="input-field">
                    <input value = "{{$newID}}" id="addSwatchID" name= "addSwatchID" type="text" readonly = "readonly" class="validate">
                    <label for="swatch_id">Swatch ID: </label>
                  </div>

                  <div class="input-field">
                    <select name='addSwatch' id='addSwatch' required>
                      <option  selected disable>Select Swatch Fabric Type Name</option>
                       @foreach($swatch as $id=>$name)
                      <option value="{{ $id }}">{{ $name }}</option>
                      @endforeach
                    </select>
                  </div>  

                  <div class="input-field">
                    <input id="addSwatchName" name = "addSwatchName" type="text" class="validate">
                    <label for="swatch_name">Swatch Name: </label>
                  </div>    

                  <div class="input-field">
                    <input id="addSwatchCode" name = "addSwatchCode" type="text" class="validate">
                    <label for="swatch_code">Swatch Code: </label>
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
                  <br>
                  <br>
                  </p>  
                </div>

                <div class="modal-footer">
                  <button type="submit" id="send" name="send" class=" modal-action modal-close waves-effect waves-green btn-flat">ADD</a>
                  <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a>  
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