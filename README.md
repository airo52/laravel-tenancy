# laravel-tenancy
This is a simple setup for any one who might be interested to build a SAAS APPLICATION WITH LARAVEL


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel Tenancy

This Laravel tenancy app gives anyone interested in developing A SOFTWARE AS A SERVICE  a quick start

This setup has the following implemented by default:

- Database::Postgresql
- The software is subdomain based i.e tenants are accessed using their subdomains
- Urls are simplified into public urls and shared urls

## PUBLIC URLS
  To register public urls:
laravel tenancy
├── app
│   ├── Http
│   │   ├── Controllers
│   │   ├── Models
│   │   └── ...
│   ├── Console
│   ├── Providers
├── routes
      ├── tenancy
           ├── public.php
                Route::domain('localhost')->group(function () {
                   Route::get('/', function () {
                  return 'register your public urls/views here';
                    });
                 });

## TENANT URLS i.e subdomain endpoints
   To register tenant urls:
   - use the default api.php file :
├── app
│   ├── Http
│   │   ├── Controllers
│   │   ├── Models
│   │   └── ...
│   ├── Console
│   ├── Providers
├── routes
     ├──api.php

## Register tenants 
     you can create tenants using the following code modify to suite your needs

   $tenant1 = App\Models\Tenant::create(['id' => 'foo']);
   $tenant1->domains()->create(['domain' => 'foo.localhost']);
     >>>
   $tenant2 = App\Models\Tenant::create(['id' => 'bar']);
   $tenant2->domains()->create(['domain' => 'bar.localhost']);     
## create tenant users
   App\Models\Tenant::all()->runForEach(function () {
    App\Models\User::factory()->create();
   });

## migrations 
    For tenants::
├── app
│   ├── Http
│   │   ├── Controllers
│   │   ├── Models
│   │   └── ...
│   ├── Console
│   ├── Providers
│   └── ...
├── config
├── database
│   ├── migrations
        ├── tenants
            ---- all the migration in this schema will go to tenant schemas


      FOR public schema::
├── app
│   ├── Http
│   │   ├── Controllers
│   │   ├── Models
│   │   └── ...
│   ├── Console
│   ├── Providers
│   └── ...
├── config
├── database
│   ├── migrations
        ---migration on the route directory---                  
     
   