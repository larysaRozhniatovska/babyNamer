<?php
function home()
{
//    $names = getNames();
//    $girlsSize = count($names['girls']);
//    $boysSize = count($names['boys']);
//    if ($girlsSize > $boysSize) {
//        $size = $girlsSize;
//    } else {
//        $size = $boysSize;
//    }
    $errors = getErrors();
    render('home' , [
        'errors' => $errors
    ]);
//    render('home', [
//        'names' => $names,
//        'size' => $size,
//    ]);
}

function process()
{
//    $names = getNames();
    $data = [
        'babyName' => htmlspecialchars(filter_input(INPUT_POST,'babyName')),
        'gender' => htmlspecialchars(filter_input(INPUT_POST,'gender')),
    ];
    //validations
    $errors = validateData($data, OPTIONS_ERROR);
    if (empty($errors)) {
//        writeData($data,'../data.json');
    } else {
        setErrors($errors);
    }

//    $names[$gender][] = $name;
//    setNames($names);
    redirect('/index.php');
}