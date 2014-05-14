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
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('#example_form').bootstrapValidator({
			feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			submitHandler: function(validator, form, submitButton) {
				alert('Validated');
			}
		}).on('change', 'select, input', function() {
			var val = $(this).val(),
			parent = $(this).closest('.form-group'),
			valueContainer = parent.find('.track-change .text-primary'),
			iconContainer = parent.find('.track-change .text-success');
			valueContainer.html(val);
			if ( val == '' ) {
				iconContainer.html('');
			} else if ( iconContainer.hasClass('by_decimal') ) {
				iconContainer.html('<i <?php echo HTML_ATTR ?>="&#x' + parseInt( val ).toString(16) + ';"></i>' );
			} else if ( iconContainer.hasClass('by_hex') ) {
				iconContainer.html('<i <?php echo HTML_ATTR ?>="&#x' + val + ';"></i>' );
			} else if ( iconContainer.hasClass('by_unicode') ) {
				iconContainer.html('<i <?php echo HTML_ATTR ?>="' + val + '"></i>' );
			} else {
				iconContainer.html('<i class="' + val + '"></i>' );
			}
		}).find('select, input').trigger('change');
	});
</script>
<div class="container">
	<?php if ( ! isset( $icomoon_icons ) ) : ?>
	<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>No Indexed Icons Found</strong> It seems you haven't run an indexing on the icons yet. Please click on the Auto Generate link to get started.
	</div>
	<?php else : ?>
	<h1><span class="glyphicon glyphicon-check"></span> Examples and Codes</h1>
	<hr />
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Setup Instruction</h3>
		</div>
		<div class="panel-body">
			<p>This Application comes with a few PHP functions which can generate:</p>
			<ul>
				<li>HTML <code>SELECT</code> elements (it's options).</li>
				<li>JSON for direct use with <a href="https://github.com/micc83/fontIconPicker">fontIconPicker</a>.</li>
			</ul>
			<p>Shown below are some real world examples and it's codes. The form is validated by the <a href="http://bootstrapvalidator.com/">BootstrapValidator</a>.</p>
			<p>Before you try out any of the demo on your server, make sure to include the generated file <code>iconindexed.php</code> and the <code>functions.php</code>.</p>
			<pre class="brush: php">
&lt;?php
// First require the iconindexed.php to see if a backup is present
if ( file_exists( ABSPATH . &#039;iconindexed.php&#039; ) ) {
	require_once ABSPATH . &#039;iconindexed.php&#039;;
}

// Now get the functions
require_once ABSPATH . &#039;functions.php&#039;;

// Check for errors like this
if ( ! isset( $icomoon_icons ) ) {
	// Error has occured
}
			</pre>
		</div>
	</div>

	<form action="" method="GET" role="form" class="form-horizontal" id="example_form">
		<hr />
		<h2><span class="glyphicon glyphicon-edit"></span> Using on generic <code>SELECT</code> HTML</h2>
		<hr />

		<!-- by class -->
		<div class="form-group">
			<label for="" class="col-md-4">Populated by <code>CLASS</code> as <code>OPTION</code> value:</label>
			<div class="col-md-4">
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
					<select data-bv-notempty="true" data-bv-notempty-message="You must pick a font" name="select_1" id="select_1" class="form-control by_class">
						<option value="" selected="selected">--please select--</option>
						<?php echo imii_generate_select_options( $icomoon_icons, 'class' ); ?>
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<p class="form-control-static track-change">Selected Value: <span class="text-primary"></span> | Selected Icon: <span class="text-success by_class"></span></p>
			</div>
		</div>

		<div class="form-group">
			<hr />
			<h3><span class="glyphicon glyphicon-fire"></span> Source Code <code>PHP</code></h3>
			<hr />
			<pre class="brush: php">
&lt;div class=&quot;form-group&quot;&gt;
	&lt;label for=&quot;&quot; class=&quot;col-md-4&quot;&gt;Populated by &lt;code&gt;CLASS&lt;/code&gt; as &lt;code&gt;OPTION&lt;/code&gt; value:&lt;/label&gt;
	&lt;div class=&quot;col-md-4&quot;&gt;
		&lt;div class=&quot;input-group&quot;&gt;
			&lt;span class=&quot;input-group-addon&quot;&gt;&lt;span class=&quot;glyphicon glyphicon-asterisk&quot;&gt;&lt;/span&gt;&lt;/span&gt;
			&lt;select data-bv-notempty=&quot;true&quot; data-bv-notempty-message=&quot;You must pick a font&quot; name=&quot;select_1&quot; id=&quot;select_1&quot; class=&quot;form-control by_class&quot;&gt;
				&lt;option value=&quot;&quot; selected=&quot;selected&quot;&gt;--please select--&lt;/option&gt;
				&lt;?php echo imii_generate_select_options( $icomoon_icons, &#039;class&#039; ); ?&gt;
			&lt;/select&gt;
		&lt;/div&gt;
	&lt;/div&gt;
	&lt;div class=&quot;col-md-4&quot;&gt;
		&lt;p class=&quot;form-control-static track-change&quot;&gt;Selected Value: &lt;span class=&quot;text-primary&quot;&gt;&lt;/span&gt; | Selected Icon: &lt;span class=&quot;text-success by_class&quot;&gt;&lt;/span&gt;&lt;/p&gt;
	&lt;/div&gt;
&lt;/div&gt;
			</pre>
		</div>

		<!-- by decimal key -->
		<div class="form-group">
			<label for="" class="col-md-4">Populated by <code>Decimal Key</code> as <code>OPTION</code> value:</label>
			<div class="col-md-4">
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
					<select data-bv-notempty="true" data-bv-notempty-message="You must pick a font" name="select_2" id="select_2" class="form-control by_class">
						<option value="" selected="selected">--please select--</option>
						<?php echo imii_generate_select_options( $icomoon_icons, 'key' ); ?>
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<p class="form-control-static track-change">Selected Value: <span class="text-primary"></span> | Selected Icon: <span class="text-success by_decimal"></span></p>
			</div>
		</div>

		<div class="form-group">
			<hr />
			<h3><span class="glyphicon glyphicon-fire"></span> Source Code <code>PHP</code></h3>
			<hr />
			<pre class="brush: php">
&lt;div class=&quot;form-group&quot;&gt;
	&lt;label for=&quot;&quot; class=&quot;col-md-4&quot;&gt;Populated by &lt;code&gt;Decimal Key&lt;/code&gt; as &lt;code&gt;OPTION&lt;/code&gt; value:&lt;/label&gt;
	&lt;div class=&quot;col-md-4&quot;&gt;
		&lt;div class=&quot;input-group&quot;&gt;
			&lt;span class=&quot;input-group-addon&quot;&gt;&lt;span class=&quot;glyphicon glyphicon-asterisk&quot;&gt;&lt;/span&gt;&lt;/span&gt;
			&lt;select data-bv-notempty=&quot;true&quot; data-bv-notempty-message=&quot;You must pick a font&quot; name=&quot;select_2&quot; id=&quot;select_2&quot; class=&quot;form-control by_class&quot;&gt;
				&lt;option value=&quot;&quot; selected=&quot;selected&quot;&gt;--please select--&lt;/option&gt;
				&lt;?php echo imii_generate_select_options( $icomoon_icons, &#039;key&#039; ); ?&gt;
			&lt;/select&gt;
		&lt;/div&gt;
	&lt;/div&gt;
	&lt;div class=&quot;col-md-4&quot;&gt;
		&lt;p class=&quot;form-control-static track-change&quot;&gt;Selected Value: &lt;span class=&quot;text-primary&quot;&gt;&lt;/span&gt; | Selected Icon: &lt;span class=&quot;text-success by_decimal&quot;&gt;&lt;/span&gt;&lt;/p&gt;
	&lt;/div&gt;
&lt;/div&gt;
			</pre>
		</div>

		<!-- by Unicode -->
		<div class="form-group">
			<label for="" class="col-md-4">Populated by <code>Unicode</code> as <code>OPTION</code> value:</label>
			<div class="col-md-4">
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
					<select data-bv-notempty="true" data-bv-notempty-message="You must pick a font" name="select_3" id="select_3" class="form-control by_class">
						<option value="" selected="selected">--please select--</option>
						<?php echo imii_generate_select_options( $icomoon_icons, 'unicode' ); ?>
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<p class="form-control-static track-change">Selected Value: <span class="text-primary"></span> | Selected Icon: <span class="text-success by_unicode"></span></p>
			</div>
		</div>

		<div class="form-group">
			<hr />
			<h3><span class="glyphicon glyphicon-fire"></span> Source Code <code>PHP</code></h3>
			<hr />
			<pre class="brush: php">
&lt;div class=&quot;form-group&quot;&gt;
	&lt;label for=&quot;&quot; class=&quot;col-md-4&quot;&gt;Populated by &lt;code&gt;Unicode&lt;/code&gt; as &lt;code&gt;OPTION&lt;/code&gt; value:&lt;/label&gt;
	&lt;div class=&quot;col-md-4&quot;&gt;
		&lt;div class=&quot;input-group&quot;&gt;
			&lt;span class=&quot;input-group-addon&quot;&gt;&lt;span class=&quot;glyphicon glyphicon-asterisk&quot;&gt;&lt;/span&gt;&lt;/span&gt;
			&lt;select data-bv-notempty=&quot;true&quot; data-bv-notempty-message=&quot;You must pick a font&quot; name=&quot;select_3&quot; id=&quot;select_3&quot; class=&quot;form-control by_class&quot;&gt;
				&lt;option value=&quot;&quot; selected=&quot;selected&quot;&gt;--please select--&lt;/option&gt;
				&lt;?php echo imii_generate_select_options( $icomoon_icons, &#039;unicode&#039; ); ?&gt;
			&lt;/select&gt;
		&lt;/div&gt;
	&lt;/div&gt;
	&lt;div class=&quot;col-md-4&quot;&gt;
		&lt;p class=&quot;form-control-static track-change&quot;&gt;Selected Value: &lt;span class=&quot;text-primary&quot;&gt;&lt;/span&gt; | Selected Icon: &lt;span class=&quot;text-success by_unicode&quot;&gt;&lt;/span&gt;&lt;/p&gt;
	&lt;/div&gt;
&lt;/div&gt;
			</pre>
		</div>

		<!-- by Hexcode -->
		<div class="form-group">
			<label for="" class="col-md-4">Populated by <code>Hexadecimal String</code> as <code>OPTION</code> value:</label>
			<div class="col-md-4">
				<div class="input-group">
					<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
					<select data-bv-notempty="true" data-bv-notempty-message="You must pick a font" name="select_4" id="select_4" class="form-control by_class">
						<option value="" selected="selected">--please select--</option>
						<?php echo imii_generate_select_options( $icomoon_icons, 'hex' ); ?>
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<p class="form-control-static track-change">Selected Value: <span class="text-primary"></span> | Selected Icon: <span class="text-success by_hex"></span></p>
			</div>
		</div>

		<div class="form-group">
			<hr />
			<h3><span class="glyphicon glyphicon-fire"></span> Source Code <code>PHP</code></h3>
			<hr />
			<pre class="brush: php">
&lt;div class=&quot;form-group&quot;&gt;
	&lt;label for=&quot;&quot; class=&quot;col-md-4&quot;&gt;Populated by &lt;code&gt;Hexadecimal String&lt;/code&gt; as &lt;code&gt;OPTION&lt;/code&gt; value:&lt;/label&gt;
	&lt;div class=&quot;col-md-4&quot;&gt;
		&lt;div class=&quot;input-group&quot;&gt;
			&lt;span class=&quot;input-group-addon&quot;&gt;&lt;span class=&quot;glyphicon glyphicon-asterisk&quot;&gt;&lt;/span&gt;&lt;/span&gt;
			&lt;select data-bv-notempty=&quot;true&quot; data-bv-notempty-message=&quot;You must pick a font&quot; name=&quot;select_4&quot; id=&quot;select_4&quot; class=&quot;form-control by_class&quot;&gt;
				&lt;option value=&quot;&quot; selected=&quot;selected&quot;&gt;--please select--&lt;/option&gt;
				&lt;?php echo imii_generate_select_options( $icomoon_icons, &#039;hex&#039; ); ?&gt;
			&lt;/select&gt;
		&lt;/div&gt;
	&lt;/div&gt;
	&lt;div class=&quot;col-md-4&quot;&gt;
		&lt;p class=&quot;form-control-static track-change&quot;&gt;Selected Value: &lt;span class=&quot;text-primary&quot;&gt;&lt;/span&gt; | Selected Icon: &lt;span class=&quot;text-success by_hex&quot;&gt;&lt;/span&gt;&lt;/p&gt;
	&lt;/div&gt;
&lt;/div&gt;
			</pre>
		</div>

		<hr />
		<h2><span class="glyphicon glyphicon-edit"></span> Using on fontIconPicker Elements</h2>
		<hr />

		<!-- fontIconPicker - by class -->
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				var source = <?php echo imii_generate_fip_source_json( $icomoon_icons, 'class' ); ?>;
				var searchSource = <?php echo imii_generate_fip_search_json( $icomoon_icons ); ?>;
				$('#fip_1').fontIconPicker({
					source: source,
					searchSource: searchSource,
					theme: 'fip-bootstrap'
				});
			});
		</script>
		<div class="form-group">
			<label for="" class="col-md-4">Populated by <code>classes</code> into <code>source</code> option and <code>Icon Name</code> into <code>searchSource</code> option:</label>
			<div class="col-md-4">
				<input data-bv-notempty="true" data-bv-notempty-message="You must pick a font" type="text" name="fip_1" id="fip_1" value="" />
			</div>
			<div class="col-md-4">
				<p class="form-control-static track-change">Selected Value: <span class="text-primary"></span> | Selected Icon: <span class="text-success by_class"></span></p>
			</div>
		</div>

		<div class="form-group">
			<hr />
			<h3><span class="glyphicon glyphicon-fire"></span> Source Code <code>PHP</code></h3>
			<hr />
			<pre class="brush: php">
&lt;script type=&quot;text/javascript&quot;&gt;
	jQuery(document).ready(function($) {
		var source = &lt;?php echo imii_generate_fip_source_json( $icomoon_icons, &#039;class&#039; ); ?&gt;;
		var searchSource = &lt;?php echo imii_generate_fip_search_json( $icomoon_icons ); ?&gt;;
		$(&#039;#fip_1&#039;).fontIconPicker({
			source: source,
			searchSource: searchSource,
			theme: &#039;fip-bootstrap&#039;
		});
	});
&lt;/script&gt;
&lt;div class=&quot;form-group&quot;&gt;
	&lt;label for=&quot;&quot; class=&quot;col-md-4&quot;&gt;Populated by &lt;code&gt;classes&lt;/code&gt; into &lt;code&gt;source&lt;/code&gt; option and &lt;code&gt;Icon Name&lt;/code&gt; into &lt;code&gt;searchSource&lt;/code&gt; option:&lt;/label&gt;
	&lt;div class=&quot;col-md-4&quot;&gt;
		&lt;input data-bv-notempty=&quot;true&quot; data-bv-notempty-message=&quot;You must pick a font&quot; type=&quot;text&quot; name=&quot;fip_1&quot; id=&quot;fip_1&quot; value=&quot;&quot; /&gt;
	&lt;/div&gt;
	&lt;div class=&quot;col-md-4&quot;&gt;
		&lt;p class=&quot;form-control-static track-change&quot;&gt;Selected Value: &lt;span class=&quot;text-primary&quot;&gt;&lt;/span&gt; | Selected Icon: &lt;span class=&quot;text-success by_class&quot;&gt;&lt;/span&gt;&lt;/p&gt;
	&lt;/div&gt;
&lt;/div&gt;
			</pre>
		</div>

		<!-- fontIconPicker - by decimal value (key) -->
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				var source = <?php echo imii_generate_fip_source_json( $icomoon_icons, 'key' ); ?>;
				var searchSource = <?php echo imii_generate_fip_search_json( $icomoon_icons ); ?>;
				$('#fip_2').fontIconPicker({
					source: source,
					searchSource: searchSource,
					theme: 'fip-bootstrap',
					useAttribute: true,
					attributeName: 'data-icomoon'
				});
			});
		</script>
		<div class="form-group">
			<label for="" class="col-md-4">Populated by <code>decimal keys</code> into <code>source</code> option and <code>Icon Name</code> into <code>searchSource</code> option:</label>
			<div class="col-md-4">
				<input data-bv-notempty="true" data-bv-notempty-message="You must pick a font" type="text" name="fip_2" id="fip_2" value="" />
			</div>
			<div class="col-md-4">
				<p class="form-control-static track-change">Selected Value: <span class="text-primary"></span> | Selected Icon: <span class="text-success by_decimal"></span></p>
			</div>
		</div>

		<div class="form-group">
			<hr />
			<h3><span class="glyphicon glyphicon-fire"></span> Source Code <code>PHP</code></h3>
			<hr />
			<pre class="brush: php">
&lt;script type=&quot;text/javascript&quot;&gt;
	jQuery(document).ready(function($) {
		var source = &lt;?php echo imii_generate_fip_source_json( $icomoon_icons, &#039;key&#039; ); ?&gt;;
		var searchSource = &lt;?php echo imii_generate_fip_search_json( $icomoon_icons ); ?&gt;;
		$(&#039;#fip_2&#039;).fontIconPicker({
			source: source,
			searchSource: searchSource,
			theme: &#039;fip-bootstrap&#039;,
			useAttribute: true,
			attributeName: &#039;data-icomoon&#039;
		});
	});
&lt;/script&gt;
&lt;div class=&quot;form-group&quot;&gt;
	&lt;label for=&quot;&quot; class=&quot;col-md-4&quot;&gt;Populated by &lt;code&gt;decimal keys&lt;/code&gt; into &lt;code&gt;source&lt;/code&gt; option and &lt;code&gt;Icon Name&lt;/code&gt; into &lt;code&gt;searchSource&lt;/code&gt; option:&lt;/label&gt;
	&lt;div class=&quot;col-md-4&quot;&gt;
		&lt;input data-bv-notempty=&quot;true&quot; data-bv-notempty-message=&quot;You must pick a font&quot; type=&quot;text&quot; name=&quot;fip_2&quot; id=&quot;fip_2&quot; value=&quot;&quot; /&gt;
	&lt;/div&gt;
	&lt;div class=&quot;col-md-4&quot;&gt;
		&lt;p class=&quot;form-control-static track-change&quot;&gt;Selected Value: &lt;span class=&quot;text-primary&quot;&gt;&lt;/span&gt; | Selected Icon: &lt;span class=&quot;text-success by_decimal&quot;&gt;&lt;/span&gt;&lt;/p&gt;
	&lt;/div&gt;
&lt;/div&gt;
			</pre>
		</div>

		<div class="form-group">
			<div class="col-md-12">
				<p class="pull-right">
					<button type="submit" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-floppy-save"></span> Submit the form</button>
				</p>
			</div>
		</div>
	</form>
	<?php endif; ?>
</div>
<?php get_footer(); ?>
