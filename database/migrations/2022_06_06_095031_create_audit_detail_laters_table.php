<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditDetailLatersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audit_detail_laters', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('audit_id')->nullable();
            $table->bigInteger('branch_id')->nullable();
            $table->bigInteger('visit_date')->nullable();
            $table->bigInteger('auditor_id')->nullable();
            $table->bigInteger('disbursed_cases')->nullable();
            $table->bigInteger('sample_selected')->nullable();
            $table->bigInteger('planned_leaves')->nullable();
            $table->bigInteger('no_of_days_cases')->nullable();
            $table->bigInteger('no_of_days_branches')->nullable();
            $table->bigInteger('no_of_days_planning')->nullable();
            $table->bigInteger('no_of_days_execution')->nullable();
            $table->bigInteger('no_of_days_reporting')->nullable();
            $table->bigInteger('total_days')->nullable();
            $table->string('status')->nullable();
            $table->bigInteger('completed_date')->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->timestamps();
            $table->boolean('deleted')->default('0');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audit_detail_laters');
    }
}
