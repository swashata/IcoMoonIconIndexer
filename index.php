<?php
// Include the config file
require_once( dirname( __FILE__ ) . '/config.php' );

// Include the header file
get_header();
?>

	<div class="jumbotron">
		<div class="container">
			<h1>IcoMoonIconIndexer <small>v1.0.0</small></h1>
			<p>This script helps index and categorize icons generated from <a href="http://icomoon.io">IcoMoon Apps</a> and create <code>PHP array</code>, <code>JavaScript Object|Array</code> variables and/or <code>SELECT</code> HTML for your use.</p>
			<p>To get started please edit the file <code>config.php</code>. The variables are well documented to get you started.</p>
			<p>
				This script uses <a href="https://github.com/micc83/fontIconPicker">fontIconPicker</a> to show how the generated HTML can be used.
			</p>
			<p>To get started please use the Auto Generate link and then move to Test Indexed Icons. You can also see and get PHP, JavaScript and HTML code for direct usage.</p>
			<p>
				<a href="auto-generate.php" class="btn btn-primary btn-lg">Auto Generate Index</a>
				<a href="test-icons.php" class="btn btn-primary btn-lg">Test Indexed Icons</a>
				<a href="codes.php" class="btn btn-primary btn-lg">Get Sample Codes</a>
			</p>
		</div>
		<hr />
		<h2><span class="glyphicon glyphicon-ok"></span> What it does</h2>
		<hr />
		<p>
			What the script basically do is, parse the <code>selection.json</code> file from the icon package downloaded from <a href="http://icomoon.io">IcoMoon App</a> and categorizes icons (by tags) and stores them in a <code>PHP Array</code>.
		</p>
		<p>
			This helps you in several ways:
		</p>
		<ul>
			<li>You do not have to face the hectic way to index and categorize the icons yourself.</li>
			<li>It generates server side PHP array which processed on the server not on client through javascript. So it results in faster output and you can do less work on client side.</li>
			<li>The categorizing is intelligent and very simple to use. Just modify the <code>config.php</code>, mention the tags and run the auto-generator.</li>
			<li>If you do not like what the script has generated, then you always have the option to change the category through web interface.</li>
			<li>It does all the job for writing PHP array, validating etc... So you have to do a very little work.</li>
		</ul>
		<hr />
		<h2><span class="glyphicon glyphicon-remove"></span> What it does not</h2>
		<hr />
		<p>Sadly this is a script and it has it's limitations.</p>
		<ul>
			<li>It will not generate properly if tags are not set. Sample tags are already there to index and category the free IcoMoon icon set.</li>
			<li>It will not magically put the <code>fontIconPicker</code> on your site. This will just ease up the process. For implementation guide please check the examples and source code once you've done categorizing.</li>
			<li>It will not get you a beer.</li>
		</ul>
		<hr />
		<h2><span class="glyphicon glyphicon-plus"></span> Additional Features</h2>
		<hr />
		<ul>
			<li>Along with indexing icons, it indexes images too. So just download the image set for any icon library and this app will generate image codes for you.</li>
			<li>Comes with predefined functions (see below) with which you can do quite a lot.</li>
		</ul>
		<hr />
		<h2><span class="glyphicon glyphicon-hand-right"></span> Getting Started</h2>
		<hr />
		<p>We are assuming you know a little PHP and some JavaScript. You have some place to host this script, or atleast locally (using <a href="http://www.wampserver.com/en/">WAMP</a> or <a href="http://www.mamp.info/en/">MAMP</a> and hey if you are using linux, I don't need to say much).</p>
		<h3></h3>
	</div>
<?php get_footer(); ?>
