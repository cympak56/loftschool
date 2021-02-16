<?php

namespace App\Controller;

use App\Model\User as UserModel;
use Base\AbstractController;

class User extends AbstractController
{
    public function loginAction()
    {
        $email = trim($_POST['email']);
        
        if ($email) {
            $password = $_POST['password'];
            $user = UserModel::getByEmail($email);

            if (!$user) {
                $this->view->assign('error', 'Неверный логин и пароль');
            }
            
            if ($user) {
                if ($user->password === UserModel::getPasswordHash($password)) {
                    $_SESSION['id'] = $user->user_id;
                    $this->redirect('/blog/index');
                } else {
					$this->view->assign('error', 'Неверный логин и пароль');
                }
            }
        } else {
            $this->view->assign('error', 'Неверный логин и пароль');
        }
        
        return $this->view->renderTwig('User/register.twig', [
            'user' => UserModel::getById((int)$_GET['id'])
        ]);
    }
    
    public function registerAction()
    {
        $success = true;
        if (isset($_POST)) {
            $name = (isset($_POST['name'])) ? trim($_POST['name']) : '';
            $email = (isset($_POST['email'])) ? trim($_POST['email']) : '';
            $password = (isset($_POST['password'])) ? trim($_POST['password']) : '';
            $password_repeat = (isset($_POST['password_repeat'])) ? trim($_POST['password_repeat']) : '';
            
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
            
            if ($success) {
                $user = new UserModel([
					'name' => $name,
					'email' => $email,
					'password' => UserModel::getPasswordHash($password)
				]);
                
                $user->save();
                
                $_SESSION['id'] = $user->getId();
                $this->getUser($user);
                
                $this->redirect('/blog/index');
            }
        }
        
        return $this->view->renderTwig('User/register.twig', [
            'user' => UserModel::getById((int)$_GET['id'])
        ]);
    }
    
    public function profileAction()
    {
        return $this->view->renderTwig('User/profile.twig', [
            'user' => UserModel::getById((int)$_GET['id'])
        ]);
        
    }
    
    public function logoutAction()
    {
        session_destroy();
        
        $this->redirect('/user/login');
        
    }
}