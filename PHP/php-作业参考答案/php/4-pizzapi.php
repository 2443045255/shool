<?php
class PizzaPi
{
    public function calculateDoughRequirement($pizzas, $persons)
    {
        // throw new \BadFunctionCallException("Implement the function");
        $grams = $pizzas * (($persons * 20) + 200);
        return $grams;
    }
    public function calculateSauceRequirement($pizzas, $sauceCanVolume)
    {
        // throw new \BadFunctionCallException("Implement the function");
        return $pizzas * 125 / $sauceCanVolume;
    }
    public function calculateCheeseCubeCoverage($dimension, $thickness, $diameter)
    {
        // throw new \BadFunctionCallException("Implement the function");
        $pizzaPi = ($dimension ** 3) / ($thickness * pi() * $diameter);
        $pizzaPi = floor($pizzaPi);
        return $pizzaPi;
    }
    public function calculateLeftOverSlices($pizzas, $friends)
    {
        // throw new \BadFunctionCallException("Implement the function");
        return ($pizzas * 8) % $friends;
    }
}