<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');



class UsersController extends AppController{
    public $helpers = array('Js');
    public $components = array('Flash' , 'Session', 'Paginator' , 'RequestHandler');

   /*public $paginate = array(
        'limit' => 15
    );*/

    public function hierarchy(){
        $result = $this->User->children($this->Auth->user('id'));
        $userhierarchy = $this->User->formatTreeList($result, array(
            'spacer' => '->'
        ));

        $this->set(compact('userhierarchy'));

    }

    public function test(){

    }

    public function login(){
        if($this->request->is('post')){
            if($this->Auth->login()){
                $this->Flash->success('login successful');
                $this->redirect('/applications/index');
            }
            else{
                $this->Session->setFlash('invalid user');
            }
        }
    }

    public function logout(){
        $this->Auth->logout();
        $this->redirect('login');
    }

    public function index() {
        if(!empty($this->request->data)){

            $conditions=array('OR'=>array());
            if(!empty($this->request->data['User']['empid'])){
                $conditions['OR'] =am($conditions['OR'],array('User.empid' => $this->request->data['User']['empid']));

            }
            if(!empty($this->request->data['User']['username'])){
                $conditions['OR'] =am($conditions['OR'],array('User.username' => $this->request->data['User']['username']));

            }
            if(!empty($this->request->data['from'])){
                $conditions['OR'] =am($conditions['OR'],array('User.created BETWEEN ? AND ?' => array($this->request->data['from'], $this->request->data['to'])));

            }
             $pn = $this->User->query("select c.username, c.parent_id , p.username from `users` c , `users` p WHERE c.parent_id=p.id");
            $this->set('pn', $pn);
            # echo '<pre>';
            # print_r($pn);
            $this->paginate = array(
                'limit' => 15,
                'conditions' => $conditions
            );
            $this->set('emp', $this->paginate());

        }
        else{
            $this->Paginator->settings = $this->paginate;
            $users = $this->Paginator->paginate('User');
            $pn = $this->User->query("select c.username, c.parent_id , p.username from `users` c , `users` p WHERE c.parent_id=p.id");
            $this->set('pn', $pn);
            # echo '<pre>';
            # print_r($pn);
            $this->set('emp', $users);
            # echo '<pre>';
            # print_r($users);


        }
    }



    public function view(){
        /*$this->Paginator->settings = $this->paginate;
        $users = $this->Paginator->paginate('User');
        $this->set('users', $users);
        #$users=$this->User->find('all');*/

        $conditions = array();
        //Transform POST into GET
       if(($this->request->is('post') || $this->request->is('put')) && isset($this->data['Filter'])){
            $filter_url['controller'] = $this->request->params['controller'];
            $filter_url['action'] = $this->request->params['action'];
            // We need to overwrite the page every time we change the parameters
            $filter_url['page'] = 1;
            // for each filter we will add a GET parameter for the generated url
            foreach($this->data['Filter'] as $name => $value){
                if($value){
                    // You might want to sanitize the $value here
                    // or even do a urlencode to be sure
                    $filter_url[$name] = urlencode($value);
                }
            }

            // now that we have generated an url with GET parameters,
            // we'll redirect to that page
            return $this->redirect($filter_url);
        } else {
            // Inspect all the named parameters to apply the filters
            foreach($this->params['named'] as $param_name => $value){


                // Don't apply the default named parameters used for pagination
                if(!in_array($param_name, array('page','sort','direction','limit'))){
                    // You may use a switch here to make special filters
                    // like "between dates", "greater than", etc
                    if($param_name == "search"){
                        $conditions['OR'] = array(
                            array('User.empid LIKE' => '%' . $value . '%'),
                            array('User.username LIKE' => '%' . $value . '%')
                        );
                    } else {
                        $conditions['User.'.$param_name] = $value;
                    }
                    $this->request->data['Filter'][$param_name] = $value;
                }
            }
        }
        $this->User->recursive = 0;
        $this->paginate = array(
            'limit' => 15,
            'conditions' => $conditions
        );
        $this->set('users', $this->paginate());


        // Pass the search parameter to highlight the text
        $this->set('search', isset($this->params['named']['search']) ? $this->params['named']['search'] : "");
    }


    public function add(){
        if($this->request->is('post')){
            $this->User->create();
            $this->request->data['User']['createdby']=$this->Auth->user('id');

            if($this->User->save($this->request->data)){

                $this->Flash->success('user has been created ');
                $this->redirect("index");
            }

        }
        $parents = $this->User->find('list', array('fields' => array('id' , 'username') , 'conditions' => array('role' => array('EMM' , 'PM' , 'TL'))));
        $this->set('option' , $parents);
        /*echo '<pre>';
        print_r($parents);*/
    }

    public function edit($id = null){
        $data=$this->User->findById($id);

        if($this->request->is(array('post' , 'put'))){
            $this->User->id= $id;
            if($this->User->save($this->request->data)){
                $this->Flash->success('User has been edited');
                $this->redirect("index");
            }
        }
        $parents = $this->User->find('list', array('fields' => array('id' , 'username') , 'conditions' => array('role' => array('EMM' , 'PM' , 'TL'))));
        $this->set('option' , $parents);

        $this->request->data=$data;
    }

    public function delete($id = null){

        if($this->request->is(array('post' , 'put'))){
            $this->User->id= $id;
            $this->request->data['User']['flag_delete']=1;
            if($this->User->save($this->request->data)){
                $this->Flash->success('User has been deleteed');
                $this->redirect("index");
            }
        }

    }

    public function back(){
        $this->redirect($this->referer());
    }


    public function beforeFilter(){
        parent::beforeFilter();
    }

}
?>

