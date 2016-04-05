<?php
class ApplicationsController extends AppController{
    public $components = array('Flash' , 'Session' , 'Paginator');

    public function beforeFilter(){
        parent::beforeFilter();
    }

    public function index(){

        if(!empty($this->request->data)){

            $conditions=array('OR'=>array());
            if(!empty($this->request->data['Application']['name'])){
                $conditions['OR'] =am($conditions['OR'],array('Application.name' => $this->request->data['Application']['name']));

            }
            if(!empty($this->request->data['commited_date'])){
                $conditions['OR'] =am($conditions['OR'],array('Application.commited_date' => $this->request->data['commited_date']));

            }
            if(!empty($this->request->data['from'])){
                $conditions['OR'] =am($conditions['OR'],array('Application.created BETWEEN ? AND ?' => array($this->request->data['from'], $this->request->data['to'])));

            }
            $assign = $this->Application->User->query("SELECT users.id, users.username,applications.id,applications.name FROM `users`,`applications` WHERE `users`.id=`applications`.assigned_by;");
            $this->set('assign', $assign);

            $this->paginate = array(
                'limit' => 15,
                'conditions' => $conditions
            );
            $this->set('dataapp', $this->paginate());

        }
        else{
            $this->Paginator->settings = $this->paginate;
            $dataapp = $this->Paginator->paginate('Application');
            $this->set('dataapp' ,$dataapp);
            #echo '<pre>';
            #var_dump($dataapp);
            /*while(isset($dataapp[$i])){

                $assignedname[]=$this->Application->User->find('list' , array('fields' => array('id' , 'username') , 'conditions' => array('User.id' => $dataapp[$i]['Application']['assigned_by'])));
                $this->set('assignedname' ,$assignedname);
                $i = $i + 1;

            }*/
            $assign = $this->Application->User->query("SELECT users.id, users.username,applications.id,applications.name FROM `users`,`applications` WHERE `users`.id=`applications`.assigned_by;");
            $this->set('assign', $assign);
        }

    }

    




	public function test(){
		$user_id = (int)$this->Auth->user('id');
		
		$assign = $this->Application->User->query("SELECT users.id, users.username,applications.id,applications.name FROM `users`,`applications` WHERE `users`.id=`applications`.assigned_by;");
        $this->set('assign', $assign);

		#echo '<pre>';
        #print_r($assign1);
        #echo '</pre>';
		if(!empty($this->request->data)){
			$conditions=array();
			
			if(!empty($this->request->data['Application']['name'])){
			
			
				$testdata = $this->Application->ApplicationsUser->find('all', array(
					#'fields' => array('DISTINCT ApplicationsUser.application_id , ApplicationsUser.id , ApplicationsUser.user_id' ),
					
					#'conditions' => array('Application.name' => $this->request->data['Application']['name']),
					'joins' => array(
									array(
										'table' => 'applications',
										#'alias' => 'Application',
										'type' => 'inner',
											
										'conditions' => array('Application.name' => $this->request->data['Application']['name'])
									)
						),
					'conditions' => array('ApplicationsUser.user_id' => $user_id)
							
				));


		
				
			
			
			}


			if(!empty($this->request->data['commited_date'])){
			
			
				$testdata = $this->Application->ApplicationsUser->find('all', array(
					
					'conditions' => array('ApplicationsUser.user_id' => $user_id),
				
					#'conditions' => array('Application.name' => $this->request->data['Application']['name']),
					'joins' => array(
									array(
										'table' => 'applications',
										#'alias' => 'Application',
										'type' => 'inner',
											
										'conditions' => array('Application.commited_date' => $this->request->data['commited_date'])
										
									)
					)
				));
			
			
			}

			$this->set('testdata' , $testdata);
			echo "<pre>";
			print_r($testdata);
			echo "</pre>";

			
			
		}
		else{
            $testdata=array('OR'=>array());
			$testdata[] = am($this->Paginator->paginate('ApplicationsUser' , array('ApplicationsUser.user_id' => $user_id)),
                $this->Paginator->paginate('Application' , array('Application.assigned_by' => $user_id)));



            $this->set('testdata' , $testdata);

           ## echo "<pre>";
			#print_r($testdata);
            #echo "</pre>";
		}
		
	}


    public function add(){
        $this->loadModel('Assignment');
        if($this->request->is('post')){
            $this->Application->Create();
             $this->request->data['Application']['assigned_by']= $this->Auth->user('id');

            if($savedata = $this->Application->save($this->request->data)){
              #echo '<pre>';
                #print_r($savedata);
               # echo '</pre>';

                $this->request->data['Assignment']['user_id']=implode("," , $this->data['User']['User']);
                $this->request->data['Assignment']['application_id']=$this->Application->id;
                $this->request->data['Assignment']['assigned_by']=$this->Auth->user('id');
                $this->Assignment->save($this->request->data);

                $this->Flash->success('Application created');
                $this->redirect('index');
            }
        }
        $users = $this->Application->User->find('list',array('fields'=>array('id','username')));
        $this->set(compact('users'));
    }

    public function view($id = null){
        $singleapp = $this->Application->find('all' , array('conditions' => array('id' => $id)));
        $this->set('singleapp' , $singleapp);

    }

    public function edit($id = null){
        $data=$this->Application->findById($id);
        if($this->request->is(array('post' , 'put'))){
            $this->Application->id= $id;
            $this->request->data['Application']['assigned_by']= $this->Auth->user('id');
           # $this->Application->Create();
            if($this->Application->save($this->request->data)){
                $this->Flash->success('Application edited');
                $this->redirect('index');
            }
        }
        $users = $this->Application->User->find('list',array('fields'=>array('id','username')));
        $this->set(compact('users'));
        $this->request->data=$data;
    }

    public function delete($id= null){
        $this->Application->id= $id;
        if($this->request->is(array('post' , 'put'))){
            if($this->Application->delete()){
                $this->Flash->success('Application has been deleted');
                $this->redirect("index");
            }
        }
    }




    public function show(){
        if($this->Auth->user('role') == 'EMM' || $this->Auth->user('role') == 'PM' || $this->Auth->user('role') == 'TL'){
            if(!empty($this->request->data)){

                $conditions=array('OR'=>array());
                if(!empty($this->request->data['Application']['name'])){
                    $conditions['OR'] =am($conditions['OR'],array('Application.name' => $this->request->data['Application']['name']));

                }
                if(!empty($this->request->data['username'])){
                    $conditions['OR'] =am($conditions['OR'],array('User.username' => $this->request->data['username']));

                }
                if(!empty($this->request->data['from'])){
                    $conditions['OR'] =am($conditions['OR'],array('Application.created BETWEEN ? AND ?' => array($this->request->data['from'], $this->request->data['to'])));

                }
                $assign = $this->Application->User->query("SELECT users.id, users.username,applications.id,applications.name FROM `users`,`applications` WHERE `users`.id=`applications`.assigned_by;");
                $this->set('assign', $assign);

                $this->paginate = array(
                    'limit' => 15,
                    'conditions' => $conditions
                );
                $this->set('dataapp', $this->paginate());

            }
            else{
                $this->Paginator->settings = $this->paginate;
                $dataapp = $this->Paginator->paginate('Application');
                $this->set('dataapp' ,$dataapp);
#echo '<pre>';
 #               print_r($dataapp);
  #              echo '</pre>';
                /*while(isset($dataapp[$i])){

                    $assignedname[]=$this->Application->User->find('list' , array('fields' => array('id' , 'username') , 'conditions' => array('User.id' => $dataapp[$i]['Application']['assigned_by'])));
                    $this->set('assignedname' ,$assignedname);
                    $i = $i + 1;

                }*/
                $assign = $this->Application->User->query("SELECT users.id, users.username,applications.id,applications.name FROM `users`,`applications` WHERE `users`.id=`applications`.assigned_by;");
                $this->set('assign', $assign);
            }





            #echo '<pre>';
            #print_r($assign);
            #print_r($dataapp);
        }

        else{
            echo 'this page not for you !!';
        }

    }

	public function test1(){
		$user_id = (int)$this->Auth->user('id');
        if(!empty($this->request->data)){
            $conditions=array();
            if(!empty($this->request->data['Application']['name'])){
                $conditions  =am($conditions,array('Application.name' => $this->request->data['Application']['name']));

            }
            if(!empty($this->request->data['commited_date'])){
                $conditions  =am($conditions ,array('Application.commited_date' => $this->request->data['commited_date']));

            }
            if(!empty($this->request->data['from'])){
                $conditions  =am($conditions ,array('Application.created BETWEEN ? AND ?' => array($this->request->data['from'], $this->request->data['to'])));

            }
            $assign = $this->Application->User->query("SELECT users.id, users.username,applications.id,applications.name FROM `users`,`applications` WHERE `users`.id=`applications`.assigned_by;");
            $this->set('assign', $assign);

            $this->paginate = array(
                'limit' => 15,
                'conditions' => $conditions
            );
            $this->set('testdata', $this->paginate());
 			$data = $this->Application->find('all',array(
				'contain' => array(
							'ApplicationsUser' => array(
								'conditions' => array(
									'user_id' => (int)$this->Auth->user('id')
								),
								'recursive'=>-1
							)
						),
					"conditions"=>$conditions, 

					)
			);







			echo "<pre>";
			print_r($data);
            echo "</pre>";
        }
        else{
            $this->Paginator->settings = $this->paginate;
            $testdata= $this->Paginator->paginate('ApplicationsUser' );

            $this->set('testdata' , $testdata);
            #echo '<pre>';
            #print_r($testdata);

            $assign = $this->Application->User->query("SELECT users.id, users.username,applications.id,applications.name FROM `users`,`applications` WHERE `users`.id=`applications`.assigned_by;");
            $this->set('assign', $assign);
        }


		$testdata = $this->Application->find('all', array(
				'conditions' => array(
					'Application.name' => $this->request->data['Application']['name']
					
					),
				'contain' => array(
					'ApplicationsUser' => array(
						'conditions' => array('ApplicationsUser.user_id' => $user_id)
					)
					
				),
				'fields' => '',
				'recursive' => -1
			));
$testdata = $this->Application->ApplicationsUser->find('all', array(
				'conditions' => array(
					
					'ApplicationsUser.user_id' => $user_id
					),
				'contain' => array(
					'Application' => array(
						'conditions' => array('Application.name' => $this->request->data['Application']['name'])
						
					)
				),
				'fields' => '',
				'recursive' => -1
			));


	
	 }

    public function t1(){
        $user_id = (int)$this->Auth->user('id');
        $assign = $this->Application->User->query("SELECT users.id, users.username,applications.id,applications.name FROM `users`,`applications` WHERE `users`.id=`applications`.assigned_by;");
        $this->set('assign', $assign);

        #$assign = $this->Application->query("SELECT applications.id,applications.name FROM `applications`
        #                                      WHERE `applications`.assigned_by=$user_id;");
        $t1 = $this->Application->find('all' , array('conditions' =>array('Application.assigned_by' => $user_id)));
        $t2 = $this->Application->ApplicationsUser->find('all' , array('conditions' =>array('Applicationsuser.user_id' => $user_id)));
        $this->set('t1', $t1);
        $this->set('t2', $t2);
        #echo '<pre>';
        #print_r($assign);
        #print_r($t2);
        #echo '</pre>';
    }




}
?>