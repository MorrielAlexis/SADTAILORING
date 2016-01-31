<!DOCTYPE html>
<html>
<head>
		<title>"Customer Profile"</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    {{ HTML::style('css/materialize.min.css') }}

<style>

.tab{
  margin-top: 70px;
  margin-left: 70px;
}
.tabs{
  border-radius: 1px;
  margin-left: -10px;

}
.col.s11{
    border: 2px solid pink;
    height: 400px;
    width: 900px;
    border-radius: 2px;
}
.tab.col.s2{
  background-color: aquamarine;  
}

</style>

</head>

<body>
  <div class="tab">
    <div class="row">
    <div class="col s5">
      <ul class="tabs">
        <li class="tab col s2"><a class="active" href="#test1"><strong>Company</strong></a></li>
        <li class="tab col s2"><a href="#test2"><strong>Individual</strong></a></li>
        </ul>
    </div>
    
    <div id="test1" class="col s11">Company</div>
    <div id="test2" class="col s11">Individual</div>
    
    </div>
  </div>
      {{ HTML::script('js/jquery-2.1.4.min.js') }}
      {{ HTML::script('js/materialize.min.js') }}
      {{ HTML::script('js/tab.js') }}
      
  </body>
  

</html>

