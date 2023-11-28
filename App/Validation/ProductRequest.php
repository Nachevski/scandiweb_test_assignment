<?php

namespace App\Validation;

class ProductRequest
{
    private $rules = [
        'sku' => 'required|unique',
        'name' => 'required',
        'price' => 'required|numeric',
        'size' => 'required|numeric',
        'productType' => 'required',
        'weight' => 'required|numeric',
        'height' => 'required|numeric',
        'width' => 'required|numeric',
        'length' => 'required|numeric',
        //Add new rules for inputs
    ];
    private $notifications = [
        'unique' => 'SKU already exist! It must be UNIQUE!',
        'required' => 'Please, submit required data',
        'numeric' => 'Please, provide the data of indicated type'
        //Change default notification messages
    ];
    private $patterns = [
        'required' => '(^$)',
        'numeric' => '/([^0-9])([^,.]{0})$/'
        //Add new patterns
    ];

    public function getRules($request)
    {
        return $this->rules[$request];
    }

    public function getNotification($request)
    {
        return $this->notifications[$request];
    }

    public function getPattern($request)
    {
        return $this->patterns[$request];
    }
}