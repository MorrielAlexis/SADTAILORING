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
        <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#modal1">VIEW INACTIVE SWATCHES</button>
      </div>
    </div>
  </div>

  <!--MODAL: VIEW ALL EMPLOYEES-->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>INACTIVE SWATCHES</h4>
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
            @foreach($swatch2 as $swatch2)
              @if($swatch2->boolIsActive == 0)
            <tr>
              <td>{{ $swatch2->strSwatchID }}</td>
              <td>{{ $swatch2->strFabricTypeName }}</td>
              <td>{{ $swatch2->strSwatchName }}</td>
              <td>{{ $swatch2->strSwatchCode }}</td>
              <td>Click here to view image</td>
              <td>

               <form action="/reactSwatch" method="POST">
                  <input type="hidden" value="{{ $swatch2->strSwatchID }}" id="reactID" name="reactID">
              <button type="type" class="modal-trigger waves-effect waves-light btn btn-small center-text">REACTIVATE</button>

              </form>
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
        <span class="card-title"><h5><center>Swatches Details</center></h5></span>
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
                  @foreach($swatch as $swatch)
                    @if($swatch->boolIsActive == 1)
                  <tr>
                    <td>{{ $swatch->strSwatchID }}</td>
                    <td>{{ $swatch->strFabricTypeName }}</td>
                    <td>{{ $swatch->strSwatchName }}</td>
                    <td>{{ $swatch->strSwatchCode }}</td>
                    <td>Click here to view image</td>
              		  <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit{{ $swatch->strSwatchID }}">EDIT</button></td>
                    <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#del{{ $swatch->strSwatchID }}">DELETE</button>


                      <div id="edit{{$swatch->strSwatchID}}" class="modal modal-fixed-footer">
                        <font color = "teal"> <center><h5>Edit Swatches Details</h5></center></font> 
                        <form action="/editSwatch" method="POST">
                          <div class="modal-content">
                            <p>
                              <div class="input-field">
                                <input value = "{{ $swatch->strSwatchID }}" id="editSwatchID" name= "editSwatchID" type="text" readonly class="validate">
                                <label for="swatch_id">Swatch ID: </label>
                              </div>

                              <div class="input-field">
                                <select name='editFabric'>
                                  <option value="" disabled>Select Fabric Type</option>
                                  @foreach($fabricType as $id=>$name)
                                    @if($swatch->strSwatchFabricTypeName == $id)
                                      <option value="{{$id}}" selected>{{$name}}</option>
                                    @else
                                      <option value="{{$id}}">{{$name}}</option>
                                    @endif
                                  @endforeach
                                </select>
                              </div>  

                              <div class="input-field">
                                <input value="{{$swatch->strSwatchName}}" id="editSwatchName" name = "editSwatchName" type="text" class="validate">
                                <label for="swatch_name">Swatch Name: </label>
                              </div>    

                              <div class="input-field">
                                <input value="{{$swatch->strSwatchCode}}" id="editSwatchCode" name = "editSwatchCode" type="text" class="validate">
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
                            <button type="submit" class=" modal-action modal-close waves-effect waves-green btn-flat">UPDATE</button>
                            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a>  
                          </div>
                        </form>
                      </div> 
                      <!--*******************************************-->
                      <div id="del{{$swatch->strSwatchID}}" class="modal modal-fixed-footer">
                        <font color = "teal"> <center><h5>Are you sure you want to delete?</h5></center></font> 
                        <form action="/delSwatch" method="POST">
                          <div class="modal-content">
                            <p>
                              <div class="input-field">
                                <input value = "{{ $swatch->strSwatchID }}" id="delSwatchID" name= "delSwatchID" type="text" readonly class="validate">
                                <label for="swatch_id">Swatch ID: </label>
                              </div>

                              <div class="input-field">
                                <select>
                                  <option value="" disabled>Select Fabric Type</option>
                                    @foreach($fabricType as $id=>$name)
                                    @if($swatch->strSwatchFabricTypeName == $id)
                                      <option value="{{$id}}" selected disabled>{{$name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                              </div>  

                              <div class="input-field">
                                <input value="{{$swatch->strSwatchName}}" type="text" class="validate" readonly>
                                <label for="swatch_name">Swatch Name: </label>
                              </div>    

                              <div class="input-field">
                                <input value="{{$swatch->strSwatchCode}}" type="text" class="validate" readonly>
                                <label for="swatch_code">Swatch Code: </label>
                              </div>

                            </p>
                          </div>
                  
                          <div class="modal-footer">
                            <button type="submit" class=" modal-action modal-close waves-effect waves-green btn-flat">OK</button>
                            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a>  
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


                <!--    <Modal Structure for Add swatches> -->
            <div id="addSwatches" class="modal modal-fixed-footer">
              <font color = "teal"><center><h5> Add Swatch </h5></center></font>
              <form action="/addSwatch" method="POST" id="addSwatch" name="addSwatch"> 

                <div class="modal-content">
                  <p>

                    <div class="input-field">
                      <input value = "{{$newID}}" id="addSwatchID" name= "addSwatchID" type="text" readonly class="validate">
                      <label for="swatch_id">Swatch ID: </label>
                    </div>

                    <div class="input-field">
                      <select name='addFabric' id='addFabric' required>
                        <option  selected disable>Select Swatch Fabric Type Name</option>
                        @foreach($fabricType as $id=>$name)
                        <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                      </select>
                    </div>  

                    <div class="input-field">
                      <input id="addSwatchName" name="addSwatchName" type="text" class="validate">
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
                  <button type="submit" id="send" name="send" class=" modal-action modal-close waves-effect waves-green btn-flat">ADD</button>
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