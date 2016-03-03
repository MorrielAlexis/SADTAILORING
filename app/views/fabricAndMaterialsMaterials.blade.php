@extends('layouts.master')

@section('content')

<h3 style="margin-bottom:20px; margin-left:20px;">Materials</h3>
  
  <div style="padding:20px">

      <ul class="tabs transparent" style="float:left">
        <li style="background:#ce93d8; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab"><a style="color:black" href="#tabThread">Threads</a></li>
        <li style="background:lightgreen; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab"><a style="color:black" href="#tabNeedle">Needles</a></li>
        <li style="background:salmon; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab"><a style="color:black" href="#tabButton">Buttons</a></li>
        <li style="background:lightblue; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab"><a style="color:black" href="#tabZipper">Zippers</a></li>
        <li style="background:pink; border-top-left-radius: 20px; border-top-right-radius: 40px;" class="tab"><a style="color:black" href="#tabHook">Hook&Eye</a></li>
        <div class="indicator white" style="z-index:1"></div>
      </ul>
      </div>
  
      <!--THREADS-->
      <div id="tabThread" class="hue col s12" style="margin-top:45px; background-color: #ce93d8;">
        <div style="height:30px;"></div>

        <div class="row">
          <div class="col s12">
            <div class="card">
              <div class="card-content">
                <div class = "col s12 m12 l12 overflow-x">
                  <h5><font color = "#1b5e20"><center>Threads</center> </font> </h5>
                  <table class = "table centered data-thread" border = "1">

                    <thead>
                      <tr>
                        <!--<th date-field= "Thread ID">Thread ID</th>-->
                        <th data-field="Thread Name">Thread Name</th>
                        <th data-field="Thread Color">Thread Color</th>
                        <th data-field="Thread Desc">Description</th>
                        <th data-field="ThreadImage">Image</th>
                        <th data-field="Edit">Action</th>
                        <th data-field="Deactivate">Action</th>
                        <th>
                          <div align="right" style="margin-right:70px;"><a href="#addThread" style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1"style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to add a new thread detail to the table"><i class="centered tiny material-icons">add</i></a></div>
                        </th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach($thread as $thread)
                      @if($thread->boolIsActive == 1)
                      <tr>
                        <!--<td>{{ $thread->strMaterialThreadID }}</td>-->
                        <td>{{ $thread->strMaterialThreadName }}</td>
                        <td>{{ $thread->strMaterialThreadColor }}</td>
                        <td>{{ $thread->strMaterialThreadDesc }}</td>
                        <td><img class="materialboxed" width="650" src="{{URL::asset($thread->strMaterialThreadImage)}}"></td> 
                        <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit thread details" href="#edit{{ $thread->strMaterialThreadID }}">EDIT</button></td>
                        <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of thread details from the table" href="#del{{ $thread->strMaterialThreadID }}">deactivate</button>
                            
                          <!--EDIT THREADS-->
                          <div id="edit{{ $thread->strMaterialThreadID }}" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>Edit Thread</center> </font> </h5>
                            <form action="{{URL::to('editThread')}}" method="POST" enctype="multipart/form-data"> 

                              <div class="modal-content">
                                <div class="input-field">
         
                                  <!-- <input id="editThreadID" name = "editThreadID" value = "{{ $thread->strMaterialThreadID }}" readonly = "readonly" type="text" class="">
                                  <label for="Thread_ID"> Thread ID: </label> -->

                                  <input id="editThreadID" name = "editThreadID" value = "{{ $thread->strMaterialThreadID }}" type="hidden">
         
                                </div>
                          
                                <div class="input-field">
                                  <input id="editThreadName" name = "editThreadName" value = "{{ $thread->strMaterialThreadName }}" type="text" class="validateName">
                                  <label for="Thread_Name"> *Thread Name </label>
                                </div>

                                <div class="input-field">
                                  <input id="editThreadColor" name = "editThreadColor" value = "{{ $thread->strMaterialThreadColor }}" type="text" class="validateColor">
                                  <label for="Thread_Color"> *Thread Color </label>
                                </div>

                                <div class="input-field">
                                  <input id="editThreadDesc" name = "editThreadDesc" value = "{{ $thread->strMaterialThreadDesc }}" type="text">
                                  <label for="Thread_Color"> Description </label>
                                </div>

                                <div class="file-field input-field">
                                  <div style="color:black" class="btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
                                    <span>Upload Image</span>
                                    <input type="file" id="editImg" name="editImg" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                                  </div>

                                  <div class="file-path-wrapper">
                                    <input value="{{$thread->strMaterialThreadImage}}" class="file-path validate" id="editThreadImage" name="editThreadImage" type="text">
                                  </div>
                                  <br><br>
                                </div> 
                              </div>    

                              <div class="modal-footer">
                                <button type="submit" class="modal-action  waves-effect waves-green btn btn-flat">UPDATE</button>
                                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a>   
                              </div>
                            </form>
                          </div>
                        
                            <!--deactivate THREADS-->
                          <div id="del{{ $thread->strMaterialThreadID }}" class="modal modal-fixed-footer">
                            <form action="{{URL::to('delThread')}}" method="POST">
                              <div class="modal-content">
                                <h5><font color = "#1b5e20"><center>Are you sure you want to deactivate?</center> </font> </h5> 
                                <p>
         
                                  <div class="input-field">
                                    <input value="{{$thread->strMaterialThreadID}}" id="delThreadID" name="delThreadID" type="hidden">
                                  </div>

                                  <div class="input-field">
                                    <label for="first_name">Thread Name: </label>
                                    <input value="{{$thread->strMaterialThreadName}}" id="delThreadName" name="delThreadName" type="text" class="validate" readonly>
                                  </div>

                                   <div class="input-field">
                                    <label for="middle_name">Thread Color: </label>
                                    <input value="{{$thread->strMaterialThreadColor}}" id="delThreadColor" name="delThreadColor" type="text" class="validate" readonly>
                                  </div>

                                  <div class="input-field">
                                    <input id="delThreadDesc" name = "delThreadDesc" value = "{{ $thread->strMaterialThreadDesc }}" type="text" class="validateColor">
                                    <label for="Thread_Color"> Description: </label>
                                  </div>

                                  <div class="input-field">
                                    <input value="{{$thread->strMaterialThreadID}}" id="delInactiveThread" name="delInactiveThread" type="hidden">
                                  </div>

                                  <div class="input-field">
                                    <input id="delInactiveReason" name = "delInactiveReason" value="{{$thread->strInactiveReason}}" type="text" class="validate" required>
                                    <label for="Thread_Color"> *Reason for Inactivation: </label>
                                  </div>
                                </p>
                              </div>

                              <div class="modal-footer">
                                <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
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
                <div class = "clearfix"></div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <!--NEEDLES-->
      <div id="tabNeedle" class="hue col s12" style="margin-top:45px; background-color: lightgreen;">
        <div style="height:30px;"></div>

        <div class="row">
          <div class="col s12">
            <div class="card">
              <div class="card-content">
                <div class = "col s12 m12 l12 overflow-x">
                  <h5><font color = "#1b5e20"><center>Needles</center> </font> </h5>
                  <table class = "centered" border = "1">
                    <thead>
                      <tr>
                        <!--<th date-field= "Needle ID">Needle ID</th>-->
                        <th data-field="Needle Name">Needle Name</th>
                        <th data-field="Needle Size">Needle Size</th>
                        <th data-field="Needle Desc">Description</th>
                        <th data-field="Needle Image">Image</th>
                        <th>
                          <div align="right" style="margin-right:70px;"><a href="#addNeedle" style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to add a new needle detail to the table"><i class="centered tiny material-icons">add</i></a></div>
                        </th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach($needle as $needle)
                        @if($needle->boolIsActive == 1)
                      <tr>
                        <!--<td>{{$needle->strMaterialNeedleID}}</td>-->
                        <td>{{$needle->strMaterialNeedleName}}</td>
                        <td>{{$needle->strMaterialNeedleSize}}</td>
                        <td>{{$needle->strMaterialNeedleDesc}}</td>
                        <td><img class="materialboxed" width="650" src="{{URL::asset($needle->strMaterialNeedleImage)}}"></td>
                        <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit needle detail" href="#edit{{$needle->strMaterialNeedleID}}">EDIT</button></td>
                        <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of needle detail from the table" href="#del{{$needle->strMaterialNeedleID}}">deactivate</button>
                            
                          <div id="edit{{$needle->strMaterialNeedleID}}" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>Edit Needle</center> </font> </h5>
                            <form action="{{URL::to('editNeedle')}}" method="POST" enctype="multipart/form-data"> 

                              <div class="modal-content">                              
                                <div class="input-field">
                                  <input id="editNeedleID" name = "editNeedleID" value = "{{$needle->strMaterialNeedleID}}" type="hidden">
                                </div>
                          
                                <div class="input-field">
                                  <input required id="editNeedleName" name = "editNeedleName" value = "{{$needle->strMaterialNeedleName}}" type="text" class="validateName">
                                  <label for="Needle_Name"> *Needle Name </label>
                                </div>

                                <div class="input-field">
                                  <input required id="editNeedleSize" name = "editNeedleSize" value = "{{$needle->strMaterialNeedleSize}}" type="text" class="validateSize">
                                  <label for="Needle_Size"> *Needle Size </label>
                                </div>

                                <div class="input-field">
                                  <input required id="editNeedleDesc" name = "editNeedleDesc" value = "{{$needle->strMaterialNeedleDesc}}" type="text" >
                                  <label for="Needle_Size"> Description </label>
                                </div>

                                           
                                <div class="file-field input-field">
                                  <div style="color:black" class="btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
                                    <span>Upload Image</span>
                                    <input type="file" id="editImg" name="editImg" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                                  </div>

                                  <div class="file-path-wrapper">
                                    <input value="{{$needle->strMaterialNeedleImage}}" class="file-path validate" id="editNeedleImage" name="editNeedleImage" type="text">
                                  </div>
                                  <br><br> 
                                </div>
                              </div>    

                              <div class="modal-footer">
                                <button type="submit" class="modal-action  waves-effect waves-green btn btn-flat">UPDATE</button>
                                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a>  
                              </div>
                            </form>
                          </div>
                        
                        

                          <div id="del{{$needle->strMaterialNeedleID}}" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>Are you sure you want to deactivate?</center> </font> </h5> 
                            <form action="{{URL::to('delNeedle')}}" method="POST">

                              <div class="modal-content">
                                
                                <p>
                                  <div class="input-field">
                                    <input value="{{$needle->strMaterialNeedleID}}" id="delNeedleID" name="delNeedleID" type="hidden">   
                                  </div>

                                  <div class="input-field">
                                    <label for="needle_name">Needle Name: </label>
                                    <input value="{{$needle->strMaterialNeedleName}}" id="delNeedleName" name="delNeedleName" type="text" class="validate" readonly>
                                  </div>

                                   <div class="input-field">
                                    <label for="needle_size">Needle Size: </label>
                                    <input value="{{$needle->strMaterialNeedleSize}}" id="delNeedlSize" name="delNeedleSize" type="text" class="validate" readonly>
                                  </div>

                                  <div class="input-field">
                                    <label for="needle_desc">Description </label>
                                    <input value="{{$needle->strMaterialNeedleDesc}}" id="delNeedleDesc" name="delNeedleDesc" type="text" class="validate" readonly>
                                  </div>

                                  <div class="input-field">
                                    <input value="{{$needle->strMaterialNeedleID}}" id="delInactiveNeedle" name="delInactiveNeedle" type="hidden">
                                  </div>

                                  <div class="input-field">
                                    <input id="delInactiveReason" name = "delInactiveReason" value="{{$needle->strInactiveReason}}" type="text" class="validate" required>
                                    <label for="Thread_Color"> *Reason for Inactivation: </label>
                                  </div>
                                </p>
                              </div>

                              <div class="modal-footer">
                                <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
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
                <div class = "clearfix"></div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <!--BUTTONS-->
      <div id="tabButton" class="hue col s12" style="margin-top:45px; background-color: salmon;">
        <div style="height:30px;"></div>

        <div class="row">
          <div class="col s12">
            <div class="card">
              <div class="card-content">
                <div class = "col s12 m12 l12 overflow-x">
                  <h5><font color = "#1b5e20"><center>Buttons</center> </font> </h5>
                  <table class = "centered" border = "1">

                    <thead>
                      <tr>
                       <!-- <th date-field= "Button ID">Button ID</th>-->
                        <th data-field="Button Name">Button Name</th>
                        <th data-field="Button Size">Button Size</th>
                        <th data-field="Button Color">Button Color</th>
                        <th data-field="Button Color">Description</th>
                        <th data-field="ButtonImage">Image</th>
                        <th>
                          <div align="right" style="margin-right:40px;"><a href="#addButton" style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to add a new button detail to the table"><i class="centered tiny material-icons">add</i></a></div>
                        </th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach($button as $button)
                      @if($button->boolIsActive == 1)
                      <tr>
                       <!-- <td>{{$button->strMaterialButtonID}}</td>-->
                        <td>{{$button->strMaterialButtonName}}</td>
                        <td>{{$button->strMaterialButtonSize}}</td>
                        <td>{{$button->strMaterialButtonColor}}</td>
                        <td>{{$button->strMaterialButtonDesc}}</td>
                        <td><img class="materialboxed" width="650" src="{{URL::asset($button->strMaterialButtonImage)}}"></td>
                        <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit button detail" href="#edit{{$button->strMaterialButtonID}}">EDIT</button></td>
                        <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of button detail from the table" href="#del{{$button->strMaterialButtonID}}">deactivate</button>
                           
                          <!-- <EDIT BUTTONS>   -->
                          <div id="edit{{$button->strMaterialButtonID}}" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>Edit Button</center> </font> </h5>
                            <form action="{{URL::to('editButton')}}" method="POST" enctype="multipart/form-data"> 

                              <div class="modal-content">                              
                                <div class="input-field">
                                  <input id="editButtonID" name = "editButtonID" value = "{{$button->strMaterialButtonID}}" type="hidden">
                                </div>

                                <div class="input-field">
                                  <input required id="editButtonName" name = "editButtonName" value = "{{$button->strMaterialButtonName}}" type="text" class="validateName">
                                  <label for="Button_Name"> *Button Name </label>
                                </div>

                                <div class="input-field">
                                  <input required id="editButtonSize" name = "editButtonSize" value = "{{$button->strMaterialButtonSize}}" type="text" class="validateSize">
                                  <label for="Button_Size"> *Button Size </label>
                                </div>

                                <div class="input-field">
                                  <input required id="editButtonColor" name = "editButtonColor" value = "{{$button->strMaterialButtonColor}}" type="text" class="validateColor">
                                  <label for="Button_Color"> *Button Color </label>
                                </div>

                                <div class="input-field">
                                  <input required id="editButtonDesc" name = "editButtonDesc" value = "{{$button->strMaterialButtonDesc}}" type="text" class="validate">
                                  <label for="Button_Color"> Description: </label>
                                </div>

                                              
                                <div class="file-field input-field">
                                  <div style="color:black" class="btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
                                    <span>Upload Image</span>
                                    <input type="file" id="editImg" name="editImg" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                                  </div>
                                  <div class="file-path-wrapper">
                                    <input value="{{$button->strMaterialButtonImage}}" class="file-path validate" id="editButtonImage" name="editButtonImage" type="text">
                                  </div>
                                </div>
                                <br><br>                               
                              </div>    


                              <div class="modal-footer">
                                <button type="submit" class="modal-action  waves-effect waves-green btn btn-flat">UPDATE</button>
                                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a>  
                              </div>
                            </form>  
                          </div>
                       
                       

                          <div id="del{{$button->strMaterialButtonID}}" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>Are you sure you want to deactivate?</center> </font> </h5>
                            <form action="{{URL::to('delButton')}}" method="POST"> 
                              <div class="modal-content">
                                <p>
                                  <div class="input-field">
                                   <input value="{{$button->strMaterialButtonID}}" id="delButtonID" name="delButtonID" type="hidden">
                                  </div>

                                  <div class="input-field">
                                    <label for="Button_Name">Button Name: </label>
                                    <input value="{{$button->strMaterialButtonName}}" id="delButtonName" name="delButtonName" type="text" class="validate" readonly>
                                  </div>

                                  <div class="input-field">
                                    <label for="Button_Size">Button Size: </label>
                                    <input value="{{$button->strMaterialButtonSize}}" id="delButtonSize" name="delButtonSize" type="text" class="validate" readonly>
                                  </div>

                                  <div class="input-field">
                                    <label for="Button_Color">Button Color: </label>
                                    <input value="{{$button->strMaterialButtonColor}}" id="delButtonColor" name="delButtonColor" type="text" class="validate" readonly>
                                  </div>

                                   <div class="input-field">
                                    <label for="Button_Desc">Desc: </label>
                                    <input value="{{$button->strMaterialButtonDesc}}" id="delButtonColor" name="delButtonColor" type="text" class="validate" readonly>
                                  </div>

                                  <div class="input-field">
                                    <input value="{{$button->strMaterialButtonID}}" id="delInactiveButton" name="delInactiveButton" type="hidden">
                                  </div>

                                  <div class="input-field">
                                    <input id="delInactiveReason" name = "delInactiveReason" value="{{$button->strInactiveReason}}" type="text" class="validate" required>
                                    <label for="Thread_Color"> *Reason for Inactivation: </label>
                                  </div>
                                </p>
                              </div>

                              <div class="modal-footer">
                                <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
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
                <div class = "clearfix"></div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <!--ZIPPERS-->
      <div id="tabZipper" class="hue col s12" style="margin-top:45px; background-color: lightblue;">
        <div style="height:30px;"></div>

        <div class="row">
          <div class="col s12">
            <div class="card">
              <div class="card-content">
                <div class = "col s12 m12 l12 overflow-x">
                  <h5><font color = "#1b5e20"><center>Zippers</center> </font> </h5>
                  <table class = "centered" border = "1">

                    <thead>
                      <tr>
                        <!--<th date-field= "Zipper ID">Zipper ID</th>-->
                        <th data-field="Zipper Name">Zipper Name</th>
                        <th data-field="Zipper Size">Zipper Size</th>
                        <th data-field="Zipper Color">Zipper Color</th>
                        <th data-field="Zipper Desc">Description</th>
                        <th data-field="ZipperImage">Zipper Image</th>
                        <th>
                          <div align="right" style="margin-right:45px;"><a href="#addZipper" style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to add a new zipper detail to the table"><i class="centered tiny material-icons">add</i></a></div>
                        </th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach($zipper as $zipper)
                      @if($zipper->boolIsActive == 1)
                      <tr>
                        <!--<td>{{$zipper->strMaterialZipperID}}</td>-->
                        <td>{{$zipper->strMaterialZipperName}}</td>
                        <td>{{$zipper->strMaterialZipperSize}}</td>
                        <td>{{$zipper->strMaterialZipperColor}}</td>
                        <td>{{$zipper->strMaterialZipperDesc}}</td>
                        <td><img class="materialboxed" width="650" src="{{URL::asset($zipper->strMaterialZipperImage)}}"></td>
                        <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit zipper detail" href="#edit{{$zipper->strMaterialZipperID}}">EDIT</button></td>
                        <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of zipper detail from the table" href="#del{{$zipper->strMaterialZipperID}}">deactivate</button>
                            
                          <div id="edit{{$zipper->strMaterialZipperID}}" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>Edit Zipper</center> </font> </h5>
                            <form action="{{URL::to('editZipper')}}" method="POST" enctype="multipart/form-data">

                              <div class="modal-content">                             
                                <div class="input-field">
                                  <input id="editZipperID" name = "editZipperID" value = "{{$zipper->strMaterialZipperID}}" type="hidden">
                                </div>
                          
                                <div class="input-field">
                                  <input required id="editZipperName" name = "editZipperName" value = "{{$zipper->strMaterialZipperName}}" type="text" class="validateName">
                                  <label for="Zipper_Name"> *Zipper Name </label>
                                </div>

                                <div class="input-field">
                                  <input required id="editZipperSize" name = "editZipperSize" value = "{{$zipper->strMaterialZipperSize}}" type="text" class="validateSize">
                                  <label for="Zipper_Size"> *Zipper Size </label>
                                </div>

                                <div class="input-field">
                                  <input required id="editZipperColor" name = "editZipperColor" value = "{{$zipper->strMaterialZipperColor}}" type="text" class="validateColor">
                                  <label for="Zipper_Color"> *Zipper Color </label>
                                </div>

                                <div class="input-field">
                                  <input required id="editZipperDesc" name = "editZipperDesc" value = "{{$zipper->strMaterialZipperDesc}}" type="text" class="validateColor">
                                  <label for="Zipper_Desc"> Description </label>
                                </div>

                         
                                <div class="file-field input-field">
                                  <div style="color:black" class="btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
                                    <span>Upload Image</span>
                                    <input type="file" id="editImg" name="editImg" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                                  </div>

                                  <div class="file-path-wrapper">
                                    <input value="{{$zipper->strMaterialZipperImage}}" class="file-path validate" id="editZipperImage" name="editZipperImage" type="text">
                                  </div>

                                </div>
                                <br><br> 
                              </div>    

                              <div class="modal-footer">
                                <button type="submit" class="modal-action  waves-effect waves-green btn btn-flat">UPDATE</button>
                                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a>  
                              </div>
                            </form>
                          </div>
                        
                        

                          <div id="del{{$zipper->strMaterialZipperID}}" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>Are you sure you want to deactivate?</center> </font> </h5>
                            <form action="{{URL::to('delZipper')}}" method="POST">
                              <div class="modal-content">
                                
                                <p>                           
                                  <div class="input-field">
                                    <input value="{{$zipper->strMaterialZipperID}}" id="delZipperID" name="delZipperID" type="hidden">
                                   </div>

                                  <div class="input-field">
                                    <label for="Zipper_Name">Zipper Name: </label>
                                    <input value="{{$zipper->strMaterialZipperName}}" id="delZipperName" name="delZipperName" type="text" class="validate" readonly>
                                  </div>

                                   <div class="input-field">
                                    <label for="Zipper_Size">Zipper Size: </label>
                                    <input value="{{$zipper->strMaterialZipperSize}}" id="delZipperSize" name="delZipperSize" type="text" class="validate" readonly>
                                  </div>

                                   <div class="input-field">
                                    <label for="Zipper_Color">Zipper Color: </label>
                                    <input value="{{$zipper->strMaterialZipperColor}}" id="delZipperColor" name="delZipperColor" type="text" class="validate" readonly>
                                  </div>

                                  <div class="input-field">
                                    <label for="Zipper_Desc">Description</label>
                                    <input value="{{$zipper->strMaterialZipperDesc}}" id="delZipperColor" name="delZipperColor" type="text" class="validate" readonly>
                                  </div>

                                 <div class="input-field">
                                    <input value="{{$zipper->strMaterialZipperID}}" id="delInactiveZipper" name="delInactiveZipper" type="hidden">
                                  </div>

                                  <div class="input-field">
                                    <input id="delInactiveReason" name = "delInactiveReason" value="{{$zipper->strInactiveReason}}" type="text" class="validate" required>
                                    <label for="Thread_Color"> *Reason for Inactivation: </label>
                                  </div>
                                </p>
                              </div>

                              <div class="modal-footer">
                                <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
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
                <div class = "clearfix"></div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <!--HOOK&EYE-->
      <div id="tabHook" class="hue col s12" style="margin-top:45px; background-color: pink;">
        <div style="height:30px;"></div>

        <div class="row">
          <div class="col s12">
            <div class="card">
              <div class="card-content">
                <div class = "col s12 m12 l12 overflow-x">
                  <h5><font color = "#1b5e20"><center>Hook & Eye</center> </font> </h5>
                  <table class = "centered" border = "1">

                    <thead>
                      <tr>
                        <!--<th date-field="Hook and Eye ID">Hook and Eye ID</th>-->
                        <th data-field="Hook and Eye Name">Hook and Eye Name</th>
                        <th data-field="Hook and Eye Size">Hook and Eye Size</th>
                        <th data-field="Hook and Eye Color">Hook and Eye Color</th>
                        <th data-field="Hook and Eye Desc">Description</th>
                        <th data-field="Image">Image</th>
                        <th>
                          <div align="right" style="margin-right:30px;"><a href="#addHookEye" style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to add a new hook and eye detail to the table"><i class="centered tiny material-icons">add</i></a></div>
                        </th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach($hook as $hook)
                      @if($hook->boolIsActive == 1)
                      <tr>
                       <!-- <td>{{$hook->strMaterialHookID}}</td>-->
                        <td>{{$hook->strMaterialHookName}}</td>
                        <td>{{$hook->strMaterialHookSize}}</td>
                        <td>{{$hook->strMaterialHookColor}}</td>
                        <td>{{$hook->strMaterialHookDesc}}</td>
                        <td><img class="materialboxed" width="650" src="{{URL::asset($hook->strMaterialHookImage)}}"></td>

                        <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit hook and eye detail" href="#edit{{$hook->strMaterialHookID}}">EDIT</button></td>
                        <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of hook and eye detail from the table" href="#del{{$hook->strMaterialHookID}}">deactivate</button>

                            
                          <div id="edit{{$hook->strMaterialHookID}}" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>Edit Hook and Eye</center> </font> </h5>
                            <form action ="{{URL::to('editHook')}}" method="POST" enctype="multipart/form-data">

                              <div class="modal-content">                              
                                <div class="input-field">
         
                                  <!-- <input id="editHookID" name = "editHookID" value = "{{$hook->strMaterialHookID}}" readonly = "readonly" type="text" class="">
                                  <label for="HookEye_ID"> Hook and Eye ID </label>
                                </div>
                                  -->
                      

                                  <input id="editHookID" name = "editHookID" value = "{{$hook->strMaterialHookID}}" type="hidden">
                                </div>
                          
                                <div class="input-field">
                                  <input id="editHookName" name = "editHookName" value = "{{$hook->strMaterialHookName}}" type="text" class="validateName">
                                  <label for="HookEye_Name"> *Hook and Eye Name </label>
                                </div>

                                <div class="input-field">
                                  <input id="editHookSize" name = "editHookSize" value = "{{$hook->strMaterialHookSize}}" type="text" class="validateSize">
                                  <label for="HookEye_Size"> *Hook and Eye Size </label>
                                </div>

                                <div class="input-field">
                                  <input id="editHookColor" name = "editHookColor" value = "{{$hook->strMaterialHookColor}}" type="text" class="validateColor">
                                  <label for="Hookeye_Color"> *Hook and Eye Color </label>
                                </div>

                                <div class="input-field">
                                  <input id="editHookDesc" name = "editHookDesc" value = "{{$hook->strMaterialHookDesc}}" type="text" class="validate">
                                  <label for="Hookeye_Desc">Description </label>
                                </div>

                                <div class="file-field input-field">
                                  <div style="color:black" class="btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
                                    <span>Upload Image</span>
                                    <input type="file" id="editImg" name="editImg" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
                                  </div>
                                  <div class="file-path-wrapper">
                                    <input value="{{$hook->strMaterialHookImage}}" id="editHookImage" name="editHookImage" class="file-path validate" type="text">
                                  </div>
                                </div>

                                <br><br> 

                              </div>    

                              <div class="modal-footer">
                                <button type="submit" class="modal-action  waves-effect waves-green btn btn-flat">UPDATE</button>
                                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a>   
                              </div>
                            </form>
                          </div>
                        

                          <div id="del{{$hook->strMaterialHookID}}" class="modal modal-fixed-footer">
                            <h5><font color = "#1b5e20"><center>Are you sure you want to deactivate?</center> </font> </h5>
                            <form action="{{URL::to('delHook')}}" method="POST">

                              <div class="modal-content">
                                
                                <p>
                                 
                                 <div class="input-field">
                                    <input value="{{$hook->strMaterialHookID}}" id="delHookID" name="delHookID" type="hidden">
                                  </div>

                                  <div class="input-field">
                                    <label for="Hook_Name">Hook and Eye Name: </label>
                                    <input value="{{$hook->strMaterialHookName}}" id="delHookName" name="delHookName" type="text" class="validate" readonly>
                                  </div>

                                   <div class="input-field">
                                    <label for="Hook_Size">Hook and Eye Size: </label>
                                    <input value="{{$hook->strMaterialHookSize}}" id="delHookSize" name="delHookSize" type="text" class="validate" readonly>
                                  </div>

                                  <div class="input-field">
                                    <label for="Hook_Color">Hook and Eye Color: </label>
                                    <input value="{{$hook->strMaterialHookColor}}" id="delHookColor" name="delHookColor" type="text" class="validate" readonly>
                                  </div>

                                  <div class="input-field">
                                    <label for="Hook_Desc">Description: </label>
                                    <input value="{{$hook->strMaterialHookDesc}}" id="delHookDesc" name="delHookDesc" type="text" class="validate" readonly>
                                  </div>

                                  <div class="input-field">
                                    <input value="{{$hook->strMaterialHookID}}" id="delInactiveHook" name="delInactiveHook" type="hidden">
                                  </div>

                                  <div class="input-field">
                                    <input id="delInactiveReason" name = "delInactiveReason" value="{{$hook->strInactiveReason}}" type="text" class="validate" required>
                                    <label for="Thread_Color"> *Reason for Inactivation: </label>
                                  </div>
                                </p>
                              </div>

                              <div class="modal-footer">
                                <button type="submit" class="waves-effect waves-green btn-flat">OK</button>
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
                <div class = "clearfix"></div>
              </div>
            </div>
          </div>
        </div>

      </div>
  

  <!--MODAL: add Thread-->
  <div id="addThread" class="modal modal-fixed-footer">
    <h5><font color = "#1b5e20"><center>Add Thread</center> </font> </h5>
    <form action="{{URL::to('addThread')}}" method="POST" enctype="multipart/form-data">

      <div class="modal-content">
        <div class="input-field">
            <input id="addThreadID" name = "addThreadID" value = "{{$newThreadID}}" type="hidden">
         </div>
                    
        <div class="input-field">
          <input required id="addThreadName" name = "addThreadName" type="text" class="validateName">
          <label for="Thread_Name"> *Thread Name </label>
        </div>

        <div class="input-field">
          <input required id="addThreadColor" name = "addThreadColor" type="text" class="validateColor">
          <label for="Thread_Color"> *Thread Color </label>
        </div>

        <div class="input-field">
          <input required id="addThreadDesc" name = "addThreadDesc" type="text" >
          <label for="Thread_Desc"> Description </label>
        </div>

        <div class="file-field input-field">
          <div style="color:black" class="btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
            <span>Upload Image</span>
            <input type="file" id="addImg" name="addImg" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
          </div>

          <div class="file-path-wrapper">
            <input class="file-path validate" id="addImage" name="addImage" type="text">
          </div>
        </div>
          
      </div>
    
      <!--MODAL FOOTER-->
      <div class="modal-footer">
        <button type="submit" class="modal-action  waves-effect waves-green btn-flat">SAVE</button>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a> 
      </div>
    </form>
  </div>

  <!--MODAL: add Needle-->
  <div id="addNeedle" class="modal modal-fixed-footer">
    <h5><font color = "#1b5e20"><center>Add Needle</center> </font> </h5>
    <form action="{{URL::to('addNeedle')}}" method="POST" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="input-field">
           <input id="addNeedleID" name = "addNeedleID" value = "{{$newNeedleID}}" type="hidden">
         </div>
                    
        <div class="input-field">
          <input required id="addNeedleName" name = "addNeedleName"  type="text" class="validateName">
          <label for="Needle_Name"> *Needle Name </label>
        </div>

        <div class="input-field">
          <input required  id="addNeedleSize" name = "addNeedleSize" type="text" class="validateSize">
          <label for="Needle_Size"> *Needle Size </label>
        </div>
                    
         <div class="input-field">
          <input required  id="addNeedleDesc" name = "addNeedleDesc" type="text" class="validateSize">
          <label for="Needle_Desc"> Description: </label>
        </div>
                                  
        <div class="file-field input-field">
          <div style="color:black" class="btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
            <span>Upload Image</span>
            <input type="file" id="addImg" name="addImg" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
          </div>

          <div class="file-path-wrapper">
            <input class="file-path validate" id="addImage" name="addImage" type="text">
          </div>
        </div>
        
      </div>
    
      <!--MODAL FOOTER-->
      <div class="modal-footer">
        <button type="submit" class="modal-action  waves-effect waves-green btn-flat">SAVE</button>
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a> 
      </div>
    </form>
  </div>

  <!--MODAL: add Button-->
  <div id="addButton" class="modal modal-fixed-footer">
    <h5><font color = "#1b5e20"><center>Add Button</center> </font> </h5>
    <form action="{{URL::to('addButton')}}" method="POST" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="input-field">
          <input id="addButtonID" name = "addButtonID" value = "{{$newButtonID}}" type="hidden">
        </div>
                    
        <div class="input-field">
          <input required  id="addButtonName" name = "addButtonName" type="text" class="validateName">
          <label for="Button_Name"> *Button Name </label>
        </div>

        <div class="input-field">
          <input required id="addButtonSize" name = "addButtonSize" type="text" class="validateSize">
          <label for="Button_Size"> *Button Size </label>
        </div>

        <div class="input-field">
          <input required id="addButtonColor" name = "addButtonColor" type="text" class="validateColor">
          <label for="Button_Color"> *Button Color </label>
        </div>

        <div class="input-field">
          <input required id="addButtonDesc" name = "addButtonDesc" type="text" class="validateColor">
          <label for="Button_Desc"> Description: </label>
        </div>
                                       
        <div class="file-field input-field">
          <div style="color:black" class="btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
            <span>Upload Image</span>
            <input type="file" id="addImg" name="addImg" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" id="addImage" name="addImage" type="text">
          </div>
        </div>
        
      </div>
    
      <!--MODAL FOOTER-->
      <div class="modal-footer">
        <button type="submit" class="modal-action  waves-effect waves-green btn-flat">SAVE</button>
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a> 
      </div>
    </form>
  </div>

  <!--MODAL: add Zipper-->
  <div id="addZipper" class="modal modal-fixed-footer">
    <h5><font color = "#1b5e20"><center>Add Zipper</center> </font> </h5>
    <form action="{{URL::to('addZipper')}}" method="POST" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="input-field">
          <input id="addZipperID" name = "addZipperID" value = "{{$newZipperID}}" type="hidden">
        </div>
                    
        <div class="input-field">
          <input required id="addZipperName" name = "addZipperName" type="text" class="validateName">
          <label for="Zipper_Name"> *Zipper Name </label>
        </div>

        <div class="input-field">
          <input required id="addZipperSize" name = "addZipperSize" type="text" class="validateSize">
          <label for="Zipper_Size"> *Zipper Size </label>
        </div>

        <div class="input-field">
          <input required id="addZipperColor" name = "addZipperColor" type="text" class="validateColor">
          <label for="Zipper_Color"> *Zipper Color </label>
        </div>

        <div class="input-field">
          <input required id="addZipperDesc" name = "addZipperDesc" type="text" class="validateColor">
          <label for="Zipper_Desc"> Description </label>
        </div>

        <div class="file-field input-field">
          <div style="color:black" class="btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
            <span>Upload Image</span>
            <input type="file" id="addImg" name="addImg" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
          </div>

          <div class="file-path-wrapper">
            <input class="file-path validate" id="addImage" name="addImage" type="text">
          </div>

        </div>
        
      </div>
    
      <!--MODAL FOOTER-->
      <div class="modal-footer">
        <button type="submit" class="modal-action  waves-effect waves-green btn-flat">SAVE</button>
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a> 
      </div>
    </form>
  </div>

  <!--MODAL: add HookEye-->
  <div id="addHookEye" class="modal modal-fixed-footer">
    <h5><font color = "#1b5e20"><center>Add Hook and Eye</center> </font> </h5>
    <form action="{{URL::to('addHook')}}" method="POST" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="input-field">
          <input id="addHookEyeID" name = "addHookID" value = "{{$newHookID}}" type="hidden">
        </div>
                    
        <div class="input-field">
          <input required id="addHookEyeName" name = "addHookName" type="text" class="validateName">
          <label for="HookEye_Name"> *Hook and Eye Name: </label>
        </div>

        <div class="input-field">
          <input required id="addHookEyeSize" name = "addHookSize" type="text" class="validateSize">
          <label for="HookEye_Size"> *Hook and Eye Size: </label>
        </div>

        <div class="input-field">
          <input required id="addHookEyeColor" name = "addHookColor" type="text" class="validateColor">
          <label for="Hookeye_Color"> *Hook and Eye Color: </label>
        </div>

         <div class="input-field">
          <input required id="addHookEyeDesc" name = "addHookDesc" type="text" class="validate">
          <label for="Hookeye_Desc"> Description: </label>
        </div>

        <div class="file-field input-field">
          <div style="color:black" class="btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="May upload jpg, png, gif, bmp, tif, tiff files">
            <span>Upload Image</span>
            <input type="file" id="addImg" name="addImg" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|images/*">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" id="addImage" name="addImage" type="text">
          </div>
        </div>
     </div>
    
      <!--MODAL FOOTER-->
      <div class="modal-footer">
        <button type="submit" class=" modal-action  waves-effect waves-green btn-flat">ADD</button>
        <button type="button" onclick="clearData()" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</button> 
      </div>
      
    </form>
  </div>

@stop

@section('scripts')
  <script type="text/javascript">
      $('.validateName').on('input', function() {
          var input=$(this);
          var re=/^[a-zA-Z," "]+$/;
          var is_name=re.test(input.val());
          if(is_name){input.removeClass("invalid").addClass("valid");}
          else{input.removeClass("valid").addClass("invalid");}
        });

      //Kapag Number
      $('.validateName').keyup(function() {
        var name = $(this).val();
        $(this).val(name.replace(/\d/, ''));
      });     

      $('.validateName').blur('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z," "]+$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      }); 

      $('.validateSize').on('input', function() {
          var input=$(this);
          var re=/^[a-zA-Z," "]+$/;
          var is_name=re.test(input.val());
          if(is_name){input.removeClass("invalid").addClass("valid");}
          else{input.removeClass("valid").addClass("invalid");}
        });

      //Kapag Number
      $('.validateSize').keyup(function() {
        var name = $(this).val();
        $(this).val(name.replace(/\d/, ''));
      });     

      $('.validateSize').blur('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z," "]+$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      }); 

      $('.validateColor').on('input', function() {
          var input=$(this);
          var re=/^[a-zA-Z," "]+$/;
          var is_name=re.test(input.val());
          if(is_name){input.removeClass("invalid").addClass("valid");}
          else{input.removeClass("valid").addClass("invalid");}
        });

      //Kapag Number
      $('.validateColor').keyup(function() {
        var name = $(this).val();
        $(this).val(name.replace(/\d/, ''));
      });     

      $('.validateColor').blur('input', function() {
        var input=$(this);
        var re=/^[a-zA-Z," "]+$/;
        var is_name=re.test(input.val());
        if(is_name){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
      }); 

  </script>
          <!--DATA TABLE SCRIPT-->
    <script type="text/javascript">
      $(document).ready(function() {
          $('.data-thread').DataTable();
          $('select').material_select();
          
          setTimeout(function () {
            $('#success-message').hide();
        }, 5000);
      } );
    </script>

@stop

  