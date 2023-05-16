<?php

use App\Models\Supporter;

/**
 * Get a subset of active supporters
 */

function supporters($number = 0)
{
    if ($number === 0) {
        return Supporter::getActiveSupporters(Supporter::query()->orderBy("created_at", "ASC")->where("public", true));
    } else {
        return Supporter::getActiveSupporters(Supporter::query()->take($number)->orderBy("created_at", "ASC")->where("public", true));
    }
}

/**
 * Get count of all supporters, public or not
 */
function supporterCount()
{
    return Supporter::getActiveSupporters(Supporter::query())->count();
}
