<?php

declare(strict_types=1);

namespace Cortex\Foundation\Transformers\Backend;

use Cortex\Foundation\Models\Log;
use League\Fractal\TransformerAbstract;

class LogTransformer extends TransformerAbstract
{
    /**
     * @return array
     */
    public function transform(Log $log)
    {
        $route = '';

        if ($log->causer) {
            $class = explode('\\', get_class($log->causer));

            switch ($causer = end($class)) {
                case 'User':
                    $route = route('backend.users.edit', ['user' => $log->causer]);
            }

            $causer = $causer.': '.$log->causer->username ?? $log->causer->name;
        } else {
            $causer = 'System';
        }

        return [
            'id' => (int) $log->id,
            'description' => (string) $log->description,
            'causer' => $causer,
            'causer_route' => $route,
            'properties' => (object) $log->properties,
            'created_at' => (string) $log->created_at,
        ];
    }
}
