@extends('layouts.master')

@section('content')
  <div class="main-wrapper">
    <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Garment Segments</h4></span>
      </div>
    </div>

    <div class="row">
      <div class="col s12 m12 l12">
<<<<<<< HEAD
        <button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="Add a new segment to the table" href="#addSegment">ADD NEW SEGMENT</button>
        <button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="View deleted segments from the table" href="#modal1">VIEW SEGMENTS</button>
=======
        <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#addSegment">ADD NEW SEGMENT</button>
        <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#modal1">VIEW INACTIVE SEGMENTS</button>
>>>>>>> 60966d0449f456fce135a2da65515ed790d2bdf9
      </div>
    </div>
  </div>

  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h5><font color = "#1b5e20"><center>Inactive Garment Segments</center> </font> </h5>
      <table class = "table centered data-reactSegment" align = "center" border = "1">
        <thead>
          <tr>
            <!--<th data-field="id">Garment Details ID</th>-->
            <th data-field="name">Category Name</th>
            <th data-field="name">Segment Name</th>
            <th data-field="address">Segment Description</th>
            <th>Reactivate</th>
          </tr>
        </thead>

        <tbody>
            @foreach($segment2 as $segment2)
            @if($segment2->boolIsActive == 0)
            <tr>
              <!--<td>{{ $segment2->strGarmentSegmentID }}</td>-->
              <td>{{ $segment2->strGarmentCategoryName }}</td>
              <td>{{ $segment2->strGarmentSegmentName }}</td>
              <td>{{ $segment2->strGarmentSegmentDesc }}</td>
              <td>
                <form action="{{URL::to('reactGarmentSegment')}}" method="POST">
                  <input type="hidden" id="reactID" name="reactID" value="{{$segment2->strGarmentSegmentID}}">
                  <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="Returns data of segment to the table">REACTIVATE</button>
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
                    <th data-field="Delete">Delete</th>
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
              		  <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="Edit data of segment" href="#edit{{ $segment->strGarmentSegmentID }}">EDIT</button> </td>
                    <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="Delete segment from table" href="#del{{ $segment->strGarmentSegmentID }}">DELETE</button>
       
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
                        <h5><font color = "#1b5e20"><center>Are you sure you want to delete?</center> </font> </h5>
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
                                <input value="{{ $segment->strGarmentSegmentName }}"type="text" class="validate" readonly>
                                <label for="segment_name">Segment Name: </label>
                              </div>

                              <div class="input-field">
                                <input value="{{ $segment->strGarmentSegmentDesc }}" type="text" class="validate" readonly>
                                <label for="segment_description">Segment Description: </label>
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

      } );
    </script>

@stop
