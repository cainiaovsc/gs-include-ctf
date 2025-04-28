<h1>Less--3</h1>

<?php
$strategy = '试试?page=zip://<压缩包名>.zip%23<木马><br>
?page=phar://<压缩包名>.zip/<木马>';
include("../header/header.php");

if (isset($_GET['page'])) {
    if (!preg_match("/flag/", $_GET['page'])) {
        if (!preg_match("/[*?]/", $_GET['page'])) {
            include($_GET['page']);
        } else {
            echo "不可以使用*？哦";
        }
    } else {
        echo "不可以使用flag哦！";
    }
}

if (isset($_GET['flag'])) {
    $flag = file_get_contents("./flag");
    $flagUser = $_GET['flag'];
    if (trim($flagUser) == $flag) {
        echo "回答正确！，恭喜通关！！！";
        $redirectUrl = "../index.php";
    } else {
        echo "回答错误!";
        $redirectUrl = "less3.php?page=mainPage.php";
    }?>
    <script>
        // 使用JavaScript进行延迟跳转
        setTimeout(function () {
            window.location.href = "<?php echo $redirectUrl; ?>";
        }, 1000); // 延迟1秒
    </script>
<?php }
?>

<header>
    <link rel="stylesheet" href="../css/less3.css">
</header>
<div class="upload-container">
    <h2>上传压缩包</h2>
    <form action="uploadZip.php" method="post" enctype="multipart/form-data">
        选择文件：
        <input type="file" name="file" accept=".zip,.rar,.bz2,.gz">
        <input type="submit" value="上传">
    </form>
</div>