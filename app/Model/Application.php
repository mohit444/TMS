<?php
class Application extends AppModel
{
    public $hasAndBelongsToMany = array('User');
	
    public $hasMany = array(
		'Task', 
		'ApplicationsUser' 
	);
	public $actsAs = array('Containable');

	



}
?>