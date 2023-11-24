<?php

namespace App\Validation;

class Request
{
    private static $rules = [
        'sku' => 'required|unique',
        'name' => 'required',
        'price' => 'required|numeric',
        'size' => 'required|numeric',
        'productType' => 'required',
        'weight' => 'required|numeric',
        'height' => 'required|numeric',
        'width' => 'required|numeric',
        'length' => 'required|numeric',
    ];
    private static $notifications = [
        'unique' => 'SKU already exist! It must be UNIQUE!',
        'required' => 'Please, submit required data',
        'numeric' => 'Please, provide the data of indicated type'
    ];

    private static $patterns = [
        'required' => '(^$)',
        'numeric' => '/([^0-9])([^,.]{0})$/'
    ];

    public static function getRules($request)
    {
        return self::$rules[$request];
    }

    public static function getNotification($request)
    {
        return self::$notifications[$request];
    }

    public static function getPattern($request)
    {
        return self::$patterns[$request];
    }
}