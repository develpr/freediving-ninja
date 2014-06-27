function SampleDive()
{
	var diveData = {};	
	
	this.generateRandomProfile = function(){
		//random dive time between half a minute and 3.5 minutes
		diveData.totalDiveTimeMinutes = (Math.random() * 3.5) + 0.5;
		diveData.totalDiveTimeSeconds = Math.floor(60 * diveData.totalDiveTimeMinutes);
		//How deep are we diving?
		diveData.maxDepth = -1 * Math.floor((Math.random() * 50) + 20);
		//We'll either have an "enjoyable" dive where we dive down not super deep, then swim around a bit, then come up
		diveData.descentRatio = Math.floor((Math.random() * 30) + 10);
		diveData.ascentRatio = diveData.descentRatio * 0.7;
		diveData.bottomRatio = 100 - diveData.descentRatio - diveData.ascentRatio;
		diveData.startingDepth = 0;
		diveData.startingTime = 0;
		diveData.endingDepth = 0;

		//Or we'll do a "deep dive" where we spend all time on the descent/ascent
		if (Math.random() < 0.3) {
		    diveData.descentRatio = 60;
		    diveData.ascentRatio = 38;
		    diveData.bottomRatio = 2;
		    diveData.maxDepth = diveData.maxDepth * 3;
		}	
	}
	
	this.getDiveData = function(){
		
		var empty = true;
		for(var prop in diveData) {
	        if(diveData.hasOwnProperty(prop))
	            empty = false;
	    }		
		if(empty == true){
			this.generateRandomProfile();
		}
				
		diveData.points = this.getDivePoints();
		
		return diveData;
		
	}
	
	
	this.getDivePoints = function(){
		//add a few gentle starting points

		//initial dive state
		var diveState = { speed : -0.05, acceloration : -.1, depth:0 };
		var times = [];
		for (currentTime = 0; currentTime <= diveData.totalDiveTimeSeconds; currentTime += 1) {
			
			diveState.time = currentTime;			
			diveState = this.calculateDivePoint(diveState);
			
		    times.push({
				"time"	: diveState.time,
		    	"depth" : diveState.depth
		    });
			
		}
		
		return times;
	}
	
	
	this.calculateDivePoint = function (diveState) {
    	
		var previousDepth = diveState.depth;
		var previousAcceleration = diveState.acceleration;
		var previousSpeed = diveState.speed;
		
		var depth = this.currentEstimatedDepth(diveState.time);
		var speed = 0;
		var acceleration = 0;
    
	    return {
	        "time": diveState.time,
	        "depth": depth,
			"speed": speed,
			"acceleration":acceleration
	    };
	};

	this.currentEstimatedDepth = function(time) {

		var percentComplete = time / diveData.totalDiveTimeSeconds * 100;

		console.log(percentComplete + '%');

		if(percentComplete >= diveData.descentRatio && percentComplete <= (100-diveData.ascentRatio)) {

			console.log('--- ' + diveData.maxDepth);

			return diveData.maxDepth;
		}
		else if(percentComplete < diveData.descentRatio) {

			// (x1,y1) = (diveData.startingTime,diveData.startingDepth)
			// (x2,y2) = (diveData.ascentRatio/100 * diveData.totalDiveTimeSeconds, diveData.maxDepth)

			var slope = (diveData.maxDepth - diveData.startingDepth) / ((diveData.descentRatio/100 * diveData.totalDiveTimeSeconds) - diveData.startingTime)
			var yIntercept = diveData.startingDepth - (slope * diveData.startingTime);
			console.log(yIntercept);
			console.log(slope);
			console.log('\\/  ' + ((slope * time) + yIntercept));
			return ((slope * time) + yIntercept);
		}
		else{

			// (x1, y1) = ((100-diveData.ascentRatio) * diveData.totalDiveTimeSeconds, diveData.maxDepth)
			// (x2, y2) = (diveData.totalDiveTimeSeconds, diveData.endingDepth)

			var slope = (diveData.endingDepth - diveData.maxDepth) / (diveData.totalDiveTimeSeconds - (((100-diveData.ascentRatio)/100) * diveData.totalDiveTimeSeconds));
			var yIntercept = diveData.endingDepth - (slope * diveData.totalDiveTimeSeconds);
			console.log('/\\  ' + ((slope * time) + yIntercept));
			return ((slope * time) + yIntercept);
		}

	}

	
	
}
