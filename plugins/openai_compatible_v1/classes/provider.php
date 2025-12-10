<?php

declare(strict_types=1);

namespace aiprovider_openai_compatible_v1;

use core_ai\local\types\ai_response;
use core_ai\local\types\ai_request;
use core_ai\provider;

defined('MOODLE_INTERNAL') || die();

class provider extends \core_ai\provider {
    
    public static function get_action_list(): array {
        return [
            \core_ai\aiactions\generate_text::class,
            // \core_ai\aiactions\summarise_text::class,
            // \core_ai\aiactions\explain_text::class,
        ];
    }

    public static function is_provider_configured(): bool {
        $libPath = __DIR__ . '/../target/release/librust_openapi.so';
        return file_exists($libPath);
    }

    public static function get_display_name(): string {
        return get_string('name', 'aiprovider_openai_compatible_v1');
    }

}
