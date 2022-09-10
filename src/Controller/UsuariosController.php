<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

class UsuariosController extends AppController
{
    public function isAuthorized($user){
        if(isset($user['tipoUsuario']) and $user['tipoUsuario'] === 2){
            if(in_array($this->request->action, ['home', 'view', 'logout'])){
                return true;
            }
        }
        return parent::isAuthorized($user);
    }

    public function beforeFilter(Event $event)
    {
        $current_user = $this->Auth->user();
        $userType = $this->Auth->user('tipoUsuario');
        parent::beforeFilter($event);
        $this->Auth->allow(['logout']);
        if($current_user != null){
            if($userType != 1 && $userType != 2 ){
                $this->render('../Layout/errorPage');
            }
        }
    }

    public function index()
    {
            $this->paginate = [
                'contain' => ['Tipousuario']
            ];
            
            $usuarios = $this->paginate($this->Usuarios->find());
            
            $this->set(compact('usuarios'));
        
    }

    public function view($id)
    {
        if (!$id) {
            throw new NotFoundException(__('Usuario no valido'));
        }
        $Usuario = $this->Usuarios->get($id);
        $this->set(compact('usuario',$usuario));
    }

    public function add()
    {
        $this->loadModel('Clientes');
        $estatus = $this->Usuarios->Estatus->find('list');
        $tipoUsuario = $this->Usuarios->Tipousuario->find('list');
        $clientes = $this->Clientes->find('list');

        $this->set(compact('estatus','tipoUsuario','clientes'));

        $Usuario = $this->Usuarios->newEntity();
        if ($this->request->is('post')) {
            $Usuario = $this->Usuarios->patchEntity($Usuario, $this->request->getData(),['associated' => []]);
            if ($this->Usuarios->save($Usuario)) {
                $this->Flash->success(__('Usuario guardado.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ocurrio un error al tratar de guardar los cambios, intente de nuevo'));
        }
        $this->set('usuario');
    }

    public function login() {
        $this->viewBuilder()->setLayout('login');
        
        if($this->Auth->user()){
            return $this->redirect(['controller' => 'pages', 'action' => 'home']);
            exit();
        }

        if ($this->request->is('post')) {

            if($this->Auth->user()){
                return $this->redirect(['controller' => 'pages', 'action' => 'home']);
                exit();
            }
            else{
                $usuario = $this->Auth->identify();
                if($usuario){
                    $this->Auth->setUser($usuario);
                    return $this->redirect(['controller' => 'pages', 'action' => 'home']);
                }
                $this->Flash->error(__('Usuario o contraseña incorrectos, Intente de nuevo'));
            }
        }
    }
    
    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function edit($id = null)
    {
        $this->loadModel('Clientes');
        $clientes = $this->Clientes->find('list');
        $usuario = $this->Usuarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->getData(),['associated' => []]);
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('El usuario se guardo correctamente.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se puede guardar al usuarios. Por favor , intente de nuevo.'));
        }
        $this->set(compact('usuario','clientes'));
    }
}