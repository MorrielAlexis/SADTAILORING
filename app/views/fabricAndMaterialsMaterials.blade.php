@extends('layouts.master')

@section('content')

<div>
<h4>MATERIALS</h4>
<div class="divider"></div>
<div style="padding-top:10px; padding-bottom:20px; margin-left:20px;">
  <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#addMaterial">ADD Material</button>
</div>

  <!--Collapsible-->
  <ul class="collapsible popout" data-collapsible="accordion">
    
    <!--THREADS-->
    <li>
      <div class="collapsible-header">
        <i class="material-icons">filter_drama</i><h5>THREAD</h5>
      </div>
      <div class="collapsible-body">
        <div>
        <table class = "centered" align = "center" border = "1">
              <thead>
                <tr>
                  <th date-field= "Thread ID">Thread ID</th>
                  <th data-field="Thread Name">Thread Name</th>
                  <th data-field="Thread Color">Thread Color</th>
                  <th data-field="ThreadImage">Image</th>
                  <th>
                    <div align="right" style="margin-right:70px;"><a href="#addThread" class="btn-floating btn-medium waves-effect waves-light red"><i class="centered tiny material-icons">add</i></a></div>
                  </th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>001</td>
                  <td>Thread Name</td>
                  <td>Thread Color</td>
                  <td>Image</td>
                  <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#editThread">EDIT</button>
                      
                    <div id="editThread" class="modal modal-fixed-footer">
                      <font color = "teal" ><center><h5>Edit Thread</h5></center></font> 

                      <div class="modal-content">

                        <div class="input-field">
                          <input id="editThreadID" name = "editThreadID" value = "editThreadID" readonly = "readonly" type="text" class="validate">
                          <label for="Thread_ID"> Thread ID: </label>
                        </div>
                  
                        <div class="input-field">
                          <input id="editThreadName" name = "editThreadName" value = "editThreadName" type="text" class="validate">
                          <label for="Thread_Name"> Thread Name </label>
                        </div>

                        <!-- <div class="input-field">
                          <input id="editThreadSize" name = "editThreadSize" value = "editThreadSize" type="text" class="validate">
                          <label for="Thread_Size"> Thread Size </label>
                        </div>
 -->
                        <div class="input-field">
                          <input id="editThreadColor" name = "editThreadColor" value = "editThreadColor" type="text" class="validate">
                          <label for="Thread_Color"> Thread Color </label>
                        </div>

                        <div class="file-field input-field">
                          <div class="btn">
                            <span>Upload Image</span>
                            <input type="file">
                        </div>

                          <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                          </div>
                          <br><br> 
                        </div>
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
          </div>
      </div>
    </li>

    <!--NEEDLES-->
    <li>
      <div class="collapsible-header"><i class="material-icons">filter_drama</i><h5>NEEDLES</h5></div>
      <div class="collapsible-body">
        <table class = "centered" align = "center" border = "1">
              <thead>
                <tr>
                  <th date-field= "Needle ID">Needle ID</th>
                  <th data-field="Needle Name">Needle Name</th>
                  <th data-field="Needle Size">Needle Size</th>
                  <th data-field="Needle Image">Image</th>
                  <th>
                    <div align="right" style="margin-right:70px;"><a href="#addNeedle" class="btn-floating btn-medium waves-effect waves-light red"><i class="centered tiny material-icons">add</i></a></div>
                  </th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>001</td>
                  <td>Needle Name</td>
                  <td>Needle Size</td>
                  <td>image link</td>
                  <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#editNeedle">EDIT</button>
                      
                    <div id="editNeedle" class="modal modal-fixed-footer">
                      <font color = "teal" ><center><h5>Edit Needle</h5></center></font> 

                      <div class="modal-content">

                        <div class="input-field">
                          <input id="editNeedleID" name = "editNeedleID" value = "editNeedleID" readonly = "readonly" type="text" class="validate">
                          <label for="Needle_ID"> Needle ID: </label>
                        </div>
                  
                        <div class="input-field">
                          <input id="editNeedleName" name = "editNeedleName" value = "editNeedleName" type="text" class="validate">
                          <label for="Needle_Name"> Needle Name </label>
                        </div>

                        <div class="input-field">
                          <input id="editNeedleSize" name = "editNeedleSize" value = "editNeedleSize" type="text" class="validate">
                          <label for="Needle_Size"> Needle Size </label>
                        </div>

                                   
                        <div class="file-field input-field">
                          <div class="btn">
                            <span>Upload Image</span>
                            <input type="file">
                          </div>

                          <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                          </div>
                          <br><br> 
                        </div>
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
      </div>
    </li>

    <!--BUTTONS-->
    <li>
      <div class="collapsible-header"><i class="material-icons">filter_drama</i><h5>BUTTONS</h5></div>
      <div class="collapsible-body">
        <table class = "centered" align = "center" border = "1">
              <thead>
                <tr>
                  <th date-field= "Button ID">Button ID</th>
                  <th data-field="Button Name">Button Name</th>
                  <th data-field="Button Size">Button Size</th>
                  <th data-field="Button Color">Button Color</th>
                  <th data-field="ButtonImage">Button Image Link</th>
                  <th>
                    <div align="right" style="margin-right:40px;"><a href="#addButton" class="btn-floating btn-medium waves-effect waves-light red"><i class="centered tiny material-icons">add</i></a></div>
                  </th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>001</td>
                  <td>Button Name</td>
                  <td>Button Size</td>
                  <td>Button Color</td>
                  <td>image</td>
                  <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#editButton">EDIT</button>
                      
                    <div id="editButton" class="modal modal-fixed-footer">
                      <font color = "teal" ><center><h5>Edit Button</h5></center></font> 

                      <div class="modal-content">

                        <div class="input-field">
                          <input id="editButtonID" name = "editButtonID" value = "editButtonID" readonly = "readonly" type="text" class="validate">
                          <label for="Button_ID"> Button ID: </label>
                        </div>
                  
                        <div class="input-field">
                          <input id="editButtonName" name = "editButtonName" value = "editButtonName" type="text" class="validate">
                          <label for="Button_Name"> Button Name </label>
                        </div>

                        <div class="input-field">
                          <input id="editButtonSize" name = "editButtonSize" value = "editButtonSize" type="text" class="validate">
                          <label for="Button_Size"> Button Size </label>
                        </div>

                        <div class="input-field">
                          <input id="editButtonColor" name = "editButtonColor" value = "editButtonColor" type="text" class="validate">
                          <label for="Button_Color"> Button Color </label>
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
      </div>
    </li>

    <!--ZIPPERS-->
    <li>
      <div class="collapsible-header"><i class="material-icons">filter_drama</i><h5>ZIPPERS</h5></div>
      <div class="collapsible-body">
        <table class = "centered" align = "center" border = "1">
              <thead>
                <tr>
                  <th date-field= "Zipper ID">Zipper ID</th>
                  <th data-field="Zipper Name">Zipper Name</th>
                  <th data-field="Zipper Size">Zipper Size</th>
                  <th data-field="Zipper Color">Zipper Color</th>
                  <th data-field="ZipperImage">Zipper Image</th>
                  <th>
                    <div align="right" style="margin-right:45px;"><a href="#addZipper" class="btn-floating btn-medium waves-effect waves-light red"><i class="centered tiny material-icons">add</i></a></div>
                  </th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>001</td>
                  <td>Zipper Name</td>
                  <td>Zipper Size</td>
                  <td>Zipper Color</td>
                  <td>image link</td>
                  <td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#editZipper">EDIT</button>
                      
                    <div id="editZipper" class="modal modal-fixed-footer">
                      <font color = "teal" ><center><h5>Edit Zipper</h5></center></font> 

                      <div class="modal-content">

                        <div class="input-field">
                          <input id="editZipperID" name = "editZipperID" value = "editZipperID" readonly = "readonly" type="text" class="validate">
                          <label for="Zipper_ID"> Zipper ID: </label>
                        </div>
                  
                        <div class="input-field">
                          <input id="editZipperName" name = "editZipperName" value = "editZipperName" type="text" class="validate">
                          <label for="Zipper_Name"> Zipper Name </label>
                        </div>

                        <div class="input-field">
                          <input id="editZipperSize" name = "editZipperSize" value = "editZipperSize" type="text" class="validate">
                          <label for="Zipper_Size"> Zipper Size </label>
                        </div>

                        <div class="input-field">
                          <input id="editZipperColor" name = "editZipperColor" value = "editZipperColor" type="text" class="validate">
                          <label for="Zipper_Color"> Zipper Color </label>
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
      </div>
    </li>

    <!--HOOK&EYE-->
    <li>
      <div class="collapsible-header">
        <i class="material-icons">filter_drama</i><h5>HOOK & EYE</h5>
      </div>
      <div class="collapsible-body">
          <table class = "centered" align = "center" border = "1">
              <thead>
                <tr>
                  <th date-field="Hook and Eye ID">Hook and Eye ID</th>
                  <th data-field="Hook and Eye Name">Hook and Eye Name</th>
                  <th data-field="Hook and Eye Size">Hook and Eye Size</th>
                  <th data-field="Hook and Eye Color">Hook and Eye Color</th>
                  <th data-field="Hook and Eye">Hook and Eye</th>
                  <th data-field="Image">Image</th>
                  <th>
                    <div align="right" style="margin-right:30px;"><a href="#addHookEye" class="btn-floating btn-medium waves-effect waves-light red"><i class="centered tiny material-icons">add</i></a></div>
                  </th>
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
      </div>
    </li>
  </ul>
</div>

  <!--MODAL: add Thread-->
  <div id="addThread" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>ADD THREAD</h4>
        
    </div>
  
    <!--MODAL FOOTER-->
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">CLOSE</a>
    </div>
  </div>

  <!--MODAL: add Needle-->
  <div id="addNeedle" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>ADD THREAD</h4>
      
    </div>
  
    <!--MODAL FOOTER-->
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">CLOSE</a>
    </div>
  </div>

  <!--MODAL: add Button-->
  <div id="addButton" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>ADD THREAD</h4>
      
    </div>
  
    <!--MODAL FOOTER-->
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">CLOSE</a>
    </div>
  </div>

  <!--MODAL: add Zipper-->
  <div id="addZipper" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>ADD THREAD</h4>
      
    </div>
  
    <!--MODAL FOOTER-->
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">CLOSE</a>
    </div>
  </div>

  <!--MODAL: add HookEye-->
  <div id="addHookEye" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>ADD THREAD</h4>
      
    </div>
  
    <!--MODAL FOOTER-->
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">CLOSE</a>
    </div>
  </div>


@stop

@section('scripts')
    <script>
   $(document).ready(function(){
    $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });

      $('.modal-trigger').leanModal();
  });
        
    </script>

@stop

  