<?php
    require __DIR__ . '/vendor/autoload.php';
    use JC\Cache\SimpleCache;

    if(SimpleCache::exists('query')){
        echo "Cache available";
    } else {
        echo "Cache unavailable";
    }
?>
