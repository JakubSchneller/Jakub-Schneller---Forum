<?php
// source: /Applications/MAMP/htdocs/test/app/presenters/templates/Post/add.latte

use Latte\Runtime as LR;

class Template28ead020a1 extends Latte\Runtime\Template
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
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Moje forum</title>
        <style>
        </style>
    </head>
    <body>
    <div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <h1>Přidat příspěvek</h1>

<?php
		$form = $_form = $this->global->formsStack[] = $this->global->uiControl["addArticle"];
		?>                <form action="" method="POST"<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
		'action' => NULL,
		'method' => NULL,
		), false) ?>>

                    <div class="form-group">
                        <label for="slug">Název příspěvku <span class="require">*</span></label>
                        <input type="text" class="form-control"<?php
		$_input = end($this->global->formsStack)["name"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'class' => NULL,
		))->attributes() ?>>
                    </div>

                    <div class="form-group">
                        <label for="description">Popis příspěvku</label>
                        <input class="form-control"<?php
		$_input = end($this->global->formsStack)["description"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                    </div>

                    <div class="form-group">
                        <label for="description">Obsah příspěvku <span class="require">*</span></label>
                        <textarea rows="5" class="form-control" <?php
		$_input = end($this->global->formsStack)["content"];
		echo $_input->getControlPart()->addAttributes(array (
		'rows' => NULL,
		'class' => NULL,
		))->attributes() ?>><?php echo $_input->getControl()->getHtml() ?></textarea>
                    </div>

                    <div class="form-group">
                        <p><span class="require">*</span> - nutné informace</p>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"<?php
		$_input = end($this->global->formsStack)["submit"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'class' => NULL,
		))->attributes() ?>>
                            Přidat
                        </button>
                    <a class="btn btn-default"  href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Forum:posts", ['topicId' => $topicId])) ?>">
                        Jít zpět
                    </a>
                    </div>
<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), false);
?>                </form>
            </div>

        </div>
    </div>
    </body>
    </html>
<?php
	}

}
