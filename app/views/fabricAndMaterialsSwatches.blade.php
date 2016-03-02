@extends('layouts.master')
 
@section('content')

  <div class="main-wrapper">
      <!--Add Fabric Swatch-->
         @if (Input::get('success') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added fabric swatch!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif

      <!--Edit Fabric Swatch-->
      @if (Input::get('successEdit') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully edited fabric swatch!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif


      <!--Deleted Fabric Swatch-->
      @if (Input::get('successDel') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully deleted fabric swatch!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif


      <!--Reactivate Fabric Swatch-->
      @if (Input::get('successRec') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added back fabric swatch!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif


       <!--  <Duplicate Error Message>   -->
    @if (Input::get('success') == 'duplicate')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel red">
              <span class="black-text" style="color:black">Input datas already exist!!!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif

    <div class="row">
      <div class="col s12 m12 l12">
      <span class="page-title"><h4>Swatches</h4></span>
      </div>
    </div>

    <div class="row">
      <div class="col s12 m12 l12">
        <button style="color:black; margin-right:35px; margin-left: 20px" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to add a new swatch to the table" href="#addSwatches">ADD NEW SWATCH</button>
        <button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to view deleted swatches from the table" href="#modal1">VIEW INACTIVE SWATCHES</button>
      </div>
    </div>
  </div>

  <!--MODAL: VIEW ALL EMPLOYEES-->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h5><font color = "#1b5e20"><center>Inactive Fabric Swatches</center> </font> </h5>
      <table class="centered" border="1">
        <thead>
          <tr>
            <!--<th date-field="Swatch ID">Swatch ID </th>-->
            <th data-field="Swatch fabric type Name">Swatch Fabric Type Name</th>
            <th data-field="SwatchName">Swatch Name</th>
            <th data-field="SwatchCode">Swatch Code</th>
            <th data-field="SwatchImage">Image</th>
            <th data-field="SwatchImage">Reason for Inactivation</th>
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
              <td>{{ $swatch2->strInactiveReason }}</td>
              <td>

               <form action="{{URL::to('reactSwatch')}}" method="POST">
                  <input type="hidden" value="{{ $swatch2->strSwatchID }}" id="reactID" name="reactID">
                  <input type="hidden" value="{{ $swatch2->strSwatchID }}" id="reactInactiveSwatch" name="reactInactiveSwatch">
              <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to return data of fabric swatch to the table">REACTIVATE</button>

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
        <span class="card-title"><h5 style="color:#1b5e20"><center>Swatches Details</center></h5></span>
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
              		  <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit swatch detail" href="#edit{{ $swatch->strSwatchID }}">EDIT</button></td>
                    <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of swatch from the table" href="#del{{ $swatch->strSwatchID }}">DELETE</button>
    

                      <div id="edit{{$swatch->strSwatchID}}" class="modal modal-fixed-footer">
                       <h5><font color = "#1b5e20"><center>Edit Fabric Swatch</center> </font> </h5>
                        <form action="{{URL::to('editSwatch')}}" method="POST" enctype="multipart/form-data">
                          <div class="modal-content">
                            <p>
 
                              <div class="input-field">
                                <input value = "{{ $swatch->strSwatchID }}" id="editSwatchID" name= "editSwatchID" type="hidden">
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
                                <div style="color:black" class="btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
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
                       <h5><font color = "#1b5e20"><center>Are you sure you want to delete?</center> </font> </h5> 
                        <form action="{{URL::to('delSwatch')}}" method="POST">
                          <div class="modal-content">
                            <p>
                              <div class="input-field">
                                <input value = "{{ $swatch->strSwatchID }}" id="delSwatchID" name= "delSwatchID" type="hidden">
 
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

                              <div class="input-field">
                                <input value = "{{ $swatch->strSwatchID }}" id="delInactiveSwatch" name= "delInactiveSwatch" type="hidden">
                              </div>   

                              <div class="input-field">
                                <input value="{{$swatch->strInactiveReason}}" id="delInactiveReason" name= "delInactiveReason" type="text" class="" required>
                                <label for="swatch_code">*Reason for Inactivation: </label>
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
             <h5><font color = "#1b5e20"><center>Add Fabric Swatch</center> </font> </h5>
              <form action="{{URL::to('addSwatch')}}" method="POST" id="addSwatch" name="addSwatch" enctype="multipart/form-data"> 

                <div class="modal-content">
                  <p>

 
                    <div class="input-field">
                      <input value = "{{$newID}}" id="addSwatchID" name= "addSwatchID" type="hidden">

                   <div class="input-field">
                      <input value = "{{$newID}}" id="addSwatchID" name= "addSwatchID" type="hidden">
 
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
                      <div style="color:black" class="btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
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
          $('select').material_select();

          setTimeout(function () {
            $('#success-message').hide();
        }, 5000);

      } );
    </script>
@stop