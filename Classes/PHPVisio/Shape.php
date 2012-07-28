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
 * @category	PHPVisio
 * @package	PHPVisio
 * @copyright	Copyright (c) 2012 - 2012 PHPVisio (https://github.com/PHPOffice/PHPVisio)
 * @license	http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version	##VERSION##, ##DATE##
 */


/**
 * PHPVisio_Shape
 *
 * @category	PHPVisio
 * @package		PHPVisio
 * @copyright	Copyright (c) 2012 - 2012 PHPVisio (https://github.com/PHPOffice/PHPVisio)
 */
class PHPVisio_Shape
{
	/**
	 * Text
	 * 
	 * @var string
	 */
	private $_text;
	
	/**
	 * Parent Visio
	 * 
	 * @var PHPVisio
	 */
	private $_parent;
	
	/**
	 * Parent Sheet Visio
	 *
	 * @var PHPVisio_Sheet
	 */
	private $_parentSheet;
	
	/**
	 * Index
	 *
	 * @var integer
	 */
	private $_index;
	
	public function __construct(PHPVisio $pParent, PHPVisio_Sheet $pSheet){
		$this->_parent = $pParent;
		$this->_parentSheet = $pSheet;
	}
	
	/**
	 * Get parent
	 *
	 * @return PHPVisio
	 */
	public function getParent() {
		return $this->_parent;
	}

	/**
	 * Get text
	 *
	 * @return string
	 */
	public function getText()
	{
		return $this->_text;
	}
	
	/**
	 * Set text
	 *
	 * @param string $pValue Text of the shape
	 * @return PHPVisio_Shape
	 */
	public function setText($pValue)
	{
		$this->_text = $pValue;
		return $this;
	}
}