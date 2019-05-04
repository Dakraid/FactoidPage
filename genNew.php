<?php
    require __DIR__ . '/vendor/autoload.php';

    use Phpfastcache\CacheManager;
    use Phpfastcache\Config\ConfigurationOption;

    CacheManager::setDefaultConfig(new ConfigurationOption([
        'path' => __DIR__ . '/tmp',
    ]));

    class Query {
        public $result = "";
        
        public function getResult() {
            echo $this->result;
        }
        
        function __construct() {
            require __DIR__ . '/sftp.php';

            $db = new SQLite3('Factoids.db');
            $query = $db->query('SELECT * FROM factoids');

            $this->result .= "<table id=\"factTable\" class=\"tablesorter\">";
            $this->result .= "<thead><tr><th class=\"key\">" . 'Key' . "</th><th class=\"fact\">" . 'Factoid' . "</th></tr></thead>";
            $this->result .= "<tbody>";
            while ($row = $query->fetchArray()) {
                $this->result .= "<tr><td class=\"key\">" . $row['key'] . "</td><td class=\"fact\">" . $row['fact'] . "</td></tr>";
            }
            $this->result .= "</tbody>";
            $this->result .= "<tfoot><tr class=\"dark-row\"><th colspan=\"2\"><div class=\"pager\"><button type=\"button\" class=\"first\"><<</button><button type=\"button\" class=\"prev\"><</button><span class=\"pagedisplay\"></span><button type=\"button\" class=\"next\">></button><button type=\"button\" class=\"last\">>></button><select class=\"pagesize\" title=\"Select page size\"><option value=\"10\">10</option><option value=\"20\">20</option><option value=\"30\">30</option><option value=\"40\">40</option></select><select class=\"gotoPage\" title=\"Select page number\"></select></div></th></tr></tfoot>";
            $this->result .= "</table>";
        }
    }

    $InstanceCache = CacheManager::getInstance('Sqlite');

    $key = "query";
    $CachedString = $InstanceCache->getItem($key);

    if (!$CachedString->isHit()) {
        $temp = new Query();
        
        $CachedString->set($temp)->expiresAfter(3600);
        $InstanceCache->save($CachedString);

        echo $CachedString->get()->getResult();
    } else {
        echo $CachedString->get()->getResult();
    }
?>
