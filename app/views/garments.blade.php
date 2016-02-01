@extends('layouts.master')

@section('content')
    <div class="row">
    	<div class="col s12 m12 l12">
    		<div class="card-panel">
   		    	<span class="card-title"><h4>Garments</h4></span>
   				<div class="divider"></div>
    			<div class="card-content">

    			<a class="waves-effect waves-light btn modal-trigger" href="#add">ADD</a>
    
      				<table class = "centered" align = "center" border = "1">
       				<thead>
          				<tr>
              			<th data-field="id">Category ID</th>
             		 	<th data-field="name">Category Name</th>
              			<th data-field="address">Category Description</th>
              			</tr>
              		<thead>
              		<tbody>
              			<td>001</td>
              			<td>President</td>
              			<td>To rum</td>
              			<td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit">EDIT</button>
              			


              		</tbody>
              		</table>

              		<div id="edit" class="modal">
           			<div class = "label"><font color = "teal" size = "+3" back >&nbsp Garments </font> </div>
           			<div class="modal-content">

            		<div class = "label"><font size = "+2"> <b>Garments Category Information</b> </font></div>
            		<p></p>
            		<div class = "label">Category ID: </div>
           			<div class="input"> <input type="text" placeholder="" readonly = "readonly"> </div>
           			<div class = "label">Category Name: </div>
           			<div class="input"><input type="text" placeholder="Category Name"> </div>
           			<div class = "label">Category Description:</div>
           			<div class="input"> <input type="text" placeholder="Category Description"> </div>
           			<div class="modal-footer">
         		   		<a href="cancel" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
           				 <a href="save" class=" modal-action modal-close waves-effect waves-green btn-flat">Save</a>	
           			</div>

    			</div>

    		
    			</div>
    		</div>

    			<div id="add" class="modal">
           			<div class = "label"><font color = "teal" size = "+3" back >&nbsp Garments </font> </div>
           			<div class="modal-content">

            		<div class = "label"><font size = "+2"> <b>Garments Category Information</b> </font></div>
            		<p></p>
                <div class = "label">Category ID: </div>
                <div class="input"> <input type="text" placeholder="" readonly = "readonly"> </div>
                <div class = "label">Category Name: </div>
                <div class="input"><input type="text" placeholder="Category Name"> </div>
                <div class = "label">Category Description:</div>
                <div class="input"> <input type="text" placeholder="Category Description"> </div>
                <div class="modal-footer">
                  <a href="cancel" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
                   <a href="save" class=" modal-action modal-close waves-effect waves-green btn-flat">Save</a>  
                </div>
    	</div>
    </div>	

@stop

@section('content')
    {{ HTML::script('js/jquery-2.1.4.min.js') }}
    {{ HTML::script('js/materialize.min.js') }}
    {{ HTML::script('js/forModal.js') }}

@stop