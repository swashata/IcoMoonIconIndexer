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
			<p>To get started please edit the file <code><?php echo dirname( __FILE__ ); ?>/config.php</code>. The variables are well documented to get you started.</p>
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
	</div>
<?php get_footer(); ?>
