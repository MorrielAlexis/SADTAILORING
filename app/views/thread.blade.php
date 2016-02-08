<!DOCTYPE html>
<html>
<head>

    <title>Thread</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    {{ HTML::style('css/materialize.min.css') }}
    {{ HTML::style('css/style.css') }}
    

</head>
<body>

	<div class="main-wrapper">
    <div class="row">
      <div class="col s12 m12 l12">
      <span class="page-title"><h4>Thread</h4></span>
      </div>

      <div class="row">
        <div class="col s12 m12 l6">
           <button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#addThread">ADD Thread</button>
        </div>
      
    </div>



    <div class="row">
    	<div class="col s12 m12 l12">
    		<div class="card-panel">
   		    	<span class="card-title"><h5><center>Thread</center></h5></span>
   				<div class="divider"></div>
    			<div class="card-content">
    
      				<table class = "centered" align = "center" border = "1">
       				   <thead>
          				<tr>
                    <th date-field= "Thread ID">Thread ID</th>
             				<th data-field="Thread Name">Thread Name</th>
                    <th data-field="Thread Size">Thread Size</th>
                    <th data-field="Thread Color">Thread Color</th>
                    <th data-field="Thread">Thread</th>
              			<th data-field="Image">Image</th>
              		</tr>
                 </thead>

              		<tbody>
              			<td>001</td>
                    <td>Thread Name</td>
              			<td>Thread Size</td>
              			<td>Thread Color</td>
              			<td>Thread</td>
                    <td>image</td>
              			<td><button class="modal-trigger waves-effect waves-light btn btn-small center-text" href="#editThread">EDIT</button>
              		</tbody>
              </table>

              	<div id="editThread" class="modal modal-fixed-footer">
           				 <font color = "teal" ><center><h5>Edit Thread</h5></center>
                 	 </font> 

           			  <div class="modal-content">
                  
                			<div class="input-field">
                				<input id="ThreadName" type="text" class="validate">
                				<label for="Thread_Name"> Thread Name </label>
                			</div>

                			<div class="input-field">
                				<input id="ThreadSize" type="text" class="validate">
                				<label for="Thread_Size"> Thread Size </label>
                			</div>

                			<div class="input-field">
                				<input id="ThreadColor" type="text" class="validate">
                				<label for="Thread_Color"> Thread Color </label>
                			</div>


                			<div class="input-field">
                				<input id="Thread" type="text" class="validate">
                				<label for="Thread"> Thread </label>
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

                    <br>
                    <br> 

                  </div>       		   		
                  <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn btn-flat">UPDATE</a>
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn btn-flat">CANCEL</a>  
           			  </div>

    			       </div>
                

    			        <div id="addThread" class="modal modal-fixed-footer">
                    <font color = "teal"><h5><center>Add Thread </center></h5>
                    </font> 
                    <div class="modal-content">
                  
                      <div class="input-field">
                        <input id="ThreadName" type="text" class="validate">
                        <label for="Thread_Name"> Thread Name </label>
                      </div>

                      <div class="input-field">
                        <input id="ThreadSize" type="text" class="validate">
                        <label for="Thread_Size"> Thread Size </label>
                      </div>

                      <div class="input-field">
                        <input id="ThreadColor" type="text" class="validate">
                        <label for="Thread_Color"> Thread Color </label>
                      </div>


                      <div class="input-field">
                        <input id="Thread" type="text" class="validate">
                        <label for="Thread"> Thread </label>
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

                    <br>
                    <br> 

                  </div>                
                  <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn btn-flat">UPDATE</a>
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn btn-flat">CANCEL</a>  
                  </div>

                 </div>		
              </div>	



    {{ HTML::script('js/jquery-2.1.4.min.js') }}
    {{ HTML::script('js/materialize.min.js') }}
    {{ HTML::script('js/forModal.js') }}
    {{ HTML::script('js/forDropdown.js') }}
    {{ HTML::script('js/inputfield.js')}}

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

  </div>

</body>

</html>