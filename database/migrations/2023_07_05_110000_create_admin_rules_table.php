<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Obelaw\Framework\Base\MigrationBase;

return new class extends MigrationBase
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->prefix . 'admin_rules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained($this->prefix . 'admins')->cascadeOnDelete();
            $table->foreignId('rule_id')->constrained($this->prefix . 'rules')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->prefix . 'admin_rules');
    }
};
