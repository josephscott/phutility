<?php
declare( strict_types = 1 );

test( '1-9, ranked', function() {
	$percentiles = new Percentiles( [ 1, 2, 3, 4, 5, 6, 7, 8, 9 ] );

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
	$percentiles = new Percentiles( [ 1, 2, 3, 4, 5, 6, 7, 8, 9 ] );

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
