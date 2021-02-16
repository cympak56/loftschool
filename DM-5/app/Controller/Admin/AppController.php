<?php

namespace App\Controller\Admin;

use Base\AbstractController;

class AppController extends AbstractController
{
    public function __construct()
    {
        $user = $this->getUser();
        if (!$user->admin($user->user_id)) {
            $this->redirect('/blog');
        }
    }
}