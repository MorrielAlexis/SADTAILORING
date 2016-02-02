@extends('layouts.master')

@section('content')
    <div class="row">
    	<div class="col s12 m12 l12">
    		<div class="card-panel">
   		    	<span class="card-title"><h4>Catalogue</h4></span>
   				<div class="divider"></div>
    			<div class="card-content">

    			<a class="waves-effect waves-light btn modal-trigger" href="#add">ADD</a>
    
      				<table class = "centered" align = "center" border = "1">
       				<thead>
          				<tr>
                    <th date-field= "Catalog ID">Catalog ID</th>
              			<th data-field="Catalog Category">Catalog Category</th>
             		  	<th data-field="Catalog Name">Catalog Name</th>
                    <th data-field="Description">Description</th>
              			<th data-field="Image">Image</th>
              			</tr>
              		<thead>
              		<tbody>

              			<td>001</td>
                    <td>Catalog Category</td>
              			<td>Catalog Nane</td>
              			<td>Catalog Description</td>
                    <td>image</td>
              			<td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#edit">EDIT</button>
              			


              		</tbody>
              		</table>

              		<div id="edit" class="modal modal-fixed-footer">
           			<div class = "label"><font color = "teal" size = "+3" back >&nbsp Catalogue
                 </font> </div>
           			<div class="modal-content">
           			<div class="input-field">
                  <select>
                    <option value="" disabled selected>Type Name</option>
                    <option value="1">Garment 1</option>
                    <option value="2">Garment 2</option>
                  </select>
                  <label> Garment Category</label>
                </div>      

                <div class="input-field">
                 <input id="CatalogName" type="text" class="validate">
                 <label for="Catalog_Name"> Catalog Name </label>
                </div>

                <div class="input-field">
                 <input id="ButtonCategoryName" type="text" class="validate">
                 <label for="Button_Category_Name">Button Category Name: </label>
                </div>

           			
                <div class="file-field input-field">
                <div class="btn">
               <span>Upload Image</span>
               <input type="file">
              </div>
               <div class="file-path-wrapper">
               <input class="file-path validate" type="text">
               </div>
                </div>
           			<div class="modal-footer">
         		   		
                  <a href="cancel" class="modal-action modal-close waves-effect waves-green btn btn">Cancel</a>
                  <a href="save" class="modal-action modal-close waves-effect waves-green btn btn">Save</a>  
           			</div>

    			</div>

    		
    			</div>
    		</div>

    			<div id="add" class="modal modal-fixed-footer">
                <div class = "label"><font color = "teal" size = "+3" back >&nbsp Catalogue
                 </font> </div>
                <div class="modal-content">
                <div class="input-field">
                  <select>
                    <option value="" disabled selected>Type Name</option>
                    <option value="1">Garment 1</option>
                    <option value="2">Garment 2</option>
                  </select>
                  <label> Garment Category</label>
                </div>      

                <div class="input-field">
                 <input id="CatalogName" type="text" class="validate">
                 <label for="Catalog_Name"> Catalog Name </label>
                </div>

                <div class="input-field">
                 <input id="ButtonCategoryName" type="text" class="validate">
                 <label for="Button_Category_Name">Button Category Name: </label>
                </div>

                
                <div class="file-field input-field">
                <div class="btn">
               <span>Upload Image</span>
               <input type="file">
              </div>
               <div class="file-path-wrapper">
               <input class="file-path validate" type="text">
               </div>
                </div>
                <div class="modal-footer">
                  
                  <a href="cancel" class=" modal-action modal-close waves-effect waves-green btn">Cancel</a>
                  <a href="save" class=" modal-action modal-close waves-effect waves-green btn">Save</a>  
                   
                </div>
    	</div>
    </div>	

@stop

@section('scripts')
    {{ HTML::script('js/jquery-2.1.4.min.js') }}
    {{ HTML::script('js/materialize.min.js') }}
    {{ HTML::script('js/forModal.js') }}
    {{ HTML::script('js/inputfield.js')}}

@stop