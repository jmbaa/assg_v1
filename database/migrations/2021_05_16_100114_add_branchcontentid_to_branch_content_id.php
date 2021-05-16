<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBranchcontentidToBranchContentId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('book', function (Blueprint $table) {
            $table->integer('branch_content_id')->unsigned()->index()->nullable();
            $table->foreign('branch_content_id')->references('branchContentID')->on('branch_content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('branch_content_id', function (Blueprint $table) {
            //
            $table->dropColumn('branch_content_id');
        });
    }
}
