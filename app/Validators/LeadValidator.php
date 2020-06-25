<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class LeadValidator.
 *
 * @package namespace App\Validators;
 */
class LeadValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
        	'name' => 'required|string',
	        'phone' => 'required|string',
	        'lead_date' => 'required|date',
	        'email' => 'email|nullable',
        ],
        ValidatorInterface::RULE_UPDATE => [
	        'name' => 'string',
	        'phone' => 'string',
	        'lead_date' => 'date',
	        'email' => 'email|nullable',
        ],
    ];
}
