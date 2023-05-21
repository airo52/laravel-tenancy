<?php

declare(strict_types=1);

use Stancl\Tenancy\Database\Models\Domain;
use Stancl\Tenancy\Database\Models\Tenant;

return [
    'tenant_model' => \App\Models\Tenant::class,
    'id_generator' => Stancl\Tenancy\UUIDGenerator::class,

    'domain_model' => Domain::class,

    'central_domains' => [
        '127.0.0.1',
        'localhost',
      
    ],

    'bootstrappers' => [
        Stancl\Tenancy\Bootstrappers\DatabaseTenancyBootstrapper::class,
        Stancl\Tenancy\Bootstrappers\CacheTenancyBootstrapper::class,
        Stancl\Tenancy\Bootstrappers\FilesystemTenancyBootstrapper::class,
        Stancl\Tenancy\Bootstrappers\QueueTenancyBootstrapper::class,
        // Stancl\Tenancy\Bootstrappers\RedisTenancyBootstrapper::class, // Note: phpredis is needed
    ],

    'database' => [
        'central_connection' => env('DB_CONNECTION', 'central'),

        'template_tenant_connection' => null,

        'prefix' => 'tenant',
        'suffix' => '',

        'managers' => [
            'sqlite' => Stancl\Tenancy\TenantDatabaseManagers\SQLiteDatabaseManager::class,
            'mysql' => Stancl\Tenancy\TenantDatabaseManagers\MySQLDatabaseManager::class,
            'pgsql' => Stancl\Tenancy\TenantDatabaseManagers\PostgreSQLSchemaManager::class,
        ],
        'tenancy' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' =>env('DB_DATABASE'),
            'username' => env('DB_USERNAME', 'tenant_user'),
            'password' => env('DB_PASSWORD', 'tenant_password'),
            'schema' => 'public', // Set the default schema for tenants
        ],
    ],

    'cache' => [
        'tag_base' => 'tenant',
    ],

    'filesystem' => [
        'suffix_base' => 'tenant',
        'disks' => [
            'local',
            'public',
            // 's3',
        ],

        'root_override' => [
            'local' => '%storage_path%/app/',
            'public' => '%storage_path%/app/public/',
        ],

        'suffix_storage_path' => true,

        'asset_helper_tenancy' => true,
    ],

    'redis' => [
        'prefix_base' => 'tenant',
        'prefixed_connections' => [],
    ],

    'features' => [
        // Stancl\Tenancy\Features\UserImpersonation::class,
        // Stancl\Tenancy\Features\TelescopeTags::class,
        // Stancl\Tenancy\Features\UniversalRoutes::class,
        // Stancl\Tenancy\Features\TenantConfig::class,
        // Stancl\Tenancy\Features\CrossDomainRedirect::class,
        // Stancl\Tenancy\Features\ViteBundler::class,
    ],
   
    'routes' => [
        'enabled' => true,
        'hostname_isolation' => true,
        'excluded_domains' => [
            'www',
        ],
        'subdomain_except' => [
            'central',
        ],
    ],

    'migration_parameters' => [
        '--force' => true,
        '--path' => [database_path('migrations/tenant')],
        '--realpath' => true,
    ],

    'seeder_parameters' => [
        '--class' => 'DatabaseSeeder',
    ],
];
