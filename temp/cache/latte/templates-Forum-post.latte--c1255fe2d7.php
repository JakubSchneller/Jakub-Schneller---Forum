<?php
// source: /Applications/MAMP/htdocs/test/app/presenters/templates/Forum/post.latte

use Latte\Runtime as LR;

class Templatec1255fe2d7 extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
	];

	public $blockTypes = [
		'content' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['comment'])) trigger_error('Variable $comment overwritten in foreach on line 92');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
        <style>
            html {
                position: relative;
                min-height: 100%;
            }
            body {
                margin-bottom: 10%;
            }
            .reviews {
                color: #555;
                font-weight: bold;
                margin: 8px auto 8px;
            }
            .media .media-object-owner {
                max-width: 100px;
                border: 3px solid rgb(41, 5, 250);
            }
            .media .media-object-admin {
                max-width: 100px;
                border: 3px solid red;
            }
            .media .media-object-user {
                max-width: 100px;
                border: 3px solid rgba(0, 0, 0, 0.46);
            }
            .media-body { position: relative; }
            .media-date {
                position: absolute;
                right: 25px;
                top: 25px;
            }
            .media-date li { padding: 0; }
            .media-date li:first-child:before { content: ''; }
            .media-date li:before {
                content: '.';
                margin-left: -2px;
                margin-right: 2px;
            }
            .media-comment { margin-bottom: 10px; }
            .btn-circle span { padding-right: 6px; }
            .tab-content {
                padding: 50px 15px 0px;
                padding-bottom: 50px;
                border: 1px solid #ddd;
                border-top: 0;
                border-bottom-right-radius: 4px;
                border-bottom-left-radius: 4px;
            }
            .custom-input-file:hover .uploadPhoto { display: block; }
        </style>
    <div class="container">

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-12">
                <!-- Title -->
                <h1 class="mt-4"><?php echo LR\Filters::escapeHtmlText($post->post_name) /* line 59 */ ?></h1>

                <!-- Author -->
                <p class="lead">
                    <?php echo LR\Filters::escapeHtmlText($post->post_description) /* line 63 */ ?>

                    <br>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><strong>Vytvořil/a
                        <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Profile:userprofile", ['userId' => $post->post_creator_id])) ?>"><?php
		echo LR\Filters::escapeHtmlText($post->post_creator) /* line 71 */ ?></a> <?php echo LR\Filters::escapeHtmlText($post->post_date) /* line 71 */ ?></p></strong>

                <hr>

                <!-- Post Content -->
                <font size="4"><?php echo LR\Filters::escapeHtmlText($post->post_content) /* line 76 */ ?></font>
                <br>
                <br>
                <br>
            </div>

                <!-- Komentáře-->
            <div class="col-lg-12" id="logout">
                <div class="comment-tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#comments-logout" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Komentáře</h4></a></li>
                        <li><a href="#add-comment" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Přidat komentář</h4></a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="comments-logout">
                            <ul class="media-list">
<?php
		$iterations = 0;
		foreach ($comments as $comment) {
?>
                                    <li class="media">
                                        <div class="pull-left">
<?php
			if ($comment['dbrow']->role == 'owner') {
				?>                                            <img class="media-object-owner img-circle" src="../<?php
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($comment['dbrow']->creator_image)) /* line 96 */ ?>" alt="profile">
<?php
			}
			elseif ($comment['dbrow']->role == 'admin') {
				?>                                            <img class="media-object-admin img-circle" src="../<?php
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($comment['dbrow']->creator_image)) /* line 98 */ ?>" alt="profile">
<?php
			}
			else {
				?>                                            <img class="media-object-user img-circle" src="../<?php
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($comment['dbrow']->creator_image)) /* line 100 */ ?>" alt="profile">
<?php
			}
?>
                                            <div style="text-align: center">
<?php
			if ($comment['dbrow']->role == 'owner') {
				?>                                                    <a style="color: rgb(41, 5, 250); text-transform: uppercase;"><?php
				echo LR\Filters::escapeHtmlText($comment['dbrow']->role) /* line 104 */ ?></a>
<?php
			}
			elseif ($comment['dbrow']->role == 'admin') {
				?>                                                    <a style="color: red; text-transform: uppercase;"><?php
				echo LR\Filters::escapeHtmlText($comment['dbrow']->role) /* line 106 */ ?></a>
<?php
			}
			else {
				?>                                                    <a style="color: #555555; text-transform: uppercase;"><?php
				echo LR\Filters::escapeHtmlText($comment['dbrow']->role) /* line 108 */ ?></a>
<?php
			}
?>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="well well-lg">
<?php
			if ($user->isInRole('admin') || $user->isInRole('owner')) {
				if ($comment['dbrow']->role == 'owner') {
					?>                                                        <h5 class="text-uppercase reviews"><a style="color: rgb(41, 5, 250)" href="<?php
					echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Profile:userprofile", ['userId' => $comment['dbrow']->creator_id])) ?>"><?php
					echo LR\Filters::escapeHtmlText($comment['dbrow']->creator_name) /* line 116 */ ?></a>
<?php
				}
				elseif ($comment['dbrow']->role == 'admin') {
					?>                                                        <h5 class="text-uppercase reviews"><a style="color: red" href="<?php
					echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Profile:userprofile", ['userId' => $comment['dbrow']->creator_id])) ?>"><?php
					echo LR\Filters::escapeHtmlText($comment['dbrow']->creator_name) /* line 118 */ ?></a>
<?php
				}
				else {
					?>                                                        <h5 class="text-uppercase reviews"><a style="color: #555555" href="<?php
					echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Profile:userprofile", ['userId' => $comment['dbrow']->creator_id])) ?>"><?php
					echo LR\Filters::escapeHtmlText($comment['dbrow']->creator_name) /* line 120 */ ?></a>
<?php
				}
				?>                                                    <a onClick="return confirm('Opravdu smazat komentář?');" type="button" class="btn-remove btn btn-danger btn-xs" href="<?php
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("deleteComment!", ['commentId' => $comment['dbrow']->id])) ?>"><span class="glyphicon glyphicon-remove"></span></a></h5>
<?php
			}
			else {
				if ($comment['dbrow']->role == 'owner') {
					?>                                                        <h5 class="text-uppercase reviews"><a style="color: rgb(41, 5, 250)" href="<?php
					echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Profile:userprofile", ['userId' => $comment['dbrow']->creator_id])) ?>"><?php
					echo LR\Filters::escapeHtmlText($comment['dbrow']->creator_name) /* line 125 */ ?></a></h5>
<?php
				}
				elseif ($comment['dbrow']->role == 'admin') {
					?>                                                        <h5 class="text-uppercase reviews"><a style="color: red" href="<?php
					echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Profile:userprofile", ['userId' => $comment['dbrow']->creator_id])) ?>"><?php
					echo LR\Filters::escapeHtmlText($comment['dbrow']->creator_name) /* line 127 */ ?></a></h5>
<?php
				}
				else {
					?>                                                        <h5 class="text-uppercase reviews"><a style="color: #555555" href="<?php
					echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Profile:userprofile", ['userId' => $comment['dbrow']->creator_id])) ?>"><?php
					echo LR\Filters::escapeHtmlText($comment['dbrow']->creator_name) /* line 129 */ ?></a></h5>
<?php
				}
			}
?>
                                                <ul class="media-date reviews list-inline">
                                                    <?php echo LR\Filters::escapeHtmlText($comment['age']) /* line 133 */ ?>

                                                </ul>
                                                <p class="media-comment">
                                                    <a></a><?php echo LR\Filters::escapeHtmlText($comment['dbrow']->content) /* line 136 */ ?>

                                                </p>
                                            </div>
                                        </div>
                                    </li>
<?php
			$iterations++;
		}
?>
                            </ul>
                        </div>
                        <div class="tab-pane" id="add-comment">
<?php
		if ($user->isLoggedIn()) {
			$form = $_form = $this->global->formsStack[] = $this->global->uiControl["commenting"];
			?>                                <form<?php
			echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
			), false) ?>>
                                    <label for="email" class="col-sm-1 control-label">Komentář</label>
                                    <div class="col-sm-11">
                                    <textarea class="form-control" rows="5" placeholder="Obsah komentáře"<?php
			$_input = end($this->global->formsStack)["content"];
			echo $_input->getControlPart()->addAttributes(array (
			'class' => NULL,
			'rows' => NULL,
			'placeholder' => NULL,
			))->attributes() ?>><?php echo $_input->getControl()->getHtml() ?></textarea><br>
                                    </div>
                                    <div style="text-align: center">
                                        <button class="btn btn-success btn-circle text-uppercase"<?php
			$_input = end($this->global->formsStack)["submit"];
			echo $_input->getControlPart()->addAttributes(array (
			'class' => NULL,
			))->attributes() ?>><i class="fa fa-share"></i>Zveřejnit</button>

                                    </div>
<?php
			echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), false);
?>                                </form>
<?php
		}
		else {
?>
                        <div style="text-align: center">
                            <p><strong>Musíš být přihlášen aby si mohl přidat komentář</strong></p>
                            <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:up")) ?>">Zaregistruj se zde</a><br><a href="<?php
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:in")) ?>">Přihlaš se zde</a>
                        </div>
<?php
		}
?>
                        </div>
                    </div>
                </div>
            </div>

<?php
	}

}
