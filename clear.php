<?php
    require __DIR__ . '/vendor/autoload.php';
    use Phpfastcache\CacheManager;

    $InstanceCache = CacheManager::getInstance('Sqlite');
    if ($InstanceCache->clear()) {
        echo 'Cache successfully cleared';
    } else {
        echo 'Cache could not be cleared';
    }
?>
