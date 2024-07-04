<?php
// 数据库连接配置
$host = 'mysql';
$dbname = 'foo';
$user = 'www';
$pass = '123456';

try {
	// 创建 PDO 实例连接数据库
	$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);

	// 设置错误模式为异常
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// 编写 SQL 查询语句
	$sql = 'show tables';

	// 预处理 SQL 语句
	$stmt = $pdo->prepare($sql);

	// 执行查询
	$stmt->execute();

	// 获取查询结果
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

	// 打印结果
	foreach ($results as $row) {
		print_r($row);
	}

} catch (Throwable $e) {
	echo '数据库连接失败: ' . $e->getMessage();
}