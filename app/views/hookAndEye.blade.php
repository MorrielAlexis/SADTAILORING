@extends('layouts.master')

@section('content')
	<div class="main-wrapper">
    <div class="row">
      <div class="col s12 m12 l12">
      <span class="page-title"><h4>Hook and Eye</h4></span>
      </div>
    </div>

    <div class="row">
      <div class="col s12 m12 l6">
          <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#addHookEye">ADD Hook and Eye</button>
      </div>      
    </div>
  </div>



  <div class="row">
    <div class="col s12 m12 l12">
    	<div class="card-panel">
   		 <span class="card-title"><h5><center>Hook and Eye</center></h5></span>
   			<div class="divider"></div>
    		<div class="card-content">
    
      		<table class = "centered" align = "center" border = "1">
       			<thead>
          		<tr>
                <th date-field="Hook and Eye ID">Hook and Eye ID</th>
             		<th data-field="Hook and Eye Name">Hook and Eye Name</th>
                <th data-field="Hook and Eye Size">Hook and Eye Size</th>
                <th data-field="Hook and Eye Color">Hook and Eye Color</th>
                <th data-field="Hook and Eye">Hook and Eye</th>
              	<th data-field="Image">Image</th>
              </tr>
            </thead>

            <tbody>
              <tr>
              	<td>001</td>
                <td>Hook and Eye Name</td>
              	<td>Hook and Eye Size</td>
              	<td>Hook and Eye Color</td>
              	<td>Hook and Eye</td>
                <td>image</td>
              	<td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#editHookEye">EDIT</button>
              		    
                  <div id="editHookEye" class="modal modal-fixed-footer">
                    <font color = "teal" ><center><h5>Edit Hook and Eye</h5></center></font> 

                    <div class="modal-content">

                      <div class="input-field">
                        <input id="editHookEyeID" name = "editHookeyeID" value = "editHookEyeID" readonly = "readonly" type="text" class="validate">
                        <label for="HookEye_ID"> Hook and Eye ID </label>
                      </div>
                  
                      <div class="input-field">
                        <input id="editHookEyeName" name = "editHookEyeName" value = "editHookEyeName" type="text" class="validate">
                        <label for="HookEye_Name"> Hook and Eye Name </label>
                      </div>

                      <div class="input-field">
                        <input id="editHookEyeSize" name = "editHookEyeSize" value = "editHookEyeSize" type="text" class="validate">
                        <label for="HookEye_Size"> Hook and Eye Size </label>
                      </div>

                      <div class="input-field">
                        <input id="editHookEyeColor" name = "editHookEyeColor" value = "editHookEyeColor" type="text" class="validate">
                        <label for="Hookeye_Color"> Hook and Eye Color </label>
                      </div>

                      <div class="input-field">
                        <input id="Hook and Eye" type="text" class="validate">
                        <label for="Hook and Eye"> Hook and Eye </label>
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

                      <br><br> 

                    </div>    

                    <div class="modal-footer">
                      <a href="#!" class="modal-action modal-close waves-effect waves-green btn btn-flat">UPDATE</a>
                      <a href="#!" class="modal-action modal-close waves-effect waves-green btn btn-flat">CANCEL</a>  
                    </div>

                  </div>
                </td>
              </tr>
            </tbody>
          </table>

          <div id="addHookEye" class="modal modal-fixed-footer">
            <font color = "teal"><h5><center>Add Hook and Eye </center></h5></font> 
            <div class="modal-content">

              <div class="input-field">
                <input id="addHookEyeID" name = "addHookEyeID" value = "addHookEyeID" readonly = "readonly" type="text" class="validate">
                <label for="HookEye_ID"> Hook and Eye ID </label>
              </div>
                  
              <div class="input-field">
                <input id="addHookEyeName" name = "addHookEyeName" type="text" class="validate">
                <label for="HookEye_Name"> Hook and Eye Name </label>
              </div>

              <div class="input-field">
                <input id="addHookEyeSize" name = "addHookEyeSize" type="text" class="validate">
                <label for="HookEye_Size"> Hook and Eye Size </label>
              </div>

              <div class="input-field">
                <input id="addHookEyeColor" name = "addHookEyeColor" type="text" class="validate">
                <label for="HookEye_Color"> Hook and Eye Color </label>
              </div>


              <div class="input-field">
                <input id="addHookEye" name = "addHookEye" type="text" class="validate">
                <label for="Hook and Eye"> Hook and Eye </label>
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
            </div>
            <br><br> 
               
            <div class="modal-footer">
              <a href="#!" class="modal-action modal-close waves-effect waves-green btn btn-flat">UPDATE</a>
              <a href="#!" class="modal-action modal-close waves-effect waves-green btn btn-flat">CANCEL</a>  
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