<?php
// source: /Applications/MAMP/htdocs/test/app/presenters/templates/Profile/userprofile.latte

use Latte\Runtime as LR;

class Template091ccd16ad extends Latte\Runtime\Template
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
<?php
			if ($user->isInRole('admin') || $user->isInRole('owner')) {
?>
										<div class="text-center">
											<a type="button" class="btn btn-success" style="margin: auto" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Profile:editprofile", ['userId' => $users->user_id])) ?>">Editovat</a>
										</div>
<?php
			}
?>
									<p>
									<div class="form-group">
										<label class="control-label" for="disabledInput">Křestní jméno:</label>
										<input class="form-control" id="disabledInput" placeholder="<?php echo LR\Filters::escapeHtmlAttr($users->first_name) /* line 40 */ ?>" disabled="" type="text">
									</div>

									<div class="form-group">
										<label class="control-label" for="disabledInput">Příjmení:</label>
										<input class="form-control" id="disabledInput" placeholder="<?php echo LR\Filters::escapeHtmlAttr($users->last_name) /* line 45 */ ?>" disabled="" type="text">
									</div>
									<div class="form-group">
										<label class="control-label" for="disabledInput">Datum registrace:</label>
										<input class="form-control" id="disabledInput" placeholder="<?php echo LR\Filters::escapeHtmlAttr($users->date_created) /* line 49 */ ?>" disabled="" type="text">
									</div>
									<div class="form-group">
										<label class="control-label" for="disabledInput">Email:</label>
										<input class="form-control" id="disabledInput" placeholder="<?php echo LR\Filters::escapeHtmlAttr($users->user_email) /* line 53 */ ?>" disabled="" type="text">
									</div>
									<div class="form-group">
										<label class="control-label" for="disabledInput">Přihlašovací jméno:</label>
										<input class="form-control" id="disabledInput" placeholder="<?php echo LR\Filters::escapeHtmlAttr($users->user_name) /* line 57 */ ?>" disabled="" type="text">
									</div>
									<div class="form-group">
										<label class="control-label" for="disabledInput">Role:</label>
										<input class="form-control" id="disabledInput" placeholder="<?php echo LR\Filters::escapeHtmlAttr($users->role) /* line 61 */ ?>" disabled="" type="text">
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
<?php
		}
?>
	</body>
</hmtl>
<?php
	}

}
