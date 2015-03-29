<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return array(
    'email' => array(
        'auth' => array(
            'name' => 'bespoke-apps.co.uk',
            'host' => 'smtp.gmail.com',
            'connection_class' => 'login',
            'port' => '465',
            'connection_config' => array(
                'ssl' => 'ssl',
            )
        ),
        'defaults' => array(
            'to_address' => 'webmaster@bespoke-apps.co.uk',
            'from_address' => 'webmaster@bespoke-apps.co.uk',
        )
    )
);
