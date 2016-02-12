@extends('layouts.master')

@section('content')


  <p><h4 style="lightpink">Materials</h4></p>
  <div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"><a style="color:teal" href="#tabThread"><b>Threads</b></a></li>
        <li class="tab col s3"><a style="color:teal" href="#tabNeedle"><b>Needles</b></a></li>
        <li class="tab col s3"><a style="color:teal" href="#tabButton"><b>Buttons</b></a></li>
        <li class="tab col s3"><a style="color:teal" href="#tabZipper"><b>Zippers</b></a></li>
        <li class="tab col s3"><a style="color:teal" href="#tabHook"><b>Hook & Eye</b></a></li>
      </ul>
    </div>

  <div id="tabThread" class="hue col s12">

    <div class="main-wrapper">
      <div class="row">
        <div class="col s12 m12 l12">
          <span class="page-title"><h4>Thread</h4></span>
        </div>
      </div>

      <div class="row">
        <div class="col s12 m12 l6">
          <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#addThread">ADD Thread</button>
        </div>      
      </div>
    </div>

    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
         <span class="card-title"><h5><center>Thread</center></h5></span>
          <div class="divider"></div>
          <div class="card-content">
    
            <table class = "centered" align = "center" border = "1">
              <thead>
                <tr>
                  <th date-field= "Thread ID">Thread ID</th>
                  <th data-field="Thread Name">Thread Name</th>
                  <th data-field="Thread Size">Thread Size</th>
                  <th data-field="Thread Color">Thread Color</th>
                  <th data-field="Thread">Thread</th>
                  <th data-field="Image">Image</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>001</td>
                  <td>Thread Name</td>
                  <td>Thread Size</td>
                  <td>Thread Color</td>
                  <td>Thread</td>
                  <td>image</td>
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

                        <div class="input-field">
                          <input id="editThreadSize" name = "editThreadSize" value = "editThreadSize" type="text" class="validate">
                          <label for="Thread_Size"> Thread Size </label>
                        </div>

                        <div class="input-field">
                          <input id="editThreadColor" name = "editThreadColor" value = "editThreadColor" type="text" class="validate">
                          <label for="Thread_Color"> Thread Color </label>
                        </div>

                        <div class="input-field">
                          <input id="Thread" type="text" class="validate">
                          <label for="Thread"> Thread </label>
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

            <div id="addThread" class="modal modal-fixed-footer">
              <font color = "teal"><h5><center>Add Thread </center></h5></font> 
              <div class="modal-content">

                <div class="input-field">
                  <input id="addThreadID" name = "addThreadID" value = "addThreadID" readonly = "readonly" type="text" class="validate">
                  <label for="Thread_ID"> Thread ID: </label>
                </div>
                  
                <div class="input-field">
                  <input id="addThreadName" name = "addThreadName" type="text" class="validate">
                  <label for="Thread_Name"> Thread Name </label>
                </div>

                <div class="input-field">
                  <input id="addThreadSize" name = "addThreadSize" type="text" class="validate">
                  <label for="Thread_Size"> Thread Size </label>
                </div>

                <div class="input-field">
                  <input id="addThreadColor" name = "addThreadColor" type="text" class="validate">
                  <label for="Thread_Color"> Thread Color </label>
                </div>


                <div class="input-field">
                  <input id="addThread" name = "addThread" type="text" class="validate">
                  <label for="Thread"> Thread </label>
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
          </div>
        </div>
      </div>
    </div>
  </div>
       <!--  <Tab for Needles> -->
  <div id="tabNeedle" class="hue col s12">
    <div class="main-wrapper">
      <div class="row">
        <div class="col s12 m12 l12">
        <span class="page-title"><h4>Needle</h4></span>
        </div>
      </div>

      <div class="row">
        <div class="col s12 m12 l6">
          <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#addNeedle">ADD Needle</button>
        </div>      
      </div>
    </div>



    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
          <span class="card-title"><h5><center>Needle</center></h5></span>
          <div class="divider"></div>
          <div class="card-content">
    
            <table class = "centered" align = "center" border = "1">
              <thead>
                <tr>
                  <th date-field= "Needle ID">Needle ID</th>
                  <th data-field="Needle Name">Needle Name</th>
                  <th data-field="Needle Size">Needle Size</th>
                  <th data-field="Needle Color">Needle Color</th>
                  <th data-field="Needle">Needle</th>
                  <th data-field="Image">Image</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>001</td>
                  <td>Needle Name</td>
                  <td>Needle Size</td>
                  <td>Needle Color</td>
                  <td>Needle</td>
                  <td>image</td>
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

                        <div class="input-field">
                          <input id="editNeedleColor" name = "editNeedleColor" value = "editNeedleColor" type="text" class="validate">
                          <label for="Needle_Color"> Needle Color </label>
                        </div>

                        <div class="input-field">
                          <input id="Needle" type="text" class="validate">
                          <label for="Needle"> Needle </label>
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

            <div id="addNeedle" class="modal modal-fixed-footer">
              <font color = "teal"><h5><center>Add Needle </center></h5></font> 
              <div class="modal-content">

                <div class="input-field">
                  <input id="addNeedleID" name = "addNeedleID" value = "addNeedleID" readonly = "readonly" type="text" class="validate">
                  <label for="Needle_ID"> Needle ID: </label>
                </div>
                  
                <div class="input-field">
                  <input id="addNeedleName" name = "addNeedleName" type="text" class="validate">
                  <label for="Needle_Name"> Needle Name </label>
                </div>

                <div class="input-field">
                  <input id="addNeedleSize" name = "addNeedleSize" type="text" class="validate">
                  <label for="Needle_Size"> Needle Size </label>
                </div>

                <div class="input-field">
                  <input id="addNeedleColor" name = "addNeedleColor" type="text" class="validate">
                  <label for="Needle_Color"> Needle Color </label>
                </div>


                <div class="input-field">
                  <input id="addNeedle" name = "addNeedle" type="text" class="validate">
                  <label for="Needle"> Needle </label>
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
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="tabButton" class="hue col s12">
    <div class="main-wrapper">
      <div class="row">
        <div class="col s12 m12 l12">
        <span class="page-title"><h4>Button</h4></span>
        </div>
      </div>

      <div class="row">
        <div class="col s12 m12 l6">
          <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#addButton">ADD Button</button>
        </div>      
      </div>
    </div>

    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
          <span class="card-title"><h5><center>Button</center></h5></span>
          <div class="divider"></div>
            <div class="card-content">
    
              <table class = "centered" align = "center" border = "1">
              <thead>
                <tr>
                  <th date-field= "Button ID">Button ID</th>
                  <th data-field="Button Name">Button Name</th>
                  <th data-field="Button Size">Button Size</th>
                  <th data-field="Button Color">Button Color</th>
                  <th data-field="Button">Button</th>
                  <th data-field="Image">Image</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>001</td>
                  <td>Button Name</td>
                  <td>Button Size</td>
                  <td>Button Color</td>
                  <td>Button</td>
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

                        <div class="input-field">
                          <input id="Button" type="text" class="validate">
                          <label for="Button"> Button </label>
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

            <div id="addButton" class="modal modal-fixed-footer">
              <font color = "teal"><h5><center>Add Button </center></h5></font> 
              <div class="modal-content">

                <div class="input-field">
                  <input id="addButtonID" name = "addButtonID" value = "addButtonID" readonly = "readonly" type="text" class="validate">
                  <label for="Button_ID"> Button ID: </label>
                </div>
                  
                <div class="input-field">
                  <input id="addButtonName" name = "addButtonName" type="text" class="validate">
                  <label for="Button_Name"> Button Name </label>
                </div>

                <div class="input-field">
                  <input id="addButtonSize" name = "addButtonSize" type="text" class="validate">
                  <label for="Button_Size"> Button Size </label>
                </div>

                <div class="input-field">
                  <input id="addButtonColor" name = "addButtonColor" type="text" class="validate">
                  <label for="Button_Color"> Button Color </label>
                </div>


                <div class="input-field">
                  <input id="addButton" name = "addButton" type="text" class="validate">
                  <label for="Button"> Button </label>
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
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="tabZipper" class="hue col s12">
    <div class="main-wrapper">
      <div class="row">
        <div class="col s12 m12 l12">
        <span class="page-title"><h4>Zipper</h4></span>
        </div>
      </div>

      <div class="row">
        <div class="col s12 m12 l6">
          <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#addZipper">ADD Zipper</button>
        </div>      
      </div>
    </div>

    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card-panel">
        <span class="card-title"><h5><center>Zipper</center></h5></span>
          <div class="divider"></div>
          <div class="card-content">
    
            <table class = "centered" align = "center" border = "1">
              <thead>
                <tr>
                  <th date-field= "Zipper ID">Zipper ID</th>
                  <th data-field="Zipper Name">Zipper Name</th>
                  <th data-field="Zipper Size">Zipper Size</th>
                  <th data-field="Zipper Color">Zipper Color</th>
                  <th data-field="Zipper">Zipper</th>
                  <th data-field="Image">Image</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>001</td>
                  <td>Zipper Name</td>
                  <td>Zipper Size</td>
                  <td>Zipper Color</td>
                  <td>Zipper</td>
                  <td>image</td>
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

                        <div class="input-field">
                          <input id="Zipper" type="text" class="validate">
                          <label for="Zipper"> Zipper </label>
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

            <div id="addZipper" class="modal modal-fixed-footer">
              <font color = "teal"><h5><center>Add Zipper </center></h5></font> 
              <div class="modal-content">

                <div class="input-field">
                  <input id="addZipperID" name = "addZipperID" value = "addZipperID" readonly = "readonly" type="text" class="validate">
                  <label for="Zipper_ID"> Zipper ID: </label>
                </div>
                  
                <div class="input-field">
                  <input id="addZipperName" name = "addZipperName" type="text" class="validate">
                  <label for="Zipper_Name"> Zipper Name </label>
                </div>

                <div class="input-field">
                  <input id="addZipperSize" name = "addZipperSize" type="text" class="validate">
                  <label for="Zipper_Size"> Zipper Size </label>
                </div>

                <div class="input-field">
                  <input id="addZipperColor" name = "addZipperColor" type="text" class="validate">
                  <label for="Zipper_Color"> Zipper Color </label>
                </div>


                <div class="input-field">
                  <input id="addZipper" name = "addZipper" type="text" class="validate">
                  <label for="Zipper"> Zipper </label>
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
          </div>
        </div>
      </div>
    </div>
   </div>

  <div id="tabHook" class="hue col s12"> 
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

  </div>
  </div>

@stop

@section('scripts')
    <script>
     $(document).ready(function)({
	     	$('ul.tabs').tabs();
  			});
    </script>

    <script>
      $(document).ready(function(){
      // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
      $('.modal-trigger').leanModal();
      });
    </script>

@stop

	