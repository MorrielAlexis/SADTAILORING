@extends('layouts.master')

@section('content')
  <div class="main-wrapper">
      <!--Add Garment Segment-->
         @if (Input::get('success') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added garment segment!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif


      <!--Edit Garment Segment-->
      @if (Input::get('successEdit') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully edited garment segment!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif


      <!--Deleted Garment Segment-->
      @if (Input::get('successDel') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully deleted garment segment!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif


      <!--Reactivate Garment Segment-->
      @if (Input::get('successRec') == 'true')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel yellow">
              <span class="black-text" style="color:black">Successfully added back garment segment!<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
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


      <!--  <Data Dependency Message> -->
       @if (Input::get('success') == 'beingUsed')
        <div class="row" id="success-message">
          <div class="col s12 m12 l12">
            <div class="card-panel red">
              <span class="black-text" style="color:black">Sorry! Segment cannot be deactivated!Segment is still affiliated with other materials.<i class="material-icons right" onclick="$('#success-message').hide()">clear</i></span>
            </div>
          </div>
        </div>
      @endif

    <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Garment Segments</h4></span>
      </div>
    </div>

    <div class="row">
      <div class="col s12 m12 l12">
        <button style="color:black; margin-right:35px; margin-left: 20px" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to add a new segment to the table" href="#addSegment">ADD NEW SEGMENT</button>
      </div>
    </div>
  </div>

    <div class="row">
    	<div class="col s12 m12 l12">
    		<div class="card-panel">
   		    <span class="card-title"><h5 style="color:#1b5e20"><center>Garment Segments</center></h5></span>
   				<div class="divider"></div>
    			<div class="card-content">
              <div class="col s12 m12 l12 overflow-x">
      				<table class = "table centered data-garmentsDetails" align = "center" border = "1">
       			    <thead>
          				<tr>
              			<!--<th data-field="id">Garment Details ID</th>-->
             		   	<th data-field="name">Category Name</th>
                    <th data-field="name">Segment Name</th>
              			<th data-field="address">Segment Description</th>
                    <th data-field="Edit">Edit</th>
                    <th data-field="Delete">Deactivate</th>
              		</tr>
                </thead>

                <tbody>
                  @foreach($segment as $segment)
                  @if($segment->boolIsActive == 1)
                  <tr>
              		  <!--<td>{{ $segment->strGarmentSegmentID }}</td>-->
              		  <td>{{ $segment->strGarmentCategoryName }}</td>
                    <td>{{ $segment->strGarmentSegmentName }}</td>
              		  <td>{{ $segment->strGarmentSegmentDesc }}</td>
              		  <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit data of segment" href="#edit{{ $segment->strGarmentSegmentID }}">EDIT</button> </td>
                    <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of segment from table" href="#del{{ $segment->strGarmentSegmentID }}">DEACTIVATE</button>
       
                      <div id="edit{{ $segment->strGarmentSegmentID }}" class="modal modal-fixed-footer">
                        <h5><font color = "#1b5e20"><center>Edit Garment Segment</center> </font> </h5>
                        <form action="{{URL::to('editGarmentSegment')}}" method="POST"> 
                          <div class="modal-content">
                            <p>  
                          
                              <div class="input-field">
 
                                <input value="{{ $segment->strGarmentSegmentID }}" id="editSegmentID" name="editSegmentID" type="text" class="" readonly>
                                <label for="garment_details_id">Garment Details ID: </label>

                                <input value="{{ $segment->strGarmentSegmentID }}" id="editSegmentID" name="editSegmentID" type="hidden">
 
                              </div>

                              <div class="input-field">                                                    
                                <select required name="editCategory" id="editCategory">
                                  @foreach($category2 as $cat)
                                    @if($segment->strCategory == $cat->strGarmentCategoryID && $cat->boolIsActive == 1)
                                      <option selected value="{{ $cat->strGarmentCategoryID }}">{{ $cat->strGarmentCategoryName }}</option>
                                    @elseif($cat->boolIsActive == 1)
                                      <option value="{{ $cat->strGarmentCategoryID }}">{{ $cat->strGarmentCategoryName }}</option>
                                    @endif
                                  @endforeach
                                </select>    
                                <label>Category Name:</label>
                              </div>   
                        
                              <div class="input-field">
                                <input required value="{{ $segment->strGarmentSegmentName }}" id="editSegmentName" name= "editSegmentName" type="text" class="validateSegName">
                                <label for="segment_name">*Segment Name: </label>
                              </div>

                              <div class="input-field">

                                <input required value="{{ $segment->strGarmentSegmentDesc }}" id="SegmentDesc" name = "editSegmentDesc" type="text" class="validateSegDesc">
                               <label for="segment_description">*Segment Description:</label>
                              </div>
                            </p>
                          </div>

                          <div class="modal-footer">
                            <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">UPDATE</button>
                            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a>  
                          </div>
                        </form>
                      </div>
                    <!--***************************Soft Delete********************************-->
                      <div id="del{{ $segment->strGarmentSegmentID }}" class="modal modal-fixed-footer">
                        <h5><font color = "#1b5e20"><center>Are you sure you want to deactivate the segment?</center> </font> </h5>
                        <form action="{{URL::to('delGarmentSegment')}}" method="POST"> 
                          <div class="modal-content">
                            <p>  
                          
                              <div class="input-field">
                                <input value="{{ $segment->strGarmentSegmentID }}" id="delSegmentID" name="delSegmentID" type="hidden">
                              </div>

                              <div class="input-field">                                                    
                                  <input type="text" value="{{$segment->strGarmentCategoryName}}">
                                  <label>Category Name:</label>
                              </div>   

                              <div class="input-field">
                                <input value="{{ $segment->strGarmentSegmentName }}"type="text" readonly>
                                <label for="segment_name">Segment Name: </label>
                              </div>

                              <div class="input-field">
                                <input value="{{ $segment->strGarmentSegmentDesc }}" type="text" readonly>
                                <label for="segment_description">Segment Description: </label>
                              </div>

                              <div class="input-field">
                                <input value="{{ $segment->strGarmentSegmentID }}" id="delInactiveSegment" name="delInactiveSegment" type="hidden">
                              </div>

                              <div class="input-field">
                                <input value="{{ $segment->strInactiveReason }}" id="delInactiveReason" name="delInactiveReason" type="text" class="validate" required>
                                <label for="segment_description">*Reason for Deactivation: </label>
                              </div>
                            </p>
                          </div>

                          <div class="modal-footer">
                            <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">GO</button>
                            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a>  
                          </div>
                        </form>
                      </div>
                      <!--***********************************************************-->
                    </td>
                    </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>

              </div>

              <div class = "clearfix">

              </div>


    			    <div id="addSegment" class="modal modal-fixed-footer">
                <h5><font color = "#1b5e20"><center>Add Garment Segment</center> </font> </h5> 
                <form action="{{URL::to('addGarmentSegment')}}" method="POST">
                  <div class="modal-content">
                    <p>
                      <div class="input-field">
                        <input value="{{ $newID }}" id="addSegmentID" name="addSegmentID" type="hidden">
                      </div>

                      <div class="input-field">
                        <select name='addCategory' id='addCategory' required>
                          @foreach($category as $category)
                          <option value="{{ $category->strGarmentCategoryID }}">{{ $category->strGarmentCategoryName }}</option>
                          @endforeach
                        </select> 
                        <label >Category</label>
                      </div>  

                      <div class="input-field">
                        <input required id="addSegmentName" name= "addSegmentName" type="text" class="validateSegName">
                        <label for="segment_name">*Segment Name: </label>
                      </div>

                      <div class="input-field">
                        <input required pattern="[A-Za-z\s]+" id="addSegmentDesc" name = "addSegmentDesc" type="text" class="validateSegDesc">
                        <label for="segment_description">*Segment Description: </label>
                      </div>
                    </p>
                  </div>

                  <div class="modal-footer">
                    <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">ADD</button>
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
    </script>}
    
    <script>
      function clearData(){
            document.getElementById("addSegmentDesc").value = "";
            document.getElementById("addSegmentName").value = "";
        }
    </script>

    <script type="text/javascript">
      $('.validateSegName').on('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z," "]+$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      //Kapag Number
      $('.validateSegName').keyup(function() {
        var name = $(this).val();
        $(this).val(name.replace(/\d/, ''));
      });     

      $('.validateSegName').blur('input', function() {
        var input=$(this);
        var is_name=input.val();
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      }); 

      $('.validateSegDesc').on('input', function() {
        var input=$(this);
        var is_desc=input.val();
        if(is_desc){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateSegDesc').blur('input', function() {
        var input=$(this);
        var is_desc=input.val();
        if(is_desc){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      }); 
      </script>
         <!--DATA TABLE SCRIPT-->

    <script type="text/javascript">

      $(document).ready(function() {
          $('.data-garmentsDetails').DataTable();
          $('.data-reactSegment').DataTable();
          $('select').material_select();

          setTimeout(function () {
            $('#success-message').hide();
        }, 5000);

      } );
    </script>

@stop
