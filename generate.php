<?php
$blocks = [
	[
		// Place this block on every 10th block until 100
		'from' => [1, 0, '100'],
		'to' => null,
		'block' => 'redstone_torch',
	],
	[
		'from' => [0, -100, '100'],
		'to' => [0, -1, '100/10'],
		'block' => 'cut_sandstone'

	]

];

foreach ($blocks as $block) {
	//$stepSize = 10;
	//for ($y = 0; $y < 10; $y++) {
	//	$ycoord = $y ? $y * $stepSize : null;
		// Flip for negative (north)
	//	$ycoord *= -1;
		echo fillBlocks(...$block);
	//}
}

/** Return a /fill command for blocks at coordinates
 *
 * @param $from - array coordinates start
 * @param $block - Block name
 * @param $to - array coordinates end (if emtpy, $from is used to just set)
 */
function fillBlocks($from, $block, $to = null)
{
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
function coords(array $coords)
{
	$coord = '';
	foreach ($coords as $c) {
		$coord .= ' ~'; // Always start at user
		// Skip zero
		if ($c) {
			$coord .= $c;
		}
	}
	return $coord;
}