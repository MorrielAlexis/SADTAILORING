@extends('layouts.master')

@section('content')
  
  

  <p><h4 style="lightpink">Measurements</h4></p>
    <div class="row">
    
    <!--Measurement Tabs-->
      <div class="col s12" id="measurements" name="measurements">
        <ul class="tabs">
          <li class="tab col s3"><a style="color:teal" href="#tabDetails"><b>Details</b></a></li>
          <div style="border: 1px solid white" class="divider"></div>
          <li class="tab col s3"><a style="color:teal" href="#tabCategory"><b>Category</b></a></li>
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
              <div class="col s12 m12 l12">
                <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#addMeasurementInfo"> ADD MEASUREMENT INFO </button>
                <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#modal1">VIEW INACTIVE MEASUREMENT INFO</button>
              </div>
            </div>
          </div>


          <!--MODAL: VIEW INACTIVE MEASUREMENT INFO-->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>INACTIVE MEASUREMENT INFO</h4>
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
                  <button type="submit" class="waves-effect waves-green btn btn-small center-text">REACTIVATE</button>
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
                        <th data-field = "MeasurementID"> Measurement ID </th>
                        <th data-field="Garmentcategory">Garment Category</th>
                        <th data-field="Garmentcategory">Segment</th>
                        <th data-field="MeasurementName">Measurement Name</th>
                        <th data-field="MeasurementName">Action</th>
                        <th data-field="MeasurementName">Action</th>
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
                        <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit{{$head->strMeasurementID}}">EDIT</button>
                        <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#del{{$head->strMeasurementID}}">DELETE</button>

                          <div id="edit{{$head->strMeasurementID}}" class="modal modal-fixed-footer">
                            <font color = "teal"><center><h5> Edit Measurement Info </h5></center></font>
                            <form action="{{URL::to('editMeasurementCategory')}}" method="POST"> 
                              <div class="modal-content"> 
                                <p>
                                
                                  <div class="input-field">
                                    <input value="{{ $head->strMeasurementID }}" id="editMeasurementID" name="editMeasurementID" type="text" class="validate" readonly>
                                    <label for="measurement_id">Measurement ID: </label>
                                  </div>

                                  <div class="input-field">                                                    
                                    <select required name='editCategory'>
                                      @foreach($category2 as $cat)
                                        @if($head->strCategoryName == $cat->strGarmentCategoryID && $cat->boolIsActive == 1)
                                          <option selected value="{{ $cat->strGarmentCategoryID }}">{{ $cat->strGarmentCategoryName }}</option>
                                        @elseif($cat->boolIsActive == 1)
                                          <option value="{{ $cat->strGarmentCategoryID }}">{{ $cat->strGarmentCategoryName }}</option>
                                        @endif
                                      @endforeach
                                    </select>    
                                    <label>Category</label>
                                  </div>       
                        
                                  <div class="input-field">                                                    
                                    <select required name='editSegment'>
                                      @foreach($segment2 as $seg)
                                        @if($head->strSegmentName == $seg->strGarmentSegmentID && $seg->boolIsActive == 1)
                                          <option selected value="{{ $seg->strGarmentSegmentID }}">{{ $seg->strGarmentSegmentName }}</option>
                                        @elseif($seg->boolIsActive == 1)
                                          <option selected value="{{ $seg->strGarmentSegmentID }}">{{ $seg->strGarmentSegmentName }}</option>
                                        @endif
                                      @endforeach
                                    </select>    
                                    <label>Segment</label>
                                  </div>     

                                  <div class="input-field">                                                    
                                    <select required name='editDetail'>
                                      @foreach($detailList2 as $det)
                                        @if($head->strMeasurementName == $det->strMeasurementDetailID && $det->boolIsActive == 1)
                                          <option selected value="{{ $det->strMeasurementDetailID }}">{{ $det->strMeasurementDetailName }}</option>
                                        @elseif($det->boolIsActive == 1)
                                          <option selected value="{{ $det->strMeasurementDetailID }}">{{ $det->strMeasurementDetailName }}</option>
                                        @endif
                                      @endforeach
                                    </select>   
                                    <label>Detail</label> 
                                  </div>   
                                </p>
                              </div> 

                              <div class="modal-footer">
                                <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">UPDATE</button>
                                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a>  
                              </div>
                            </form>
                          </div>
                      
                          <!--*****************************************************-->
                          <div id="del{{$head->strMeasurementID}}" class="modal modal-fixed-footer">
                            <font color = "teal"><center><h5> Are you sure you want to delete? </h5></center></font>
                            <form action="{{URL::to('delMeasurementCategory')}}" method="POST"> 
                              <div class="modal-content"> 
                                <p>
                        
                                  <div class="input-field">
                                    <input value="{{ $head->strMeasurementID }}" id="delMeasurementID" name="delMeasurementID" type="text" class="validate" readonly>
                                    <label for="measurement_id">Measurement ID: </label>
                                  </div>

                                  <div class="input-field">                                                    
                                    <input type="text" value="$head->strGarmentCategoryName"> 
                                  </div>        
                        
                                  <div class="input-field">                                                    
                                    <input type="text" value="$head->strGarmentSegmentName"> 
                                  </div>     

                                  <div class="input-field">                                                    
                                    <input type="text" value="$head->strMeasurementDetailName"> 
                                  </div>   
                                </p>                         
                              </div>

                              <div class="modal-footer">
                                <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">GO</button>
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

                  </div>

                  <div class = "clearfix">

                  </div>

                    <!--add-->
                  <div id="addMeasurementInfo" class="modal modal-fixed-footer">
                    <font color = "teal"> <center><h5>Add Measurement Information </h5></center></font> 
                    
                      <div class="modal-content">
                        <p>
                          <form action="{{URL::to('addMeasurementCategory')}}" method="POST">
                          <div class="input-field">
                            <input value="{{$categoryNewID}}" id="addMeasurementID" name="addMeasurementID" type="text" class="validate" readonly>
                            <label for="measurement_id">Measurement ID: </label>
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
                            <select name='addSegment' id='addSegment' required>
                                @foreach($segment as $segment)
                                  @if($segment->boolIsActive == 1)
                                    <option value="{{ $segment->strGarmentSegmentID }}">{{ $segment->strGarmentSegmentName }}</option>
                                  @endif
                                @endforeach
                            </select>   
                            <label>Segment</label>
                          </div>    

                          <div class="input-field">
                            <select name='addDetail' id='addDetail' required>
                                @foreach($detailList as $detailList)
                                  @if($detailList->boolIsActive == 1)
                                    <option value="{{ $detailList->strMeasurementDetailID }}">{{ $detailList->strMeasurementDetailName }}</option>
                                  @endif
                                @endforeach
                            </select>  
                            <label>Detail</label>
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
                  <div class="col s12 m12 l12 overflow-x">
                  <table class = "table centered data-measDet" align = "center" border = "1">
                    <thead>
                      <tr>
                        <th data-field="id">Measurement Part ID</th>
                        <th data-field="name">Measurement Name</th>
                        <th data-field="description">Measurement Description</th>
                         <th data-field="action">Action</th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach($detail as $detail)
                      <tr>
                        <td>{{ $detail->strMeasurementDetailID }}</td>
                        <td>{{ $detail->strMeasurementDetailName }}</td>
                        <td>{{ $detail->strMeasurementDetailDesc }}</td>
                        <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit{{ $detail->strMeasurementDetailID }}">EDIT</button>
                        <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#del{{ $detail->strMeasurementDetailID }}">DELETE</button>

                          <div id="edit{{ $detail->strMeasurementDetailID }}" class="modal modal-fixed-footer">
                            <font color = "teal"><center><h5> Edit Measurement Part</h5></center></font>
                            <form action="{{URL::to('editMeasurementDetail')}}" method="POST"> 
                              <div class="modal-content">
                                <p>
                                  <div class="input-field">
                                    <input value="{{ $detail->strMeasurementDetailID }}" id="editDetailID" name="editDetailID" type="text" class="validate" readonly>
                                    <label for="measurement_id">Measurement ID: </label>
                                  </div>

                                  <div class="input-field">
                                    <input required value="{{ $detail->strMeasurementDetailName }}" id="editDetailName" name = "editDetailName" type="text" class="validateDetailName">
                                    <label for="measurement_name"> Measurement Name: </label>
                                  </div>

                                  <div class="input-field">
                                    <input value="{{ $detail->strMeasurementDetailDesc }}" id="editDetailDesc" name = "editDetailDesc" type="text" class="validateDetailDesc">
                                    <label for="measurement_desc">Measurement Description: </label>
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
                            <font color = "teal"><center><h5>Are you sure you want to delete?</h5></center></font>
                            <form action="{{URL::to('delMeasurementDetail')}}" method="POST"> 
                              <div class="modal-content">
                                <p>
                                  <div class="input-field">
                                    <input value="{{ $detail->strMeasurementDetailID }}" id="delDetailID" name="delDetailID" type="text" class="validate" readonly>
                                    <label for="measurement_id">Measurement ID: </label>
                                  </div>

                                  <div class="input-field">
                                    <input value="{{ $detail->strMeasurementDetailName }}" type="text" class="validate" readonly>
                                    <label for="measurement_name"> Measurement Name: </label>
                                  </div>

                                  <div class="input-field">
                                    <input value="{{ $detail->strMeasurementDetailDesc }}"type="text" class="validate" readonly>
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
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                  </div>

                  <div class = "clearfix">

                  </div>
          
                  <div id="addMeasurementPart" class="modal modal-fixed-footer">
                    <font color = "teal"><h5><center> Add New Measurement Part </center></h5></font> 
                    <form action="{{URL::to('addMeasurementDetail')}}" method="POST">
                      <div class="modal-content">
                        <p>

                          <div class="input-field">
                            <input value="{{$detailNewID}}" id="addDetailID" name="addDetailID" type="text" class="validate" readonly>
                            <label for="measurement_id">Measurement ID: </label>
                          </div>

                          <div class="input-field">
                            <input required id="addDetailName" name= "addDetailName" type="text" class="validateDetailName" >
                            <label for="measurement_name"> Measurement Name: </label>
                          </div>

                          <div class="input-field">
                            <input  id="addDetailDesc" name ="addDetailDesc" type="text" class="validateDetailDesc">
                            <label for="measurement_desc">Measurement Description: </label>
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

<<<<<<< HEAD
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


=======

         <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">

      $(document).ready(function() {

          $('.data-measHead').DataTable();

      } );
    </script>

        <script type="text/javascript">

      $(document).ready(function() {

          $('.data-measDet').DataTable();

      } );
    </script>

@stop