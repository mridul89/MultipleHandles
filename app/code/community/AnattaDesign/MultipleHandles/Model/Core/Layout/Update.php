<?php

class AnattaDesign_MultipleHandles_Model_Core_Layout_Update extends Mage_Core_Model_Layout_Update {

	public function fetchPackageLayoutUpdates( $handle ) {
		$_profilerKey = 'layout/package_update: ' . $handle;
		Varien_Profiler::start( $_profilerKey );
		if( empty( $this->_packageLayout ) ) {
			$this->fetchFileLayoutUpdates();
		}

		foreach( $this->_packageLayout->$handle as $updateXml ) {
			/** @var Mage_Core_Model_Layout_Element $updateXml */

			$handle = $updateXml->getAttribute( 'ifhandle' );
			if( $handle ) {
				$handle = explode( ' ', $handle );
				$handle = array_diff( $handle, $this->getHandles() );
				if( !empty( $handle ) ) {
					continue;
				}
			}

			$this->fetchRecursiveUpdates( $updateXml );
			$this->addUpdate( $updateXml->innerXml() );
		}
		Varien_Profiler::stop( $_profilerKey );

		return true;
	}
}