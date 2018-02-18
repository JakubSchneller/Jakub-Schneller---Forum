<?php

namespace App\Presenters;

use Nette;
use Nette\Database\Context;
use Nette\Security\User;
use Nette\Security\Identity;

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

    public function renderMyPosts()
    {
        $myUser = $this->user->getIdentity();
        $posts = $this->database->table("posts")->where("post_creator_id", $myUser->user_id)->order('post_id DESC');
        $this->template->posts = $posts;
        $this->template->currentuser = $myUser;
    }

    public function renderUserProfile($userId)
    {
        $users = $this->database->table("users")->get($userId);

        $this->template->users = $users;
        $this->template->userId = $userId;



    }
}