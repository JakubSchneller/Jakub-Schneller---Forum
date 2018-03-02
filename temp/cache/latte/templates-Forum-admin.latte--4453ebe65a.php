<?php
// source: /Applications/MAMP/htdocs/test/app/presenters/templates/Forum/admin.latte

use Latte\Runtime as LR;

class Template4453ebe65a extends Latte\Runtime\Template
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
		if (isset($this->params['owner'])) trigger_error('Variable $owner overwritten in foreach on line 42');
		if (isset($this->params['admin'])) trigger_error('Variable $admin overwritten in foreach on line 71');
		if (isset($this->params['registered'])) trigger_error('Variable $registered overwritten in foreach on line 104');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
    <style>
        .forum.table > tbody > tr > td {
            vertical-align: middle;
        }

        .forum .fa {
            width: 1em;
            text-align: center;
        }

        .forum.table th.cell-stat {
            width: 6em;
        }

        .forum.table th.cell-stat-2x {
            width: 14em;
        }
    </style>
<body>
<div class="container"">
<div class="page-header page-heading">
    <h1 style="text-align: center">Seznam založených účtů</h1>
    <div class="clearfix"></div>
</div>
<table class="table forum table-striped">
    <thead>
    <tr>
        <th class="cell-stat"></th>
        <th>
            <h3>Seznam vlastníků stránky</h3>
        </th>
        <th class="cell-stat text-center hidden-xs hidden-sm"></th>
        <th style="text-align: center" class="cell-stat text-center hidden-xs hidden-sm">Role</th>
        <th style="text-align: center" class="cell-stat-2x hidden-xs hidden-sm">Editace</th>
    </tr>
    </thead>
<?php
		$iterations = 0;
		foreach ($accounts['owners'] as $owner) {
?>
    <tbody>
        <tr>
        <td class="text-center"><i class="  fa fa-question fa-2x text-primary"></i></td>
        <td>
            <h4><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Profile:userprofile", ['userId' => $owner->user_id])) ?>"><?php
			echo LR\Filters::escapeHtmlText($owner->user_name) /* line 47 */ ?></a><br><small><?php echo LR\Filters::escapeHtmlText($owner->first_name) /* line 47 */ ?>

             <a> </a><?php echo LR\Filters::escapeHtmlText($owner->last_name) /* line 48 */ ?></small></h4>
        </td>
        <td class="text-center hidden-xs hidden-sm"><a href="#"></a></td>
        <td style="text-align: center" class="hidden-xs hidden-sm"><?php echo LR\Filters::escapeHtmlText($owner->role) /* line 51 */ ?></td>
        <td class="text-center hidden-xs hidden-sm">
        <a type="button" class="btn-remove btn btn-danger btn-xs" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Profile:editprofile", ['userId' => $owner->user_id])) ?>"><span class="glyphicon glyphicon-minus"></span></a>
        </td>
        </tr>
    </tbody>
<?php
			$iterations++;
		}
?>
</table>
<table class="table forum table-striped">
<thead>
<tr>
    <th class="cell-stat"></th>
    <th>
        <h3>Seznam adminů stránky</h3>
    </th>
    <th class="cell-stat text-center hidden-xs hidden-sm"></th>
    <th style="text-align: center" class="cell-stat text-center hidden-xs hidden-sm">Role</th>
    <th style="text-align: center" class="cell-stat-2x hidden-xs hidden-sm">Editace</th>
</tr>
</thead>
<?php
		$iterations = 0;
		foreach ($accounts['admins'] as $admin) {
?>

        <tbody>

        <tr>
            <td class="text-center"><i class="  fa fa-question fa-2x text-primary"></i></td>
            <td>
                <h4><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Profile:userprofile", ['userId' => $admin->user_id])) ?>"><?php
			echo LR\Filters::escapeHtmlText($admin->user_name) /* line 78 */ ?></a><br><small><?php echo LR\Filters::escapeHtmlText($admin->first_name) /* line 78 */ ?>

                        <a> </a><?php echo LR\Filters::escapeHtmlText($admin->last_name) /* line 79 */ ?></small></h4>
            </td>
            <td class="text-center hidden-xs hidden-sm"><a href="#"></a></td>
            <td style="text-align: center" class="hidden-xs hidden-sm"><?php echo LR\Filters::escapeHtmlText($admin->role) /* line 82 */ ?></td>
            <td class="text-center hidden-xs hidden-sm">
                <a type="button" class="btn-remove btn btn-danger btn-xs" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Profile:editprofile", ['userId' => $admin->user_id])) ?>"><span class="glyphicon glyphicon-minus"></span></a>
            </td>
        </tr>

        </tbody>
<?php
			$iterations++;
		}
?>
    </table>

<table class="table forum table-striped">
    <thead>
    <tr>
        <th class="cell-stat"></th>
        <th>
            <h3>Seznam uživatelů stránky</h3>
        </th>
        <th class="cell-stat text-center hidden-xs hidden-sm"></th>
        <th style="text-align: center" class="cell-stat text-center hidden-xs hidden-sm">Role</th>
        <th style="text-align: center" class="cell-stat-2x hidden-xs hidden-sm">Editace</th>
    </tr>
    </thead>
<?php
		$iterations = 0;
		foreach ($accounts['registered'] as $registered) {
?>


        <tbody>

        <tr>
            <td class="text-center"><i class="  fa fa-question fa-2x text-primary"></i></td>
            <td>
                <h4><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Profile:userprofile", ['userId' => $registered->user_id])) ?>"><?php
			echo LR\Filters::escapeHtmlText($registered->user_name) /* line 112 */ ?></a><br><small><?php echo LR\Filters::escapeHtmlText($registered->first_name) /* line 112 */ ?>

                        <a> </a><?php echo LR\Filters::escapeHtmlText($registered->last_name) /* line 113 */ ?></small></h4>
            </td>
            <td class="text-center hidden-xs hidden-sm"><a href="#"></a></td>
            <td style="text-align: center" class="hidden-xs hidden-sm"><?php echo LR\Filters::escapeHtmlText($registered->role) /* line 116 */ ?></td>
            <td class="text-center hidden-xs hidden-sm">
                <a type="button" class="btn-remove btn btn-danger btn-xs" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Profile:editprofile", ['userId' => $registered->user_id])) ?>"><span class="glyphicon glyphicon-minus"></span></a>
            </td>
        </tr>

        </tbody>


<?php
			$iterations++;
		}
?>
</table>
</div>
</div>
</body>

<?php
	}


	function blockScripts($_args)
	{
		extract($_args);
		$this->renderBlockParent('scripts', get_defined_vars());
?>
    <script src="https://files.nette.org/sandbox/jush.js"></script>
<?php
	}

}
