@extends('layouts.master')

@section('content')


  <p><h4 style="lightpink">Materials</h4></p>
  <div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"><a href="#test1">Threads</a></li>
        <li class="tab col s3"><a href="#test2">Needles</a></li>
        <li class="tab col s3"><a href="#test3">Buttons</a></li>
        <li class="tab col s3"><a href="#test4">Zippers</a></li>
        <li class="tab col s3"><a href="#test5">Hook & Eye</a></li>
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

	