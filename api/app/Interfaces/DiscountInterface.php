<?php 

use App\Models\Rate;

interface DiscountInterface
{
    function total() : double;
    /**
     * Rate[]
     */
    function obtainRates() : array;
    function calcDiscount() : double;
    function hasRates() : boolean;
}