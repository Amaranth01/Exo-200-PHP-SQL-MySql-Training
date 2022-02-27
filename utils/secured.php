<?php

function issetPostParam (string ... $param): bool {
    foreach ($param as $item) {
        if(!isset($_POST[$item])) {
            return false;
        }
    }
    return true;
}