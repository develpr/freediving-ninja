<?php namespace Develpr\Freediving;

class LogProcessor {

    const FEET_IN_METER = .3048;

//    protected
    protected function feetToMeters($feet)
    {
        return $feet * self::FEET_IN_METER;
    }

    protected function metersToFeet($meters)
    {
        return $meters / self::FEET_IN_METER;
    }

    protected function fahrenheitToCelsius($fahrenheit)
    {
        return $fahrenheit - 32 / 1.8;
    }

    protected function celsiusToFahrenheit($celsius)
    {
        return $celsius * 1.8 + 32;
    }

    
    

}