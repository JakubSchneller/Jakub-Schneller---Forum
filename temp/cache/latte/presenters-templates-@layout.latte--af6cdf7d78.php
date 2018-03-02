<?php
// source: /Applications/MAMP/htdocs/test/app/presenters/templates/@layout.latte

use Latte\Runtime as LR;

class Templateaf6cdf7d78 extends Latte\Runtime\Template
{
	public $blocks = [
		'scripts' => 'blockScripts',
	];

	public $blockTypes = [
		'scripts' => 'html',
	];


	function main()
	{
		extract($this->params);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Fórum</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 14 */ ?>/css/style.css">
	<link rel="stylesheet" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 15 */ ?>/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 16 */ ?>/bootstrap/css/bootstrap-theme.css">

	<style>
		html {
			position: relative;
			min-height: 100%;
		}
		body {
			margin-bottom: 90px;
		}
		.footer {
			position: absolute;
			bottom: 0;
			left: 0;
			height: 90px;
			width: 100%;
			background-color: #222222;
			color: white;
		}
		.bs-dark .dropdown-menu > li > a:hover {
			background-color: black;
		}
		@import url(http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css);
	</style>

</head>
<body>
<header>
<?php
		/* line 44 */
		$this->createTemplate("components/header.latte", $this->params, "include")->renderToContentType('html');
?>
</header>

<?php
		$iterations = 0;
		foreach ($flashes as $flash) {
			?><div<?php if ($_tmp = array_filter(['flash', $flash->type])) echo ' class="', LR\Filters::escapeHtmlAttr(implode(" ", array_unique($_tmp))), '"' ?>><?php
			echo LR\Filters::escapeHtmlText($flash->message) /* line 47 */ ?></div>
<?php
			$iterations++;
		}
?>

<?php
		$this->renderBlock('content', $this->params, 'html');
?>

<footer>
<?php
		/* line 52 */
		$this->createTemplate("components/footer.latte", $this->params, "include")->renderToContentType('html');
?>
</footer>
<?php
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('scripts', get_defined_vars());
?>
</body>
</html><?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['flash'])) trigger_error('Variable $flash overwritten in foreach on line 47');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockScripts($_args)
	{
		extract($_args);
?>
	<script src="http://code.jquery.com/jquery-3.3.1.slim.js" integrity="sha256-fNXJFIlca05BIO2Y5zh1xrShK3ME+/lYZ0j+ChxX2DA=" crossorigin="anonymous"></script>
	<script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 56 */ ?>/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 57 */ ?>/js/main.js"></script>
	<script src="https://nette.github.io/resources/js/netteForms.min.js"></script>
<?php
	}

}
