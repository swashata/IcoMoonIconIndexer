<?php
// Include the config file
require_once( dirname( __FILE__ ) . '/config.php' );

// First require the iconindexed.php to see if a backup is present
if ( file_exists( ABSPATH . 'iconindexed.php' ) ) {
	require_once ABSPATH . 'iconindexed.php';
}

// Now get the functions
require_once ABSPATH . 'functions.php';

// Include the header file
get_header();
?>
	<div class="jumbotron">
		<div class="container">
			<h1>IcoMoonIconIndexer <small>v1.0.0</small></h1>
			<p>This script helps index and categorize icons generated from <a href="http://icomoon.io">IcoMoon Apps</a> and create <code>PHP array</code>, <code>JavaScript Object|Array</code> variables and/or <code>SELECT</code> HTML for your use.</p>
			<?php if ( isset( $icomoon_icons ) ) : ?>
			<script type="text/javascript">
				jQuery(document).ready(function($) {
					var source = <?php echo imii_generate_fip_source_json( $icomoon_icons, 'class' ); ?>;
					var searchSource = <?php echo imii_generate_fip_search_json( $icomoon_icons ); ?>;
					$('#fip_1').fontIconPicker({
						source: source,
						searchSource: searchSource,
						theme: 'fip-bootstrap'
					});
					$('#select_1').on('change keyup', function() {
						var val = $(this).val();
						$(this).next('.text-success').html('<i class="' + val + '"></i>');
					}).trigger('change');
				});
			</script>
			<p>In a nut shell, it helps you create something like this: <input type="text" name="fip_1" id="fip_1" value="" /> or this:
			<select class="form-control" style="display: inline-block; width: 200px;" name="select_1" id="select_1">
				<option value="" selected="selected">--please select--</option>
				<?php echo imii_generate_select_options( $icomoon_icons, 'class' ); ?>
			</select> <span class="text-success"></span> by just these:</p>
			<?php else : ?>
			<img src="images/output.png" alt="Output" style="display: block; margin: 10px auto; max-width: 100%; height: auto; width: 917px;" />
			<p>Create fontIconPicker or create <code>SELECT</code> elements with just this bit of code:</p>
			<?php endif; ?>
			<pre class="brush: php">
&lt;?php
// First require the iconindexed.php to see if a backup is present
if ( file_exists( ABSPATH . &#039;iconindexed.php&#039; ) ) {
	require_once ABSPATH . &#039;iconindexed.php&#039;;
}

// Now get the functions
require_once ABSPATH . &#039;functions.php&#039;;
?&gt;
&lt;script type=&quot;text/javascript&quot;&gt;
	jQuery(document).ready(function($) {
		var source = &lt;?php echo imii_generate_fip_source_json( $icomoon_icons, &#039;class&#039; ); ?&gt;;
		var searchSource = &lt;?php echo imii_generate_fip_search_json( $icomoon_icons ); ?&gt;;
		$(&#039;#fip_1&#039;).fontIconPicker({
			source: source,
			searchSource: searchSource,
			theme: &#039;fip-bootstrap&#039;
		});
		$(&#039;#select_1&#039;).on(&#039;change keyup&#039;, function() {
			var val = $(this).val();
			$(this).next(&#039;.text-success&#039;).html(&#039;&lt;i class=&quot;&#039; + val + &#039;&quot;&gt;&lt;/i&gt;&#039;);
		}).trigger(&#039;change&#039;);
	});
&lt;/script&gt;
&lt;input type=&quot;text&quot; name=&quot;fip_1&quot; id=&quot;fip_1&quot; value=&quot;&quot; /&gt;
&lt;select class=&quot;form-control&quot; style=&quot;display: inline-block; width: 200px;&quot; name=&quot;select_1&quot; id=&quot;select_1&quot;&gt;
	&lt;option value=&quot;&quot; selected=&quot;selected&quot;&gt;--please select--&lt;/option&gt;
	&lt;?php echo imii_generate_select_options( $icomoon_icons, &#039;class&#039; ); ?&gt;
&lt;/select&gt; &lt;span class=&quot;text-success&quot;&gt;&lt;/span&gt;
			</pre>
			<p class="margin_top">
				<a href="#getting_started" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-hand-right"></span> Getting Started</a>
				<a href="#editing_configuration_file" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-cog"></span> Editing Configuration File</a>
				<a href="#functions_and_apis" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-book"></span> Functions and APIs</a>
			</p>
		</div>
	</div>
	<div class="container">
		<hr />
		<h2 id="what_it_does"><a class="pull-right" href="#main"><span class="glyphicon glyphicon-chevron-up"></span></a><span class="glyphicon glyphicon-ok"></span> What it does</h2>
		<hr />
		<p>
			What the script basically does is, parse the <code>selection.json</code> file from the icon package downloaded from <a href="http://icomoon.io">IcoMoon App</a> and categorizes icons (by tags) and stores them in a <code>PHP Array</code>.
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
		<h2 id="what_it_does_not"><a class="pull-right" href="#main"><span class="glyphicon glyphicon-chevron-up"></span></a><span class="glyphicon glyphicon-remove"></span> What it does not</h2>
		<hr />
		<p>Sadly this is a script and it has it's limitations.</p>
		<ul>
			<li>It will not generate properly if tags are not set. Sample tags are already there to index and category the free IcoMoon icon set.</li>
			<li>It will not magically put the <code>fontIconPicker</code> on your site. This will just ease up the process. For implementation guide please check the examples and source code once you've done categorizing.</li>
			<li>It will not get you a beer.</li>
		</ul>
		<hr />
		<h2 id="additional_features"><a class="pull-right" href="#main"><span class="glyphicon glyphicon-chevron-up"></span></a><span class="glyphicon glyphicon-plus"></span> Additional Features</h2>
		<hr />
		<ul>
			<li>Along with indexing icons, it indexes images too. So just download the image set for any icon library and this app will generate image codes for you.</li>
			<li>Comes with predefined functions (see below) with which you can do quite a lot.</li>
		</ul>
		<hr />
		<h2 id="getting_started"><a class="pull-right" href="#main"><span class="glyphicon glyphicon-chevron-up"></span></a><span class="glyphicon glyphicon-hand-right"></span> Getting Started</h2>
		<hr />
		<p>We are assuming you know a little PHP and some JavaScript. You have some place to host this script, or atleast locally (using <a href="http://www.wampserver.com/en/">WAMP</a> or <a href="http://www.mamp.info/en/">MAMP</a> and hey if you are using linux, I don't need to say much).</p>
		<h3><span class="glyphicon glyphicon-check"></span> Download a font icon set from IcoMoon</h3>
		<hr />
		<ul>
			<li>Head over to <a href="http://icomoon.io/">IcoMoon App</a> and download a set of your favorite icons.</li>
			<li>Additionally download image set from the selection. This app indexes both and we are going to stick to all features.</li>
			<li>Check the main icon package. It atleast contain the file <code>selection.json</code> and <code>style.css</code>. If it does not then you are probably doing something wrong.</li>
			<li>Check the image package. The number of images should be same as the number of icons.</li>
			<li>
				Open the <code>style.css</code> and add the following code inside it (this is for attribute selector).
<pre class="brush: css">
[data-icomoon] {
	font-family: 'iconFontFamily';
	speak: none;
	font-style: normal;
	font-weight: normal;
	font-variant: normal;
	text-transform: none;
	line-height: 1;

	/* Better Font Rendering =========== */
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
}
[data-icomoon]:before {
	content: attr(data-icomoon);
}
</pre>
				Of source you'd need to change the <code>iconFontFamily</code> to the one you are using.
			</li>
		</ul>
		<hr />
		<h3><span class="glyphicon glyphicon-check"></span> Place the files in proper place</h3>
		<hr />
		<p>For the sake of simplicity, we are sticking with the default options right now.</p>
		<ul>
			<li>Place the font package (every files inside it) directly under the directory <code>icomoon.fonts</code>.</li>
			<li>Place the image package (every files inside it) directly under the directory <code>icomoon.png</code>.</li>
		</ul>
		<hr />
		<h3><span class="glyphicon glyphicon-check"></span> Run the Auto Generator</h3>
		<hr />
		<p>That's it. Now you go and click on the <a href="auto-generator.php">Auto Generator</a> button and let it do it's task.</p>
		<p>When the page loads:</p>
		<ul>
			<li>You will see a rather long table with icons and images.</li>
			<li>Each row of the table represents one icon set and shows the icons both by class and attribute selector along with the image.</li>
			<li>The last column of a row is where you can select a category. By default you will fetch from tags and categories that come with this script, but you can modify them.</li>
			<li>Change a category if you do not like them.</li>
			<li>Scroll down to the page and click on the save button.</li>
		</ul>
		<p>When saved it will show you a message. After saving the icon set, if you go to the auto generate page again, then it will load from the last saved values.</p>
		<p>If you wish to reset it, then you will need to remove all contents from the <code>iconindexed.php</code> file.</p>
		<hr />
		<h3><span class="glyphicon glyphicon-check"></span> Test it hard</h3>
		<hr />
		<p>Now that your icons are indexed and saved, go to <a href="test-icons.php">Test Indexed Icons</a> page. It will check and print all icons and will show any error if found.</p>
		<hr />
		<h3><span class="glyphicon glyphicon-check"></span> Check Sample Codes</h3>
		<hr />
		<p>Now simply head to <a href="codes.php">Sample Codes</a> page to see how you can implement the icons on your project.</p>
		<hr />
		<h3><span class="glyphicon glyphicon-check"></span> Get the populated PHP Array</h3>
		<hr />
		<p>To copy the generated PHP Array, you will need to download the file <code>iconindexed.php</code>. A sample output could be like this:</p>
		<pre class="brush: php">
&lt;?php

/**
 * The content of this file is autogenerated
 * Last Indexed: 2014-05-14 21:46:18 by the autogenerator
 *
 * IcoMoonIconIndexer Automated script by swashata &lt;swashata@intechgrity.com&gt;
 * @link https://github.com/swashata/IcoMoonIconIndexer GPLV3 Licensed
 */

$icomoon_indexed_last = &#039;2014-05-14 21:46:18&#039;;
$icomoon_icons = array(
	array(
		&#039;id&#039; =&gt; &#039;web_elements&#039;,
		&#039;label&#039; =&gt; &#039;Web Applications&#039;,
		&#039;elements&#039; =&gt; array(
			0xe01c =&gt; &#039;Connection&#039;,  0xe01e =&gt; &#039;Feed&#039;,  0xe041 =&gt; &#039;Pushpin&#039;,  0xe05c =&gt; &#039;Box add&#039;,  0xe05d =&gt; &#039;Box remove&#039;,  0xe05e =&gt; &#039;Download&#039;,
			0xe05f =&gt; &#039;Upload&#039;,  0xe07e =&gt; &#039;Binoculars&#039;,  0xe07f =&gt; &#039;Search&#039;,  0xe08c =&gt; &#039;Settings&#039;,  0xe099 =&gt; &#039;Gift&#039;,  0xe0a7 =&gt; &#039;Remove&#039;,
			0xe0a8 =&gt; &#039;Remove 2&#039;,  0xe0b4 =&gt; &#039;List&#039;,  0xe0b5 =&gt; &#039;List 2&#039;,  0xe0b6 =&gt; &#039;Numbered list&#039;,  0xe0b7 =&gt; &#039;Menu&#039;,  0xe0b8 =&gt; &#039;Menu 2&#039;,
			0xe0bb =&gt; &#039;Cloud download&#039;,  0xe0bc =&gt; &#039;Cloud upload&#039;,  0xe0bd =&gt; &#039;Download 2&#039;,  0xe0be =&gt; &#039;Upload 2&#039;,  0xe0bf =&gt; &#039;Download 3&#039;,  0xe0c0 =&gt; &#039;Upload 3&#039;,
			0xe0c1 =&gt; &#039;Globe&#039;,  0xe0c2 =&gt; &#039;Earth&#039;,  0xe0c5 =&gt; &#039;Attachment&#039;,  0xe0c9 =&gt; &#039;Bookmark&#039;,  0xe0ca =&gt; &#039;Bookmarks&#039;,  0xe0fa =&gt; &#039;Cancel circle&#039;,
			0xe120 =&gt; &#039;Arrow up&#039;,  0xe124 =&gt; &#039;Arrow down&#039;,  0xe128 =&gt; &#039;Arrow up 2&#039;,  0xe12c =&gt; &#039;Arrow down 2&#039;,  0xe130 =&gt; &#039;Arrow up 3&#039;,  0xe134 =&gt; &#039;Arrow down 3&#039;,
			0xe15b =&gt; &#039;Embed&#039;,  0xe15c =&gt; &#039;Code&#039;,  0xe170 =&gt; &#039;Feed 2&#039;,  0xe171 =&gt; &#039;Feed 3&#039;,  0xe172 =&gt; &#039;Feed 4&#039;,
		),
		&#039;element_classes&#039; =&gt; array(
			0xe01c =&gt; &#039;icomoon-connection&#039;,  0xe01e =&gt; &#039;icomoon-feed&#039;,  0xe041 =&gt; &#039;icomoon-pushpin&#039;,  0xe05c =&gt; &#039;icomoon-box-add&#039;,  0xe05d =&gt; &#039;icomoon-box-remove&#039;,  0xe05e =&gt; &#039;icomoon-download&#039;,
			0xe05f =&gt; &#039;icomoon-upload&#039;,  0xe07e =&gt; &#039;icomoon-binoculars&#039;,  0xe07f =&gt; &#039;icomoon-search&#039;,  0xe08c =&gt; &#039;icomoon-settings&#039;,  0xe099 =&gt; &#039;icomoon-gift&#039;,  0xe0a7 =&gt; &#039;icomoon-remove&#039;,
			0xe0a8 =&gt; &#039;icomoon-remove2&#039;,  0xe0b4 =&gt; &#039;icomoon-list&#039;,  0xe0b5 =&gt; &#039;icomoon-list2&#039;,  0xe0b6 =&gt; &#039;icomoon-numbered-list&#039;,  0xe0b7 =&gt; &#039;icomoon-menu&#039;,  0xe0b8 =&gt; &#039;icomoon-menu2&#039;,
			0xe0bb =&gt; &#039;icomoon-cloud-download&#039;,  0xe0bc =&gt; &#039;icomoon-cloud-upload&#039;,  0xe0bd =&gt; &#039;icomoon-download2&#039;,  0xe0be =&gt; &#039;icomoon-upload2&#039;,  0xe0bf =&gt; &#039;icomoon-download3&#039;,  0xe0c0 =&gt; &#039;icomoon-upload3&#039;,
			0xe0c1 =&gt; &#039;icomoon-globe&#039;,  0xe0c2 =&gt; &#039;icomoon-earth&#039;,  0xe0c5 =&gt; &#039;icomoon-attachment&#039;,  0xe0c9 =&gt; &#039;icomoon-bookmark&#039;,  0xe0ca =&gt; &#039;icomoon-bookmarks&#039;,  0xe0fa =&gt; &#039;icomoon-cancel-circle&#039;,
			0xe120 =&gt; &#039;icomoon-arrow-up&#039;,  0xe124 =&gt; &#039;icomoon-arrow-down&#039;,  0xe128 =&gt; &#039;icomoon-arrow-up2&#039;,  0xe12c =&gt; &#039;icomoon-arrow-down2&#039;,  0xe130 =&gt; &#039;icomoon-arrow-up3&#039;,  0xe134 =&gt; &#039;icomoon-arrow-down3&#039;,
			0xe15b =&gt; &#039;icomoon-embed&#039;,  0xe15c =&gt; &#039;icomoon-code&#039;,  0xe170 =&gt; &#039;icomoon-feed2&#039;,  0xe171 =&gt; &#039;icomoon-feed3&#039;,  0xe172 =&gt; &#039;icomoon-feed4&#039;,
		),
		&#039;tags&#039; =&gt; array(
			&#039;list&#039;, &#039;download&#039;, &#039;upload&#039;, &#039;www&#039;, &#039;globe&#039;, &#039;code&#039;, &#039;embed&#039;, &#039;bookmark&#039;, &#039;attachment&#039;, &#039;box&#039;, &#039;menu&#039;, &#039;feed&#039;, &#039;pin&#039;, &#039;quote&#039;, &#039;search&#039;, &#039;settings&#039;, &#039;remove&#039;, &#039;load&#039;, &#039;bookmarks&#039;,
		),
	),
	array(
		&#039;id&#039; =&gt; &#039;spinners&#039;,
		&#039;label&#039; =&gt; &#039;Spinners&#039;,
		&#039;elements&#039; =&gt; array(
			0xe077 =&gt; &#039;Busy&#039;,  0xe078 =&gt; &#039;Spinner&#039;,  0xe079 =&gt; &#039;Spinner 2&#039;,  0xe07a =&gt; &#039;Spinner 3&#039;,  0xe07b =&gt; &#039;Spinner 4&#039;,  0xe07c =&gt; &#039;Spinner 5&#039;,
			0xe07d =&gt; &#039;Spinner 6&#039;,
		),
		&#039;element_classes&#039; =&gt; array(
			0xe077 =&gt; &#039;icomoon-busy&#039;,  0xe078 =&gt; &#039;icomoon-spinner&#039;,  0xe079 =&gt; &#039;icomoon-spinner2&#039;,  0xe07a =&gt; &#039;icomoon-spinner3&#039;,  0xe07b =&gt; &#039;icomoon-spinner4&#039;,  0xe07c =&gt; &#039;icomoon-spinner5&#039;,
			0xe07d =&gt; &#039;icomoon-spinner6&#039;,
		),
		&#039;tags&#039; =&gt; array(
			&#039;spinner&#039;, &#039;spinners&#039;, &#039;loading&#039;, &#039;wait&#039;, &#039;ajax&#039;, &#039;busy&#039;,
		),
	),
	array(
		&#039;id&#039; =&gt; &#039;business&#039;,
		&#039;label&#039; =&gt; &#039;Business Icons&#039;,
		&#039;elements&#039; =&gt; array(
			0xe003 =&gt; &#039;Office&#039;,  0xe004 =&gt; &#039;Newspaper&#039;,  0xe01f =&gt; &#039;Book&#039;,  0xe020 =&gt; &#039;Books&#039;,  0xe021 =&gt; &#039;Library&#039;,  0xe023 =&gt; &#039;Profile&#039;,
			0xe03b =&gt; &#039;Support&#039;,  0xe03d =&gt; &#039;Phone hang up&#039;,  0xe03e =&gt; &#039;Address book&#039;,  0xe03f =&gt; &#039;Notebook&#039;,  0xe06a =&gt; &#039;Bubble&#039;,  0xe06b =&gt; &#039;Bubbles&#039;,
			0xe06c =&gt; &#039;Bubbles 2&#039;,  0xe06d =&gt; &#039;Bubble 2&#039;,  0xe06e =&gt; &#039;Bubbles 3&#039;,  0xe06f =&gt; &#039;Bubbles 4&#039;,  0xe070 =&gt; &#039;User&#039;,  0xe071 =&gt; &#039;Users&#039;,
			0xe072 =&gt; &#039;User 2&#039;,  0xe073 =&gt; &#039;Users 2&#039;,  0xe074 =&gt; &#039;User 3&#039;,  0xe075 =&gt; &#039;User 4&#039;,  0xe0a9 =&gt; &#039;Briefcase&#039;,  0xe0b3 =&gt; &#039;Signup&#039;,
			0xe15f =&gt; &#039;Mail&#039;,  0xe160 =&gt; &#039;Mail 2&#039;,  0xe161 =&gt; &#039;Mail 3&#039;,  0xe162 =&gt; &#039;Mail 4&#039;,
		),
		&#039;element_classes&#039; =&gt; array(
			0xe003 =&gt; &#039;icomoon-office&#039;,  0xe004 =&gt; &#039;icomoon-newspaper&#039;,  0xe01f =&gt; &#039;icomoon-book&#039;,  0xe020 =&gt; &#039;icomoon-books&#039;,  0xe021 =&gt; &#039;icomoon-library&#039;,  0xe023 =&gt; &#039;icomoon-profile&#039;,
			0xe03b =&gt; &#039;icomoon-support&#039;,  0xe03d =&gt; &#039;icomoon-phone-hang-up&#039;,  0xe03e =&gt; &#039;icomoon-address-book&#039;,  0xe03f =&gt; &#039;icomoon-notebook&#039;,  0xe06a =&gt; &#039;icomoon-bubble&#039;,  0xe06b =&gt; &#039;icomoon-bubbles&#039;,
			0xe06c =&gt; &#039;icomoon-bubbles2&#039;,  0xe06d =&gt; &#039;icomoon-bubble2&#039;,  0xe06e =&gt; &#039;icomoon-bubbles3&#039;,  0xe06f =&gt; &#039;icomoon-bubbles4&#039;,  0xe070 =&gt; &#039;icomoon-user&#039;,  0xe071 =&gt; &#039;icomoon-users&#039;,
			0xe072 =&gt; &#039;icomoon-user2&#039;,  0xe073 =&gt; &#039;icomoon-users2&#039;,  0xe074 =&gt; &#039;icomoon-user3&#039;,  0xe075 =&gt; &#039;icomoon-user4&#039;,  0xe0a9 =&gt; &#039;icomoon-briefcase&#039;,  0xe0b3 =&gt; &#039;icomoon-signup&#039;,
			0xe15f =&gt; &#039;icomoon-mail&#039;,  0xe160 =&gt; &#039;icomoon-mail2&#039;,  0xe161 =&gt; &#039;icomoon-mail3&#039;,  0xe162 =&gt; &#039;icomoon-mail4&#039;,
		),
		&#039;tags&#039; =&gt; array(
			&#039;support&#039;, &#039;testimonial&#039;, &#039;user&#039;, &#039;comment&#039;, &#039;member&#039;, &#039;office&#039;, &#039;newspaper&#039;, &#039;book&#039;, &#039;books&#039;, &#039;library&#039;, &#039;profile&#039;, &#039;bubble&#039;, &#039;quote&#039;, &#039;bubbles&#039;, &#039;comments&#039;, &#039;group&#039;, &#039;team&#039;, &#039;community&#039;, &#039;work&#039;, &#039;job&#039;, &#039;signup&#039;, &#039;login&#039;, &#039;register&#039;, &#039;signout&#039;, &#039;logout&#039;,
		),
	),
	array(
		&#039;id&#039; =&gt; &#039;ecommerce&#039;,
		&#039;label&#039; =&gt; &#039;eCommerce&#039;,
		&#039;elements&#039; =&gt; array(
			0xe030 =&gt; &#039;Tag&#039;,  0xe031 =&gt; &#039;Tags&#039;,  0xe035 =&gt; &#039;Cart&#039;,  0xe036 =&gt; &#039;Cart 2&#039;,  0xe037 =&gt; &#039;Cart 3&#039;,  0xe039 =&gt; &#039;Credit&#039;,
			0xe03a =&gt; &#039;Calculate&#039;,
		),
		&#039;element_classes&#039; =&gt; array(
			0xe030 =&gt; &#039;icomoon-tag&#039;,  0xe031 =&gt; &#039;icomoon-tags&#039;,  0xe035 =&gt; &#039;icomoon-cart&#039;,  0xe036 =&gt; &#039;icomoon-cart2&#039;,  0xe037 =&gt; &#039;icomoon-cart3&#039;,  0xe039 =&gt; &#039;icomoon-credit&#039;,
			0xe03a =&gt; &#039;icomoon-calculate&#039;,
		),
		&#039;tags&#039; =&gt; array(
			&#039;cart&#039;, &#039;card&#039;, &#039;calculator&#039;, &#039;tag&#039;, &#039;tags&#039;, &#039;calculate&#039;,
		),
	),
	array(
		&#039;id&#039; =&gt; &#039;currency&#039;,
		&#039;label&#039; =&gt; &#039;Currency Icons&#039;,
		&#039;elements&#039; =&gt; array(
			0xe038 =&gt; &#039;Coin&#039;,
		),
		&#039;element_classes&#039; =&gt; array(
			0xe038 =&gt; &#039;icomoon-coin&#039;,
		),
		&#039;tags&#039; =&gt; array(
			&#039;btc&#039;, &#039;bitcoin&#039;, &#039;cny&#039;, &#039;dollar&#039;, &#039;eur&#039;, &#039;euro&#039;, &#039;gbp&#039;, &#039;inr&#039;, &#039;jpy&#039;, &#039;krw&#039;, &#039;money&#039;, &#039;rmb&#039;, &#039;rouble&#039;, &#039;rub&#039;, &#039;ruble&#039;, &#039;rupee&#039;, &#039;try&#039;, &#039;turkish lira&#039;, &#039;usd&#039;, &#039;won&#039;, &#039;yen&#039;,
		),
	),
	array(
		&#039;id&#039; =&gt; &#039;form_controls&#039;,
		&#039;label&#039; =&gt; &#039;Form Control Icons&#039;,
		&#039;elements&#039; =&gt; array(
			0xe01d =&gt; &#039;Podcast&#039;,  0xe027 =&gt; &#039;Copy&#039;,  0xe028 =&gt; &#039;Copy 2&#039;,  0xe029 =&gt; &#039;Copy 3&#039;,  0xe02a =&gt; &#039;Paste&#039;,  0xe02b =&gt; &#039;Paste 2&#039;,
			0xe02c =&gt; &#039;Paste 3&#039;,  0xe060 =&gt; &#039;Disk&#039;,  0xe061 =&gt; &#039;Storage&#039;,  0xe100 =&gt; &#039;Spell check&#039;,  0xe103 =&gt; &#039;Enter&#039;,  0xe104 =&gt; &#039;Exit&#039;,
			0xe138 =&gt; &#039;Checkbox checked&#039;,  0xe13b =&gt; &#039;Radio checked&#039;,  0xe13c =&gt; &#039;Radio unchecked&#039;,  0xe13d =&gt; &#039;Crop&#039;,
		),
		&#039;element_classes&#039; =&gt; array(
			0xe01d =&gt; &#039;icomoon-podcast&#039;,  0xe027 =&gt; &#039;icomoon-copy&#039;,  0xe028 =&gt; &#039;icomoon-copy2&#039;,  0xe029 =&gt; &#039;icomoon-copy3&#039;,  0xe02a =&gt; &#039;icomoon-paste&#039;,  0xe02b =&gt; &#039;icomoon-paste2&#039;,
			0xe02c =&gt; &#039;icomoon-paste3&#039;,  0xe060 =&gt; &#039;icomoon-disk&#039;,  0xe061 =&gt; &#039;icomoon-storage&#039;,  0xe100 =&gt; &#039;icomoon-spell-check&#039;,  0xe103 =&gt; &#039;icomoon-enter&#039;,  0xe104 =&gt; &#039;icomoon-exit&#039;,
			0xe138 =&gt; &#039;icomoon-checkbox-checked&#039;,  0xe13b =&gt; &#039;icomoon-radio-checked&#039;,  0xe13c =&gt; &#039;icomoon-radio-unchecked&#039;,  0xe13d =&gt; &#039;icomoon-crop&#039;,
		),
		&#039;tags&#039; =&gt; array(
			&#039;cut&#039;, &#039;copy&#039;, &#039;paste&#039;, &#039;enter&#039;, &#039;exit&#039;, &#039;save&#039;, &#039;trash&#039;, &#039;check&#039;, &#039;radio&#039;, &#039;checked&#039;, &#039;selected&#039;,
		),
	),
	array(
		&#039;id&#039; =&gt; &#039;text_editor&#039;,
		&#039;label&#039; =&gt; &#039;User Action &amp; Text Editor&#039;,
		&#039;elements&#039; =&gt; array(
			0xe062 =&gt; &#039;Undo&#039;,  0xe063 =&gt; &#039;Redo&#039;,  0xe064 =&gt; &#039;Flip&#039;,  0xe065 =&gt; &#039;Flip 2&#039;,  0xe066 =&gt; &#039;Undo 2&#039;,  0xe067 =&gt; &#039;Redo 2&#039;,
			0xe080 =&gt; &#039;Zoomin&#039;,  0xe081 =&gt; &#039;Zoomout&#039;,  0xe082 =&gt; &#039;Expand&#039;,  0xe083 =&gt; &#039;Contract&#039;,  0xe084 =&gt; &#039;Expand 2&#039;,  0xe085 =&gt; &#039;Contract 2&#039;,
			0xe0c3 =&gt; &#039;Link&#039;,  0xe13e =&gt; &#039;Scissors&#039;,  0xe141 =&gt; &#039;Font&#039;,  0xe142 =&gt; &#039;Text height&#039;,  0xe143 =&gt; &#039;Text width&#039;,  0xe144 =&gt; &#039;Bold&#039;,
			0xe145 =&gt; &#039;Underline&#039;,  0xe146 =&gt; &#039;Italic&#039;,  0xe147 =&gt; &#039;Strikethrough&#039;,  0xe148 =&gt; &#039;Omega&#039;,  0xe149 =&gt; &#039;Sigma&#039;,  0xe14a =&gt; &#039;Table&#039;,
			0xe14b =&gt; &#039;Table 2&#039;,  0xe14c =&gt; &#039;Insert template&#039;,  0xe14d =&gt; &#039;Pilcrow&#039;,  0xe14e =&gt; &#039;Lefttoright&#039;,  0xe14f =&gt; &#039;Righttoleft&#039;,  0xe150 =&gt; &#039;Paragraph left&#039;,
			0xe151 =&gt; &#039;Paragraph center&#039;,  0xe152 =&gt; &#039;Paragraph right&#039;,  0xe153 =&gt; &#039;Paragraph justify&#039;,  0xe154 =&gt; &#039;Paragraph left 2&#039;,  0xe155 =&gt; &#039;Paragraph center 2&#039;,  0xe156 =&gt; &#039;Paragraph right 2&#039;,
			0xe157 =&gt; &#039;Paragraph justify 2&#039;,  0xe158 =&gt; &#039;Indent increase&#039;,  0xe159 =&gt; &#039;Indent decrease&#039;,  0xe15a =&gt; &#039;Newtab&#039;,
		),
		&#039;element_classes&#039; =&gt; array(
			0xe062 =&gt; &#039;icomoon-undo&#039;,  0xe063 =&gt; &#039;icomoon-redo&#039;,  0xe064 =&gt; &#039;icomoon-flip&#039;,  0xe065 =&gt; &#039;icomoon-flip2&#039;,  0xe066 =&gt; &#039;icomoon-undo2&#039;,  0xe067 =&gt; &#039;icomoon-redo2&#039;,
			0xe080 =&gt; &#039;icomoon-zoomin&#039;,  0xe081 =&gt; &#039;icomoon-zoomout&#039;,  0xe082 =&gt; &#039;icomoon-expand&#039;,  0xe083 =&gt; &#039;icomoon-contract&#039;,  0xe084 =&gt; &#039;icomoon-expand2&#039;,  0xe085 =&gt; &#039;icomoon-contract2&#039;,
			0xe0c3 =&gt; &#039;icomoon-link&#039;,  0xe13e =&gt; &#039;icomoon-scissors&#039;,  0xe141 =&gt; &#039;icomoon-font&#039;,  0xe142 =&gt; &#039;icomoon-text-height&#039;,  0xe143 =&gt; &#039;icomoon-text-width&#039;,  0xe144 =&gt; &#039;icomoon-bold&#039;,
			0xe145 =&gt; &#039;icomoon-underline&#039;,  0xe146 =&gt; &#039;icomoon-italic&#039;,  0xe147 =&gt; &#039;icomoon-strikethrough&#039;,  0xe148 =&gt; &#039;icomoon-omega&#039;,  0xe149 =&gt; &#039;icomoon-sigma&#039;,  0xe14a =&gt; &#039;icomoon-table&#039;,
			0xe14b =&gt; &#039;icomoon-table2&#039;,  0xe14c =&gt; &#039;icomoon-insert-template&#039;,  0xe14d =&gt; &#039;icomoon-pilcrow&#039;,  0xe14e =&gt; &#039;icomoon-lefttoright&#039;,  0xe14f =&gt; &#039;icomoon-righttoleft&#039;,  0xe150 =&gt; &#039;icomoon-paragraph-left&#039;,
			0xe151 =&gt; &#039;icomoon-paragraph-center&#039;,  0xe152 =&gt; &#039;icomoon-paragraph-right&#039;,  0xe153 =&gt; &#039;icomoon-paragraph-justify&#039;,  0xe154 =&gt; &#039;icomoon-paragraph-left2&#039;,  0xe155 =&gt; &#039;icomoon-paragraph-center2&#039;,  0xe156 =&gt; &#039;icomoon-paragraph-right2&#039;,
			0xe157 =&gt; &#039;icomoon-paragraph-justify2&#039;,  0xe158 =&gt; &#039;icomoon-indent-increase&#039;,  0xe159 =&gt; &#039;icomoon-indent-decrease&#039;,  0xe15a =&gt; &#039;icomoon-newtab&#039;,
		),
		&#039;tags&#039; =&gt; array(
			&#039;bold&#039;, &#039;underline&#039;, &#039;italic&#039;, &#039;strike&#039;, &#039;align&#039;, &#039;indent&#039;, &#039;anchor&#039;, &#039;table&#039;, &#039;chain&#039;, &#039;floppy&#039;, &#039;list&#039;, &#039;outdent&#039;, &#039;paperclip&#039;, &#039;rotate&#039;, &#039;scissors&#039;, &#039;strikethrough&#039;, &#039;th&#039;, &#039;undo&#039;, &#039;unlink&#039;, &#039;clipboard&#039;, &#039;flip&#039;, &#039;redo&#039;, &#039;zoomin&#039;, &#039;zoomout&#039;, &#039;expand&#039;, &#039;contract&#039;, &#039;link&#039;, &#039;font&#039;, &#039;wysiwyg&#039;,
		),
	),
	array(
		&#039;id&#039; =&gt; &#039;charts&#039;,
		&#039;label&#039; =&gt; &#039;Charts and Codes&#039;,
		&#039;elements&#039; =&gt; array(
			0xe032 =&gt; &#039;Barcode&#039;,  0xe033 =&gt; &#039;Qrcode&#039;,  0xe095 =&gt; &#039;Pie&#039;,  0xe096 =&gt; &#039;Stats&#039;,  0xe097 =&gt; &#039;Bars&#039;,  0xe098 =&gt; &#039;Bars 2&#039;,

		),
		&#039;element_classes&#039; =&gt; array(
			0xe032 =&gt; &#039;icomoon-barcode&#039;,  0xe033 =&gt; &#039;icomoon-qrcode&#039;,  0xe095 =&gt; &#039;icomoon-pie&#039;,  0xe096 =&gt; &#039;icomoon-stats&#039;,  0xe097 =&gt; &#039;icomoon-bars&#039;,  0xe098 =&gt; &#039;icomoon-bars2&#039;,

		),
		&#039;tags&#039; =&gt; array(
			&#039;pie&#039;, &#039;line&#039;, &#039;qrcode&#039;, &#039;column&#039;, &#039;barcode&#039;, &#039;bars&#039;, &#039;chart&#039;, &#039;charts&#039;, &#039;graph&#039;,
		),
	),
	array(
		&#039;id&#039; =&gt; &#039;attentive&#039;,
		&#039;label&#039; =&gt; &#039;Attentive&#039;,
		&#039;elements&#039; =&gt; array(
			0xe0c7 =&gt; &#039;Eye blocked&#039;,  0xe0f4 =&gt; &#039;Warning&#039;,  0xe0f5 =&gt; &#039;Notification&#039;,  0xe0f6 =&gt; &#039;Question&#039;,  0xe0f7 =&gt; &#039;Info&#039;,  0xe0f8 =&gt; &#039;Info 2&#039;,
			0xe0f9 =&gt; &#039;Blocked&#039;,  0xe0fc =&gt; &#039;Spam&#039;,  0xe0fd =&gt; &#039;Close&#039;,
		),
		&#039;element_classes&#039; =&gt; array(
			0xe0c7 =&gt; &#039;icomoon-eye-blocked&#039;,  0xe0f4 =&gt; &#039;icomoon-warning&#039;,  0xe0f5 =&gt; &#039;icomoon-notification&#039;,  0xe0f6 =&gt; &#039;icomoon-question&#039;,  0xe0f7 =&gt; &#039;icomoon-info&#039;,  0xe0f8 =&gt; &#039;icomoon-info2&#039;,
			0xe0f9 =&gt; &#039;icomoon-blocked&#039;,  0xe0fc =&gt; &#039;icomoon-spam&#039;,  0xe0fd =&gt; &#039;icomoon-close&#039;,
		),
		&#039;tags&#039; =&gt; array(
			&#039;help&#039;, &#039;warning&#039;, &#039;info&#039;, &#039;blocked&#039;, &#039;cancel&#039;, &#039;question&#039;, &#039;spam&#039;, &#039;block&#039;, &#039;allowed&#039;, &#039;not allowed&#039;, &#039;okay&#039;, &#039;cancel&#039;,
		),
	),
	array(
		&#039;id&#039; =&gt; &#039;multimedia&#039;,
		&#039;label&#039; =&gt; &#039;Multimedia Icons&#039;,
		&#039;elements&#039; =&gt; array(
			0xe00c =&gt; &#039;Image&#039;,  0xe00d =&gt; &#039;Image 2&#039;,  0xe00e =&gt; &#039;Images&#039;,  0xe00f =&gt; &#039;Camera&#039;,  0xe010 =&gt; &#039;Music&#039;,  0xe011 =&gt; &#039;Headphones&#039;,
			0xe012 =&gt; &#039;Play&#039;,  0xe013 =&gt; &#039;Film&#039;,  0xe014 =&gt; &#039;Camera 2&#039;,  0xe068 =&gt; &#039;Forward&#039;,  0xe08d =&gt; &#039;Equalizer&#039;,  0xe0cc =&gt; &#039;Brightness contrast&#039;,
			0xe0cd =&gt; &#039;Contrast&#039;,  0xe105 =&gt; &#039;Play 2&#039;,  0xe106 =&gt; &#039;Pause&#039;,  0xe107 =&gt; &#039;Stop&#039;,  0xe108 =&gt; &#039;Backward&#039;,  0xe109 =&gt; &#039;Forward 2&#039;,
			0xe10a =&gt; &#039;Play 3&#039;,  0xe10b =&gt; &#039;Pause 2&#039;,  0xe10c =&gt; &#039;Stop 2&#039;,  0xe10d =&gt; &#039;Backward 2&#039;,  0xe10e =&gt; &#039;Forward 3&#039;,  0xe10f =&gt; &#039;First&#039;,
			0xe110 =&gt; &#039;Last&#039;,  0xe111 =&gt; &#039;Previous&#039;,  0xe112 =&gt; &#039;Next&#039;,  0xe113 =&gt; &#039;Eject&#039;,  0xe114 =&gt; &#039;Volume high&#039;,  0xe115 =&gt; &#039;Volume medium&#039;,
			0xe116 =&gt; &#039;Volume low&#039;,  0xe117 =&gt; &#039;Volume mute&#039;,  0xe118 =&gt; &#039;Volume mute 2&#039;,  0xe119 =&gt; &#039;Volume increase&#039;,  0xe11a =&gt; &#039;Volume decrease&#039;,  0xe11b =&gt; &#039;Loop&#039;,
			0xe11c =&gt; &#039;Loop 2&#039;,  0xe11d =&gt; &#039;Loop 3&#039;,  0xe11e =&gt; &#039;Shuffle&#039;,  0xe122 =&gt; &#039;Arrow right&#039;,  0xe126 =&gt; &#039;Arrow left&#039;,  0xe12a =&gt; &#039;Arrow right 2&#039;,
			0xe12e =&gt; &#039;Arrow left 2&#039;,  0xe132 =&gt; &#039;Arrow right 3&#039;,  0xe136 =&gt; &#039;Arrow left 3&#039;,
		),
		&#039;element_classes&#039; =&gt; array(
			0xe00c =&gt; &#039;icomoon-image&#039;,  0xe00d =&gt; &#039;icomoon-image2&#039;,  0xe00e =&gt; &#039;icomoon-images&#039;,  0xe00f =&gt; &#039;icomoon-camera&#039;,  0xe010 =&gt; &#039;icomoon-music&#039;,  0xe011 =&gt; &#039;icomoon-headphones&#039;,
			0xe012 =&gt; &#039;icomoon-play&#039;,  0xe013 =&gt; &#039;icomoon-film&#039;,  0xe014 =&gt; &#039;icomoon-camera2&#039;,  0xe068 =&gt; &#039;icomoon-forward&#039;,  0xe08d =&gt; &#039;icomoon-equalizer&#039;,  0xe0cc =&gt; &#039;icomoon-brightness-contrast&#039;,
			0xe0cd =&gt; &#039;icomoon-contrast&#039;,  0xe105 =&gt; &#039;icomoon-play2&#039;,  0xe106 =&gt; &#039;icomoon-pause&#039;,  0xe107 =&gt; &#039;icomoon-stop&#039;,  0xe108 =&gt; &#039;icomoon-backward&#039;,  0xe109 =&gt; &#039;icomoon-forward2&#039;,
			0xe10a =&gt; &#039;icomoon-play3&#039;,  0xe10b =&gt; &#039;icomoon-pause2&#039;,  0xe10c =&gt; &#039;icomoon-stop2&#039;,  0xe10d =&gt; &#039;icomoon-backward2&#039;,  0xe10e =&gt; &#039;icomoon-forward3&#039;,  0xe10f =&gt; &#039;icomoon-first&#039;,
			0xe110 =&gt; &#039;icomoon-last&#039;,  0xe111 =&gt; &#039;icomoon-previous&#039;,  0xe112 =&gt; &#039;icomoon-next&#039;,  0xe113 =&gt; &#039;icomoon-eject&#039;,  0xe114 =&gt; &#039;icomoon-volume-high&#039;,  0xe115 =&gt; &#039;icomoon-volume-medium&#039;,
			0xe116 =&gt; &#039;icomoon-volume-low&#039;,  0xe117 =&gt; &#039;icomoon-volume-mute&#039;,  0xe118 =&gt; &#039;icomoon-volume-mute2&#039;,  0xe119 =&gt; &#039;icomoon-volume-increase&#039;,  0xe11a =&gt; &#039;icomoon-volume-decrease&#039;,  0xe11b =&gt; &#039;icomoon-loop&#039;,
			0xe11c =&gt; &#039;icomoon-loop2&#039;,  0xe11d =&gt; &#039;icomoon-loop3&#039;,  0xe11e =&gt; &#039;icomoon-shuffle&#039;,  0xe122 =&gt; &#039;icomoon-arrow-right&#039;,  0xe126 =&gt; &#039;icomoon-arrow-left&#039;,  0xe12a =&gt; &#039;icomoon-arrow-right2&#039;,
			0xe12e =&gt; &#039;icomoon-arrow-left2&#039;,  0xe132 =&gt; &#039;icomoon-arrow-right3&#039;,  0xe136 =&gt; &#039;icomoon-arrow-left3&#039;,
		),
		&#039;tags&#039; =&gt; array(
			&#039;image&#039;, &#039;images&#039;, &#039;picture&#039;, &#039;pictures&#039;, &#039;photo&#039;, &#039;photos&#039;, &#039;gallery&#039;, &#039;video&#039;, &#039;fast forward&#039;, &#039;forward&#039;, &#039;rewind&#039;, &#039;fast rewind&#039;, &#039;volume&#039;, &#039;mute&#039;, &#039;pause&#039;, &#039;equalizer&#039;, &#039;next&#039;, &#039;previous&#039;, &#039;brightness&#039;, &#039;contrast&#039;, &#039;play&#039;, &#039;film&#039;, &#039;music&#039;, &#039;media&#039;, &#039;media control&#039;,
		),
	),
	array(
		&#039;id&#039; =&gt; &#039;location&#039;,
		&#039;label&#039; =&gt; &#039;Location and Contact&#039;,
		&#039;elements&#039; =&gt; array(
			0xe000 =&gt; &#039;Home&#039;,  0xe001 =&gt; &#039;Home 2&#039;,  0xe002 =&gt; &#039;Home 3&#039;,  0xe03c =&gt; &#039;Phone&#039;,  0xe040 =&gt; &#039;Envelope&#039;,  0xe042 =&gt; &#039;Location&#039;,
			0xe043 =&gt; &#039;Location 2&#039;,  0xe045 =&gt; &#039;Map&#039;,  0xe046 =&gt; &#039;Map 2&#039;,  0xe054 =&gt; &#039;Mobile&#039;,  0xe055 =&gt; &#039;Mobile 2&#039;,  0xe0ae =&gt; &#039;Target&#039;,
			0xe0c4 =&gt; &#039;Flag&#039;,
		),
		&#039;element_classes&#039; =&gt; array(
			0xe000 =&gt; &#039;icomoon-home&#039;,  0xe001 =&gt; &#039;icomoon-home2&#039;,  0xe002 =&gt; &#039;icomoon-home3&#039;,  0xe03c =&gt; &#039;icomoon-phone&#039;,  0xe040 =&gt; &#039;icomoon-envelope&#039;,  0xe042 =&gt; &#039;icomoon-location&#039;,
			0xe043 =&gt; &#039;icomoon-location2&#039;,  0xe045 =&gt; &#039;icomoon-map&#039;,  0xe046 =&gt; &#039;icomoon-map2&#039;,  0xe054 =&gt; &#039;icomoon-mobile&#039;,  0xe055 =&gt; &#039;icomoon-mobile2&#039;,  0xe0ae =&gt; &#039;icomoon-target&#039;,
			0xe0c4 =&gt; &#039;icomoon-flag&#039;,
		),
		&#039;tags&#039; =&gt; array(
			&#039;home&#039;, &#039;map&#039;, &#039;phone&#039;, &#039;phone book&#039;, &#039;address&#039;, &#039;address book&#039;, &#039;marker&#039;, &#039;location&#039;, &#039;email&#039;, &#039;envelope&#039;, &#039;flag&#039;,
		),
	),
	array(
		&#039;id&#039; =&gt; &#039;datetime&#039;,
		&#039;label&#039; =&gt; &#039;Date and Time&#039;,
		&#039;elements&#039; =&gt; array(
			0xe047 =&gt; &#039;History&#039;,  0xe048 =&gt; &#039;Clock&#039;,  0xe049 =&gt; &#039;Clock 2&#039;,  0xe04a =&gt; &#039;Alarm&#039;,  0xe04b =&gt; &#039;Alarm 2&#039;,  0xe04d =&gt; &#039;Stopwatch&#039;,
			0xe04e =&gt; &#039;Calendar&#039;,  0xe04f =&gt; &#039;Calendar 2&#039;,
		),
		&#039;element_classes&#039; =&gt; array(
			0xe047 =&gt; &#039;icomoon-history&#039;,  0xe048 =&gt; &#039;icomoon-clock&#039;,  0xe049 =&gt; &#039;icomoon-clock2&#039;,  0xe04a =&gt; &#039;icomoon-alarm&#039;,  0xe04b =&gt; &#039;icomoon-alarm2&#039;,  0xe04d =&gt; &#039;icomoon-stopwatch&#039;,
			0xe04e =&gt; &#039;icomoon-calendar&#039;,  0xe04f =&gt; &#039;icomoon-calendar2&#039;,
		),
		&#039;tags&#039; =&gt; array(
			&#039;clock&#039;, &#039;calendar&#039;, &#039;month&#039;, &#039;year&#039;, &#039;history&#039;, &#039;stopwatch&#039;, &#039;watch&#039;,
		),
	),
	array(
		&#039;id&#039; =&gt; &#039;devices&#039;,
		&#039;label&#039; =&gt; &#039;Devices&#039;,
		&#039;elements&#039; =&gt; array(
			0xe050 =&gt; &#039;Print&#039;,  0xe051 =&gt; &#039;Keyboard&#039;,  0xe052 =&gt; &#039;Screen&#039;,  0xe053 =&gt; &#039;Laptop&#039;,  0xe056 =&gt; &#039;Tablet&#039;,  0xe057 =&gt; &#039;Tv&#039;,

		),
		&#039;element_classes&#039; =&gt; array(
			0xe050 =&gt; &#039;icomoon-print&#039;,  0xe051 =&gt; &#039;icomoon-keyboard&#039;,  0xe052 =&gt; &#039;icomoon-screen&#039;,  0xe053 =&gt; &#039;icomoon-laptop&#039;,  0xe056 =&gt; &#039;icomoon-tablet&#039;,  0xe057 =&gt; &#039;icomoon-tv&#039;,

		),
		&#039;tags&#039; =&gt; array(
			&#039;printer&#039;, &#039;keyboard&#039;, &#039;mouse&#039;, &#039;phone&#039;, &#039;tablet&#039;, &#039;tabloid&#039;, &#039;desktop&#039;, &#039;computer&#039;, &#039;imac&#039;, &#039;television&#039;, &#039;monitor&#039;, &#039;screen&#039;,
		),
	),
	array(
		&#039;id&#039; =&gt; &#039;tools&#039;,
		&#039;label&#039; =&gt; &#039;Tools&#039;,
		&#039;elements&#039; =&gt; array(
			0xe005 =&gt; &#039;Pencil&#039;,  0xe006 =&gt; &#039;Pencil 2&#039;,  0xe007 =&gt; &#039;Quill&#039;,  0xe008 =&gt; &#039;Pen&#039;,  0xe009 =&gt; &#039;Blog&#039;,  0xe00b =&gt; &#039;Paint format&#039;,
			0xe015 =&gt; &#039;Dice&#039;,  0xe086 =&gt; &#039;Key&#039;,  0xe087 =&gt; &#039;Key 2&#039;,  0xe088 =&gt; &#039;Lock&#039;,  0xe089 =&gt; &#039;Lock 2&#039;,  0xe08a =&gt; &#039;Unlocked&#039;,
			0xe08b =&gt; &#039;Wrench&#039;,  0xe08e =&gt; &#039;Cog&#039;,  0xe08f =&gt; &#039;Cogs&#039;,  0xe090 =&gt; &#039;Cog 2&#039;,  0xe091 =&gt; &#039;Hammer&#039;,  0xe0a3 =&gt; &#039;Hammer 2&#039;,
			0xe0a6 =&gt; &#039;Magnet&#039;,  0xe13f =&gt; &#039;Filter&#039;,  0xe140 =&gt; &#039;Filter 2&#039;,
		),
		&#039;element_classes&#039; =&gt; array(
			0xe005 =&gt; &#039;icomoon-pencil&#039;,  0xe006 =&gt; &#039;icomoon-pencil2&#039;,  0xe007 =&gt; &#039;icomoon-quill&#039;,  0xe008 =&gt; &#039;icomoon-pen&#039;,  0xe009 =&gt; &#039;icomoon-blog&#039;,  0xe00b =&gt; &#039;icomoon-paint-format&#039;,
			0xe015 =&gt; &#039;icomoon-dice&#039;,  0xe086 =&gt; &#039;icomoon-key&#039;,  0xe087 =&gt; &#039;icomoon-key2&#039;,  0xe088 =&gt; &#039;icomoon-lock&#039;,  0xe089 =&gt; &#039;icomoon-lock2&#039;,  0xe08a =&gt; &#039;icomoon-unlocked&#039;,
			0xe08b =&gt; &#039;icomoon-wrench&#039;,  0xe08e =&gt; &#039;icomoon-cog&#039;,  0xe08f =&gt; &#039;icomoon-cogs&#039;,  0xe090 =&gt; &#039;icomoon-cog2&#039;,  0xe091 =&gt; &#039;icomoon-hammer&#039;,  0xe0a3 =&gt; &#039;icomoon-hammer2&#039;,
			0xe0a6 =&gt; &#039;icomoon-magnet&#039;,  0xe13f =&gt; &#039;icomoon-filter&#039;,  0xe140 =&gt; &#039;icomoon-filter2&#039;,
		),
		&#039;tags&#039; =&gt; array(
			&#039;wrench&#039;, &#039;cog&#039;, &#039;cogs&#039;, &#039;pen&#039;, &#039;pencil&#039;, &#039;key&#039;, &#039;lock&#039;, &#039;unlock&#039;, &#039;unlocked&#039;, &#039;filter&#039;, &#039;brush&#039;, &#039;paint&#039;, &#039;dice&#039;, &#039;quill&#039;, &#039;paint-format&#039;, &#039;tool&#039;, &#039;hammer&#039;, &#039;magnet&#039;,
		),
	),
	array(
		&#039;id&#039; =&gt; &#039;social&#039;,
		&#039;label&#039; =&gt; &#039;Social Networking&#039;,
		&#039;elements&#039; =&gt; array(
			0xe15e =&gt; &#039;Share&#039;,  0xe164 =&gt; &#039;Googleplus&#039;,  0xe165 =&gt; &#039;Googleplus 2&#039;,  0xe166 =&gt; &#039;Googleplus 3&#039;,  0xe167 =&gt; &#039;Googleplus 4&#039;,  0xe168 =&gt; &#039;Google drive&#039;,
			0xe169 =&gt; &#039;Facebook&#039;,  0xe16a =&gt; &#039;Facebook 2&#039;,  0xe16b =&gt; &#039;Facebook 3&#039;,  0xe16c =&gt; &#039;Instagram&#039;,  0xe16d =&gt; &#039;Twitter&#039;,  0xe16e =&gt; &#039;Twitter 2&#039;,
			0xe16f =&gt; &#039;Twitter 3&#039;,  0xe173 =&gt; &#039;Youtube&#039;,  0xe174 =&gt; &#039;Youtube 2&#039;,  0xe175 =&gt; &#039;Vimeo&#039;,  0xe176 =&gt; &#039;Vimeo 2&#039;,  0xe177 =&gt; &#039;Vimeo 3&#039;,
			0xe179 =&gt; &#039;Flickr&#039;,  0xe17a =&gt; &#039;Flickr 2&#039;,  0xe17b =&gt; &#039;Flickr 3&#039;,  0xe17c =&gt; &#039;Flickr 4&#039;,  0xe17d =&gt; &#039;Picassa&#039;,  0xe17e =&gt; &#039;Picassa 2&#039;,
			0xe17f =&gt; &#039;Dribbble&#039;,  0xe180 =&gt; &#039;Dribbble 2&#039;,  0xe181 =&gt; &#039;Dribbble 3&#039;,  0xe182 =&gt; &#039;Forrst&#039;,  0xe183 =&gt; &#039;Forrst 2&#039;,  0xe184 =&gt; &#039;Deviantart&#039;,
			0xe185 =&gt; &#039;Deviantart 2&#039;,  0xe186 =&gt; &#039;Steam&#039;,  0xe187 =&gt; &#039;Steam 2&#039;,  0xe188 =&gt; &#039;Github&#039;,  0xe189 =&gt; &#039;Github 2&#039;,  0xe18a =&gt; &#039;Github 3&#039;,
			0xe18b =&gt; &#039;Github 4&#039;,  0xe18c =&gt; &#039;Github 5&#039;,  0xe18d =&gt; &#039;Wordpress&#039;,  0xe18e =&gt; &#039;Wordpress 2&#039;,  0xe190 =&gt; &#039;Blogger&#039;,  0xe191 =&gt; &#039;Blogger 2&#039;,
			0xe192 =&gt; &#039;Tumblr&#039;,  0xe193 =&gt; &#039;Tumblr 2&#039;,  0xe194 =&gt; &#039;Yahoo&#039;,  0xe19b =&gt; &#039;Soundcloud&#039;,  0xe19c =&gt; &#039;Soundcloud 2&#039;,  0xe19e =&gt; &#039;Reddit&#039;,
			0xe19f =&gt; &#039;Linkedin&#039;,  0xe1a0 =&gt; &#039;Lastfm&#039;,  0xe1a1 =&gt; &#039;Lastfm 2&#039;,  0xe1a2 =&gt; &#039;Delicious&#039;,  0xe1a3 =&gt; &#039;Stumbleupon&#039;,  0xe1a4 =&gt; &#039;Stumbleupon 2&#039;,
			0xe1a5 =&gt; &#039;Stackoverflow&#039;,  0xe1a6 =&gt; &#039;Pinterest&#039;,  0xe1a7 =&gt; &#039;Pinterest 2&#039;,  0xe1a8 =&gt; &#039;Xing&#039;,  0xe1a9 =&gt; &#039;Xing 2&#039;,  0xe1aa =&gt; &#039;Flattr&#039;,
			0xe1ab =&gt; &#039;Foursquare&#039;,  0xe1ac =&gt; &#039;Foursquare 2&#039;,  0xe1b0 =&gt; &#039;Yelp&#039;,
		),
		&#039;element_classes&#039; =&gt; array(
			0xe15e =&gt; &#039;icomoon-share&#039;,  0xe164 =&gt; &#039;icomoon-googleplus&#039;,  0xe165 =&gt; &#039;icomoon-googleplus2&#039;,  0xe166 =&gt; &#039;icomoon-googleplus3&#039;,  0xe167 =&gt; &#039;icomoon-googleplus4&#039;,  0xe168 =&gt; &#039;icomoon-google-drive&#039;,
			0xe169 =&gt; &#039;icomoon-facebook&#039;,  0xe16a =&gt; &#039;icomoon-facebook2&#039;,  0xe16b =&gt; &#039;icomoon-facebook3&#039;,  0xe16c =&gt; &#039;icomoon-instagram&#039;,  0xe16d =&gt; &#039;icomoon-twitter&#039;,  0xe16e =&gt; &#039;icomoon-twitter2&#039;,
			0xe16f =&gt; &#039;icomoon-twitter3&#039;,  0xe173 =&gt; &#039;icomoon-youtube&#039;,  0xe174 =&gt; &#039;icomoon-youtube2&#039;,  0xe175 =&gt; &#039;icomoon-vimeo&#039;,  0xe176 =&gt; &#039;icomoon-vimeo2&#039;,  0xe177 =&gt; &#039;icomoon-vimeo3&#039;,
			0xe179 =&gt; &#039;icomoon-flickr&#039;,  0xe17a =&gt; &#039;icomoon-flickr2&#039;,  0xe17b =&gt; &#039;icomoon-flickr3&#039;,  0xe17c =&gt; &#039;icomoon-flickr4&#039;,  0xe17d =&gt; &#039;icomoon-picassa&#039;,  0xe17e =&gt; &#039;icomoon-picassa2&#039;,
			0xe17f =&gt; &#039;icomoon-dribbble&#039;,  0xe180 =&gt; &#039;icomoon-dribbble2&#039;,  0xe181 =&gt; &#039;icomoon-dribbble3&#039;,  0xe182 =&gt; &#039;icomoon-forrst&#039;,  0xe183 =&gt; &#039;icomoon-forrst2&#039;,  0xe184 =&gt; &#039;icomoon-deviantart&#039;,
			0xe185 =&gt; &#039;icomoon-deviantart2&#039;,  0xe186 =&gt; &#039;icomoon-steam&#039;,  0xe187 =&gt; &#039;icomoon-steam2&#039;,  0xe188 =&gt; &#039;icomoon-github&#039;,  0xe189 =&gt; &#039;icomoon-github2&#039;,  0xe18a =&gt; &#039;icomoon-github3&#039;,
			0xe18b =&gt; &#039;icomoon-github4&#039;,  0xe18c =&gt; &#039;icomoon-github5&#039;,  0xe18d =&gt; &#039;icomoon-wordpress&#039;,  0xe18e =&gt; &#039;icomoon-wordpress2&#039;,  0xe190 =&gt; &#039;icomoon-blogger&#039;,  0xe191 =&gt; &#039;icomoon-blogger2&#039;,
			0xe192 =&gt; &#039;icomoon-tumblr&#039;,  0xe193 =&gt; &#039;icomoon-tumblr2&#039;,  0xe194 =&gt; &#039;icomoon-yahoo&#039;,  0xe19b =&gt; &#039;icomoon-soundcloud&#039;,  0xe19c =&gt; &#039;icomoon-soundcloud2&#039;,  0xe19e =&gt; &#039;icomoon-reddit&#039;,
			0xe19f =&gt; &#039;icomoon-linkedin&#039;,  0xe1a0 =&gt; &#039;icomoon-lastfm&#039;,  0xe1a1 =&gt; &#039;icomoon-lastfm2&#039;,  0xe1a2 =&gt; &#039;icomoon-delicious&#039;,  0xe1a3 =&gt; &#039;icomoon-stumbleupon&#039;,  0xe1a4 =&gt; &#039;icomoon-stumbleupon2&#039;,
			0xe1a5 =&gt; &#039;icomoon-stackoverflow&#039;,  0xe1a6 =&gt; &#039;icomoon-pinterest&#039;,  0xe1a7 =&gt; &#039;icomoon-pinterest2&#039;,  0xe1a8 =&gt; &#039;icomoon-xing&#039;,  0xe1a9 =&gt; &#039;icomoon-xing2&#039;,  0xe1aa =&gt; &#039;icomoon-flattr&#039;,
			0xe1ab =&gt; &#039;icomoon-foursquare&#039;,  0xe1ac =&gt; &#039;icomoon-foursquare2&#039;,  0xe1b0 =&gt; &#039;icomoon-yelp&#039;,
		),
		&#039;tags&#039; =&gt; array(
			&#039;share&#039;, &#039;google plus&#039;, &#039;googleplus&#039;, &#039;google drive&#039;, &#039;drive&#039;, &#039;facebook&#039;, &#039;twitter&#039;, &#039;vimeo&#039;, &#039;picasa&#039;, &#039;social&#039;, &#039;github&#039;, &#039;wordpress&#039;, &#039;pinterest&#039;, &#039;tumblr&#039;, &#039;yahoo&#039;, &#039;lastfm&#039;, &#039;linkedin&#039;, &#039;stumbleupon&#039;, &#039;soundcloud&#039;, &#039;reddit&#039;, &#039;yelp&#039;, &#039;stackoverflow&#039;,
		),
	),
	array(
		&#039;id&#039; =&gt; &#039;brands&#039;,
		&#039;label&#039; =&gt; &#039;Brands Icons&#039;,
		&#039;elements&#039; =&gt; array(
			0xe18f =&gt; &#039;Joomla&#039;,  0xe195 =&gt; &#039;Tux&#039;,  0xe196 =&gt; &#039;Apple&#039;,  0xe197 =&gt; &#039;Finder&#039;,  0xe198 =&gt; &#039;Android&#039;,  0xe199 =&gt; &#039;Windows&#039;,
			0xe19a =&gt; &#039;Windows 8&#039;,  0xe19d =&gt; &#039;Skype&#039;,  0xe1ad =&gt; &#039;Paypal&#039;,  0xe1ae =&gt; &#039;Paypal 2&#039;,  0xe1af =&gt; &#039;Paypal 3&#039;,  0xe1ba =&gt; &#039;Html 5&#039;,
			0xe1bb =&gt; &#039;Html 52&#039;,  0xe1bc =&gt; &#039;Css 3&#039;,  0xe1bd =&gt; &#039;Chrome&#039;,  0xe1be =&gt; &#039;Firefox&#039;,  0xe1bf =&gt; &#039;IE&#039;,  0xe1c0 =&gt; &#039;Opera&#039;,
			0xe1c1 =&gt; &#039;Safari&#039;,
		),
		&#039;element_classes&#039; =&gt; array(
			0xe18f =&gt; &#039;icomoon-joomla&#039;,  0xe195 =&gt; &#039;icomoon-tux&#039;,  0xe196 =&gt; &#039;icomoon-apple&#039;,  0xe197 =&gt; &#039;icomoon-finder&#039;,  0xe198 =&gt; &#039;icomoon-android&#039;,  0xe199 =&gt; &#039;icomoon-windows&#039;,
			0xe19a =&gt; &#039;icomoon-windows8&#039;,  0xe19d =&gt; &#039;icomoon-skype&#039;,  0xe1ad =&gt; &#039;icomoon-paypal&#039;,  0xe1ae =&gt; &#039;icomoon-paypal2&#039;,  0xe1af =&gt; &#039;icomoon-paypal3&#039;,  0xe1ba =&gt; &#039;icomoon-html5&#039;,
			0xe1bb =&gt; &#039;icomoon-html52&#039;,  0xe1bc =&gt; &#039;icomoon-css3&#039;,  0xe1bd =&gt; &#039;icomoon-chrome&#039;,  0xe1be =&gt; &#039;icomoon-firefox&#039;,  0xe1bf =&gt; &#039;icomoon-IE&#039;,  0xe1c0 =&gt; &#039;icomoon-opera&#039;,
			0xe1c1 =&gt; &#039;icomoon-safari&#039;,
		),
		&#039;tags&#039; =&gt; array(
			&#039;apple&#039;, &#039;android&#039;, &#039;paypal&#039;, &#039;linux&#039;, &#039;finder&#039;, &#039;windows&#039;, &#039;skype&#039;, &#039;chrome&#039;, &#039;firefox&#039;, &#039;explorer&#039;, &#039;safari&#039;, &#039;opera&#039;, &#039;joomla&#039;, &#039;browser&#039;, &#039;browsers&#039;, &#039;html5&#039;, &#039;css3&#039;,
		),
	),
	array(
		&#039;id&#039; =&gt; &#039;documents&#039;,
		&#039;label&#039; =&gt; &#039;Files &amp; Documents&#039;,
		&#039;elements&#039; =&gt; array(
			0xe022 =&gt; &#039;File&#039;,  0xe024 =&gt; &#039;File 2&#039;,  0xe025 =&gt; &#039;File 3&#039;,  0xe026 =&gt; &#039;File 4&#039;,  0xe02e =&gt; &#039;Folder&#039;,  0xe02f =&gt; &#039;Folder open&#039;,
			0xe058 =&gt; &#039;Cabinet&#039;,  0xe059 =&gt; &#039;Drawer&#039;,  0xe05a =&gt; &#039;Drawer 2&#039;,  0xe05b =&gt; &#039;Drawer 3&#039;,  0xe1b1 =&gt; &#039;Libreoffice&#039;,  0xe1b2 =&gt; &#039;File pdf&#039;,
			0xe1b3 =&gt; &#039;File openoffice&#039;,  0xe1b4 =&gt; &#039;File word&#039;,  0xe1b5 =&gt; &#039;File excel&#039;,  0xe1b6 =&gt; &#039;File zip&#039;,  0xe1b7 =&gt; &#039;File powerpoint&#039;,  0xe1b8 =&gt; &#039;File xml&#039;,
			0xe1b9 =&gt; &#039;File css&#039;,
		),
		&#039;element_classes&#039; =&gt; array(
			0xe022 =&gt; &#039;icomoon-file&#039;,  0xe024 =&gt; &#039;icomoon-file2&#039;,  0xe025 =&gt; &#039;icomoon-file3&#039;,  0xe026 =&gt; &#039;icomoon-file4&#039;,  0xe02e =&gt; &#039;icomoon-folder&#039;,  0xe02f =&gt; &#039;icomoon-folder-open&#039;,
			0xe058 =&gt; &#039;icomoon-cabinet&#039;,  0xe059 =&gt; &#039;icomoon-drawer&#039;,  0xe05a =&gt; &#039;icomoon-drawer2&#039;,  0xe05b =&gt; &#039;icomoon-drawer3&#039;,  0xe1b1 =&gt; &#039;icomoon-libreoffice&#039;,  0xe1b2 =&gt; &#039;icomoon-file-pdf&#039;,
			0xe1b3 =&gt; &#039;icomoon-file-openoffice&#039;,  0xe1b4 =&gt; &#039;icomoon-file-word&#039;,  0xe1b5 =&gt; &#039;icomoon-file-excel&#039;,  0xe1b6 =&gt; &#039;icomoon-file-zip&#039;,  0xe1b7 =&gt; &#039;icomoon-file-powerpoint&#039;,  0xe1b8 =&gt; &#039;icomoon-file-xml&#039;,
			0xe1b9 =&gt; &#039;icomoon-file-css&#039;,
		),
		&#039;tags&#039; =&gt; array(
			&#039;folder&#039;, &#039;file&#039;, &#039;pdf&#039;, &#039;libre&#039;, &#039;excel&#039;, &#039;word&#039;, &#039;powerpoint&#039;, &#039;html&#039;, &#039;xml&#039;, &#039;csv&#039;, &#039;zip&#039;, &#039;drawer&#039;, &#039;drawers&#039;, &#039;cabinet&#039;,
		),
	),
	array(
		&#039;id&#039; =&gt; &#039;travel&#039;,
		&#039;label&#039; =&gt; &#039;Travel and Living&#039;,
		&#039;elements&#039; =&gt; array(
			0xe034 =&gt; &#039;Ticket&#039;,  0xe09a =&gt; &#039;Trophy&#039;,  0xe09b =&gt; &#039;Glass&#039;,  0xe09c =&gt; &#039;Mug&#039;,  0xe09d =&gt; &#039;Food&#039;,  0xe09f =&gt; &#039;Rocket&#039;,
			0xe0aa =&gt; &#039;Airplane&#039;,  0xe0ab =&gt; &#039;Truck&#039;,  0xe0ac =&gt; &#039;Road&#039;,
		),
		&#039;element_classes&#039; =&gt; array(
			0xe034 =&gt; &#039;icomoon-ticket&#039;,  0xe09a =&gt; &#039;icomoon-trophy&#039;,  0xe09b =&gt; &#039;icomoon-glass&#039;,  0xe09c =&gt; &#039;icomoon-mug&#039;,  0xe09d =&gt; &#039;icomoon-food&#039;,  0xe09f =&gt; &#039;icomoon-rocket&#039;,
			0xe0aa =&gt; &#039;icomoon-airplane&#039;,  0xe0ab =&gt; &#039;icomoon-truck&#039;,  0xe0ac =&gt; &#039;icomoon-road&#039;,
		),
		&#039;tags&#039; =&gt; array(
			&#039;coffee&#039;, &#039;knife&#039;, &#039;fork&#039;, &#039;road&#039;, &#039;plane&#039;, &#039;jet&#039;, &#039;truck&#039;, &#039;raod&#039;, &#039;ticket&#039;, &#039;cinema&#039;, &#039;prize&#039;, &#039;drink&#039;, &#039;beverage&#039;,
		),
	),
	array(
		&#039;id&#039; =&gt; &#039;weather&#039;,
		&#039;label&#039; =&gt; &#039;Weather &amp; Nature Icons&#039;,
		&#039;elements&#039; =&gt; array(
			0xe09e =&gt; &#039;Leaf&#039;,  0xe0a4 =&gt; &#039;Fire&#039;,  0xe0b0 =&gt; &#039;Lightning&#039;,  0xe0ba =&gt; &#039;Cloud&#039;,  0xe0cb =&gt; &#039;Brightness medium&#039;,
		),
		&#039;element_classes&#039; =&gt; array(
			0xe09e =&gt; &#039;icomoon-leaf&#039;,  0xe0a4 =&gt; &#039;icomoon-fire&#039;,  0xe0b0 =&gt; &#039;icomoon-lightning&#039;,  0xe0ba =&gt; &#039;icomoon-cloud&#039;,  0xe0cb =&gt; &#039;icomoon-brightness-medium&#039;,
		),
		&#039;tags&#039; =&gt; array(
			&#039;leaf&#039;, &#039;sun&#039;, &#039;sunrise&#039;, &#039;windy&#039;, &#039;snow&#039;, &#039;snowflake&#039;, &#039;cloudy&#039;, &#039;cloud&#039;, &#039;weather&#039;, &#039;moon&#039;, &#039;wind&#039;, &#039;rain&#039;, &#039;rainy&#039;, &#039;lightning&#039;, &#039;snowy&#039;, &#039;fire&#039;,
		),
	),
	array(
		&#039;id&#039; =&gt; &#039;like_dislike&#039;,
		&#039;label&#039; =&gt; &#039;Like &amp; Dislike Icons&#039;,
		&#039;elements&#039; =&gt; array(
			0xe0c6 =&gt; &#039;Eye&#039;,  0xe0c8 =&gt; &#039;Eye 2&#039;,  0xe0ce =&gt; &#039;Star&#039;,  0xe0cf =&gt; &#039;Star 2&#039;,  0xe0d0 =&gt; &#039;Star 3&#039;,  0xe0d1 =&gt; &#039;Heart&#039;,
			0xe0d2 =&gt; &#039;Heart 2&#039;,  0xe0d3 =&gt; &#039;Heart broken&#039;,  0xe0d4 =&gt; &#039;Thumbs up&#039;,  0xe0d5 =&gt; &#039;Thumbs up 2&#039;,
		),
		&#039;element_classes&#039; =&gt; array(
			0xe0c6 =&gt; &#039;icomoon-eye&#039;,  0xe0c8 =&gt; &#039;icomoon-eye2&#039;,  0xe0ce =&gt; &#039;icomoon-star&#039;,  0xe0cf =&gt; &#039;icomoon-star2&#039;,  0xe0d0 =&gt; &#039;icomoon-star3&#039;,  0xe0d1 =&gt; &#039;icomoon-heart&#039;,
			0xe0d2 =&gt; &#039;icomoon-heart2&#039;,  0xe0d3 =&gt; &#039;icomoon-heart-broken&#039;,  0xe0d4 =&gt; &#039;icomoon-thumbs-up&#039;,  0xe0d5 =&gt; &#039;icomoon-thumbs-up2&#039;,
		),
		&#039;tags&#039; =&gt; array(
			&#039;thumb&#039;, &#039;thumbs&#039;, &#039;heart&#039;, &#039;star&#039;, &#039;eye&#039;,
		),
	),
	array(
		&#039;id&#039; =&gt; &#039;emoticons&#039;,
		&#039;label&#039; =&gt; &#039;Emoticons&#039;,
		&#039;elements&#039; =&gt; array(
			0xe0d6 =&gt; &#039;Happy&#039;,  0xe0d7 =&gt; &#039;Happy 2&#039;,  0xe0d8 =&gt; &#039;Smiley&#039;,  0xe0d9 =&gt; &#039;Smiley 2&#039;,  0xe0da =&gt; &#039;Tongue&#039;,  0xe0db =&gt; &#039;Tongue 2&#039;,
			0xe0dc =&gt; &#039;Sad&#039;,  0xe0dd =&gt; &#039;Sad 2&#039;,  0xe0de =&gt; &#039;Wink&#039;,  0xe0df =&gt; &#039;Wink 2&#039;,  0xe0e0 =&gt; &#039;Grin&#039;,  0xe0e1 =&gt; &#039;Grin 2&#039;,
			0xe0e2 =&gt; &#039;Cool&#039;,  0xe0e3 =&gt; &#039;Cool 2&#039;,  0xe0e4 =&gt; &#039;Angry&#039;,  0xe0e5 =&gt; &#039;Angry 2&#039;,  0xe0e6 =&gt; &#039;Evil&#039;,  0xe0e7 =&gt; &#039;Evil 2&#039;,
			0xe0e8 =&gt; &#039;Shocked&#039;,  0xe0e9 =&gt; &#039;Shocked 2&#039;,  0xe0ea =&gt; &#039;Confused&#039;,  0xe0eb =&gt; &#039;Confused 2&#039;,  0xe0ec =&gt; &#039;Neutral&#039;,  0xe0ed =&gt; &#039;Neutral 2&#039;,
			0xe0ee =&gt; &#039;Wondering&#039;,  0xe0ef =&gt; &#039;Wondering 2&#039;,
		),
		&#039;element_classes&#039; =&gt; array(
			0xe0d6 =&gt; &#039;icomoon-happy&#039;,  0xe0d7 =&gt; &#039;icomoon-happy2&#039;,  0xe0d8 =&gt; &#039;icomoon-smiley&#039;,  0xe0d9 =&gt; &#039;icomoon-smiley2&#039;,  0xe0da =&gt; &#039;icomoon-tongue&#039;,  0xe0db =&gt; &#039;icomoon-tongue2&#039;,
			0xe0dc =&gt; &#039;icomoon-sad&#039;,  0xe0dd =&gt; &#039;icomoon-sad2&#039;,  0xe0de =&gt; &#039;icomoon-wink&#039;,  0xe0df =&gt; &#039;icomoon-wink2&#039;,  0xe0e0 =&gt; &#039;icomoon-grin&#039;,  0xe0e1 =&gt; &#039;icomoon-grin2&#039;,
			0xe0e2 =&gt; &#039;icomoon-cool&#039;,  0xe0e3 =&gt; &#039;icomoon-cool2&#039;,  0xe0e4 =&gt; &#039;icomoon-angry&#039;,  0xe0e5 =&gt; &#039;icomoon-angry2&#039;,  0xe0e6 =&gt; &#039;icomoon-evil&#039;,  0xe0e7 =&gt; &#039;icomoon-evil2&#039;,
			0xe0e8 =&gt; &#039;icomoon-shocked&#039;,  0xe0e9 =&gt; &#039;icomoon-shocked2&#039;,  0xe0ea =&gt; &#039;icomoon-confused&#039;,  0xe0eb =&gt; &#039;icomoon-confused2&#039;,  0xe0ec =&gt; &#039;icomoon-neutral&#039;,  0xe0ed =&gt; &#039;icomoon-neutral2&#039;,
			0xe0ee =&gt; &#039;icomoon-wondering&#039;,  0xe0ef =&gt; &#039;icomoon-wondering2&#039;,
		),
		&#039;tags&#039; =&gt; array(
			&#039;smile&#039;, &#039;smiley&#039;, &#039;emot&#039;, &#039;emoticon&#039;, &#039;emoticons&#039;, &#039;meh&#039;, &#039;frown&#039;, &#039;happy&#039;, &#039;sad&#039;, &#039;angry&#039;, &#039;cool&#039;, &#039;wink&#039;, &#039;grin&#039;, &#039;evil&#039;, &#039;shocked&#039;, &#039;tongue&#039;, &#039;tease&#039;, &#039;teaser&#039;, &#039;confused&#039;, &#039;neutral&#039;, &#039;wondering&#039;,
		),
	),
	array(
		&#039;id&#039; =&gt; &#039;arrow&#039;,
		&#039;label&#039; =&gt; &#039;Directional Icons&#039;,
		&#039;elements&#039; =&gt; array(
			0xe044 =&gt; &#039;Compass&#039;,  0xe069 =&gt; &#039;Reply&#039;,  0xe0f0 =&gt; &#039;Point up&#039;,  0xe0f1 =&gt; &#039;Point right&#039;,  0xe0f2 =&gt; &#039;Point down&#039;,  0xe0f3 =&gt; &#039;Point left&#039;,
			0xe11f =&gt; &#039;Arrow up left&#039;,  0xe121 =&gt; &#039;Arrow up right&#039;,  0xe123 =&gt; &#039;Arrow down right&#039;,  0xe125 =&gt; &#039;Arrow down left&#039;,  0xe127 =&gt; &#039;Arrow up left 2&#039;,  0xe129 =&gt; &#039;Arrow up right 2&#039;,
			0xe12b =&gt; &#039;Arrow down right 2&#039;,  0xe12d =&gt; &#039;Arrow down left 2&#039;,  0xe12f =&gt; &#039;Arrow up left 3&#039;,  0xe131 =&gt; &#039;Arrow up right 3&#039;,  0xe133 =&gt; &#039;Arrow down right 3&#039;,  0xe135 =&gt; &#039;Arrow down left 3&#039;,

		),
		&#039;element_classes&#039; =&gt; array(
			0xe044 =&gt; &#039;icomoon-compass&#039;,  0xe069 =&gt; &#039;icomoon-reply&#039;,  0xe0f0 =&gt; &#039;icomoon-point-up&#039;,  0xe0f1 =&gt; &#039;icomoon-point-right&#039;,  0xe0f2 =&gt; &#039;icomoon-point-down&#039;,  0xe0f3 =&gt; &#039;icomoon-point-left&#039;,
			0xe11f =&gt; &#039;icomoon-arrow-up-left&#039;,  0xe121 =&gt; &#039;icomoon-arrow-up-right&#039;,  0xe123 =&gt; &#039;icomoon-arrow-down-right&#039;,  0xe125 =&gt; &#039;icomoon-arrow-down-left&#039;,  0xe127 =&gt; &#039;icomoon-arrow-up-left2&#039;,  0xe129 =&gt; &#039;icomoon-arrow-up-right2&#039;,
			0xe12b =&gt; &#039;icomoon-arrow-down-right2&#039;,  0xe12d =&gt; &#039;icomoon-arrow-down-left2&#039;,  0xe12f =&gt; &#039;icomoon-arrow-up-left3&#039;,  0xe131 =&gt; &#039;icomoon-arrow-up-right3&#039;,  0xe133 =&gt; &#039;icomoon-arrow-down-right3&#039;,  0xe135 =&gt; &#039;icomoon-arrow-down-left3&#039;,

		),
		&#039;tags&#039; =&gt; array(
			&#039;arrow&#039;, &#039;point&#039;, &#039;direction&#039;, &#039;directional&#039;,
		),
	),
	array(
		&#039;id&#039; =&gt; &#039;others&#039;,
		&#039;label&#039; =&gt; &#039;Other Icons&#039;,
		&#039;elements&#039; =&gt; array(
			0xe00a =&gt; &#039;Droplet&#039;,  0xe016 =&gt; &#039;Pacman&#039;,  0xe017 =&gt; &#039;Spades&#039;,  0xe018 =&gt; &#039;Clubs&#039;,  0xe019 =&gt; &#039;Diamonds&#039;,  0xe01a =&gt; &#039;Pawn&#039;,
			0xe01b =&gt; &#039;Bullhorn&#039;,  0xe02d =&gt; &#039;Stack&#039;,  0xe04c =&gt; &#039;Bell&#039;,  0xe076 =&gt; &#039;Quotes left&#039;,  0xe092 =&gt; &#039;Wand&#039;,  0xe093 =&gt; &#039;Aid&#039;,
			0xe094 =&gt; &#039;Bug&#039;,  0xe0a0 =&gt; &#039;Meter&#039;,  0xe0a1 =&gt; &#039;Meter 2&#039;,  0xe0a2 =&gt; &#039;Dashboard&#039;,  0xe0a5 =&gt; &#039;Lab&#039;,  0xe0ad =&gt; &#039;Accessibility&#039;,
			0xe0af =&gt; &#039;Shield&#039;,  0xe0b1 =&gt; &#039;Switch&#039;,  0xe0b2 =&gt; &#039;Powercord&#039;,  0xe0b9 =&gt; &#039;Tree&#039;,  0xe0fb =&gt; &#039;Checkmark circle&#039;,  0xe0fe =&gt; &#039;Checkmark&#039;,
			0xe0ff =&gt; &#039;Checkmark 2&#039;,  0xe101 =&gt; &#039;Minus&#039;,  0xe102 =&gt; &#039;Plus&#039;,  0xe137 =&gt; &#039;Tab&#039;,  0xe139 =&gt; &#039;Checkbox unchecked&#039;,  0xe13a =&gt; &#039;Checkbox partial&#039;,
			0xe15d =&gt; &#039;Console&#039;,  0xe163 =&gt; &#039;Google&#039;,  0xe178 =&gt; &#039;Lanyrd&#039;,  0xe1c2 =&gt; &#039;IcoMoon&#039;,
		),
		&#039;element_classes&#039; =&gt; array(
			0xe00a =&gt; &#039;icomoon-droplet&#039;,  0xe016 =&gt; &#039;icomoon-pacman&#039;,  0xe017 =&gt; &#039;icomoon-spades&#039;,  0xe018 =&gt; &#039;icomoon-clubs&#039;,  0xe019 =&gt; &#039;icomoon-diamonds&#039;,  0xe01a =&gt; &#039;icomoon-pawn&#039;,
			0xe01b =&gt; &#039;icomoon-bullhorn&#039;,  0xe02d =&gt; &#039;icomoon-stack&#039;,  0xe04c =&gt; &#039;icomoon-bell&#039;,  0xe076 =&gt; &#039;icomoon-quotes-left&#039;,  0xe092 =&gt; &#039;icomoon-wand&#039;,  0xe093 =&gt; &#039;icomoon-aid&#039;,
			0xe094 =&gt; &#039;icomoon-bug&#039;,  0xe0a0 =&gt; &#039;icomoon-meter&#039;,  0xe0a1 =&gt; &#039;icomoon-meter2&#039;,  0xe0a2 =&gt; &#039;icomoon-dashboard&#039;,  0xe0a5 =&gt; &#039;icomoon-lab&#039;,  0xe0ad =&gt; &#039;icomoon-accessibility&#039;,
			0xe0af =&gt; &#039;icomoon-shield&#039;,  0xe0b1 =&gt; &#039;icomoon-switch&#039;,  0xe0b2 =&gt; &#039;icomoon-powercord&#039;,  0xe0b9 =&gt; &#039;icomoon-tree&#039;,  0xe0fb =&gt; &#039;icomoon-checkmark-circle&#039;,  0xe0fe =&gt; &#039;icomoon-checkmark&#039;,
			0xe0ff =&gt; &#039;icomoon-checkmark2&#039;,  0xe101 =&gt; &#039;icomoon-minus&#039;,  0xe102 =&gt; &#039;icomoon-plus&#039;,  0xe137 =&gt; &#039;icomoon-tab&#039;,  0xe139 =&gt; &#039;icomoon-checkbox-unchecked&#039;,  0xe13a =&gt; &#039;icomoon-checkbox-partial&#039;,
			0xe15d =&gt; &#039;icomoon-console&#039;,  0xe163 =&gt; &#039;icomoon-google&#039;,  0xe178 =&gt; &#039;icomoon-lanyrd&#039;,  0xe1c2 =&gt; &#039;icomoon-IcoMoon&#039;,
		),
		&#039;tags&#039; =&gt; array(
			&#039;&#039;,
		),
	),
);

$icomoon_images = array(
	0xe000 =&gt; &#039;home.png&#039;,
	0xe001 =&gt; &#039;home2.png&#039;,
	0xe002 =&gt; &#039;home3.png&#039;,
	0xe003 =&gt; &#039;office.png&#039;,
	0xe004 =&gt; &#039;newspaper.png&#039;,
	0xe005 =&gt; &#039;pencil.png&#039;,
	0xe006 =&gt; &#039;pencil2.png&#039;,
	0xe007 =&gt; &#039;quill.png&#039;,
	0xe008 =&gt; &#039;pen.png&#039;,
	0xe009 =&gt; &#039;blog.png&#039;,
	0xe00a =&gt; &#039;droplet.png&#039;,
	0xe00b =&gt; &#039;paint-format.png&#039;,
	0xe00c =&gt; &#039;image.png&#039;,
	0xe00d =&gt; &#039;image2.png&#039;,
	0xe00e =&gt; &#039;images.png&#039;,
	0xe00f =&gt; &#039;camera.png&#039;,
	0xe010 =&gt; &#039;music.png&#039;,
	0xe011 =&gt; &#039;headphones.png&#039;,
	0xe012 =&gt; &#039;play.png&#039;,
	0xe013 =&gt; &#039;film.png&#039;,
	0xe014 =&gt; &#039;camera2.png&#039;,
	0xe015 =&gt; &#039;dice.png&#039;,
	0xe016 =&gt; &#039;pacman.png&#039;,
	0xe017 =&gt; &#039;spades.png&#039;,
	0xe018 =&gt; &#039;clubs.png&#039;,
	0xe019 =&gt; &#039;diamonds.png&#039;,
	0xe01a =&gt; &#039;pawn.png&#039;,
	0xe01b =&gt; &#039;bullhorn.png&#039;,
	0xe01c =&gt; &#039;connection.png&#039;,
	0xe01d =&gt; &#039;podcast.png&#039;,
	0xe01e =&gt; &#039;feed.png&#039;,
	0xe01f =&gt; &#039;book.png&#039;,
	0xe020 =&gt; &#039;books.png&#039;,
	0xe021 =&gt; &#039;library.png&#039;,
	0xe022 =&gt; &#039;file.png&#039;,
	0xe023 =&gt; &#039;profile.png&#039;,
	0xe024 =&gt; &#039;file2.png&#039;,
	0xe025 =&gt; &#039;file3.png&#039;,
	0xe026 =&gt; &#039;file4.png&#039;,
	0xe027 =&gt; &#039;copy.png&#039;,
	0xe028 =&gt; &#039;copy2.png&#039;,
	0xe029 =&gt; &#039;copy3.png&#039;,
	0xe02a =&gt; &#039;paste.png&#039;,
	0xe02b =&gt; &#039;paste2.png&#039;,
	0xe02c =&gt; &#039;paste3.png&#039;,
	0xe02d =&gt; &#039;stack.png&#039;,
	0xe02e =&gt; &#039;folder.png&#039;,
	0xe02f =&gt; &#039;folder-open.png&#039;,
	0xe030 =&gt; &#039;tag.png&#039;,
	0xe031 =&gt; &#039;tags.png&#039;,
	0xe032 =&gt; &#039;barcode.png&#039;,
	0xe033 =&gt; &#039;qrcode.png&#039;,
	0xe034 =&gt; &#039;ticket.png&#039;,
	0xe035 =&gt; &#039;cart.png&#039;,
	0xe036 =&gt; &#039;cart2.png&#039;,
	0xe037 =&gt; &#039;cart3.png&#039;,
	0xe038 =&gt; &#039;coin.png&#039;,
	0xe039 =&gt; &#039;credit.png&#039;,
	0xe03a =&gt; &#039;calculate.png&#039;,
	0xe03b =&gt; &#039;support.png&#039;,
	0xe03c =&gt; &#039;phone.png&#039;,
	0xe03d =&gt; &#039;phone-hang-up.png&#039;,
	0xe03e =&gt; &#039;address-book.png&#039;,
	0xe03f =&gt; &#039;notebook.png&#039;,
	0xe040 =&gt; &#039;envelope.png&#039;,
	0xe041 =&gt; &#039;pushpin.png&#039;,
	0xe042 =&gt; &#039;location.png&#039;,
	0xe043 =&gt; &#039;location2.png&#039;,
	0xe044 =&gt; &#039;compass.png&#039;,
	0xe045 =&gt; &#039;map.png&#039;,
	0xe046 =&gt; &#039;map2.png&#039;,
	0xe047 =&gt; &#039;history.png&#039;,
	0xe048 =&gt; &#039;clock.png&#039;,
	0xe049 =&gt; &#039;clock2.png&#039;,
	0xe04a =&gt; &#039;alarm.png&#039;,
	0xe04b =&gt; &#039;alarm2.png&#039;,
	0xe04c =&gt; &#039;bell.png&#039;,
	0xe04d =&gt; &#039;stopwatch.png&#039;,
	0xe04e =&gt; &#039;calendar.png&#039;,
	0xe04f =&gt; &#039;calendar2.png&#039;,
	0xe050 =&gt; &#039;print.png&#039;,
	0xe051 =&gt; &#039;keyboard.png&#039;,
	0xe052 =&gt; &#039;screen.png&#039;,
	0xe053 =&gt; &#039;laptop.png&#039;,
	0xe054 =&gt; &#039;mobile.png&#039;,
	0xe055 =&gt; &#039;mobile2.png&#039;,
	0xe056 =&gt; &#039;tablet.png&#039;,
	0xe057 =&gt; &#039;tv.png&#039;,
	0xe058 =&gt; &#039;cabinet.png&#039;,
	0xe059 =&gt; &#039;drawer.png&#039;,
	0xe05a =&gt; &#039;drawer2.png&#039;,
	0xe05b =&gt; &#039;drawer3.png&#039;,
	0xe05c =&gt; &#039;box-add.png&#039;,
	0xe05d =&gt; &#039;box-remove.png&#039;,
	0xe05e =&gt; &#039;download.png&#039;,
	0xe05f =&gt; &#039;upload.png&#039;,
	0xe060 =&gt; &#039;disk.png&#039;,
	0xe061 =&gt; &#039;storage.png&#039;,
	0xe062 =&gt; &#039;undo.png&#039;,
	0xe063 =&gt; &#039;redo.png&#039;,
	0xe064 =&gt; &#039;flip.png&#039;,
	0xe065 =&gt; &#039;flip2.png&#039;,
	0xe066 =&gt; &#039;undo2.png&#039;,
	0xe067 =&gt; &#039;redo2.png&#039;,
	0xe068 =&gt; &#039;forward.png&#039;,
	0xe069 =&gt; &#039;reply.png&#039;,
	0xe06a =&gt; &#039;bubble.png&#039;,
	0xe06b =&gt; &#039;bubbles.png&#039;,
	0xe06c =&gt; &#039;bubbles2.png&#039;,
	0xe06d =&gt; &#039;bubble2.png&#039;,
	0xe06e =&gt; &#039;bubbles3.png&#039;,
	0xe06f =&gt; &#039;bubbles4.png&#039;,
	0xe070 =&gt; &#039;user.png&#039;,
	0xe071 =&gt; &#039;users.png&#039;,
	0xe072 =&gt; &#039;user2.png&#039;,
	0xe073 =&gt; &#039;users2.png&#039;,
	0xe074 =&gt; &#039;user3.png&#039;,
	0xe075 =&gt; &#039;user4.png&#039;,
	0xe076 =&gt; &#039;quotes-left.png&#039;,
	0xe077 =&gt; &#039;busy.png&#039;,
	0xe078 =&gt; &#039;spinner.png&#039;,
	0xe079 =&gt; &#039;spinner2.png&#039;,
	0xe07a =&gt; &#039;spinner3.png&#039;,
	0xe07b =&gt; &#039;spinner4.png&#039;,
	0xe07c =&gt; &#039;spinner5.png&#039;,
	0xe07d =&gt; &#039;spinner6.png&#039;,
	0xe07e =&gt; &#039;binoculars.png&#039;,
	0xe07f =&gt; &#039;search.png&#039;,
	0xe080 =&gt; &#039;zoomin.png&#039;,
	0xe081 =&gt; &#039;zoomout.png&#039;,
	0xe082 =&gt; &#039;expand.png&#039;,
	0xe083 =&gt; &#039;contract.png&#039;,
	0xe084 =&gt; &#039;expand2.png&#039;,
	0xe085 =&gt; &#039;contract2.png&#039;,
	0xe086 =&gt; &#039;key.png&#039;,
	0xe087 =&gt; &#039;key2.png&#039;,
	0xe088 =&gt; &#039;lock.png&#039;,
	0xe089 =&gt; &#039;lock2.png&#039;,
	0xe08a =&gt; &#039;unlocked.png&#039;,
	0xe08b =&gt; &#039;wrench.png&#039;,
	0xe08c =&gt; &#039;settings.png&#039;,
	0xe08d =&gt; &#039;equalizer.png&#039;,
	0xe08e =&gt; &#039;cog.png&#039;,
	0xe08f =&gt; &#039;cogs.png&#039;,
	0xe090 =&gt; &#039;cog2.png&#039;,
	0xe091 =&gt; &#039;hammer.png&#039;,
	0xe092 =&gt; &#039;wand.png&#039;,
	0xe093 =&gt; &#039;aid.png&#039;,
	0xe094 =&gt; &#039;bug.png&#039;,
	0xe095 =&gt; &#039;pie.png&#039;,
	0xe096 =&gt; &#039;stats.png&#039;,
	0xe097 =&gt; &#039;bars.png&#039;,
	0xe098 =&gt; &#039;bars2.png&#039;,
	0xe099 =&gt; &#039;gift.png&#039;,
	0xe09a =&gt; &#039;trophy.png&#039;,
	0xe09b =&gt; &#039;glass.png&#039;,
	0xe09c =&gt; &#039;mug.png&#039;,
	0xe09d =&gt; &#039;food.png&#039;,
	0xe09e =&gt; &#039;leaf.png&#039;,
	0xe09f =&gt; &#039;rocket.png&#039;,
	0xe0a0 =&gt; &#039;meter.png&#039;,
	0xe0a1 =&gt; &#039;meter2.png&#039;,
	0xe0a2 =&gt; &#039;dashboard.png&#039;,
	0xe0a3 =&gt; &#039;hammer2.png&#039;,
	0xe0a4 =&gt; &#039;fire.png&#039;,
	0xe0a5 =&gt; &#039;lab.png&#039;,
	0xe0a6 =&gt; &#039;magnet.png&#039;,
	0xe0a7 =&gt; &#039;remove.png&#039;,
	0xe0a8 =&gt; &#039;remove2.png&#039;,
	0xe0a9 =&gt; &#039;briefcase.png&#039;,
	0xe0aa =&gt; &#039;airplane.png&#039;,
	0xe0ab =&gt; &#039;truck.png&#039;,
	0xe0ac =&gt; &#039;road.png&#039;,
	0xe0ad =&gt; &#039;accessibility.png&#039;,
	0xe0ae =&gt; &#039;target.png&#039;,
	0xe0af =&gt; &#039;shield.png&#039;,
	0xe0b0 =&gt; &#039;lightning.png&#039;,
	0xe0b1 =&gt; &#039;switch.png&#039;,
	0xe0b2 =&gt; &#039;powercord.png&#039;,
	0xe0b3 =&gt; &#039;signup.png&#039;,
	0xe0b4 =&gt; &#039;list.png&#039;,
	0xe0b5 =&gt; &#039;list2.png&#039;,
	0xe0b6 =&gt; &#039;numbered-list.png&#039;,
	0xe0b7 =&gt; &#039;menu.png&#039;,
	0xe0b8 =&gt; &#039;menu2.png&#039;,
	0xe0b9 =&gt; &#039;tree.png&#039;,
	0xe0ba =&gt; &#039;cloud.png&#039;,
	0xe0bb =&gt; &#039;cloud-download.png&#039;,
	0xe0bc =&gt; &#039;cloud-upload.png&#039;,
	0xe0bd =&gt; &#039;download2.png&#039;,
	0xe0be =&gt; &#039;upload2.png&#039;,
	0xe0bf =&gt; &#039;download3.png&#039;,
	0xe0c0 =&gt; &#039;upload3.png&#039;,
	0xe0c1 =&gt; &#039;globe.png&#039;,
	0xe0c2 =&gt; &#039;earth.png&#039;,
	0xe0c3 =&gt; &#039;link.png&#039;,
	0xe0c4 =&gt; &#039;flag.png&#039;,
	0xe0c5 =&gt; &#039;attachment.png&#039;,
	0xe0c6 =&gt; &#039;eye.png&#039;,
	0xe0c7 =&gt; &#039;eye-blocked.png&#039;,
	0xe0c8 =&gt; &#039;eye2.png&#039;,
	0xe0c9 =&gt; &#039;bookmark.png&#039;,
	0xe0ca =&gt; &#039;bookmarks.png&#039;,
	0xe0cb =&gt; &#039;brightness-medium.png&#039;,
	0xe0cc =&gt; &#039;brightness-contrast.png&#039;,
	0xe0cd =&gt; &#039;contrast.png&#039;,
	0xe0ce =&gt; &#039;star.png&#039;,
	0xe0cf =&gt; &#039;star2.png&#039;,
	0xe0d0 =&gt; &#039;star3.png&#039;,
	0xe0d1 =&gt; &#039;heart.png&#039;,
	0xe0d2 =&gt; &#039;heart2.png&#039;,
	0xe0d3 =&gt; &#039;heart-broken.png&#039;,
	0xe0d4 =&gt; &#039;thumbs-up.png&#039;,
	0xe0d5 =&gt; &#039;thumbs-up2.png&#039;,
	0xe0d6 =&gt; &#039;happy.png&#039;,
	0xe0d7 =&gt; &#039;happy2.png&#039;,
	0xe0d8 =&gt; &#039;smiley.png&#039;,
	0xe0d9 =&gt; &#039;smiley2.png&#039;,
	0xe0da =&gt; &#039;tongue.png&#039;,
	0xe0db =&gt; &#039;tongue2.png&#039;,
	0xe0dc =&gt; &#039;sad.png&#039;,
	0xe0dd =&gt; &#039;sad2.png&#039;,
	0xe0de =&gt; &#039;wink.png&#039;,
	0xe0df =&gt; &#039;wink2.png&#039;,
	0xe0e0 =&gt; &#039;grin.png&#039;,
	0xe0e1 =&gt; &#039;grin2.png&#039;,
	0xe0e2 =&gt; &#039;cool.png&#039;,
	0xe0e3 =&gt; &#039;cool2.png&#039;,
	0xe0e4 =&gt; &#039;angry.png&#039;,
	0xe0e5 =&gt; &#039;angry2.png&#039;,
	0xe0e6 =&gt; &#039;evil.png&#039;,
	0xe0e7 =&gt; &#039;evil2.png&#039;,
	0xe0e8 =&gt; &#039;shocked.png&#039;,
	0xe0e9 =&gt; &#039;shocked2.png&#039;,
	0xe0ea =&gt; &#039;confused.png&#039;,
	0xe0eb =&gt; &#039;confused2.png&#039;,
	0xe0ec =&gt; &#039;neutral.png&#039;,
	0xe0ed =&gt; &#039;neutral2.png&#039;,
	0xe0ee =&gt; &#039;wondering.png&#039;,
	0xe0ef =&gt; &#039;wondering2.png&#039;,
	0xe0f0 =&gt; &#039;point-up.png&#039;,
	0xe0f1 =&gt; &#039;point-right.png&#039;,
	0xe0f2 =&gt; &#039;point-down.png&#039;,
	0xe0f3 =&gt; &#039;point-left.png&#039;,
	0xe0f4 =&gt; &#039;warning.png&#039;,
	0xe0f5 =&gt; &#039;notification.png&#039;,
	0xe0f6 =&gt; &#039;question.png&#039;,
	0xe0f7 =&gt; &#039;info.png&#039;,
	0xe0f8 =&gt; &#039;info2.png&#039;,
	0xe0f9 =&gt; &#039;blocked.png&#039;,
	0xe0fa =&gt; &#039;cancel-circle.png&#039;,
	0xe0fb =&gt; &#039;checkmark-circle.png&#039;,
	0xe0fc =&gt; &#039;spam.png&#039;,
	0xe0fd =&gt; &#039;close.png&#039;,
	0xe0fe =&gt; &#039;checkmark.png&#039;,
	0xe0ff =&gt; &#039;checkmark2.png&#039;,
	0xe100 =&gt; &#039;spell-check.png&#039;,
	0xe101 =&gt; &#039;minus.png&#039;,
	0xe102 =&gt; &#039;plus.png&#039;,
	0xe103 =&gt; &#039;enter.png&#039;,
	0xe104 =&gt; &#039;exit.png&#039;,
	0xe105 =&gt; &#039;play2.png&#039;,
	0xe106 =&gt; &#039;pause.png&#039;,
	0xe107 =&gt; &#039;stop.png&#039;,
	0xe108 =&gt; &#039;backward.png&#039;,
	0xe109 =&gt; &#039;forward2.png&#039;,
	0xe10a =&gt; &#039;play3.png&#039;,
	0xe10b =&gt; &#039;pause2.png&#039;,
	0xe10c =&gt; &#039;stop2.png&#039;,
	0xe10d =&gt; &#039;backward2.png&#039;,
	0xe10e =&gt; &#039;forward3.png&#039;,
	0xe10f =&gt; &#039;first.png&#039;,
	0xe110 =&gt; &#039;last.png&#039;,
	0xe111 =&gt; &#039;previous.png&#039;,
	0xe112 =&gt; &#039;next.png&#039;,
	0xe113 =&gt; &#039;eject.png&#039;,
	0xe114 =&gt; &#039;volume-high.png&#039;,
	0xe115 =&gt; &#039;volume-medium.png&#039;,
	0xe116 =&gt; &#039;volume-low.png&#039;,
	0xe117 =&gt; &#039;volume-mute.png&#039;,
	0xe118 =&gt; &#039;volume-mute2.png&#039;,
	0xe119 =&gt; &#039;volume-increase.png&#039;,
	0xe11a =&gt; &#039;volume-decrease.png&#039;,
	0xe11b =&gt; &#039;loop.png&#039;,
	0xe11c =&gt; &#039;loop2.png&#039;,
	0xe11d =&gt; &#039;loop3.png&#039;,
	0xe11e =&gt; &#039;shuffle.png&#039;,
	0xe11f =&gt; &#039;arrow-up-left.png&#039;,
	0xe120 =&gt; &#039;arrow-up.png&#039;,
	0xe121 =&gt; &#039;arrow-up-right.png&#039;,
	0xe122 =&gt; &#039;arrow-right.png&#039;,
	0xe123 =&gt; &#039;arrow-down-right.png&#039;,
	0xe124 =&gt; &#039;arrow-down.png&#039;,
	0xe125 =&gt; &#039;arrow-down-left.png&#039;,
	0xe126 =&gt; &#039;arrow-left.png&#039;,
	0xe127 =&gt; &#039;arrow-up-left2.png&#039;,
	0xe128 =&gt; &#039;arrow-up2.png&#039;,
	0xe129 =&gt; &#039;arrow-up-right2.png&#039;,
	0xe12a =&gt; &#039;arrow-right2.png&#039;,
	0xe12b =&gt; &#039;arrow-down-right2.png&#039;,
	0xe12c =&gt; &#039;arrow-down2.png&#039;,
	0xe12d =&gt; &#039;arrow-down-left2.png&#039;,
	0xe12e =&gt; &#039;arrow-left2.png&#039;,
	0xe12f =&gt; &#039;arrow-up-left3.png&#039;,
	0xe130 =&gt; &#039;arrow-up3.png&#039;,
	0xe131 =&gt; &#039;arrow-up-right3.png&#039;,
	0xe132 =&gt; &#039;arrow-right3.png&#039;,
	0xe133 =&gt; &#039;arrow-down-right3.png&#039;,
	0xe134 =&gt; &#039;arrow-down3.png&#039;,
	0xe135 =&gt; &#039;arrow-down-left3.png&#039;,
	0xe136 =&gt; &#039;arrow-left3.png&#039;,
	0xe137 =&gt; &#039;tab.png&#039;,
	0xe138 =&gt; &#039;checkbox-checked.png&#039;,
	0xe139 =&gt; &#039;checkbox-unchecked.png&#039;,
	0xe13a =&gt; &#039;checkbox-partial.png&#039;,
	0xe13b =&gt; &#039;radio-checked.png&#039;,
	0xe13c =&gt; &#039;radio-unchecked.png&#039;,
	0xe13d =&gt; &#039;crop.png&#039;,
	0xe13e =&gt; &#039;scissors.png&#039;,
	0xe13f =&gt; &#039;filter.png&#039;,
	0xe140 =&gt; &#039;filter2.png&#039;,
	0xe141 =&gt; &#039;font.png&#039;,
	0xe142 =&gt; &#039;text-height.png&#039;,
	0xe143 =&gt; &#039;text-width.png&#039;,
	0xe144 =&gt; &#039;bold.png&#039;,
	0xe145 =&gt; &#039;underline.png&#039;,
	0xe146 =&gt; &#039;italic.png&#039;,
	0xe147 =&gt; &#039;strikethrough.png&#039;,
	0xe148 =&gt; &#039;omega.png&#039;,
	0xe149 =&gt; &#039;sigma.png&#039;,
	0xe14a =&gt; &#039;table.png&#039;,
	0xe14b =&gt; &#039;table2.png&#039;,
	0xe14c =&gt; &#039;insert-template.png&#039;,
	0xe14d =&gt; &#039;pilcrow.png&#039;,
	0xe14e =&gt; &#039;lefttoright.png&#039;,
	0xe14f =&gt; &#039;righttoleft.png&#039;,
	0xe150 =&gt; &#039;paragraph-left.png&#039;,
	0xe151 =&gt; &#039;paragraph-center.png&#039;,
	0xe152 =&gt; &#039;paragraph-right.png&#039;,
	0xe153 =&gt; &#039;paragraph-justify.png&#039;,
	0xe154 =&gt; &#039;paragraph-left2.png&#039;,
	0xe155 =&gt; &#039;paragraph-center2.png&#039;,
	0xe156 =&gt; &#039;paragraph-right2.png&#039;,
	0xe157 =&gt; &#039;paragraph-justify2.png&#039;,
	0xe158 =&gt; &#039;indent-increase.png&#039;,
	0xe159 =&gt; &#039;indent-decrease.png&#039;,
	0xe15a =&gt; &#039;newtab.png&#039;,
	0xe15b =&gt; &#039;embed.png&#039;,
	0xe15c =&gt; &#039;code.png&#039;,
	0xe15d =&gt; &#039;console.png&#039;,
	0xe15e =&gt; &#039;share.png&#039;,
	0xe15f =&gt; &#039;mail.png&#039;,
	0xe160 =&gt; &#039;mail2.png&#039;,
	0xe161 =&gt; &#039;mail3.png&#039;,
	0xe162 =&gt; &#039;mail4.png&#039;,
	0xe163 =&gt; &#039;google.png&#039;,
	0xe164 =&gt; &#039;googleplus.png&#039;,
	0xe165 =&gt; &#039;googleplus2.png&#039;,
	0xe166 =&gt; &#039;googleplus3.png&#039;,
	0xe167 =&gt; &#039;googleplus4.png&#039;,
	0xe168 =&gt; &#039;google-drive.png&#039;,
	0xe169 =&gt; &#039;facebook.png&#039;,
	0xe16a =&gt; &#039;facebook2.png&#039;,
	0xe16b =&gt; &#039;facebook3.png&#039;,
	0xe16c =&gt; &#039;instagram.png&#039;,
	0xe16d =&gt; &#039;twitter.png&#039;,
	0xe16e =&gt; &#039;twitter2.png&#039;,
	0xe16f =&gt; &#039;twitter3.png&#039;,
	0xe170 =&gt; &#039;feed2.png&#039;,
	0xe171 =&gt; &#039;feed3.png&#039;,
	0xe172 =&gt; &#039;feed4.png&#039;,
	0xe173 =&gt; &#039;youtube.png&#039;,
	0xe174 =&gt; &#039;youtube2.png&#039;,
	0xe175 =&gt; &#039;vimeo.png&#039;,
	0xe176 =&gt; &#039;vimeo2.png&#039;,
	0xe177 =&gt; &#039;vimeo3.png&#039;,
	0xe178 =&gt; &#039;lanyrd.png&#039;,
	0xe179 =&gt; &#039;flickr.png&#039;,
	0xe17a =&gt; &#039;flickr2.png&#039;,
	0xe17b =&gt; &#039;flickr3.png&#039;,
	0xe17c =&gt; &#039;flickr4.png&#039;,
	0xe17d =&gt; &#039;picassa.png&#039;,
	0xe17e =&gt; &#039;picassa2.png&#039;,
	0xe17f =&gt; &#039;dribbble.png&#039;,
	0xe180 =&gt; &#039;dribbble2.png&#039;,
	0xe181 =&gt; &#039;dribbble3.png&#039;,
	0xe182 =&gt; &#039;forrst.png&#039;,
	0xe183 =&gt; &#039;forrst2.png&#039;,
	0xe184 =&gt; &#039;deviantart.png&#039;,
	0xe185 =&gt; &#039;deviantart2.png&#039;,
	0xe186 =&gt; &#039;steam.png&#039;,
	0xe187 =&gt; &#039;steam2.png&#039;,
	0xe188 =&gt; &#039;github.png&#039;,
	0xe189 =&gt; &#039;github2.png&#039;,
	0xe18a =&gt; &#039;github3.png&#039;,
	0xe18b =&gt; &#039;github4.png&#039;,
	0xe18c =&gt; &#039;github5.png&#039;,
	0xe18d =&gt; &#039;wordpress.png&#039;,
	0xe18e =&gt; &#039;wordpress2.png&#039;,
	0xe18f =&gt; &#039;joomla.png&#039;,
	0xe190 =&gt; &#039;blogger.png&#039;,
	0xe191 =&gt; &#039;blogger2.png&#039;,
	0xe192 =&gt; &#039;tumblr.png&#039;,
	0xe193 =&gt; &#039;tumblr2.png&#039;,
	0xe194 =&gt; &#039;yahoo.png&#039;,
	0xe195 =&gt; &#039;tux.png&#039;,
	0xe196 =&gt; &#039;apple.png&#039;,
	0xe197 =&gt; &#039;finder.png&#039;,
	0xe198 =&gt; &#039;android.png&#039;,
	0xe199 =&gt; &#039;windows.png&#039;,
	0xe19a =&gt; &#039;windows8.png&#039;,
	0xe19b =&gt; &#039;soundcloud.png&#039;,
	0xe19c =&gt; &#039;soundcloud2.png&#039;,
	0xe19d =&gt; &#039;skype.png&#039;,
	0xe19e =&gt; &#039;reddit.png&#039;,
	0xe19f =&gt; &#039;linkedin.png&#039;,
	0xe1a0 =&gt; &#039;lastfm.png&#039;,
	0xe1a1 =&gt; &#039;lastfm2.png&#039;,
	0xe1a2 =&gt; &#039;delicious.png&#039;,
	0xe1a3 =&gt; &#039;stumbleupon.png&#039;,
	0xe1a4 =&gt; &#039;stumbleupon2.png&#039;,
	0xe1a5 =&gt; &#039;stackoverflow.png&#039;,
	0xe1a6 =&gt; &#039;pinterest.png&#039;,
	0xe1a7 =&gt; &#039;pinterest2.png&#039;,
	0xe1a8 =&gt; &#039;xing.png&#039;,
	0xe1a9 =&gt; &#039;xing2.png&#039;,
	0xe1aa =&gt; &#039;flattr.png&#039;,
	0xe1ab =&gt; &#039;foursquare.png&#039;,
	0xe1ac =&gt; &#039;foursquare2.png&#039;,
	0xe1ad =&gt; &#039;paypal.png&#039;,
	0xe1ae =&gt; &#039;paypal2.png&#039;,
	0xe1af =&gt; &#039;paypal3.png&#039;,
	0xe1b0 =&gt; &#039;yelp.png&#039;,
	0xe1b1 =&gt; &#039;libreoffice.png&#039;,
	0xe1b2 =&gt; &#039;file-pdf.png&#039;,
	0xe1b3 =&gt; &#039;file-openoffice.png&#039;,
	0xe1b4 =&gt; &#039;file-word.png&#039;,
	0xe1b5 =&gt; &#039;file-excel.png&#039;,
	0xe1b6 =&gt; &#039;file-zip.png&#039;,
	0xe1b7 =&gt; &#039;file-powerpoint.png&#039;,
	0xe1b8 =&gt; &#039;file-xml.png&#039;,
	0xe1b9 =&gt; &#039;file-css.png&#039;,
	0xe1ba =&gt; &#039;html5.png&#039;,
	0xe1bb =&gt; &#039;html52.png&#039;,
	0xe1bc =&gt; &#039;css3.png&#039;,
	0xe1bd =&gt; &#039;chrome.png&#039;,
	0xe1be =&gt; &#039;firefox.png&#039;,
	0xe1bf =&gt; &#039;IE.png&#039;,
	0xe1c0 =&gt; &#039;opera.png&#039;,
	0xe1c1 =&gt; &#039;safari.png&#039;,
	0xe1c2 =&gt; &#039;IcoMoon.png&#039;,
);
		</pre>
		<hr />
		<h2 id="editing_configuration_file"><a class="pull-right" href="#main"><span class="glyphicon glyphicon-chevron-up"></span></a><span class="glyphicon glyphicon-cog"></span> Editing Configuration File</h2>
		<hr />
		<p>This script is quite flexible. You can do a number of things through the <code>config.php</code> file.</p>
		<ul>
			<li>
				<strong>Define HTML Attribute Selector</strong>: Simply edit the value of the constant <code>HTML_ATTR</code>
				<pre>define( &#039;HTML_ATTR&#039;, &#039;data-icon&#039; );</pre>
			</li>
			<li>
				<strong>Define IcoMoon Fonts Path</strong>: To change where the <code>style.css</code> and <code>selection.json</code> files are located edit the constant <code>ICMPATH</code>. This should be relative to the root directory of this script and must contain a trailing slash.
				<pre>define( &#039;ICMPATH&#039;, &#039;icomoon.fonts/&#039; );</pre>
			</li>
			<li>
				<strong>Define IcoMoon Image Path</strong>: To change where the image files are located edit the constant <code>ICMIMG</code>. This should be relative to the root directory of this script and must contain a trailing slash.
				<pre>define( &#039;ICMIMG&#039;, &#039;icomoon.png/&#039; );</pre>
			</li>
			<li>
				<strong>Get your own icon category and tags</strong>: You will need to edit the <code>$icon_categories</code> variable. It is an array of array, where each nested array has 3 properties:
				<ol>
					<li>
						<code>id</code> The ID of this category. Must be unique for all individual categories.
					</li>
					<li>
						<code>label</code> The label of this category. This is basically the nice name.
					</li>
					<li>
						<code>tags</code> An array of tags to search for when indexing individual icons.
					</li>
				</ol>
			</li>
		</ul>
		<hr />
		<h2 id="functions_and_apis"><a class="pull-right" href="#main"><span class="glyphicon glyphicon-chevron-up"></span></a><span class="glyphicon glyphicon-book"></span> Functions and APIs</h2>
		<hr />
		<p>The <code>functions.php</code> comes with several functions which you can use directly.</p>
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<th>Function</th>
					<th>Parameters</th>
					<th>Sample Code</th>
					<th>Output</th>
				</thead>
				<tbody>
					<tr>
						<td rowspan="2">
							<strong>imii_generate_select_options</strong><br />
							<p class="text-muted">
								Generate HTML SELECT OPTION along with OPTGROUP.<br />
								You will need to provide the SELECT element yourself as this only generates the optgroup and option elements
							</p>
						</td>
						<td>
							<strong>$icomoon_icons</strong><br />
							<code>array</code><br />
							The original variable generated by this script
						</td>
						<td rowspan="2">
							<pre class="brush: php">
&lt;select data-bv-notempty=&quot;true&quot; data-bv-notempty-message=&quot;You must pick a font&quot; name=&quot;select_1&quot; id=&quot;select_1&quot; class=&quot;form-control by_class&quot;&gt;
	&lt;option value=&quot;&quot; selected=&quot;selected&quot;&gt;--please select--&lt;/option&gt;
	&lt;?php echo imii_generate_select_options( $icomoon_icons, &#039;class&#039; ); ?&gt;
&lt;/select&gt;
							</pre>
						</td>
						<td rowspan="2">
							<pre class="brush: html">
&lt;optgroup label=&quot;Web Applications&quot;&gt;
	&lt;option value=&quot;57372&quot;&gt;Connection&lt;/option&gt;
	&lt;option value=&quot;57374&quot;&gt;Feed&lt;/option&gt;
	&lt;option value=&quot;57409&quot;&gt;Pushpin&lt;/option&gt;
	&lt;option value=&quot;57436&quot;&gt;Box add&lt;/option&gt;
	&lt;option value=&quot;57437&quot;&gt;Box remove&lt;/option&gt;
	&lt;option value=&quot;57438&quot;&gt;Download&lt;/option&gt;
	&lt;option value=&quot;57439&quot;&gt;Upload&lt;/option&gt;
&lt;/optgroup&gt;
&lt;optgroup label=&quot;Spinners&quot;&gt;
	&lt;option value=&quot;57463&quot;&gt;Busy&lt;/option&gt;
	&lt;option value=&quot;57464&quot;&gt;Spinner&lt;/option&gt;
	&lt;option value=&quot;57465&quot;&gt;Spinner 2&lt;/option&gt;
	&lt;option value=&quot;57466&quot;&gt;Spinner 3&lt;/option&gt;
	&lt;option value=&quot;57467&quot;&gt;Spinner 4&lt;/option&gt;
	&lt;option value=&quot;57468&quot;&gt;Spinner 5&lt;/option&gt;
	&lt;option value=&quot;57469&quot;&gt;Spinner 6&lt;/option&gt;
&lt;/optgroup&gt;
							</pre>
						</td>
					</tr>
					<tr>
						<td>
							<strong>$by</strong><br />
							<code>string</code><br />
							What to print the value by. Possibilities are class, unicode, hex|hexadecimal or key
						</td>
					</tr>
					<tr>
						<td rowspan="2">
							<strong>imii_generate_fip_source_json</strong><br />
							<p class="text-muted">
								Generate the JSON variable for the <code>source</code> option for <a href="https://github.com/micc83/fontIconPicker">fontIconPicker</a>.<br />
								You will need to assign it to a variable inside JavaScript code.
							</p>
						</td>
						<td>
							<strong>$icomoon_icons</strong><br />
							<code>array</code><br />
							The original variable generated by this script
						</td>
						<td rowspan="2">
							<pre class="brush: php">
var source = &lt;?php echo imii_generate_fip_source_json( $icomoon_icons, &#039;class&#039; ); ?&gt;;
							</pre>
						</td>
						<td rowspan="2">
							<pre class="brush: js">
var source = {&quot;Web Applications&quot;:[&quot;icomoon-connection&quot;,&quot;icomoon-feed&quot;,&quot;icomoon-pushpin&quot;,&quot;icomoon-box-add&quot;,&quot;icomoon-box-remove&quot;],&quot;Currency Icons&quot;:[&quot;icomoon-coin&quot;]};
							</pre>
						</td>
					</tr>
					<tr>
						<td>
							<strong>$by</strong><br />
							<code>string</code><br />
							What to print the value by. Possibilities are class or key
						</td>
					</tr>
					<tr>
						<td>
							<strong>imii_generate_fip_search_json</strong><br />
							<p class="text-muted">
								Generate the JSON variable for the <code>searchSource</code> option for <a href="https://github.com/micc83/fontIconPicker">fontIconPicker</a>.<br />
								You will need to assign it to a variable inside JavaScript code.
							</p>
						</td>
						<td>
							<strong>$icomoon_icons</strong><br />
							<code>array</code><br />
							The original variable generated by this script
						</td>
						<td>
							<pre class="brush: php">
var searchSource = &lt;?php echo imii_generate_fip_search_json( $icomoon_icons ); ?&gt;;
							</pre>
						</td>
						<td>
							<pre class="brush: js">
var searchSource = {&quot;Spinners&quot;:[&quot;Busy&quot;,&quot;Spinner&quot;,&quot;Spinner 2&quot;,&quot;Spinner 3&quot;,&quot;Spinner 4&quot;,&quot;Spinner 5&quot;,&quot;Spinner 6&quot;],&quot;Business Icons&quot;:[&quot;Office&quot;,&quot;Newspaper&quot;,&quot;Book&quot;,&quot;Books&quot;,&quot;Library&quot;,&quot;Profile&quot;,&quot;Support&quot;,&quot;Phone hang up&quot;,&quot;Address book&quot;,&quot;Notebook&quot;,&quot;Bubble&quot;,&quot;Bubbles&quot;,&quot;Bubbles 2&quot;,&quot;Bubble 2&quot;]};
							</pre>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<p>That's all folks.</p>
	</div>
<?php get_footer(); ?>
