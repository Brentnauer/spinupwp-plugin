<?php
/*
Plugin Name:  RainStone Cache Manager
Plugin URI:   https://rainstone.digital
Description:  This plugin helps clear your cache after you edit a page.
Author:       RainStone Digital
Version:      1.1.2
Network:      True
Text Domain:  spinupwp
Requires PHP: 7.1
Requires WP:  4.7

// Copyright (c) 2019 Delicious Brains. All rights reserved.
//
// Released under the GPL license
// http://www.opensource.org/licenses/gpl-license.php
//
// **********************************************************************
// This program is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
// **********************************************************************
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
    require_once __DIR__ . '/vendor/autoload.php';
}

/**
 * The main SpinupWP function.
 *
 * @return \DeliciousBrains\SpinupWp\Plugin
 */
function spinupwp()
{
    if ( isset( $GLOBALS['spinupwp'] ) && $GLOBALS['spinupwp'] instanceof \DeliciousBrains\SpinupWp\Plugin ) {
        return $GLOBALS['spinupwp'];
    }
    
    $GLOBALS['spinupwp'] = new \DeliciousBrains\SpinupWp\Plugin( __FILE__ );
    $GLOBALS['spinupwp']->run();

    return $GLOBALS['spinupwp'];
}

spinupwp();
