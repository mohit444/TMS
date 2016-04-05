<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tables</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Applications Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Employee_Id</th>
			    <th >Emp_Name</th>
			    <th>Email</th>
			    <th>Department</th>
			    <th>Role</th>
			    <th>Assigned_By</th>
			    <th>Mobile</th>
			    <th>Created</th>
			    <th>Modified</th>
			    <th>Actions</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $count = 0;
				
				foreach ($emp as $userdata): ?>
			<tr>


			
			    
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
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
</div>

