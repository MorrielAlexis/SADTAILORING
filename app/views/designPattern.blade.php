@extends('layouts.master')


@section('content')
  <div class="main-wrapper">
        <!--Add Segment Pattern-->
         @if (Input::get('success') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added segment pattern!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
        @endif


        <!--Edit Segment Pattern-->
       @if (Input::get('successEdit') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully edit segment pattern!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
        @endif

        <!--Delete Segment Pattern-->
      @if (Input::get('successDel') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully deactivated segment pattern!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
        @endif

       <!--Reactivate Segment Pattern-->
      @if (Input::get('successRec') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added back segment pattern!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
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
        <span class="page-title"><h4>Segment Pattern</h4></span>
      </div>
    </div>

    <div class="row">
      <div class="col s12 m12 l12">
          <button style="color:black; margin-right:35px; margin-left: 20px" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to add a new segment pattern to the table" href="#addDesign">ADD SEGMENT PATTERN</button>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col s12 m12 l12">
    	<div class="card-panel">
        <span class="card-title"><h5 style="color:#1b5e20"><center>Segment Pattern Details</center></h5></span>
        <div class="divider"></div>

    		<div class="card-content"> 
            <div class="col s12 m12 l12 overflow-x">
      			<table class = "table centered data-segmentPattern" align = "center" border = "1">
       				<thead>
          			<tr>
                  <!--<th data-field= "Catalog ID">Segment Pattern ID</th>-->
                  <th data-field="Category Name">Category Name </th>
              		<th data-field="Garment Name">Segment Name </th>
             		  <th data-field="Pattern Name">Pattern Name</th>
              		<th data-field="Pattern Image">Pattern Image</th>
                  <th data-field="Edit">Edit</th>
                  <th data-field="Edit">Delete</th>
              	</tr>
              </thead>

              <tbody>
                @foreach($pattern as $pattern)
                @if($pattern->boolIsActive == 1)
                <tr>
              		<!--<td>{{ $pattern->strDesignPatternID }}</td>-->
                  <td>{{ $pattern->strGarmentCategoryName }}</td>
                  <td>{{ $pattern->strGarmentSegmentName }}</td>
              		<td>{{ $pattern->strPatternName }}</td>
                  <td><img class="materialboxed" width="100%" height="100%" src="{{URL::asset($pattern->strPatternImage)}}"></td>
              		<td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit data of pattern" href="#edit{{ $pattern->strDesignPatternID }}">EDIT</button></td>
                  <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="CLick to remove data of pattern from table" href="#del{{ $pattern->strDesignPatternID }}">DEACTIVATE</button>
                      
                    <div id="edit{{ $pattern->strDesignPatternID }}" class="modal modal-fixed-footer">
                      <h5><font color = "#1b5e20"><center>Edit Segment Pattern</center> </font> </h5>
                      <div class="modal-content">
                        <p>

                        <form action="{{URL::to('editDesignPattern')}}" method="POST" enctype="multipart/form-data">
                        <div class="input-field">
                          <input value= "{{ $pattern->strDesignPatternID }}" id="editPatternID" name= "editPatternID" type="hidden">
                        </div>

                        <div class="input-field">                                                    
                          <select required name='editCategory'>
                            @foreach($category2 as $cat)
                              @if($pattern->strDesignCategory == $cat->strGarmentCategoryID && $cat->boolIsActive == 1)
                                <option selected value="{{ $cat->strGarmentCategoryID }}">{{ $cat->strGarmentCategoryName }}</option>
                              @elseif($cat->boolIsActive == 1)
                                <option value="{{ $cat->strGarmentCategoryID }}">{{ $cat->strGarmentCategoryName }}</option>
                              @endif
                            @endforeach
                          </select>    
                          <label>Category</label>
                        </div>  

                        <div class="input-field">                                                    
                          <select id="editSegment" name="editSegment">
                              @foreach($segment2 as $seg)
                                  @if($pattern->strDesignSegmentName == $seg->strGarmentSegmentID && $seg->boolIsActive == 1)
                                    <option selected value="{{ $seg->strGarmentSegmentID }}">{{ $seg->strGarmentSegmentName }}</option>
                                  @elseif($seg->boolIsActive == 1)
                                    <option value="{{ $seg->strGarmentSegmentID }}">{{ $seg->strGarmentSegmentName }}</option>
                                  @endif
                              @endforeach
                          </select>    
                          <label>Segment</label>
                        </div>   

                        <div class="input-field">
                          <input required value = "{{ $pattern->strPatternName }}" id="editPatternName" name= "editPatternName" type="text" class="validatePatternName">
                          <label for="pattern_name">Pattern Name: </label>
                        </div>

                        <div class="file-field input-field">
                          <div style="color:black" class="btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
                            <span>Upload Image</span>
                            <input id="editImg" name="editImg" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                          </div>
                        
                          <div class="file-path-wrapper">
                            <input value="{{$pattern->strPatternImage}}" id="editImage" name="editImage" class="file-path validate" type="text" readonly="readonly">
                          </div>
                        </div>
                        </p>
                        <br><br>
                      </div>
                  
                      <div class="modal-footer">
                        <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">OK</button>
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a> 
                      </div>
                    </form>

                 </div>  


                 <!-- DELETE DESIGN PATTERN --> 

                 </div>   


                 </div>   
                 


                <div id="del{{ $pattern->strDesignPatternID }}" class="modal modal-fixed-footer">
                      <h5><font color = "#1b5e20"><center>Are you sure want to deactivate segment pattern?</center> </font> </h5>
                      <div class="modal-content">
                        <p>
                        <form action="{{URL::to('delDesignPattern')}}" method="POST" enctype="multipart/form-data">
                        <div class="input-field">
                          <input value= "{{ $pattern->strDesignPatternID }}" id="delPatternID" name= "delPatternID" type="hidden">
                        </div>

                        <div class="input-field">                                                    
                            <input type="text" value="{{$pattern->strGarmentCategoryName}}" readonly>
                          <label>Category</label>
                        </div> 

                        <div class="input-field">                                                    
                            <input type="text" value="{{$pattern->strGarmentSegmentName}}" readonly>
                          <label>Segment</label>
                        </div>   
  

                        <div class="input-field">
                          <input value = "{{ $pattern->strPatternName }}" type="text" class="validate" readonly>
                          <label for="pattern_name">Pattern Name: </label>
                        </div>

                          <div class="input-field">
                            <input id="delInactivePattern" name = "delInactivePattern" value = "{{$pattern->strDesignPatternID}}" type="hidden">
                          </div>

                          <div class="input-field">
                            <input id="delInactiveReason" name = "delInactiveReason" value = "{{$pattern->strInactiveReason}}" type="text" class="validate" required>
                            <label for="fax"> *Reason for Inactivation: </label>
                          </div>
                        </p>
                      </div>              


                      <div class="modal-footer">
                        <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">GO</button>
                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a> 
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
           

            <div id="addDesign" class="modal modal-fixed-footer">
              <h5><font color = "#1b5e20"><center>Add a Segment Pattern</center> </font> </h5> 
              <div class="modal-content">
                <p>
                <form action="{{URL::to('addDesignPattern')}}" method="POST" enctype="multipart/form-data">
                <div class="input-field">
                  <input value = "{{$newID}}" id="addPatternID" name= "addPatternID" type="hidden">
                </div>

                <div class="input-field">
                  <select name='addCategory' id='addCategory' required>
                      @foreach($category as $category)
                        @if($category->boolIsActive == 1)
                          <option value="{{ $category->strGarmentCategoryID }}">{{ $category->strGarmentCategoryName }}</option>
                        @endif
                      @endforeach
                  </select>   
                  <label>Category</label>
                </div>  

                <div class="input-field">
                  <select required id="addSegment" name="addSegment">
                        @foreach($segment as $segment)
                          @if($segment->boolIsActive == 1)
                            <option value="{{ $segment->strGarmentSegmentID }}">{{ $segment->strGarmentSegmentName }}</option>
                          @endif
                        @endforeach
                  </select>
                  <label>Segment</label>
                </div>   

                <div class="input-field">
                  <input required id="addPatternName" name= "addPatternName" type="text" class="validatePatternName">
                  <label for="pattern_name">Pattern Name: </label>
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
                </p>
              </div>

              <div class="modal-footer">
                <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">ADD</button>
                <button type="button" onclick="clearData()" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</button> 
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
        document.getElementById('addPatternName').value = "";
        document.getElementById('addImage').value = "";
      }

    </script>

    <script type="text/javascript">
      $('.validatePatternName').on('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z," "]+$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      //Kapag Number
      $('.validatePatternName').keyup(function() {
        var name = $(this).val();
        $(this).val(name.replace(/\d/, ''));
      });     

      $('.validatePatternName').blur('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      }); 
    </script>
         <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">

      $(document).ready(function() {

          $('.data-segmentPattern').DataTable();
          $('select').material_select();

          setTimeout(function () {
            $('#success-message').hide();
        }, 5000);

      } );
    </script>

@stop
