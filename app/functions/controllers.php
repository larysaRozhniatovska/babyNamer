<?php
/**
 * @return void
 */
function home()
{
    $names = getNames();
    $girlsSize = count($names['girl']);
    $boysSize = count($names['boy']);
    $size = max($girlsSize, $boysSize);
    $errors = getErrors();
    render('home' , [
        'names' => $names,
        'size' => $size,
        'errors' => $errors
    ]);
}

/**
 * data reading, validation and saving
 * Redirect to /index.php
 * @return void
 */
function process()
{
    $data = [
        'babyName' => htmlspecialchars(filter_input(INPUT_POST,'babyName')),
        'gender' => htmlspecialchars(filter_input(INPUT_POST,'gender')),
    ];
    $errors = validateData($data, OPTIONS_ERROR);
    if (empty($errors)) {
        $names = getNames();
        $names[ $data['gender']][] =  $data['babyName'];
        setNames($names);
    } else {
        setErrors($errors);
    }
    redirect('/index.php');
}