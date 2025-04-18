<?php
// Simple and safe Replit DB wrapper using native REST API

function db_set($key, $value) {
    $url = $_ENV['REPLIT_DB_URL'] . '/' . urlencode($key);
    $value = json_encode($value);
    shell_exec("curl -s -X POST $url -d '$value'");
}

function db_get($key) {
    $url = $_ENV['REPLIT_DB_URL'] . '/' . urlencode($key);
    $value = trim(shell_exec("curl -s $url"));

    if ($value === "null" || $value === "") {
        return null; // Key doesn't exist
    }

    return json_decode($value, true);
}

function db_all() {
    $keys = explode("\n", trim(shell_exec("curl -s " . $_ENV['REPLIT_DB_URL'])));
    $data = [];

    foreach ($keys as $key) {
        $value = db_get($key);
        if ($value !== null) {
            $data[$key] = $value;
        }
    }

    return $data;
}
?>
