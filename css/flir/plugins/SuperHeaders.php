<?php
// JavaScript Document

/*
SuperHeaders v0.1.1

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

$PLUGIN_ERROR = false;
define('FULL_CACHE_PATH', fix_path(getcwd().'/'.$FLIR['cache']));
define('CONVERT', IM_EXEC_PATH.'convert');

if(DEBUG && file_exists(FULL_CACHE_PATH))
	unlink(FULL_CACHE_PATH);

$image = false;

if($FLIR['text'][0] == '@') $FLIR['text'] = '\\'.$FLIR['text'];

$cmdtext = escapeshellarg($FLIR['text']);

$bounds = convertBoundingBox(imagettfbbox($FLIR['size_pts'], 0, $FLIR['font'], $FLIR['text']));

$bounds['height'] += 200;
$REAL_HEIGHT_BOUNDS = $bounds;	
	
$fore_hex = dec2hex($FLIR['color']['red'], $FLIR['color']['green'], $FLIR['color']['blue']);
$bkg_hex = $FLIR['output'] == 'png' ? 'transparent' : ('"#'.dec2hex($FLIR['bkgcolor']['red'], $FLIR['bkgcolor']['green'], $FLIR['bkgcolor']['blue']).'"');

$opacity = '';
if($FLIR['opacity'] < 100 && $FLIR['opacity'] >= 0)
	$opacity = strlen($FLIR['opacity']) == 1 ? '0'.$FLIR['opacity'] : (strlen($FLIR['opacity'])>2?substr($FLIR['opacity'], 0, 2) : $FLIR['opacity']);

if(isset($FStyle['ff_Wrap']))
	$size = ' -size '.$FLIR['maxwidth'].'x';
else
	$size = ' -size '.($bounds['width']+300).'x'.$REAL_HEIGHT_BOUNDS['height'];

$fill1 = ' -fill "#3F3F3F30"';
$fill2 = ' -fill "#3f3f3f"';

$larger_size = $FLIR['maxheight'];

$cmd = CONVERT.' -size '.$FLIR['maxwidth'].'x'.$FLIR['maxheight'].' xc:'.$bkg_hex.' '
					.'-font '.escapeshellarg(fix_path($FLIR['font']))
						.' -density '.$FLIR['dpi']
						.' -pointsize '.$larger_size
						.$fill1
						.' -annotate 0x0+0+'.$FLIR['maxheight'].' '.$cmdtext.' '
					.'-font '.escapeshellarg(fix_path($FLIR['font']))
						.' -density '.$FLIR['dpi']
						.' -pointsize '.$FLIR['size_pts']
						.$fill2
						.' -annotate 0x0+40+'.($FLIR['maxheight']-40).' '.$cmdtext.' '
					.' -quality 90 -depth 8 -colors 256 '.escapeshellarg(FULL_CACHE_PATH);

//die($cmd);
exec($cmd);

?>