<?php

namespace App\Presenters;

use Nette;
use Tracy\Debugger;
use Nette\Database\Context;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{
    private $database;


    public function __construct(Context $database)
    {
        $this->database = $database;
    }

    public function beforeRender()
    {
        $user = $this->getUser();
        if ($user->isLoggedIn())
        {
            $this->template->loggedin_name = $user->getIdentity()->user_name;
            $this->template->loggedin_image = $user->getIdentity()->image;
            $this->template->loggedin_role = $user->getIdentity()->role;
        }

    }
}