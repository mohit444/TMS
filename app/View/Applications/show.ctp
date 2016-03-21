<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
 
 <?php 
	if($this->Session->read('Auth.User.role') == 'PM' || $this->Session->read('Auth.User.role')== 'TL' || $this->Session->read('Auth.User.role') == 'EMM') :  
?>

<div class="container">


<!-- Filter & Assign App Button Section ...-->

	<div class="row">
		<div class="col-md-5 col-md-offset-3">
			<div class="well">

				<?php echo $this->Session->flash(); ?>
				<?php echo $this->Form->create('Application' , array('class' => 'form-vertical' , 'inputDefaults' => array('label' => false))); ?>


                <table>
                <tr><td>
					<div class="form-group">

						<div class="icon-addon addon-md" >

						    <label class="glyphicon glyphicon-search" rel="tooltip" title="Application name"></label>

						    <?php echo $this->Form->input('name' , array('class' => 'form-control' , 'id'=>"name" , 'placeholder'=>"Application Name"));?>


						</div>


					</div>
					</td>
					<td>

					<div class="form-group">
						<div class="icon-addon addon-md" >

						    <label class="glyphicon glyphicon-search" rel="tooltip" title="Employee name"></label>
						    <?php echo $this->Form->input('username' , array('class' => 'form-control' , 'id'=>"username" , 'placeholder'=>"Employee Name"));?>
						</div>
					</div>
					</td>
				</tr>
				<tr><td>

					<div class="form-group">
						<div class="icon-addon addon-md">

						    <label class="glyphicon glyphicon-search" rel="tooltip" title="from"></label>
						    <?php echo $this->Form->input('from' , array('class' => 'form-control' , 'type' => 'text' , 'id' => 'from' , 'placeholder' => 'From Date' , 'name' => 'from'));?>
						</div>
					</div>
					</td>
					<td>

					<div class="form-group">
						<div class="icon-addon addon-md" >

						    <label class="glyphicon glyphicon-search" rel="tooltip" title="to"></label>
						   <?php echo $this->Form->input('to' , array('class' => 'form-control' , 'type' => 'text' , 'id' => 'to' , 'placeholder' => 'To Date' , 'name' => 'to'));?>
						</div>
					</div>
					</td>
				</tr>
				</table>


					<div class="icon-addon addon-md">


					<?php echo $this->Form->submit('Go!',array('class'=>'btn btn-info btn-block'));?>

					</div>


				<?php

				echo $this->form->end();?>
			</div>

		</div>
	
		
        <div style="float:right;">
            <a class="btn btn-success" style=" padding: 1px 15px 3px 2px;" href="/tms/applications/add"><span class="glyphicon glyphicon-plus text-success" style="padding:8px; background:#ffffff; margin-right:4px;"></span>Assign App</a>
        </div>
    </div>


<!-- Closed Filter & Assign App Button Section ...-->


<!-- MIS section-->

	<div class="row">

				<div class="col-lg-4">
				      <p style="font-weight:bold;">
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
						    <th>#</th>
						    <th>App Name</th>
						  
						    <th>App_Assigned_To</th>
						    <th>App_Assigned_By</th>
						    <th><?php echo $this->Paginator->sort('created'); ?></th>
						    <th><?php echo $this->Paginator->sort('modified', 'Modified'); ?></th>
						    <th>Actions</th>
						</tr>
					    </thead>


					     
					    <tbody>
						<?php $count = 0;
							
							foreach ($dataapp as $data): 
							
							$i = 0; 
							
							
			
							
		
		 
							
							?>
						<tr>

				
						
						    <td><?php echo ++$count ;?></td>
						    <td><?php echo $data['Application']['name']; ?></td>

						    <td>
							<?php
								while(isset($data['User'][$i])) {
									
									echo $data['User'][$i]['username'].' | ';
				
									$i = $i + 1;
								}
		
							?>
							</td>

							
								<?php foreach($assign as $ass) :
								
									if($data['Application']['id'] == $ass['applications']['id']) : ?>

									<td><?php echo $ass['users']['username']; ?></td>
								
								<?php endif;
									endforeach;?>

							
							
						       

						     
						  
						       <td>
						       <?php echo $data['Application']['created'];
							/*echo $this->Time->timeAgoInWords($data['Application']['created']);
							echo '&nbsp;<small>by</small>&nbsp;';
							echo '&nbsp;';
							$temp=$userdata['User']['createdby'];
							echo $userdata['User']['createdby'];*/
						       
						       ?>
							 
						    </td>
						    <td>
						       <?php echo $data['Application']['modified'];
							/*echo $this->Time->timeAgoInWords($data['Application']['modified']);
							echo '&nbsp;<small>by</small>&nbsp;';
							echo '&nbsp;';
							echo $userdata['User']['modifiedby'];*/
						       
						       ?>
							 
						    </td>
						<td>
						<?php echo $this->HTML->link('View' , array('controller' => 'applications' , 'action' => 'view' , $data['Application']['id']));?>
						<?php echo $this->HTML->link('Edit' , array('controller' => 'applications' , 'action' => 'edit' , $data['Application']['id']));?> 
						<?php echo $this->Form->postLink('Delete' , array('controller' => 'applications' , 'action' => 'delete' , $data['Application']['id']) , array('confirm' => 'Are you sure you want to delete this user')); ?></td>

						</tr>


						<?php 
						
						endforeach;?>
					    </tbody>
					</table>
		
					<div class="pull-right">
					    <?php
						echo $this->element('paginator');
					    ?>
					 </div>
				</div>
	</div>
</div>


<!-- Closed MIS section-->


<script>
  $(function() {
    $( "#from" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 2,
      dateFormat: "yy-mm-dd",
      
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#to" ).datepicker({
      defaultDate: "+1w",
      dateFormat: "yy-mm-dd",
      changeMonth: true,
      numberOfMonths: 2,
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });
  </script>
	
		
<?php endif;
?>