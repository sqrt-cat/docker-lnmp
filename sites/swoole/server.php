<?php

declare (strict_types = 1);

use Swoole\Database\PDOConfig;
use Swoole\Database\PDOPool;
use Swoole\Runtime;

Runtime::enableCoroutine();

$pool = new PDOPool((new PDOConfig)
		->withHost('mysql')
		->withPort(3306)
		->withDbName('test')
		->withCharset('utf8mb4')
		->withUsername('root')
		->withPassword('123456')
);

$http = new Swoole\Http\Server('0.0.0.0', 9501);

$http->on('start', function ($server) {
	echo "Swoole http server is started at http://0.0.0.0:9501\n";
});

$http->on('request', function ($request, $response) use ($pool) {
	$response->header('Content-Type', 'text/plain');

	$pdo = $pool->get();
	$statement = $pdo->prepare('SELECT * FROM `users`');
	if (!$statement) {
		throw new RuntimeException('Prepare failed');
	}
	$result = $statement->execute();
	if (!$result) {
		throw new RuntimeException('Execute failed');
	}
	$result = $statement->fetchAll();
	$pool->put($pdo);

	$response->end(json_encode((array) $result));

});

$http->start();