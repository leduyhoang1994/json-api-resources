<?php

use Eav\Attribute;
use Eav\EntityAttribute;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketEntityAttributes040732 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Attribute::add([
            'attribute_code' => 'lead_id',
            'entity_code' => 'ticket',
            'backend_class' => '',
            'backend_type' => 'static',
            'backend_table' => '',
            'frontend_class' => '',
            'frontend_type' => 'text',
            'frontend_label' => 'Lead',
            'source_class' => '',
            'default_value' => '',
            'is_required' => 0,
            'is_filterable' => 0,
            'is_searchable' => 0,
            'required_validate_class' => ''
        ]);

        Attribute::add([
            'attribute_code' => 'status',
            'entity_code' => 'ticket',
            'backend_class' => '',
            'backend_type' => 'static',
            'backend_table' => '',
            'frontend_class' => '',
            'frontend_type' => 'select',
            'frontend_label' => 'Status',
            'source_class' => '',
            'default_value' => '',
            'is_required' => 0,
            'is_filterable' => 0,
            'is_searchable' => 0,
            'required_validate_class' => '',
            'options' => [
                '1' => "Open",
                '0' => "Closed"
            ]
        ]);

        Attribute::add([
            'attribute_code' => 'customer_id',
            'entity_code' => 'ticket',
            'backend_class' => '',
            'backend_type' => 'static',
            'backend_table' => '',
            'frontend_class' => '',
            'frontend_type' => 'text',
            'frontend_label' => 'Customer',
            'source_class' => '',
            'default_value' => '',
            'is_required' => 0,
            'is_filterable' => 0,
            'is_searchable' => 0,
            'required_validate_class' => ''
        ]);

        Attribute::add([
            'attribute_code' => 'current_agent_id',
            'entity_code' => 'ticket',
            'backend_class' => '',
            'backend_type' => 'static',
            'backend_table' => '',
            'frontend_class' => '',
            'frontend_type' => 'text',
            'frontend_label' => 'Current Agent',
            'source_class' => '',
            'default_value' => '',
            'is_required' => 0,
            'is_filterable' => 0,
            'is_searchable' => 0,
            'required_validate_class' => ''
        ]);

        Attribute::add([
            'attribute_code' => 'current_level_id',
            'entity_code' => 'ticket',
            'backend_class' => '',
            'backend_type' => 'static',
            'backend_table' => '',
            'frontend_class' => '',
            'frontend_type' => 'text',
            'frontend_label' => 'Current Level',
            'source_class' => '',
            'default_value' => '',
            'is_required' => 0,
            'is_filterable' => 0,
            'is_searchable' => 0,
            'required_validate_class' => ''
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Attribute::remove([
            'attribute_code' => 'lead_id',
            'entity_code' => 'ticket',
        ]);

        Attribute::remove([
            'attribute_code' => 'customer_id',
            'entity_code' => 'ticket',
        ]);

        Attribute::remove([
            'attribute_code' => 'current_agent_id',
            'entity_code' => 'ticket',
        ]);

        Attribute::remove([
            'attribute_code' => 'current_level_id',
            'entity_code' => 'ticket',
        ]);

    }
}
