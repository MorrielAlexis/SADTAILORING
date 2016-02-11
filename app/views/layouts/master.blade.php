<!DOCTYPE html>
<html>
<head>

	<title>Fashion Collection</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  {{ HTML::style('css/materialize.min.css') }}
	{{ HTML::style('css/style.css') }}

</head>

<body>

  <header></header>

  <nav id="slide-out" class="side-nav fixed"> 

  <li id="admin" class="admin-background">
    <div class="row">
      <div style="height:20px"></div>
      <div class="col col s4 m4 l4">
        <img src="img/admin-icon.png" alt="" class="circle responsive-img valign profile-image">
      </div>
      <div>
         <ul id="profile-dropdown" class="dropdown-content">
          <li><a href="#"><i class="mdi-action-face-unlock"> Profile</i></a></li>
          <li><a href="#"><i class="mdi-action-settings"> Settings</i></a></li>
          <li><a href="#"><i class="mdi-communication-live-help"> Help</i></a></li>
          <li class="divider"></li>
          <li><a href="#"><i class="mdi-action-lock-outline"> Lock</i></a></li>
          <li><a href="#"><i class="mdi-hardware-keyboard-tab"> Logout</i></a></li>
        </ul>
      <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><span class="user">User Admin</span><i class="mdi-navigation-arrow-drop-down right"></i></a>
      </div>
    </div>
  </li>

	<li class="no-padding">
  	<ul class="collapsible collapsible-accordion">
      <li class="divider"></li>
  		<li class="bold"><a class="collapsible-header waves-effect waves-teal"><b>Job Order</b></a>
  			<div class="collapsible-body">
  				<ul>
  					<li><a style="color:black" class="waves-effect waves-teal" href="#!">Huehue</a></li>
  					<li><a style="color:black" class="waves-effect waves-teal" href="#!">Ajuju</a></li>
  				</ul>
  			</div>
  		</li>
 	<div class="divider"></div>
  	<li class="bold"><a class="collapsible-header waves-effect waves-teal"><b>Maintenance</b></a>
  	<div class="collapsible-body">
  		<ul>
  	<li class="no-padding">
  	<ul class="collapsible collapsible-accordion">
  		<li class="bold"><a style="color:black" class="collapsible-header waves-effect waves-teal">Customer Profile</a>
  			<div class="collapsible-body">
  				<ul>
  					<li><a style="color:black" class="waves-effect waves-teal" href="/customerIndividual">Individual</a></li>
  					<li><a style="color:black" class="waves-effect waves-teal" href="/customerCompany">Company</a></li>
  					<div class="divider"></div>
  				</ul>
  			</div>
  		</li>
  		<li class="bold"><a style="color:black" class="collapsible-header waves-effect waves-teal">Employee</a>
  			<div class="collapsible-body">
  				<ul> 	
  					<li><a style="color:black" class="waves-effect waves-teal" href="/employee">Employee Profile</a></li>
  					<li><a style="color:black" class="waves-effect waves-teal" href="/employeeRole">Position Roles</a></li>
  					<div class="divider"></div>
  				</ul>
  			</div>
  		</li>
  		<li class="bold"><a style="color:black" class="collapsible-header waves-effect waves-teal">Garments</a>
  			<div class="collapsible-body">
  				<ul> 	
  					<li><a style="color:black" class="waves-effect waves-teal" href="/garments">Category</a></li>
  					<li><a style="color:black" class="waves-effect waves-teal" href="/garmentsDetails">Segment</a></li>
  					<li><a style="color:black" class="waves-effect waves-teal" href="/designPattern">Design Pattern</a></li>
  					<li><a style="color:black" class="waves-effect waves-teal" href="/measurements">Measurements</a></li>
  					<div class="divider"></div>
  				</ul>
  			</div>
  		</li>
  		<li class="bold"><a style="color:black" class="collapsible-header waves-effect waves-teal">Materials & Fabrics</a>
  			<div class="collapsible-body">
  				<ul> 	
  					<li><a style="color:black" class="waves-effect waves-teal" href="/fabricAndMaterialsFabricType">Fabric Types</a></li>
  					<li><a style="color:black" class="waves-effect waves-teal" href="/fabricAndMaterialsSwatches">Swatches</a></li>
  					<li><a style="color:black" class="waves-effect waves-teal" href="/fabricAndMaterialsMaterials">Materials</a></li>
  					<div class="divider"></div>
  				</ul>
  			</div>
  		</li>
  		<li class="bold"><a style="color:black" class="collapsible-header waves-effect waves-teal" href="/catalogue">Catalogue</a></li>

	</ul>
	</div>
  	</li>
	</ul>
	</li>
</ul>
</li>
  </nav>


	<main>
		@yield('content')
	</main>

      {{ HTML::script('js/jquery-2.1.4.min.js') }}
      {{ HTML::script('js/materialize.min.js') }}
      
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
      </script>



      @yield('scripts')
</body>

</html>