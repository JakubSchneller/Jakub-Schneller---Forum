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

class ForumPresenter extends BasePresenter
{
    private $database;

    public function __construct(Context $database)
    {
        $this->database = $database;
    }

    public function renderCategories()
    {
        $categoriesArray = [];
        $categories = $this->database->table("categories");

        foreach ($categories as $iCategory) {
            $categoriesArray[$iCategory->id] = [
                'db' => $iCategory,
                'topics' => []
            ];

            $topics = $this->database->table('topics')->where("category_id", $iCategory->id);

            foreach ($topics as $iTopic) {


                $tempArray = [
                    'db' => $iTopic,
                    'postsCount' => $this->database->table("posts")->where("topic_id", $iTopic->topic_id)->count(),
                    'lastPost' => $this->database->table("posts")->where("topic_id", $iTopic->topic_id)->order('post_id DESC')->fetch(),
                    'ageText' => ""
                ];

                if ($tempArray['lastPost']) {
                    $now = new DateTime();
                    $age = $now->diff($tempArray['lastPost']->post_date);
                    $ageText = "";
                    if ($age->y > 0) {
                        $ageText = " před " . $age->y . " lety";
                    } else if ($age->m > 0) {
                        $ageText = " před " . $age->m . " měsíci";
                    } else if ($age->d > 0) {
                        $ageText = " před " . $age->d . " dny";
                    } else if ($age->h > 0) {
                        $ageText = " před " . $age->h . " hodinami";
                    } else if ($age->i > 0) {
                        $ageText = " před " . $age->i . " minutami";
                    } else {
                        $ageText = " právě nyní";
                    }

                    $tempArray['ageText'] = $ageText;
                }

                $categoriesArray[$iCategory->id]['topics'][] = $tempArray;
            }
        }


        $users = $this->database->table("users");
        $this->template->users = $users;
        $this->template->categories = $categoriesArray;

    }
    public function renderPost($postId, $categoryId)
    {
        $commentsArray = [];

        $post = $this->database->table("posts")->get($postId);
        $this->template->categoryId = $categoryId;
        $users = $this->database->table("users");
        $this->template->users = $users;
        if ($post)
        {
            $this->template->post = $post;
            $this->template->postId = $postId;
            $comments = $this->database->table("comments")->where('post_id', $post->post_id);

            foreach ($comments as $comment) {
                $now = new DateTime();
                $age = $now->diff($comment->date_created);
                $ageText = "";

                if ($age->y > 0) {
                    $ageText = "před " . $age->y . " lety";
                }
                else if ($age->m > 0) {
                    $ageText = "před " . $age->m . " měsíci";
                }
                else if ($age->d > 0) {
                    $ageText = "před " . $age->d . " dny";
                }
                else if ($age->h > 0) {
                    $ageText = "před " . $age->h . " hodinami";
                }
                else if ($age->i > 0) {
                    $ageText = "před " . $age->i . " minutami";
                }
                else{
                    $ageText = "právě nyní";
                }

                $commentsArray[] = [
                    'dbrow' => $comment,
                    'age' => $ageText
                ];
            }

            //Debugger::dump($age);
            // die();
            $this->template->comments = $commentsArray;


        } else {}

        $now = new DateTime();
        //$rozdil = $now->diff($comments date_created);

        //$this->template->rozdil = $rozdil;



    }

    public function renderPosts($categoryId, $topicId)
    {
        $posts = $this->database->table("posts")->where("topic_id", $topicId)->order('post_id DESC');
        $topic = $this->database->table("topics")->where("topic_id", $topicId)->fetch();
        $category = $this->database->table("categories")->where("id", $topic->category_id)->fetch();
        $this->template->posts = $posts;

        $this->template->categoryId = $categoryId;
        $this->template->topicId = $topicId;
        $this->template->topic = $topic;
        $this->template->category = $category;


    }


    protected function createComponentCommenting()
    {
        $form = new Form;
        $form->addText("content")
            ->setRequired("Vyplňte prosím obsah komentáře");
        $form->addSubmit("submit");
        $form->onSuccess[] = [$this, 'commentingSuccess'];
        return $form;
    }

    public function commentingSuccess($form, $values)
    {
        $this->database->table('comments')->insert([
            'post_id' => $this->getParameter('postId'),
            'content' => $values->content,
            'date_created' => new DateTime(),
            'creator_name' => $this->getUser()->getIdentity()->user_name,
            'creator_id'   => $this->getUser()->getIdentity()->user_id,
            'creator_image' => $this->getUser()->getIdentity()->image
        ]);
        $this->redirect('this');
    }

    public function renderAdmin()
    {
        $user = $this->getUser();
        if ($user->isLoggedIn())
        {
            $userId = $this->getUser()->getId();
            $currentUser = $this->database->table("users")->where("user_id", $userId)->fetch();
            if ($currentUser->role == "admin" || $currentUser->role == "owner")
            {
                $accounts = $this->database->table("users");
                $owners = $this->database->table("users")->where("role", "owner");
                $admins = $this->database->table("users")->where("role", "admin");
                $registered = $this->database->table("users")->where("role", "user");

                foreach ($accounts as $iAccount) {
                    $accountsArray = [
                        'accounts' => $iAccount,
                        'owners' => $owners,
                        'admins' => $admins,
                        'registered' => $registered
                    ];
                    $this->template->accounts = $accountsArray;
                }
            }
            else
            {
                $this->flashMessage('Na tuhle stránku má přístup jen vlastník nebo admin', 'warning');
                $this->redirect("Homepage:default");

            }
        }
        else
        {
            $this->flashMessage('Na tuhle stránku má přístup jen vlastník nebo admin', 'warning');
            $this->redirect("Homepage:default");
        }

    }


}