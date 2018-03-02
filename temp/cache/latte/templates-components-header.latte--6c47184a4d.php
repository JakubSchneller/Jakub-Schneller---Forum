<?php
// source: /Applications/MAMP/htdocs/test/app/presenters/templates/components/header.latte

use Latte\Runtime as LR;

class Template6c47184a4d extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
		'head' => 'blockHead',
	];

	public $blockTypes = [
		'content' => 'html',
		'head' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
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
	<style>
		#bs-example-navbar-collapse-1.collapse.navbar-collapse{
			background-color: black;
		}
		.bs-dark.navbar-inverse {
			background-color: #222;
			border-color: #080808;
		}
		.bs-dark .navbar-img {
			padding:5px 6px !important;}
		.bs-dark .navbar-img img {
			width:40px;}
		.bs-dark .dropdown-menu {
			min-width: 200px;
			padding: 5px 0;
			margin: 2px 0 0;
			background-color: #000;
			border: 1px solid rgba(0, 0, 0, 0.7);
			border: 1px solid rgba(0, 0, 0, .15);
			-webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
			box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
		}

		.bs-dark .dropdown-menu .divider {
			border: 1px solid rgba(0, 0, 0, 0.8);
		}
		.bs-dark .dropdown-menu > li > a {
			padding: 6px 20px;
			color: rgba(255,255,255,0.80);
		}
		.bs-dark .dropdown-menu > li > a:hover,
		.bs-dark .dropdown-menu > li > a:focus {
			color: rgba(255,255,255,0.70);
			text-decoration: none;
			background-color: transparent;
			background-image: none;
		}
		.bs-dark .dropdown-menu > .active > a,
		.bs-dark .dropdown-menu > .active > a:hover,
		.bs-dark .dropdown-menu > .active > a:focus {
			color: rgba(255,255,255,0.70);
			text-decoration: none;
			background-color: transparent;
			background-image: none;
			outline: 0;
		}

		.bs-dark .navbar-form {
			margin:0;
			margin-top: 5px;
			padding:8px 0px;
		}

		.bs-dark .navbar-form .search-box {
			border:0px;
			height:35px;
			outline: none;
			width:320px;
			padding-right: 3px;
			padding-left: 15px;
			margin:4px;
			-webkit-border-radius: 22px;
			-moz-border-radius: 22px;
			border-radius: 22px;
		}

		.bs-dark .navbar-form button {
			border: 0;
			background: none;
			padding: 2px 5px;
			margin-top: 2px;
			position: relative;
			left: -34px;
			margin-bottom: 0;
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px;
		}

		.bs-dark .search-box:focus + button {
			z-index: 3;
		}

		@media (min-width: 768px) {
			.bs-dark .dropdown:hover {
				background-color: black;
			}
			.bs-dark .dropdown:hover .dropdown-menu {
				display: block;
			}
			.bs-dark .navbar-form {
				padding:0px;
			}
			.bs-dark .navbar-form .search-box {
				width:260px;
				height:32px;
			}

		}
	</style>
	<!------------- Navbar -------------->
	<nav class="navbar navbar-inverse bs-dark">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">iForum</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li ><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default")) ?>">Homepage <span class="sr-only"></span></a></li>
				<li ><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Forum:categories")) ?>">Forum <span class="sr-only"></span></a></li>
			</ul>
			<form class="navbar-form navbar-left form-horizontal" role="search">
				<div class="input-group">
					<input type="text" class="search-box" placeholder="Search">
					<button type="submit" class="btn"><span class=""></span></button>
				</div>
			</form>
			<ul class="nav navbar-nav navbar-right">
<?php
		if ($user->isLoggedIn()) {
?>
					<li class="dropdown">
						<a class="dropdown-toggle navbar-img" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="<?php
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Profile:profile")) ?>">
							Přihlášen jako: <?php echo LR\Filters::escapeHtmlText($loggedin_name) /* line 129 */ ?>

							<img src="../<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($loggedin_image)) /* line 130 */ ?>" class="img-circle" alt="Profile Image">
						</a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Profile:profile")) ?>">Můj profil</a></li>
							<li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Profile:myposts")) ?>">Moje příspěvky</a></li>
<?php
			if ($loggedin_role == 'owner' || $loggedin_role == 'admin') {
?>
								<li role="separator" class="divider"></li>
								<li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Forum:admin")) ?>">Spravovat uživatele</a></li>
								<li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:out")) ?>">Odhlášení</a></li>
<?php
			}
			else {
?>
								<li role="separator" class="divider"></li>
								<li><a>Nahlásit chybu/zneužití</a></li>
								<li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:out")) ?>">Odhlášení</a></li>
<?php
			}
?>
						</ul>
					</li>
<?php
		}
		else {
			?>					<li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:up")) ?>"> Registrace</a></li>
					<li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:in")) ?>"> Přihlášení</a></li>
<?php
		}
?>
			</ul>
		</div>
	</nav>

<?php
	}


	function blockHead($_args)
	{
		
	}

}
