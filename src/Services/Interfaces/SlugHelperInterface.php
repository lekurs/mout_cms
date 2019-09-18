<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 20/08/2018
 * Time: 01:01
 */

namespace App\Services\Interfaces;


interface SlugHelperInterface
{
    /**
     * @param $desi
     * @return mixed
     */
    function replace($desi);
}