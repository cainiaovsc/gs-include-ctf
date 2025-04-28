<?php
// 定义允许的压缩文件扩展名白名单
$allowedExtensions = array('zip', 'rar', 'bz2', 'gz');

// 定义允许的压缩文件文件头白名单
$allowedFileHeaders = array(
    'zip' => 'application/zip',
    'rar' => 'application/x-rar-compressed',
    'bz2' => 'application/x-bzip2',
    'gz' => 'application/gzip'
);

// 设置上传目录
$uploadDirectory = "uploads/";
$redirectUrl = "less3.php?page=mainPage.php";

// 检查上传目录是否存在，如果不存在则创建
if (!file_exists($uploadDirectory)) {
    mkdir($uploadDirectory, 0777, true);
}

// 处理文件上传
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // 获取文件信息
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    // 获取文件扩展名
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // 检查文件扩展名是否在白名单中
    if (in_array($fileExtension, $allowedExtensions)) {
        // 检查文件头是否符合预期的文件类型
        $fileHeader = mime_content_type($fileTmpName);
        if (isset($allowedFileHeaders[$fileExtension]) && $allowedFileHeaders[$fileExtension] === $fileHeader) {
            // 生成唯一的文件名
            $newFileName = uniqid('', true) . "." . $fileExtension;
            $destination = $uploadDirectory . $newFileName;

            // 尝试移动文件到上传目录
            if (move_uploaded_file($fileTmpName, $destination)) {
                echo "上传成功！，文件路径：" . $uploadDirectory . $newFileName;
            } else {
                echo "文件上传失败！";
            }
        } else {
            echo "不允许的文件类型！";
        }
    } else {
        echo "不允许的文件扩展名！";
        ?>
        <script>
            // 使用JavaScript进行延迟跳转
            setTimeout(function () {
                window.location.href = "<?php echo $redirectUrl; ?>";
            }, 1000); // 延迟1秒
        </script>
        <?php
    }
}
?>
<meta charset="UTF-8">
