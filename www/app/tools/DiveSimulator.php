<?php namespace Develpr\Freediving;

/**
 * @property float maxDepth
 * @property float averageTemperature
 * @property float totalDiveTimeMinutes
 * @property float totalDiveTimeSeconds
 * @property int descentRatio
 * @property float startingDepth
 * @property float endingDepth
 * @property float sampleRate
 * @property string temperatureUnit
 * @property string depthUnit
 * @property array points
 */
class DiveSimulator {

    private $diveData;

    public function __construct()
    {
        $this->diveData = new \stdClass();
    }

	public function generateRandomProfile()
    {
        //random dive time between half a minute and 3.5 minutes
        $this->diveData->totalDiveTimeMinutes = rand(0, 3) + 0.5;
        $this->diveData->totalDiveTimeSeconds = floor(60 * $this->diveData->totalDiveTimeMinutes);
        //How deep are we diving?
        $this->diveData->maxDepth = -1 * rand(20, 90);

        //We'll either have an "enjoyable" dive where we dive down not super deep, then swim around a bit, then come up
        $this->diveData->descentRatio = rand(10, 20);
        $this->diveData->ascentRatio = $this->diveData->descentRatio * 0.7;
        $this->diveData->bottomRatio = 100 - $this->diveData->descentRatio - $this->diveData->ascentRatio;
        $this->diveData->startingDepth = 0;
        $this->diveData->startingTime = 0;
        $this->diveData->endingDepth = 0;

        $possibleSampleRates = [2, 1, .5, .25];

        $this->diveData->sampleRate = $possibleSampleRates[array_rand($possibleSampleRates)];
        //Or we'll do a "deep dive" where we spend all time on the descent/ascent
        if (rand(0,3) < 3) {
            $this->diveData->descentRatio = 60;
            $this->diveData->ascentRatio = 38;
            $this->diveData->bottomRatio = 2;
            $this->diveData->maxDepth = $this->diveData->maxDepth * 3;
        }

        $this->diveData->temperatureUnit = 'fahrenheit';
        $this->diveData->averageTemperature = rand(55, 70);

        //most of the time it'll be warmer then the 55 range.
        if(rand(1,5) > 2)
        {
            $this->diveData->averageTemperature = $this->diveData->averageTemperature * 1.1;
        }

        //Should we use F or C?
        if(rand(0,1) == 1){
            $this->diveData->temperatureUnit= 'celsius';
            $this->diveData->averageTemperature = ($this->diveData->averageTemperature - 32) / 1.8;
        }

        //Should the dive data be recorded in feet or meters?
        $this->diveData->depthUnit = "feet";
        if(rand(0,1) == 0)
        {
            $this->diveData->depthUnit = "meters";
            $this->diveData->maxDepth = $this->diveData->maxDepth / 3;
        }

    }

    /**
     * Returns an object containing sample dive data
     *
     * @return \stdClass
     */
    public function getDiveData()
    {
        $this->generateRandomProfile();

		$this->diveData->points = $this->getDivePoints();

		return $this->diveData;

	}


	public function getDivePoints()
    {
        //add a few gentle starting points

        //initial dive state
        $diveState = ['speed' => -0.05, 'acceleration' => -.1, 'depth' => 0, 'time' => 0];
		$times = [];

		for ($currentTime = 0; $currentTime <= $this->diveData->totalDiveTimeSeconds; $currentTime += $this->diveData->sampleRate) {

            $diveState['time'] = $currentTime;
            $diveState = $this->calculateDivePoint($diveState);

            array_push($times, $diveState);

		}

		return $times;
	}


	public function calculateDivePoint($diveState)
    {

//        $previousDepth = $diveState['depth'];
//        $previousAcceleration = $diveState['acceleration'];
//        $previousSpeed = $diveState['speed'];

        $depth = $this->currentEstimatedDepth($diveState['time']);
        $temperature = $this->currentEstimatedTemperature($diveState['time']);

        $previousDepth = $this->currentEstimatedDepth($diveState['time'] - $this->diveData->sampleRate);

        $change = $previousDepth - $depth;
        $speed = $change / $this->diveData->sampleRate;

        $acceleration = 0;

        return [
            "time" => $diveState['time'],
	        "depth" => $depth,
			"speed" => $speed,
			"acceleration" => $acceleration,
            "temperature" => $temperature
	    ];
	}

    private function calculateCompletePercent($time)
    {
        $percentComplete = $time / $this->diveData->totalDiveTimeSeconds * 100;

        return $percentComplete;
    }

    private function currentEstimatedTemperature($time)
    {
        $estimatedTemp = $this->diveData->averageTemperature + rand(0,2);

        if($this->diveData->temperatureUnit == 'celsius')
        {
            $estimatedTemp = ($estimatedTemp - 32) / 1.8;
        }

        return $estimatedTemp;
    }

	private function currentEstimatedDepth($time)
    {

        $percentComplete = $this->calculateCompletePercent($time);

        if($percentComplete >= $this->diveData->descentRatio && $percentComplete <= (100-$this->diveData->ascentRatio)) {

            return $this->diveData->maxDepth;
        }
        else if($percentComplete < $this->diveData->descentRatio) {

            // (x1,y1) = ($this->diveData->startingTime,$this->diveData->startingDepth)
            // (x2,y2) = ($this->diveData->ascentRatio/100 * $this->diveData->totalDiveTimeSeconds, $this->diveData->maxDepth)

            $slope = ($this->diveData->maxDepth - $this->diveData->startingDepth) / (($this->diveData->descentRatio/100 * $this->diveData->totalDiveTimeSeconds) - $this->diveData->startingTime);
			$yIntercept = $this->diveData->startingDepth - ($slope * $this->diveData->startingTime);

			return (($slope * $time) + $yIntercept);
		}
        else{

            // (x1, y1) = ((100-$this->diveData->ascentRatio) * $this->diveData->totalDiveTimeSeconds, $this->diveData->maxDepth)
            // (x2, y2) = ($this->diveData->totalDiveTimeSeconds, $this->diveData->endingDepth)

            $slope = ($this->diveData->endingDepth - $this->diveData->maxDepth) / ($this->diveData->totalDiveTimeSeconds - (((100-$this->diveData->ascentRatio)/100) * $this->diveData->totalDiveTimeSeconds));
            $yIntercept = $this->diveData->endingDepth - ($slope * $this->diveData->totalDiveTimeSeconds);

            return (($slope * $time) + $yIntercept);
        }

    }


}