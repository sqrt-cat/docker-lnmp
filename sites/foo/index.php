<?php

$redis = new Redis();

// redis 是 redis 容器 的 link 名
$redis->connect('redis');

$redis->set('foo:name', 'lucy');
echo $redis->get('foo:name');