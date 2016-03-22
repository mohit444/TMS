<?php
class ApplicationsUser extends AppModel{
    public $belongsTo = array('User' , 'Application');
}