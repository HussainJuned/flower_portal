<?php

return array(


    // 'pdf' => array(
    //     'enabled' => true,
    //     'binary' => '"C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf"',
    //     'timeout' => false,
    //     'options' => array(),
    //     'env'     => array(),
    // ),
    // 'image' => array(
    //     'enabled' => true,
    //     'binary' => '"C:\Program Files\wkhtmltopdf\bin\wkhtmltoimage"',
    //     'timeout' => false,
    //     'options' => array(),
    //     'env'     => array(),
    // ),

    'pdf' => array(
        'enabled' => true,
        'binary'  => '/usr/local/bin/wkhtmltopdf',
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),
    'image' => array(
        'enabled' => true,
        'binary'  => '/usr/local/bin/wkhtmltoimage',
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),


);
