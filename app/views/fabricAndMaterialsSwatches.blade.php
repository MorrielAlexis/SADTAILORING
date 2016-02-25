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
            <!--<th date-field="Swatch ID">Swatch ID </th>-->
            <th data-field="Swatch fabric type Name">Swatch Fabric Type Name</th>
            <th data-field="SwatchName">Swatch Name</th>
            <th data-field="SwatchCode">Swatch Code</th>
            <th data-field="SwatchImage">Image</th>
            <th data-field="reactSwatch">Reactivate</th>
          </tr>
        </thead>

        <tbody>
            @foreach($swatch2 as $swatch2)
              @if($swatch2->boolIsActive == 0)
            <tr>
              <!--<td>{{ $swatch2->strSwatchID }}</td>-->
              <td>{{ $swatch2->strFabricTypeName }}</td>
              <td>{{ $swatch2->strSwatchName }}</td>
              <td>{{ $swatch2->strSwatchCode }}</td>
              <td><img class="materialboxed" width="100%" height="100%" src="{{URL::asset($swatch2->strSwatchImage)}}"></td>
              <td>

               <form action="{{URL::to('reactSwatch')}}" method="POST">
                  <input type="hidden" value="{{ $swatch2->strSwatchID }}" id="reactID" name="reactID">
              <button type="submit" class="waves-effect waves-light btn btn-small center-text">REACTIVATE</button>

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
   
      				<table class = "table centered data-swatches" align = "center" border = "1">
       				 <thead>
          				<tr>
                    <!--<th date-field="Swatch ID">Swatch ID</th>-->
              			<th data-field="Swatch fabric type Name">Swatch Fabric Type Name</th>
             		  	<th data-field="SwatchName">Swatch Name</th>
                    <th data-field="SwatchCode">Swatch Code</th>
              			<th data-field="SwatchImage">Image</th>
                    <th data-field="Edit">Edit</th>
                    <th data-field="Edit">Delete</th>

              		</tr>
                </thead>

              	<tbody>
                  @foreach($swatch as $swatch)
                    @if($swatch->boolIsActive == 1)
                  <tr>
                    <!--<td>{{ $swatch->strSwatchID }}</td>-->
                    <td>{{ $swatch->strFabricTypeName }}</td>
                    <td>{{ $swatch->strSwatchName }}</td>
                    <td>{{ $swatch->strSwatchCode }}</td>
                    <td><img class="materialboxed" width="100%" height="100%" src="{{URL::asset($swatch->strSwatchImage)}}"></td>
              		  <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit{{ $swatch->strSwatchID }}">EDIT</button></td>
                    <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#del{{ $swatch->strSwatchID }}">DELETE</button>
    

                      <div id="edit{{$swatch->strSwatchID}}" class="modal modal-fixed-footer">
                        <font color = "teal"> <center><h5>Edit Swatches Details</h5></center></font> 
                        <form action="{{URL::to('editSwatch')}}" method="POST" enctype="multipart/form-data">
                          <div class="modal-content">
                            <p>
<<<<<<< HEAD
                              <div class="input-field">
                                <input value = "{{ $swatch->strSwatchID }}" id="editSwatchID" name= "editSwatchID" type="text" readonly class="">
                                <label for="swatch_id">Swatch ID: </label>
=======
                             <div class="input-field">
                                <input value = "{{ $swatch->strSwatchID }}" id="editSwatchID" name= "editSwatchID" type="hidden">
>>>>>>> daa8166192366910383034471522dbb013250a5b
                              </div>

                              <div class="input-field">
                                <select required  name='editFabric'>
                                  @foreach($fabricType as $id=>$name)
                                    @if($swatch->strSwatchFabricTypeName == $id)
                                      <option value="{{$id}}" selected>{{$name}}</option>
                                    @else
                                      <option value="{{$id}}">{{$name}}</option>
                                    @endif
                                  @endforeach
                                </select>
                                  <label>*Fabric Type</label>
                              </div>  

                              <div class="input-field">
                                <input required value="{{$swatch->strSwatchName}}" id="editSwatchName" name = "editSwatchName" type="text" class="validateSwatchName">
                                <label for="swatch_name">*Swatch Name: </label>
                              </div>    

                              <div class="input-field">
                                <input required value="{{$swatch->strSwatchCode}}" id="editSwatchCode" name = "editSwatchCode" type="text" class="validateSwatchCode">
                                <label for="swatch_code">*Swatch Code: </label>
                              </div>

                              <div class="file-field input-field">
                                <div class="btn">
                                  <span>Upload Image</span>
                                  <input id="editImg" name="editImg" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                                </div>
                              
                                <div class="file-path-wrapper">
                                  <input value="{{$swatch->strSwatchImage}}" id="editSwatchImage" name="editSwatchImage" class="file-path validate" type="text" readonly="readonly">
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
                      <!--******************Soft Delete*************************-->
                      <div id="del{{$swatch->strSwatchID}}" class="modal modal-fixed-footer">
                        <font color = "teal"> <center><h5>Are you sure you want to delete?</h5></center></font> 
                        <form action="{{URL::to('delSwatch')}}" method="POST">
                          <div class="modal-content">
                            <p>
                              <div class="input-field">
<<<<<<< HEAD
                                <input value = "{{ $swatch->strSwatchID }}" id="delSwatchID" name= "delSwatchID" type="text" readonly class="">
                                <label for="swatch_id">Swatch ID: </label>
=======
                                <input value = "{{ $swatch->strSwatchID }}" id="delSwatchID" name= "delSwatchID" type="hidden">
>>>>>>> daa8166192366910383034471522dbb013250a5b
                              </div>

                              <div class="input-field">
                                  <input type="text" value="{{$swatch->strFabricTypeName}}" readonly>
                                  <label>Fabric Type</label>
                              </div>  

                              <div class="input-field">
                                <input value="{{$swatch->strSwatchName}}" type="text" class="" readonly>
                                <label for="swatch_name">Swatch Name: </label>
                              </div>    

                              <div class="input-field">
                                <input value="{{$swatch->strSwatchCode}}" type="text" class="" readonly>
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
              <form action="{{URL::to('addSwatch')}}" method="POST" id="addSwatch" name="addSwatch" enctype="multipart/form-data"> 

                <div class="modal-content">
                  <p>

<<<<<<< HEAD
                    <div class="input-field">
                      <input value = "{{$newID}}" id="addSwatchID" name= "addSwatchID" type="text" readonly class="">
                      <label for="swatch_id">Swatch ID: </label>
=======
                   <div class="input-field">
                      <input value = "{{$newID}}" id="addSwatchID" name= "addSwatchID" type="hidden">
>>>>>>> daa8166192366910383034471522dbb013250a5b
                    </div>

                    <div class="input-field">
                      <select name='addFabric' id='addFabric' required>
                          @foreach($fabricType as $id=>$name)
                          <option value="{{ $id }}">{{ $name }}</option>
                          @endforeach
                      </select>
                      <label>*Fabric Type</label>
                    </div>  

                    <div class="input-field">
                      <input required id="addSwatchName" name="addSwatchName" type="text" class="validateSwatchName">
                      <label for="swatch_name">*Swatch Name: </label>
                    </div>    

                    <div class="input-field">
                      <input required id="addSwatchCode" name = "addSwatchCode" type="text" class="validateSwatchCode">
                      <label for="swatch_code">*Swatch Code: </label>
                    </div>

                    <div class="file-field input-field">
                      <div class="btn">
                        <span>Upload Image</span>
                        <input id="addImg" name="addImg" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                      </div>
                    
                      <div class="file-path-wrapper">
                        <input id="addImage" name="addImage" class="file-path validate" type="text" readonly="readonly">
                      </div>
                    </div>

                    <br>
                    <br>
                  </p>  
                </div>

                <div class="modal-footer">
                  <button type="submit" id="send" name="send" class=" modal-action waves-effect waves-green btn-flat">ADD</button>
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
      $(document).ready(function(){
      $('select').material_select();
      });
    </script>

    
    <script>
      $(document).ready(function(){
    $('.materialboxed').materialbox();
     });
    </script>


    <script>
      function clearData(){
        document.getElementById('addSwatchName').value = "";
        document.getElementById('addSwatchCode').value = "";
        document.getElementById('addImage').value = "";
      }
    </script>

    <script type="text/javascript">
      $('.validateSwatchName').on('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z," "]+$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      //Kapag Number
      $('.validateSwatchName').keyup(function() {
        var name = $(this).val();
        $(this).val(name.replace(/\d/, ''));
      });     

      $('.validateSwatchName').blur('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z," "]+$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      }); 

      $('.validateSwatchCode').on('input', function() {
        var input=$(this);
        var is_desc=input.val();
        if(is_desc){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateSwatchCode').blur('input', function() {
        var input=$(this);
        var is_desc=input.val();
        if(is_desc){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });
      </script>

         <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">

      $(document).ready(function() {

          $('.data-swatches').DataTable();

      } );
    </script>
@stop