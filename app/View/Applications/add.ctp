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
	<div class="col-lg-10 col-lg-offset-0">
	

		<h2>Add Application</h2>

		<div class="well">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->Form->create('Application' , array('class' => 'form-horizontal' , 'inputDefaults' => array('label' => false))); ?>
			<div class="form-group">
				<label for="inputEmpid3" class="col-sm-2 control-label">App_Name</label>
				<div class="col-sm-10">
					<?php echo $this->Form->input('name' , array('class' => 'form-control', 'id' => 'name'));?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputUsername3" class="col-sm-2 control-label">App_Description</label>
				<div class="col-sm-10">
					<?php echo $this->Form->input('description' , array('class' => 'form-control', 'id' => 'description'));?>
				</div>
			</div>

			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">App_Group</label>
				<div class="col-sm-10">
					<?php echo $this->Form->input('app_group', array(
						'options' => array('Unknown' => '-Select-' , 'Enterprise App' => 'Enterprise App' , 'Telco App' => 'Telco App' , 'VAS App' => 'VAS App' , 'Panel (Genric)' => 'Panel (Genric)' , 
						'Portal (Genric)' => 'Portal (Genric)', 'MIS' => 'MIS' , 'API' => 'API' , 'Utility' => 'Utility' , 'Mobile App' => 'Mobile App') , 'class'=>'form-control', 'id' => 'app_group' ));?>
				</div>
			</div> 

			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">App_Type</label>
				<div class="col-sm-10">
					<?php echo $this->Form->input('app_type', array(
						'options' => array('Unknown' => '-Select-' , 'Utility (php / java)' => 'Utility (php / java)' , 'Pull / Push application' => 'Pull / Push application' , 'Shell Script' => 'Shell Script' ,
						'MIS' => 'MIS' , 'Panel' => 'Panel', 'Base uploader' => 'Base uploader' , 'USSD App' => 'USSD App' , 'Alert Configuration' => 'Alert Configuration' , 'log rotator' => 'log rotator' ,
						'Android app' => 'Android app' , 'Framework' => 'Framework' , 'Others' => 'Others') , 'class'=>'form-control', 'id' => 'app_type' ));?>
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
				<label for="inputDepartment3" class="col-sm-2 control-label">Request_Type</label>
				<div class="col-sm-10">
					<?php echo $this->Form->input('req_type' , array(
					'options' => array('Unknown' => '-Select-' , 'New application' => 'New application' , 'Modification' => 'Modification' , 'R&D' => 'R&D') , 'class'=>'form-control', 'id' => 'req_type'));?>
				</div>
			</div>








			<div class="form-group">
				<label for="inputRequest_Date3" class="col-sm-2 control-label">Request_Date</label>
				
				<div class="col-sm-10">
				
					<?php echo $this->Form->input('req_date' , array('class' => 'form-control' , 'type' => 'text' , 'id' => 'req_date'  ));?>
					
				</div>
			</div>








			<div class="form-group">
				<label for="inputMobile3" class="col-sm-2 control-label">Requested_By</label>
				<div class="col-sm-10">
					<?php echo $this->Form->input('requested_by',array('class'=>'form-control', 'id' => 'requested_by'));?>
				</div>
			</div>
  
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Current_Status</label>
				<div class="col-sm-10">
					<?php echo $this->Form->input('current_status', array(
						'options' => array('Unknown' => '-Select-' , 'Processing' => 'Processing' , 'On Hold' => 'On Hold' , 'Discard' => 'Discard' , 'In QA' => 'In QA' , 'Live' => 'Live' , 'UAT' => 'UAT' , 
						'Roll Back' => 'Roll Back') , 'class'=>'form-control', 'id' => 'current_status' ));?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputParent_id3" class="col-sm-2 control-label">Assign_To</label>
				<div class="col-sm-10">
					<?php echo $this->Form->input('User.User' , array('class'=>'form-control' , 'id' => 'user_id'));?>
				</div>
			</div>



			<div class="form-group">
				<label for="inputUsername3" class="col-sm-2 control-label">Commited_Date</label>
				
				<div class="col-sm-10">
				
					<?php echo $this->Form->input('commited_date' , array('class' => 'form-control' , 'type' => 'text' , 'id' => 'commited_date' ));?>
					
				</div>
			</div>


			<div class="form-group">
				<label for="inputUsername3" class="col-sm-2 control-label">Dev_Start_Date</label>
				
				<div class="col-sm-10">
				
					<?php echo $this->Form->input('dev_start_date' , array('class' => 'form-control' , 'type' => 'text' , 'id' => 'dev_start_date' ));?>
					
				</div>
			</div>


			<div class="form-group">
				<label for="inputUsername3" class="col-sm-2 control-label">Dev_End_Date</label>
				
				<div class="col-sm-10">
				
					<?php echo $this->Form->input('dev_end_date' , array('class' => 'form-control' , 'type' => 'text' , 'id' => 'dev_end_date'));?>
					
				</div>
			</div>



			<div class="form-group">
				<label for="inputDepartment3" class="col-sm-2 control-label">PRD_Status</label>
				<div class="col-sm-10">
					<?php echo $this->Form->input('prd_status' , array(
					'options' => array('Unknown' => '-Select-' , 'No PRD' => 'No PRD' , 'PRD Given' => 'PRD Given' , 'Internal Req' => 'Internal Req') , 'class'=>'form-control', 'id' => 'prd_status'));?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputMobile3" class="col-sm-2 control-label">CodeReview_By</label>
				<div class="col-sm-10">
					<?php echo $this->Form->input('code_review_by',array('class'=>'form-control', 'id' => 'code_review_by'));?>
				</div>
			</div>
 
			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">QA_Status</label>
				<div class="col-sm-10">
					<?php echo $this->Form->input('qa_status', array(
					'options' => array('Unknown' => '-Select-', 'Processing' => 'Processing' , 'On Hold' => 'On Hold' , 'Discard by QA' => 'Discard by QA' , 'In QA' => 'In QA' , 'Live' => 'Live') , 
					'class'=>'form-control', 'id' => 'qa_status' ));?>
				</div>
			</div>

			<div class="form-group">
				<label for="inputComment3" class="col-sm-2 control-label">Comment</label>
				<div class="col-sm-10">
					<?php echo $this->Form->input('comment',array('class'=>'form-control', 'id' => 'comment'));?>
				</div>
			</div>
			
			<div class="form-group">
			
				<div class="col-sm-offset-2 col-sm-10"><table>
			<tr><td>
					<?php echo $this->Form->submit('Create',array('class'=>'btn btn-primary'));?>
					 </td>
				</div>
				<div class="col-sm-offset-2 col-sm-10"><td>
			<a class="btn btn-danger" href="/tms/applications/index">Cancel</a></td></tr>
			</table>
			</div>
				
                        </div>
			
			
				
                       
			
			
		<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>


<script>
  $(function() {
    $( "#req_date" ).datepicker({
      showWeek: true,
      dateFormat : 'yy-mm-dd',
      firstDay: 1
    });
    $( "#commited_date" ).datepicker({
      showWeek: true,
      dateFormat: "yy-mm-dd",
      firstDay: 1
    });
    $( "#dev_start_date" ).datepicker({
      showWeek: true,
      dateFormat: "yy-mm-dd",
      firstDay: 1
    });
    $( "#dev_end_date" ).datepicker({
      showWeek: true,
      dateFormat: "yy-mm-dd",
      firstDay: 1
    });
   
  });
  </script>