<?php
    require __DIR__ . '/vendor/autoload.php';
    use JC\Cache\SimpleCache;

    SimpleCache::remove('query');

    if(SimpleCache::exists('query')){
        echo "Could not clear cache";
    } else {
        echo "Cache cleared";
    }
?>
