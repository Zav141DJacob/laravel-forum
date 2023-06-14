<?php

namespace App\Http\Services;

interface Newsletter
{
    public function subscribe(string $email, string $list_id = null);

}
