<?php

use Eav\Attribute;
use Eav\EntityAttribute;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketEntityAttributesMap040732 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        			
			EntityAttribute::map([
				'attribute_code' => 'lead_id',
				'entity_code' => 'ticket',
				'attribute_set' => 'Default',
				'attribute_group' => 'General'
			]);
			
			EntityAttribute::map([
				'attribute_code' => 'customer_id',
				'entity_code' => 'ticket',
				'attribute_set' => 'Default',
				'attribute_group' => 'General'
			]);
			
			EntityAttribute::map([
				'attribute_code' => 'current_agent_id',
				'entity_code' => 'ticket',
				'attribute_set' => 'Default',
				'attribute_group' => 'General'
			]);
			
			EntityAttribute::map([
				'attribute_code' => 'current_level_id',
				'entity_code' => 'ticket',
				'attribute_set' => 'Default',
				'attribute_group' => 'General'
			]);
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        			
			EntityAttribute::unmap([
				'attribute_code' => 'lead_id',
				'entity_code' => 'ticket',
			]);
			
			EntityAttribute::unmap([
				'attribute_code' => 'customer_id',
				'entity_code' => 'ticket',
			]);
			
			EntityAttribute::unmap([
				'attribute_code' => 'current_agent_id',
				'entity_code' => 'ticket',
			]);
			
			EntityAttribute::unmap([
				'attribute_code' => 'current_level_id',
				'entity_code' => 'ticket',
			]);

    }
}
