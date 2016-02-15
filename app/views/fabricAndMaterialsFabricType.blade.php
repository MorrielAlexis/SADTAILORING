@extends('layouts.master')

@section('content')
  <div class="main-wrapper">  <!-- Main Wrapper  -->   
    <div class="row">
      <div class="col s12 m12 l12">
        <span class="page-title"><h4>Fabric Type</h4></span>
      </div> 
    </div>

    <div class="row">
      <div class="col s12 m12 l6">
        <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#addFabricType">ADD FABRIC TYPE</button>
      </div>
    </div>
  </div> <!-- End of Main Wrapper  --> 

  

  <div class="row"> <!-- row -->

    	<div class="col s12 m12 l12">  <!-- col s12 m12 l12 -->

    		<div class="card-panel">  <!-- card-panel -->
   		    <span class="card-title"><h5><center>Fabric Type</center></h5></span>
   				<div class="divider"> </div>
            <div class="card-content"><!-- card-content  --> 

              <div class="col s12 m12 l12 overflow-x">

       				<table class = "centered" align = "center" border = "1">
                <thead>
                  <tr>
              		  <th data-field="fabricID">Fabric Type ID</th>
                    <th data-field="fabricName">Fabric Type Name</th>
              		  <th data-field="fabricDescription">Fabric Description</th>
              	  </tr>
                </thead>

                <tbody>
                   @foreach($fabricType as $fabricType)
                  <tr>
              		  <td>{{ $fabricType->strFabricTypeID }}</td>
              		  <td>{{ $fabricType->strFabricTypeName }}</td>
              		  <td>{{ $fabricType->strFabricTypeDesc}}</td>
              		  <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#{{$fabricType->strFabricTypeID}}">EDIT</button>
              	
                    <div id="{{ $fabricType->strFabricTypeID }}" class="modal modal-fixed-footer"> <!-- editFabricType  --> 
                      <font color = "teal"><center><h5> Edit Fabric Type Details</h5></center></font> 
                      <div class="modal-content">
                        <p>
                        <form action="/editFabricType" method="POST">
                        <div class="input-field">
                          <input value = "{{ $fabricType->strFabricTypeID }}" id="editFabricTypeID" name = "editFabricTypeID" type="text" class="validate" readonly="">
                          <label for="fabric_typeId">Fabric Type ID: </label>
                        </div>

                        <div class="input-field">
                          <input value = "{{ $fabricType->strFabricTypeName }}" id="editFabricTypeName" name = "editFabricTypeName" type="text" class="validate">
                          <label for="fabrictype_name">Fabric Type Name: </label>
                        </div>

                        <div class="input-field">
                          <input value = "{{ $fabricType->strFabricTypeDesc }}" id="editFabricTypeDesc" name = "editFabricTypeDesc" type="text" class="validate">
                          <label for="fabrictype_description">Fabric Desription: </label>
                        </div>  
                        </p>
                      </div>

                      <div class="modal-footer">
                        <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">UPDATE</button>
                        <a href="#!" class=" modal-action  waves-effect waves-green btn-flat">CANCEL</a> 
                      </div>
                      </form>
                    </div> <!-- editFabricType  -->    
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

              </div>

              <div class = "clearfix">

              </div>
          
              <div id="addFabricType" class="modal modal-fixed-footer"> <!-- addFabricType  -->  
                <form action="/addFabricType" method="POST">
                <font color = "teal"><center><h5> Add Fabric Type</h5></center></font> 
                <div class="modal-content">
                <p>           
                  <div class="input-field">
                    <input value = "{{$newID}}" id="addFabricTypeID" name = "addFabricTypeID" type="text" class="validate" readonly>
                    <label for="fabrictype_id">Fabric ID: </label>
                  </div>

                  <div class="input-field">
                    <input id="addFabricTypeName" name = "addFabricTypeName" type="text" class="validate">
                    <label for="fabrictype_name">Fabric Name: </label>
                  </div>

                  <div class="input-field">
                    <input id="addFabricTypeDesc" name = "addFabricTypeDesc" type="text" class="validate">
                    <label for="fabrictype_description">Fabric Desription: </label>
                  </div>

                </p>
                </div>

                  <div class="modal-footer">
                    <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">ADD</button>
                    <a href="#!" class=" modal-action  waves-effect waves-green btn-flat">CANCEL</a> 
                  </div>
                </form>
    	       </div><!-- addFabricType  -->
            </div> <!-- card-content  --> 
        </div>  <!-- card-panel -->
      </div> <!-- col s12 m12 l12 --> 
  </div>     <!-- row --> 



@stop

@section('scripts')
    <script>
      $(document).ready(function(){
      // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
      $('.modal-trigger').leanModal();
      });
    </script>

@stop