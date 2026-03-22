<?php

$dir = 'database/migrations';

$migrations = [
    '2024_01_01_000001_create_users_table.php' => <<<EOT
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint \$table) {
            \$table->id();
            \$table->string('name');
            \$table->string('email')->unique();
            \$table->timestamp('email_verified_at')->nullable();
            \$table->string('password');
            \$table->boolean('is_admin')->default(false);
            \$table->rememberToken();
            \$table->timestamps();
            \$table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
EOT,

    '2024_01_01_000002_create_password_reset_tokens_table.php' => <<<EOT
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('password_reset_tokens', function (Blueprint \$table) {
            \$table->string('email')->primary();
            \$table->string('token');
            \$table->timestamp('created_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('password_reset_tokens');
    }
};
EOT,

    '2024_01_01_000003_create_sessions_table.php' => <<<EOT
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sessions', function (Blueprint \$table) {
            \$table->string('id')->primary();
            \$table->foreignId('user_id')->nullable()->index();
            \$table->string('ip_address', 45)->nullable();
            \$table->text('user_agent')->nullable();
            \$table->longText('payload');
            \$table->integer('last_activity')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
EOT,

    '2024_01_01_000004_create_cache_table.php' => <<<EOT
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cache', function (Blueprint \$table) {
            \$table->string('key')->primary();
            \$table->mediumText('value');
            \$table->integer('expiration');
        });

        Schema::create('cache_locks', function (Blueprint \$table) {
            \$table->string('key')->primary();
            \$table->string('owner');
            \$table->integer('expiration');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cache_locks');
        Schema::dropIfExists('cache');
    }
};
EOT,

    '2024_01_01_000005_create_jobs_table.php' => <<<EOT
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint \$table) {
            \$table->id();
            \$table->string('queue')->index();
            \$table->longText('payload');
            \$table->unsignedTinyInteger('attempts');
            \$table->unsignedInteger('reserved_at')->nullable();
            \$table->unsignedInteger('available_at');
            \$table->unsignedInteger('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
EOT,

    '2024_01_01_000006_create_job_batches_table.php' => <<<EOT
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('job_batches', function (Blueprint \$table) {
            \$table->string('id')->primary();
            \$table->string('name');
            \$table->integer('total_jobs');
            \$table->integer('pending_jobs');
            \$table->integer('failed_jobs');
            \$table->longText('failed_job_ids');
            \$table->mediumText('options')->nullable();
            \$table->integer('cancelled_at')->nullable();
            \$table->integer('created_at');
            \$table->integer('finished_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_batches');
    }
};
EOT,

    '2024_01_01_000007_create_failed_jobs_table.php' => <<<EOT
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('failed_jobs', function (Blueprint \$table) {
            \$table->id();
            \$table->string('uuid')->unique();
            \$table->text('connection');
            \$table->text('queue');
            \$table->longText('payload');
            \$table->longText('exception');
            \$table->timestamp('failed_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('failed_jobs');
    }
};
EOT,

    '2024_01_01_000008_create_locations_table.php' => <<<EOT
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('locations', function (Blueprint \$table) {
            \$table->id();
            \$table->string('name');
            \$table->string('address');
            \$table->string('phone')->nullable();
            \$table->string('image_url')->nullable();
            \$table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
EOT,

    '2024_01_01_000009_create_categories_table.php' => <<<EOT
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint \$table) {
            \$table->id();
            \$table->string('name');
            \$table->string('slug')->unique();
            \$table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
EOT,

    '2024_01_01_000010_create_brands_table.php' => <<<EOT
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('brands', function (Blueprint \$table) {
            \$table->id();
            \$table->string('name');
            \$table->string('slug')->unique();
            \$table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
EOT,

    '2024_01_01_000011_create_products_table.php' => <<<EOT
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint \$table) {
            \$table->id();
            \$table->string('name');
            \$table->string('slug')->unique();
            \$table->text('description')->nullable();
            \$table->decimal('price', 10, 2)->default(0);
            \$table->decimal('discount_price', 10, 2)->nullable();
            \$table->decimal('deposit_amount', 10, 2)->nullable();
            \$table->decimal('monthly_payment', 10, 2)->nullable();
            \$table->integer('stock')->default(0);
            \$table->string('image')->nullable();
            \$table->foreignId('category_id')->nullable()->constrained()->onDelete('cascade');
            \$table->foreignId('brand_id')->nullable()->constrained()->onDelete('cascade');
            \$table->boolean('is_featured')->default(false);
            \$table->timestamp('deal_end_time')->nullable();
            \$table->timestamps();
            \$table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
EOT,

    '2024_01_01_000012_create_orders_table.php' => <<<EOT
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint \$table) {
            \$table->id();
            \$table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            \$table->decimal('total_amount', 10, 2);
            \$table->string('status')->default('pending');
            \$table->string('payment_reference')->nullable();
            \$table->timestamps();
            \$table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
EOT,

    '2024_01_01_000013_create_order_items_table.php' => <<<EOT
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint \$table) {
            \$table->id();
            \$table->foreignId('order_id')->constrained()->onDelete('cascade');
            \$table->foreignId('product_id')->nullable()->constrained()->onDelete('cascade');
            \$table->integer('quantity')->default(1);
            \$table->decimal('price', 10, 2);
            \$table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
EOT,

    '2024_01_01_000014_create_carts_table.php' => <<<EOT
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('carts', function (Blueprint \$table) {
            \$table->id();
            \$table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            \$table->string('guest_token')->nullable()->index();
            \$table->string('status')->default('active');
            \$table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
EOT,

    '2024_01_01_000015_create_cart_items_table.php' => <<<EOT
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cart_items', function (Blueprint \$table) {
            \$table->id();
            \$table->foreignId('cart_id')->constrained()->onDelete('cascade');
            \$table->foreignId('product_id')->nullable()->constrained()->onDelete('cascade');
            \$table->string('name');
            \$table->decimal('price', 10, 2);
            \$table->integer('quantity')->default(1);
            \$table->string('image')->nullable();
            \$table->string('slug')->nullable();
            \$table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
EOT,

    '2024_01_01_000016_create_wishlists_table.php' => <<<EOT
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wishlists', function (Blueprint \$table) {
            \$table->id();
            \$table->foreignId('user_id')->constrained()->onDelete('cascade');
            \$table->foreignId('product_id')->constrained()->onDelete('cascade');
            \$table->timestamps();

            \$table->unique(['user_id', 'product_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wishlists');
    }
};
EOT,

    '2024_01_01_000017_create_homepage_settings_table.php' => <<<EOT
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('homepage_settings', function (Blueprint \$table) {
            \$table->id();
            \$table->string('key')->unique();
            \$table->text('value')->nullable();
            \$table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('homepage_settings');
    }
};
EOT,

    '2024_01_01_000018_create_testimonials_table.php' => <<<EOT
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('testimonials', function (Blueprint \$table) {
            \$table->id();
            \$table->string('client_name');
            \$table->text('content');
            \$table->string('image_url')->nullable();
            \$table->integer('rating')->default(5);
            \$table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
EOT
];

foreach ($migrations as $file => $content) {
    file_put_contents($dir . '/' . $file, $content);
}

echo "Migrations created successfully.\n";
