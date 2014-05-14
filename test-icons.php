<?php
require_once dirname( __FILE__ ) . '/config.php';
// First require the iconindexed.php to see if a backup is present
if ( file_exists( ABSPATH . 'iconindexed.php' ) ) {
	require_once ABSPATH . 'iconindexed.php';
	$max_memory = number_format( memory_get_peak_usage( true ) / 1024 ) . 'KB';
}

$information = array(
	'cat_count' => 0,
	'icon_count' => 0,
	'duplicate_count' => 0,
);
$errors = array();
$indexed_icons = array();
// Get the JSON file
$icm_json = json_decode( file_get_contents( ABSPATH . ICMPATH . 'selection.json' ), true );

// Get class prefix
$class_prefix = $icm_json['preferences']['fontPref']['prefix'];
unset( $icm_json );
get_header();
?>
<div class="container">
	<?php if ( ! isset( $icomoon_icons ) ) : ?>
	<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>No Indexed Icons Found</strong> It seems you haven't run an indexing on the icons yet. Please click on the Auto Generate link to get started.
	</div>
	<?php else: ?>
	<?php if ( isset( $max_memory ) ) : ?>
	<div class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Max Memory used for storing icons</strong> <code><?php echo $max_memory ?></code>
	</div>
	<?php endif; ?>
	<hr />
	<h1><span class="glyphicon glyphicon-eye-open"></span> Indexed Icons from Icomoon library</h1>
	<p class="text-muted lead">Last Script Runtime: <code><?php echo $icomoon_indexed_last; ?></code></p>

	<?php foreach ( $icomoon_icons as $icomoon_index => $icomoon ) : ?>
	<?php
	$icon_count = 0;
	if ( isset( $icomoon['elements'] ) && is_array( $icomoon['elements'] ) ) {
		$icon_count = count( $icomoon['elements'] );
	}
	$information['cat_count']++;
	$information['icon_count'] += $icon_count;
	if ( ! isset( $icomoon['label'] ) ) {
		$errors[] = 'Required <code>label</code> attribute not found in a category indexed: <code>' . $icomoon_index . '</code>';
		$icomoon['label'] = '<span class="text-danger">Label Index: ' . $icomoon_index . '</span>';
	}
	if ( ! isset( $icomoon['id'] ) ) {
		$errors[] = 'Required <code>id</code> attribute not found in a category indexed: <code>' . $icomoon_index . '</code>';
		$icomoon['id'] = '<span class="text-danger">ID Index: ' . $icomoon_index . '</span>';
	}
	?>
	<hr />
	<h2><span class="glyphicon glyphicon-th-large"></span> <?php echo $icomoon['label'] ?> <span class="label label-primary">id: <?php echo $icomoon['id']; ?></span> <span class="label label-default"><?php echo $icon_count ?> icons</span></h2>
	<hr />
	<?php if ( ! isset( $icomoon['elements'] ) || ! is_array( $icomoon['elements'] ) || empty( $icomoon['elements'] ) ) : ?>
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Oops!</strong> Looks like this category does not have any icons in it! Check the code?
	</div>
	<?php $errors[] = 'No icon set for category: <code>' . $icomoon['id'] . '</code>'; ?>
	<?php else : ?>
	<ul class="list-group">
		<li class="list-group-item active">
			<div class="row">
				<div class="col-md-3"><h4>Name</h4></div>
				<div class="col-md-2"><h4>Class <small><code><?php echo $class_prefix; ?></code></small></h4></div>
				<div class="col-md-1"><h4>HexCode</h4></div>
				<div class="col-md-1"><h4>HexAttr</h4></div>
				<div class="col-md-3 text-center"><h4>Font - <small>by class & hexcode</small></h4></div>
				<div class="col-md-2 text-center"><h4>Image</h4></div>
			</div>
		</li>
		<?php foreach ( $icomoon['elements'] as $dec_key => $label ) : ?>
		<li class="list-group-item">
			<div class="row">
				<div class="col-md-3">
					<h4>
						<?php echo $label; ?>
						<?php
						if ( in_array( $dec_key, $indexed_icons ) ) {
							echo '<span class="text-danger">Duplicate</span>';
							$information['duplicate_count']++;
							$errors[] = 'Duplicate icon <code>0x' . dechex( $dec_key ) . '</code>found in category: <code>' . $icomoon['id'] . '</code>';
						} else {
							$indexed_icons[] = $dec_key;
						}
						?>
					</h4>
				</div>
				<div class="col-md-2">
					<code><?php echo $icomoon['element_classes'][$dec_key]; ?></code>
				</div>
				<div class="col-md-1">
					<code>0x<?php echo dechex( $dec_key ); ?></code>
				</div>
				<div class="col-md-1">
					<code>&amp;#x<?php echo dechex( $dec_key ); ?>;</code>
				</div>
				<div class="col-md-3 font-previewer text-center">
					<span class="btn btn-default bstooltip" title="Printed by Title"><i class="<?php echo $icomoon['element_classes'][$dec_key]; ?>"></i></span>
					<span class="btn btn-default bstooltip" title="Printed by HTML data attribute"><i <?php echo HTML_ATTR; ?>="&#x<?php echo dechex( $dec_key ); ?>;"></i></span>
				</div>
				<div class="col-md-2 text-center">
					<?php
					if ( isset( $icomoon_images[$dec_key] ) ) {
						if ( file_exists( ABSPATH . ICMIMG . $icomoon_images[$dec_key] ) ) {
							echo '<img src="' . ICMIMG . '/' . $icomoon_images[$dec_key] . '" />';
						} else {
							$errors[] = 'Image file not found for icon: <code>0x' . dechex( $dec_key ) . '</code>';
							echo '<span class="text-danger">Image not found</span>';
						}

					} else {
						$errors[] = 'Image not set for icon: <code>0x' . dechex( $dec_key ) . '</code>';
						echo '<span class="text-danger">Image not set</span>';
					}
					?>
				</div>
			</div>
		</li>
		<?php endforeach; ?>
	</ul>
	<?php endif; ?>
	<?php endforeach; ?>
	<?php $information['error_count'] = count( $errors ); ?>
	<hr />
	<h1><span class="glyphicon glyphicon-exclamation-sign"></span> Indexing Information</h1>
	<hr />
	<ul class="list-group">
		<li class="list-group-item list-group-item-success">
			<span class="badge"><?php echo $information['cat_count']; ?></span>
			<h4>Total Categories</h4>
		</li>
		<li class="list-group-item list-group-item-info">
			<span class="badge"><?php echo $information['icon_count']; ?></span>
			<h4>Total Icons</h4>
		</li>
		<li class="list-group-item list-group-item-warning">
			<span class="badge"><?php echo $information['error_count']; ?></span>
			<h4>Total Errors</h4>
		</li>
		<li class="list-group-item list-group-item-danger">
			<span class="badge"><?php echo $information['duplicate_count']; ?></span>
			<h4>Duplicate Icons Found</h4>
		</li>
	</ul>
	<hr />
	<h1><span class="glyphicon glyphicon-remove"></span> Errors Found</h1>
	<hr />
	<?php if ( empty( $errors ) ) : ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong><span class="glyphicon glyphicon-ok"></span> Horray!</strong> No errors... Well done.
	</div>
	<?php else : ?>
	<ul class="list-group">
		<?php foreach ( $errors as $error ) : ?>
		<li class="list-group-item list-group-item-danger"><?php echo $error; ?></li>
		<?php endforeach; ?>
	</ul>
	<?php endif; ?>
	<hr />
	<?php endif; ?>
</div>
<?php get_footer(); ?>
