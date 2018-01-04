<?php
declare(strict_types=1);

/**
 * Validierung einer ISIN (double at double-method)
 * 2010-2018 von Björn A. Dietz
 */
class isin_validate{
	public $isin;
	private $cvok;

	function __construct($isin = false) {
		if ($isin) $this->isin = $isin;
	}

	public function isin_check() {
		$isin = strtoupper($this->isin);
		$s=""; $cv = 0;
		$this->cvok = false;

		for ($i=0;$i<=10; $i++) {
			$b = substr($isin,$i,1);
			if (ord($b)>=65 && ord($b)<=90) $b = ord($b)-55;
			$s .= $b;
		}

		$s = strrev($s);

		for ($i= 0;$i<=strlen($s);$i++) {
			$b = (int) substr($s,$i,1);
			if (!bcmod((string) $i, "2")) $b = $this->quersumme($b * 2);
			$cv += $b;
		}
		
		$cv = 10 - bcmod((string) $cv, "10");
		$cv = bcmod ((string) $cv, "10");

		if ($cv == substr($isin,-1,1)) $this->cvok = true;
		return $this->cvok;
	}

	private function quersumme($zahl) {
		$strZahl = (string) $zahl;
		for( $intQS = $i = 0; $i < strlen ($strZahl); $i++ ) {
			$intQS += (int) $strZahl{$i};
		}
		return (int) $intQS;
	}
}

?>