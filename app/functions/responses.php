<?php
/**
 * Show front
 * @param string $page
 * @param array $data
 * @param string $template
 */

function render(string $page, string $template = VIEWS_TEMPLATE_MAIN): void
{
//, array $data = []){
//    extract($data);
    include_once VIEWS_TEMPLATES_DIR . $template . '.php';
}
