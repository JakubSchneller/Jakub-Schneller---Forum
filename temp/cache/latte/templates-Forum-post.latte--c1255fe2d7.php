<?php
// source: /Applications/MAMP/htdocs/test/app/presenters/templates/Forum/post.latte

use Latte\Runtime as LR;

class Templatec1255fe2d7 extends Latte\Runtime\Template
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
		if (isset($this->params['comment'])) trigger_error('Variable $comment overwritten in foreach on line 255');
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
        <title>Blog post</title>
        <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css">
        <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\jquery\jquery.min.js">


        <style>

            @media (min-width: 992px) {
                body {
                    padding-top: 0px;
                }
            }
            body{ background: #fafafa;}
            .widget-area.blank {
                background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
                -webkit-box-shadow: none;
                -moz-box-shadow: none;
                -ms-box-shadow: none;
                -o-box-shadow: none;
                box-shadow: none;
            }
            body .no-padding {
                padding: 0;
            }
            .widget-area {
                background-color: #fff;
                -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                -ms-border-radius: 4px;
                -o-border-radius: 4px;
                border-radius: 4px;
                -webkit-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
                -moz-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
                -ms-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
                -o-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
                box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
                float: left;
                margin-top: 30px;
                padding: 25px 30px;
                width: 100%;
            }
            .status-upload {
                background: none repeat scroll 0 0 #f5f5f5;
                -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                -ms-border-radius: 4px;
                -o-border-radius: 4px;
                border-radius: 4px;
                float: left;
                width: 100%;
            }
            .status-upload form {
                float: left;
                width: 100%;
            }
            .status-upload form textarea {
                background: none repeat scroll 0 0 #fff;
                border: medium none;
                -webkit-border-radius: 4px 4px 0 0;
                -moz-border-radius: 4px 4px 0 0;
                -ms-border-radius: 4px 4px 0 0;
                -o-border-radius: 4px 4px 0 0;
                border-radius: 4px 4px 0 0;
                color: #777777;
                float: left;
                font-family: Lato;
                font-size: 14px;
                height: 142px;
                letter-spacing: 0.3px;
                padding: 20px;
                width: 100%;
                resize:vertical;
                outline:none;
                border: 1px solid #F2F2F2;
            }

            .status-upload ul {
                float: left;
                list-style: none outside none;
                margin: 0;
                padding: 0 0 0 15px;
                width: auto;
            }
            .status-upload ul > li {
                float: left;
            }
            .status-upload ul > li > a {
                -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                -ms-border-radius: 4px;
                -o-border-radius: 4px;
                border-radius: 4px;
                color: #777777;
                float: left;
                font-size: 14px;
                height: 30px;
                line-height: 30px;
                margin: 10px 0 10px 10px;
                text-align: center;
                -webkit-transition: all 0.4s ease 0s;
                -moz-transition: all 0.4s ease 0s;
                -ms-transition: all 0.4s ease 0s;
                -o-transition: all 0.4s ease 0s;
                transition: all 0.4s ease 0s;
                width: 30px;
                cursor: pointer;
            }
            .status-upload ul > li > a:hover {
                background: none repeat scroll 0 0 #606060;
                color: #fff;
            }
            .status-upload form button {
                border: medium none;
                -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                -ms-border-radius: 4px;
                -o-border-radius: 4px;
                border-radius: 4px;
                color: #fff;
                float: right;
                font-family: Lato;
                font-size: 14px;
                letter-spacing: 0.3px;
                margin-right: 9px;
                margin-top: 9px;
                margin-bottom: 9px;
                padding: 6px 15px;
                background-color: #5086B2;
            }
            .dropdown > a > span.green:before {
                border-left-color: #2dcb73;
            }
            .status-upload form button > i {
                margin-right: 7px;
            }
            /* CSS Test begin */
            .comment-box {
                margin-top: 30px !important;
            }
            /* CSS Test end */

            .comment-box img {
                width: 50px;
                height: 50px;
            }
            .comment-box .media-left {
                padding-right: 10px;
                width: 65px;
            }
            .comment-box .media-body p {
                border: 1px solid #ddd;
                padding: 10px;
            }
            .comment-box .media-body .media p {
                margin-bottom: 0;
            }
            .comment-box .media-heading {
                background-color: #f5f5f5;
                border: 1px solid #ddd;
                padding: 7px 10px;
                position: relative;
                margin-bottom: -1px;
            }
            .comment-box .media-heading:before {
                content: "";
                width: 12px;
                height: 12px;
                background-color: #f5f5f5;
                border: 1px solid #ddd;
                border-width: 1px 0 0 1px;
                -webkit-transform: rotate(-45deg);
                transform: rotate(-45deg);
                position: absolute;
                top: 10px;
                left: -6px;
            }
            .thumbnail {
                padding:0px;
            }
            .panel {
                position:relative;
            }
            .panel>.panel-heading:after,.panel>.panel-heading:before{
                position:absolute;
                top:11px;left:-16px;
                right:100%;
                width:0;
                height:0;
                display:block;
                content:" ";
                border-color:transparent;
                border-style:solid solid outset;
                pointer-events:none;
            }
            .panel>.panel-heading:after{
                border-width:7px;
                border-right-color:#f7f7f7;
                margin-top:1px;
                margin-left:2px;
            }
            .panel>.panel-heading:before{
                border-right-color:#ddd;
                border-width:8px;
            }
            .row{
                width: 100%;
            }
            .right{
                float: right;
            }

        </style>
    </head>
    <body>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-12">
                <!-- Title -->
                <h1 class="mt-4"><?php echo LR\Filters::escapeHtmlText($post->post_name) /* line 233 */ ?></h1>

                <!-- Author -->
                <p class="lead">
                    vytvořil/a
                    <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Profile:userprofile", ['userId' => $post->post_creator_id])) ?>"><?php
		echo LR\Filters::escapeHtmlText($post->post_creator) /* line 238 */ ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><strong>Přidáno <?php echo LR\Filters::escapeHtmlText($post->post_date) /* line 244 */ ?></p></strong>

                <hr>

                <!-- Post Content -->
                <font size="4"><?php echo LR\Filters::escapeHtmlText($post->post_content) /* line 249 */ ?></font>
                <br>
                <br>
                <br>
                            <h3>Komentáře</h3>
                            <hr>
<?php
		$iterations = 0;
		foreach ($comments as $comment) {
?>

                        <div class="col-sm-1">
                            <div class="thumbnail">
                                <img class="img-responsive user-photo" src="../<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($comment['dbrow']->creator_image)) /* line 259 */ ?>">
                            </div><!-- /thumbnail -->
                        </div><!-- /col-sm-1 -->

                        <div class="col-sm-11">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <strong>Přidal: <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Profile:userprofile", ['userId' => $comment['dbrow']->creator_id])) ?>"><?php
			echo LR\Filters::escapeHtmlText($comment['dbrow']->creator_name) /* line 266 */ ?></a></strong>
                                        <span class="right" class="text-muted">
                                            Přidáno <?php echo LR\Filters::escapeHtmlText($comment['age']) /* line 268 */ ?>

                                        </span>
                                </div>
                                <div class="panel-body">
                                    <?php echo LR\Filters::escapeHtmlText($comment['dbrow']->content) /* line 272 */ ?>

                                </div><!-- /panel-body -->
                            </div><!-- /panel panel-default -->
                        </div>
<?php
			$iterations++;
		}
?>
                <div class="widget-area no-padding blank">
                    <div class="status-upload">
<?php
		$form = $_form = $this->global->formsStack[] = $this->global->uiControl["commenting"];
		?>                        <form<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
		), false) ?>>
                            <textarea placeholder="Přidat komentář"<?php
		$_input = end($this->global->formsStack)["content"];
		echo $_input->getControlPart()->addAttributes(array (
		'placeholder' => NULL,
		))->attributes() ?>><?php echo $_input->getControl()->getHtml() ?></textarea>
                            <ul>
                            </ul>
                            <button class="btn btn-success green"<?php
		$_input = end($this->global->formsStack)["submit"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>><i class="fa fa-share"></i>Zveřejnit</button>
<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), false);
?>                        </form>
                    </div><!-- Status Upload  -->
                </div><!-- Widget Area -->
                <br>
                <br>
                <br>


            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /container -->
    <br>
    <br>
    <br>
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
