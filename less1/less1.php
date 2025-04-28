<h1>Less--1</h1>
<?php

$strategy = "试试?page=php://filter/read=convert.base64-encode/resource=flag";
include("../header/header.php");

if (isset($_GET['page'])) {
    include($_GET['page']);
}
if (isset($_GET['flag'])) {
    $flag = '';
    $flagUser = $_GET['flag'];
    ob_start();
    include("./flag");
// 获取缓冲区内容并丢弃
    ob_get_clean();
    if (trim($flagUser) == $flag) {
        echo "回答正确！，即将计入第二关！";
        $redirectUrl = "../less2/less2.php?page=mainPage.php";
    } else {
        echo "回答错误!";
        $redirectUrl = "../less1/less1.php?page=mainPage.php";
    }?>
    <script>
    // 使用JavaScript进行延迟跳转
    setTimeout(function () {
        window.location.href = "<?php echo $redirectUrl; ?>";
    }, 1000); // 延迟1秒
    </script>
<?php }





