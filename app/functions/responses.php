<?php
/**
 * Show front
 * @param string $page
 * @param array $data
 * @param string $template
 */
function render(string $page,array $data = [], string $template = VIEWS_TEMPLATE_MAIN): void
{
    extract($data);
    include_once VIEWS_TEMPLATES_DIR . $template . '.php';
}


/**
 * Redirect to specify url
 * @param string $url
 */
function redirect(string $url) : never
{
    header('Location: ' . $url);
    exit();
}
