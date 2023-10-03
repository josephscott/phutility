<?php
declare( strict_types=1 );

class numberseries {
	/**
	 * @var array<int>
	 */
	private array $numbers = [];

	/**
	 * @param array<int> $numbers
	 */
	public function __construct( array $numbers ) {
		sort( $numbers, SORT_NUMERIC );
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

	public function max() : int|float {
		$last = array_key_last( $this->numbers );

		return $this->numbers[$last];
	}

	public function min() : int|float {
		return $this->numbers[0];
	}

	public function ranked_percentile( float $percentile ) : int|float {
		$index = $percentile * count( $this->numbers );
		$index = floor( $index );
		$answer = $this->numbers[$index];

		return $answer;
	}
}
