<?php
declare( strict_types = 1 );

test( '1-9, percentile ranked', function() {
	$numbers = new NumberSeries( [ 1, 2, 3, 4, 5, 6, 7, 8, 9 ] );

	$result = $numbers->ranked_percentile( .50 );
	expect( $result )->toBeInt();
	expect( $result )->toBe( 5 );

	$result = $numbers->ranked_percentile( .75 );
	expect( $result )->toBeInt();
	expect( $result )->toBe( 7 );

	$result = $numbers->ranked_percentile( .90 );
	expect( $result )->toBeInt();
	expect( $result )->toBe( 9 );

	$result = $numbers->ranked_percentile( .95 );
	expect( $result )->toBeInt();
	expect( $result )->toBe( 9 );

	$result = $numbers->ranked_percentile( .99 );
	expect( $result )->toBeInt();
	expect( $result )->toBe( 9 );
} );

test( '1-9, percentile interpolated', function() {
	$numbers = new NumberSeries( [ 1, 2, 3, 4, 5, 6, 7, 8, 9 ] );

	$result = $numbers->interpolated_percentile( .50 );
	expect( $result )->toBeFloat();
	expect( $result )->toBe( 5.0 );

	$result = $numbers->interpolated_percentile( .75 );
	expect( $result )->toBeFloat();
	expect( $result )->toBe( 7.0 );

	$result = $numbers->interpolated_percentile( .90 );
	expect( $result )->toBeFloat();
	expect( $result )->toBe( 8.2 );

	$result = $numbers->interpolated_percentile( .95 );
	expect( $result )->toBeFloat();
	expect( $result )->toBe( 8.6 );

	$result = $numbers->interpolated_percentile( .99 );
	expect( $result )->toBeFloat();
	expect( $result )->toBe( 8.92 );
} );

test( '23 random integers, percentile ranked', function() {
	$numbers = new NumberSeries( [ 90, 2, 18, 39, 66, 22, 44, 95, 31, 36, 81, 59, 72, 44, 64, 17, 33, 70, 86, 37, 85, 74, 48 ] );

	$result = $numbers->ranked_percentile( .50 );
	expect( $result )->toBeInt();
	expect( $result )->toBe( 48 );

	$result = $numbers->ranked_percentile( .75 );
	expect( $result )->toBeInt();
	expect( $result )->toBe( 74 );

	$result = $numbers->ranked_percentile( .90 );
	expect( $result )->toBeInt();
	expect( $result )->toBe( 86 );

	$result = $numbers->ranked_percentile( .95 );
	expect( $result )->toBeInt();
	expect( $result )->toBe( 90 );

	$result = $numbers->ranked_percentile( .99 );
	expect( $result )->toBeInt();
	expect( $result )->toBe( 95 );
} );

test( '23 random integers, average', function() {
	$numbers = new NumberSeries( [ 90, 2, 18, 39, 66, 22, 44, 95, 31, 36, 81, 59, 72, 44, 64, 17, 33, 70, 86, 37, 85, 74, 48 ] );

	$result = $numbers->average();
	expect( $result )->toBeFloat();
	expect( $result )->toBe( 52.73913043478261 );
} );

test( '23 random integers, min', function() {
	$numbers = new NumberSeries( [ 90, 2, 18, 39, 66, 22, 44, 95, 31, 36, 81, 59, 72, 44, 64, 17, 33, 70, 86, 37, 85, 74, 48 ] );

	$result = $numbers->min();
	expect( $result )->toBeInt();
	expect( $result )->toBe( 2 );
} );

test( '23 random integers, max', function() {
	$numbers = new NumberSeries( [ 90, 2, 18, 39, 66, 22, 44, 95, 31, 36, 81, 59, 72, 44, 64, 17, 33, 70, 86, 37, 85, 74, 48 ] );

	$result = $numbers->max();
	expect( $result )->toBeInt();
	expect( $result )->toBe( 95 );
} );

test( '23 random integers, range', function() {
	$numbers = new NumberSeries( [ 90, 2, 18, 39, 66, 22, 44, 95, 31, 36, 81, 59, 72, 44, 64, 17, 33, 70, 86, 37, 85, 74, 48 ] );

	$result = $numbers->range();
	expect( $result )->toBeInt();
	expect( $result )->toBe( 93 );
} );
