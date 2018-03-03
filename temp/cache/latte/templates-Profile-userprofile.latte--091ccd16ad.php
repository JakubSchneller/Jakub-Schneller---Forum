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
		<style>
			.media-object-owner {
				border: 3px solid rgb(41, 5, 250);
			}
			.media-object-admin {
				border: 3px solid red;
			}
			.media-object-user {
				border: 3px solid rgba(0, 0, 0, 0.46);
			}
		</style>
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
<?php
			if ($users->role == 'owner') {
				?>												<img class="media-object-owner dp img-circle" src="../<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($users->image)) /* line 37 */ ?>" style="width: 180px;height:180px;">
<?php
			}
			elseif ($users->role == 'admin') {
				?>												<img class="media-object-admin dp img-circle" src="../<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($users->image)) /* line 39 */ ?>" style="width: 180px;height:180px;">
<?php
			}
			else {
				?>												<img class="media-object-user dp img-circle" src="../<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($users->image)) /* line 41 */ ?>" style="width: 180px;height:180px;">
<?php
			}
?>
										</a>
									</div>
								</div>
								<div class="col-md-12">
<?php
			if ($users->role == 'owner') {
				?>										<h2 style="color: rgb(41, 5, 250)" align="center"><?php echo LR\Filters::escapeHtmlText($users->first_name) /* line 48 */ ?> <?php
				echo LR\Filters::escapeHtmlText($users->last_name) /* line 48 */ ?></h2>
<?php
			}
			elseif ($users->role == 'admin') {
				?>										<h2 style="color: red" align="center"><?php echo LR\Filters::escapeHtmlText($users->first_name) /* line 50 */ ?> <?php
				echo LR\Filters::escapeHtmlText($users->last_name) /* line 50 */ ?></h2>
<?php
			}
			else {
				?>										<h2 style="color: #555555" align="center"><?php echo LR\Filters::escapeHtmlText($users->first_name) /* line 52 */ ?> <?php
				echo LR\Filters::escapeHtmlText($users->last_name) /* line 52 */ ?></h2>
<?php
			}
?>
									<br>
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
										<input class="form-control" id="disabledInput" placeholder="<?php echo LR\Filters::escapeHtmlAttr($users->first_name) /* line 63 */ ?>" disabled="" type="text">
									</div>

									<div class="form-group">
										<label class="control-label" for="disabledInput">Příjmení:</label>
										<input class="form-control" id="disabledInput" placeholder="<?php echo LR\Filters::escapeHtmlAttr($users->last_name) /* line 68 */ ?>" disabled="" type="text">
									</div>
									<div class="form-group">
										<label class="control-label" for="disabledInput">Datum registrace:</label>
										<input class="form-control" id="disabledInput" placeholder="<?php echo LR\Filters::escapeHtmlAttr($users->date_created) /* line 72 */ ?>" disabled="" type="text">
									</div>
									<div class="form-group">
										<label class="control-label" for="disabledInput">Email:</label>
										<input class="form-control" id="disabledInput" placeholder="<?php echo LR\Filters::escapeHtmlAttr($users->user_email) /* line 76 */ ?>" disabled="" type="text">
									</div>
									<div class="form-group">
										<label class="control-label" for="disabledInput">Přihlašovací jméno:</label>
										<input class="form-control" id="disabledInput" placeholder="<?php echo LR\Filters::escapeHtmlAttr($users->user_name) /* line 80 */ ?>" disabled="" type="text">
									</div>
									<div class="form-group">
										<label class="control-label" for="disabledInput">Role:</label>
										<input class="form-control" id="disabledInput" placeholder="<?php echo LR\Filters::escapeHtmlAttr($users->role) /* line 84 */ ?>" disabled="" type="text">
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
