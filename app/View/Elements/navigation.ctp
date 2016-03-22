<div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php echo $this->Html->link(__('TASK MANAGEMENT SYSTEM'),'/applications/index',array('class'=>'navbar-brand'));?>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <?php if(!$this->Session->check('Auth.User')):?>
            <li><?php echo $this->Html->link(__('Login'),array('controller'=>'users','action'=>'login'))?></li>
            <?php else: ?>
            

	    <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->Session->read('Auth.User.username');?> <b class="caret"></b></a>
              <ul class="dropdown-menu">

		 <li>
                    <?php echo $this->Html->link(__('Hierarchy'),array('controller'=>'users','action'=>'hierarchy'))?>
                 </li>

		 <li>
                    <?php echo $this->Html->link(__(' Users'),array('controller'=>'users','action'=>'index') , array('class'=>"glyphicon glyphicon-user" , 'title' => 'users'))?>
                 </li>


		 <li>
                    <?php echo $this->Html->link(__('Applications'),array('controller'=>'applications','action'=>'index'))?>
                 </li>

		 <li>
                    <?php echo $this->Html->link(__('Tasks'),array('controller'=>'tasks','action'=>'index'))?>
                 </li>
                 
                 <li>
                    <?php echo $this->Html->link(__(' Logout'),array('controller'=>'users','action'=>'logout') , array('class'=>"glyphicon glyphicon-off" , 'title' => 'logout'))?>
                 </li>
		 <li>
                    <?php echo $this->Html->link(__('test'),array('controller'=>'applications','action'=>'test'))?>
                 </li>
              </ul>
            </li>

            <?php endif;?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
</div>