<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('detail');
            $table->enum('type', ['Bug', 'Enhancement', 'Suggestion', 'Question', 'Other']);
            $table->enum('category', ['Uncategorized', 'Billing', 'Order', 'Repayment']);
            $table->enum('priority', ['Low', 'Medium', 'High', 'Lowest', 'Highest']);
            $table->string('bug_url')->nullable();
            $table->string('bug_source')->nullable();
            $table->string('estimate_timeline')->nullable();
            $table->string('suggestion_type')->nullable();
            $table->enum('department', ['Billing', 'Order', 'Other'])->nullable();
            $table->string('issue_image')->nullable();
            $table->string('status')->nullable();
            $table->unsignedBigInteger('user_id'); // Assuming a foreign key to the users table
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
