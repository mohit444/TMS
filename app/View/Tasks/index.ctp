<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
 
 
<div class="container">

<!-- Filter section -->
<div class="row">
	<div class="col-md-5 col-lg-offset-3">
		<div class="well">

		
		
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->Form->create('Task' , array('class' => 'form-vertical' , 'inputDefaults' => array('label' => false))); ?>


				<table>
				<tr><td>

					<div class="form-group">
						<div class="icon-addon addon-md">

						    <label class="glyphicon glyphicon-search" rel="tooltip" title="on"></label>
						    <?php echo $this->Form->input('on' , array('class' => 'form-control' , 'type' => 'text' , 'id' => 'on' , 'placeholder' => 'ON Date' , 'name' => 'on'));?>
						</div>
					</div>
					</td>
					<td>
						<div class="form-group">

							<div class="icon-addon addon-md" >

							    <label class="glyphicon glyphicon-search" rel="tooltip" title="Application name"></label>

							    <?php echo $this->Form->input('name' , array('class' => 'form-control' , 'id'=>"name" , 'placeholder'=>"Application Name"));?>


							</div>


						</div>
				</td></tr>
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
				</td></tr>
				</table>


				<div class="icon-addon addon-md">


					<?php echo $this->Form->submit('Go!',array('class'=>'btn btn-info btn-block'));?>

				</div>


				<?php echo $this->form->end();?>
				</div>
			</div>
			<div style="float:right;">
			<a class="btn btn-success" style=" padding: 1px 15px 3px 2px;" href="/tms/tasks/add"><span class="glyphicon glyphicon-plus text-success" style="padding:8px; background:#ffffff; margin-right:4px;"></span>Add Task</a>
			</div>

		</div>

	</div>

<!-- close filter section-->

	<?php if(!empty($tasks)) : ?>	
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
					<table class="table table-striped table-bordered">
					    <thead>
						<tr>
						    <th>#</th>
						    <th>Date</th>
						    <th>App Name</th>
						    <th>Domain</th>
						    <th>Operator</th>
						    <th>Circle</th>
						    <th>Duration (HH:MM)</th>
						    <th>Task Description</th>
						    <th><?php echo $this->Paginator->sort('created'); ?></th>
						    <th><?php echo $this->Paginator->sort('modified', 'Modified'); ?></th>
						    <th>Actions</th>
						</tr>
					    </thead>


					     
					    <tbody>
						<?php $count = 0;
							
							foreach ($tasks as $task): ?>
						<tr>

				
						
						    <td><?php echo ++$count ;?></td>
						    <td><?php echo $task['Task']['date']; ?></td>
						    

						    <td><?php echo $task['Application']['name']; ?></td>

						    <td><?php echo $task['Task']['domain'];?></td>
						    <td><?php echo $task['Task']['operator'];?></td>
						    <td><?php echo $task['Task']['circle'];?></td>
						    <td><?php echo $task['Task']['time'];?></td>
						    <td><?php echo $task['Task']['comment'];?></td>

						    
						    
						  
						       <td>
						       <?php echo $task['Task']['created'];
							#echo $this->Time->timeAgoInWords($task['Task']['created']);
						       
						       ?>
							 
						    </td>
						    <td>
						       <?php echo $task['Task']['modified'];
							#echo $this->Time->timeAgoInWords($task['Task']['modified']);
							
						       
						       ?>
							 
						    </td>
						<td><?php echo $this->HTML->link('' , array('controller' => 'tasks' , 'action' => 'edit' , $task['Task']['id']) , array('class'=>"glyphicon glyphicon-edit" , 'title' => 'Edit'));?> 
						<?php echo $this->Form->postLink('' , array('controller' => 'tasks' , 'action' => 'delete' , $task['Task']['id']) , array('confirm' => 'Are you sure you want to delete this task' , 'class'=>"glyphicon glyphicon-trash" , 'title' => 'Delete')); ?></td>

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
	<?php else :
			echo "Records not found";
	
	endif;?>
    </div>
</div>


<script>
  $(function() {
  $( "#on" ).datepicker({
      defaultDate: "+1w",
      dateFormat: "yy-mm-dd",
      changeMonth: true,
      numberOfMonths: 1
    });
    $( "#from" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      dateFormat: "yy-mm-dd",
      
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#to" ).datepicker({
      defaultDate: "+1w",
      dateFormat: "yy-mm-dd",
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
    
  });
  </script>
			