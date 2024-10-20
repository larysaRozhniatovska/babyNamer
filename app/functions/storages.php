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
/**Write names to the storage
 * @param array $names
 * @return void
 */
function setNames(array $names) : void
{
    $errors = [];
    $jsonNames = json_encode($names);
    if(!file_put_contents(STORAGE_NAMES_FILE, $jsonNames)){
        setErrors(['error writing to file']);
    }
}

/**
 * Read storage Names and return names array
 * @return array[] - [ 'girl' => [], 'boy' => [] ]
 */
function getNames() : array
{
    $namesArray = [
        'girl' => [],
        'boy' => [],
    ];
    if (file_exists(STORAGE_NAMES_FILE)) {
        $jsonNames = file_get_contents(STORAGE_NAMES_FILE);
        if (!$jsonNames) {
            $errors = getErrors();
            $errors[] ='error reading from file';
            setErrors($errors);
        }
        $names = json_decode($jsonNames, true);
        if (!$names) {
            $errors = getErrors();
            $errors[] ='data decoding error';
            setErrors($errors);
        } else {
            $namesArray = $names;
        }
    }
    return $namesArray;
}