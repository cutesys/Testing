


  <div class="pagecontent">

            <div id="rootwizard" class="tab-container tab-wizard">
               <ul class="nav nav-tabs nav-justified">
                    <li><a href="#tab1" data-toggle="tab">Add Requirment </a></li>
                    

                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="tab1">

                        <form name="step1" id="form1" role="form" method="post">
							
							  <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="username">Worksite: </label>
                                    <input type="text" name="worksite" id="worksite" class="form-control" required="" >
                                   
                                </div>
                         
						
                                <div class="form-group col-md-6">
                                    <label for="username">Resources: </label>
                                    <input type="text" name="resources" data-parsley-trigger="change"
                                           data-parsley-type="digits" id="resources" class="form-control" required="" >
                                    <span id="exist_status_0"  class="validate_span"></span>

                                </div>
                          </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="username">Provider name: </label>
                                    <input type="text" name="req[0][provider]" id="provider" class="form-control" required="" >
                                   
                                </div>
                         
						
                                <div class="form-group col-md-6">
                                    <label for="username">Job Positions: </label>
                                    <select  name="req[0][job]" data-parsley-trigger="change"
                                           data-parsley-type="digits" id="job" class="form-control" required="" >
										    <option selected="" value=""> Select</option>
											 <?php

                                        $select_job = $db->secure_select("SELECT `job_name` FROM `sm_job_positions` WHERE `job_status`='1'");

                                        if (count($select_job) > 0) {

                                            for ($ji = 0; $ji < count($select_job); $ji++) {

                                                ?>

                                                <option

                                                    value="<?php echo $select_job[$ji]['job_name']; ?>"><?php echo $select_job[$ji]['job_name']; ?></option>

                                                    <?php

                                                }

                                            }

                                            ?>

                                    </select>
                                   

                                </div>
								
								</div>
								  <div class="row">
								<div class="form-group col-md-6">
                                    <label for="username">Job Category: </label>
                                    <input type="text" name="req[0][category]" id="category" class="form-control" required="" >
                                   
                                </div>
								<div class="form-group col-md-6">
                                    <label for="username">No:of Resources: </label>
                                    <input type="text" name="req[0][resource_no]" id="resource_no" class="form-control" required="" >
                                   
                                </div>
                          </div>
						  <div class="row">
				       <div class="form-group col-md-6">
						<label class=" control-label" for="username">Date From:</label><br>
							<div class='input-group datepicker' data-format="L">
                                        <input type='text' class="form-control" name="req[0][date_from]"
                                               id="date_from" required="" onkeydown="return false"/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
				</div>
				 <div class="form-group col-md-6">
				<label class=" control-label" for="username">Date To:</label><br>
						<div class='input-group datepicker' data-format="L">
                                        <input type='text' class="form-control" name="req[0][date_to]"
                                               id="date_to" required="" onkeydown="return false"/>
                                        <span class="input-group-addon"> <span class="fa fa-calendar"></span> </span>
                                    </div>
				</div>
			</div>
						  <div class="experience_div"></div>
                            <input type="hidden" value="1" id="req_increment">
						   <div class="row">
                                <div class="col-md-3">
                                    <button class="btn btn-success" type="button" id="req_add_btn" >Add New
                                        <i class="fa fa-plus"></i></button>
                                </div>
                            
						   
						  <div class="col-md-8"></div>
						  <div class="col-md-1">
						   <ul class="pager wizard" style="margin-right:650px;">
                    <li class="next finish" style="display:none;">
                        <button class="btn btn-success" name="submit" id="submit_btn" type="button">Add</button>
                    </li>
                </ul>
				</div>
				</div>

                            </form> 
 </div>






<script>
	 $('#req_add_btn').click(function () {
		
        var req_add = "req_add";
        req_increment = $('#req_increment').val();
        added_exp = +req_increment + 1;
        $('.experience_div').append(
                '<div class="row">'
                + '<div class="form-group col-md-6">'
                + ' <label for="username">Provider name: </label>'
                + '<input type="text" name="req[' + req_increment + '][provider]" id="provider" class="form-control" required="" >'
                                    
                + '</div>'
                + '<div class="form-group col-md-6">'
                + ' <label for="username">Job Positions: </label>'
                + '<input type="text"  name="req[' + req_increment + '][job]"  class="form-control" id="job"  required="" > '
				//+ ' <span id="exist_status_' + req_increment + '" class="validate_span"></span>'
			    + '</div>'
				 + '</div>'
				 +   '<div class="row">'
                + '<div class="form-group col-md-6">'
                + ' <label for="username">Job Category: </label>'
                + '<input type="text" name="req[' + req_increment + '][category]" id="category" class="form-control" required="" >'
                                    
                + '</div>'
                + '<div class="form-group col-md-6">'
                + ' <label for="username">No:of Resources: </label>'
                + '<input type="text"  name="req[' + req_increment + '][resource_no]"  class="form-control" id="resource_no"  required="" > '
				//+ ' <span id="exist_status_' + req_increment + '" class="validate_span"></span>'
			    + '</div>'
				 + '</div>'
				  +   '<div class="row">'
                + '<div class="form-group col-md-6">'
                + ' <label for="username">Date From: </label>'
				+ '<div class='input-group datepicker' data-format="L">'
                + '<input type="text" name="req[' + req_increment + '][date_from]" id="date_from" class="form-control" required=""   onkeydown="return false"/  >' 		
				+' <span class="input-group-addon">'
				+'<span class="fa fa-calendar">'
				+'</span>'
				+'</span>'
                +'</div>'                   
                + '</div>'
                + '<div class="form-group col-md-6">'
                + ' <label for="username">Date To: </label>'
				+'<div class='input-group datepicker' data-format="L">'
                + '<input type="text"  name="req[' + req_increment + '][date_to]"  class="form-control" id="date_to"  required="" onkeydown="return false"/> '
				+ ' <span class="input-group-addon">'
				+'<span class="fa fa-calendar">'
				+'</span>'
                +'</span>'
				//+ ' <span id="exist_status_' + req_increment + '" class="validate_span"></span>'
			    + '</div>'
				 + '</div>'
				  + '</div>'
				  );
                $('#req_increment').val(added_exp);
    });
	</script>