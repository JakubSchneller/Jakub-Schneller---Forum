<?php
// source: /Applications/MAMP/htdocs/test/app/presenters/templates/Forum/categories.latte

use Latte\Runtime as LR;

class Templatee927cabbca extends Latte\Runtime\Template
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
		if (isset($this->params['topic'])) trigger_error('Variable $topic overwritten in foreach on line 60');
		if (isset($this->params['category'])) trigger_error('Variable $category overwritten in foreach on line 47');
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
        <title>Moje forum</title>
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
            #newpost {
                width: 100%;
            }
        </style>
    </head>
    <body>
    <div class="container">
        <div class="page-header page-heading">
            <h1 class="pull-left">Forum</h1>
            <ol class="breadcrumb pull-right where-am-i">
                <li>Forum</li>
                <li class="active">Seznam kategorií</li>
            </ol>
            <div class="clearfix"></div>
        </div>
        <p class="lead">This is the right place to discuss any ideas, critics, feature requests and all the ideas regarding our website. Please follow the forum rules and always check FAQ before posting to prevent duplicate posts.</p>
        <div class="col-md-12 center">
        </div>
<?php
		$iterations = 0;
		foreach ($categories as $category) {
?>
        <table class="table forum table-striped">
            <thead>
            <tr>
                <th class="cell-stat"></th>
                <th>
                    <h3><?php echo LR\Filters::escapeHtmlText($category['db']->name) /* line 53 */ ?></h3>
                </th>
                <th class="cell-stat text-center hidden-xs hidden-sm">Příspěvky</th>
                <th class="cell-stat-2x hidden-xs hidden-sm">Poslední příspěvek</th>
            </tr>
            </thead>
            <tbody>
<?php
			$iterations = 0;
			foreach ($category['topics'] as $topic) {
?>
                    <tr>
                        <td class="text-centx<er"><i class="fa fa-question fa-2x text-primary"></i></td>
                        <td>
                            <h4><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Forum:posts", ['topicId' => $topic['db']->topic_id])) ?>"><?php
				echo LR\Filters::escapeHtmlText($topic['db']->topic_name) /* line 64 */ ?></a><br><small><?php echo LR\Filters::escapeHtmlText($topic['db']->topic_description) /* line 64 */ ?></small></h4>
                        </td>
                        <td class="text-center hidden-xs hidden-sm"><?php echo LR\Filters::escapeHtmlText($topic['postsCount']) /* line 66 */ ?></td>
<?php
				if ($topic['lastPost']) {
					?>                            <td class="hidden-xs hidden-sm">Vytvořil <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Profile:userprofile", ['userId' => $topic['lastPost']->post_creator_id])) ?>"><?php
					echo LR\Filters::escapeHtmlText($topic['lastPost']->post_creator) /* line 68 */ ?></a><br><small><i class="fa fa-clock-o"></i><?php
					echo LR\Filters::escapeHtmlText($topic['ageText']) /* line 68 */ ?></small></td>
<?php
				}
				else {
?>
                            <td class="hidden-xs hidden-sm"><br><small><i class="fa fa-clock-o"></i></small></td>
<?php
				}
?>
                    </tr>
<?php
				$iterations++;
			}
?>

            </tbody>
        </table>
<?php
			$iterations++;
		}
?>
    </div>
    </div>
    </body>
    </html>
<?php
	}


	function blockScripts($_args)
	{
?>    <script src="https://files.nette.org/sandbox/jush.js"></script>
<?php
	}

}
