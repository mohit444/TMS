<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
 




<!-- Filter Section ...-->

	<div class="row">
	
	
	
	

		<div class="col-md-5 col-md-offset-3">
		
			<div class="well">

				<?php echo $this->Session->flash(); ?>
				<?php echo $this->Form->create('Application' , array('class' => 'form-vertical' , 'inputDefaults' => array('label' => false))); ?>


                <table>
                <tr><td>
					<div class="form-group">

						<div class="icon-addon addon-md" >

						    <label class="glyphicon glyphicon-search" rel="tooltip" title="name"></label>

						    <?php echo $this->Form->input('name' , array('class' => 'form-control' , 'id'=>"name" , 'placeholder'=>"Application Name"));?>


						</div>


					</div>
					</td>
					<td>

					<div class="form-group">
						<div class="icon-addon addon-md">

						    <label class="glyphicon glyphicon-search" rel="tooltip" title="commited"></label>
						    <?php echo $this->Form->input('commited_date' , array('class' => 'form-control' , 'type' => 'text' , 'id' => 'commited' , 'placeholder' => 'Commited Date' , 'name' => 'commited date'));?>
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
	<?php
		if($this->Session->read('Auth.User.role') == 'PM' || $this->Session->read('Auth.User.role')== 'TL' || $this->Session->read('Auth.User.role') == 'EMM') : ?>
		<div class="form-group" style="float:right;">
		
			<a class="btn btn-success" style=" padding: 1px 15px 3px 2px;" href="/tms/applications/show"><span class="glyphicon glyphicon-plus text-success" style="padding:8px; background:#ffffff; margin-right:4px;"></span>Assigned App</a>
		</div>
		
		<div class="form-group" style="margin-right:10px; float:right;">
			<a class="btn btn-success" style=" padding: 1px 15px 3px 2px;" href="/tms/applications/add"><span class="glyphicon glyphicon-plus text-success" style="padding:8px; background:#ffffff; margin-right:4px;"></span>Create App</a>
		</div>
		
		
		
		<?php endif;
	?>
    </div>


<!-- Closed Filter section ...-->


<!-- MIS section-->

	<div class="row">
<?php if(!empty($dataapp)) : ?>
				<div class="col-lg-4">
				      <p style="font-weight:bold;">
					<?php
					echo $this->Paginator->counter(
						'Showing {:start} - {:end} of {:count}'
					);
					?>
				      </p>
				</div>

				  
					<table class="table table-striped table-bordered">
					    <thead>
						<tr>
						    <th>#</th>
						    <th>App Name</th>
						    <th>App Type</th>
						    <th>App_Assigned_To</th>
						    <th>App_Assigned_By</th>
						    
						    <th>Commited Date</th>
						    <th><?php echo $this->Paginator->sort('created'); ?></th>
						    <th><?php echo $this->Paginator->sort('modified', 'Modified'); ?></th>
						    <th>Actions</th>
						</tr>
					    </thead>


					     
					    <tbody>
						<?php $count = 0;
							
							foreach ($dataapp as $data): 
							
							$i = 0; 
							
							$j = 0; 
							
							while(isset($data['User'][$j])) :
								if($data['User'][$j]['ApplicationsUser']['user_id'] == $this->Session->read('Auth.User.id') ) :
			
							
							?>
						<tr>

				
						
						    <td><?php echo ++$count ;?></td>
						    <td><?php echo $data['Application']['name']; ?></td>
						     <td><?php echo $data['Application']['app_type']; ?></td> 

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

							
							
						     

						     <td><?php echo $data['Application']['commited_date']; ?></td>
						  
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
						<?php echo $this->HTML->link('' , array('controller' => 'applications' , 'action' => 'view' , $data['Application']['id']) , array('class'=>"glyphicon glyphicon-eye-open" , 'title' => 'View'));?>
						<?php echo $this->HTML->link('' , array('controller' => 'applications' , 'action' => 'edit' , $data['Application']['id']) , array('class'=>"glyphicon glyphicon-edit" , 'title' => 'Edit'));?> 
						<?php echo $this->Form->postLink('' , array('controller' => 'applications' , 'action' => 'delete' , $data['Application']['id']) , array('confirm' => 'Are you sure you want to delete this user' , 'class' => "glyphicon glyphicon-trash" ,'rel'=> "tooltip", 'title'=>"Delete")); ?></td>

						</tr>


						<?php 
						endif;
							$j = $j + 1;
								
						endwhile;
						
						endforeach;?>
					    </tbody>
					</table>
		
					<div class="pull-right">
					    <?php
						echo $this->element('paginator');
					    ?>
					 </div>
				
	<?php else :
			echo "Records not found";
	
	endif;?>
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
    $( "#commited" ).datepicker({
      defaultDate: "+1w",
      dateFormat: "yy-mm-dd",
      changeMonth: true,
      numberOfMonths: 2
    });
  });
  </script>