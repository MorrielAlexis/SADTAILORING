<!DOCTYPE html>
<html>
    <head>

      <title>Fashion Collection</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      {{ HTML::style('css/materialize.min.css') }}
      {{ HTML::style('css/style.css') }}
      {{ HTML::style('css/jquery.dataTables.min.css') }}

    </head>

    <body>

    <header>
        <div class="col s9 right" style="padding-top:7px">
          <font size = "+2" color = "black" style="margin-right:20px; margin-top:5px" >Tailoring Management System</font>
        </div>
    </header>

      <nav id="slide-out" class="side-nav fixed" style="position fixed; top: 0; padding-top:0px; margin-top:0px; background: #26A69A"> 
        <ul id="ul">
          <li id="admin" class="admin-background" align="center" style="background: #00695C;">
            <div class="row">
              <div style="height:20px"></div>
              <div class="col s12 center">
                <img src="../img/honeybabe.jpg" alt="" class="circle responsive-img valign profile-image center" style="height:130px; width:130px; background: #00695C;">
              </div>
            </div>
          </li>

          <div class="col s12 center">
            <ul id="profile-dropdown" class="dropdown-content">
              <li><a href="#"><i class="small mdi-action-face-unlock" style="font-size:15px; margin-top:20px;margin-left:0px;"> Profile</i></a></li>
              <li><a href="#"><i class="small mdi-action-settings" style="font-size:15px; margin-top:20px;margin-left:0px;"> Utils</i></a></li>
              <li><a href="#"><i class="small mdi-communication-live-help"style="font-size:15px; margin-top:20px;margin-left:0px;"> Help</i></a></li>
              <li class="divider"></li>
              <li><a href="#"><i class="small mdi-action-lock-outline"style="font-size:15px;margin-top:20px;margin-left:0px;"> Lock</i></a></li>
              <li><a href="#"><i class="small mdi-hardware-keyboard-tab"style="font-size:15px;margin-top:20px;margin-left:0px;"> Logout</i></a></li>
            </ul>
            <a class="btn-flat dropdown-button waves-effect waves-light profile-btn" href="#" data-activates="profile-dropdown"><span class="user" style="color:white; padding-bottom:5px"><b>{{Session::get('userID')}}<b></span></a>
          </div>
            

          <!--<div class="divider" style="background-color:black"></div>-->

          <div style="padding-top:10px"></div>
          <li class="no-padding">
            <ul class="collapsible collapsible-accordion">

      
             <!-- <div class="divider"></div> -->
              <li class="bold"><a class="collapsible-header waves-effect waves-white" style="color:#212121"><i style="font-size:30px" class="small mdi-action-dashboard" style="color:#ccff90;"></i> Dashboard</a></li>
              <!--<div class="divider"></div>-->
              <li class="bold"><a class="collapsible-header waves-effect waves-white {{ Request::is('maintenance/*') ? 'active' : '' }}" style="color:#212121"><i style="font-size:30px" class="small mdi-action-settings" style="color:#ccff90"></i><b>Maintenance</b></a> 

                <div class="collapsible-body" position = "fixed" style = "display: block;">
                  <ul>
                    <li class="no-padding">
                      <ul class="collapsible collapsible-accordion">

                        <li class="bold"><a style="color:#212121; opacity:0.90" class="collapsible-header waves-effect waves-white {{ Request::is('maintenance/customerIndividual') || Request::is('maintenance/customerCompany') ? 'active' : '' }}"><b>Customer Profile</b></a>
                          <div class="collapsible-body">
                            <ul>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white " href="{{URL::to('maintenance/customerIndividual')}}">Individual</a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('maintenance/customerCompany')}}">Company</a></li>

                             <div class="divider"></div>
                            </ul>
                          </div>
                        </li>

                        <li class="bold"><a style="color:#212121; opacity:0.90" class="collapsible-header waves-effect waves-white {{ Request::is('maintenance/employeeRole') || Request::is('maintenance/employee') ? 'active' : '' }}"><b>Employee</b></a>
                          <div class="collapsible-body">
                            <ul>  
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('maintenance/employeeRole')}}">Employee Roles</a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('maintenance/employee')}}">Employee Profile</a></li>
                              <div class="divider"></div>
                            </ul>
                           </div>
                        </li>

                        <li class="bold"><a style="color:#212121; opacity:0.90" class="collapsible-header waves-effect waves-white {{ Request::is('maintenance/garments') || Request::is('maintenance/garmentsDetails') || Request::is('maintenance/designPattern') || Request::is('maintenance/measurements') ? 'active' : '' }}"><b>Garments</b></a>
                          <div class="collapsible-body">
                            <ul>  
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('maintenance/garments')}}">Category</a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('maintenance/garmentsDetails')}}">Segment</a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('maintenance/designPattern')}}">Segment Pattern</a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('maintenance/measurements')}}">Measurements</a></li> 
                              <div class="divider"></div>
                            </ul>
                          </div>
                        </li>

                        <li class="bold"><a style="color:#212121; opacity:0.90" class="collapsible-header waves-effect waves-white {{ Request::is('maintenance/fabricAndMaterialsFabricType') || Request::is('maintenance/fabricAndMaterialsSwatches') || Request::is('maintenance/fabricAndMaterialsMaterials') ? 'active' : '' }}"><b>Fabrics & Materials</b></a>
                          <div class="collapsible-body">
                            <ul>  
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('maintenance/fabricAndMaterialsFabricType')}}">Fabric Types</a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('maintenance/fabricAndMaterialsSwatches')}}">Swatches</a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('maintenance/fabricAndMaterialsMaterials')}}">Materials</a></li>
                              <div class="divider"></div>
                            </ul>
                          </div>
                        </li>

                        <li class="bold"><a style="color:#212121; opacity:0.90" class="collapsible-header waves-effect waves-white {{ Request::is('maintenance/catalogue') ? 'active' : '' }}" href="{{URL::to('maintenance/catalogue')}}"><b>Catalogue</b></a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </li>
    
              <!--<div class="divider"></div>-->
              <li class="bold"><a class="collapsible-header waves-effect waves-white {{ Request::is('transaction/*') ? 'active' : '' }}" style="color:#212121"><i style="font-size:30px" class="small mdi-editor-attach-money" style="color:#ccff90"></i><b>Transaction</b></a>
                <div class = "collapsible-body" position = "fixed" style = "display:block;">
                  <ul>
                    <li class = "no padding">
                       <ul class = "collapsible collapsible-accordion">
                        <li class="bold"><a style="color:#212121; opacity:0.90" class="collapsible-header waves-effect waves-white {{ Request::is('transaction/walk') || Request::is('transaction/online') ? 'active' : '' }}"><b>Job Order</b></a>
                          <div class="collapsible-body">
                            <ul>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white " href="{{URL::to('transaction/walk')}}">Walk In Customer</a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('transaction/online')}}">Online Customer</a></li>

                             <div class="divider"></div>
                            </ul>
                          </div>
                        </li>
                      </ul>
                      <ul class = "collapsible collapsible-accordion">
                        <li class="bold"><a style="color:#212121; opacity:0.90" class="collapsible-header waves-effect waves-white" href= "{{URL::to('transaction/orderProgress')}}"><font size = "-1"><b>Job Order Progress</font></b></a><li>
                      </ul>
                      <ul class = "collapsible collapsible-accordion">
                        <li class="bold"><a style="color:#212121; opacity:0.90" class="collapsible-header waves-effect waves-white" href= "{{URL::to('transaction/materials')}}"><font size = "-1"><b>Materials Purchasing</font></b></a><li>
                      </ul>
                      <ul class = "collapsible collapsible-accordion">
                        <li class="bold"><a style="color:#212121; opacity:0.90" class="collapsible-header waves-effect waves-white {{ Request::is('transaction/adminBillingPayment') || Request::is('transaction/adminBillingCollection') ? 'active' : '' }}"><b>Billing & Collection</b></a>
                            <div class="collapsible-body">
                                <ul>  
                                  <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('transaction/adminBillingPayment')}}">Billing</a></li>
                                  <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('transaction/adminBillingCollection')}}">Collection</a></li>
                                  <div class="divider"></div>
                                </ul>
                          </div>
                      </ul>
                    </li>
                  </ul>
                </div>

              </li>
              <!--<div class="divider"></div>-->
              <li class="bold"><a class="collapsible-header waves-effect waves-white" style="color:#212121"><i style="font-size:30px" class="small mdi-action-assessment" style="color:#ccff90"></i><b>Queries</b></a></li>
              <!--<div class="divider"></div>-->
              <li class="bold"><a class="collapsible-header waves-effect waves-white" style="color:#212121"><i style="font-size:30px" class="small mdi-action-trending-up" style="color:#ccff90"></i><b>Reports</b></a></li>
              <!--<div class="divider"></div>-->
              
              <li class="bold"><a class="collapsible-header waves-effect waves-white {{ Request::is('utilities/*') ? 'active' : '' }}" style="color:#212121"><i style="font-size:30px" class="small mdi-action-perm-contact-cal" style="color:#ccff90"></i><b>Utilities</b></a>
                <div class="collapsible-body" position = "fixed" style = "display: block;">
                  <ul>
                    <li class="no-padding">
                      <ul class="collapsible collapsible-accordion">

                        <li class="bold"><a style="color:#212121; opacity:0.90" class="collapsible-header waves-effect waves-white {{ Request::is('utilities/inactiveData') ? 'active' : '' }}" href="{{URL::to('utilities/inactiveData')}}"><b>Inactive Data</b></a></li>

                      </ul>
                    </li>
                  </ul>
                </div>
              </li>
            
            </ul>
          </li>
        </ul>
      </nav>


      <main>
        @yield('content')
      </main>

      {{ HTML::script('js/jquery-2.1.4.min.js') }}
      {{ HTML::script('js/materialize.min.js') }}
      {{ HTML::script('js/jquery.dataTables.min.js')}}
      
      <script>
        $(document).ready(function(){
        $('.button-collapse').sideNav({
          menuWidth: 240, // Default is 240
          edge: 'right', // Choose the horizontal origin
          closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
        });
        $('.collapsible').collapsible();
            // Show sideNav
        $('.button-collapse').sideNav('show');
            // Hide sideNav
        $('.button-collapse').sideNav('hide');     

        $('ul.tabs').tabs();

        });

      $(document).ready(function(){
      // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
      $('.modal-trigger').leanModal({
          dismissible: false
        });
      });


      $(document).ready(function(){
        $('.collapsible').collapsible({
          accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
        });
      });
          
      </script>

        @yield('scripts')
    </body>

</html>