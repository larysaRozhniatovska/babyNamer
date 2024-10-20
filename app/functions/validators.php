<?php
/**
 * parse string option to array structure
 * @param string $option
 * @return array of structured options
 * for examples [['name' => 'minLen', 'param' => '3'],....]
 */
function parseOptionValue(string $option): array
{
    $optionList = explode(',', $option);
    foreach ($optionList as &$optionItem) {
        $optionItem = trim($optionItem);
        if(str_contains($optionItem,':')){
            $optionParts = explode(':',$optionItem);
            $optionItem = [
                'name' => $optionParts[0],
                'param' => $optionParts[1],
            ];
        }else{
            $optionItem = [
                'name' => $optionItem,
                'param' => null,
            ];
        }
    }
    return $optionList;
}

/**
 * parse options array from string to structure
 * @param array $options
 * @return void
 */
function parseOptions(array &$options) : void
{
    foreach ($options as &$option) {
        $option = parseOptionValue($option);
    }
}

/**
 * variable declared
 * @param array $data
 * @return array - errors string || []
 */
function issetData(array $data): array
{
    $errors = [];
    foreach ($data as $key => $item) {
        if (!isset($item)) {
            $errors[] = $key  . ' no valid';
        }
    }
    return $errors;
}
/**
 * check value is not empty
 * @param $val
 * @return string|bool
 */
function required( $val): string | bool
{
    if(empty($val)){
        return 'is reduired';
    }
    return false;
}
/**
 * check string size for minimum
 * @param string $str
 * @param int $minLength
 * @return string|bool
 */
function minLen(string $str, int $minLength): string | bool
{
    if(strlen($str) < $minLength){
        return 'is less then ' . $minLength;
    }
    return false;
}

/**
 * Check for boy or girl compliance
 * @param string $str
 * @return string|bool
 */
function gender(string $str): string | bool
{
    if(($str !== 'boy') && ($str !== 'girl')){
        return 'does not match :' . $str;
    }
    return false;
}
/**
 * check all data values of options conditions
 * @param array $data
 * @param array $options
 * @return array
 */
function validateData(array $data, array $options): array
{
    $errors = issetData($data);
    if(count($errors)){
        return $errors;
    }
    parseOptions($options);
    foreach ($options as $key => $option) {
        foreach ($option as $validator) {
            if (!empty($validator['param'])){
                $result = $validator['name']($data[$key],$validator['param']);
            }else{
                $result = $validator['name']($data[$key]);
            }
            if($result){
                $errors[] = $key . ' ' . $result;
            }
        }
    }
    return $errors;
}
