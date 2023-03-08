(function($){
    'use strict'
	$(document).ready(function(){
        var pie = new d3pie("chart", {
            "size": {
                "pieOuterRadius": "60%",
                "canvasWidth"	: 400,
                "canvasHeight"	: 400,
            },
            "data": {
                "smallSegmentGrouping": {
                    "enabled": true,
                    "value": 2,
                },
                "content": [
                    {
                        "label": "Primary",
                        "value": 6,
                        "color": "#007bff"
                    },
                    {
                        "label": "Success",
                        "value": 5,
                        "color": "#28A745"
                    },
                    {
                        "label": "Info",
                        "value": 2,
                        "color": "#17A2B8"
                    },
                    {
                        "label": "Warning",
                        "value": 3,
                        "color": "#FFC107"
                    },
                    {
                        "label": "Danger",
                        "value": 2,
                        "color": "#DC3545"
                    },
                    {
                        "label": "Dark",
                        "value": 3,
                        "color": "#343A40"
                    }
                ]
            },
            "labels": {
                "outer": {
                    "pieDistance": 15
                },
                "mainLabel": {
                    "color": "#222222",
                    "font": "verdana",
                    "fontSize": 14
                },
                "percentage": {
                    "color": "#ffffff",
                    "font": "verdana",
                    "fontSize": 14,
                    "decimalPlaces": 0
                },
                "value": {
                    "color": "#ffffff",
                    "font": "verdana",
                    "fontSize": 14
                },
                "lines": {
                    "enabled": true,
                    "style": "straight"
                },
                "truncation": {
                    "enabled": true
                }
            },
            "effects": {
                "pullOutSegmentOnClick": {
                    "effect": "linear",
                    "speed": 400,
                    "size": 8
                }
            }
        });	
	});
}(jQuery))

