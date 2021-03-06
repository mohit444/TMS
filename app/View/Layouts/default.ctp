<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		TMS
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('base.css' , 'bootstrap.min.css' , 'icon.css' , 'bootstrap-timepicker.min.css' , 'dataTables.bootstrap.min','dataTables' , 'metisMenu.min'));
		echo $this->Js->writeBuffer(array('cache' => TRUE));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		
	?>
	<style>
		body{
			padding-top:90px;
		}
	</style>
	
</head>
<body>
	<?php echo $this->element('navigation')?>
	<div class="container">
		

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		
		<footer>
			<hr>
			<p>Developed by <a href="http://www.one97.com/">One97 Communication Limited</a></p>
		</footer>
		
	</div>
	<?php echo $this->element('sql_dump')?>
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                    responsive: true,
		    "bFilter": false
            });
        });
        </script>
	<?php 
		echo $this->Html->script("jquery");
		echo $this->Html->script("jqueryui/jquery-ui");
		
		echo $this->Html->script("bootstrap-timepicker.min.js");
		echo $this->Html->script('bootstrap.min'); 
		echo $this->Html->script("jquery.min.js");
		echo $this->Html->script("jquery.dataTables");
		echo $this->Html->script("dataTables.bootstrap.min");
		echo $this->Html->script("sb-admin-2");
		echo $this->Html->script("metisMenu.min");

	?>

</body>
</html>
