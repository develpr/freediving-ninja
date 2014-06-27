// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
//$(document).foundation();

var sampleDive = new SampleDive();

var chart = AmCharts.makeChart("chartdiv", {
	"type": "serial",
	"theme": "none",
	"marginLeft": 0,
	"marginRight": 0,
	"marginTop": 0,
	"marginBottom": 0,
	"dataProvider": sampleDive.getDiveData().points,
	"valueAxes": [{
		"axisAlpha": 0,
		"gridAlpha": 0
	}],
	"graphs": [{
		"fillAlphas": 1,
		"lineColor": "#289eaf",
		"negativeFillColors": "#289eaf",
		"negativeLineColor": "#289eaf",
		"showBalloon": false,
		"type": "smoothedLine",
		"valueField": "depth"
	}],
	"marginTop": 0,
	"marginRight": 0,
	"marginLeft": 0,
	"marginBottom": 0,
	"autoMargins": false,
	"categoryField": "time",
	"categoryAxis": {
		"axisAlpha": 0,
		"gridAlpha": 0
	}
});

