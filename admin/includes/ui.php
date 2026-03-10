<?php
declare(strict_types=1);

function admin_get_int(string $key, int $default, int $min = PHP_INT_MIN, int $max = PHP_INT_MAX): int
{
    $raw = $_GET[$key] ?? null;
    if (!is_string($raw) && !is_int($raw)) {
        return $default;
    }
    $n = (int)$raw;
    return max($min, min($max, $n));
}

function admin_get_string(string $key, string $default = ''): string
{
    $raw = $_GET[$key] ?? null;
    if (!is_string($raw)) {
        return $default;
    }
    return trim($raw);
}

function admin_qs(array $overrides = []): string
{
    $params = [];
    foreach ($_GET as $k => $v) {
        if (is_string($k)) {
            $params[$k] = $v;
        }
    }

    foreach ($overrides as $k => $v) {
        if ($v === null || $v === '') {
            unset($params[$k]);
        } else {
            $params[$k] = $v;
        }
    }

    $qs = http_build_query($params);
    return $qs === '' ? '' : ('?' . $qs);
}

