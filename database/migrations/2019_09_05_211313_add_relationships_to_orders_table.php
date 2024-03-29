<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->integer('customer_id')->unsigned()->change();
            $table->foreign('customer_id')->references('id')->on('customers')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->change();
            $table->foreign('user_id')->references('id')->on('customers')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('order_customer_id_foreign');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropIndex('order_customer_id_foreign');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->integer('customer_id')->change();
        });


        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('order_user_id_foreign');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropIndex('order_user_id_foreign');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->integer('user_id')->change();
        });
    }
}
