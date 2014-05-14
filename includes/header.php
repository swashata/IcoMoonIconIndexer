<?php if ( !defined('ABSPATH') ) die(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>IcoMoon Fonts & Google WebFonts</title>

	<!-- Application Stylesheets -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" />
	<link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.fonticonpicker.min.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.fonticonpicker.bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrapValidator.min.css" />
	<link rel="stylesheet" type="text/css" href="css/shCore.css" />
	<link rel="stylesheet" type="text/css" href="css/shCoreDefault.css" />

	<!-- IcoMoon Stylesheets -->
	<link rel="stylesheet" type="text/css" href="<?php echo ICMPATH . 'style.css' ?>" />

	<!-- Application Scripts -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.fonticonpicker.min.js"></script>
	<script type="text/javascript" src="js/bootstrapValidator.min.js"></script>
	<script type="text/javascript" src="js/shCore.js"></script>
	<script type="text/javascript" src="js/brush/shBrushCss.js"></script>
	<script type="text/javascript" src="js/brush/shBrushJScript.js"></script>
	<script type="text/javascript" src="js/brush/shBrushPlain.js"></script>
	<script type="text/javascript" src="js/brush/shBrushXml.js"></script>
	<script type="text/javascript" src="js/brush/shBrushPhp.js"></script>

	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('.bstooltip').tooltip();
			SyntaxHighlighter.all();
		});
	</script>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">IcoMoonIconIndexer</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li<?php if ( basename( $_SERVER['SCRIPT_FILENAME'] ) == 'index.php' ) echo ' class="active"'; ?>><a href="index.php">Home</a></li>
					<li<?php if ( basename( $_SERVER['SCRIPT_FILENAME'] ) == 'auto-generate.php' ) echo ' class="active"'; ?>><a href="auto-generate.php">Auto Generate</a></li>
					<li<?php if ( basename( $_SERVER['SCRIPT_FILENAME'] ) == 'test-icons.php' ) echo ' class="active"'; ?>><a href="test-icons.php">Test Indexed Icons</a></li>
					<li<?php if ( basename( $_SERVER['SCRIPT_FILENAME'] ) == 'codes.php' ) echo ' class="active"'; ?>><a href="codes.php">Icon Related Codes</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="https://github.com/swashata/IcoMoonIconIndexer">GitHub Project Page</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
	<main id="main">
