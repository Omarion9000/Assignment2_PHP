<?php
$countfiles = isset($_FILES['files']['name']) ? count($_FILES['files']['name']) : 0;

if(isset($_POST['submit']) && $countfiles > 0) {
  for($i = 0; $i < $countfiles; $i++) {
    $filename = $_FILES['files']['name'][$i];
    // Ubication
    $target_file = './uploads/' . $filename;
    $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
    $file_extension = strtolower($file_extension);
    $valid_extension = array("png", "jpeg", "jpg");
    if(in_array($file_extension, $valid_extension)) {
      if(move_uploaded_file($_FILES['files']['tmp_name'][$i], $target_file)) {
        $statement->bind_param("ss", $filename, $target_file);
        $statement->execute();
        echo "<p>File uploaded successfully: $filename</p>";
      }
    }
  }
}

include './inc/header.php';
require './database.php';
?>
<section class="masthead">
  <div>
    <h1>Uploading Images</h1>
  </div>
</section>
<section class="form-row">
  <form method='post' action='' enctype='multipart/form-data'>
    <p><input type='file' name='files[]' multiple /></p>
    <p><input class="btn btn-dark" type='submit' value='Submit' name='submit'/></p>
  </form>
  <a href="view.php" class="btn btn-primary">View Uploads</a>
</section>
<?php require './inc/footer.php'; ?>
