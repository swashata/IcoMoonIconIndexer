<?php
// Include the config file
require_once( dirname( __FILE__ ) . '/config.php' );

// Include the header file
get_header();

// Now do the magic

// First require the iconindexed.php to see if a backup is present
if ( file_exists( ABSPATH . 'iconindexed.php' ) ) {
	require_once ABSPATH . 'iconindexed.php';
}


/**
 * Whether not or used icons from backup (indexed set)
 * @var boolean
 */
$is_backedup = false;

/**
 * Pre generated categories with key => value pair
 * key: The ID of the category
 * value: The label of the category
 *
 * This variable is populated from the configuration file
 * @var array
 */
$categories = array();

/**
 * Flattened icon => category_id array
 * This is populated if a backup is found
 * @var array
 */
$flattened_icons = array();

/**
 * This stores all tags for categories in key => value pair
 * key: The ID of the category
 * value: Array of category tags
 * @var array
 */
$flattened_intl_categories = array();

// Loop through configuration option and index the preset
foreach ( $icon_categories as $cat_config ) {
	$categories[$cat_config['id']] = $cat_config['label'];
	if ( isset( $cat_config['tags'] ) && ! empty( $cat_config['tags'] ) ) {
		$flattened_intl_categories[$cat_config['id']] = $cat_config['tags'];
	}
}

// Check if backup is there
if ( isset( $icomoon_icons ) && is_array( $icomoon_icons ) && ! empty( $icomoon_icons ) ) {
	$is_backedup = true;
	// Index to the flattened icons variable
	foreach ( $icomoon_icons as $preset_icons ) {
		foreach ( $preset_icons['elements'] as $i_key => $icon ) {
			$flattened_icons[$i_key] = $preset_icons['id'];
		}
	}
}

// Get the JSON file
$icm_json = json_decode( file_get_contents( ABSPATH . ICMPATH . 'selection.json' ), true );

// Get all icons
$all_icons = $icm_json['icons'];

// Get class prefix
$class_prefix = $icm_json['preferences']['fontPref']['prefix'];

$total_icons = count( $all_icons );
$icon_total_string_length = strlen( $total_icons );

$total_indexed = 0;
$total_restored = 0;

get_header();
?>
	<style type="text/css">

	</style>
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		// Set the variables
		var iconForm = $('#ipticonform'),
		save_button = $('#save_button'),
		reset_button = $('#reset_button'),
		save_modal = $('#save_modal'),
		classPrefix = '<?php echo $class_prefix; ?>';
		htmlAttr = '<?php echo HTML_ATTR; ?>';
		save_modal.modal({
			keyboard: false,
			show: false
		});

		reset_button.on('click', function(e) {
			e.preventDefault();
			var confirm = window.confirm( 'Are you sure? This can not be undone' );
			if ( confirm ) {
				iconForm.get(0).reset();
				iconForm.find('.hex-code, .image-name, .class-name').trigger('change');
			}
		});

		save_button.on('click', function(e) {
			e.preventDefault();
			save_modal.modal('show');
			save_modal.find('.modal-title').html('Saving Data');
			save_modal.find('.modal-body').html('<p>Please wait...</p>');
			$.post('ajax.php', iconForm.serialize(), function(data, textStatus, xhr) {
				save_modal.find('.modal-title').html('Success');
				save_modal.find('.modal-body').html(data);
			}).fail(function() {
				save_modal.find('.modal-title').html('Error');
				save_modal.find('.modal-body').html('<p>Server Error</p>');
			});
		});

		// Delegated method for changing the hex code and Image Name
		iconForm.on('change keyup', '.class-name', function() {
			var val = $(this).val();
			val = classPrefix + val;
			$(this).closest('.row').find('span.icon-preview-class i').attr('class', val);
		});
		iconForm.on('change keyup', '.hex-code', function() {
			var val = $(this).val();
			val = String.fromCharCode(parseInt(val, 16));
			$(this).closest('.row').find('span.icon-preview-hex i').attr(htmlAttr, val);
		});
		iconForm.on('change keyup', '.image-name', function() {
			var val = $(this).val();
			$(this).closest('.row').find('img.icon-image-preview').attr('src', 'icomoon-new/images/' + val);
		});
	});
	</script>

<div class="container">
	<hr>
	<h1><span class="glyphicon glyphicon-eye-open"></span> Auto Generate Result <span class="label label-primary"><?php echo $total_icons; ?></span></h1>
	<hr>
	<?php if ( $is_backedup ) : ?>
	<div class="alert alert-info">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Restored Backup</strong> A backup from the last index was found and being used. It was created on <code><?php echo $icomoon_indexed_last; ?></code>.
		If you want to start over, then please delete the contents of the file <code>iconindexed.php</code> and reload this page.
	</div>
	<?php endif; ?>
	<form action="ajax.php" method="POST" role="form" id="ipticonform">
		<legend>Customize Icons</legend>
		<ul class="list-group">
			<li class="list-group-item active">
				<div class="row">
					<div class="col-md-2"># class<?php if ( $class_prefix ) echo ' <code>' . $class_prefix . '</code>'; ?></div>
					<div class="col-md-2">Icon Name</div>
					<div class="col-md-2">Hex Code</div>
					<div class="col-md-1 text-center">Font<br /><small>class | hex</small></div>
					<div class="col-md-2">Image Name</div>
					<div class="col-md-1 text-center">Image Preview</div>
					<div class="col-md-2">Category</div>
				</div>
			</li>
			<?php foreach ( $all_icons as $ic_key => $icon ) : ?>
			<?php
			/**
			 * Get the Icon metadata
			 */
			// Icon Name (or CSS class)
			$icon_name = $icon['properties']['name'];

			// We need a fix for $icon_name because of comma separated values
			if ( strpos( $icon_name, ',' ) !== -1 ) {
				$icon_name_parts = explode( ',', $icon_name );
				$icon_name = trim( $icon_name_parts[0] );
				// And add the rest to the tags
				if ( ! isset( $icon['icon']['tags'] ) ) {
					$icon['icon']['tags'] = array();
				}
				$icon['icon']['tags'] = array_merge( $icon['icon']['tags'], array_map( 'trim', $icon_name_parts ) );
			}

			// Beautify Icon Title
			$title = ucfirst( str_replace( array('-', '_'), array( ' ', ' ' ), $icon_name ) );
			$title_part = array();
			if ( preg_match( '/^([^0-9]*)([0-9]+)/i', $title, $title_part ) ) {
				$title = $title_part[1] . ' ' . $title_part[2];
			}

			// Decimal Code
			$icon_key = $icon['properties']['code'];

			// Hexadecimal Code
			$icon_hex = dechex( (int) $icon_key );
			?>
			<li class="list-group-item">
				<div class="row">
					<div class="col-md-2">
						<div class="input-group">
							<span class="input-group-addon"><?php echo str_pad($ic_key + 1, $icon_total_string_length, '0', STR_PAD_LEFT); ?></span>
							<input type="text" name="icon[<?php echo $ic_key ?>][class]" id="inputIcon<?php echo $ic_key ?>Class" class="form-control class-name" value="<?php echo esc_attr( $icon_name ); ?>" required="required" pattern="" title="" />
						</div>
					</div>
					<div class="col-md-2">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-screenshot"></span></span>
							<input type="text" name="icon[<?php echo $ic_key ?>][name]" id="inputIcon<?php echo $ic_key ?>Name" class="form-control icon-name" value="<?php echo esc_attr( $title ); ?>" required="required" pattern="" title="" />
						</div>
					</div>
					<div class="col-md-2">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-edit"></span></span>
							<input type="text" name="icon[<?php echo $ic_key ?>][hex_code]" id="inputIcon<?php echo $ic_key ?>HexCode" class="form-control hex-code" value="<?php echo esc_attr( $icon_hex ); ?>" required="required" pattern="" title="" />
						</div>
					</div>
					<div class="col-md-1 text-center font-previewer">
						<span title="Original Class: <?php echo esc_attr( $icon_name ); ?>" class="icon-preview-class bstooltip"><i class="<?php echo $class_prefix . $icon_name; ?>"></i></span>
						<span title="Original Hexcode: <?php echo esc_attr( $icon_hex ); ?>" class="icon-preview-hex bstooltip"><i <?php echo HTML_ATTR; ?>="<?php echo '&#x' . $icon_hex . ';'; ?>"></i></span>
					</div>
					<div class="col-md-2">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-picture"></span></span>
							<input type="text" name="icon[<?php echo $ic_key ?>][image]" id="inputIcon<?php echo $ic_key ?>Image" class="form-control image-name" value="<?php echo esc_attr( $icon_name ); ?>.png" required="required" pattern="" title="" />
						</div>
					</div>
					<div class="col-md-1 text-center">
						<img class="icon-image-preview bstooltip" title="Original Image: <?php echo esc_attr( $icon_name ); ?>.png" src="<?php echo ICMIMG . esc_attr( $icon_name ); ?>.png" alt="Not Found" />
					</div>
					<div class="col-md-2">
						<?php
						$selected = '';
						$msg = '';
						$glyphicon = '';
						// First check if the icon is already set from the previously indexed set
						if ( isset( $flattened_icons[$icon_key] ) ) {
							$selected = $flattened_icons[$icon_key];
							$msg = 'Restored from backup';
							$glyphicon = 'floppy-open';
							$total_restored++;
						// No? Then let's do our magic
						} else {
							// Check for material icons
							// We check inside the material variable
							foreach ( $material_icons as $micon ) {
								if ( in_array( $icon_name, $micon['icons'] ) ) {
									$selected = $micon['id'];
									$msg = 'Matched from material icon: ' . $micon['label'];
									break;
								}
							}

							// Check for the tags directly inside
							if ( $selected == '' && isset( $icon['icon']['tags'] ) && is_array( $icon['icon']['tags'] ) && ! empty( $icon['icon']['tags'] ) ) {
								// Loop through all icon tags set in selection.json
								foreach ( $icon['icon']['tags'] as $tag ) {
									$tag = trim( $tag );
									// Loop through all tags set inside configurational categories
									foreach ( $flattened_intl_categories as $category_id => $tags ) {
										// Is the tag inside the tags of the category?
										if ( in_array( $tag, $tags ) || preg_match( '/(\-?)' . $tag . '(\-?)/', implode( '-', $tags ) ) ) {
											// It is, so set it and break the foreach loops
											$selected = $category_id;
											$msg = 'Matched from icon tags: ' . implode( ', ', $icon['icon']['tags'] );
											break 2;
										}
									}
								}
							}
							// If selected is still empty then try from category tags and title
							if ( $selected == '' ) {
								// Lets try to tag it from the title
								foreach ( $flattened_intl_categories as $category_id => $tags ) {
									// Check if the tags are there in the beginning of the title
									if ( preg_match( '/^(' . implode( ' |', $tags ) . ' )/i', $title ) ) {
										$msg = 'Matched from category tags';
										$selected = $category_id;
										break;
									// Check if tags are in between
									} elseif ( preg_match( '/( ' . implode( ' | ', $tags ) . ' )/i', $title ) ) {
										$msg = 'Matched from category tags';
										$selected = $category_id;
										break;
									// Check if tags are at the end
									} elseif ( preg_match( '/( ' . implode( '| ', $tags ) . ')$/i', $title ) ) {
										$msg = 'Matched from category tags';
										$selected = $category_id;
										break;
									// Check if title starts and ends with the tag only
									} elseif ( preg_match( '/^(' . implode( '|', $tags ) . ')$/i', $title ) ) {
										$msg = 'Matched from category tags';
										$selected = $category_id;
										break;
									}
								}
							}

							// Set the selected to other category if none found
							if ( $selected == '' ) {
								$msg = 'No match';
								if ( isset( $icon['icon']['tags'] ) ) {
									$msg .= '. Icon Tags: ' . implode( ', ', $icon['icon']['tags'] );
								}
								$selected = 'others';
								$glyphicon = 'remove';
							} else {
								$total_indexed++;
								$glyphicon = 'ok';
							}
						}
						?>
						<a href="javascript:;" class="btn btn-default pull-right bstooltip" title="<?php echo esc_attr( $msg ); ?>"><span class="glyphicon glyphicon-<?php echo $glyphicon; ?>"></span></a>
						<select autocomplete="off" name="icon[<?php echo $ic_key ?>][cat]" id="inputIcon<?php echo $ic_key ?>Cat" class="form-control pull-left cat" required="required">
							<?php foreach ( $categories as $cat_id => $cat_label ) : ?>
							<option value="<?php echo $cat_id ?>"<?php if ( $selected == $cat_id ) echo ' selected="selected"' ?>><?php echo $cat_label; ?></option>
							<?php endforeach; ?>
						</select>
						<div class="clearfix"></div>
					</div>
				</div>
			</li>
			<?php endforeach; ?>
		</ul>
		<hr />
		<p>
			<?php if ( isset( $icomoon_icons ) ) : ?>
			<span class="text-muted">Total Restored: <?php echo $total_restored ?>/<?php echo $total_icons; ?></span>
			<?php endif; ?>
			<span class="text-muted">Total Auto Indexed: <?php echo $total_indexed ?>/<?php echo ( $total_icons - $total_restored ); ?></span>
		</p>
		<hr />
		<p>
			<button type="reset" id="reset_button" class="btn btn-danger btn-lg pull-left"><span class="glyphicon glyphicon-remove"></span> Reset Form</button>
			<button type="submit" id="save_button" class="btn btn-success btn-lg pull-right"><span class="glyphicon glyphicon-ok"></span> Click to Generate Code</button>
			<span class="clearfix"></span>
		</p>
	</form>
</div>

<div class="modal fade" id="save_modal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Generating Code</h4>
			</div>
			<div class="modal-body">
				<p>Please wait...</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php get_footer(); ?>
