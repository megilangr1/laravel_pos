<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function(Blueprint $table){
            $table->integer('customer_id')->unsigned()->change();
            $table->foreign('cusomers_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('user_id')->unsigned()->change();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order', function(Blueprint $table){
            $table->dropForeign('order_customer_id_foreign');
        });

        Schema::table('order', function(Blueprint $table){
            $table->dropIndex('order_customer_id_foreign');
        });

        Schema::table('order', function(Blueprint $table){
            $table->integer('customer_id')->change();
        });

        Schema::table('users', function(Blueprint $table){
            $table->dropForeign('order_user_id_foreign');
        });

        Schema::table('users', function(Blueprint $table){
            $table->dropIndex('order_customer_id_foreign');
        });

        Schema::table('users', function(Blueprint $table) {
            $table->integer('user_id')->change();
        })
    }
}
