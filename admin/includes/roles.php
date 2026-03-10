<?php
declare(strict_types=1);

function primary_admin_id(PDO $pdo): ?int
{
    $stmt = $pdo->query("SELECT `id` FROM `register` WHERE `RegisterAs` = 'Admin' ORDER BY `id` ASC LIMIT 1");
    $id = $stmt->fetchColumn();
    if ($id === false) {
        return null;
    }
    $id = (int)$id;
    return $id > 0 ? $id : null;
}

function enforce_single_admin(PDO $pdo): ?int
{
    $primaryId = primary_admin_id($pdo);
    if ($primaryId === null) {
        return null;
    }

    $stmt = $pdo->prepare("UPDATE `register` SET `RegisterAs` = 'User' WHERE `RegisterAs` = 'Admin' AND `id` <> ?");
    $stmt->execute([$primaryId]);

    return $primaryId;
}

function role_for_new_registration(PDO $pdo): string
{
    // Ensure any duplicates are cleaned up first.
    $primaryId = enforce_single_admin($pdo);
    if ($primaryId === null) {
        return 'Admin'; // First-ever account becomes Admin.
    }
    return 'User';
}

