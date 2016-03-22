<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
 
 
<div class="container">

	<div class="row">




<!-- filter section -->
		<div class="col-md-5 col-md-offset-3">
			<div class="well">

			
			
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->Form->create('User' , array('class' => 'form-vertical' , 'inputDefaults' => array('label' => false))); ?>


                <table>

                <tr><td>
					<div class="form-group">

						<div class="icon-addon addon-md" >

						    <label class="glyphicon glyphicon-search" rel="tooltip" title="empid"></label>

						    <?php echo $this->Form->input('empid' , array('class' => 'form-control' , 'id'=>"email" , 'placeholder'=>"Employee Id"));?>


						</div>

						
					</div>
					</td>
					<td>
					
					<div class="form-group">
						<div class="icon-addon addon-md" >

						    <label class="glyphicon glyphicon-search" rel="tooltip" title="username"></label>
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
				<a class="btn btn-success" style=" padding: 1px 15px 3px 2px;" href="/tms/users/add"><span class="glyphicon glyphicon-plus text-success" style="padding:8px; background:#ffffff; margin-right:4px;"></span>Create</a>
			</div>
			
	</div>
<!-- close filter section-->


	<div class="col-lg-4">
		<p style="font-weight:bold;">
		<?php
			echo $this->Paginator->counter(
				'Showing {:start} - {:end} of {:count}'
			);
		?>
		</p>
	</div>
	
	<div class="col-lg-12">
	
		<div class="table-responsive">
		<table class="table table-striped table-bordered">
		    <thead>
			<tr style="background-color:;">
			    <th>#</th>
			    <th>Employee_Id</th>
			    <th >Emp_Name</th>
			    <th>Email</th>
			    <th>Department</th>
			    <th>Role</th>
			    <th>Assigned_By</th>
			    <th>Mobile</th>
			    <th><?php echo $this->Paginator->sort('created'); ?></th>
			    <th><?php echo $this->Paginator->sort('modified', 'Modified'); ?></th>
			    <th>Actions</th>
			</tr>
		    </thead>


		     
		    <tbody>
			<?php $count = 0;
				
				foreach ($emp as $userdata): ?>
			<tr>


			
			    <td><?php echo ++$count ;?></td>
			    <td><?php echo $userdata['User']['empid']; ?></td>
			    

			    <td><?php echo $userdata['User']['username']; ?></td>

			    <td><?php echo $userdata['User']['email'];?></td>
			    <td><?php echo $userdata['User']['dept_name'];?></td>
			    <td><?php echo $userdata['User']['role'];?></td>

			     <?php 
				$flag = 0;
				foreach($pn as $pname) :
					
					if($userdata['User']['parent_id'] == $pname['c']['parent_id']) :
					
					$flag=1;
					break;
					
					endif;

				
					
					endforeach;
					if($flag==1) : ?>

					<td><?php echo $pname['p']['username'];?></td>
					<?php endif;?>

		


			    
			    <td><?php echo $userdata['User']['mobile'];?></td>
			    
			  
			       <td><?php echo $userdata['User']['created'];
			      /* <?php
				echo $this->Time->timeAgoInWords($userdata['User']['created']);
				echo '&nbsp;<small>by</small>&nbsp;';
				echo '&nbsp;';
				$temp=$userdata['User']['createdby'];
				echo $userdata['User']['createdby'];?>*/
			       
			       ?>
				 
			    </td>
			    <td><?php echo $userdata['User']['modified'];
			       /*<?php
				echo $this->Time->timeAgoInWords($userdata['User']['modified']);
				echo '&nbsp;<small>by</small>&nbsp;';
				echo '&nbsp;';
				echo $userdata['User']['modifiedby'];?>*/
			       
			       ?>
				 
			    </td>
			<div class="form-group">
			<td>
			
			<?php echo $this->HTML->link('' , array('controller' => 'users' , 'action' => 'edit' , $userdata['User']['id'] ), array('class'=>"glyphicon glyphicon-edit" , 'title' => 'Edit'));?>
			
			<?php echo $this->Form->postLink('' , 
			array('class' => 'form-control' , 'controller' => 'users' , 'action' => 'delete' , $userdata['User']['id'])  ,  array('confirm' => 'Are you sure you want to delete this user' , 'class' => "glyphicon glyphicon-trash" ,'rel'=> "tooltip", 'title'=>"Delete")); ?>
			</div>
			</td>
			</div>

			</tr>


			<?php endforeach;?>
		    </tbody>
		</table>
		</div>

		<div class="pull-right">
		    <?php
			echo $this->element('paginator');
		    ?>
		 </div>
					
	</div>
	
</div>

<script>
  $(function() {
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
			