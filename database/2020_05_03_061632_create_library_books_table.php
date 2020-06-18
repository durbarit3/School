<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibraryBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('library_books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('book_no');
            $table->string('isbn_no');
            $table->string('publisher');
            $table->string('author');
            $table->string('subject');
            $table->string('Rack_no');
            $table->string('qty');
            $table->string('book_price');
            $table->string('description');
            $table->string('deleted_by')->nullable();
            $table->string('deleted_at')->nullable();
            $table->string('deleted_status')->nullable();
            $table->string('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('library_books');
    }
}
