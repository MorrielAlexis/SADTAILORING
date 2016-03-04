@extends('layouts.master')

@section('content')
  
  

 <!--<p><h4 style="lightpink">Measurements</h4></p>-->
    <div class="row" style="padding:20px">
    
    <!--Measurement Tabs-->
      <div class="col s12" id="measurements" name="measurements">
        <ul class="tabs" style="background: transparent;">
          <li id="detailTab" class="tab col s3"><a style="color:black; padding-top:5px; opacity:0.80" class="tooltipped center-text" accent data-position="bottom" data-delay="50" data-tooltip="Click to see to parts being measured" href="#tabDetails"><b>Details</b></a></li>     
          <li id="categoryTab" class="tab col s3"><a style="color:black; padding-top:5px; opacity:0.80" class="tooltipped center-text" accent data-position="bottom" data-delay="50" data-tooltip="CLick to see measurement details about a particular garment" href="#tabCategory"><b>Category</b></a></li>
          <div class="indicator white" style="z-index:1"></div>
        </ul>
    
    <!--Tab Contents-->
    <!--Measurement Category-->
        <div id="tabCategory" class="hue col s12">

          <div class="main-wrapper">
             <!--Add Measurement Info-->
              @if (Input::get('success') == 'true')
                <div class="row" id="success-message">
                  <div class="col s12 m12 l12">
                    <div class="card-panel yellow">
                      <span class="black-text" style="color:black">Successfully added measurement information!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
                    </div>
                  </div>
                </div>
              @endif


             <!--Edit Measurement Info-->
             @if (Input::get('successEdit') == 'true')
                <div class="row" id="success-message">
                  <div class="col s12 m12 l12">
                    <div class="card-panel yellow">
                      <span class="black-text" style="color:black">Successfully edited measurement information!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
                    </div>
                  </div>
                </div>
              @endif 


              <!--Delete Measurement Info-->
              @if (Input::get('successDel') == 'true')
                <div class="row" id="success-message">
                  <div class="col s12 m12 l12">
                    <div class="card-panel yellow">
                      <span class="black-text" style="color:black">Successfully deactivated measurement information!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
                    </div>
                  </div>
                </div>
              @endif

              <!--Reactivate Measurement Info-->
              @if (Input::get('successRec') == 'true')
                <div class="row" id="success-message">
                  <div class="col s12 m12 l12">
                    <div class="card-panel yellow">
                      <span class="black-text" style="color:black">Successfully added back measurement information!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
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
              </div>
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
                          <th data-field="MeasurementName">Edit</th>
                          <th data-field="MeasurementName">Deactivate</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($head as $head)
                        @if($head->boolIsActive == 1)
                        <tr>   
                          <!--<td>{{ $head->strMeasurementID }}</td>-->
                          <td>{{ $head->strGarmentCategoryName }}</td>
                          <td>{{ $head->strGarmentSegmentName }}</td>
                          <td>{{ $head->meas_details }}</td>
                          <td><button style = "color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit measurement information" href="#edit{{$head->strMeasurementID}}">EDIT</button></td>
                          <td><button style = "color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit measurement information" href="#del{{$head->strMeasurementID}}">DEACTIVATE</button></td>

                          

                            <div id="edit{{$head->strMeasurementID}}" class="modal modal-fixed-footer">
                              <font color = "teal"><center><h5> Edit Measurement Info </h5></center></font>
                              <form action="{{URL::to('editMeasurementCategory')}}" method="POST"> 
                                <div class="modal-content"> 
                                  <p>
                                  
                                    <div class="input-field">
                                      <input value="{{ $head->strMeasurementID }}" id="editMeasurementID" name="editMeasurementID" type="hidden" readonly>                                 
                                    </div>

                                    <div class="input-field">                                                    
                                      <select class="browser-default" required name='editCategory' id='editCategory'> 
                                        @foreach($category as $cat)
                                            @if($head->strCategoryName == $cat->strGarmentCategoryID)
                                              <option value="{{ $cat->strGarmentCategoryID }}" selected>{{ $cat->strGarmentCategoryName }}</option> 
                                            @else
                                              <option value="{{ $cat->strGarmentCategoryID }}">{{ $cat->strGarmentCategoryName }}</option>
                                            @endif 
                                        @endforeach                                  
                                      </select>    
                                    </div>       
                                      
                                    <div class="input-field">                                                    
                                      <select class="browser-default" required name='editSegment' id='editSegment'>
                                        @foreach($segment as $seg)
                                          @if($head->strSegmentName == $seg->strGarmentSegmentID)
                                            <option value="{{ $seg->strGarmentSegmentID }}" class="{{ $seg->strCategory }}" selected>{{ $seg->strGarmentSegmentName }}</option>
                                          @else
                                            <option value="{{ $seg->strGarmentSegmentID }}" class="{{ $seg->strCategory }}">{{ $seg->strGarmentSegmentName }}</option>
                                          @endif
                                        @endforeach
                                      </select>    
                                    </div>     

                                    <div class="input-field">                                                                               
                                      <select multiple name='editDetail[]' id='editDetail[]' required>
                                          @foreach($detailList as $dl)
                                              <option value ="{{ $dl->strMeasurementDetailID }}" 
                                                @for($i = 0; $i < count($expHead); $i++)
                                                  @for($j = 0; $j < count($expHead[$i]); $j++)  
                                                    @if($expHead[$i][$j] == $dl->strMeasurementDetailID)
                                                      selected="selected"
                                                    @endif
                                                  @endfor
                                                @endfor
                                              >{{$dl->strMeasurementDetailName}}</option>
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

                          <!--///////////////////////DELETE/////////////-->

                          <div id="del{{$head->strMeasurementID}}" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>Are you sure you want to deactivate measurement detail?</center> </font> </h5>
                              <div class="modal-content">
                            <form action="{{URL::to('delMeasurementCategory')}}" method="POST"> 
                                <p>
                                  <div class="input-field">
                                      <input value="{{ $head->strMeasurementID }}" id="delMeasurementID" name="delMeasurementID" type="hidden" readonly>                                 
                                    </div>

                                  <div class="input-field">
                                    <input value="{{ $head->strGarmentCategoryName }}" type="text" readonly>
                                    <label for="measurement_id">Garment Category: </label>
                                  </div>

                                  <div class="input-field">
                                    <input value="{{ $head->strGarmentSegmentName }}" type="text" readonly>
                                    <label for="measurement_name">Segment: </label>
                                  </div>

                                  <div class="input-field">
                                    <input value="{{ $head->meas_details }}" type="text" readonly>
                                    <label for="measurement_desc">Measurement Name: </label>
                                  </div>

                                  <div class="input-field">
                                      <input value="{{ $head->strMeasurementID }}" id="delInactiveHead" name="delInactiveHead" type="hidden">                                 
                                    </div>

                                  <div class="input-field">
                                    <input value="{{ $head->strInactiveReason }}" id="delInactiveReason" name="delInactiveReason" type="text" class="validate" required>
                                    <label for="measurement_desc">Reason for Deactivation: </label>
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

                  <div id="addMeasurementInfo" class="modal modal-fixed-footer">
                    <h5><font color = "#1b5e20"><center>Add Measurement Information</center> </font> </h5> 
                      <div class="modal-content">
                        <p>
                          <form action="{{URL::to('addMeasurementCategory')}}" method="POST">
                          <div class="input-field">
                            <input value="{{ $categoryNewID }}" id="addMeasurementID" name="addMeasurementID" type="text" hidden>
                          </div>

                          <div class="input-field">                                                    
                              <select class="browser-default" required id="addCategory" name='addCategory'>                                      
                                  @foreach($category as $category)
                                    <option value="{{ $category->strGarmentCategoryID }}">{{ $category->strGarmentCategoryName }}</option>
                                  @endforeach
                              </select>    
                          </div>        
                
                          <div class="input-field">                                                    
                            <select class="browser-default" required id="addSegment" name='addSegment'>
                                @foreach($segment as $segment)
                                    <option value="{{ $segment->strGarmentSegmentID }}" class="{{ $segment->strCategory }}">{{ $segment->strGarmentSegmentName }}</option>
                                @endforeach                          
                            </select>    
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
                <!--Add Measurement Part-->
                 @if (Input::get('success') == 'true')
                    <div class="row" id="success-message">
                      <div class="col s12 m12 l12">
                        <div class="card-panel yellow">
                          <span class="black-text" style="color:black">Successfully added measurement part!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
                        </div>
                      </div>
                    </div>
                  @endif

                <!--Edit Measurement Part-->
                @if (Input::get('successEdit') == 'true')
                    <div class="row" id="success-message">
                      <div class="col s12 m12 l12">
                        <div class="card-panel yellow">
                          <span class="black-text" style="color:black">Successfully edited measurement part!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
                        </div>
                      </div>
                    </div>
                  @endif

                  <!--Delete Measurement Part-->
                  @if (Input::get('successDel') == 'true')
                    <div class="row" id="success-message">
                      <div class="col s12 m12 l12">
                        <div class="card-panel yellow">
                          <span class="black-text" style="color:black">Successfully deactivated measurement part!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
                        </div>
                      </div>
                    </div>
                  @endif


                  <!--Reactivate Measurement Part-->
                  @if (Input::get('successRec') == 'true')
                    <div class="row" id="success-message">
                      <div class="col s12 m12 l12">
                        <div class="card-panel yellow">
                          <span class="black-text" style="color:black">Successfully added back measurement part!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
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
                        <th data-field="action">Deactivate</th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach($detail as $detail)
                      @if($detail->boolIsActive == 1)
                      <tr>
                        <td>{{ $detail->strMeasurementDetailName }}</td>
                        <td>{{ $detail->strMeasurementDetailDesc }}</td>
                        <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit measurement detail" href="#edit{{ $detail->strMeasurementDetailID }}">EDIT</button></td>
                        <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to deactivate measurement detail from the table" href="#del{{ $detail->strMeasurementDetailID }}">DEACTIVATE</button></td>

                          <div id="edit{{ $detail->strMeasurementDetailID }}" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>Edit Measurement Part</center> </font> </h5>
                              <div class="modal-content">
                            <form action="{{URL::to('editMeasurementDetail')}}" method="POST"> 
                                <p>
                                  <div class="input-field">
                                    <input value="{{ $detail->strMeasurementDetailID }}" id="editDetailID" name="editDetailID" type="text"  hidden>
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
                            <h5><font color = "#1b5e20"><center>Are you sure you want to deactivate measurement detail?</center> </font> </h5>
                              <div class="modal-content">
                            <form action="{{URL::to('delMeasurementDetail')}}" method="POST"> 
                                <p>
                                  <div class="input-field">
                                    <input value="{{ $detail->strMeasurementDetailID }}" id="delDetailID" name="delDetailID" type="hidden">
                                  </div>

                                  <div class="input-field">
                                    <input value="{{ $detail->strMeasurementDetailName }}" type="text"  readonly>
                                    <label for="measurement_name"> Measurement Name: </label>
                                  </div>

                                  <div class="input-field">
                                    <input value="{{ $detail->strMeasurementDetailDesc }}"type="text"  readonly>
                                    <label for="measurement_desc">Measurement Description: </label>
                                  </div>

                                  <div class="input-field">
                                    <input value="{{ $detail->strMeasurementDetailID }}" id="delInactiveDetail" name="delInactiveDetail" type="hidden">
                                  </div>

                                  <div class="input-field">
                                    <input value="{{ $detail->strInactiveReason }}" id="delInactiveReason" name="delInactiveReason" type="text"  required>
                                    <label for="measurement_desc">Reason for Deactivation: </label>
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
                      <div class="modal-content">
                    <form action="{{URL::to('addMeasurementDetail')}}" method="POST">
                        <p>

                          <div class="input-field">
                            <input value="{{$detailNewID}}" id="addDetailID" name="addDetailID" type="text"  hidden>
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
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
    <script>
      // $(document).ready() executes this script AFTER the whole page loads
      $(document).ready(function () {
        // Get jQuery object for element with ID as 'category' (first select element)
        var categoryElement = $('#addCategory');

        // Get jQuery object for element with ID as 'types' (second select element)
        var typesElement = $('#addSegment');

        // Get children elements of typesElement
        var typeOptions = typesElement.children();

        // Invoke updateValue() once with initial category value for initial page load
        updateValue(categoryElement.val());

        // Listen for changes on the categoryElement
        categoryElement.on('change', function () {
          // Invoke updateValue() with currently selected category as parameter
          updateValue(categoryElement.val());
        });

        // Define default current type
        var defaultType = '';

        // updateValue function definition
        function updateValue(category) {
          // On update, show everything first
          typeOptions.show();

          // Set default type to empty string for All
          defaultType = '';

          // If the selected category is all, do not hide anything
          if (category == 'All') return;

          // Iterate over options (children elements of typesElement)
          for (var i = 0; i < typeOptions.length; i++) {
            // Return each child as jQuery object
            var optionElement = $(typeOptions[i]);

            // Check class of optionElement, hide it if it's not equal to the current selected category
            if (!optionElement.hasClass(category)) optionElement.hide();

            // Check class of optionElement if it matches currently selected category AND if defaultType is an empty string,
            // if the evaluation is true, set defaultType to optionElement value. We do this to set the default value
            // when we pick another category
            if (optionElement.hasClass(category) && defaultType == '') defaultType = optionElement.attr('value');
          }

          // If defaultType is not empty string, set it as typesElement value
          if (defaultType != '') typesElement.val(defaultType);
        }
      });
    </script>

    <script>
      // $(document).ready() executes this script AFTER the whole page loads
      $(document).ready(function () {
        // Get jQuery object for element with ID as 'category' (first select element)
        var categoryElement = $('#editCategory');

        // Get jQuery object for element with ID as 'types' (second select element)
        var typesElement = $('#editSegment');

        // Get children elements of typesElement
        var typeOptions = typesElement.children();

        // Invoke updateValue() once with initial category value for initial page load
        updateValue(categoryElement.val());

        // Listen for changes on the categoryElement
        categoryElement.on('change', function () {
          // Invoke updateValue() with currently selected category as parameter
          updateValue(categoryElement.val());
        });

        // Define default current type
        var defaultType = '';

        // updateValue function definition
        function updateValue(category) {
          // On update, show everything first
          typeOptions.show();

          // Set default type to empty string for All
          defaultType = '';


          // Iterate over options (children elements of typesElement)
          for (var i = 0; i < typeOptions.length; i++) {
            // Return each child as jQuery object
            var optionElement = $(typeOptions[i]);

            // Check class of optionElement, hide it if it's not equal to the current selected category
            if (!optionElement.hasClass(category)) optionElement.hide();

            // Check class of optionElement if it matches currently selected category AND if defaultType is an empty string,
            // if the evaluation is true, set defaultType to optionElement value. We do this to set the default value
            // when we pick another category
            if (optionElement.hasClass(category) && defaultType == '') defaultType = optionElement.attr('value');
          }

          // If defaultType is not empty string, set it as typesElement value
          if (defaultType != '') typesElement.val(defaultType);
        }
      });
    </script>



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