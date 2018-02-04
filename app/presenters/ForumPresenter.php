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
        $topicsArray = [];

        $topics = $this->database->table("topics");

        foreach ($topics as $iTopic) {
            $topicsArray[] = [
                'db' => $iTopic,
                'postsCount' => $this->database->table("posts")->where("subcategory_id = ? AND category_id = ?", $iTopic->subcategory_id, $iTopic->category_id)->count(),
                'lastPost' => $this->database->table("posts")->where("subcategory_id = ? AND category_id = ?", $iTopic->subcategory_id, $iTopic->category_id)->order('post_id DESC')->fetch()
            ];


        }


        $this->template->topics = $topicsArray;

        $users = $this->database->table("users");
        $this->template->users = $users;

    }
    public function renderPost($postId, $categoryId, $subcategoryId)
    {
        $commentsArray = [];

        $post = $this->database->table("posts")->get($postId);
        $this->template->categoryId = $categoryId;
        $this->template->subcategoryId = $subcategoryId;
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

    public function renderPosts($categoryId, $subcategoryId)
    {
        $posts = $this->database->table("posts");
        $this->template->posts = $posts;

        $this->template->categoryId = $categoryId;
        $this->template->subcategoryId = $subcategoryId;


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


}