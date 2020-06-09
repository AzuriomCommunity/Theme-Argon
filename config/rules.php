<?php

return [
    'show_welcome_message' => ['filled'],
    'welcome_message' => ['required_with:show_welcome_message'],
    'footer_title' => 'required|string',
    'footer_description' => 'required|string',
    'footer_links' => 'nullable|array',
    'footer_social_twitter' => 'nullable|string',
    'footer_social_discord' => 'nullable|string',
    'footer_social_youtube' => 'nullable|string',
    'footer_social_teamspeak' => 'nullable|string',
    'footer_social_instagram' => 'nullable|string',
];
