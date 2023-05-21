<?php
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use Stancl\Tenancy\Middleware\PreventAccessFromTenantDomains;
Route::domain('localhost')->group(function () {
    Route::get('/', function () {
        return 'register your public urls/views here';
    });
});
