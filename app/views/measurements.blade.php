@extends('layouts.master')

@section('content')
  
  

 <!--<p><h4 style="lightpink">Measurements</h4></p>-->
    <div class="row" style="padding:20px">
    
    <!--Measurement Tabs-->
      <div class="col s12" id="measurements" name="measurements">
        <ul class="tabs">
          <li class="tab col s3"><a style="color:black; padding-top:5px; opacity:0.80" class="tooltipped center-text light-green lighten-1"accent data-position="bottom" data-delay="50" data-tooltip="Click to see to parts being measured" href="#tabDetails"><b>Details</b></a></li>     
          <div style="border: 1px solid white" class="divider"></div>
          <li id="categoryTab" class="tab col s3"><a style="color:black; padding-top:5px; opacity:0.80" class="tooltipped center-text light-green lighten-1"accent data-position="bottom" data-delay="50" data-tooltip="CLick to see measurement details about a particular garment" href="#tabCategory"><b>Category</b></a></li>
          <div class="indicator white" style="z-index:1"></div>
        </ul>
    
    <!--Tab Contents-->
    <!--Measurement Category-->
        <div id="tabCategory" class="hue col s12">

          <div class="main-wrapper">
                 @if (Input::get('success') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added measurement information!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif
            <div class="row">
              <div class="col s12 m12 l12">
                <span class="page-title"><h4>Measurement Information</h4></span>
              </div>
            </div>

            <div class="row">
              <div class="col s12 m12 l12">
                <button style="color:black; margin-right:35px; margin-left: 20px" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to add a new measurement information to the table" href="#addMeasurementInfo"> ADD MEASUREMENT INFO </button>
                <button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to view deleted measurement information from the table" href="#modal1">VIEW INACTIVE MEASUREMENT INFO</button>
              </div>
            </div>
          </div>



          <!--MODAL: VIEW INACTIVE MEASUREMENT INFO-->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h5><font color = "#1b5e20"><center>Inactive Measurement Information</center> </font> </h5>
      <table class="centered" border="1">
        <thead>
          <tr>
              <th data-field = "MeasurementID"> Measurement ID </th>
              <th data-field="Garmentcategory">Garment Category</th>
              <th data-field="Garmentcategory">Segment</th>
              <th data-field="MeasurementName">Measurement Name</th>
          </tr>
        </thead>

        <tbody>
            @foreach($head2 as $head2)
            @if($head2->boolIsActive == 0)
                <tr>
                 <td>{{ $head2->strMeasurementID }}</td>
                 <td>{{ $head2->strGarmentCategoryName }}</td>
                 <td>{{ $head2->strGarmentSegmentName }}</td>
                 <td>{{ $head2->strMeasurementDetailName }}</td>
                  <td>
                  <form action="{{URL::to('reactMeasurementCategory')}}" method="POST">
                    <input type="hidden" value="{{ $head2->strMeasurementID }}" id="reactID" name="reactID">
                    <button type="submit"  style="color:black" class="btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to return measuremennt information to the table">REACTIVATE</button>
                  </form>
                </td>
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
                <span class="card-title"><h5><center>Measurement Category</center></h5></span>
                <div class="divider"></div>
                <div class="card-content">

                  <div class="col s12 m12 l12 overflow-x">
                    <table class = "table centered data-measHead" align = "center" border = "1">
                      <thead>
                        <tr>
                          <th data-field="Garmentcategory">Garment Category</th>
                          <th data-field="Garmentcategory">Segment</th>
                          <th data-field="MeasurementName">Measurement Name</th>
                          <th data-field="MeasurementName">Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($head as $head_1)
                        @if($head_1->boolIsActive == 1)
                        <tr>   
                          <td>{{ $head_1->strGarmentCategoryName }}</td>
                          <td>{{ $head_1->strGarmentSegmentName }}</td>
                          <td>{{ $head_1->meas_details }}</td>
                          <td><button class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit measurement information" href="#edit{{$head_1->strMeasurementID}}">EDIT</button></td>

                          

                            <div id="edit{{$head_1->strMeasurementID}}" class="modal modal-fixed-footer">
                              <font color = "teal"><center><h5> Edit Measurement Info </h5></center></font>
                              <form action="{{URL::to('editMeasurementCategory')}}" method="POST"> 
                                <div class="modal-content"> 
                                  <p>
                                  
                                    <div class="input-field">
                                      <input value="{{ $head_1->strMeasurementID }}" id="editMeasurementID" name="editMeasurementID" type="hidden" readonly>                                 
                                    </div>

                                    <div class="input-field">                                                    
                                      <select required name='editCategory'>
                                        @foreach($category as $cat)
                                            @if($head_1->strCategoryName == $cat->strGarmentCategoryID)
                                              <option value="{{ $cat->strGarmentCategoryID }}" selected>{{ $cat->strGarmentCategoryName }}</option> 
                                            @else
                                              <option value="{{ $cat->strGarmentCategoryID }}">{{ $cat->strGarmentCategoryName }}</option>
                                            @endif 
                                        @endforeach                                  
                                      </select>    
                                      <label>Category</label>
                                    </div>       
                                      
                                    <div class="input-field">                                                    
                                      <select required name='editSegment'>
                                        @foreach($segment as $seg)
                                          @if($head_1->strSegmentName == $seg->strGarmentSegmentID)
                                            <option value="{{ $seg->strGarmentSegmentID }}" selected>{{ $seg->strGarmentSegmentName }}</option>
                                          @else
                                            <option value="{{ $seg->strGarmentSegmentID }}">{{ $seg->strGarmentSegmentName }}</option>
                                          @endif
                                        @endforeach
                                      </select>    
                                      <label>Segment</label>
                                    </div>     

                                    <div class="input-field">                                                                               
                                      <select multiple name='editDetail[]' id='editDetail[]' required>
                                          @foreach($detailList as $dl)
                                            @if($head_1->strMeasurementName == $dl->strMeasurementDetailID)
                                              <option value ="{{ $dl->strMeasurementDetailID }}" selected>{{$dl->strMeasurementDetailName}}</option>
                                            @else
                                              <option value="{{ $dl->strMeasurementDetailID }}">{{$dl->strMeasurementDetailName}}</option>
                                            @endif
                                          @endforeach
                                      </select>   
                                      <label>Measurement Taken</label> 
                                    </div>   
                                  </p>
                                </div> 

                                <div class="modal-footer">
                                  <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">UPDATE</button>
                                  <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a>  
                                </div>
                              </form>
                            </div>
                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>
                  </div>

                  <div class = "clearfix">

                  </div>

                  <div id="addMeasurementInfo" class="modal modal-fixed-footer">
                    <h5><font color = "#1b5e20"><center>Add Measurement Information</center> </font> </h5> 
                    
                      <div class="modal-content">
                        <p>
                          <form action="{{URL::to('addMeasurementCategory')}}" method="POST">
                          <div class="input-field">
                            <input value="{{ $categoryNewID }}" id="addMeasurementID" name="addMeasurementID" type="text" readonly>
                            <label for="measurement_id">Measurement ID: </label>
                          </div>

                          <div class="input-field">                                                    
                              <select required name='addCategory'>                                      
                                  @foreach($category as $category)
                                    <option value="{{ $category->strGarmentCategoryID }}">{{ $category->strGarmentCategoryName }}</option>
                                  @endforeach
                              </select>    
                              <label>Category</label>
                            </div>        
                
                          <div class="input-field">                                                    
                            <select required name='addSegment'>
                                @foreach($segment as $segment)
                                    <option value="{{ $segment->strGarmentSegmentID }}" class="">{{ $segment->strGarmentSegmentName }}</option>
                                @endforeach                          
                            </select>    
                            <label>Segment</label>
                          </div>     

                          <div class="input-field">                                                                                 
                            <select multiple name='addDetail[]' id='addDetail[]' required>
                                @foreach($detailList as $detailList)
                                    <option value="{{ $detailList->strMeasurementDetailID }}" class="">{{ $detailList->strMeasurementDetailName }}</option>
                                @endforeach                               
                            </select>   
                            <label>Measurement Taken</label> 
                          </div>
                         
                        </p>                       
                      </div>

                      <div class="modal-footer">
                        <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">ADD</button>
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a>  
                      </div>
                    </form>
                  </div> 
                </div> 
              </div>
            </div>
          </div>
        </div>
      
        <!--END OF MEASUREMENT CATEGORY-->

        <div id="tabDetails" class="hue col s12">

          <div class="main-wrapper">
                 @if (Input::get('success') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added measurement part!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif
            <div class="row">
              <div class="col s12 m12 l12">
                <span class="page-title"><h4>Measurement Parts</h4></span>
              </div>
            </div>

            <div class="row">
              <div class="col s12 m12 l6">
                <button style="color:black; margin-right:35px; margin-left: 20px" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to add a new measurement detail to the table" href="#addMeasurementPart">ADD NEW PART</button>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col s12 m12 l12">
              <div class="card-panel">
                <span class="card-title"><h5><center>Measurement Parts</center></h5></span>
                <div class="divider"></div>
                <div class="card-content">
                  <div class="col s12 m12 l12 overflow-x">
                  <table class = "table centered data-measDet" align = "center" border = "1">
                    <thead>
                      <tr>
                        <th data-field="name">Measurement Name</th>
                        <th data-field="description">Measurement Description</th>
                        <th data-field="action">Edit</th>
                        <th data-field="action">Delete</th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach($detail as $detail)
                      @if($detail->boolIsActive == 1)
                      <tr>
                        <td>{{ $detail->strMeasurementDetailName }}</td>
                        <td>{{ $detail->strMeasurementDetailDesc }}</td>
                        <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit measurement detail" href="#edit{{ $detail->strMeasurementDetailID }}">EDIT</button></td>
                        <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to delete measurement detail from the table" href="#del{{ $detail->strMeasurementDetailID }}">DELETE</button></td>

                          <div id="edit{{ $detail->strMeasurementDetailID }}" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>Edit Measurement Part</center> </font> </h5>
                            <form action="{{URL::to('editMeasurementDetail')}}" method="POST"> 
                              <div class="modal-content">
                                <p>
                                  <div class="input-field">
                                    <input value="{{ $detail->strMeasurementDetailID }}" id="editDetailID" name="editDetailID" type="text"  readonly>
                                    <label for="measurement_id">Measurement ID: </label>
                                  </div>

                                  <div class="input-field">
                                    <input required value="{{ $detail->strMeasurementDetailName }}" id="editDetailName" name = "editDetailName" type="text" class="validateDetailName">
                                    <label for="measurement_name"> *Measurement Name: </label>
                                  </div>

                                  <div class="input-field">
                                    <input required value="{{ $detail->strMeasurementDetailDesc }}" id="editDetailDesc" name = "editDetailDesc" type="text" class="validateDetailDesc">
                                    <label for="measurement_desc">*Measurement Description: </label>
                                  </div>
                                </p>
                              </div>

                              <div class="modal-footer">
                                <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">UPDATE</button>
                                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a>  
                              </div>
                            </form>
                          </div>
                          <!--///////////////////////DELETE/////////////-->

                          <div id="del{{ $detail->strMeasurementDetailID }}" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>Are you sure you want to delete?</center> </font> </h5>
                            <form action="{{URL::to('delMeasurementDetail')}}" method="POST"> 
                              <div class="modal-content">
                                <p>
                                  <div class="input-field">
                                    <input value="{{ $detail->strMeasurementDetailID }}" id="delDetailID" name="delDetailID" type="text"  readonly>
                                    <label for="measurement_id">Measurement ID: </label>
                                  </div>

                                  <div class="input-field">
                                    <input value="{{ $detail->strMeasurementDetailName }}" type="text"  readonly>
                                    <label for="measurement_name"> Measurement Name: </label>
                                  </div>

                                  <div class="input-field">
                                    <input value="{{ $detail->strMeasurementDetailDesc }}"type="text"  readonly>
                                    <label for="measurement_desc">Measurement Description: </label>
                                  </div>
                                </p>
                              </div>

                              <div class="modal-footer">
                                <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">OK</button>
                                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a>  
                              </div>
                            </form>
                          </div>
                      </tr>
                      @endif
                      @endforeach
                    </tbody>
                  </table>

                  </div>

                  <div class = "clearfix">

                  </div>
          
                  <div id="addMeasurementPart" class="modal modal-fixed-footer">
                    <h5><font color = "#1b5e20"><center>Add Measurement Part</center> </font> </h5>
                    <form action="{{URL::to('addMeasurementDetail')}}" method="POST">
                      <div class="modal-content">
                        <p>

                          <div class="input-field">
                            <input value="{{$detailNewID}}" id="addDetailID" name="addDetailID" type="text"  readonly>
                            <label for="measurement_id">Measurement ID: </label>
                          </div>

                          <div class="input-field">
                            <input required id="addDetailName" name= "addDetailName" type="text" class="validateDetailName" >
                            <label for="measurement_name"> *Measurement Name: </label>
                          </div>

                          <div class="input-field">
                            <input required id="addDetailDesc" name ="addDetailDesc" type="text" class="validateDetailDesc">
                            <label for="measurement_desc">*Measurement Description: </label>
                          </div>
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
        </div>
      </div>
  </div>

  @stop

@section('scripts')
    <script>
     $(document).ready(function(){
        $('ul.tabs').tabs();
        });
    </script>
    x
    <script>
      $(document).ready(function(){
      $('select').material_select();
      });
    </script>
    
    <script>
      function clearData(){
          document.getElementById('addDetailDesc').value = "";
          document.getElementById('addDetailName').value = "";
      }
    </script>

    <script type="text/javascript">
      $('.validateDetailName').on('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z," "]+$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });
      //Kapag Number
      $('.validateDetailName').keyup(function() {
        var name = $(this).val();
        $(this).val(name.replace(/\d/, ''));
      });     
      $('.validateDetailName').blur('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      }); 
      $('.validateDetailDesc').on('input', function() {
        var input=$(this);
        var is_desc=input.val();
        if(is_desc){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });
      $('.validateDetailDesc').blur('input', function() {
        var input=$(this);
        var is_desc=input.val();
        if(is_desc){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      }); 
</script>
         <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">
      $(document).ready(function() {
          $('.data-measDet').DataTable();
          $('.data-measHead').DataTable();
          $('select').material_select();
          
          setTimeout(function () {
            $('#success-message').hide();
        }, 5000);
      } );
    </script>


@stop