<?php

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'OpenAI-Compatible Provider';
$string['name'] = 'OpenAI-Compatible Provider (Rust FFI)';
$string['settingsheading'] = 'Rust-backed OpenAI Provider Settings';
$string['settingsdesc'] = 'Configure the Rust FFI-based AI provider for OpenAI-compatible models.';
$string['libpath'] = 'Rust shared library path';
$string['libpath_desc'] = 'Path to the compiled Rust `.so` file for the OpenAI-compatible FFI bindings.';
// Add API key, endpoint, and model strings
$string['apikey'] = 'API key';
$string['apikey_desc'] = 'Your OpenAI-compatible API key.';
$string['endpoint'] = 'API endpoint';
$string['endpoint_desc'] = 'Base URL for the OpenAI-compatible API.';
$string['model'] = 'Default model';
$string['model_desc'] = 'Model to use if none is selected.';
$string['apikey_help'] = 'Enter your OpenAI API key here.';
$string['endpoint_help'] = 'Specify the OpenAI-compatible endpoint URL.';
$string['model_help'] = 'Provide the model name, such as kivoyo or gemini-code.';
