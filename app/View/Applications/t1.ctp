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
                                            <th>Application Name</th>
                                            <th>App. Group</th>
                                            <th>App. Type</th>
                                            <th>Operator</th>
                                            <th>App. Assigned To</th>
                                            <th>App. Assigned By</th>
                                            <th>Actions</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($t1 as $tt1) : ?>

                                        <tr class="odd gradeX">
                                            <td><?php echo $tt1['Application']['name']; ?></td>
                                            <td><?php echo $tt1['Application']['app_group']; ?></td>
                                            <td><?php echo $tt1['Application']['app_type']; ?></td>
                                            <td><?php echo $tt1['Application']['operator']; ?></td>
                                            <td>
                                                <?php $i=0;
                                                    while(isset($tt1['User'][$i])) {

                                                        echo $tt1['User'][$i]['username'].' | ';

                                                        $i = $i + 1;
                                                    }

                                                ?>
                                            </td>
                                            <td><?php echo $this->Session->read('Auth.User.username');?></td>
                                            <td>View</td>

                                        </tr>
                                        <?php endforeach;?>
                                        <?php foreach($t2 as $tt2) : ?>

                                        <tr class="odd gradeX">
                                            <td><?php echo $tt2['Application']['name']; ?></td>
                                            <td><?php echo $tt2['Application']['app_group']; ?></td>
                                            <td><?php echo $tt2['Application']['app_type']; ?></td>
                                            <td><?php echo $tt2['Application']['operator']; ?></td>
                                            <td><?php echo $this->Session->read('Auth.User.username');?></td>

                                            <?php 
						
						foreach($assign as $ass) :
								
						if($tt2['Application']['id'] == $ass['applications']['id']) : ?>

						<td><?php echo $ass['users']['username']; ?></td>
					
						<?php endif;
						      endforeach;
						?>
                                            <td>View</td>

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

