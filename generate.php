<?php
$blocks = [
	[
		// Place this block on every 10th block until 100
		'from' => [1, 0, '100/10'],
		'to' => null,
		'block' => 'redstone_torch',
	],
	[
		'from' => [0, -100, '100/10'],
		'to' => [0, -1, '100/10'],
		'block' => 'cut_sandstone'

	]

];
// Run
$generator = new Generate();
$generator->run($blocks);


class Generate
{
	protected array $commands = [];
	public function run(array $blocks)
	{

		foreach ($blocks as $block) {
			$this->fillBlocks(...$block);
		}

		// Echo each command
		array_walk($this->commands, function ($command) {
			echo $command . PHP_EOL;
		});
	}

	/** Return a /fill command for blocks at coordinates
	 *
	 * @param $from - array coordinates start
	 * @param $block - Block name
	 * @param $to - array coordinates end (if emtpy, $from is used to just set)
	 */
	protected function fillBlocks($from, $block, $to = null)
	{
		// TODO do the same for $to
		foreach ($from as $pos => $fr) {
			if (str_contains(haystack: $fr, needle: "/")) {
				// This coordinate at $post contains a slash, divide into steps
				// Create new $from and $to
				$froms = [];
				$subFrom = $from;
				$parts = explode("/", $fr);
				$limit = $parts[0]; // Limit is before slash
				$stepSize = $parts[1]; // Step size is after slash
				if ($stepSize > $limit) {
					throw new Exception("Invalid coordinates, stepsize `" . $stepSize . "` may not be larger than limit `" . $limit . "`, trying to create `" . $block . "`");
				}
				// TODO if $limit is negative, loop does not run
				for ($i = 0; $i < $limit; $i += $stepSize) {
					// Overwrite from coordinate with simple line here
					$subFrom[$pos] = $i;
					$froms[] = $subFrom;
				}
				// Then run each subfrom as its own command
				foreach ($froms as $subFromArray) {
					// Iterate same method again but with newly adjusted 
					$this->fillBlocks(from: $subFromArray, block: $block, to: $to);
				}

			}
		}

		//var_dump("Second iteration with args: ", func_get_args());
		$command = 'fill';

		// Add FROM coordinates
		$command .= $this->coords($from);

		// Add TO coordinates
		// if $to was passed, use it, otherwise reuse $from to place one block
		$command .= $this->coords($to ?? $from);

		// Add block (all blocks have this prefix)
		$command .= ' minecraft:' . $block;

		$this->commands[] = $command;
		//var_dump("Added command `" . $command . "` to commands array", $this->commands);die;
	}

	// Convert coordinates array into string
	protected function coords(array $coords)
	{
		$coord = '';
		if (sizeof($coords) < 3) {
			throw new Exception("Invalid Coordinates!");
		}
		foreach ($coords as $c) {
			$coord .= ' ~'; // Always start at user
			// Skip zero
			if ($c) {
				$coord .= $c;
			}
		}
		return $coord;
	}
}
