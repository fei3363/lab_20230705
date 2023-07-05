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

?>
