<?php
function display_error($validation, $inputform)
{
    if ($validation->hasError($inputform)) {
        return $validation->getError($inputform);
    } else {
        return false;
    }
}
