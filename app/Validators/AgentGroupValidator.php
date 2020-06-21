<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class AgentGroupValidatorValidator.
 *
 * @package namespace App\Validators;
 */
class AgentGroupValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
        	'name' => 'required|string|unique:App\Models\AgentGroup,name,NULL,id,deleted_at,NULL'
        ],
        ValidatorInterface::RULE_UPDATE => [
	        'name' => 'string|unique:App\Models\AgentGroup,name,NULL,id,deleted_at,NULL'
        ],
    ];
}
