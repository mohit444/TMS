<?php
class TasksController extends AppController{
    public $helpers = array('Js');
    public $components = array('Flash' , 'Session', 'Paginator' , 'RequestHandler');

    public function index(){

        if(!empty($this->request->data)){

            $conditions=array('OR'=>array());
            if(!empty($this->request->data['on'])){
                $conditions['OR'] =am($conditions['OR'],array('Task.date' => $this->request->data['on']));

            }
           # if(!empty($this->request->data['username'])){
             #   $conditions['OR'] =am($conditions['OR'],array('User.username' => $this->request->data['username']));

           # }
            if(!empty($this->request->data['from'])){
                $conditions['OR'] =am($conditions['OR'],array('Task.created BETWEEN ? AND ?' => array($this->request->data['from'], $this->request->data['to'])));

            }
            #$assign = $this->Application->User->query("SELECT users.id, users.username,applications.id,applications.name FROM `users`,`applications` WHERE `users`.id=`applications`.assigned_by;");
            #$this->set('assign', $assign);

            $this->paginate = array(
                'limit' => 15,
                'conditions' => $conditions
            );
            $this->set('tasks', $this->paginate());

        }
        else{
            $this->Paginator->settings = $this->paginate;
            $tasks = $this->Paginator->paginate('Task' ,  array('user_id' => $this->Auth->user('id')));
            #$tasks = $this->Task->find('all' , array('conditions' => array('user_id' => $this->Auth->user('id'))));
            $this->set('tasks', $tasks);
            #echo '<pre>';
             #print_r($tasks);
        }


    }

    public function add(){
        if($this->request->is('post')){
            $this->Task->create();
            $this->request->data['Task']['user_id'] = $this->Auth->user('id');

            if($this->Task->save($this->request->data)){
                $this->Flash->success('data has been saved successfully');
                $this->redirect('index');

            }
        }

        $app = $this->Task->Application->find('list' , array('fields' => array('id' , 'name')));
        $this->set('app' , $app);
        #echo '<pre>';
       #print_r($app);


    }

    public function edit($id = null){
        $data=$this->Task->findById($id);
        if($this->request->is(array('post' , 'put'))){
            $this->Task->id= $id;

            if($this->Task->save($this->request->data)){
                $this->Flash->success('Task edited');
                $this->redirect('index');
            }
        }
        $app = $this->Task->Application->find('list' , array('fields' => array('id' , 'name')));
        $this->set('app' , $app);
        $this->request->data=$data;

    }

    public function delete($id= null){
        $this->Task->id= $id;
        if($this->request->is(array('post' , 'put'))){
            if($this->Task->delete()){
                $this->Flash->success('Application has been deleted');
                $this->redirect("index");
            }
        }
    }

    public function beforeFilter(){
        parent::beforeFilter();
    }
}
?>