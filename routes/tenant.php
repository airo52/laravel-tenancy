<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
require __DIR__.'/tenancy/public.php';
require __DIR__.'/tenancy/shared.php';


?>