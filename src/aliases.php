<?php
/**
 * Class aliases for backwards-compatibility.
 *
 * @package    Kirki
 * @copyright  Copyright (c) 2019, Ari Stathopoulos (@aristath)
 * @license    https://opensource.org/licenses/MIT
 * @since      4.0
 */

add_action(
    'customize_register',
    function() {
        class_alias( 'Kirki\Control\Checkbox', 'Kirki_Control_Checkbox' );
        class_alias( 'Kirki\Control\Switch', 'Kirki_Control_Switch' );
        class_alias( 'Kirki\Control\Toggle', 'Kirki_Control_Toggle' );
    }
);