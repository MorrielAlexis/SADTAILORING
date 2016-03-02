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
                <img src="../img/admin-icon.png" alt="" class="circle responsive-img valign profile-image center" style="height:100px; width:100px; background: #00695C;">
              </div>
          </li>

              <div class="col s12 center">
                <ul id="profile-dropdown" class="dropdown-content">
                  <li><a href="#"><i class="mdi-action-face-unlock" style="font-size:15px; margin-top:20px;margin-left:0px;"> Profile</i></a></li>
                  <li><a href="#"><i class="mdi-action-settings" style="font-size:15px; margin-top:20px;margin-left:0px;"> Utils</i></a></li>
                  <li><a href="#"><i class="mdi-communication-live-help"style="font-size:15px; margin-top:20px;margin-left:0px;"> Help</i></a></li>
                  <li class="divider"></li>
                  <li><a href="#"><i class="mdi-action-lock-outline"style="font-size:15px;margin-top:20px;margin-left:0px;"> Lock</i></a></li>
                  <li><a href="#"><i class="mdi-hardware-keyboard-tab"style="font-size:15px;margin-top:20px;margin-left:0px;"> Logout</i></a></li>
                </ul>
                <a class="btn-flat dropdown-button waves-effect waves-light profile-btn" href="#" data-activates="profile-dropdown"><span class="user" style="color:white; padding-bottom:5px"><b>Honey Buenavides<b></span></a>
              </div>
            </div>

          <!--<div class="divider" style="background-color:black"></div>-->

          <div style="padding-top:10px"></div>
          <li class="no-padding">
            <ul class="collapsible collapsible-accordion">

      
             <!-- <div class="divider"></div> -->
              <li class="bold"><a class="collapsible-header waves-effect waves-white" style="color:#212121"><i class="small material-icons" style="color:#ccff90">dashboard</i><b>Dashboard</b></a></li>
              <!--<div class="divider"></div>-->
              <li class="bold"><a class="collapsible-header waves-effect waves-white {{ Request::is('maintenance/*') ? 'active' : '' }}" style="color:#212121"><i class="small material-icons" style="color:#ccff90">settings</i><b>Maintenance</b></a> 

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

                        <li class="bold"><a style="color:#212121; opacity:0.90" class="collapsible-header waves-effect waves-white {{ Request::is('maintenance/customerIndividual') || Request::is('maintenance/customerCompany') ? 'active' : '' }}"><b>Employee</b></a>
                          <div class="collapsible-body">
                            <ul>  
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('employeeRole')}}">Position Roles</a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('employee')}}">Employee Profile</a></li>
                              <div class="divider"></div>
                            </ul>
                           </div>
                        </li>

                        <li class="bold"><a style="color:#212121; opacity:0.90" class="collapsible-header waves-effect waves-white"><b>Garments</b></a>
                          <div class="collapsible-body">
                            <ul>  
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('garments')}}">Category</a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('garmentsDetails')}}">Segment</a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('designPattern')}}">Segment Pattern</a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('measurements')}}">Measurements</a></li> 
                              <div class="divider"></div>
                            </ul>
                          </div>
                        </li>

                        <li class="bold"><a style="color:#212121; opacity:0.90" class="collapsible-header waves-effect waves-white"><b>Fabrics & Materials</b></a>
                          <div class="collapsible-body">
                            <ul>  
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('fabricAndMaterialsFabricType')}}">Fabric Types</a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('fabricAndMaterialsSwatches')}}">Swatches</a></li>
                              <li><a style="color:black; font-weight:normal" class="waves-effect waves-white" href="{{URL::to('fabricAndMaterialsMaterials')}}">Materials</a></li>
                              <div class="divider"></div>
                            </ul>
                          </div>
                        </li>

                        <li class="bold"><a style="color:#212121; opacity:0.90" class="collapsible-header waves-effect waves-white" href="{{URL::to('catalogue')}}"><b>Catalogue</b></a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </li>
    
              <!--<div class="divider"></div>-->
              <li class="bold"><a class="collapsible-header waves-effect waves-white" style="color:#212121"><i class="small material-icons" style="color:#ccff90">monetization_on</i><b>Transaction</b></a></li>
              <!--<div class="divider"></div>-->
              <li class="bold"><a class="collapsible-header waves-effect waves-white" style="color:#212121"><i class="small material-icons" style="color:#ccff90">assessment</i><b>Queries</b></a></li>
              <!--<div class="divider"></div>-->
              <li class="bold"><a class="collapsible-header waves-effect waves-white" style="color:#212121"><i class="small material-icons" style="color:#ccff90">multiline_chart</i><b>Reports</b></a></li>
              <!--<div class="divider"></div>-->
              <li class="bold"><a class="collapsible-header waves-effect waves-white" style="color:#212121"><i class="small material-icons" style="color:#ccff90">loyalty</i><b>Utilities</b></a>
                <div class="collapsible-body" position = "fixed" style = "display: block;">
                  <ul>
                    <li class="no-padding">
                      <ul class="collapsible collapsible-accordion">

                        <li class="bold"><a style="color:#212121; opacity:0.90" class="collapsible-header waves-effect waves-white" href="{{URL::to('inactiveData')}}"><b>Inactive Data</b></a></li>

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