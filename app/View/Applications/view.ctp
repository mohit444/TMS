<div class="col-lg-12 ">
					<table class="table table-bordered">
					    <thead>
					    <?php foreach($singleapp as $single) : ?>
						<tr>
						   
						    <th>App Name</th>
						    <td><?php echo $single['Application']['name'];?></td>
						</tr>
						<tr>
						    <th>Description</th>
						    <td><?php echo $single['Application']['description'];?></td>
						</tr>
						<tr>
						    <th>App Group</th>
						    <td><?php echo $single['Application']['app_group'];?></td>
						</tr>
						<tr>
						    <th>App Type</th>
						    <td><?php echo $single['Application']['app_type'];?></td>
						</tr>
						<tr>
						    <th>Operator</th>
						    <td><?php echo $single['Application']['operator'];?></td>
						</tr>
						<tr>
						    <th>Circle</th>
						    <td><?php echo $single['Application']['circle'];?></td>
						</tr>
						<tr>
						    <th>Request Type</th>
						    <td><?php echo $single['Application']['req_type'];?></td>
						</tr>
						<tr>
						    <th>Request Date</th>
						    <td><?php echo $single['Application']['req_date'];?></td>
						</tr>
						<tr>
						    <th>Requested By</th>
						    <td><?php echo $single['Application']['requested_by'];?></td>
						</tr>
						<tr>
						    <th>Current Status</th>
						    <td><?php echo $single['Application']['current_status'];?></td>
						</tr>
						<tr>
						    <th>Commited Date</th>
						    <td><?php echo $single['Application']['commited_date'];?></td>
						</tr>
						<tr>
						    <th>Dev Start date</th>
						    <td><?php echo $single['Application']['dev_start_date'];?></td>
						</tr>
						<tr>
						    <th>Dev End date</th>
						    <td><?php echo $single['Application']['dev_end_date'];?></td>
						</tr>
						<tr>
						    <th>PRD Status</th>
						    <td><?php echo $single['Application']['prd_status'];?></td>
						</tr>
						<tr>
						    <th>Code Review By</th>
						    <td><?php echo $single['Application']['code_review_by'];?></td>
						</tr>
						<tr>
						    <th>QA Status</th>
						    <td><?php echo $single['Application']['qa_status'];?></td>
						</tr>
						<tr>
						    <th>Comment</th>
						    <td><?php echo $single['Application']['comment'];?></td>
						</tr>
						    
					    </thead>  

					

						    
						  
						   


						<?php endforeach;?>
					    
					</table>
		
					
			</div>