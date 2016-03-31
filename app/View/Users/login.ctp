<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $this->Session->flash(); ?>
                        <?php echo $this->Form->create('User',array('class'=>'form-horizontal','inputDefaults'=>array('label'=>false)));?>

                                <div class="form-group">
                                    <div class="col-md-12">
                                    <?php echo $this->Form->input('username',array('class'=>'form-control' , 'placeholder'=>"Username" , 'autofocus'=>'autofocus'));?>
                                </div></div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                    <?php echo $this->Form->input('password',array('class'=>'form-control' , 'placeholder'=>"Password"));?>
                                </div></div>

                                <!-- Change this to a button or input when using this as a form -->
                                <?php echo $this->Form->submit('Login',array('class'=>'btn btn-success btn-block'))?>

                        <?php echo $this->Form->end();?>
                    </div>
                </div>
            </div>
        </div>
    </div>



