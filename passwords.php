<?php
function is_password_valid(string $password): bool {
    $length = strlen($password);

    if ($length < 8) {
        return false;
    }

    for ($i = 0; $i < $length; $i++) {
        if (is_numeric($password[$i])) {
            return true;
        }
    }

    return false;
}
