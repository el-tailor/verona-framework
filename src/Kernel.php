<?php

namespace App;

use Verona\Component\HttpKernel\BaseKernel;

class Kernel extends BaseKernel {

    public function __construct(string $dir)
    {
        parent::__construct($dir);
    }

}