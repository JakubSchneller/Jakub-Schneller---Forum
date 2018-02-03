<?php
// source: /Applications/MAMP/htdocs/test/app/presenters/templates/Footer/footer.latte

use Latte\Runtime as LR;

class Templated09896f2ca extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>
<!DOCTYPE html>
<html>
<head>
	<link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css"> <!--css file link in bootstrap folder-->
	<style>
		html {
			position: relative;
			min-height: 100%;
		}
		body {
			margin-bottom: 90px;
		}
		.footer {
			position: absolute;
			bottom: 0;
			height: 90px;
			width: 100%;
			background-color: #222222;
			color: white;
		@import url(http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css);
	</style>
</head>
<header>

</header>
<body>
<footer class="footer text-center">
	<div class="copyrights bg-black" style="margin-top: 15px ">
		<p>Praha © 2017, All Rights Reserved
			<br>
			<span>Web Design By: Jakub Schneller</span></p>
		<p><a href="https://www.facebook.com/plantaznik.schneller" target="_blank">Facebook<i aria-hidden="true"></i> </a></p>
	</div>
</footer>
</body>
</html>
<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}

}
