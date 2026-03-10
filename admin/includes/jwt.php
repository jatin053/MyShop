<?php
declare(strict_types=1);

function base64url_encode_bytes(string $bytes): string
{
    return rtrim(strtr(base64_encode($bytes), '+/', '-_'), '=');
}

function base64url_decode_bytes(string $b64url): string|false
{
    $b64 = strtr($b64url, '-_', '+/');
    $pad = strlen($b64) % 4;
    if ($pad) {
        $b64 .= str_repeat('=', 4 - $pad);
    }
    return base64_decode($b64, true);
}

function jwt_sign_hs256(array $claims, string $secret): string
{
    $header = ['typ' => 'JWT', 'alg' => 'HS256'];
    $header64 = base64url_encode_bytes(json_encode($header, JSON_UNESCAPED_SLASHES));
    $payload64 = base64url_encode_bytes(json_encode($claims, JSON_UNESCAPED_SLASHES));

    $sig = hash_hmac('sha256', $header64 . '.' . $payload64, $secret, true);
    $sig64 = base64url_encode_bytes($sig);

    return $header64 . '.' . $payload64 . '.' . $sig64;
}

function jwt_verify_hs256(string $jwt, string $secret): array|false
{
    $parts = explode('.', $jwt);
    if (count($parts) !== 3) {
        return false;
    }
    [$h64, $p64, $s64] = $parts;

    $sig = base64url_decode_bytes($s64);
    if ($sig === false) {
        return false;
    }

    $expected = hash_hmac('sha256', $h64 . '.' . $p64, $secret, true);
    if (!hash_equals($expected, $sig)) {
        return false;
    }

    $payloadJson = base64url_decode_bytes($p64);
    if ($payloadJson === false) {
        return false;
    }
    $claims = json_decode($payloadJson, true);
    if (!is_array($claims)) {
        return false;
    }

    $now = time();
    if (isset($claims['nbf']) && is_numeric($claims['nbf']) && $now < (int)$claims['nbf']) {
        return false;
    }
    if (isset($claims['exp']) && is_numeric($claims['exp']) && $now >= (int)$claims['exp']) {
        return false;
    }

    return $claims;
}

function jwt_secret(): string
{
    $secret = getenv('JWT_SECRET') ?: '';
    if ($secret === '') {
        // Fallback for local dev only. Set JWT_SECRET in environment for real usage.
        $secret = 'change-this-secret';
    }
    return $secret;
}

function cookie_base_path(): string
{
    $script = $_SERVER['SCRIPT_NAME'] ?? '/';
    $dir = str_replace('\\', '/', dirname($script));
    if ($dir === '.' || $dir === '') {
        $dir = '/';
    }
    return rtrim($dir, '/') . '/';
}

