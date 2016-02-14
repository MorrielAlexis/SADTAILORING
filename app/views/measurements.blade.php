@extends('layouts.master')

@section('content')
  
  

  <p><h4 style="lightpink">Measurements</h4></p>
  <div class="row">
    
    <!--Measurement Tabs-->
    <div class="col s12" id="measurements" name="measurements">
      <ul class="tabs">
        <li class="tab col s3"><a style="color:teal" href="#tabCategory"><b>Category</b></a></li>
        <li class="tab col s3"><a style="color:teal" href="#tabDetails"><b>Details</b></a></li>
      </ul>
    
    
    <!--Tab Contents-->
    <!--Measurement Category-->
    <div id="tabCategory" class="hue col s12">

    <div class="main-wrapper">
      <div class="row">
        <div class="col s12 m12 l12">
          <span class="page-title"><h4>Measurement Information</h4></span>
        </div>
      </div>

      <div class="row">
        <div class="col s12 m12 l6">
          <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#addMeasurementInfo"> ADD MEASUREMENT INFO </button>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
          <span class="card-title"><h5><center>Measurement Category</center></h5></span>
          <div class="divider"></div>
          <div class="card-content">

            <table class = "centered" align = "center" border = "1">
              <thead>
                <tr>
                  <th data-field = "MeasurementID"> Measurement ID </th>
                  <th data-field="Garmentcategory">Garment Category</th>
                  <th data-field="Garmentcategory">Segment</th>
                  <th data-field="MeasurementName">Measurement Name</th>
                </tr>
              </thead>

              <tbody>
                @foreach($head as $head)
                @if($head->boolIsActive == 1)
                <tr>   
                  <td>{{ $head->strMeasurementID }}</td>
                  <td>{{ $head->strGarmentCategoryName }}</td>
                  <td>{{ $head->strGarmentSegmentName }}</td>
                  <td>{{ $head->strMeasurementDetailName }}</td>
                  <td>
                  <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit{{$head->strMeasurementID}}">EDIT</button>
                  <td>
                  <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#del{{$head->strMeasurementID}}">DELETE</button>

                    <div id="edit{{$head->strMeasurementID}}" class="modal modal-fixed-footer">
                      <font color = "teal"><center><h5> Edit Measurement Info </h5></center></font> 
                      <div class="modal-content"> 
                        <p>
                        <form action="/editMeasurementCategory" method="POST">
                        <div class="input-field">
                          <input value="{{ $head->strMeasurementID }}" id="editMeasurementID" name="editMeasurementID" type="text" class="validate" readonly>
                          <label for="measurement_id">Measurement ID: </label>
                        </div>

                        <div class="input-field">                                                    
                          <select name='editCategory'>
                             <option disabled>Pick a category</option>
                                @foreach($category as $id=>$name)
                                  @if($head->strCategoryName == $id)
                                    <option selected value="{{ $id }}">{{ $name }}</option>
                                  @else
                                    <option value="{{ $id }}">{{ $name }}</option>
                                  @endif
                                @endforeach
                          </select>    
                        </div>       
                        
                        <div class="input-field">                                                    
                          <select name='editSegment'>
                            <option disabled>Pick a segment</option>
                              @foreach($segment as $id=>$name)
                                @if($head->strSegmentName == $id)
                                  <option selected value="{{ $id }}">{{ $name }}</option>
                                @else
                                  <option value="{{ $id }}">{{ $name }}</option>
                                @endif
                              @endforeach
                          </select>    
                        </div>     

                        <div class="input-field">                                                    
                          <select name='editDetail'>
                            <option disabled>Pick a detail</option>
                              @foreach($detailList as $id=>$name)
                                @if($head->strMeasurementName == $id)
                                  <option selected value="{{ $id }}">{{ $name }}</option>
                                @else
                                  <option value="{{ $id }}">{{ $name }}</option>
                                 @endif
                              @endforeach
                          </select>    
                        </div>   
                         </p>
                      </div>         
                      <div class="modal-footer">
                        <button type="submit" class=" modal-action modal-close waves-effect waves-green btn-flat">UPDATE</button>
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a>  
                      </div>
                    </form>
                    </div>
                      
                  <!--*****************************************************-->
                   <div id="del{{$head->strMeasurementID}}" class="modal modal-fixed-footer">
                      <font color = "teal"><center><h5> Edit Measurement Info </h5></center></font> 
                      <div class="modal-content"> 
                        <p>
                        <form action="/delMeasurementCategory" method="POST">
                        <div class="input-field">
                          <input value="{{ $head->strMeasurementID }}" id="delMeasurementID" name="delMeasurementID" type="text" class="validate" readonly>
                          <label for="measurement_id">Measurement ID: </label>
                        </div>

                        <div class="input-field">                                                    
                          <select>
                             <option disabled>Pick a category</option>
                                @foreach($category as $id=>$name)
                                  @if($head->strCategoryName == $id)
                                    <option selected value="{{ $id }}" disabled>{{ $name }}</option>
                                  @endif
                                @endforeach
                          </select>    
                        </div>        
                        
                        <div class="input-field">                                                    
                          <select>
                            <option disabled>Pick a segment</option>
                              @foreach($segment as $id=>$name)
                                @if($head->strSegmentName == $id)
                                  <option selected value="{{ $id }}" disabled>{{ $name }}</option>
                                @endif
                              @endforeach
                          </select>    
                        </div>     

                        <div class="input-field">                                                    
                          <select>
                            <option disabled>Pick a detail</option>
                              @foreach($detailList as $id=>$name)
                                @if($head->strMeasurementName == $id)
                                  <option selected value="{{ $id }}" disabled>{{ $name }}</option>
                                 @endif
                              @endforeach
                          </select>    
                        </div>   
                         </p>
                         
                      </div>         
                      <div class="modal-footer">
                        <button type="submit" class=" modal-action modal-close waves-effect waves-green btn-flat">GO</button>
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a>  
                      </div>
                    </form>
                    </div>          

                  <!--*****************************************************-->   
                  </td>
                </tr>
                @endif
                @endforeach
              </tbody>
            </table>

             <!--add-->
            <div id="addMeasurementInfo" class="modal modal-fixed-footer">
              <font color = "teal"> <center><h5>Add Measurement Information </h5></center></font> 
              <div class="modal-content">
                <p>
                <form action="/addMeasurementCategory" method="POST">
                <div class="input-field">
                  <input value="{{$categoryNewID}}" id="addMeasurementID" name="addMeasurementID" type="text" class="validate" readonly>
                  <label for="measurement_id">Measurement ID: </label>
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
                  <select name='addSegment' id='addSegment' required>
                    <option selected disabled>Pick a segment</option>
                      @foreach($segment as $id=>$name)
                        <option value="{{ $id }}">{{ $name }}</option>
                      @endforeach
                  </select>   
                </div>    

                <div class="input-field">
                  <select name='addDetail' id='addDetail' required>
                    <option selected disabled>Pick a detail</option>
                      @foreach($detailList as $id=>$name)
                        <option value="{{ $id }}">{{ $name }}</option>
                      @endforeach
                  </select>   
                </div>    
                
              </div>
            </p>
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
    </div>
  </div>
    <!--END OF MEASUREMENT CATEGORY-->

    <div id="tabDetails" class="hue col s12">

    <div class="main-wrapper">
      <div class="row">
        <div class="col s12 m12 l12">
        <span class="page-title"><h4>Measurement Parts</h4></span>
        </div>
      </div>

      <div class="row">
        <div class="col s12 m12 l6">
          <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#addMeasurementPart">ADD NEW PART</button>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
          <span class="card-title"><h5><center>Measurement Parts</center></h5></span>
          <div class="divider"></div>
          <div class="card-content">

            <table class = "centered" align = "center" border = "1">
              <thead>
                <tr>
                  <th data-field="id">Measurement Part ID</th>
                  <th data-field="name">Measurement Name</th>
                  <th data-field="description">Measurement Description</th>
                </tr>
              </thead>

              <tbody>
                @foreach($detail as $detail)
                <tr>
                  <td>{{ $detail->strMeasurementDetailID }}</td>
                  <td>{{ $detail->strMeasurementDetailName }}</td>
                  <td>{{ $detail->strMeasurementDetailDesc }}</td>
                  <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#{{ $detail->strMeasurementDetailID }}">EDIT</button>
                       
                    <div id="{{ $detail->strMeasurementDetailID }}" class="modal modal-fixed-footer">
                      <font color = "teal"><center><h5> Edit Measurement Part</h5></center></font> 
                      <div class="modal-content">
                        <p>
                        <form action="/editMeasurementDetail" method="POST">
                        <div class="input-field">
                          <input value="{{ $detail->strMeasurementDetailID }}" id="editDetailID" name="editDetailID" type="text" class="validate" readonly>
                          <label for="measurement_id">Measurement ID: </label>
                        </div>

                        <div class="input-field">
                          <input value="{{ $detail->strMeasurementDetailName }}" id="editDetailName" name = "editDetailName" type="text" class="validate">
                          <label for="measurement_name"> Measurement Name: </label>
                        </div>

                        <div class="input-field">
                          <input value="{{ $detail->strMeasurementDetailDesc }}" id="editDetailDesc" name = "editDetailDesc" type="text" class="validate">
                          <label for="measurement_desc">Measurement Description: </label>
                        </div>
                        </p>
                      </div>

                      <div class="modal-footer">
                        <button type="submit" class=" modal-action modal-close waves-effect waves-green btn-flat">UPDATE</button>
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a>  
                      </div>
                    </form>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          
            <div id="addMeasurementPart" class="modal modal-fixed-footer">
              <font color = "teal"><h5><center> Add New Measurement Part </center></h5></font> 
              <div class="modal-content">
              <form action="/addMeasurementDetail" method="POST">
                <p>

                <div class="input-field">
                  <input value="{{$detailNewID}}" id="addDetailID" name="addDetailID" type="text" class="validate" readonly>
                  <label for="measurement_id">Measurement ID: </label>
                </div>

                <div class="input-field">
                  <input id="addDetailName" name= "addDetailName" type="text" class="validate" required>
                  <label for="measurement_name"> Measurement Name: </label>
                </div>

                <div class="input-field">
                  <input id="addDetailDesc" name ="addDetailDesc" type="text" class="validate">
                  <label for="measurement_desc">Measurement Description: </label>
                </div>
                </p>
              </div>

              <div class="modal-footer">
                <button type="submit" class=" modal-action modal-close waves-effect waves-green btn-flat">ADD</button>
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a> 
              </div>
            </div>
          </form>

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

    <script>
    $(document).ready(function(){
        var actTab = {{$actTab;}};
        console.log(actTab);
        $('ul.tabs').tabs('select_tab', actTab);
    });
    </script>


@stop