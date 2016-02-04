@extends('layouts.master')

@section('content')
  <div class="main-wrapper">
    <div class="row">
      <div class="col s12 m12 l12">
      <span class="page-title"><h4>Garment Segments</h4></span>
    </div>

       <div class="row">
        <div class="col s12 m12 l6">
           <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#addSegment">ADD NEW SEGMENT</button>
         </div>
      </div>
     </div>


    <div class="row">
    	<div class="col s12 m12 l12">
    		<div class="card-panel">
   		    	<span class="card-title"><h5><center>Garment Segments</center></h5></span>
   				<div class="divider"></div>
    			<div class="card-content">
      				<table class = "centered" align = "center" border = "1">
       				<thead>
          				<tr>
              			<th data-field="id">Garment Details ID</th>
             		   	<th data-field="name">Category Name</th>
                    <th data-field="name">Product Name</th>
              			<th data-field="address">Product Description</th>
              			</tr>
              		</thead>
              		<tbody>
              			<td>ID</td>
              			<td>Uniform</td>
                    <td>Polo</td>
              			<td>Pro Desc</td>
              			<td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#editSegment">EDIT</button>
                  </tbody>
              		</table>

                 <!--  <Modal structure for edit segment> -->
              	<div id="editSegment" class="modal modal-fixed-footer">
           			<font color = "teal"><h5><center> Edit Segment Details </center></h5></font> 
           			<div class="modal-content">
                <p>  

                <div class="input-field">
                  <select>
                    <option value="" disabled selected>Category</option>
                    <option value="1">Uniform</option>
                    <option value="2">Gown</option>
                    <option value="3">Tuxedo</option>
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
              </p>
            </div>

           			<div class="modal-footer">
         		   		<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">UPDATE</a>
           				 <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a>	
           			</div>

    			</div>

    		
    			</div>
    		</div>

    			<div id="addSegment" class="modal modal-fixed-footer">
           			<font color = "teal"><h5><center> ADD SEGMENT</center></h5> </font> 
                <div class="modal-content">
                <p>

                <div class="input-field">
                  <select>
                    <option value="" disabled selected>Category</option>
                    <option value="1">Uniform</option>
                    <option value="2">Gown</option>
                    <option value="3">Tuxedo</option>
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
              </p>
            </div>

                <div class="modal-footer">
                  <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">ADD</a>
                   <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCEL</a> 
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
