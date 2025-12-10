<?php
namespace aiprovider_openai_compatible_v1;

use core_ai\hook\after_ai_provider_form_hook;

defined('MOODLE_INTERNAL') || die();

/**
 * Hook listener for the AI provider instance setup form.
 */
class hook_listener {
    /**
     * Add API key, endpoint, and model fields to the provider instance form.
     *
     * @param after_ai_provider_form_hook $hook The hook object.
     */
    public static function set_form_definition_for_aiprovider_openai_compatible_v1(after_ai_provider_form_hook $hook): void {
        // Only inject fields for this provider.
        if ($hook->plugin !== 'aiprovider_openai_compatible_v1') {
            return;
        }

        $mform = $hook->mform;

        // API key field.
        $mform->addElement('passwordunmask', 'apikey', get_string('apikey', 'aiprovider_openai_compatible_v1'), ['size' => 75]);
        $mform->addHelpButton('apikey', 'apikey', 'aiprovider_openai_compatible_v1');
        $mform->setType('apikey', PARAM_TEXT);

        // Endpoint field.
        $mform->addElement('text', 'endpoint', get_string('endpoint', 'aiprovider_openai_compatible_v1'), ['size' => 25]);
        $mform->addHelpButton('endpoint', 'endpoint', 'aiprovider_openai_compatible_v1');
        $mform->setType('endpoint', PARAM_URL);

        // Model selection field.
        $options = [
            'kivoyo' => 'kivoyo',
            'adorsys' => 'adorsys',
            'qwen3-30b-a3b' => 'qwen3-30b-a3b',
            'qwen3-coder' => 'qwen3-coder',
            'gemini-code' => 'gemini-code',
        ];
        $mform->addElement('select', 'model', get_string('model', 'aiprovider_openai_compatible_v1'), $options);
        $mform->addHelpButton('model', 'model', 'aiprovider_openai_compatible_v1');
        $mform->setType('model', PARAM_TEXT);
    }
}
