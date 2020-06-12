<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleAttributeSet extends Migration
{

    protected $saleAttributes = [
        'product_id' => [
            'attribute' => [
                'backend_type' => 'integer',
                'frontend_type' => 'select',
                'frontend_label' => 'Product',
                'is_required' => 0,
            ],
            'map' => [
                'attribute_group' => 'L1'
            ]
        ],
        'package_id' => [
            'attribute' => [
                'backend_type' => 'integer',
                'frontend_type' => 'select',
                'frontend_label' => 'Package',
                'is_required' => 0,
            ],
            'map' => [
                'attribute_group' => 'L1'
            ]
        ],
        'address' => [
            'attribute' => [
                'backend_type' => 'string',
                'frontend_type' => 'text',
                'frontend_label' => 'Address',
                'is_required' => 0,
            ],
            'map' => [
                'attribute_group' => 'L1'
            ]
        ],
        'connection_status' => [
            'attribute' => [
                'backend_type' => 'string',
                'frontend_type' => 'select',
                'frontend_label' => 'Connection Status',
                'options' => [
                    'connectable' => 'Connectable',
                    'disconnectable' => 'Disconnectable'
                ],
                'is_required' => 1,
            ],
            'map' => [
                'attribute_group' => 'L2'
            ]
        ],
        'concern_status' => [
            'attribute' => [
                'backend_type' => 'string',
                'frontend_type' => 'select',
                'frontend_label' => 'Concern Status',
                'options' => [
                    'interested_in' => 'Interested in',
                    'consulted' => 'Consulted',
                    'declined' => 'Declined',
                ],
                'is_required' => 1,
            ],
            'map' => [
                'attribute_group' => 'L3'
            ]
        ],
        'decline_reason' => [
            'attribute' => [
                'backend_type' => 'string',
                'frontend_type' => 'select',
                'frontend_label' => 'Decline Reason',
                'options' => [
                    'price' => 'Price',
                    'place' => 'Place',
                    'time' => 'Time',
                    'capability' => 'Capability'
                ]
            ],
            'map' => [
                'attribute_group' => 'L3'
            ]
        ],
        'studio_id' => [
            'attribute' => [
                'backend_type' => 'integer',
                'frontend_type' => 'select',
                'frontend_label' => 'Studio',
                'is_required' => 1,
                'options' => [
                    '1' => 'test'
                ],
            ],
            'map' => [
                'attribute_group' => 'L4'
            ]
        ],
        'course_id' => [
            'attribute' => [
                'backend_type' => 'integer',
                'frontend_type' => 'select',
                'frontend_label' => 'Course',
                'is_required' => 1,
                'options' => [
                    '1' => 'test'
                ],
            ],
            'map' => [
                'attribute_group' => 'L4'
            ]
        ],
        'payment_acceptance' => [
            'attribute' => [
                'backend_type' => 'integer',
                'frontend_type' => 'select',
                'frontend_label' => 'Payment Acceptance',
                'options' => [
                    'agree' => 'Agree to pay',
                    'decline' => 'Decline to pay'
                ],
                'is_required' => 0,
            ],
            'map' => [
                'attribute_group' => 'L5'
            ]
        ],
        'full_name' => [
            'attribute' => [
                'backend_type' => 'string',
                'frontend_type' => 'text',
                'frontend_label' => 'Full Name',
                'is_required' => 1,
            ],
            'map' => [
                'attribute_group' => 'L5'
            ]
        ],
        'phone' => [
            'attribute' => [
                'backend_type' => 'string',
                'frontend_type' => 'text',
                'frontend_label' => 'Phone',
                'is_required' => 1,
            ],
            'map' => [
                'attribute_group' => 'L5'
            ]
        ],
        'date_of_birth' => [
            'attribute' => [
                'backend_type' => 'date',
                'frontend_type' => 'date',
                'frontend_label' => 'Date of birth',
                'is_required' => 1,
            ],
            'map' => [
                'attribute_group' => 'L5'
            ]
        ],
        'payment_status' => [
            'attribute' => [
                'backend_type' => 'string',
                'frontend_type' => 'select',
                'frontend_label' => 'Payment Status',
                'options' => [
                    'proceed' => 'Proceed to payment',
                    'considering' => 'Considering',
                    'decline' => 'Decline to pay'
                ],
                'is_required' => 1,
            ],
            'map' => [
                'attribute_group' => 'L6'
            ]
        ],
        'payment_method' => [
            'attribute' => [
                'backend_type' => 'string',
                'frontend_type' => 'select',
                'frontend_label' => 'Payment Method',
                'options' => [
                    'cod' => 'COD',
                    'wire_transfer' => 'Wire Transfer'
                ],
                'is_required' => 1,
            ],
            'map' => [
                'attribute_group' => 'L6'
            ]
        ],
        'package_value' => [
            'attribute' => [
                'backend_type' => 'integer',
                'frontend_type' => 'text',
                'frontend_label' => 'Package Value',
                'is_required' => 1,
            ],
            'map' => [
                'attribute_group' => 'L6'
            ]
        ],
        'payment_amount' => [
            'attribute' => [
                'backend_type' => 'integer',
                'frontend_type' => 'text',
                'frontend_label' => 'Payment Amount',
                'is_required' => 1,
            ],
            'map' => [
                'attribute_group' => 'L7'
            ]
        ],
        'current_level' => [
            'attribute' => [
                'backend_type' => 'string',
                'frontend_type' => 'hidden',
                'frontend_label' => 'Current Level',
                'is_required' => 0,
            ],
            'map' => [
                
            ]
        ],
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {
            \Illuminate\Support\Facades\DB::beginTransaction();
            $entityCode = 'ticket';
            $attributeSetName = 'Sale Attribute Set';
            $entity = Eav\Entity::findByCode($entityCode);

            $attributeSet = Eav\AttributeSet::create([
                'attribute_set_name' => $attributeSetName,
                'entity_id' => $entity->entity_id,
            ]);

            $levelGroups = [];
            for ($i = 1; $i <= 8; $i++) {
                $levelGroups[] = Eav\AttributeGroup::create([
                    'attribute_group_name' => 'L' . $i,
                    'attribute_set_id' => $attributeSet->attribute_set_id,
                ]);
            }

            $levelGroups[] = Eav\AttributeGroup::create([
                'attribute_group_name' => 'General',
                'attribute_set_id' => $attributeSet->attribute_set_id,
                'sequence' => 99999
            ]);

            $saleAttributes = $this->saleAttributes;

            foreach ($saleAttributes as $attributeName => $attribute) {
                $defaultAttr = [
                    'attribute_code' => $attributeName,
                    'entity_code' => $entityCode,
                    'backend_class' => null,
                    'backend_type' => 'int',
                    'backend_table' => null,
                    'frontend_class' => null,
                    'frontend_type' => 'select',
                    'frontend_label' => 'Status',
                    'source_class' => null,
                    'default_value' => 0,
                    'is_required' => 0,
                    'is_filterable' => 0,
                    'is_searchable' => 0,
                    'required_validate_class' => null
                ];
                $attr = array_merge($defaultAttr, $attribute['attribute']);
                Eav\Attribute::add($attr);

                $defaultMap = [
                    'attribute_code' => $attributeName,
                    'entity_code' => $entityCode,
                    'attribute_set' => $attributeSetName,
                    'attribute_group' => 'General'
                ];
                $map = array_merge($defaultMap, $attribute['map']);
                Eav\EntityAttribute::map($map);
            }
            \Illuminate\Support\Facades\DB::commit();
        } catch (Exception $exception) {
            \Illuminate\Support\Facades\DB::rollBack();
            throw $exception;
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
