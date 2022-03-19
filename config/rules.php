<?php

return [
    'show_welcome_message' => ['filled'],
    'welcome_message' => ['required_with:show_welcome_message'],
    'footer_title' => 'required|string',
    'footer_description' => 'required|string',
    'footer_links' => 'nullable|array'
];
