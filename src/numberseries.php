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

	public function get_percentile( int $percentile, string $method = 'rank'  ): int|float {
		if ( $method === 'interpolated' ) {
			$index = ( $percentile / 100 ) * ( count( $this->numbers ) - 1 );
			$lower = floor( $index );
			$remainder = $index - $lower;

			$interp = $this->numbers[$lower];
			if ( isset( $this->numbers[$lower + 1] ) ) {
				$interp = $this->numbers[$lower] + (
					$remainder * (
						$this->numbers[$lower + 1] - $this->numbers[$lower]
					)
				);
			}

			return $interp;
		}

		$index = ( $percentile / 100 ) * count( $this->numbers );
		$index = floor( $index );
		return $this->numbers[$index];
	}
}
