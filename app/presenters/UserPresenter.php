<?php

namespace App\Presenters;

use Nette;
use App\Forms;
use Nette\Application\UI\Form;
use Nette\Application\UI;
use Nette\Database\Context;
use Nette\Security\Passwords;
use Nette\Security\User;
use Tracy\Debugger;
use App\Model\UserManager;
use Nette\Utils\DateTime;
use Nette\Http\Session;

/**
 * Base presenter for all application presenters.
 */
abstract class UserPresenter extends BasePresenter
{
    private $database;


    public function __construct(Context $database)
    {
        $this->database = $database;
    }

    public function renderDelete()
    {

    }
}