<?php
defined('MOODLE_INTERNAL') || die();

$callbacks = [
    [
        'hook' => \core_ai\hook\after_ai_provider_form_hook::class,
        'callback' => \aiprovider_openai_compatible_v1\hook_listener::class . '::set_form_definition_for_aiprovider_openai_compatible_v1',
    ],
];

// function aiprovider_openai_compatible_v1_register_ai_providers(): array {
//     return [
//         new \core_ai\local\registry\ai_provider_definition(
//             'aiprovider_openai_compatible_v1',
//             \aiprovider_openai_compatible_v1\provider::class
//         )
//     ];
// }
