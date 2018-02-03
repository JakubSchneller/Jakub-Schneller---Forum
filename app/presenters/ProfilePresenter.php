<?php

namespace App\Presenters;

use Nette;
use Nette\Database\Context;
use Nette\Security\User;

class ProfilePresenter extends \App\Presenters\BasePresenter
{
    private $database;
    private $user;


    public function __construct(Context $database, User $user)
    {
        $this->database = $database;
        $this->user = $user;
    }


    public function renderProfile()
    {
        $myUser = $this->user->getIdentity();
        $this->template->currentUser = $myUser;

    }

    public function renderUserProfile($userId)
    {
        $users = $this->database->table("users")->get($userId);

        $this->template->users = $users;
        $this->template->userId = $userId;



    }
}