<?php

namespace ApiHelper\Http\Resources;

use Illuminate\Contracts\Validation\Validator;

class Error extends \Illuminate\Http\Resources\Json\JsonResource
{
    /**
     * Create a new resource instance.
     *
     * @param  mixed  $resource
     * @return void
     */
    public function __construct($resource)
    {
        $this->resource = $resource;

        static::withoutWrapping();
    }


    private function formatError($validator)
    {
        $bag = $validator->errors();
        $errors = [];
        foreach ($bag->keys() as $key) {
            $errors[] = $this->errorTemplate($key, $bag->first($key));
        }
        return $errors;
    }

    private function errorTemplate($key, $message)
    {
        return [
            'code' => '102',
            'title' => 'Invalid Attribute',
            'detail' => $message,
            'source' => [ 'pointer' => '/'.str_replace('.', '/', $key) ],
        ];
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "errors" => ($this->resource instanceof Validator)? $this->formatError($this->resource) : [
                $this->resource
            ]
        ];
    }
}
