<?php
declare( strict_types = 1 );

class NumberSeries {
	/**
	 * @var array<int> $numbers
	 */
	private array $numbers = [];

	/**
	 * @param array<int> $numbers
	 */
	public function __construct( array $numbers ) {
		sort( $numbers );
		$this->numbers = $numbers;
	}

	public function average() : int|float {
		$average = array_sum( $this->numbers ) / count( $this->numbers );
		return $average;
	}

	public function interpolated_percentile( float $percentile ) : int|float {
		$index = $percentile * ( count( $this->numbers ) - 1 );
		$lower = floor( $index );
		$remainder = $index - $lower;

		$answer = $this->numbers[$lower];
		if ( isset( $this->numbers[$lower + 1] ) ) {
			$answer = $this->numbers[$lower] + (
				$remainder * (
					$this->numbers[$lower + 1] - $this->numbers[$lower]
				)
			);
		}

		return $answer;
	}

	public function ranked_percentile( float $percentile ) : int|float {
		$index = $percentile * count( $this->numbers );
		$index = floor( $index );
		$answer = $this->numbers[$index];

		return $answer;
	}
}
