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
}

// 驗證帳號密碼是否正確，如果正確就輸出 Hello 如果錯誤就輸出帳號密碼錯誤

// 接受表單資料，確認請求的方法是否為 POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 取得表單資料
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL 語法 * 代表所有欄位 FROM 來自 users 資料表  WHERE 條件式
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    // echo $sql; // 可以視情況註解，目的：確認使用者輸入的內容是否有影響到程式邏輯
    // 執行 SQL
    $result = mysqli_query($link, $sql);

    // 取得資料筆數
    $count = mysqli_num_rows($result);

    // 判斷是否有資料
    if ($count == 1) {
        echo "Hello";
        // 日誌輸出
        error_log(date("Y-m-d H:i:s")." ".$_SERVER['REMOTE_ADDR']." ".$_SERVER['HTTP_USER_AGENT']." ".$_SERVER['REQUEST_URI']." ".$_SERVER['REQUEST_METHOD']." ".$_SERVER['QUERY_STRING']." "."帳號：".$_POST['username'] ."密碼：". $_POST['password']."\n", 3, "C:\\xampp\\apache\\logs\\testlog1.log");
    } else {
        echo "帳號密碼錯誤";
        // 日誌輸出
        error_log(date("Y-m-d H:i:s")." ".$_SERVER['REMOTE_ADDR']." ".$_SERVER['HTTP_USER_AGENT']." ".$_SERVER['REQUEST_URI']." ".$_SERVER['REQUEST_METHOD']." ".$_SERVER['QUERY_STRING']." "."帳號：".$_POST['username'] ."密碼：". $_POST['password']."\n", 3, "C:\\xampp\\apache\\logs\\test.log");
    }
}


?>
<!-- HTML 內容 -->
<!-- form 表單標籤 -->

<form action="login.php" method="post">
    <input type="text" name="username" placeholder="請輸入帳號">
    <input type="password" name="password" placeholder="請輸入密碼">
    <input type="submit" value="登入">
</form>
