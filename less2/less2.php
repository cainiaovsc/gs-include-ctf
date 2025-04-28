<h1>Less--2</h1>

<?php
$strategy = '试试?page=php://input [Post data]:<&quest;php phpinfo();?><br>
?page=data://text/plain;base64,PD9waHAgcGhwaW5mbygpOz8%2b';
include("../header/header.php");
$allowUrlInclude = ini_get("allow_url_include");
if ($allowUrlInclude == "1") {
    echo "allow_url_include=on";
} else {
    echo "deny_url_include=off，请在php.ini中开启allow_url_include=on";
}
if (isset($_GET['page'])) {
    if (!preg_match("/flag/", $_GET['page'])) {
        if (!preg_match("/[*?]/", $_GET['page'])) {
            include($_GET['page']);
        } else {
            echo "不可以使用*？哦allow_url_include:on";
        }
    } else {
        echo "不可以使用flag哦！allow_url_include:on";
    }
}
if (isset($_GET['flag'])) {
    $flag = file_get_contents("./flag");
    $flagUser = $_GET['flag'];
    if (trim($flagUser) == $flag) {
        echo "回答正确！，即将计入第三关！";
        $redirectUrl = "../less3/less3.php?page=mainPage.php";
    } else {
        echo "回答错误!";
        $redirectUrl = "less2.php?page=mainPage.php";
    }?>
    <script>
        // 使用JavaScript进行延迟跳转
        setTimeout(function () {
            window.location.href = "<?php echo $redirectUrl; ?>";
        }, 1000); // 延迟1秒
    </script>
<?php }
?>

