<?php
// source: /Applications/MAMP/htdocs/test/app/presenters/templates/Profile/userprofile.latte

use Latte\Runtime as LR;

class Template091ccd16ad extends Latte\Runtime\Template
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
<?php
		if ($userId == $users->user_id) {
?>
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
											<img class="media-object dp img-circle" src="../<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($users->image)) /* line 26 */ ?>" style="width: 180px;height:180px;">
										</a>
									</div>
								</div>
								<div class="col-md-12">
									<h2 align="center"><?php echo LR\Filters::escapeHtmlText($users->first_name) /* line 31 */ ?> <?php
			echo LR\Filters::escapeHtmlText($users->last_name) /* line 31 */ ?></h2><br>
									<p>
									<div class="col-sm-5 col-xs-6 tital" align="left">Křestní jméno:</div><div class="col-sm-7 col-xs-6" align="right"><?php
			echo LR\Filters::escapeHtmlText($users->first_name) /* line 33 */ ?></div>
									<div class="clearfix"></div>
									<div class="bot-border"></div>

									<div class="col-sm-5 col-xs-6 tital" align="left">Příjmení:</div><div class="col-sm-7" align="right"><?php
			echo LR\Filters::escapeHtmlText($users->last_name) /* line 37 */ ?></div>
									<div class="clearfix"></div>
									<div class="bot-border"></div>

									<div class="col-sm-5 col-xs-6 tital" align="left">Datum registrace:</div><div class="col-sm-7" align="right"><?php
			echo LR\Filters::escapeHtmlText($users->date_created) /* line 41 */ ?></div>
									<div class="clearfix"></div>
									<div class="bot-border"></div>

									<div class="col-sm-5 col-xs-6 tital" align="left">Email:</div><div class="col-sm-7" align="right"><?php
			echo LR\Filters::escapeHtmlText($users->user_email) /* line 45 */ ?></div>
									<div class="clearfix"></div>
									<div class="bot-border"></div>

									<div class="col-sm-5 col-xs-6 tital" align="left">Přihlašovací jméno:</div><div class="col-sm-7" align="right"><?php
			echo LR\Filters::escapeHtmlText($users->user_name) /* line 49 */ ?></div>

									<div class="clearfix"></div>
									<div class="bot-border"></div>

									<div class="col-sm-5 col-xs-6 tital" align="left">O mě: </div><div class="col-sm-7" align="right"><?php
			echo LR\Filters::escapeHtmlText($users->about_me) /* line 54 */ ?></div>
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
<?php
		}
?>
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
