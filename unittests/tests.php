<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class IsinTest extends TestCase {
	
	public function testIsin1() {
		$cv_test = new isin_validate("DE000BAY0017");
		$this->assertTrue($cv_test->isin_check());
		
		$cv_test = new isin_validate("DE000DK2CDS0");
		$this->assertTrue($cv_test->isin_check());
	}
}


?>