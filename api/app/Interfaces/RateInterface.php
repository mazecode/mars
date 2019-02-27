<?php 

use App\Models\Discount;

interface RateInterface
{
    function total() : double;
    /**
     * Discount[]
     */
    function obtainDiscount() : array;
    function calcRate() : double;
    function hasDiscount() : boolean;
}