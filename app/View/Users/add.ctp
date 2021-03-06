

<div class="row">
	<div class="col-lg-6 col-lg-offset-0">
		<div style="float:left;">
			<a class="btn btn-primary" style=" padding: 1px 15px 3px 2px;" onClick="history.go(-1);"><span class="glyphicon glyphicon-arrow-left text-primary" style="padding:8px; background:#ffffff; margin-right:4px;">
			</span>Back</a>
		</div>
	</div>
</div>

<div class="row">





	<div class="col-lg-8 col-lg-offset-2">


		

		<h2>Create User</h2>

		<div class="well">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->Form->create('User' , array('class' => 'form-horizontal' , 'inputDefaults' => array('label' => false))); ?>
			<div class="form-group">
				<label for="inputEmpid3" class="col-sm-2 control-label">EmployeeId</label>
				<div class="col-sm-10">
					<?php echo $this->Form->input('empid' , array('class' => 'form-control', 'id' => 'empid'));?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputUsername3" class="col-sm-2 control-label">Username</label>
				<div class="col-sm-10">
					<?php echo $this->Form->input('username' , array('class' => 'form-control', 'id' => 'username'));?>
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
				<div class="col-sm-10">
					<?php echo $this->Form->input('email' , array('class' => 'form-control', 'id' => 'email'));?>
				</div>
			</div>

			<div class="form-group">
				<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
				<div class="col-sm-10">
					<?php echo $this->Form->input('password',array('class'=>'form-control', 'id' => 'password'));?>
				</div>
			</div>

			<div class="form-group">
				
				
				<label for="inputPassword3" class="col-sm-2 control-label">Role</label>
				
				<div class="col-md-10">
					<?php echo $this->Form->input('role', array(
						'options' => array('PM' => 'PM' , 'TL' => 'TL' , 'SSE' => 'SSE' , 'SE' => 'SE' , 'QA' => 'QA') , 'class'=>'form-control', 'id' => 'role' , 'empty' => 'Select Option'));?>
				
				</div>
			</div>









			<div class="form-group">
				<label for="inputDepartment3" class="col-sm-2 control-label">Department</label>
				<div class="col-sm-10">
					<?php echo $this->Form->input('dept_name' , array(
					'options' => array('Telco' => 'Telco' , 'Enterprises' => 'Enterprises' , 'Sms' => 'Sms') , 'class'=>'form-control', 'id' => 'dept_name' , 'empty' => 'Select Option'));?>
				</div>
			</div>

			<div class="form-group">
				<label for="inputParent_id3" class="col-sm-2 control-label">Assigned_by</label>
				<div class="col-sm-10">
					<?php echo $this->Form->input('parent_id' , array('type' => 'select' , 'options' => $option , 'class'=>'form-control', 'id' => 'parent_id' ));?>
				</div>
			</div>

			<div class="form-group">
				<label for="inputMobile3" class="col-sm-2 control-label">Mobile</label>
				<div class="col-sm-10">
					<?php echo $this->Form->input('mobile',array('class'=>'form-control', 'id' => 'mobile'));?>
				</div>
			</div>

			<div class="form-group">
			
				<div class="col-sm-offset-2 col-sm-10"><table>
			<tr><td>
					<?php echo $this->Form->submit('Create',array('class'=>'btn btn-primary'));?>
					 </td>
				</div>
				<div class="col-sm-offset-2 col-sm-10"><td>
			<a class="btn btn-danger" href="/tms/users/index">Cancel</a></td></tr>
			</table>
			</div>
			</div>
		<?php echo $this->Form->end(); ?>
		</div>
	<div>
</div>
