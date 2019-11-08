<?php

namespace Yoast\WP\Free\Tests\Presentations\Indexable_Term_Archive_Presentation;

use Yoast\WP\Free\Tests\TestCase;
use Brain\Monkey;

/**
 * Class Replace_Vars_Object_Test
 *
 * @coversDefaultClass \Yoast\WP\Free\Presentations\Indexable_Term_Archive_Presentation
 *
 * @group presentations
 */
class Replace_Vars_Object_Test extends TestCase {
	use Presentation_Instance_Builder;

	/**
	 * Sets up the test class.
	 */
	public function setUp() {
		parent::setUp();

		$this->setInstance();
		$this->indexable->object_id = 11;
		$this->indexable->object_sub_type = 'Object subtype';
	}

	/**
	 * Tests whether the term is returned.
	 *
	 * @covers ::generate_replace_vars_object
	 */
	public function test_generate_replace_vars_object() {
		Monkey\Functions\expect( 'get_term' )
			->with( 11, 'Object subtype' )
			->once()
			->andReturn( 'Example term' );

		$this->assertEquals( 'Example term', $this->instance->generate_replace_vars_object() );
	}
}
