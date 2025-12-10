<?php

defined('MOODLE_INTERNAL') || die();

use core_ai\admin\admin_settingspage_provider;

if ($hassiteconfig) {
    $settings = new admin_settingspage_provider(
        'aiprovider_openai_compatible_v1',
        new lang_string('pluginname', 'aiprovider_openai_compatible_v1'),
        'moodle/site:config',
        true
    );

    $settings->add(new admin_setting_heading(
        'aiprovider_openai_compatible_v1/heading',
        new lang_string('settingsheading', 'aiprovider_openai_compatible_v1'),
        new lang_string('settingsdesc', 'aiprovider_openai_compatible_v1')
    ));

    // Example config: path to Rust library
    $settings->add(new admin_setting_configtext(
        'aiprovider_openai_compatible_v1/libpath',
        new lang_string('libpath', 'aiprovider_openai_compatible_v1'),
        new lang_string('libpath_desc', 'aiprovider_openai_compatible_v1'),
        '/opt/bitnami/moodle/ai/provider/openai_compatible_v1/target/release/librust_openapi.so'
    ));

    // API key, endpoint, and model settings.
    $settings->add(new admin_setting_configpasswordunmask(
        'aiprovider_openai_compatible_v1/apikey',
        new lang_string('apikey', 'aiprovider_openai_compatible_v1'),
        new lang_string('apikey_desc', 'aiprovider_openai_compatible_v1'),
        ''
    ));
    $settings->add(new admin_setting_configtext(
        'aiprovider_openai_compatible_v1/endpoint',
        new lang_string('endpoint', 'aiprovider_openai_compatible_v1'),
        new lang_string('endpoint_desc', 'aiprovider_openai_compatible_v1'),
        ''
    ));
    $settings->add(new admin_setting_configselect(
        'aiprovider_openai_compatible_v1/model',
        new lang_string('model', 'aiprovider_openai_compatible_v1'),
        new lang_string('model_desc', 'aiprovider_openai_compatible_v1'),
        '',
        [
            'kivoyo' => 'kivoyo',
            'adorsys' => 'adorsys',
            'qwen3-30b-a3b' => 'qwen3-30b-a3b',
            'qwen3-coder' => 'qwen3-coder',
            'gemini-code' => 'gemini-code',
        ]
    ));
    $ADMIN->add('root', $settings);
}
