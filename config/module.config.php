<?php
$aceMainPath = 'ace-v1.3.1-bs-v5.0.0';
$aceMainPath = 'ace-v1.3.3';
return array(
    'application' => array(
        'path' => array(
            'images' => '/images',
            'css' => '/css',
            'js' => '/js'
        )
    ),
    'template' => array(
        'ace' => array(
            'path' => array(
                'avatars' => '/' . $aceMainPath . '/assets/' . 'avatars',
                'css' => '/' . $aceMainPath . '/assets/' . 'css',
                'font' => '/' . $aceMainPath . '/assets/' . 'font',
                'fonts' => '/' . $aceMainPath . '/assets/' . 'fonts',
                'images' => '/' . $aceMainPath . '/assets/' . 'images',
                'img' => '/' . $aceMainPath . '/assets/' . 'img',
                'js' => '/' . $aceMainPath . '/assets/' . 'js',
            )
        )
    )
);
