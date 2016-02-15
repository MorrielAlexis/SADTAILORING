@extends('layouts.master')


@section('content')
  <div class="main-wrapper">
    <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Design Pattern</h4></span>
      </div>
    </div>

    <div class="row">
      <div class="col s12 m12 l6">
          <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#addDesign">ADD DESIGN PATTERN</button>
          <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#modal1">VIEW INACTIVE DESIGN PATTERNS</button>
      </div>
    </div>
  </div>

  <!--MODAL: VIEW ALL EMPLOYEES-->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>INACTIVE DESIGN PATTERNS</h4>
      <table class="centered" border="1">
        <thead>
          <tr>
            <th data-field= "Catalog ID">Design Pattern ID</th>
            <th data-field="Garment Name">Segment Name </th>
            <th data-field="Pattern Name">Pattern Name</th>
            <th data-field="Pattern Image">Pattern Image</th>
          </tr>
        </thead>

        <tbody>
            @foreach($pattern2 as $pattern2)
            @if($pattern2->boolIsActive == 0)
                <tr>
                  <td>{{ $pattern2->strDesignPatternID }}</td>
                  <td>{{ $pattern2->strGarmentSegmentName }}</td>
                  <td>{{ $pattern2->strPatternName }}</td>
                  <td>Click here to view image</td>
                  <td>
                  <form action="/reactDesignPattern" method="POST">
                  <input type="hidden" value="{{ $pattern2->strDesignPatternID }}" id="reactID" name="reactID">
                  <button type="submit" class="waves-effect waves-green btn btn-small center-text">REACTIVATE</button>
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
        <span class="card-title"><h5><center>Design Pattern Details</center></h5></span>
        <div class="divider"></div>

    		<div class="card-content"> 
            <div class="col s12 m12 l12 overflow-x">
      			<table class = "centered" align = "center" border = "1">
       				<thead>
          			<tr>
                  <th data-field= "Catalog ID">Design Pattern ID</th>
              		<th data-field="Garment Name">Segment Name </th>
             		  <th data-field="Pattern Name">Pattern Name</th>
              		<th data-field="Pattern Image">Pattern Image</th>
              	</tr>
              </thead>

              <tbody>
                @foreach($pattern as $pattern)
                @if($pattern->boolIsActive == 1)
                <tr>
              		<td>{{ $pattern->strDesignPatternID }}</td>
                  <td>{{ $pattern->strGarmentSegmentName }}</td>
              		<td>{{ $pattern->strPatternName }}</td>
                  <td>Click here to view image</td>
              		<td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit{{ $pattern->strDesignPatternID }}">EDIT</button></td>
                  <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#del{{ $pattern->strDesignPatternID }}">DELETE</button>
                      
                    <div id="edit{{ $pattern->strDesignPatternID }}" class="modal modal-fixed-footer">
                      <font color = "teal"><center><h5> Edit Design Pattern Details</h5></center></font>
                      <div class="modal-content">
                        <p>
                        <form action="/editDesignPattern" method="POST">
                        <div class="input-field">
                          <input value= "{{ $pattern->strDesignPatternID }}" id="editPatternID" name= "editPatternID" type="text" readonly class="validate">
                          <label for="pattern_id">Pattern ID: </label>
                        </div>

                        <div class="input-field">                                                    
                          <select name='editSegment'>
                            <option disabled>Pick a segment</option>
                              @foreach($segment as $id=>$name)
                                  @if($pattern->strDesignSegmentName == $id)
                                    <option selected value="{{ $id }}">{{ $name }}</option>
                                  @else
                                    <option value="{{ $id }}">{{ $name }}</option>
                                  @endif
                              @endforeach
                          </select>    
                        </div>   

                        <div class="input-field">
                          <input value = "{{ $pattern->strPatternName }}" id="editPatternName" name= "editPatternName" type="text" class="validate">
                          <label for="pattern_name">Pattern Name: </label>
                        </div>

                        <div class="file-field input-field">
                          <div class="btn">
                            <span>Upload Image</span>
                            <input type="file">
                          </div>

                          <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                          </div>
                        </div>
                        </p>
                      </div>
                  
                      <!-- DELETE DESIGN PATTERN -->
                      <div class="modal-footer">
                        <button type="submit" class=" modal-action modal-close waves-effect waves-green btn-flat">OK</button>
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a> 
                      </div>
                    </form>
                 </div>   
                <div id="del{{ $pattern->strDesignPatternID }}" class="modal modal-fixed-footer">
                      <font color = "teal"><center><h5>Are you sure you want to delete?</h5></center></font>
                      <div class="modal-content">
                        <p>
                        <form action="/delDesignPattern" method="POST">
                        <div class="input-field">
                          <input value= "{{ $pattern->strDesignPatternID }}" id="delPatternID" name= "delPatternID" type="text" readonly class="validate">
                          <label for="pattern_id">Pattern ID: </label>
                        </div>

                        <div class="input-field">                                                    
                          <select name='editSegment'>
                            <option disabled>Pick a segment</option>
                              @foreach($segment as $id=>$name)
                                  @if($pattern->strDesignSegmentName == $id)
                                    <option selected value="{{ $id }}" disabled>{{ $name }}</option>
                                  @endif
                              @endforeach
                          </select>    
                        </div>   

                        <div class="input-field">
                          <input value = "{{ $pattern->strPatternName }}" type="text" class="validate" readonly>
                          <label for="pattern_name">Pattern Name: </label>
                        </div>

                        <div class="file-field input-field">
                          <div class="btn">
                            <span>Upload Image</span>
                            <input type="file">
                          </div>

                          <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                          </div>
                        </div>
                        </p>
                      </div>               
 
                      <div class="modal-footer">
                        <button type="submit" class=" modal-action modal-close waves-effect waves-green btn-flat">GO</button>
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
           

            <div id="addDesign" class="modal modal-fixed-footer">
              <font color = "teal" ><center><h5> Add Design Pattern </h5></center></font> 
              <div class="modal-content">
                <p>
                <form action="/addDesignPattern" method="POST">
                <div class="input-field">
                  <input value = "{{$newID}}" id="addPatternID" name= "addPatternID" type="text" readonly class="validate">
                  <label for="pattern_id">Pattern ID: </label>
                </div>

                <div class="input-field">
                  <select id="addSegment" name="addSegment">
                    <option disabled selected>Choose a segment:</option>
                        @foreach($segment as $id=>$name)
                          <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                  </select>

                </div>   

                <div class="input-field">
                  <input id="addPatternName" name= "addPatternName" type="text" class="validate">
                  <label for="pattern_name">Pattern Name: </label>
                </div>

                <div class="file-field input-field">
                  <div class="btn">
                    <span>Upload Image</span>
                    <input type="file">
                  </div>

                  <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                  </div>
                </div>

                </p>
              </div>

              <div class="modal-footer">
                <button type="submit" class=" modal-action modal-close waves-effect waves-green btn-flat">ADD</button>
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a> 
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
    </script>
    
@stop
