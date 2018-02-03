<?php
// source: /Applications/MAMP/htdocs/test/app/presenters/templates/Header/header.latte

use Latte\Runtime as LR;

class Template9b994fced8 extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
		'scripts' => 'blockScripts',
		'head' => 'blockHead',
	];

	public $blockTypes = [
		'content' => 'html',
		'scripts' => 'html',
		'head' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
?>

<?php
		$this->renderBlock('scripts', get_defined_vars());
?>


<?php
		$this->renderBlock('head', get_defined_vars());
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
	<!-- A grey horizontal navbar that becomes vertical on small screens -->
	<html>
	<header class="navbar navbar-expand">
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default")) ?>">Moje stránka</a>
				</div>
				<ul class="nav navbar-nav">
					<li class="active"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default")) ?>">Home</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
<?php
		if ($user->isLoggedIn()) {
			?>						<li><a>Přihlášen jako <?php echo LR\Filters::escapeHtmlText($loggedin_name) /* line 17 */ ?></a></li>
						<li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:out")) ?>"> Odhlášení</a></li>
<?php
		}
		else {
			?>						<li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:up")) ?>"> Registrace</a></li>
						<li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:in")) ?>"> Přihlášení</a></li>
<?php
		}
?>
				</ul>
			</div>
		</nav>
	</header>
	</html>

<?php
	}


	function blockScripts($_args)
	{
?>	<script src="https://files.nette.org/sandbox/jush.js"></script>
<?php
	}


	function blockHead($_args)
	{
		
	}

}
