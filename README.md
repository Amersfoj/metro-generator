## Metro generator
A simple collection of functions to generate a working powered rail system. Use the functions in chat to create metro tunnels underground or elevated. There is one command for a tunnel in each cardinal direction (north, east et cetera).

Obviously you will need Allow Cheats or simply be in Creative mode which I have been testing it on. 

Spawn a tunnel by calling the functions in chat:
```
/function metro:north
/function metro:east
/function metro:south
/function metro:west
/function metro:station
````

#### PHP code to generate at interval in a direction
Quick simple PHP script to generate a lot of blocks at intervals
```php
// south
$stepSize = 10;
for($y = 0; $y < 10; $y++){
	$ycoord = $y ? $y*$stepSize : null;
	// Flip for negative (north)
	$ycoord *=-1;
	echo str_replace(search: "%s", replace: $ycoord, subject: "fill ~1 ~ ~%s ~1 ~ ~%s minecraft:redstone_torch"); // TODO replace with setblock
	echo PHP_EOL;
	echo str_replace(search: "%s", replace: $ycoord, subject: "fill ~ ~-100 ~%s ~ ~-1 ~%s minecraft:cut_sandstone");
	echo PHP_EOL;
}
```