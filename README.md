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
for($y = 0; $y < 10; $y++) {
	$ycoord = $y ? $y * $stepSize : null;
	// Flip for negative (north)
	$ycoord *=-1;
	echo fillBlocks(from: [1, 0, $ycoord], block: "redstone_torch");
	echo fillBlocks(from: [0, -100, $ycoord], to: [0, -1, $ycoord], block: "cut_sandstone");
}

/** Return a /fill command for blocks at coordinates
 *
 * @param $from - array coordinates start
 * @param $block - Block name
 * @param $to - array coordinates end (if emtpy, $from is used to just set)
 */
function fillBlocks($from, $block, $to = null){
	$command = 'fill';
	
	// Add from coordinates
	$command .= coords($from);
	
	// if $to was passed, use it, otherwise reuse $from to place one block
	$command .= coords($to ?? $from);

	// Add block (all blocks have this prefix)
	$command .= ' minecraft:' . $block;
	
	return $command . PHP_EOL;
}

// Convert coordinates array into string
function coords(array $coords) {
	$coord = '';
	foreach($coords as $c) {
		$coord .= ' ~'; // Always start at user
		// Skip zero
		if ($c) {
			$coord .= $c;
		}
	}
	return $coord;
}
```