```
=== WKD Plugin Switcher ===
Contributors: enodekciw
Donate link: https://wkd.lt
Tags: comments, spam
Requires at least: 4.5
Tested up to: 5.5.1
Stable tag: 0.1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
```

## Installation ##

1. Install the plugin
2. Add the code below to your active theme's **functions.php** file

```
add_filter( 'wkd_plugin_switcher_active_from', function( $time ){
	return '2300'; // '0700' for 07:00, '1645' for 16:45, etc.
});

add_filter( 'wkd_plugin_switcher_active_to', function( $time ){
	return '2330'; // '0700' for 07:00, '1645' for 16:45, etc.
});

add_filter( 'wkd_plugin_switcher_plugins', function( $plugins ){
	return [
		'akismet/akismet.php',
		'gutenberg/gutenberg.php',
	]; // array of plugins you want to switch on and off
});
```

## Description ##

Silence is golden.

## Changelog ##

**= 0.1.0 =**
Initial release.

