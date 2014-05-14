<?php
require_once dirname( __FILE__ ) . '/config.php';
// First require the iconindexed.php to see if a backup is present
if ( file_exists( ABSPATH . 'iconindexed.php' ) ) {
	require_once ABSPATH . 'iconindexed.php';
}

// Now get the functions
require_once ABSPATH . 'functions.php';

get_header();
?>
<div class="container">
	<?php if ( ! isset( $icomoon_icons ) ) : ?>
	<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>No Indexed Icons Found</strong> It seems you haven't run an indexing on the icons yet. Please click on the Auto Generate link to get started.
	</div>
	<?php else : ?>
	<h1><span class="glyphicon glyphicon-check"></span> Examples and Codes</h1>
	<div class="well well-sm">
		<p>This Application comes with a few PHP functions which can generate:</p>
		<ul>
			<li>HTML <code>SELECT</code> elements (it's options).</li>
			<li>JSON for direct use with <a href="https://github.com/micc83/fontIconPicker">fontIconPicker</a>.</li>
		</ul>
		<p>Shown below are some real world examples and it's codes. The form is validated by the <a href="http://bootstrapvalidator.com/">BootstrapValidator</a>.</p>
	</div>
	<form action="" method="GET" role="form" class="form-horizontal">
		<hr />
		<h2><span class="glyphicon glyphicon-edit"></span> Using on generic <code>SELECT</code> HTML</h2>
		<hr />
		<!-- by class -->
		<div class="form-group">
			<label for="" class="col-md-4">Populated by <code>CLASS</code> as <code>OPTION</code> value:</label>
			<div class="col-md-4">
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
					<select name="select_1" id="select_1" class="form-control by_class">
						<option value="" selected="selected">--please select--</option>
						<?php echo imii_generate_select_options( $icomoon_icons, 'class' ); ?>
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<p class="form-control-static">Selected Value: <span class="text-primary"></span></p>
			</div>
		</div>

		<!-- by decimal key -->
		<div class="form-group">
			<label for="" class="col-md-4">Populated by <code>Decimal Key</code> as <code>OPTION</code> value:</label>
			<div class="col-md-4">
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
					<select name="select_2" id="select_2" class="form-control by_class">
						<option value="" selected="selected">--please select--</option>
						<?php echo imii_generate_select_options( $icomoon_icons, 'key' ); ?>
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<p class="form-control-static">Selected Value: <span class="text-primary"></span></p>
			</div>
		</div>

		<!-- by Unicode -->
		<div class="form-group">
			<label for="" class="col-md-4">Populated by <code>Unicode</code> as <code>OPTION</code> value:</label>
			<div class="col-md-4">
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
					<select name="select_3" id="select_3" class="form-control by_class">
						<option value="" selected="selected">--please select--</option>
						<?php echo imii_generate_select_options( $icomoon_icons, 'unicode' ); ?>
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<p class="form-control-static">Selected Value: <span class="text-primary"></span></p>
			</div>
		</div>
		<button type="submit" class="btn btn-primary btn-lg">Submit</button>
	</form>
	<?php endif; ?>
</div>
<?php get_footer(); ?>
