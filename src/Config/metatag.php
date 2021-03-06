<?php
return [
    /*
     * The default configurations to be used by the meta generator.
     */
    'defaults'       => [
        'title'       => false,
        'description' => false,
        'separator'   => ' - ',
        'keywords'    => [],
        'image'       => ''
    ],
    /*
     * Webmaster tags are always added.
     */
    'webmaster_tags' => [
        'google'    => null,
        'bing'      => null,
        'alexa'     => null,
        'pinterest' => null,
        'yandex'    => null
    ]
];