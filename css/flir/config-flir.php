<?php
/*
Facelift Image Replacement v1.2 beta 4
Facelift was written and is maintained by Cory Mawhorter.  
It is available from http://facelift.mawhorter.net/

===

This file is part of Facelife Image Replacement ("FLIR").

FLIR is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

FLIR is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Facelift Image Replacement.  If not, see <http://www.gnu.org/licenses/>.
*/

define('FONT_DISCOVERY', 			false);

define('ALLOWED_DOMAIN', 			false); // ex: 'example.com', 'subdomain.domain.com', '.allsubdomains.com', false disabled

define('UNKNOWN_FONT_SIZE', 		16); // in pixels

define('CACHE_CLEANUP_FREQ', 		1); // -1 disable, 1 everytime, 10 would be about 1 in 10 times this script runs (higher number decreases frequency)
define('CACHE_KEEP_TIME', 			604800); // 604800: 7 days

define('CACHE_DIR', 					'cache');
define('FONTS_DIR', 					'fonts');
define('PLUGIN_DIR',					'plugins');

define('HBOUNDS_TEXT', 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'); // see http://facelift.mawhorter.net/docs/

// Each font you want to use should have an entry in the fonts array.
$fonts = array();
$fonts['tribalbenji'] 	= 'Tribal_Font.ttf';
$fonts['illuminating'] 	= 'ArtOfIlluminating.ttf';
$fonts['bentham'] 		= 'Bentham.otf';
$fonts['geo'] 				= 'Geo_Oblique.otf';
$fonts['flyer'] 		= 'Flyer-BlackCondensed.ttf';
$fonts['konstytucyja'] 	= 'Konstytucyja_1.ttf';
$fonts['stunfilla'] 		= 'OPN_StunFillaWenkay.ttf';
$fonts['animaldings'] 	= 'Animal_Silhouette.ttf';

$fonts['default'] 	= $fonts['flyer'];

/*
// You can now setup collections of fonts that will be automatically detected and used if the proper CSS conditions are met.
$fonts['a_collection']		= array();
$fonts['a_collection'][] 	= array('file' => 'test/font_regular.ttf');
$fonts['a_collection'][] 	= array('file' => 'test/font_bolditalic.ttf'
										,'font-stretch'			=> ''
										,'font-style'				=> 'italic'
										,'font-variant'			=> ''
										,'font-weight'				=> 'bold'
										,'text-decoration'		=> '');
$fonts['a_collection'][] 	= array('file' => 'test/font_bold.ttf'
										,'font-weight'				=> 'bold');
$fonts['a_collection'][] 	= array('file' => 'test/font_italic.ttf'
										,'font-style'				=> 'italic');
*/

// Set replacement for "web fonts" here
$fonts['arial'] = $fonts['helvetica'] = $fonts['sans-serif'] 		= $fonts['puritan'];
$fonts['times new roman'] = $fonts['times'] = $fonts['serif'] 		= $fonts['bentham'];
$fonts['courier new'] = $fonts['courier'] = $fonts['monospace'] 	= $fonts['geo'];

define('IM_EXEC_PATH', ''); // Path to ImageMagick (with trailing slash).  ImageMagick is needed by some plugins, but not necessary.
?>