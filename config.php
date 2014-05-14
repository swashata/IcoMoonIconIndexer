<?php
/**
 * IcoMoonIconIndexer Configuration file
 */

/**
 * @const
 * HTML_ATTR
 *
 * The HTML Attribute you've used in the style.css file from icomoon download
 * This is entirely optional
 * define this to false if you do not wish to use this feature
 */
define( 'HTML_ATTR', 'data-icomoon' );

/**
 * Icomoon style.css and selection.json path
 *
 * Must have a trailing slash
 */
define( 'ICMPATH', 'icomoon.fonts/' );

/**
 * Icomoon image path
 *
 * Must have a trailing slash
 */
define( 'ICMIMG', 'icomoon.png/' );

/**
 * Icon Categories and their tag
 *
 * It is an array of array, where each nested arrays has 3 properties
 * @param string id The ID of this Category
 * @param string label The label of this Category
 * @param array tags The tags to search for when looking
 */
$icon_categories = array(
	//Web Elements
	array(
		'id' => 'web_elements',
		'label' => 'Web Applications',
		'tags' => array(
			'list', 'download', 'upload', 'www', 'globe', 'code', 'embed',
			'bookmark', 'attachment', 'box', 'menu', 'feed', 'pin', 'quote',
			'search', 'settings', 'remove', 'load', 'bookmarks',
		),
	),
	//Spinners
	array(
		'id' => 'spinners',
		'label' => 'Spinners',
		'tags' => array(
			'spinner', 'spinners', 'loading', 'wait', 'ajax', 'busy',
		),
	),
	//Business
	array(
		'id' => 'business',
		'label' => 'Business Icons',
		'tags' => array(
			'support', 'testimonial', 'user', 'comment', 'member', 'office', 'newspaper',
			'book', 'books', 'library', 'profile', 'bubble', 'quote', 'bubbles', 'comments', 'group', 'team',
			'community', 'work', 'job', 'signup', 'login', 'register', 'signout', 'logout',
		),
	),
	//eCommerce
	array(
		'id' => 'ecommerce',
		'label' => 'eCommerce',
		'tags' => array(
			'cart', 'card', 'calculator', 'tag', 'tags', 'calculate',
		),
	),
	//Currency
	array(
		'id' => 'currency',
		'label' => 'Currency Icons',
		'tags' => array(
			'btc', 'bitcoin', 'cny', 'dollar', 'eur', 'euro', 'gbp', 'inr', 'jpy', 'krw', 'money',
			'rmb', 'rouble', 'rub', 'ruble', 'rupee', 'try', 'turkish lira', 'usd', 'won', 'yen',
		),
	),
	//Form Controls
	array(
		'id' => 'form_controls',
		'label' => 'Form Control Icons',
		'tags' => array(
			'cut', 'copy', 'paste', 'enter', 'exit', 'save', 'trash', 'check', 'radio', 'checked', 'selected',
		),
	),
	//Text Editor Icons
	array(
		'id' => 'text_editor',
		'label' => 'User Action & Text Editor',
		'tags' => array(
			'bold', 'underline', 'italic', 'strike', 'align', 'indent', 'anchor', 'table', 'chain',
			'floppy', 'list', 'outdent', 'paperclip', 'rotate', 'scissors', 'strikethrough', 'th',
			'undo', 'unlink', 'clipboard', 'flip', 'redo', 'zoomin', 'zoomout', 'expand', 'contract',
			'link', 'font', 'wysiwyg',
		),
	),
	//Charts and Codes
	array(
		'id' => 'charts',
		'label' => 'Charts and Codes',
		'tags' => array(
			'pie', 'line', 'qrcode', 'column', 'barcode', 'bars', 'chart', 'charts', 'graph'
		),
	),
	//Attentions
	array(
		'id' => 'attentive',
		'label' => 'Attentive',
		'tags' => array(
			'help', 'warning', 'info', 'blocked', 'cancel', 'question', 'spam',
			'block', 'allowed', 'not allowed', 'okay', 'cancel',
		),
	),
	//Multimedia
	array(
		'id' => 'multimedia',
		'label' => 'Multimedia Icons',
		'tags' => array(
			'image', 'images', 'picture', 'pictures', 'photo', 'photos', 'gallery', 'video', 'fast forward', 'forward', 'rewind', 'fast rewind', 'volume',
			'mute', 'pause', 'equalizer', 'next', 'previous', 'brightness', 'contrast', 'play', 'film', 'music', 'media', 'media control',
		),
	),
	//Location & Address
	array(
		'id' => 'location',
		'label' => 'Location and Contact',
		'tags' => array(
			'home', 'map', 'phone', 'phone book', 'address', 'address book', 'marker', 'location',
			'email', 'envelope', 'flag',
		),
	),
	//Date & Time
	array(
		'id' => 'datetime',
		'label' => 'Date and Time',
		'tags' => array(
			'clock', 'calendar', 'month', 'year', 'history', 'stopwatch', 'watch',
		),
	),
	//Devices
	array(
		'id' => 'devices',
		'label' => 'Devices',
		'tags' => array(
			'printer', 'keyboard', 'mouse', 'phone', 'tablet', 'tabloid', 'desktop', 'computer', 'imac',
			'television', 'monitor', 'screen',
		),
	),
	//Tools
	array(
		'id' => 'tools',
		'label' => 'Tools',
		'tags' => array(
			'wrench', 'cog', 'cogs', 'pen', 'pencil', 'key', 'lock', 'unlock', 'unlocked', 'filter', 'brush', 'paint',
			'dice', 'quill', 'paint-format', 'tool', 'hammer', 'magnet',
		),
	),
	//Social
	array(
		'id' => 'social',
		'label' => 'Social Networking',
		'tags' => array(
			'share', 'google plus', 'googleplus', 'google drive', 'drive', 'facebook', 'twitter', 'vimeo', 'picasa', 'social',
			'github', 'wordpress', 'pinterest', 'tumblr', 'yahoo', 'lastfm', 'linkedin', 'stumbleupon', 'soundcloud', 'reddit', 'yelp', 'stackoverflow',
		),
	),
	//Brands
	array(
		'id' => 'brands',
		'label' => 'Brands Icons',
		'tags' => array(
			'apple', 'android', 'paypal', 'linux', 'finder', 'windows', 'skype', 'chrome', 'firefox', 'explorer',
			'safari', 'opera', 'joomla', 'browser', 'browsers', 'html5', 'css3',
		),
	),
	//Documents
	array(
		'id' => 'documents',
		'label' => 'Files & Documents',
		'tags' => array(
			'folder', 'file', 'pdf', 'libre', 'excel', 'word', 'powerpoint', 'html', 'xml', 'csv',
			'zip', 'drawer', 'drawers', 'cabinet',
		),
	),
	//Travel & Living
	array(
		'id' => 'travel',
		'label' => 'Travel and Living',
		'tags' => array(
			'coffee', 'knife', 'fork', 'road', 'plane', 'jet', 'truck', 'raod', 'ticket', 'cinema',
			'prize', 'drink', 'beverage',
		),
	),
	//Weather
	array(
		'id' => 'weather',
		'label' => 'Weather & Nature Icons',
		'tags' => array(
			'leaf', 'sun', 'sunrise', 'windy', 'snow', 'snowflake', 'cloudy', 'cloud', 'weather', 'moon',
			'wind', 'rain', 'rainy', 'lightning', 'snowy', 'fire',
		),
	),
	//Medical
	array(
		'id' => 'medical',
		'label' => 'Medical Icons',
		'tags' => array(
			'ambulance', 'h square', 'hospital', 'medkit',
			'plus square', 'stethoscope', 'user md', 'wheelchair',
		),
	),
	//Like Dislike
	array(
		'id' => 'like_dislike',
		'label' => 'Like & Dislike Icons',
		'tags' => array(
			'thumb', 'thumbs', 'heart', 'star', 'eye',
		),
	),
	//Emoticons
	array(
		'id' => 'emoticons',
		'label' => 'Emoticons',
		'tags' => array(
			'smile', 'smiley', 'emot', 'emoticon', 'emoticons', 'meh', 'frown',
			'happy', 'sad', 'angry', 'cool', 'wink', 'grin', 'evil', 'shocked',
			'tongue', 'tease', 'teaser', 'confused', 'neutral', 'wondering',
		),
	),
	//Arrows
	array(
		'id' => 'arrow',
		'label' => 'Directional Icons',
		'tags' => array(
			'arrow', 'point', 'direction', 'directional',
		),
	),
	//Others
	//This is required for all other icons
	array(
		'id' => 'others',
		'label' => 'Other Icons',
		'tags' => array(

		),
	),
);

/**
 * That's it, stop editing below
 */

/**
 * Base path
 */
define( 'ABSPATH', dirname( __FILE__ ) . '/' );

function get_header() {
	require_once( ABSPATH . 'includes/header.php' );
}

function get_footer() {
	require_once( ABSPATH . 'includes/footer.php' );
}

function esc_attr( $text ) {
	return htmlspecialchars( $text );
}
