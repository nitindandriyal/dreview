<link rel="stylesheet" type="text/css" href="development-bundle/themes/base/jquery.ui.all.css" />
<script type="text/javascript" src="development-bundle/jquery-1.4.2.js"></script>
<script type="text/javascript" src="development-bundle/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="development-bundle/ui/jquery.ui.tabs.js"></script>

<script type="text/javascript">
	$(function(){
	    var tabOpts = {
	        disabled:[1]
	    };
	    $("#myTabs").tabs(tabOpts);
	    $("#enable").click(function() {
	        $("#myTabs").tabs("enable", 1);
	    });
	    $("#disable").click(function() {
	        $("#myTabs").tabs("disable", 1);
	    });
	});
	</script>

	<div id="myTabs">
	    <ul>
	    <li class="tabs"><a href="#a">Tab 1</a></li>
	    <li class="tabs"><a href="#b">Tab 2</a></li>
    </ul>
	    <div id="a">This is the content panel linked to the first tab,
	    it is shown by default.</div>
	    <div id="b">This content is linked to the second tab and will
	    be shown when its tab is clicked.</div>
	</div>
	<button id="enable">Enable!</button>
	<button id="disable">Disable!</button>
		