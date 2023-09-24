<?php
declare( strict_types = 1 );

test( '1-9, ranked', function() {
	$percentiles = new NumberSeries( [ 1, 2, 3, 4, 5, 6, 7, 8, 9 ] );

	$result = $percentiles->get_percentile( 50 );
	expect( $result )->toBeInt();
	expect( $result )->toBe( 5 );

	$result = $percentiles->get_percentile( 75 );
	expect( $result )->toBeInt();
	expect( $result )->toBe( 7 );

	$result = $percentiles->get_percentile( 90 );
	expect( $result )->toBeInt();
	expect( $result )->toBe( 9 );

	$result = $percentiles->get_percentile( 95 );
	expect( $result )->toBeInt();
	expect( $result )->toBe( 9 );

	$result = $percentiles->get_percentile( 99 );
	expect( $result )->toBeInt();
	expect( $result )->toBe( 9 );
} );

test( '1-9, interpolated', function() {
	$percentiles = new NumberSeries( [ 1, 2, 3, 4, 5, 6, 7, 8, 9 ] );

	$result = $percentiles->get_percentile( 50, 'interpolated' );
	expect( $result )->toBeFloat();
	expect( $result )->toBe( 5.0 );

	$result = $percentiles->get_percentile( 75, 'interpolated' );
	expect( $result )->toBeFloat();
	expect( $result )->toBe( 7.0 );

	$result = $percentiles->get_percentile( 90, 'interpolated' );
	expect( $result )->toBeFloat();
	expect( $result )->toBe( 8.2 );

	$result = $percentiles->get_percentile( 95, 'interpolated' );
	expect( $result )->toBeFloat();
	expect( $result )->toBe( 8.6 );

	$result = $percentiles->get_percentile( 99, 'interpolated' );
	expect( $result )->toBeFloat();
	expect( $result )->toBe( 8.92 );
} );

test( '23 random integers, ranked', function() {
	$percentiles = new NumberSeries( [ 90, 2, 18, 39, 66, 22, 44, 95, 31, 36, 81, 59, 72, 44, 64, 17, 33, 70, 86, 37, 85, 74, 48 ] );

	$result = $percentiles->get_percentile( 50 );
	expect( $result )->toBeInt();
	expect( $result )->toBe( 48 );

	$result = $percentiles->get_percentile( 75 );
	expect( $result )->toBeInt();
	expect( $result )->toBe( 74 );

	$result = $percentiles->get_percentile( 90 );
	expect( $result )->toBeInt();
	expect( $result )->toBe( 86 );

	$result = $percentiles->get_percentile( 95 );
	expect( $result )->toBeInt();
	expect( $result )->toBe( 90 );

	$result = $percentiles->get_percentile( 99 );
	expect( $result )->toBeInt();
	expect( $result )->toBe( 95 );
} );