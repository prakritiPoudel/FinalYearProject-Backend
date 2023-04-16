<?php
class FileHandler
{
    // function for deleting any file with file name
    // this method can be called while executing delete query or update query
    function deleteFile($file, $path)
    {
        // checking if the name of the file is empty
        if (isset($file) == "") {
            $response = array(
                "status" => False,
                "message" => "Provide file name",
            );
            return $response;
        } else {
            // appending folder name with file name to get path
            $filename = $path . $file;
            // checking if the file exists
            if (file_exists($filename)) {
                $res  = unlink($filename);
                if ($res == 1) {
                    $response = array(
                        "status" => True,
                        "message" => "File deleted",
                    );
                    return $response;
                } else {
                    $response = array(
                        "status" => True,
                        "message" => "Problem while deleting the data",
                    );
                    return $response;
                }
            } else {
                $response = array(
                    "status" => False,
                    "message" => "Provided file doesnot exist",
                );
                return $response;
            }
        }
    }


    // saving the file in a folder
    function saveFile($file, $path)
    {
        if (isset($file) == "") {
            $response = array(
                "status" => "false",
                "message" => "No file received",
            );
        } else {
            $file_name = $file['name'];
            $file_tmp_name = $file['tmp_name'];
            $error = $file['error'];
            if ($error > 0) {
                $response = array(
                    "status" => "false",
                    "message" => "Problem in file received",
                );
            } else {
                // generating any random number to make the name of the file unique. The more the range, the more unique is file name
                $random_name = rand(1000, 1000000) . "-" . $file_name;
                $upload_name = $random_name;
                $upload_name = preg_replace('/\s+/', '-',  $upload_name);
                // sending the file in the specified folder.
                if (move_uploaded_file($file_tmp_name, $path . $upload_name)) {
                    $response = array(
                        "status" => "true",
                        "fileName" => $upload_name
                    );
                    return $response;
                } else {
                    $response = array(
                        "status" => "false",
                        "message" => "Failed to upload",
                    );
                    return $response;
                }
            }
        }
    }
}
