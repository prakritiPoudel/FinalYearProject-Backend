<?php

function saveImage($file)
{
    if ($file['name'] == "") {
        return null;
    } else {
        $file_name = $file['name'];
        $file_tmp_name = $file['tmp_name'];
        $random_name = rand(1000, 1000000) . "-" . $file_name;
        $file_upload_name = $random_name;
        $file_upload_name = preg_replace('/\s+/', '-', $file_upload_name);

        if (move_uploaded_file($file_tmp_name, '../media/' . $file_upload_name)) {
            return $file_upload_name;
        } else {
            return "";
        }
    }
}