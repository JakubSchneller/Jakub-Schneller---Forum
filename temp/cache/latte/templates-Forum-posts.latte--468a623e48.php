<?php
// source: /Applications/MAMP/htdocs/test/app/presenters/templates/Forum/posts.latte

use Latte\Runtime as LR;

class Template468a623e48 extends Latte\Runtime\Template
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
		if (isset($this->params['post'])) trigger_error('Variable $post overwritten in foreach on line 65');
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
    <title>Moje webová stránka</title>
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
<div class="page-header page-heading">
    <h1 class="pull-left">Forums</h1>
    <ol class="breadcrumb pull-right where-am-i">
        <li><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Forum:categories")) ?>">Kategorie</a></li>
        <li class="active">Seznam příspěvků</li>
    </ol>
    <div class="clearfix"></div>
</div>

<table class="table forum table-striped">
    <thead>
    <tr>
        <th class="cell-stat"></th>
        <th>
<?php
		if ($categoryId == 0) {
?>
            <h3>První kategorie</h3>
<?php
		}
		if ($categoryId == 1) {
?>
            <h3>Druhá kategorie</h3>
<?php
		}
		if ($categoryId == 2) {
?>
            <h3>Třetí kategorie</h3>
<?php
		}
?>
        </th>
        <th class="cell-stat text-center hidden-xs hidden-sm"></th>
        <th class="cell-stat text-center hidden-xs hidden-sm"></th>
        <th class="cell-stat-2x hidden-xs hidden-sm">Vytvořil</th>
    </tr>
    </thead>

    <tbody>
    <a type="button" id="newpost" class="btn btn-primary ribbon" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Post:Add", ['categoryId' => $categoryId, 'subcategoryId' => $subcategoryId])) ?>">Přidat nový příspěvek</a>
<?php
		$iterations = 0;
		foreach ($posts->order('post_id DESC') as $post) {
			if ($categoryId == $post->category_id && $subcategoryId == $post->subcategory_id) {
?>
        <tr>
        <td class="text-center"><i class="  fa fa-question fa-2x text-primary"></i></td>
        <td>
            <h4><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Forum:post", ['postId' => $post->post_id])) ?>"><?php
				echo LR\Filters::escapeHtmlText($post->post_name) /* line 70 */ ?></a><br><small><?php echo LR\Filters::escapeHtmlText($post->post_description) /* line 70 */ ?></small></h4>
        </td>
        <td class="text-center hidden-xs hidden-sm"><a href="#"></a></td>
        <td class="text-center hidden-xs hidden-sm"><a href="#"></a></td>
        <td class="hidden-xs hidden-sm"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Profile:userprofile", ['userId' => $post->post_creator_id])) ?>"><?php
				echo LR\Filters::escapeHtmlText($post->post_creator) /* line 74 */ ?></a><br><small><i class="fa fa-clock-o"></i><?php
				echo LR\Filters::escapeHtmlText($post->post_date) /* line 74 */ ?></small></td>
        </tr>
<?php
			}
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
?>    <script src="https://files.nette.org/sandbox/jush.js"></script>
<?php
	}

}
