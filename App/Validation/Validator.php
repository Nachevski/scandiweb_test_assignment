<?php

namespace App\Validation;

use App\Database\Database;
use App\Validation\Request;

class Validator
{
    public static function validate($requests)
    {
        $status = true;
        $notifications = [];

        foreach ($requests as $input => $request) {
            $activeRules = explode('|', Request::getRules($input));
            foreach ($activeRules as $rule) {
                if ($rule == 'unique') {
                    if (!Database::isUnique($input, $request)) {
                        $notifications[$input] = Request::getNotification($rule);
                        $status = false;
                    }
                    continue;
                }
                $regex = Request::getPattern($rule);
                if (preg_match_all($regex, $request)) {
                    $notifications[$input] = Request::getNotification($rule);
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