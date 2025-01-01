<?php
$hostname = "localhost:3306";  // اسم المضيف
$username = "root";       // اسم المستخدم الافتراضي في XAMPP
$password = "tojan";           // كلمة المرور الافتراضية (فارغة في XAMPP)
$database = "ghors";      // اسم قاعدة البيانات

// محاولة الاتصال
$conn = mysqli_connect($hostname, $username, $password, $database);

// التحقق من الاتصال
if (!$conn) {
    die("فشل الاتصال: " . mysqli_connect_error());
}

?>
