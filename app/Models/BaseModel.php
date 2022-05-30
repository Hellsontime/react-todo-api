<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use HasFactory;

    /**
     * @param array $body
     * @return array
     */

    public function setFromArray(array $body) {
        $clearBody = [];

        foreach ($body as $key => $value) {
            if (in_array($key, $this->getFillable())) {
                $clearBody[$key] = $value;
            }
        }
        return $clearBody;
    }
}
