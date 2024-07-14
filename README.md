## Metro generator


#### PHP code to generate at interval in a direction
Quick simple PHP script to generate a lot of blocks at intervals
```php
// east
$stepSize = 10;
for($y = 0; $y < 10; $y++){
	$ycoord = $y ? $y*$stepSize : null;
	// Flip for negative (west)
	$ycoord *=-1;
	echo "fill ~$ycoord ~ ~-1 ~$ycoord ~ ~-1 minecraft:redstone_torch"; // TODO replace with setblock 
	echo PHP_EOL;
	echo "fill ~$ycoord ~-100 ~ ~$ycoord ~-1 ~ minecraft:cut_sandstone";
	echo PHP_EOL;
}
```