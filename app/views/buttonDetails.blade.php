@extends('layouts.master')

@section('content')
    <div class="row">
    	<div class="col s12 m12 l12">
    		<div class="card-panel">
   		    	<span class="card-title"><h4>Button</h4></span>
   				<div class="divider"></div>
    			<div class="card-content">

    			<a class="waves-effect waves-light btn modal-trigger" href="#add">ADD</a>
    
      				<table class = "centered" align = "center" border = "1">
       				<thead>
          				<tr>
                    <th date-field= "Button Details ID">Button Details ID</th>
              			<th data-field="Button Category Name">Button Category Name</th>
             		  	<th data-field="ButtonName">Button Name</th>
                    <th data-field="ButtonDeascription">Button Description</th>
              			<th data-field="Image">Image</th>
              			</tr>
              		<thead>
              		<tbody>

              			<td>001</td>
                    <td>Type Name</td>
              			<td>President</td>
              			<td>run a certain group</td>
                    <td>imagelink</td>
              			<td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit">EDIT</button>
              			


              		</tbody>
              		</table>

              		<div id="edit" class="modal">
           			<div class = "label"><font color = "teal" size = "+3" back >&nbsp Button
                 </font> </div>
           			<div class="modal-content">

            		<div class = "label"><font size = "+2"> <b>Button Details</b> </font></div>
            		<p></p>
                <div class = "label">Button Details ID: </div>
                 <div class="input"> <input type="text" readonly = "readonly" placeholder=""> </div>
                <div class = "label">Button Category Name: </div>
                <div class="input-field">
                  <select>
                    <option value="" disabled selected>Type Name</option>
                    <option value="1">Cat 1</option>
                    <option value="2">Cat 2</option>
                  </select
                </div>      
                <div class = "label">Button Name: </div>
                <div class="input"><input type="text" placeholder="Button Name"> </div>
                <div class = "label">Button Description:</div>
                <div class="input"> <input type="text" placeholder="Button Description"> </div>
                <div class = "label">Image:</div>
                <button class = "teal button">Upload Image</button>
                 <img class="materialboxed" align = "center" data-caption="A picture of some deer and tons of trees" width="150" src="http://th01.deviantart.net/fs70/PRE/i/2013/126/1/e/nature_portrait_by_pw_fotografie-d63tx0n.jpg">

                <div class="modal-footer">
                  <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
                   <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Save</a>  
                </div>

    			</div>

    		
    			</div>
    		</div>

    			<div id="add" class="modal">
           			<div class = "label"><font color = "teal" size = "+3" back >&nbsp Button
                 </font> </div>
                <div class="modal-content">

                <div class = "label"><font size = "+2"> <b>Button Details</b> </font></div>
                <p></p>
                <div class = "label">Button Details ID: </div>
                 <div class="input"> <input type="text" readonly = "readonly" placeholder=""> </div>
                <div class = "label">Button Category Name: </div>
                <div class="input-field">
                  <select>
                    <option value="" disabled selected>Type Name</option>
                    <option value="1">Cat 1</option>
                    <option value="2">Cat 2</option>
                  </select
                </div>      
                <div class = "label">Button Name: </div>
                <div class="input"><input type="text" placeholder="Button Name"> </div>
                <div class = "label">Button Description:</div>
                <div class="input"> <input type="text" placeholder="Button Description"> </div>
                <div class = "label">Image:</div>
                <button class = "teal button">Upload Image</button>
                 <img class="materialboxed" align = "center" data-caption="A picture of some deer and tons of trees" width="150" src="http://th01.deviantart.net/fs70/PRE/i/2013/126/1/e/nature_portrait_by_pw_fotografie-d63tx0n.jpg">

                <div class="modal-footer">
                  <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
                   <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Save</a>  
                </div>
    	</div>
    </div>	

@stop

@section('scripts')
    <script>
      $(document).ready(function(){
      // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
      $('.modal-trigger').leanModal();
      });
    </script>

    <script>
      $(document).ready(function(){
      $('select').material_select();
      });
    </script>

@stop