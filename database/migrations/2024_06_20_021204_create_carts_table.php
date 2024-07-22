<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // CartID INT PRIMARY KEY AUTO_INCREMENT,
        // UserID INT NOT NULL,
        // ProductID INT NOT NULL,
        // Quantity INT NOT NULL,
        // DateAdded TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        // FOREIGN KEY (UserID) REFERENCES Users(UserID),
        // FOREIGN KEY (ProductID) REFERENCES Products(ProductID)
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('cid');
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->foreignId('product_id')->constrained('products', 'id');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
