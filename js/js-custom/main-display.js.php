var x1 = 25;

var y1 = 50;

var w1 = 125;

var h1 = 265;


var x2 = 130;

var y2 = 80;

var w2 = 137;

var h2 = 230;


var x3 = 200;

var y3 = 120;

var w3 = 220;

var h3 = 180;


var x4 = 360;

var y4 = 90;

var w4 = 120; 

var h4 = 215;


var x5 = 465;

var y5 = 75;

var w5 = 105;

var h5 = 230;


 
 window.stages = {
           'A Stage': {
            color: 'blue',
			stage: 1,
            x: x1,
			y: y1,
			width: w1,
			height: h1
			
          },
          'B Stage': {
            color: "red",
			stage: 2,
            x: x2,
			y: y2,
			width: w2,
			height: h2
          },
          'C Stage': {
            color: "yellow",
			stage: 3,
            x: x3,
			y: y3,
			width: w3,
			height: h3
          },
          'D Stage': {
            color: "green",
			stage: 4,
            x: x4,
			y: y4,
			width: w4,
			height: h4
          },
		  'E Stage': {
            color: "white",
			stage: 5,
            x: x5,
			y: y5,
			width: w5,
			height: h5
          }
		  
        }


// Stage 1.
		

var stages1Stages = new Array();
stages1Stages[0] = 1;
stages1Stages[1] = 2;
stages1Stages[2] = 3;
stages1Stages[3] = 4;
stages1Stages[4] = 5; 


window.stages1 = buildNewWindowStage(stages1Stages);		
		
		
// Stage 6.		
		
var stages6Stages = new Array();
stages6Stages[0] = 6;
stages6Stages[1] = 7;
stages6Stages[2] = 8;
stages6Stages[3] = 9;
stages6Stages[4] = 10; 


window.stages6 = buildNewWindowStage(stages6Stages);







// Map function to build new areas easily (new groups of enemies)
 
function buildNewWindowStage(stageNumbers)
{
 
var areaIndex = 0;

var windowstage =  jQuery.extend(true, {}, window.stages);
 
for(var key in windowstage) {( function() {

windowstage[key].stage = stageNumbers[areaIndex]; 
 
areaIndex++; 

}());

}
 

return windowstage;
 
}


		
	 // Map functions

      function getData(stages) {
        return stages;
      }
      function drawTooltip(tooltip, x, y, text) {
        tooltip.setText(text);
        var maxRight = 530;
        if(x > maxRight) {
          x = maxRight;
        }
        tooltip.setPosition(x, y);
        tooltip.show();
        tooltip.getLayer().draw();
      }

      window.onload = function() {
        window.stage = new Kinetic.Stage({
          container: "container",
          width: 578,
          height: 325
        });
		
		
        window.shapesLayer = new Kinetic.Layer();
		
	
		
        /*
         * throttle the tooltip layer down a bit
         * so that the tooltip doesn't lag behind the
         * mouse too much on redraw
         */
        window.tooltipLayer = new Kinetic.Layer({
          throttle: 50
        });



		

		/* add image to background */
		 window.imageLayer = new Kinetic.Layer();
		 
		 var imageObj = new Image();
        imageObj.onload = function() {
          var image = new Kinetic.Image({
            x: 0,
            y: 0,
            image: imageObj,
            width: 579,
            height: 327
          });

          // add the shape to the layer
          window.imageLayer.add(image);

          // add the layer to the stage
          window.stage.add(window.imageLayer);
		  
		  window.stage.add(window.shapesLayer);
		  window.stage.add(window.tooltipLayer);
        };
        imageObj.src = "images/main.png";
		
		
        
      
      };					
					
					
	function buildNewStages(stages)
	{
	
			
        window.shapesLayer = new Kinetic.Layer();
		
	
		
        /*
         * throttle the tooltip layer down a bit
         * so that the tooltip doesn't lag behind the
         * mouse too much on redraw
         */
        window.tooltipLayer = new Kinetic.Layer({
          throttle: 50
        });

        // build tooltip
        var tooltip = new Kinetic.Text({
          text: "",
          textFill: "white",
          fontFamily: "Calibri",
          fontSize: 12,
          padding: 5,
          fill: "black",
          visible: false,
          alpha: 0.75
        });

        window.tooltipLayer.add(tooltip);

        // get areas data
        var areas = getData(stages);

        // draw areas
        for(var pubKey in areas) {( function() {
            var key = pubKey;
            var area = areas[key];
            
			var x = area.x;
			var y = area.y;
			
			var w = area.width;
			var h = area.height;

            var shape = new Kinetic.Rect({
              x: x,
			  y: y,
			  width: w,
			  height: h,
              fill: area.color,
              alpha: 0
            });
			
			shape.on("click", function() {		  
			   
			  
			  if( window.MonstersKilled[area.stage] == false) // If gamer hasn't killed the monster yet he can fight him
			    {


                    $('#messages').append('You have not killed any member of this kind of opponent yet.<br />');
                    $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);


			    }
			  
			  else
			    {
			  
			        $('#messages').append('You have already killed a member of this kind of opponent, so if you kill all kinds of opponents, you can go to the gates portal to advance towards the next scene. You can still kill this kind of opponent for farming.<br />');
                    $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);
			  
			  
			    }

                window.MapLock = true; // Lock map (fight screen). This is done, at this point, because first we want the gamer not to be able to choose another area (group of enemies) and then to start the fight.
                fight(area.stage);


            });
			
            shape.on("mouseover", function() {
              this.setAlpha(0.5);
              window.shapesLayer.draw();
            });
            shape.on("mouseout", function() {
              this.setAlpha(0);
              window.shapesLayer.draw();
              tooltip.hide();
              window.tooltipLayer.draw();
            });
            shape.on("mousemove", function() {
              var mousePos = stage.getMousePosition();
              var x = mousePos.x + 5;
              var y = mousePos.y + 10;
              drawTooltip(tooltip, x, y, 'Stage: ' + area.stage);
            });

            window.shapesLayer.add(shape);
          }());
        }

		

		/* add image to background */
		 window.imageLayer = new Kinetic.Layer();
		 
		 var imageObj = new Image();
        imageObj.onload = function() {
          var image = new Kinetic.Image({
            x: 0,
            y: 0,
            image: imageObj,
            width: 579,
            height: 327
          });

          // add the shape to the layer
          window.imageLayer.add(image);

          // add the layer to the stage
          window.stage.add(window.imageLayer);
		  
		  window.stage.add(window.shapesLayer);
		  window.stage.add(window.tooltipLayer);
        };
        imageObj.src = "images/chars.png";
		
	
	
	}
	
function isMapCleared(enemyFirst, enemyLast)
{

// e.g. 1, 10 for map check

var temp;

for(i=enemyFirst; i<=enemyLast; i++)
{
    
	if( window.MonstersKilled[i] == false)
	
		{
	
			temp = false;
	
		}
		
}

    if( temp == false) // If there is at least one opponent alive, then map is not cleared. 
		{
	
			return false;
	
		}
	else
		{

            window.MapNumber = window.MapNumber + 1;

            window.FountainHealth = 0; // Reset Fountain. Now, for the new fountain in the new map, it will be able to be used for two times.

            $("#mapContainerBox").val(window.MapNumber);

			return true;
		
		}

}


function isAreaCleared( enemyFirst, enemyLast)
{

// e.g. 1,5 or 6,10 for area check  

var temp;

for(i=enemyFirst; i<=enemyLast; i++)
{
    
	if( window.MonstersKilled[i] == false)
	
		{
	
			temp = false;
	
		}
		
}

    if( temp == false) // If there is at least one opponent alive, then area is not cleared. 
		{
	
			return false;
	
		}
	else
		{
		
			return true;
		
		}


}


		
function buildStages2(stage)
{


/* Very likely, you don't need to remove them, since they will be overwritten and added to window.stage later
//you won't lose memory

// Remove chars, shapes, tooltips
window.stage.remove(window.imageLayer);
		  
window.stage.remove(window.shapesLayer);

window.stage.remove(window.tooltipLayer);

*/


// build the areas

buildNewStages( eval("window.stages" + stage ) ); 



 

}


function addAdventurerImage()
{

    /* add adventurer image to main display, so that when a gamer is not in a portal, he will see an image (himself) */
    window.adventurerImageLayer = new Kinetic.Layer();

    var imageObj = new Image();
    imageObj.onload = function() {
        var image = new Kinetic.Image({
            x: 0,
            y: 0,
            image: imageObj,
            width: 579,
            height: 327
        });

        // add the shape to the layer
        window.adventurerImageLayer.add(image);

        // add the layer to the stage
        window.stage.add(window.adventurerImageLayer);


    };
    imageObj.src = "images/main.png";

}

function removeAdventurerImage()
{

    window.stage.remove(window.adventurerImageLayer);

}

function fountainOfHealthUses()
    {

        if(window.FountainHealth <2)
        {
            window.FountainHealth = window.FountainHealth + 1;

            window.Health = window.HealthMax;

            $("#healthBarBox").attr("value", window.Health);

        }

        else if (window.FountainHealth == 2 )
            {

                $('#messages').append('You have already used the fountain of health two times in this scene. You get no health bonus.<br />');
                $('#messages').animate({scrollTop: $('#messages').prop("scrollHeight")}, 1);


            }


    }