<!DOCTYPE html>
<html>
<head>

	<title>Sidebar</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    {{ HTML::style('css/materialize.min.css') }}
	{{ HTML::style('css/style.css') }}

</head>

<body>

	<nav>	


		<ul id="slide-out" class="side-nav fixed">
		<li><div id="logo"></div></li>
		<li><b><a class="waves-effect waves-light btn-small" href="#!">Sales</a></b></li>
		<div style="border: 1px solid aquamarine" class="divider"></div>
		<li><b><a class="waves-effect waves-light btn-small" href="#!">Job Order</a></b></li>
		<div style="border: 1px solid aquamarine" class="divider"></div>

		<!--Maintenance Dropdown-->
		<li class="no-padding">
		<ul class="collapsible collapsible-accordion">
			<li><a class="waves-effect waves-light btn-small, collapsible-header"><b>Maintenance</b></a>
				<div class="collapsible-body">
					<ul>
						<div style="border: 1px dashed aquamarine" class="divider"></div>
										
					<!--Customer Profile Dropdown-->
						<li class="no-padding">
						<ul class="collapsible collapsible-accordion">
							<li><a style="color: black" class="waves-effect waves-light btn-small, collapsible-header">Customer Profile</a>
								<div class="collapsible-body">
									<ul>
										<div style="border: 1px dashed aquamarine" class="divider"></div>
										<li><a style="color: black" class="waves-effect waves-light btn-small" href="/customerIndividual">Individual</a></li>
										<li><a style="color: black" class="waves-effect waves-light btn-small" href="/customerCompany">Company</a></li>
									</ul>
								</div>
							</li>
						</ul>
						</li>
						<div style="border: 1px solid aquamarine" class="divider"></div>
					<!--Employee Dropdown-->			
						<li class="no-padding">
						<ul class="collapsible collapsible-accordion">
							<li><a style="color: black" class="waves-effect waves-light btn-small, collapsible-header">Employee</a>
								<div class="collapsible-body">
									<ul>
										<div style="border: 1px dashed aquamarine" class="divider"></div>
										<li><a style="color: black	" class="waves-effect waves-light btn-small" href="/employee">Employee Profile</a></li>
										<li><a style="color: black" class="waves-effect waves-light btn-small" href="/employeeRole">Position Roles</a></li>
									</ul>
								</div>
							</li>
						</ul>
						</li>
						<div style="border: 1px solid aquamarine" class="divider"></div>
					<!--Garments Dropdown-->
						<li class="no-padding">
						<ul class="collapsible collapsible-accordion">
							<li><a style="color: black" class="waves-effect waves-light btn-small, collapsible-header">Garments</a>
								<div class="collapsible-body">
									<ul>
										<div style="border: 1px dashed aquamarine" class="divider"></div>
										<li><a style="color: black" class="waves-effect waves-light btn-small" href="/garments">Category</a></li>
										<li><a style="color: black" class="waves-effect waves-light btn-small" href="/garmentsDetails">Segment</a></li>
										<li><a style="color: black" class="waves-effect waves-light btn-small" href="/designPattern">Design Pattern</a></li>
									<!--Measurements Dropdown-->
										<li class="no-padding">
										<ul class="collapsible collapsible-accordion">
										<li><a style="color: black" class="waves-effect waves-light btn-small, collapsible-header">Measurements</a>
											<div class="collapsible-body">
												<ul>
													<div style="border: 1px dashed aquamarine" class="divider"></div>
													<li><a style="color: black" class="waves-effect waves-light btn-small" href="/measurementCategory">Header</a></li>
								  					<li><a style="color: black" class="waves-effect waves-light btn-small" href="/measurementDetails">Details</a></li>
												</ul>
											</div>
										</li>
										</ul>
										</li>
										<div style="border: 1px solid aquamarine" class="divider"></div>
									</ul>
								</div>
							</li>
						</ul>
						</li>
						<div style="border: 1px solid aquamarine" class="divider"></div>
					<!--Materials and Fabrics Dropdown-->
						<li class="no-padding">
						<ul class="collapsible collapsible-accordion">
							<li><a style="color: black" class="waves-effect waves-light btn-small, collapsible-header">Fabrics and Materials</a>
								<div class="collapsible-body">
									<ul>
										<div style="border: 1px dashed aquamarine" class="divider"></div>
										<li><a style="color: black" class="waves-effect waves-light btn-small" href="/fabricAndMaterialsFabricType">Fabric Types</a></li>
										<li><a style="color: black" class="waves-effect waves-light btn-small" href="/fabricAndMaterialsSwatches">Swatches</a></li>
				  	<!--Materials Dropdown-->
						<li class="no-padding">
						<ul class="collapsible collapsible-accordion">
							<li class="bold"><a style="color: black" class="bold, waves-effect waves-light btn-small, collapsible-header">Materials</a>
								<div class="collapsible-body">
									<ul>
										<div style="border: 1px dashed aquamarine" class="divider"></div>
										<li><a style="color: black" class="waves-effect waves-light btn-small" href="#!">Threads</a></li>
								 		<li><a style="color: black" class="waves-effect waves-light btn-small" href="#!">Needles</a></li>
										<li><a style="color: black" class="waves-effect waves-light btn-small" href="#!">Buttons</a></li>
										<li><a style="color: black" class="waves-effect waves-light btn-small" href="#!">Zippers</a></li>
										<li><a style="color: black" class="waves-effect waves-light btn-small" href="#!">Hook & Eye</a></li>
									</ul>
								</div>
							</li>
						</ul>
						</li>
						<div style="border: 1px solid aquamarine" class="divider"></div>
						</ul>
						</div>
						</li>
						</ul>
						</li>
						<div style="border: 1px solid aquamarine" class="divider"></div>
								<li><a style="color: black" class="waves-effect waves-light btn-small" href="/catalogue">Catalogue</a></li>
							</ul>
						</div>
					</li>
				</ul>
			</li>
		</ul>

		<ul style="color: aquamarine" id="shop" class="right hide-on-med-and-down">
      		<h4>Fashion Collection</h4>
      	</ul>

		</ul>

		<a href="#" data-activates="slide-out" class="button-collapse show-on-large">
			<i class="mdi-navigation-menu"></i>
		</a>
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
      </script>



      @yield('scripts')
</body>

</html>