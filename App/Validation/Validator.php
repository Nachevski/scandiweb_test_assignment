<?php

namespace App\Validation;

use App\Products\ProductFactory;
use App\Validation\ProductRequest;

class Validator
{
    private $productRequests;
    private $productFactory;

    public function __construct()
    {
        $this->productFactory = new ProductFactory();
        $this->productRequests = new ProductRequest();
    }

    public function validate($requests)
    {
        $status = true;
        $notifications = [];

        foreach ($requests as $input => $request) {
            $activeRules = explode('|', $this->productRequests->getRules($input));
            foreach ($activeRules as $rule) {
                if ($rule == 'unique') {
                    if (!$this->productFactory->isUnique($input, $request)) {
                        $notifications[$input] = $this->productRequests->getNotification($rule);
                        $status = false;
                    }
                    continue;
                }
                $regex = $this->productRequests->getPattern($rule);
                if (preg_match_all($regex, $request)) {
                    $notifications[$input] = $this->productRequests->getNotification($rule);
                    $status = false;
                    break;
                }
            }
        }
        if ($status) {
            $validateResults['status'] = true;
            return $validateResults;
        }
        $validateResults['status'] = false;
        $validateResults['errors'] = $notifications;
        return $validateResults;
    }
}