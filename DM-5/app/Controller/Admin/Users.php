<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use App\Model\User as UserModel;

class Users extends AppController
{
    public function indexAction()
    {
        return $this->view->renderTwig('Admin/index.twig', [
            'users'  => UserModel::getList()
        ]);
    }
    
    public function addAction()
    {
        $success = true;
        if (isset($_POST) && !empty($_POST)) {
            $name = (isset($_POST['name'])) ? trim($_POST['name']) : '';
            $email = (isset($_POST['email'])) ? trim($_POST['email']) : '';
            $password = (isset($_POST['password'])) ? trim($_POST['password']) : '';
            $password_repeat = (isset($_POST['password_repeat'])) ? trim($_POST['password_repeat']) : '';
            $role = $_POST['role'];
    
            if (!$name) {
                $this->view->assign('error', 'Имя не может быть пустым');
                $success = false;
            }
    
            if (!$email) {
                $this->view->assign('error', 'Емайл не может быть пустым');
                $success = false;
            }
            
            switch ($password) {
                case !$password:
                    $this->view->assign('error', 'Пароль не может быть пустым');
                    $success = false;
                    break;
                case strlen($password) < 5:
                    $this->view->assign('error', 'длина пароля (не менее 4х символов)');
                    $success = false;
                    break;
                case $password !== $password_repeat:
                    $this->view->assign('error', 'Пароли не совпадают');
                    $success = false;
                    break;
            }
    
            $user = UserModel::getByEmail($email);
    
            if ($user) {
                $this->view->assign('error', 'Пользователь с таким емайлом уже существует');
                $success = false;
            }
    
            if(!empty($_FILES['image']['tmp_name'])){
                $image = $this->setImage($_FILES['image'],200);
            }else{
                $image = null;
            }
            
            if ($success) {
                $user = new UserModel([
                    'name' => $name,
                    'email' => $email,
                    'role' => $role,
                    'avatar' => $image,
                    'password' => UserModel::getPasswordHash($password)
                ]);
                
                $user->save();
                $this->redirect('/admin/index');
            }
        }
        
        return $this->view->renderTwig('Admin/add.twig');
    }
    
    public function editAction()
    {
        $user = UserModel::getById($_GET['id']);
        $success = true;
        if (isset($_POST) && !empty($_POST)) {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $role = $_POST['role'];
            $password = $_POST['password'];
            $password_repeat = trim($_POST['password_repeat']);

            if (!$name) {
                $this->view->assign('error', 'Имя не может быть пустым');
                $success = false;
            }
    
            if (!$email) {
                $email = $user->email;
            }
    
            if(empty($password)){
                $password = $user->password;
            }else {
                switch ($password) {
                    case !$password:
                        $this->view->assign('error', 'Пароль не может быть пустым');
                        $success = false;
                        break;
                    case strlen($password) < 5:
                        $this->view->assign('error', 'длина пароля (не менее 4х символов)');
                        $success = false;
                        break;
                    case $password !== $password_repeat:
                        $this->view->assign('error', 'Пароли не совпадают');
                        $success = false;
                        break;
                }
                
                $password = UserModel::getPasswordHash($password);
            }
    
            if(!empty($_FILES['image']['tmp_name'])){
                $image = $this->setImage($_FILES['image'],200);
            }else{
                $image = $user->avatar;
            }
    
            if ($success) {
                $user->name = $name;
                $user->email = $email;
                $user->role = $role;
                $user->avatar = $image;
                $user->password = $password;
        
                $user->save();
            }
        }
        
        return $this->view->renderTwig('Admin/edit.twig', [
            'user'  => $user
        ]);
    }
    
    public function deleteAction()
    {
        UserModel::getDelete((int)$_GET['id']);
        $this->redirect('/admin/index');
    }
    
    public function imageAction()
    {
        header('Content-type: image/png');
        include '..\images\\' . $_GET['image'];
    }
}