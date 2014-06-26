function sampleDive()
{
	var diveData = {};	
	
	this.generateRandomProfile = function(){
		//random dive time between half a minute and 3.5 minutes
		diveData.totalDiveTimeMinutes = (Math.random() * 3.5) + 0.5;
		diveData.totalDiveTimeSeconds = Math.floor(60 * diveData.totalDiveTimeMinutes);
		//How deep are we diving?
		diveData.maxDepth = Math.floor((Math.random() * 50) + 20);
		//We'll either have an "enjoyable" dive where we dive down not super deep, then swim around a bit, then come up
		diveData.descentTime = Math.floor((Math.random() * 30) + 10);
		diveData.ascentTime = diveData.descentTime * 0.7;
		diveData.bottomTime = 100 - diveData.descentTime - diveData.ascentTime;
		//Or we'll do a "deep dive" where we spend all time on the descent/ascent
		if (Math.random() < 0.3) {
		    diveData.descentTime = 60;
		    diveData.ascentTime = 38;
		    diveData.bottomTime = 2;
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
			console.log("generating");
			this.generateRandomProfile();
		}
				
		diveData.points = this.getDivePoints();
		
		return diveData;
		
	}
	
	
	this.getDivePoints = function(){
		//add a few gentle starting points
		var times = [{"time": 0,"depth": 0},{"time": 1,"depth": -1},{"time": 2,"depth": -1},{"time": 3,"depth": -2},{"time": 4,"depth": -3}];
		
		//initial dive state
		var diveState = { speed : -0.75, acceloration : -.1, depth:-3 };
		
		for (currentTime = 5; currentTime <= diveData.totalDiveTimeSeconds; currentTime += 1) {
			
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
		
		var depth = -1* ((Math.random() * 6) + 5);
		var speed = 0;
		var acceleration = 0;
    
	    return {
	        "time": diveState.time,
	        "depth": depth,
			"speed": speed,
			"acceleration":acceleration
	    };
	};
	
	
}
