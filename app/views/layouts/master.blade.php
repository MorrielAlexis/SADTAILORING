<!DOCTYPE html>
<html>
<head>

	<title>Sidebar</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    {{ HTML::style('css/materialize.min.css') }}
	{{ HTML::style('css/style.css') }}

</head>

<body>

  <header></header>

  <nav id="slide-out" class="side-nav fixed"> 

	<li class="no-padding">
  	<ul class="collapsible collapsible-accordion">
  		
  		<li><a class="bold" href="#!"><b>Logo?</b></a></li>
		<div class="divider"></div>
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
	     $(document).ready(function)({
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
			});
	     	$('ul.tabs').tabs();
  			});
      </script>



      @yield('scripts')
</body>

</html>