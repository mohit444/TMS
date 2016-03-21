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

    }

    public function add(){
        if($this->request->is('post')){
            $this->Application->Create();
            $this->request->data['Application']['assigned_by']= $this->Auth->user('id');
            if($this->Application->save($this->request->data)){
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


}
?>