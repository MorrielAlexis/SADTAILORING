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

  <!--MODAL: VIEW ALL EMPLOYEES-->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>ALL SEGMENTS</h4>
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
            <tr>
              <td>Segment ID</td>
              <td>Category Name</td>
              <td>Segment Name</td>
              <td>Segment Description</td>
              <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#">REACTIVATE</button></td>
            </tr>
        </tbody>
      </table>
    </div>
  
    <!--MODAL FOOTER-->
    <div class="modal-footer">
      <a href="#!" class="modal-action  waves-effect waves-green btn-flat">CLOSE</a>
    </div>
  </div>


    <div class="row">
    	<div class="col s12 m12 l12">
    		<div class="card-panel">
   		    <span class="card-title"><h5><center>Garment Segments</center></h5></span>
   				<div class="divider"></div>
    			<div class="card-content">
              <div class="col s12 m12 l12 overflow-x">
      				<table class = "centered" align = "center" border = "1">
       			    <thead>
          				<tr>
              			<th data-field="id">Garment Details ID</th>
             		   	<th data-field="name">Category Name</th>
                    <th data-field="name">Segment Name</th>
              			<th data-field="address">Segment Description</th>
              			</tr>
                </thead>

                <tbody>
                  @foreach($segment as $segment)
                  @if($segment->boolIsActive)
                  <tr>
              		  <td>{{ $segment->strGarmentSegmentID }}</td>
              		  <td>{{ $segment->strGarmentCategoryName }}</td>
                    <td>{{ $segment->strGarmentSegmentName }}</td>
              		  <td>{{ $segment->strGarmentSegmentDesc }}</td>
              		  <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit{{ $segment->strGarmentSegmentID }}">EDIT</button>
                    <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#del{{ $segment->strGarmentSegmentID }}">DELETE</button>                 

                      <div id="edit{{ $segment->strGarmentSegmentID }}" class="modal modal-fixed-footer">
                        <font color = "teal"><h5><center> Edit Segment Details </center></h5></font>
                        <form action="/editGarmentSegment" method="POST"> 
                          <div class="modal-content">
                            <p>  
                          
                              <div class="input-field">
                                <input value="{{ $segment->strGarmentSegmentID }}" id="editSegmentID" name="editSegmentID" type="text" class="validate" readonly>
                                <label for="garment_details_id">Garment Details ID: </label>
                              </div>

                              <div class="input-field">                                                    
                                <select name="editCategory" id="editCategory">
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
                                <input value="{{ $segment->strGarmentSegmentName }}" id="editSegmentName" name= "editSegmentName" type="text" class="validate">
                                <label for="segment_name">Segment Name: </label>
                              </div>

                              <div class="input-field">
                                <input value="{{ $segment->strGarmentSegmentDesc }}" id="SegmentDesc" name = "editSegmentDesc" type="text" class="validate">
                                <label for="segment_description"Segment Description: </label>
                              </div>
                            </p>
                          </div>

                          <div class="modal-footer">
                            <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">UPDATE</button>
                            <a href="#!" class=" modal-action  waves-effect waves-green btn-flat">CANCEL</a>  
                          </div>
                        </form>
                      </div>
                    <!--***********************************************************-->
                      <div id="del{{ $segment->strGarmentSegmentID }}" class="modal modal-fixed-footer">
                        <font color = "teal"><h5><center>Are you sure you want to delete?</center></h5></font>
                        <form action="/delGarmentSegment" method="POST"> 
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
                            <a href="#!" class=" modal-action  waves-effect waves-green btn-flat">CANCEL</a>  
                          </div>
                        </form>
                      </div>
                      <!--***********************************************************-->

                    </td>
                  <tr>
                  @endif
                  @endforeach
                </tbody>
              </table>

              </div>

              <div class = "clearfix">

              </div>


    			    <div id="addSegment" class="modal modal-fixed-footer">
                <font color = "teal"><h5><center>ADD SEGMENT</center></h5> </font> 
                <form action="/addGarmentSegment" method="POST">
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
                        <input id="addSegmentName" name= "addSegmentName" type="text" class="validate">
                        <label for="segment_name">Segment Name: </label>
                      </div>

                      <div class="input-field">
                        <input id="addSegmentDesc" name = "addSegmentDesc" type="text" class="validate">
                        <label for="segment_description">Segment Description: </label>
                      </div>
                    </p>
                  </div>

                  <div class="modal-footer">
                    <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">ADD</button>
                    <a href="#!" class=" modal-action  waves-effect waves-green btn-flat">CANCEL</a> 
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
    </script>}

@stop
