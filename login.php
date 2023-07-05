<?php

// 測試資料庫是否可以連線
// 資料庫路徑 127.0.0.0.1:3306
// 帳號 testuser 密碼 123456
// 資料庫的名稱 

// 宣告變數
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'testuser');
define('DB_PASSWORD', '123456');
define('DB_NAME', 'testdb');

// 進行連線
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// 確認狀態
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}else{
    echo "連線成功";
}

// 驗證帳號密碼是否正確，如果正確就輸出 Hello 如果錯誤就輸出帳號密碼錯誤

// 取得帳號密碼

?>
<!-- HTML 內容 -->
<!-- form 表單標籤 -->

<form action="login.php" method="post">
    <input type="text" name="username" placeholder="請輸入帳號">
    <input type="password" name="password" placeholder="請輸入密碼">
    <input type="submit" value="登入">
</form>
