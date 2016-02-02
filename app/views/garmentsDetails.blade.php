@extends('layouts.master')

@section('content')
    <div class="row">
    	<div class="col s12 m12 l12">
    		<div class="card-panel">
   		    	<span class="card-title"><h4>Garments Details</h4></span>
   				<div class="divider"></div>
    			<div class="card-content">

    			<a class="waves-effect waves-light btn modal-trigger" href="#add">ADD</a>
    
      				<table class = "centered" align = "center" border = "1">
       				<thead>
          				<tr>
              			<th data-field="id">Garment Details ID</th>
             		   	<th data-field="name">Category Name</th>
                    <th data-field="name">Product Name</th>
              			<th data-field="address">Product Description</th>
              			</tr>
              		<thead>
              		<tbody>
              			<td>ID</td>
              			<td>Cat Name</td>
                    <td>Prod Name</td>
              			<td>Pro Desc</td>
              			<td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit">EDIT</button>
              			


              		</tbody>
              		</table>

              	<div id="edit" class="modal">
           			<div class = "label"><font color = "teal" size = "+3" back >&nbsp Garments Details </font> </div>
           			<div class="modal-content">

                <div class="input-field">
                  <select>
                    <option value="" disabled selected>Category</option>
                    <option value="1">Category 1</option>
                    <option value="2">Category 2</option>
                    <option value="3">Category 3</option>
                  </select>
                  <label>Category Name</label>
                </div>  

                <div class="input-field">
                 <input id="ProductName" type="text" class="validate">
                 <label for="product_name">Product Name: </label>
                </div>

                <div class="input-field">
                 <input id="ProductDescription" type="text" class="validate">
                 <label for="product_description">Product Description: </label>
                </div>

           			<div class="modal-footer">
         		   		<a href="#!" class=" modal-action modal-close waves-effect waves-green btn">Cancel</a>
           				 <a href="#!" class=" modal-action modal-close waves-effect waves-green btn">Save</a>	
           			</div>

    			</div>

    		
    			</div>
    		</div>

    			<div id="add" class="modal">
           			<div class = "label"><font color = "teal" size = "+3" back >&nbsp Garments Details </font> </div>
                <div class="modal-content">

                <div class="input-field">
                  <select>
                    <option value="" disabled selected>Category</option>
                    <option value="1">Category 1</option>
                    <option value="2">Category 2</option>
                    <option value="3">Category 3</option>
                  </select>
                  <label>Category Name</label>
                </div>  

                <div class="input-field">
                 <input id="ProductName" type="text" class="validate">
                 <label for="product_name">Product Name: </label>
                </div>

                <div class="input-field">
                 <input id="ProductDescription" type="text" class="validate">
                 <label for="product_description">Product Description: </label>
                </div>

                <div class="modal-footer">
                  <a href="#!" class=" modal-action modal-close waves-effect waves-green btn">Cancel</a>
                   <a href="#!" class=" modal-action modal-close waves-effect waves-green btn">Save</a> 
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
    </script>}

@stop
