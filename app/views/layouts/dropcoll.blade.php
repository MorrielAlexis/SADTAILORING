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

  <a class="btn-flat waves-effect waves-teal" href="#!"><b>Job Order</b></a>
  <a class='dropdown-button btn-flat' data-beloworigin="true" data-activates='dropdown'><b>Maintenance</b></a>

  <ul id='dropdown' class='dropdown-content'>

    <li class="no-padding">
    <ul class="collapsible collapsible-accordion">
    <li class="bold"><a class="collapsible-header  waves-effect waves-teal"></i>Customer Profile</a>
        <div class="collapsible-body">
        <ul>
          <li><a class="waves-effect waves-teal" href="ui-buttons.html">Individual</a></li>
          <li><a class="waves-effect waves-teal" href="ui-badges.html">Company</a></li>
        </ul>
        </div>
    </li>

    <li class="bold"><a class="collapsible-header  waves-effect waves-teal"></i>Employee</a>
        <div class="collapsible-body">
        <ul>
          <li><a class="waves-effect waves-teal" href="ui-buttons.html">Employee Profile</a></li>
          <li><a class="waves-effect waves-teal" href="ui-badges.html">Position Roles</a></li>
        </ul>
        </div>
    </li>

    <li class="bold"><a class="collapsible-header  waves-effect waves-teal"></i>Garments</a>
        <div class="collapsible-body">
        <ul>
          <li><a class="waves-effect waves-teal" href="ui-buttons.html">Category</a></li>
          <li><a class="waves-effect waves-teal" href="ui-badges.html">Segment</a></li>
          <li><a class="waves-effect waves-teal" href="ui-badges.html">Design Pattern</a></li>
          <li><a class="waves-effect waves-teal" href="ui-badges.html">Measurements</a></li>
        </ul>
        </div>
    </li>

    <li class="bold"><a class="collapsible-header  waves-effect waves-teal"></i>Materials & Fabrics</a>
        <div class="collapsible-body">
        <ul>
          <li><a class="waves-effect waves-teal" href="ui-buttons.html">Fabric Types</a></li>
          <li><a class="waves-effect waves-teal" href="ui-badges.html">Swatches</a></li>
          <li><a class="waves-effect waves-teal" href="ui-badges.html">Materials</a></li>
        </ul>
        </div>
    </li>

    <li class="bold"><a class="collapsible-header  waves-effect waves-teal"></i>Catalogue</a></li>

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
	    $('.dropdown-button').dropdown({
        inDuration: 300,
        outDuration: false,
        constrain_width: true, // Does not change width of dropdown to that of the activator
        hover: false, // Activate on hover
        gutter: 0, // Spacing from edge
        belowOrigin: false, // Displays dropdown below the button
        alignment: 'left' // Displays dropdown with edge aligned to the left of button
      });
      $('.dropdown-button').bind('click', function (e) { e.stopPropagation() });

	     	/*pang pushpin sana kaso di ko mapagana. :3
	     	$('.tabs-wrapper .row').pushpin({
	     		top: $('.tabs-wrapper').offset().top });
  			});
			*/
      </script>



      @yield('scripts')
</body>

</html>