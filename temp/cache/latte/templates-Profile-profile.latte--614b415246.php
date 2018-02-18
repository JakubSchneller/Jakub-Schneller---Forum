<?php
// source: /Applications/MAMP/htdocs/test/app/presenters/templates/Profile/profile.latte

use Latte\Runtime as LR;

class Template614b415246 extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
		'scripts' => 'blockScripts',
	];

	public $blockTypes = [
		'content' => 'html',
		'scripts' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
		$this->renderBlock('scripts', get_defined_vars());
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

<hmtl>
	<head>

	</head>
	<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-body text-left">
							<div class="row">
								<div class="col-md-12">
									<div align="center">
										<a class="" href="#">
											<img class="media-object dp img-circle" src="../<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($currentUser->image)) /* line 25 */ ?>" style="width: 180px;height:180px;">
										</a>
									</div>
								</div>
								<div class="col-md-12">
									<h2 align="center"><?php echo LR\Filters::escapeHtmlText($currentUser->first_name) /* line 30 */ ?> <?php
		echo LR\Filters::escapeHtmlText($currentUser->last_name) /* line 30 */ ?></h2><br>
									<p>
									<div class="col-sm-5 col-xs-6 tital" align="left">Křestní jméno:</div><div class="col-sm-7 col-xs-6" align="right"><?php
		echo LR\Filters::escapeHtmlText($currentUser->first_name) /* line 32 */ ?></div>
									<div class="clearfix"></div>
									<div class="bot-border"></div>

									<div class="col-sm-5 col-xs-6 tital" align="left">Příjmení:</div><div class="col-sm-7" align="right"><?php
		echo LR\Filters::escapeHtmlText($currentUser->last_name) /* line 36 */ ?></div>
									<div class="clearfix"></div>
									<div class="bot-border"></div>

									<div class="col-sm-5 col-xs-6 tital" align="left">Datum registrace:</div><div class="col-sm-7" align="right"><?php
		echo LR\Filters::escapeHtmlText($currentUser->date_created) /* line 40 */ ?></div>
									<div class="clearfix"></div>
									<div class="bot-border"></div>

									<div class="col-sm-5 col-xs-6 tital" align="left">Email:</div><div class="col-sm-7" align="right"><?php
		echo LR\Filters::escapeHtmlText($currentUser->user_email) /* line 44 */ ?></div>
									<div class="clearfix"></div>
									<div class="bot-border"></div>

									<div class="col-sm-5 col-xs-6 tital" align="left">Přihlašovací jméno:</div><div class="col-sm-7" align="right"><?php
		echo LR\Filters::escapeHtmlText($currentUser->user_name) /* line 48 */ ?></div>
									<div class="clearfix"></div>
									<div class="bot-border"></div>

									<div class="col-sm-5 col-xs-6 tital" align="left">Role:</div><div class="col-sm-7" align="right"><?php
		echo LR\Filters::escapeHtmlText($currentUser->role) /* line 52 */ ?></div>
									<div class="clearfix"></div>
									<div class="bot-border"></div>

									<div class="col-sm-5 col-xs-6 tital" align="left">O mě: </div><div class="col-sm-7" align="right"><?php
		echo LR\Filters::escapeHtmlText($currentUser->about_me) /* line 56 */ ?></div>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
	</div>
	</body>
</hmtl>
<?php
	}


	function blockScripts($_args)
	{
?>	<script src="https://files.nette.org/sandbox/jush.js"></script>
<?php
	}

}
