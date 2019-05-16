<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMonthsToOrdersTable extends Migration
{
   
    public function up()
    {
        Schema::table('order', function (Blueprint $table) {
          $table->string('month');
        });
    }
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
        $table->dropColumn('month');
        });
    }
}
