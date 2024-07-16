<?php
/**
 * 
 * 				N
 * 				| -Z
 * 				|
 *		-X		| 		+X
 *    W ------- O ------- E
 * 				|
 * 				|
 *				| +Z
 * 				S
 * 
 */
$blocks = [
	[
		'label' => "Place redstone torch on every 10th block until 100",
		'from' => [1, 0, '100/10'], // Along positive Z = southwards
		'to' => null, // Leave empty to copy FROM coords along interval
		'block' => 'redstone_torch',
	],
	[
		'label' => "Pillar deep into the ground every 10th block until 100",
		'from' => [0, -100, '100/10'],
		'to' => [0, -1, '100/10'],
		'block' => 'cut_sandstone'
	],
];
// Run
$generator = new Generate();
$generator->run($blocks);


class Generate
{
	protected bool $debug = false;
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
	protected function fillBlocks($from, $block, $to = null, $label = null)
	{
		if ($label) {
			// Add newline and comment
			$this->commands[] = PHP_EOL . "## " . $label;
			$this->logCoords(message: "[" . $label . "]:");
		}
		// Split both coordinates into subcommands if they are intervals
		$subCoords = $this->subCoords($from, $to);
		// If these were converted to intervals, run for only those
		if ($subCoords) {
			foreach ($subCoords as $subFrom) {
				// Iterate same method again but with newly adjusted subfrom
				$this->fillBlocks(
					// Subcoords might return special array with 'from' and 'to' separated
					from: $subFrom['from'] ?? $subFrom,
					block: $block,
					// When subcoord contains 'to', it was edited for interval
					to: $subFrom['to'] ?? $to,
					// Don't pass along Label to group interval commands under group label
				);
			}
		} else {
			// No intervals, add these

			$command = 'fill';

			// Add FROM coordinates
			$command .= $this->coords($from);

			// Add TO coordinates
			// if $to was passed, use it, otherwise reuse $from to place one block
			$command .= $this->coords($to ?? $from);

			// Add block (all blocks have this prefix)
			$command .= ' minecraft:' . $block;

			$this->commands[] = $command;
		}
	}

	// Convert coordinates array into string
	protected function coords(array $coords)
	{
		$coord = '';
		if (sizeof($coords) < 3) {
			throw new Exception("Invalid Coordinates!");
		}
		foreach ($coords as $c) {
			// Validate interval before adding
			if ($this->isInterval($c)) {
				throw new Exception("Invalid Coordinates! Not properly converted: " . var_export($coords, true));
			}
			$coord .= ' ~'; // Always start at user
			// Skip zero
			if ($c) {
				$coord .= $c;
			}
		}
		return $coord;
	}

	protected function subCoords(array $coords, ?array $to = null)
	{
		$subCoords = [];
		foreach ($coords as $pos => $intervalCoord) {
			if ($this->isInterval($intervalCoord)) {
				/** $pos now indicates which axis (0=X, 1=Y, 2=Z) 
				 * X = East (negative X = West)
				 * Y = altitude
				 * Z = south (negative Z = North)
				 */
				// This coordinate at $post contains a slash, divide into steps
				// Create new $from and $to
				$subFrom = $coords;
				$parts = explode("/", $intervalCoord);
				$limit = $parts[0]; // Limit is before slash
				$stepSize = $parts[1]; // Step size is after slash
				if ($stepSize > $limit) {
					throw new Exception("Invalid coordinates: stepsize `" . $stepSize . "` may not be larger than limit `" . $limit . "`");
				}
				// TODO if $limit is negative, loop does not run
				for ($i = 0; $i < $limit; $i += $stepSize) {
					$this->logCoords(message: "Step " . $i . " until limit: " . $limit);
					// Overwrite FROM coordinate with simple line here
					$subFrom[$pos] = $i;

					/** Combine FROM with TO intervals if applicable */
					if ($to) {
						// And TO has interval
						if (str_contains(haystack: $to[$pos], needle: "/")) {
							// And TO has the same interval at the same position
							if ($to[$pos] == $intervalCoord) {
								// Update TO coordinates as well
								$subTo = $to;
								$subTo[$pos] = $i;

								// When TO must be updated, return special array
								$subCoords[] = [
									'from' => $subFrom,
									'to' => $subTo,
								];
							}
						} else {
							throw new Exception("Cannot combine FROM and TO interval coordinates! From: " . $this->printCoords($subFrom) . "; To: " . $this->printCoords($toF));
						}
					} else {
						$this->logCoords(coords: $subFrom, message: "Add these subcoords");
						$subCoords[] = $subFrom;
					}
				}
			}
		}
		return $subCoords;
	}

	protected function isInterval($coord)
	{
		return str_contains(haystack: $coord, needle: "/");
	}

	protected function logCoords(array $coords = [], string $message = null)
	{
		if ($this->debug) {
			if ($coords) {
				echo "Log coordinates: " . $this->printCoords($coords) . "; ";

			}
			if ($message) {
				echo $message;
			}
			echo PHP_EOL;
		}
	}

	protected function printCoords(array $coords)
	{
		return "[" . implode(array: $coords, separator: ", ") . "]";
	}
}
