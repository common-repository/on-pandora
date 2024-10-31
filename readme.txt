=== OnPandora ===
Contributors: craigcocca
Requires at least: 3.0
Tested up to: 3.2.1
Stable tag: 1.0

== Description ==
This shortcode displays the name of the Pandora station that you are currently listening to. 
Great for sharing with your blog readers what your current musical tastes are without being too specific.


== Requirements ==
OnPandora requires the SimpleXML PEAR module for PHP


== Shortcode Syntax ==

Basic Syntax:
[onpandora user="<yourPandoraUsername>"]  

Replace <yourPandoraUsername> with your Pandora username. You can find out what your Pandora username is
by logging into your account on Pandora and selecting "My Profile" from the account menu at the top right.


Advanced syntax:
[onpandora user="<yourPandoraUsername>" explanation="Beatles Radio:You gotta love the Beatles!;Classical Radio:It's good for your brain!"]

The "explanation" attribute can be used to add explanations for why you're listening to a certain radio station. You can add explanations in the format <PandoraStation>:<StationExplanation>, with multiple explanations separated by a semicolon (";"). 
In the above example, the plugin would return that I'm listening to Beatles Radio because "You gotta love the Beatles!". This 
feature was added because I often listen to "Kids Radio" on Pandora when I'm at home with my daughters, and some of my blog 
readers wanted to know why I would be listening to that!




== Installation ==

1. Upload the plugin to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Changelog ==


= 1.0.0 =
* First public release
* Added the 'explanation' feature

= 0.9.0 =
* First implementation
