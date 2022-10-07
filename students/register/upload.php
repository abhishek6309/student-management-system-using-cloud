<?php 
$str = ""; 

    

    if(isset($_FILES["filename".$i])){

     $file=$_FILES["filename".$i];

     $fileName = $_FILES["filename".$i]['name'];

        $fileTmpName = $_FILES["filename".$i]['tmp_name'];

        $fileSize = $_FILES["filename".$i]['size'];

        $fileErro = $_FILES["filename".$i]['error'];

        $fileType = $_FILES["filename".$i]['type'];

    

        $fileExtTmp=explode('.',$fileName);

        $fileExt= strtolower(end($fileExtTmp));

        $allow = array('jpg','jpeg','png','svg');

        

    

        if (!empty($fileExt)) {

                if ($fileErro === 0) {

                    

                        $fileNewName = $userId.'_'.$name."e_qualification"."_"."$i".".".$fileExt;

                        $path = "../Documents/Educational/";

                        if (!file_exists($path)) {

                            mkdir($path, 0777, true);

                        }

                        $fileDestination = '../Documents/Educational/'.$fileNewName;

                        move_uploaded_file($fileTmpName,$fileDestination);

                        $str=substr($fileDestination,3);

                    

                }

                else {

                    // $_SESSION['msg']="There is error while uploading a image!";

                    // header("Location: ../subject.php?class=$varClass&subject=$varSubject");

                    return;

                }

        }

        else{

            // $_SESSION["return"] = "Error! Please Select Logo File!";

            // header("Location: ../subject.php?class=$varClass&subject=$varSubject");

            return;

        }

    }