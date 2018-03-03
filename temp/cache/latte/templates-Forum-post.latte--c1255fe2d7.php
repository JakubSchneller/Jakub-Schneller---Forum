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
		if (isset($this->params['comment'])) trigger_error('Variable $comment overwritten in foreach on line 81');
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
            .media .media-object { max-width: 100px; }
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
                <h1 class="mt-4"><?php echo LR\Filters::escapeHtmlText($post->post_name) /* line 48 */ ?></h1>

                <!-- Author -->
                <p class="lead">
                    <?php echo LR\Filters::escapeHtmlText($post->post_description) /* line 52 */ ?>

                    <br>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><strong>Vytvořil/a
                        <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Profile:userprofile", ['userId' => $post->post_creator_id])) ?>"><?php
		echo LR\Filters::escapeHtmlText($post->post_creator) /* line 60 */ ?></a> <?php echo LR\Filters::escapeHtmlText($post->post_date) /* line 60 */ ?></p></strong>

                <hr>

                <!-- Post Content -->
                <font size="4"><?php echo LR\Filters::escapeHtmlText($post->post_content) /* line 65 */ ?></font>
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
                                        <a class="pull-left" href="#">
                                            <img class="media-object img-circle" src="../<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($comment['dbrow']->creator_image)) /* line 84 */ ?>" alt="profile">
                                        </a>
                                        <div class="media-body">
                                            <div class="well well-lg">
                                                <h4 class="text-uppercase reviews"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Profile:userprofile", ['userId' => $comment['dbrow']->creator_id])) ?>"><?php
			echo LR\Filters::escapeHtmlText($comment['dbrow']->creator_name) /* line 88 */ ?></h4>
                                                <ul class="media-date reviews list-inline">
                                                    <?php echo LR\Filters::escapeHtmlText($comment['age']) /* line 90 */ ?>

                                                </ul>
                                                <p class="media-comment">
                                                    <a></a><?php echo LR\Filters::escapeHtmlText($comment['dbrow']->content) /* line 93 */ ?>

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
