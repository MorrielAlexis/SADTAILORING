@extends('layouts.master')

@section('content')

<div>
  <h4>MATERIALS</h4>
  <div class="divider"></div>
  <div style="padding-top:10px; padding-bottom:20px; margin-left:20px;">
    <button style="color:black; margin-left: 20px" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to add a new material to the list" href="#addMaterial">ADD Material</button>
  </div>
</div>
  <!--Collapsible-->
  <ul class="collapsible popout" data-collapsible="accordion">
    
    <!--THREADS-->
    <li>
      <div class="collapsible-header">
        <i class="material-icons">filter_drama</i><h5>THREADS</h5>
      </div>
      <div class="collapsible-body" style="background:white">
        <div class="col s12 m12 l12 overflow-x">
        <table class = "centered" border = "1">
        <button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to view deleted thread details from the table" href="#inactiveThread">VIEW INACTIVE THREADS</button>

               <thead>
                <tr>
                  <!--<th date-field= "Thread ID">Thread ID</th>-->
                  <th data-field="Thread Name">Thread Name</th>
                  <th data-field="Thread Color">Thread Color</th>
                  <th data-field="ThreadImage">Image</th>
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
                  <td><img class="materialboxed" width="650" src="{{URL::asset($thread->strMaterialThreadImage)}}"></td> 
                  <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit thread details" href="#edit{{ $thread->strMaterialThreadID }}">EDIT</button></td>
                  <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of thread details from the table" href="#del{{ $thread->strMaterialThreadID }}">DELETE</button>
                      
                    <!--EDIT THREADS-->
                    <div id="edit{{ $thread->strMaterialThreadID }}" class="modal modal-fixed-footer">
                      <h5><font color = "#1b5e20"><center>Edit Thread</center> </font> </h5> 

                      <div class="modal-content">
                      <form action="{{URL::to('editThread')}}" method="POST" enctype="multipart/form-data"> 
                        <div class="input-field">
 
                          <input id="editThreadID" name = "editThreadID" value = "{{ $thread->strMaterialThreadID }}" readonly = "readonly" type="text" class="">
                          <label for="Thread_ID"> Thread ID: </label>

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

                    </div>
                  </form>
                 

                      <!--DELETE THREADS-->
                <div id="del{{ $thread->strMaterialThreadID }}" class="modal modal-fixed-footer">
                      <div class="modal-content">
                        <h5><font color = "#1b5e20"><center>Are you sure you want to delete?</center> </font> </h5> 
                        <p>
                         <form action="{{URL::to('delThread')}}" method="POST">
 
                          <div class="input-field">
                            <label for="first_name">Thread ID: </label>
                            <input value="{{$thread->strMaterialThreadID}}" id="delThreadID" name="delThreadID" type="text" class="" readonly>

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

                <!--VIEW INACTIVE THREADS-->
          <div id="inactiveThread" class="modal modal-fixed-footer">
             <div class="modal-content">
             <h5><font color = "#1b5e20"><center>Inactive Threads</center> </font> </h5>
                <table class="centered" border="1">
                  <thead>
                <tr>
                  <!--<th date-field= "Thread ID">Thread ID</th>-->
                  <th data-field="Thread Name">Thread Name</th>
                  <th data-field="Thread Color">Thread Color</th>
                  <th data-field="ThreadImage">Image</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($thread2 as $thread2)
                      @if($thread2->boolIsActive == 0)
                      <tr>
                       <!-- <td>{{ $thread2->strMaterialThreadID }}</td>-->
                        <td>{{ $thread2->strMaterialThreadName }}</td>
                        <td>{{ $thread2->strMaterialThreadColor }}</td>
                        <td><img src="{{URL::asset($thread2->strMaterialThreadImage)}}"></td>    
                        <td>          
                        <form action="{{URL::to('reactThread')}}" method="POST">
                        <input type="hidden" value="{{ $thread2->strMaterialThreadID }}" id="reactID" name="reactID">
                        <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="Returns data of thread to the table">REACTIVATE</button>
                        </form>
                      </td>
                    </tr>
                    @endif
                    @endforeach
                  </tbody>
                </table>
              </div>
              
              <div class="modal-footer">
                  <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CLOSE</a> 
              </div>
            </div>
        </div>
          </div>
      </div>
    </div>
    </li>

        <div class = "clearfix"></div>


    <!--NEEDLES-->

    <li>
      <div class="collapsible-header">
        <i class="material-icons">filter_drama</i><h5>NEEDLES</h5>
      </div>
      <div class="collapsible-body" style="background:white">
        <div class="col s12 m12 l12 overflow-x">
        <table class = "centered" border = "1">
        <button style="color:black; margin-left: 20px" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to view deleted needle details from the table" href="#inactiveNeedle">VIEW INACTIVE NEEDLES</button>
              <thead>
                <tr>
                  <!--<th date-field= "Needle ID">Needle ID</th>-->
                  <th data-field="Needle Name">Needle Name</th>
                  <th data-field="Needle Size">Needle Size</th>
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
                  <td><img class="materialboxed" width="650" src="{{URL::asset($needle->strMaterialNeedleImage)}}"></td>
                  <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit needle detail" href="#edit{{$needle->strMaterialNeedleID}}">EDIT</button>
                  <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of needle detail from the table" href="#del{{$needle->strMaterialNeedleID}}">DELETE</button>
                      
                    <div id="edit{{$needle->strMaterialNeedleID}}" class="modal modal-fixed-footer">
                      <h5><font color = "#1b5e20"><center>Edit Needle</center> </font> </h5> 

                      <div class="modal-content">
                        <form action="{{URL::to('editNeedle')}}" method="POST" enctype="multipart/form-data">
                        <div class="input-field">
 
                          <input id="editNeedleID" name = "editNeedleID" value = "{{$needle->strMaterialNeedleID}}" readonly = "readonly" type="text" class="">
                          <label for="Needle_ID"> Needle ID </label>

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

                    </div>
                  </form>
                  

        <div id="del{{$needle->strMaterialNeedleID}}" class="modal modal-fixed-footer">
                      <div class="modal-content">
                        <h5><font color = "#1b5e20"><center>Are you sure you want to delete?</center> </font> </h5> 
                        <p>
                         <form action="{{URL::to('delNeedle')}}" method="POST">
                          <div class="input-field">
 
                            <label for="first_name">Needle ID: </label>
                            <input value="{{$needle->strMaterialNeedleID}}" id="delNeedleID" name="delNeedleID" type="text" class="" readonly>

                            <input value="{{$needle->strMaterialNeedleID}}" id="delNeedleID" name="delNeedleID" type="hidden">
 
                          </div>

                          <div class="input-field">
                            <label for="first_name">Needle Name: </label>
                            <input value="{{$needle->strMaterialNeedleName}}" id="delNeedleName" name="delNeedleName" type="text" class="validate" readonly>
                          </div>

                           <div class="input-field">
                            <label for="middle_name">Needle Color: </label>
                            <input value="{{$needle->strMaterialNeedleColor}}" id="delNeedleColor" name="delNeedleColor" type="text" class="validate" readonly>
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

  <div id="inactiveNeedle" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h5><font color = "#1b5e20"><center>Inactive Needles</center> </font> </h5>
      <table class="centered" border="1">
        <thead>
          <tr>
            <!--<th data-field="Needle ID">Needle ID</th>-->
            <th data-field="Needle Name">Needle Name</th>
            <th data-field= "Needle Size">Needle Size </th>
            <th data-field="Image">Image</th>          </tr>
        </thead>

        <tbody>
          @foreach($needle2 as $needle2)
            @if($needle2->boolIsActive == 0)
            <tr>
              <!--<td>{{ $needle2->strMaterialNeedleID }}</td>-->
              <td>{{ $needle2->strMaterialNeedleName }}</td>
              <td>{{ $needle2->strMaterialNeedleSize }}</td>
              <td><img class="materialboxed" width="650" src="{{URL::asset($needle2->strMaterialNeedleImage)}}"> </td>      
              <td>          
              <form action="{{URL::to('reactNeedle')}}" method="POST">
              <input type="hidden" value="{{ $needle2->strMaterialNeedleID }}" id="reactID" name="reactID">
              <button type="submit"  style="color:black" class="btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="Returns data of needle to the table">REACTIVATE</button>
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
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CLOSE</a> 
    </div>
  </div>
    
        <div class = "clearfix">

        </div>
      </div>
    </li>


    <!--BUTTONS-->
    <li>
      <div class="collapsible-header"><i class="material-icons">filter_drama</i><h5>BUTTONS</h5></div>
      <div class="collapsible-body" style="background:white">
        <div class="col s12 m12 l12 overflow-x">
        <table class = "centered" border = "1">

        <button style="color:black;\margin-left: 20px" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to view deleted button details from the table" href="#inactiveButton">VIEW INACTIVE BUTTONS</button>
              <thead>
                <tr>
                 <!-- <th date-field= "Button ID">Button ID</th>-->
                  <th data-field="Button Name">Button Name</th>
                  <th data-field="Button Size">Button Size</th>
                  <th data-field="Button Color">Button Color</th>
                  <th data-field="ButtonImage">Button Image Link</th>
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
                  <td><img class="materialboxed" width="650" src="{{URL::asset($button->strMaterialButtonImage)}}"></td>
                  <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit button detail" href="#edit{{$button->strMaterialButtonID}}">EDIT</button>
                  <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of button detail from the table" href="#del{{$button->strMaterialButtonID}}">DELETE</button>
                      
                    <div id="edit{{$button->strMaterialButtonID}}" class="modal modal-fixed-footer">
                      <h5><font color = "#1b5e20"><center>Edit Button</center> </font> </h5> 

                      <div class="modal-content">
                        <form action="{{URL::to('editButton')}}" method="POST" enctype="multipart/form-data">
 
                        <div class="input-field">
                          <input id="editButtonID" name = "editButtonID" value = "{{$button->strMaterialButtonID}}" readonly = "readonly" type="text" class="">
                          <label for="Button_ID"> Button ID </label>

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

                    </div>
                  </form>
                 

        <div id="del{{$button->strMaterialButtonID}}" class="modal modal-fixed-footer">
                      <div class="modal-content">
                        <h5><font color = "#1b5e20"><center>Are you sure you want to delete?</center> </font> </h5> 
                        <p>
                         <form action="{{URL::to('delButton')}}" method="POST">
                          <div class="input-field">
 
                            <label for="first_name">Button ID: </label>
                            <input value="{{$button->strMaterialButtonID}}" id="delButtonID" name="delButtonID" type="text" class="" readonly>

                            <input value="{{$button->strMaterialButtonID}}" id="delButtonID" name="delButtonID" type="hidden">

                          </div>

                          <div class="input-field">
                            <label for="first_name">Button Name: </label>
                            <input value="{{$button->strMaterialButtonName}}" id="delButtonName" name="delButtonName" type="text" class="validate" readonly>
                          </div>

                           <div class="input-field">
                            <label for="middle_name">Button Size: </label>
                            <input value="{{$button->strMaterialButtonSize}}" id="delButtonSize" name="delButtonSize" type="text" class="validate" readonly>
                          </div>

                           <div class="input-field">
                            <label for="middle_name">Button Color: </label>
                            <input value="{{$button->strMaterialButtonColor}}" id="delButtonColor" name="delButtonColor" type="text" class="validate" readonly>
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


  <div id="inactiveButton" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h5><font color = "#1b5e20"><center>Inactive Buttons</center> </font> </h5>
      <table class="centered" border="1">
        <thead>
          <tr>
            <!--<th data-field="Button ID">Button ID</th>-->
            <th data-field="Button Name">Button Name</th>
            <th data-field= "Button Size">Button Size </th>
            <th data-field= "Button Color">Button Color </th>
            <th data-field="Image">Image</th>          
          </tr>
        </thead>

        <tbody>
          @foreach($button2 as $button2)
            @if($button2->boolIsActive == 0)
            <tr>
              <!--<td>{{ $button2->strMaterialButtonID }}</td>-->
              <td>{{ $button2->strMaterialButtonName }}</td>
              <td>{{ $button2->strMaterialButtonSize }}</td>
              <td>{{ $button2->strMaterialButtonColor }}</td>
              <td><img class="materialboxed" width="650" src="{{URL::asset($button2->strMaterialButtonImage)}}"> </td>      
              <td>          
              <form action="{{URL::to('reactButton')}}" method="POST">
              <input type="hidden" value="{{ $button2->strMaterialButtonID }}" id="reactID" name="reactID">
              <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="Returns data of button to the table">REACTIVATE</button>
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
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CLOSE</a> 
    </div>
  </div>

        <div class = "clearfix">

        </div>
      </div>
    </li>

    <!--ZIPPERS-->
    <li>
      <div class="collapsible-header"><i class="material-icons">filter_drama</i><h5>ZIPPERS</h5></div>
      <div class="collapsible-body" style="background:white">
        <div class="col s12 m12 l12 overflow-x">
        <table class = "centered" border = "1">

        <button style="color:black; margin-left: 20px" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to view deleted zipper details from the table" href="#inactiveZipper">VIEW INACTIVE ZIPPERS</button>
              <thead>
                <tr>
                  <!--<th date-field= "Zipper ID">Zipper ID</th>-->
                  <th data-field="Zipper Name">Zipper Name</th>
                  <th data-field="Zipper Size">Zipper Size</th>
                  <th data-field="Zipper Color">Zipper Color</th>
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
                  <td><img class="materialboxed" width="650" src="{{URL::asset($zipper->strMaterialZipperImage)}}"></td>
                  <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit zipper detail" href="#edit{{$zipper->strMaterialZipperID}}">EDIT</button>
                  <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of zipper detail from the table" href="#del{{$zipper->strMaterialZipperID}}">DELETE</button>
                      
                    <div id="edit{{$zipper->strMaterialZipperID}}" class="modal modal-fixed-footer">
                      <h5><font color = "#1b5e20"><center>Edit Zipper</center> </font> </h5>

                      <div class="modal-content">
                        <form action="{{URL::to('editZipper')}}" method="POST" enctype="multipart/form-data">
                        <div class="input-field">
 
                          <input id="editZipperID" name = "editZipperID" value = "{{$zipper->strMaterialZipperID}}" readonly = "readonly" type="text" class="">
                          <label for="Zipper_ID"> Zipper ID </label>

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

                    </div>
                  </form>
                  

        <div id="del{{$zipper->strMaterialZipperID}}" class="modal modal-fixed-footer">
                      <div class="modal-content">
                        <h5><font color = "#1b5e20"><center>Are you sure you want to delete?</center> </font> </h5>
                        <p>
                         <form action="{{URL::to('delZipper')}}" method="POST">
                          <div class="input-field">
 
                            <label for="first_name">Zipper ID: </label>
                            <input value="{{$zipper->strMaterialZipperID}}" id="delZipperID" name="delZipperID" type="text" class="" readonly>

                            <input value="{{$zipper->strMaterialZipperID}}" id="delZipperID" name="delZipperID" type="hidden">
 
                          </div>

                          <div class="input-field">
                            <label for="first_name">Zipper Name: </label>
                            <input value="{{$zipper->strMaterialZipperName}}" id="delZipperName" name="delZipperName" type="text" class="validate" readonly>
                          </div>

                           <div class="input-field">
                            <label for="middle_name">Zipper Size: </label>
                            <input value="{{$zipper->strMaterialZipperSize}}" id="delZipperSize" name="delZipperSize" type="text" class="validate" readonly>
                          </div>

                           <div class="input-field">
                            <label for="middle_name">Zipper Color: </label>
                            <input value="{{$zipper->strMaterialZipperColor}}" id="delZipperColor" name="delZipperColor" type="text" class="validate" readonly>
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


  <div id="inactiveZipper" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h5><font color = "#1b5e20"><center>Inactive Zippers</center> </font> </h5>
      <table class="centered" border="1">
        <thead>
          <tr>
            <!--<th data-field="Zipper ID">Zipper ID</th>-->
            <th data-field="Zipper Name">Zipper Name</th>
            <th data-field= "Zipper Size">Zipper Size </th>
            <th data-field= "Zipper Color">Zipper Color </th>
            <th data-field="Image">Image</th>          
          </tr>
        </thead>

        <tbody>
          @foreach($zipper2 as $zipper2)
            @if($zipper2->boolIsActive == 0)
            <tr>
              <!--<td>{{ $zipper2->strMaterialZipperID }}</td>-->
              <td>{{ $zipper2->strMaterialZipperName }}</td>
              <td>{{ $zipper2->strMaterialZipperSize }}</td>
              <td>{{ $zipper2->strMaterialZipperColor }}</td>
              <td><img class="materialboxed" width="650" src="{{URL::asset($zipper2->strMaterialZipperImage)}}"> </td>      
              <td>          
              <form action="{{URL::to('reactZipper')}}" method="POST">
              <input type="hidden" value="{{ $zipper2->strMaterialZipperID }}" id="reactID" name="reactID">
              <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="Returns data of zippers to the table">REACTIVATE</button>
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
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CLOSE</a> 
    </div>
  </div>

        <div class = "clearfix">

        </div>
      </div>
    </li>

    <!--HOOK&EYE-->
    <li>
      <div class="collapsible-header">
        <i class="material-icons">filter_drama</i><h5>HOOK & EYE</h5>
      </div>
      <div class="collapsible-body" style="background:white">
          <div class="col s12 m12 l12 overflow-x">
          <table class = "centered" border = "1">

        <button style="color:black; margin-left: 20px" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="CLick to view deleted hook and eye details from the table" href="#inactiveHook">VIEW INACTIVE THREADS</button>
              <thead>
                <tr>
                  <!--<th date-field="Hook and Eye ID">Hook and Eye ID</th>-->
                  <th data-field="Hook and Eye Name">Hook and Eye Name</th>
                  <th data-field="Hook and Eye Size">Hook and Eye Size</th>
                  <th data-field="Hook and Eye Color">Hook and Eye Color</th>
                  <th data-field="Image">Image</th>
                  <th data-field="Hook and Eye Desc">Description</th>
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
                  <td><img class="materialboxed" width="650" src="{{URL::asset($hook->strMaterialHookImage)}}"></td>

                  <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to edit hook and eye detail" href="#edit{{$hook->strMaterialHookID}}">EDIT</button>
                  <td><button style="color:black" class="modal-trigger btn tooltipped btn-small center-text light-green accent-1" data-position="bottom" data-delay="50" data-tooltip="Click to remove data of hook and eye detail from the table" href="#del{{$hook->strMaterialHookID}}">DELETE</button>

                      
                    <div id="edit{{$hook->strMaterialHookID}}" class="modal modal-fixed-footer">
                      <h5><font color = "#1b5e20"><center>Edit Hook and Eye</center> </font> </h5>

                      <div class="modal-content">
                        <form action ="{{URL::to('editHook')}}" method="POST" enctype="multipart/form-data">
                        <div class="input-field">
 
                          <input id="editHookID" name = "editHookID" value = "{{$hook->strMaterialHookID}}" readonly = "readonly" type="text" class="">
                          <label for="HookEye_ID"> Hook and Eye ID </label>
                        </div>
                  
                        <div class="input-field">
                          <input required id="editHookEyeName" name = "editHookEyeName" value = "{{$hook->strMaterialHookName}}" type="text" class="validateName">
                          <label for="HookEye_Name"> *Hook and Eye Name </label>
                        </div>

                        <div class="input-field">
                          <input required id="editHookEyeSize" name = "editHookEyeSize" value = "{{$hook->strMaterialHookSize}}" type="text" class="validateSize">
                          <label for="HookEye_Size"> *Hook and Eye Size </label>
                        </div>

                        <div class="input-field">
                          <input required id="editHookEyeColor" name = "editHookEyeColor" value = "{{$hook->strMaterialHookColor}}" type="text" class="validateColor">
                          <label for="Hookeye_Color"> *Hook and Eye Color </label>

                          <input id="editHookID" name = "editHookID" value = "{{$hook->strMaterialHookID}}" type="hidden">
                        </div>
                  
                        <div class="input-field">
                          <input id="editHookName" name = "editHookName" value = "{{$hook->strMaterialHookName}}" type="text" class="validateName">
                          <label for="HookEye_Name"> Hook and Eye Name </label>
                        </div>

                        <div class="input-field">
                          <input id="editHookSize" name = "editHookSize" value = "{{$hook->strMaterialHookSize}}" type="text" class="validateSize">
                          <label for="HookEye_Size"> Hook and Eye Size </label>
                        </div>

                        <div class="input-field">
                          <input id="editHookColor" name = "editHookColor" value = "{{$hook->strMaterialHookColor}}" type="text" class="validateColor">
                          <label for="Hookeye_Color"> Hook and Eye Color </label>
 
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
                      <div class="modal-content">
                        <h5><font color = "#1b5e20"><center>Are you sure you want to delete?</center> </font> </h5> 
                        <p>
                         <form action="{{URL::to('delHook')}}" method="POST">
 
                          <div class="input-field">
                            <label for="first_name">Hook and Eye ID: </label>
                            <input value="{{$hook->strMaterialHookID}}" id="delHookID" name="delHookID" type="text" class="" readonly>

                         <div class="input-field">
                            <input value="{{$hook->strMaterialHookID}}" id="delHookID" name="delHookID" type="hidden">
 
                          </div>

                          <div class="input-field">
                            <label for="first_name">Hook and Eye Name: </label>
                            <input value="{{$hook->strMaterialHookName}}" id="delHookName" name="delHookName" type="text" class="validate" readonly>
                          </div>

                           <div class="input-field">
                            <label for="middle_name">Hook and Eye Size: </label>
                            <input value="{{$hook->strMaterialHookSize}}" id="delHookSize" name="delHookSize" type="text" class="validate" readonly>
                          </div>

                           <div class="input-field">
                            <label for="middle_name">Hook and Eye Color: </label>
                            <input value="{{$hook->strMaterialHookColor}}" id="delHookColor" name="delHookColor" type="text" class="validate" readonly>
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


  <div id="inactiveHook" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h5><font color = "#1b5e20"><center>Inactive Hook and Eyes</center> </font> </h5>
      <table class="centered" border="1">
        <thead>
          <tr>
            <!--<th data-field="Hook ID">Hook and Eye ID</th>-->
            <th data-field="Hook Name">Hook and Eye Name</th>
            <th data-field= "Hook Size">Hook and Eye Size </th>
            <th data-field= "Hook Color">Hook and Eye Color </th>
            <th data-field="Image">Image</th>          
          </tr>
        </thead>

        <tbody>
          @foreach($hook2 as $hook2)
            @if($hook2->boolIsActive == 0)
            <tr>
             <!-- <td>{{$hook2->strMaterialHookID}}</td>-->
              <td>{{$hook2->strMaterialHookName}}</td>
              <td>{{$hook2->strMaterialHookSize}}</td>
              <td>{{$hook2->strMaterialHookColor}}</td>
              <td><img class="materialboxed" width="650" src="{{URL::asset($hook2->strMaterialHookImage)}}"> </td>      
              <td>          
              <form action="{{URL::to('reactHook')}}" method="POST">
              <input type="hidden" value="{{$hook->strMaterialHookID}}" id="reactID" name="reactID">
              <button type="submit" style="color:black" class="btn tooltipped btn-small center-text light-green darken-2" data-position="bottom" data-delay="50" data-tooltip="Returns data of hook and eye to the table">REACTIVATE</button>
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
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CLOSE</a> 
    </div>
  </div>

        <div class = "clearfix">

        </div>
      </div>
    </li>
  </ul>


  <!--MODAL: add Thread-->
  <div id="addThread" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h5><font color = "#1b5e20"><center>Add Thread</center> </font> </h5>
      <form action="{{URL::to('addThread')}}" method="POST" enctype="multipart/form-data">
      <div class="input-field">
 
          <input id="addThreadID" name = "addThreadID" value = "{{$newThreadID}}" readonly = "readonly" type="text" class="">
          <label for="Thread_ID"> Thread ID: </label>

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
    <div class="modal-content">
      <h5><font color = "#1b5e20"><center>Add Needle</center> </font> </h5>
      <form action="{{URL::to('addNeedle')}}" method="POST" enctype="multipart/form-data">
      <div class="input-field">
 
        <input id="addNeedleID" name = "addNeedleID" value = "{{$newNeedleID}}" readonly = "readonly" type="text" class="">
        <label for="Needle_ID"> Needle ID: </label>

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
    <div class="modal-content">
      <h5><font color = "#1b5e20"><center>Add ButtonAdd</center> </font> </h5>
      <form action="{{URL::to('addButton')}}" method="POST" enctype="multipart/form-data">
      <div class="input-field">
 
        <input id="addButtonID" name = "addButtonID" value = "{{$newButtonID}}" readonly = "readonly" type="text" class="">
        <label for="Button_ID"> Button ID: </label>
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
    <div class="modal-content">
      <h5><font color = "#1b5e20"><center>Add Zipper</center> </font> </h5>
      <form action="{{URL::to('addZipper')}}" method="POST" enctype="multipart/form-data">
      <div class="input-field">
 
        <input id="addZipperID" name = "addZipperID" value = "{{$newZipperID}}" readonly = "readonly" type="text" class="">
        <label for="Zipper_ID"> Zipper ID: </label>

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
    <div class="modal-content">
     <h5><font color = "#1b5e20"><center>Add Hook and Eye</center> </font> </h5>
      <form action="{{URL::to('addHook')}}" method="POST" enctype="multipart/form-data">
 
      <div class="input-field">
        <input id="addHookEyeID" name = "addHookID" value = "{{$newHookID}}" readonly = "readonly" type="text" class="">
        <label for="HookEye_ID"> Hook and Eye ID </label>

     <div class="input-field">
        <input id="addHookEyeID" name = "addHookID" value = "{{$newHookID}}" type="hidden">
 
      </div>
                  
      <div class="input-field">
        <input required id="addHookEyeName" name = "addHookName" type="text" class="validateName">
        <label for="HookEye_Name"> *Hook and Eye Name </label>
      </div>

      <div class="input-field">
        <input required id="addHookEyeSize" name = "addHookSize" type="text" class="validateSize">
        <label for="HookEye_Size"> *Hook and Eye Size </label>
      </div>

      <div class="input-field">
        <input required id="addHookEyeColor" name = "addHookColor" type="text" class="validateColor">
        <label for="Hookeye_Color"> *Hook and Eye Color </label>
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
@stop

  