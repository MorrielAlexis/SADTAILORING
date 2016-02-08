<!DOCTYPE html>
<html>
	<head>
		<title>Fashion Collection</title>
		  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		  	<!-- Style Here --> 
		  	  {{ HTML::style('css/materialize.min.css') }}
		      {{ HTML::style('css/materialize.min.css') }}
	</head>

	<body background="img/fashion.jpg">
		<p></p>
       <div id="login-page" class="row">

    		<div class="col s4 push-s4 z-depth-6 card-panel">
	    	  <form class="login-form">
	      		  	<div class="row">
	        			<div class="input-field col s12 center">
	          				<p class="center login-form-text">TAILORING AND ALTERATION MANAGEMENT SYSTEM</p>
	          				<p></p>
	         			</div>
	         		</div>

	         		<div class="row margin">
	          			<div class="input-field col s12">
	           				<i class="mdi-social-person-outline prefix"></i>
	           				<input class="validate" id="email" type="email">
	           				<label for="email" data-error="wrong" data-success="right" class="center-align">Email</label>
	       				</div>
	        		</div>

	        		<div class="row margin">
	          			<div class="input-field col s12">
	           				<i class="mdi-action-lock-outline prefix"></i>
	           				<input id="password" type="password">
           					<label for="password">Password</label>
	       				</div>
	       			</div>

	       			<div class="row">
	       				<div class="input-field col s12">
	           				<a href="/index" class="btn waves-effect waves-light col s12">Login</a>
         				</div>
         			</div>
         			<p></p>
	    		</form>
	    	</div>
	    </div>

	    {{ HTML::script('js/jquery-2.1.4.min.js') }}
    	{{ HTML::script('js/materialize.min.js') }}
    	{{ HTML::script('js/inputfield.js')}}

    </body>
</html>