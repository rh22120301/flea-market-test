<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyDetailNullableInCommentsTable extends Migration
{
    public function up()
{
    // Schema::table('comments', function (Blueprint $table) {
        // $table->text('detail')->nullable()->change();
    // });
}

public function down()
{
    // Schema::table('comments', function (Blueprint $table) {
    //     $table->text('detail')->nullable(false)->change();
    // });
}

}
