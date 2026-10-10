<?php

return [
    'sanitize_input' => [
        'name' => 'Sanitize Input',
        'instructions' => 'Sanitize input to remove potentially harmful code.',
    ],
    'parse_twig' => [
        'name' => 'Parse Twig',
        'instructions' => 'Render Twig tags in WYSIWYG content as templates. Only enable this if every user who can edit WYSIWYG content is trusted to run templates.',
    ],
    'accepted_iframe_domains' => [
        'name' => 'Accepted Iframe Domains',
        'instructions' => 'List of domains that are allowed in iframe embeds in the format: https://www.example.com.com',
    ],
];