<!DOCTYPE html>
<html>
<head>

	<title>Sidebar</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    {{ HTML::style('css/materialize.min.css') }}

    <style>
    	header, main, footer {
      	padding-left: 240px;
    	}

    	@media only screen and (max-width : 992px) {
      		header, main, footer {
        	padding-left: 0;
      		}
    	}
    	
    	a{
    		color: lightcoral;
    	}

    	#shop{
    		margin-right:20px;
    	}

    	nav{
    		background-color: lavender;
    	}

    	.waves-effect.waves-light .waves-ripple {

	    	background-color: lightcoral;
    	}


    </style>
</head>

<body>

	<nav>	


		<ul id="slide-out" class="side-nav fixed">
			<li>
				<div id="logo"></div>
			</li>
			<li><a style="color: lightcoral" class="waves-effect waves-light btn-small" href="#!">Sales</a></li>
			<li><a style="color: lightcoral" class="waves-effect waves-light btn-small" href="#!">Job Order</a></li>
			
			<!--Maintenance Dropdown-->
			<li class="no-padding">
				<ul class="collapsible collapsible-accordion">
					<li>
						<a style="color: lightcoral" class="waves-effect waves-light btn-small, collapsible-header">Maintenance</a>
						<div class="collapsible-body">
							<ul>
								<!--Customer Profile Dropdown-->
								<li class="no-padding">
									<ul class="collapsible collapsible-accordion">
										<li>
											<a style="color: lightcoral" class="waves-effect waves-light btn-small, collapsible-header">Customer Profile</a>
											<div class="collapsible-body">
												<ul>
													<li><a style="color: lightcoral" class="waves-effect waves-light btn-small" href="/customerIndividual">Individual</a></li>
													<li><a style="color: lightcoral" class="waves-effect waves-light btn-small" href="/customerCompany">Company</a></li>
												</ul>
											</div>
										</li>
									</ul>
								</li>
								<!--Employee Dropdown-->			
								<li class="no-padding">
									<ul class="collapsible collapsible-accordion">
										<li>
											<a style="color: lightcoral" class="waves-effect waves-light btn-small, collapsible-header">Employee</a>
											<div class="collapsible-body">
												<ul>
													<li><a style="color: lightcoral" class="waves-effect waves-light btn-small" href="/employee">Employee Profile</a></li>
													<li><a style="color: lightcoral" class="waves-effect waves-light btn-small" href="/employeeRole">Position Roles</a></li>
												</ul>
											</div>
										</li>
									</ul>
								</li>
								<!--Garments Dropdown-->
								<li class="no-padding">
									<ul class="collapsible collapsible-accordion">
										<li>
											<a style="color: lightcoral" class="waves-effect waves-light btn-small, collapsible-header">Garments</a>
											<div class="collapsible-body">
												<ul>
													<li><a style="color: lightcoral" class="waves-effect waves-light btn-small" href="/garments">Category</a></li>
													<li><a style="color: lightcoral" class="waves-effect waves-light btn-small" href="/garmentsDetails">Details</a></li>
													<li><a style="color: lightcoral" class="waves-effect waves-light btn-small" href="/designPattern">Design Pattern</a></li>
													<!--Measurements Dropdown-->
													<li class="no-padding">
														<ul class="collapsible collapsible-accordion">
															<li>
																<a style="color: ligthcoral" class="waves-effect waves-light btn-small, collapsible-header">Measurements</a>
																<div class="collapsible-body">
																	<ul>
																		<li><a style="color: lightcoral" class="waves-effect waves-light btn-small" href="/measurementCategory">Header</a></li>
																		<li><a style="color: lightcoral" class="waves-effect waves-light btn-small" href="/measurementDetails	">Details</a></li>
																	</ul>
																</div>
															</li>
														</ul>
													</li>
												</ul>
											</div>
										</li>
									</ul>
								</li>
								<!--Materials and Fabrics Dropdown-->
								<li class="no-padding">
									<ul class="collapsible collapsible-accordion">
										<li>
											<a style="color: lightcoral" class="waves-effect waves-light btn-small, collapsible-header">Materials and Fabrics</a>
											<div class="collapsible-body">
												<ul>
													<li><a style="color: lightcoral" class="waves-effect waves-light btn-small" href="/fabricAndMaterialsFabricType">Fabric Types</a></li>
													<li><a style="color: lightcoral" class="waves-effect waves-light btn-small" href="/fabricAndMaterialsSwatches">Swatches</a></li>
													<!--Materials Dropdown-->
													<li class="no-padding">
														<ul class="collapsible collapsible-accordion">
															<li>
																<a style="color: lightcoral" class="bold, waves-effect waves-light btn-small, collapsible-header">Materials</a>
																<div class="collapsible-body">
																	<ul>
																		<li><a style="color: lightcoral" class="waves-effect waves-light btn-small" href="#!">Threads</a></li>
																		<li><a style="color: lightcoral" class="waves-effect waves-light btn-small" href="#!">Needles</a></li>
																		<li><a style="color: lightcoral" class="waves-effect waves-light btn-small" href="#!">Buttons</a></li>
																		<li><a style="color: lightcoral" class="waves-effect waves-light btn-small" href="#!">Zippers</a></li>
																		<li><a style="color: lightcoral" class="waves-effect waves-light btn-small" href="#!">Hook & Eye</a></li>
																	</ul>
																</div>
															</li>
														</ul>
													</li>
								
												</ul>
											</div>
										</li>
									</ul>
								</li>
								<li><a style="color: lightcoral" class="waves-effect waves-light btn-small" href="/catalogue">Catalogue</a></li>
							</ul>
						</div>
					</li>
				</ul>
			</li>
		</ul>

		<ul style="color:lightcoral" id="shop" class="right hide-on-med-and-down">
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
      {{ HTML::script('js/collapse.js') }}

      @yield('scripts')
</body>

</html>