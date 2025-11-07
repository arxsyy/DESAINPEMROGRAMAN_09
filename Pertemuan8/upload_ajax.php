<!-- <?php
// if (isset($_FILES['file'])) {
//     $errors = array();
//     $file_name = $_FILES['file']['name'];
//     $file_size = $_FILES['file']['size'];
//     $file_tmp = $_FILES['file']['tmp_name'];
//     $file_type = $_FILES['file']['type'];
//     $file_ext = strtolower("." . end(explode('.', $_FILES['file']['name'])) . "");
//     $extensions = array("pdf", "doc", "docx", "txt");
    
//     if (in_array($file_ext, $extensions) === false) {
//         $errors[] = "Ekstensi file yang diizinkan adalah PDF, DOC, DOCX, atau TXT.";
//     }
    
//     if ($file_size > 2097152) {
//         $errors[] = 'Ukuran file tidak boleh lebih dari 2 MB';
//     }
    
//     if (empty($errors) == true) {
//         move_uploaded_file($file_tmp, "documents/" . $file_name);
//         echo "File berhasil diunggah.";
//     } else {
//         echo implode(" ", $errors);
//     }
// }
?> -->

<?php
if (isset($_FILES['files'])) {
    $errors = array();
    $extensions = array("jpg", "jpeg", "png", "gif");
    $maxsize = 2097152; // 2MB
    
    $totalFiles = count($_FILES['files']['name']);
    
    for ($i = 0; $i < $totalFiles; $i++) {
        $file_name = $_FILES['files']['name'][$i];
        $file_size = $_FILES['files']['size'][$i];
        $file_tmp = $_FILES['files']['tmp_name'][$i];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        
        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "Ekstensi file $file_name yang diizinkan adalah JPG, JPEG, PNG, atau GIF.";
        }
        
        if ($file_size > $maxsize) {
            $errors[] = "Ukuran file $file_name tidak boleh lebih dari 2 MB";
        }
        
        if (empty($errors) == true) {
            $targetFile = "uploads/" . $file_name;
            if (move_uploaded_file($file_tmp, $targetFile)) {
                echo "File $file_name berhasil diunggah.<br>";
                echo "<img src='$targetFile' width='200' style='height: auto;'><br><br>";
            } else {
                echo "Gagal mengunggah file $file_name.<br>";
            }
        }
    }
    
    if (!empty($errors)) {
        echo implode("<br>", $errors);
    }
}
?>