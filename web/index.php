<?php
// インデックスファイル（VertualHostで遷移するルートファイル）

require '../bootstrap.php';
require '../MiniBlogApplication.php';

$app = new MiniBlogApplication(false);
$app->run();

?>