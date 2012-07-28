<?php
/**
 * PHPVisio
 *
 * Copyright (c) 2012 - 2012 PHPVisio
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPVisio
 * @package    PHPVisio
 * @copyright  Copyright (c) 2012 - 2012 PHPVisio (https://github.com/PHPOffice/PHPVisio)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */

/** PHPVisio root directory */
if (!defined('PHPVISIO_ROOT')) {
	define('PHPVISIO_ROOT', dirname(__FILE__) . '/');
	require(PHPVISIO_ROOT . 'PHPVisio/Autoloader.php');
}

/**
 * PHPVisio
 *
 * @category   PHPVisio
 * @package    PHPVisio
 * @copyright  Copyright (c) 2006 - 2012 PHPVisio (https://github.com/PHPOffice/PHPVisio)
 */
class PHPVisio
{
	/**
	 * Document properties
	 *
	 * @var PHPVisio_DocumentProperties
	 */
	private $_properties;

	/**
	 * Collection of sheet objects
	 *
	 * @var PHPVisio_Sheet[]
	 */
	private $_sheetCollection = array();

	/**
	 * Active sheet
	 *
	 * @var int
	 */
	private $_activeSheetIndex = 0;
	
	/**
	 * Create a new PHPVisio
	 */
	public function __construct() {
		// Create document properties
		$this->_properties = new PHPVisio_DocumentProperties();
	}

	//===============================================
	// Document Properties
	//===============================================
	/**
	 * Get properties
	 *
	 * @return PHPVisio_DocumentProperties
	 */
	public function getProperties()
	{
		return $this->_properties;
	}

	/**
	 * Set properties
	 *
	 * @param PHPVisio_DocumentProperties	$pValue
	 */
	public function setProperties(PHPVisio_DocumentProperties $pValue)
	{
		$this->_properties = $pValue;
	}

	//===============================================
	// Resources
	//===============================================
	/**
	 * Create a resource
	 *
	 * @return PHPVisio_Sheet
	 * @throws Exception
	 */
	public function createSheet() {
		$newSheet = new PHPVisio_Sheet($this);
		$this->_sheetCollection[] = $newSheet;
		$this->_activeSheetIndex = $this->getSheetCount() - 1;
		return $newSheet;
	}

	/**
	 * Get sheet count
	 *
	 * @return int
	 */
	public function getSheetCount()
	{
		return count($this->_sheetCollection);
	}
	
	/**
	 * Get all sheets
	 *
	 * @return PHPVisio_Sheet[]
	 */
	public function getAllSheets(){
		return $this->_sheetCollection;
	}
	
	/**
	 * Get active sheet
	 *
	 * @return PHPVisio_Sheet
	 */
	public function getActiveSheet()
	{
		return $this->_sheetCollection[$this->_activeSheetIndex];
	}
	
	/**
	 * Get sheet by index
	 *
	 * @param int $pIndex Sheet index
	 * @return PHPVisio_Sheet
	 * @throws Exception
	 */
	public function getSheet($pIndex = 0)
	{
		if ($pIndex > count($this->_sheetCollection) - 1) {
			throw new Exception('Sheet index is out of bounds.');
		} else {
			return $this->_sheetCollection[$pIndex];
		}
	}
	
	/**
	 * Get active sheet index
	 *
	 * @return int Active sheet index
	 */
	private function getActiveSheetIndex()
	{
		return $this->$_activeSheetIndex;
	}
	
	/**
	 * Set active sheet index
	 *
	 * @param int $pIndex Active sheet index
	 * @throws Exception
	 * @return PHPVisio_Sheet
	 */
	private function setActiveSheetIndex($pIndex = 0)
	{
		if ($pIndex > count($this->_sheetCollection) - 1) {
			throw new Exception('Active sheet index is out of bounds.');
		} else {
			$this->_activeSheetIndex = $pIndex;
		}
		return $this->getActiveSheet();
	}
}
