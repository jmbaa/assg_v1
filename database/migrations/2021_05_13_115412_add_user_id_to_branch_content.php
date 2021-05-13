<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToBranchContent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('branch_content', function (Blueprint $table) {
            //
            $table->integer('branch_id')->unsigned()->index()->nullable();
            $table->foreign('branch_id')->references('branchID')->on('branch');
            $table->integer('content_id')->unsigned()->index()->nullable();
            $table->foreign('content_id')->references('contentID')->on('content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('branch_content', function (Blueprint $table) {
            //
            $table->dropColumn('branch_id');
            $table->dropColumn('content_id');
        });
    }
}
