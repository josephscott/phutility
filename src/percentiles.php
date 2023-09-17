<?php
declare( strict_types = 1 );

class Percentiles {
	private array $numbers = [];

	public function __construct( array $numbers ) {
		sort( $numbers );
		$this->numbers = $numbers;
	}

	public function get_percentile( int $percentile ) {
		$index = ( $percentile / 100 ) * count( $this->numbers );
		$index = floor( $index );
		return $this->numbers[$index];
	}
}
