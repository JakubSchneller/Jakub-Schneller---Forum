<?php
// source: /Applications/MAMP/htdocs/test/app/presenters/templates/Profile/myposts.latte

use Latte\Runtime as LR;

class Template89b98e54f1 extends Latte\Runtime\Template
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
		if (isset($this->params['post'])) trigger_error('Variable $post overwritten in foreach on line 48');
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
    <title>Moje příspěvky</title>
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
</head>
<body>

<div class="container"">

<table class="table forum table-striped">
    <thead>
    <tr>
        <th class="cell-stat"></th>
        <th>
            <h3>Moje Příspěvky</h3>
        </th>
        <th class="cell-stat text-center hidden-xs hidden-sm"></th>
        <th class="cell-stat text-center hidden-xs hidden-sm"></th>
        <th style="text-align: center" class="cell-stat-2x hidden-xs hidden-sm">Přidáno</th>
    </tr>
    </thead>

    <tbody>
<?php
		$iterations = 0;
		foreach ($posts as $post) {
?>
        <tr>
            <td class="text-center"><i class="  fa fa-question fa-2x text-primary"></i></td>
            <td>
                <h4><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Forum:post", ['postId' => $post->post_id])) ?>"><?php
			echo LR\Filters::escapeHtmlText($post->post_name) /* line 52 */ ?></a><br><small><?php echo LR\Filters::escapeHtmlText($post->post_description) /* line 52 */ ?></small></h4>
            </td>
            <td class="text-center hidden-xs hidden-sm"><a href="#"></a></td>
            <td class="text-center hidden-xs hidden-sm"><a href="#"></a></td>
            <td class="hidden-xs hidden-sm"><i class="fa fa-clock-o"></i><p style="text-align: center"><?php
			echo LR\Filters::escapeHtmlText($post->post_date) /* line 56 */ ?></p></td>
        </tr>
<?php
			$iterations++;
		}
?>
    </tbody>

</table>
</div>
</div>
</body>

<?php
	}


	function blockScripts($_args)
	{
?><script src="https://files.nette.org/sandbox/jush.js"></script>
<?php
	}

}
