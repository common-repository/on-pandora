<?php
/*
Plugin Name: On Pandora
Plugin URI: http://craigcocca.com/projects/onpandora
Description: Shows what station you're currently listening to on Pandora
Version: 1.0.0
Author: Craig Cocca
Author URI: http://craigcocca.com
*/

/*  Copyright 2012 Craig D. Cocca  (email: craig AT craigcocca DOT com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( !function_exists('onpandora') ) {
	function onpandora($atts, $content = null) {
		if ( !function_exists('simplexml_load_string') ) { return "{ OnPandora plugin requires SimpleXML support. }"; } 
    	extract(shortcode_atts(array("user" => '',"explanation" => ''), $atts));
    	if(empty($user)) { return "{ OnPandora syntax: [onpandora user=\"yourpandorausername\"] }"; }
		$url = "http://feeds.pandora.com/feeds/people/$user/nowplaying.xml";
		$xml = file_get_contents($url);
		$pandora = simplexml_load_string($xml);
		$station =  $pandora->channel->item->title;
		$pandoraURL = $pandora->channel->item->link;
		$string = "<a href=\"$pandoraURL\">$station</a> on <a href=\"http://pandora.com\">Pandora</a>";
		if(!empty($explanation)) { 
			$explanations = explode(";",$explanation);
			foreach($explanations AS $thisExplanation) { 
				list($stationName,$explanationText) = explode(":",$thisExplanation);
				if($stationName == $station) { $string .= " ($explanationText)"; break;}
			}	
		}
  	return $string;
	}

	// Add in the onpandora shortcode so that you can use the shortcode [onpandora] to show what you're currently listening to.
	add_shortcode('onpandora', 'onpandora');

}

?>
