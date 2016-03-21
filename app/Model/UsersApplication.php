<?php
class UsersApplication extends AppModel{
    public function beforeFind($queryData = array()) {
        parent::beforeFind($queryData);
        $user = CakeSession::read("Auth.User");
#echo "Before Condition <br >";print_r($queryData);
        # if($user['role'] == 'PM'){

        # $defaultConditions = array('User.flag_delete' => 0);
        $defaultConditions['OR'] = array(
            array('UsersApplication.user_id' => $user['id'])
            #array('User.id' => $user['id'])
        );
        $queryData['conditions'][] =  $defaultConditions;


        /* }
         elseif($user['role'] == 'TL'){
             $defaultConditions = array('User.flag_delete' => 0);
             $defaultConditions['OR'] = array(
                 array('User.role' => array('SSE','SE','QA')),
                 array('User.id' => $user['id'])
             );
             $queryData['conditions'][] = am($queryData['conditions'], $defaultConditions);

         }
         elseif($user['role'] == 'SE' || $user['role'] == 'SSE' || $user['role'] == 'QA'){
             $defaultConditions = array('User.flag_delete' => 0 , 'User.id' => $user['id']);
             $queryData['conditions'][] =  $defaultConditions;
         }
         elseif($user['role'] == 'EMM'){
             $defaultConditions = array('User.flag_delete' => 0);
             $queryData['conditions'][] =  $defaultConditions;
         }

         #echo "After Condition <br >";print_r($queryData);*/
        return $queryData;
    }
}