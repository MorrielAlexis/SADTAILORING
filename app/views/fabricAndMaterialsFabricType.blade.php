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
        <button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="Add a new fabric type to the table" href="#addFabricType">ADD FABRIC TYPE</button>
        <button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="View deleted fabric types from the table" href="#inactiveFabric">VIEW INACTIVE FABRICS</button>
      </div>
    </div>
  </div> <!-- End of Main Wrapper  --> 

   <!--**********VIEW INACTIVE FABRICS**********-->
            <div id="inactiveFabric" class="modal modal-fixed-footer">
              <div class="modal-content">
                <h5><font color = "#1b5e20"><center>Inactive Fabric Types</center> </font> </h5>
                <table class="centered" border="1">
                  <thead>
                    <tr>
                      <th data-field="fabricID">Fabric Type ID</th>
                      <th data-field="fabricName">Fabric TypeName</th>
                      <th data-field="fabricDesc">Fabric Description</th>     
                      <th>Reactivate</th>   
                  </thead>

                  <tbody>
                    @foreach($fabricType2 as $fabricType2)
                    @if($fabricType2->boolIsActive == 0)
                      <tr>
                        <td>{{ $fabricType2->strFabricTypeID }}</td>
                        <td>{{ $fabricType2->strFabricTypeName }}</td>
                        <td>{{ $fabricType2->strFabricTypeDesc }}</td>
                        <td>
                          <form action="{{URL::to('reactFabricType')}}" method="POST">
                            <input type="hidden" value="{{ $fabricType2->strFabricTypeID }}" id="reactID" name="reactID">
                            <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="Returns data of fabric type to the table">REACTIVATE</button>
                          </form>
                        </td>
                      </tr>
                      @endif
                      @endforeach
                  </tbody>
                </table>
              </div>

        <div class="modal-footer">
          <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">CLOSE</a>
        </div>
      </div>


  <div class="row"> <!-- row -->

    	<div class="col s12 m12 l12">  <!-- col s12 m12 l12 -->

    		<div class="card-panel">  <!-- card-panel -->
   		    <span class="card-title"><h5 style="color:#1b5e20"><center>Fabric Type</center></h5></span>
   				<div class="divider"> </div>
            <div class="card-content"><!-- card-content  --> 

              <div class="col s12 m12 l12 overflow-x">

       				<table class = "table centered data-fabricType" align = "center" border = "1">
                <thead>
                  <tr>
              		  <th data-field="fabricID">Fabric Type ID</th>
                    <th data-field="fabricName">Fabric Type Name</th>
              		  <th data-field="fabricDescription">Fabric Description</th>
                    <th data-field="Edit">Action</th>
                    <th data-field="Delete">Action</th>

              	  </tr>
                </thead>

                <tbody>
                   @foreach($fabricType as $fabricType)
                   @if($fabricType->boolIsActive == 1)
                  <tr>
              		  <td>{{ $fabricType->strFabricTypeID }}</td>
              		  <td>{{ $fabricType->strFabricTypeName }}</td>
              		  <td>{{ $fabricType->strFabricTypeDesc}}</td>
              		  <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="Edit data of fabric type" href="#edit{{$fabricType->strFabricTypeID}}">EDIT</button></td>
                    <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="Delete fabric type from the table" href="#del{{$fabricType->strFabricTypeID}}">DELETE</button></td>
              	
                    <div id="edit{{ $fabricType->strFabricTypeID }}" class="modal modal-fixed-footer"> <!-- editFabricType  --> 
                      <h5><font color = "#1b5e20"><center>Edit Fabric Type</center> </font> </h5>
                      <div class="modal-content">
                        <p>
                        <form action="{{URL::to('editFabricType')}}" method="POST">
                        <div class="input-field">
                          <input value = "{{ $fabricType->strFabricTypeID }}" id="editFabricTypeID" name = "editFabricTypeID" type="text" class="validate" readonly="">
                          <label for="fabric_typeId">Fabric Type ID: </label>
                        </div>

                        <div class="input-field">
                          <input required value = "{{ $fabricType->strFabricTypeName }}" id="editFabricTypeName" name = "editFabricTypeName" type="text" class="validateTypeName">
                          <label for="fabrictype_name">Fabric Type Name: </label>
                        </div>

                        <div class="input-field">
                          <input required value = "{{ $fabricType->strFabricTypeDesc }}" id="editFabricTypeDesc" name = "editFabricTypeDesc" type="text" class="validateTypeDesc">
                          <label for="fabrictype_description">Fabric Desription: </label>
                        </div>  
                        </p>
                      </div>

                      <div class="modal-footer">
                        <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">UPDATE</button>
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a> 
                      </div>
                      </form>
                    </div> <!-- editFabricType  -->    
                  

              <!--**********DELETE***********-->
              <div id="del{{ $fabricType->strFabricTypeID }}" class="modal modal-fixed-footer">
                      <div class="modal-content">
                        <h5><font color = "#1b5e20"><center>Are you sure you want to delete?</center> </font> </h5>
                        <p>
                         <form action="{{URL::to('delFabricType')}}" method="POST">
                          <div class="input-field">
                            <label for="first_name">Fabric Type ID: </label>
                            <input value="{{$fabricType->strFabricTypeID}}" id="delFabricID" name="delFabricID" type="text" class="validate" readonly>
                          </div>

                          <div class="input-field">
                            <label for="first_name">Fabric Type Name: </label>
                            <input value="{{$fabricType->strFabricTypeName}}" id="delFabricName" name="delFabricName" type="text" class="validate" readonly>
                          </div>

                           <div class="input-field">
                            <label for="middle_name">Fabric Desription: </label>
                            <input value="{{$fabricType->strFabricTypeDesc}}" id="delFabricDesc" name="delFabricDesc" type="text" class="validate" readonly>
                          </div>
                        </p>
                      </div>

                          <div class="modal-footer">
                          <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
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

            <!--********ADD******-->
              <div id="addFabricType" class="modal modal-fixed-footer"> <!-- addFabricType  -->  
                <form action="{{URL::to('addFabricType')}}" method="POST">
                <h5><font color = "#1b5e20"><center>Add Fabric Type</center> </font> </h5> 
                <div class="modal-content">
                <p>           
                  <div class="input-field">
                    <input value = "{{$newID}}" id="addFabricTypeID" name = "addFabricTypeID" type="text" class="validate" readonly>
                    <label for="fabrictype_id">Fabric ID: </label>
                  </div>

                  <div class="input-field">
                    <input required id="addFabricTypeName" name = "addFabricTypeName" type="text" class="validateTypeName">
                    <label for="fabrictype_name">Fabric Name: </label>
                  </div>

                  <div class="input-field">
                    <input required id="addFabricTypeDesc" name = "addFabricTypeDesc" type="text" class="validateTypeDesc">
                    <label for="fabrictype_description">Fabric Desription: </label>
                  </div>

                </p>
                </div>

                  <div class="modal-footer">
                    <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">ADD</button>
                    <button type="button" onclick="clearData()" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</button> 
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
      function clearData(){
          document.getElementById('addFabricTypeDesc').value = "";
          document.getElementById('addFabricTypeName').value = "";

      }
    </script>


    <script type="text/javascript">
      $('.validateTypeName').on('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z," "]+$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      //Kapag Number
      $('.validateTypeName').keyup(function() {
        var name = $(this).val();
        $(this).val(name.replace(/\d/, ''));
      });     

      $('.validateTypeName').blur('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z," "]+$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      }); 

      $('.validateTypeDesc').on('input', function() {
        var input=$(this);
        var is_desc=input.val();
        if(is_desc){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });

      $('.validateTypeDesc').blur('input', function() {
        var input=$(this);
        var is_desc=input.val();
        if(is_desc){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      });
      </script>
        <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">

      $(document).ready(function() {

          $('.data-fabricType').DataTable();

      } );
    </script>

@stop