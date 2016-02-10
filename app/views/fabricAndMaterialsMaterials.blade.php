@extends('layouts.master')

@section('content')


  <p><h4 style="lightpink">Materials</h4></p>
  <div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"><a style="color:teal" href="#test1"><b>Threads</b></a></li>
        <li class="tab col s3"><a style="color:teal" href="#test2"><b>Needles</b></a></li>
        <li class="tab col s3"><a style="color:teal" href="#test3"><b>Buttons</b></a></li>
        <li class="tab col s3"><a style="color:teal" href="#test4"><b>Zippers</b></a></li>
        <li class="tab col s3"><a style="color:teal" href="#test5"><b>Hook & Eye</b></a></li>
      </ul>
    </div>
    <div id="test1" class="hue col s12">threads.</div>
    <div id="test2" class="hue col s12">needles daw</div>
    <div id="test3" class="hue col s12">Test 3</div>
    <div id="test4" class="hue col s12">Test 4</div>
    <div id="test5" class="hue col s12">Test 5 bitch</div>
  </div>

@stop

@section('scripts')
    <script>
     $(document).ready(function)({
	     	$('ul.tabs').tabs();
  			});
    </script>

@stop

	