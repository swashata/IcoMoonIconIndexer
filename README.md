IcoMoonIconIndexer
==================

This script helps index and categorize icons generated from IcoMoon Apps and create `PHP array`, `JavaScript Object|Array` variables and/or `SELECT HTML` for your use.

![Script Output IcoMoonIconIndexer](https://raw.githubusercontent.com/swashata/IcoMoonIconIndexer/5390f804c848bd39971e19293b7fd650b477b794/images/output-github.png)

Populate fontIconPicker or create SELECT elements with just this bit of code:

```php
<?php
// First require the iconindexed.php to see if a backup is present
if ( file_exists( ABSPATH . 'iconindexed.php' ) ) {
    require_once ABSPATH . 'iconindexed.php';
}

// Now get the functions
require_once ABSPATH . 'functions.php';
?>
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
<input type="text" name="fip_1" id="fip_1" value="" />
<select class="form-control" style="display: inline-block; width: 200px;" name="select_1" id="select_1">
    <option value="" selected="selected">--please select--</option>
    <?php echo imii_generate_select_options( $icomoon_icons, 'class' ); ?>
</select> <span class="text-success"></span>
```
What it does
----------------
What the script basically does is, parse the `selection.json` file from the icon package downloaded from [IcoMoon App](http://icomoon.io/) and categorizes icons (by tags) and stores them in a `PHP Array`.

This helps you in several ways:

* You do not have to face the hectic way to index and categorize the icons yourself.
* It generates server side PHP array which processed on the server not on client through javascript. So it results in faster output and you can do less work on client side.
* The categorizing is intelligent and very simple to use. Just modify the config.php, mention the tags and run the auto-generator.
* If you do not like what the script has generated, then you always have the option to change the category through web interface.
* It does all the job for writing PHP array, validating etc... So you have to do a very little work.

Additional Features
-------------------
* Along with indexing icons, it indexes images too. So just download the image set for any icon library and this app will generate image codes for you.
* Comes with predefined functions with which you can do quite a lot.

For more information and documentation make sure to see the [Online Project Demo](http://projects.ipanelthemes.com/IcoMoonIconIndexer/)

Requirements
------------
* PHP Version 5.3+. Greater the better.
* Rather some large value for `max_input_vars` (10000 would do) `post_max_size` (128MB).
* A browser that can handle the app. Like Google Chrome or Mozilla Firefox.

Credits
-------
* [IcoMoon App](http://icomoon.io/): Without which nothing would've been possible.
* [fontIconPicker](https://github.com/micc83/fontIconPicker): For showing how to use the indexed icons with custom pickers.
* [Bootstrap](http://getbootstrap.com/): For generating this nice looking template.
* [BootstrapValidator](http://bootstrapvalidator.com/): For validating the form on examples.
* [SyntaxHighlighter](http://alexgorbatchev.com/SyntaxHighlighter/): For showing the example source code.
* [GitHub](https://github.com/swashata/IcoMoonIconIndexer): For hosting the project.
