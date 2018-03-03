<?php
// source: /Applications/MAMP/htdocs/test/app/presenters/templates/Profile/profile.latte

use Latte\Runtime as LR;

class Template614b415246 extends Latte\Runtime\Template
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
						<div class="panel-body">
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
		echo LR\Filters::escapeHtmlText($currentUser->last_name) /* line 30 */ ?></h2>
									<div class="text-center">
									<a type="button" class="btn btn-success" style="margin: auto" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Profile:editprofile", ['userId' => $currentUser->user_id])) ?>">Editovat</a>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label" for="disabledInput">Křestní jméno:</label>
										<input class="form-control" id="disabledInput" placeholder="<?php echo LR\Filters::escapeHtmlAttr($currentUser->first_name) /* line 38 */ ?>" disabled="" type="text">
									</div>

									<div class="form-group">
										<label class="control-label" for="disabledInput">Příjmení:</label>
										<input class="form-control" id="disabledInput" placeholder="<?php echo LR\Filters::escapeHtmlAttr($currentUser->last_name) /* line 43 */ ?>" disabled="" type="text">
									</div>
									<div class="form-group">
										<label class="control-label" for="disabledInput">Datum registrace:</label>
										<input class="form-control" id="disabledInput" placeholder="<?php echo LR\Filters::escapeHtmlAttr($currentUser->date_created) /* line 47 */ ?>" disabled="" type="text">
									</div>
									<div class="form-group">
										<label class="control-label" for="disabledInput">Email:</label>
										<input class="form-control" id="disabledInput" placeholder="<?php echo LR\Filters::escapeHtmlAttr($currentUser->user_email) /* line 51 */ ?>" disabled="" type="text">
									</div>
									<div class="form-group">
										<label class="control-label" for="disabledInput">Přihlašovací jméno:</label>
										<input class="form-control" id="disabledInput" placeholder="<?php echo LR\Filters::escapeHtmlAttr($currentUser->user_name) /* line 55 */ ?>" disabled="" type="text">
									</div>
									<div class="form-group">
										<label class="control-label" for="disabledInput">Role:</label>
										<input class="form-control" id="disabledInput" placeholder="<?php echo LR\Filters::escapeHtmlAttr($currentUser->role) /* line 59 */ ?>" disabled="" type="text">
									</div>
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

}
