<?php

declare(strict_types=1);

namespace Migration;

use Cycle\Migrations\Migration;

class OrmDefault8cabe433a5da215b66a57e05a3a52432 extends Migration
{
    protected const DATABASE = 'default';

    public function up(): void
    {
        $this->table('posts')
        ->addColumn('id', 'primary', ['nullable' => false, 'defaultValue' => null])
        ->addColumn('title', 'string', ['nullable' => false, 'defaultValue' => null, 'size' => 255])
        ->addColumn('text', 'string', ['nullable' => false, 'defaultValue' => null, 'size' => 255])
        ->setPrimaryKeys(['id'])
        ->create();
    }

    public function down(): void
    {
        $this->table('posts')->drop();
    }
}
