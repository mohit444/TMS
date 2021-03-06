<?php echo $this->Html->script('jquery', FALSE);?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">

  
        
       
  
  

  <div class="row">

	
		<div style="float:left;">
			<a class="btn btn-primary" style=" padding: 1px 15px 3px 2px;" onClick="history.go(-1);"><span class="glyphicon glyphicon-arrow-left text-primary" style="padding:8px; background:#ffffff; margin-right:4px;">
			</span>Back</a>
		</div>
	
	<div class="col-lg-9 col-lg-offset-1">

		

		<h2>Add Task</h2>

		<div class="well">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->Form->create('Task' , array('class' => 'form-horizontal' , 'inputDefaults' => array('label' => false))); ?>


			<div class="form-group">
				<label for="inputRequest_Date3" class="col-sm-2 control-label">Date</label>
				
				<div class="col-sm-10">
				
					<?php echo $this->Form->input('date' , array('class' => 'form-control' , 'type' => 'text' , 'id' => 'date'  ));?>
					
				</div>
			</div>

			<div class="form-group">
				<label for="inputEmpid3" class="col-sm-2 control-label">App_Name</label>
				<div class="col-sm-10">
					<?php echo $this->Form->input('application_id' , array('class' => 'form-control', 'id' => 'name', 'type' => 'select' , 'options' => $app , 'empty' => '--Select Any One--'));?>

					
				</div>
			</div>

			<div class="form-group">
				<label for="inputUsername3" class="col-sm-2 control-label">Domain</label>
				<div class="col-sm-10">
					<?php echo $this->Form->input('domain' , array('class' => 'form-control', 'id' => 'domain'));?>
				</div>
			</div>

			

			

			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Operator</label>
				<div class="col-sm-10">
					<?php echo $this->Form->input('operator', array(
						'options' => array('Unknown' => '-Select-' , 'IDEA' => 'IDEA' , 'Reliance' => 'Reliance' , 'Mts' => 'Mts' , 'Aircel' => 'Aircel' , 'Vodafone' => 'Vodafone' , 'Telenor' => 'Telenor' , 
						'Airtel' => 'Airtel') , 'class'=>'form-control', 'id' => 'operator' ));?>
				</div>
			</div>

			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Circle</label>
				<div class="col-sm-10">
					<?php echo $this->Form->input('circle', array(
						'options' => array('Unknown' => '-Select Any One-' , 'Delhi' => 'Delhi' , 'Noida' => 'Noida' , 'Mumbai' => 'Mumbai' , 'Bangalore' => 'Bangalore' , 'Chennai' => 'Chennai' , 'Pune' => 'Pune' , 
						'Gurgaon' => 'Gurgaon') , 'class'=>'form-control', 'id' => 'circle' ));?>
				</div>
			</div>


		


			<div class="form-group">
			<label class="col-sm-2 control-label">Duration(HH:MM)</label>
			<div class="col-sm-10">
				<div class="input-group bootstrap-timepicker timepicker">

					<?php echo $this->Form->input('time' , array('class' => 'form-control' , 'id'=> "timepicker2" , 'type' => 'text'));?>
					<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
				</div>
			</div>
			</div>




			


			<div class="form-group">
				<label for="inputComment3" class="col-sm-2 control-label">Task Description</label>
				<div class="col-sm-10">
					<?php echo $this->Form->input('comment',array('class'=>'form-control', 'id' => 'comment'));?>
				</div>
			</div>

			<div class="form-group">
			
				<div class="col-sm-offset-2 col-sm-10"><table>
			<tr><td>
					<?php echo $this->Form->submit('Save',array('class'=>'btn btn-primary'));?>
					 </td>
				</div>
				<div class="col-sm-offset-2 col-sm-10"><td>
			<a class="btn btn-danger" href="/tms/tasks/index">Cancel</a></td></tr>
			</table>
			</div></div>
			
		<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>

<script>
  $(function() {
    $( "#date" ).datepicker({
      showWeek: true,
      dateFormat : 'yy-mm-dd',
      firstDay: 1
    });
    $('#timepicker2').timepicker({
		showMeridian: false,
		
                
            });
    
   
   
  });
  </script>