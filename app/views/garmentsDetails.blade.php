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
        <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#addSegment">ADD NEW SEGMENT</button>
        <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#modal1">VIEW SEGMENTS</button>
      </div>
    </div>
  </div>

  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>INACTIVE SEGMENTS</h4>
      <table class="centered" border="1">
        <thead>
          <tr>
            <th data-field="id">Garment Details ID</th>
            <th data-field="name">Category Name</th>
            <th data-field="name">Segment Name</th>
            <th data-field="address">Segment Description</th>

          </tr>
        </thead>

        <tbody>
            @foreach($segment2 as $segment2)
            @if($segment2->boolIsActive == 0)
            <tr>
              <td>{{ $segment2->strGarmentSegmentID }}</td>
              <td>{{ $segment2->strGarmentCategoryName }}</td>
              <td>{{ $segment2->strGarmentSegmentName }}</td>
              <td>{{ $segment2->strGarmentSegmentDesc }}</td>
              <td>
              <form action="{{URL::to('reactGarmentSegment')}}" method="POST">
              <input type="hidden" id="reactID" name="reactID" value="{{$segment2->strGarmentSegmentID}}">
              <button type="submit" class="waves-effect waves-light btn btn-small center-text">REACTIVATE</button></td>
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
   		    <span class="card-title"><h5><center>Garment Segments</center></h5></span>
   				<div class="divider"></div>
    			<div class="card-content">
              <div class="col s12 m12 l12 overflow-x">
      				<table class = "table centered data-garmentsDetails" align = "center" border = "1">
       			    <thead>
          				<tr>
              			<th data-field="id">Garment Details ID</th>
             		   	<th data-field="name">Category Name</th>
                    <th data-field="name">Segment Name</th>
              			<th data-field="address">Segment Description</th>
                    <th data-field="Edit">Action</th>
                    <th data-field="Edit">Action</th>
              			</tr>
                </thead>

                <tbody>
                  @foreach($segment as $segment)
                  @if($segment->boolIsActive == 1)
                  <tr>
              		  <td>{{ $segment->strGarmentSegmentID }}</td>
              		  <td>{{ $segment->strGarmentCategoryName }}</td>
                    <td>{{ $segment->strGarmentSegmentName }}</td>
              		  <td>{{ $segment->strGarmentSegmentDesc }}</td>
              		  <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit{{ $segment->strGarmentSegmentID }}">EDIT</button> </td>
                    <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#del{{ $segment->strGarmentSegmentID }}">DELETE</button>  </td>
                    </tr>

                              

                      <div id="edit{{ $segment->strGarmentSegmentID }}" class="modal modal-fixed-footer">
                        <font color = "teal"><h5><center> Edit Segment Details </center></h5></font>
                        <form action="{{URL::to('editGarmentSegment')}}" method="POST"> 
                          <div class="modal-content">
                            <p>  
                          
                              <div class="input-field">
                                <input value="{{ $segment->strGarmentSegmentID }}" id="editSegmentID" name="editSegmentID" type="text" class="validate" readonly>
                                <label for="garment_details_id">Garment Details ID: </label>
                              </div>

                              <div class="input-field">                                                    
                                <select required name="editCategory" id="editCategory">
                                  <option disabled>Pick a category</option>
                                  @foreach($category as $id=>$name)
                                    @if($segment->strCategory == $id)
                                      <option selected value="{{ $id }}">{{ $name }}</option>
                                    @else
                                      <option value="{{ $id }}">{{ $name }}</option>
                                    @endif
                                  @endforeach
                                </select>    
                              </div>   
                        
                              <div class="input-field">
                                <input required value="{{ $segment->strGarmentSegmentName }}" id="editSegmentName" name= "editSegmentName" type="text" class="validateSegName">
                                <label for="segment_name">Segment Name: </label>
                              </div>

                              <div class="input-field">

                                <input value="{{ $segment->strGarmentSegmentDesc }}" id="SegmentDesc" name = "editSegmentDesc" type="text" class="validateSegDesc">
                               <label for="segment_description">Segment Description:</label>
                              </div>
                            </p>
                          </div>

                          <div class="modal-footer">
                            <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">UPDATE</button>
                            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a>  
                          </div>
                        </form>
                      </div>
                    <!--***********************************************************-->
                      <div id="del{{ $segment->strGarmentSegmentID }}" class="modal modal-fixed-footer">
                        <font color = "teal"><h5><center>Are you sure you want to delete?</center></h5></font>
                        <form action="{{URL::to('delGarmentSegment')}}" method="POST"> 
                          <div class="modal-content">
                            <p>  
                          
                              <div class="input-field">
                                <input value="{{ $segment->strGarmentSegmentID }}" id="delSegmentID" name="delSegmentID" type="text" class="validate" readonly>
                                <label for="garment_details_id">Garment Details ID: </label>
                              </div>

                              <div class="input-field">                                                    
                                <select>
                                  <option disabled>Pick a category</option>
                                  @foreach($category as $id=>$name)
                                    @if($segment->strCategory == $id)
                                      <option selected value="{{ $id }}" disabled>{{ $name }}</option>
                                    @endif
                                  @endforeach
                                </select>    
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
                  
                  @endif
                  @endforeach
                </tbody>
              </table>

              </div>

              <div class = "clearfix">

              </div>


    			    <div id="addSegment" class="modal modal-fixed-footer">
                <font color = "teal"><h5><center>ADD SEGMENT</center></h5> </font> 
                <form action="{{URL::to('addGarmentSegment')}}" method="POST">
                  <div class="modal-content">
                    <p>
                      <div class="input-field">
                        <input value="{{ $newID }}" id="addSegmentID" name="addSegmentID" type="text" class="validate" readonly>
                        <label for="garment_details_id">Garment Segment ID: </label>
                      </div>

                      <div class="input-field">
                        <select name='addCategory' id='addCategory' required>
                              <option selected disabled>Pick a category</option>
                                @foreach($category as $id=>$name)
                                <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                        </select> 
                      </div>  

                      <div class="input-field">
                        <input required id="addSegmentName" name= "addSegmentName" type="text" class="validateSegName">
                        <label for="segment_name">Segment Name: </label>
                      </div>

                      <div class="input-field">

                        <input id="addSegmentDesc" name = "addSegmentDesc" type="text" class="validateSegDesc">

                        <label for="segment_description">Segment Description: </label>
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

<<<<<<< HEAD
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


=======

         <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">

      $(document).ready(function() {

          $('.data-garmentsDetails').DataTable();

      } );
    </script>

@stop
