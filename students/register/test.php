<?php

session_start();

if(session_destroy()){
  header("location:/");
}


?>
<html>
<body>
<form action="" method="POST">
      <input type="text" name="rollno"> roll no </input>
      <input type="submit">Submit</input>
</form>
</body>
</html>
