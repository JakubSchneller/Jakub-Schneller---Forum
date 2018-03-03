<?php
// source: /Applications/MAMP/htdocs/test/app/presenters/templates/components/footer.latte

use Latte\Runtime as LR;

class Template20a03d1012 extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>
<footer class="footer text-center">
	<div class="copyrights bg-black" style="margin-top: 15px ">
		<p>Praha © 2017, All Rights Reserved
			<br>
			<span>Web Design By: Jakub Schneller</span></p>
		<p><a href="https://www.facebook.com/plantaznik.schneller" target="_blank">Facebook<i aria-hidden="true"></i> </a></p>
	</div>
</footer><?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}

}
