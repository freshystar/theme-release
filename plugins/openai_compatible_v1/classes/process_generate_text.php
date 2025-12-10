<?php

declare(strict_types=1);

namespace aiprovider_openai_compatible_v1;

use core_ai\aiactions\generate_text;
use core_ai\local\types\ai_request;
use core_ai\local\types\ai_response;
use core_ai\process_base;

defined('MOODLE_INTERNAL') || die();

class process_generate_text extends process_base {

    /**
     * Process the generate_text AI action.
     *
     * @param generate_text $action The AI action instance.
     * @param ai_request $request The AI request object.
     * @return ai_response The AI response object.
     */
    public function process(generate_text $action, ai_request $request): ai_response {
        $prompt = $request->prompt;

        // Get instance-level or site-wide configuration.
        $instanceapikey = $request->get_providerconfig('apikey');
        $apikey = !empty($instanceapikey) ? $instanceapikey : get_config('aiprovider_openai_compatible_v1', 'apikey');
        if (!empty($apikey)) {
            putenv("OPENAI_API_KEY=$apikey");
        }

        $instanceendpoint = $request->get_providerconfig('endpoint');
        $endpoint = !empty($instanceendpoint) ? $instanceendpoint : get_config('aiprovider_openai_compatible_v1', 'endpoint');
        if (!empty($endpoint)) {
            putenv("OPENAI_API_BASE=$endpoint");
        }

        $instancemodel = $request->get_providerconfig('model');
        $model = !empty($instancemodel) ? $instancemodel : get_config('aiprovider_openai_compatible_v1', 'model');
        if (!empty($model)) {
            putenv("OPENAI_MODEL=$model");
        }

        // Path to the Rust FFI shared library.
        $libPath = __DIR__ . '/../target/release/librust_openapi.so';
        if (!file_exists($libPath)) {
            throw new \moodle_exception("Rust FFI library not found at $libPath");
        }

        // Define the FFI interface and call the Rust function.
        $ffi = \FFI::cdef("
            char* ask_openai(const char*);
            void free_openai_string(char*);
        ", $libPath);

        $cstr = $ffi->ask_openai($prompt);
        $response = \FFI::string($cstr);
        $ffi->free_openai_string($cstr);

        return new ai_response($response);
    }
}
