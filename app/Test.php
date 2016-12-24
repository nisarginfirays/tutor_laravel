<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    public function __construct()
    {
    	echo "Constructor method from Test model";
    }
}
