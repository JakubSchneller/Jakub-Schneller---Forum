<?php
// source: /Applications/MAMP/htdocs/test/app/presenters/templates/Forum/posts.latte

use Latte\Runtime as LR;

class Template468a623e48 extends Latte\Runtime\Template
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
		if (isset($this->params['post'])) trigger_error('Variable $post overwritten in foreach on line 57');
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
    <h1 class="pull-left"><?php echo LR\Filters::escapeHtmlText($category->name) /* line 34 */ ?></h1>
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
            <h3><?php echo LR\Filters::escapeHtmlText($topic->topic_name) /* line 47 */ ?></h3>
        </th>
        <th class="cell-stat text-center hidden-xs hidden-sm"></th>
        <th class="cell-stat text-center hidden-xs hidden-sm"></th>
        <th class="cell-stat-2x hidden-xs hidden-sm">Vytvořil</th>
    </tr>
    </thead>

    <tbody>
    <a type="button" id="newpost" class="btn btn-primary ribbon" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Post:Add", ['topicId' => $topicId])) ?>">Přidat nový příspěvek</a>
<?php
		$iterations = 0;
		foreach ($posts as $post) {
?>
        <tr>
        <td class="text-center"><i class="  fa fa-question fa-2x text-primary"></i></td>
        <td>
            <h4><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Forum:post", ['postId' => $post->post_id])) ?>"><?php
			echo LR\Filters::escapeHtmlText($post->post_name) /* line 61 */ ?></a><br><small><?php echo LR\Filters::escapeHtmlText($post->post_description) /* line 61 */ ?></small></h4>
        </td>
        <td class="text-center hidden-xs hidden-sm"><a href="#"></a></td>
        <td class="text-center hidden-xs hidden-sm"><a href="#"></a></td>
        <td class="hidden-xs hidden-sm"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Profile:userprofile", ['userId' => $post->post_creator_id])) ?>"><?php
			echo LR\Filters::escapeHtmlText($post->post_creator) /* line 65 */ ?></a><br><small><i class="fa fa-clock-o"></i><?php
			echo LR\Filters::escapeHtmlText($post->post_date) /* line 65 */ ?></small></td>
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

}
