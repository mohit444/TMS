

<div class="row">
	

		<h2>Users</h2>
		
		<div class="well">
		
			
				<?php echo $this->Session->flash(); ?>
				
			
				<?php
				// The base url is the url where we'll pass the filter parameters
				
				$base_url = array('controller' => 'users', 'action' => 'view');
				echo $this->Form->create("Filter",array('url' => $base_url, 'class' => 'filter'));
				
				// add a select input for each filter. It's a good idea to add a empty value and set
				// the default option to that.
																	
						
						
				// Add a basic search ?>
				
				<div class="form-group">
					
					<div class="col-sm-10">
												
						<?php echo $this->Form->input("search", array('class' => 'form-control' , 'placeholder' => "Search..."));?>
					</div>

				</div>

				
					<br>
					<?php echo $this->Form->submit('Go',array('class'=>'btn btn-primary'))?>
					
				

				<?php

				//echo $this->Form->submit("Go");

				// To reset all the filters we only need to redirect to the base_url
				echo "<div class='submit actions'>";
				echo $this->Html->link("Reset",$base_url);
				echo "</div>";
				echo $this->Form->end();
				?>
			
		</div>

			<div class="col-lg-4">
			      <p style="font-weight:bold; float:;">
				<?php
				echo $this->Paginator->counter(
					'Showing {:start} - {:end} of {:count}'
				);
				?>
			      </p>
			  </div>

			  <div class="col-lg-12 ">
				<table class="table table-bordered">
				    <thead>
					<tr>
					    <th>S.N</th>
					    <th>Employee Id</th>
					    <th>Username</th>
					    <th>Email</th>
					    <th>Department</th>
					    <th>Role</th>
					    <th>Parent</th>
					    <th>Mobile</th>
					    <th><?php echo $this->Paginator->sort('created'); ?></th>
					    <th><?php echo $this->Paginator->sort('modified', 'Modified'); ?></th>
					    <th>Actions</th>
					</tr>
				    </thead>


				     
				    <tbody>
					<?php $count = 0;
						
						foreach ($users as $userdata): ?>
					<tr>
					    <td><?php echo ++$count ;?></td>
					    <td><?php echo $this->Text->highlight(h($userdata['User']['empid']), $search); ?>&nbsp;</td>
					    

					    <td><?php echo $this->Text->highlight(h($userdata['User']['username']), $search); ?>&nbsp;</td>

					    <td><?php echo $userdata['User']['email'];?></td>
					    <td><?php echo $userdata['User']['dept_name'];?></td>
					    <td><?php echo $userdata['User']['role'];?></td>
					    <td><?php echo $userdata['User']['parent_id'];?></td>
					    <td><?php echo $userdata['User']['mobile'];?></td>
					    
					  
					       <td>
					       <?php
						echo $this->Time->timeAgoInWords($userdata['User']['created']);
						/*echo '&nbsp;<small>by</small>&nbsp;';
						echo '&nbsp;';
						$temp=$userdata['User']['createdby'];
						echo $userdata['User']['createdby'];*/
					       
					       ?>
						 
					    </td>
					    <td>
					       <?php
						echo $this->Time->timeAgoInWords($userdata['User']['modified']);
						/*echo '&nbsp;<small>by</small>&nbsp;';
						echo '&nbsp;';
						echo $userdata['User']['modifiedby'];*/
					       
					       ?>
						 
					    </td>
					    <td><?php echo $this->HTML->link('Edit' , array('controller' => 'users' , 'action' => 'edit' , $userdata['User']['id']));?> 
			<?php echo $this->Form->postLink('Delete' , array('controller' => 'users' , 'action' => 'delete' , $userdata['User']['id']) , array('confirm' => 'Are you sure you want to delete this user')); ?></td>
					</tr>


					<?php endforeach;?>
				    </tbody>
				</table>
				<div class="pull-right">
				    <?php
					echo $this->element('paginator');
				    ?>
				 </div>
			  </div>
		

</div>
