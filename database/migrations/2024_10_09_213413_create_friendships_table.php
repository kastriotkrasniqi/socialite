<?php

use App\Enums\FriendshipStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('friendships', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->index()->constrained('users')->onDelete('cascade');
            $table->foreignId('friend_id')->index()->constrained('users')->onDelete('cascade');

            $table->string('status')->default(FriendshipStatus::PENDING->value);

            $table->timestamps();

            $table->unique(['user_id', 'friend_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('friendships');
    }
};
