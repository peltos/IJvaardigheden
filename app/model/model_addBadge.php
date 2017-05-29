<?php
/**
 * Created by PhpStorm.
 * User: Roberto
 * Date: 20-3-2017
 * Time: 12:30
 */

class model_addBadge{

    private $database;

    public function __construct() {
        $this->database = new DatabasePDO();
    }
    public function writePost($pathToImage,$subject_subject, $description) {
        
        
        $this->database->query("INSERT INTO badges(subject_subject, description, pathToImage) VALUES (:subject_subject, :description, :pathToImage)");
        
        $this->database->bind(':pathToImage', $pathToImage);
        $this->database->bind(':subject_subject', $subject_subject);
        $this->database->bind(':description', $description);
        
            $name           = $_FILES['file']['name'];
                $temp           = explode(".", $name);
                $newfilename    = round(microtime(true)) . '.' . end($temp);
            $tmpName        = $_FILES['file']['tmp_name'];
            $error          = $_FILES['file']['error'];
            $size           = $_FILES['file']['size'];
            $ext            = strtolower(pathinfo($name, PATHINFO_EXTENSION));
           
            switch ($error) {
                case UPLOAD_ERR_OK:
                    $valid = true;
                    //validate file extensions
                    if ( !in_array($ext, array('jpg','jpeg','png','gif')) ) {
                        $valid = false;
                        $response = 'Invalid file extension.';
                    }
                    //validate file size
                    if ( $size/1024/1024 > 2 ) {
                        $valid = false;
                        $response = 'File size is exceeding maximum allowed size.';
                    }
                    
                    //upload file
                    if ($valid) {
                        
                        $targetPath =  dirname( __FILE__ ) . DIRECTORY_SEPARATOR. 'img' . DIRECTORY_SEPARATOR. $newfilename;
                        header("addBadge.php");
                        echo $targetPath;
                        move_uploaded_file($tmpName,$targetPath);
                        exit;
                    }
                    break;
                case UPLOAD_ERR_INI_SIZE:
                    $response = 'The uploaded file exceeds the upload_max_filesize directive in php.ini.';
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    $response = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.';
                    break;
                case UPLOAD_ERR_PARTIAL:
                    $response = 'The uploaded file was only partially uploaded.';
                    break;
                case UPLOAD_ERR_NO_FILE:
                    $response = 'No file was uploaded.';
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    $response = 'Missing a temporary folder. Introduced in PHP 4.3.10 and PHP 5.0.3.';
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    $response = 'Failed to write file to disk. Introduced in PHP 5.1.0.';
                    break;
                case UPLOAD_ERR_EXTENSION:
                    $response = 'File upload stopped by extension. Introduced in PHP 5.2.0.';
                    break;
                default:
                    $response = 'Unknown error';
                break;
            }
            $servername = "oege.ie.hva.nl";
            $username = "reinded003";
            $password = "qS9Fu8G8Oo2BBA";
            $dbname = "zreinded003";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 

            $sql = "UPDATE INTO badges (pathToImage)
            VALUES ('".$newfilename."') WHERE ";
            echo $response;
        if ($this->database->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteSchoolGroupQuery($groupToDelete) {
        $this->database->query('DELETE FROM schoolGroup WHERE schoolGroup = $counter ');
        $this->database->bind(':groupToDelete', $groupToDelete);

    }

    public function readBadges() {
        $this->database->query('SELECT * FROM badges');
        return $this->database->resultset();
    }
    public function readVakken() {
        $this->database->query('SELECT * FROM subject');
        return $this->database->resultset();
    }



}