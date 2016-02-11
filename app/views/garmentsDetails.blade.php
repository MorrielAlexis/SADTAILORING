@extends('layouts.master')

@section('content')
  <div class="main-wrapper">
    <div class="row">
      <div class="col s12 m12 l12">
      <span class="page-title"><h4>Garment Segments</h4></span>
    </div>

       <div class="row">
        <div class="col s12 m12 l6">
           <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#addSegment">ADD NEW SEGMENT</button>
         </div>
      </div>
     </div>


    <div class="row">
    	<div class="col s12 m12 l12">
    		<div class="card-panel">
   		    	<span class="card-title"><h5><center>Garment Segments</center></h5></span>
   				<div class="divider"></div>
    			<div class="card-content">
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
                <tr>
              		<td>{{ $segment->strGarmentSegmentID }}</td>
              		<td>{{ $segment->strGarmentCategoryName }}</td>
                  <td>{{ $segment->strSegmentName }}</td>
              		<td>{{ $segment->txtSegmentDesc }}</td>
              		<td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#{{ $segment->strGarmentSegmentID }}">EDIT</button>
                      
                      <div id="{{ $segment->strGarmentSegmentID }}" class="modal modal-fixed-footer">
                        <font color = "teal"><h5><center> Edit Segment Details </center></h5></font> 
                        <div class="modal-content">
                          <p>  
                          <form action="editGarmentSegment" method="POST">
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
                            <input value="{{ $segment->strSegmentName }}" id="editSegmentName" name= "editSegmentName" type="text" class="validate">
                            <label for="segment_name">Segment Name: </label>
                          </div>

                          <div class="input-field">
                            <input value="{{ $segment->txtSegmentDesc }}" id="SegmentDesc" name = "editSegmentDesc" type="text" class="validate">
                            <label for="segment_description"Segment Description: </label>
                          </div>
                          </p>
                        </div>

                        <div class="modal-footer">
                          <button type="submit" class=" modal-action modal-close waves-effect waves-green btn-flat">UPDATE</button>
                          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a>  
                        </div>
                      </form>
                      </td>
                    <tr>
                  @endforeach
                </tbody>
              </table>


    			    <div id="addSegment" class="modal modal-fixed-footer">
                <font color = "teal"><h5><center>ADD SEGMENT</center></h5> </font> 
                  <div class="modal-content">
                  <p>
                  <form action="/addGarmentSegment" method="POST">
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
                        <button type="submit" class=" modal-action modal-close waves-effect waves-green btn-flat">ADD</button>
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a> 
                      </div>
      	            </div>
                  </form>

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
