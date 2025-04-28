<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/header.css">
    <title>GS文件包伪协议靶场</title>
</head>
<body>
<div id="goBackIndex" onclick="window.location.href='../index.php'">首页</div>


<div id="formBox">
    <form method="get">
        <label>
            <input name="flag" placeholder="flag{...}" type="text">
        </label>
        <br>
        <input type="submit" value="submit">
    </form>
</div>
<div id="strategy">
    <div id="circle-button" class="circle-button" onclick="toggleCard()">提示</div>
    <div class="card" id="card">
        <?php echo $strategy;?>
    </div>
</div>

<script>
    function toggleCard() {
        var card = document.getElementById("card");
        var circle = document.getElementById("circle-button");
        if (card.classList.contains('show')) {
            card.classList.remove('show');
        } else {
            card.classList.add('show');
        }
        if (circle.innerHTML === '提示') {
            circle.innerHTML = '收起';
        } else {
            circle.innerHTML = '提示';
        }
    }
</script>
</body>