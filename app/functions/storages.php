<?php
/**
 * Sets errors in the session.
 * @param array $errors An array of errors to be recorded.
 */
function setErrors(array $errors): void
{
    session_start();
    $_SESSION['errors'] = $errors;
}
/**
 * Get errors from the session.
 * @return array An array of errors, if any, otherwise an empty array.
 */
function getErrors(): array
{
    session_start();
    if (isset($_SESSION['errors']) && is_array($_SESSION['errors'])) {
        $errors = $_SESSION['errors'];
        unset($_SESSION['errors']); // Remove errors from the session after receiving
        return $errors;
    }
    return [];
}