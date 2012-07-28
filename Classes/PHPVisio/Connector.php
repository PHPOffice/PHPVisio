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
 * PHPVisio_Connector
 *
 * @category	PHPVisio
 * @package		PHPVisio
 * @copyright	Copyright (c) 2012 - 2012 PHPVisio (https://github.com/PHPOffice/PHPVisio)
 */
class PHPVisio_Connector
{
	/**
	 * Label
	 * 
	 * @var string
	 */
	private $_label;
	
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
	
	/**
	 * 
	 * @var PHPVisio_Shape
	 */
	private $_linkStartShape;
	
	/**
	 *
	 * @var integer
	 */
	private $_linkStartPoint;
	
	/**
	 *
	 * @var PHPVisio_Shape
	 */
	private $_linkEndShape;
	
	/**
	 *
	 * @var integer
	 */
	private $_linkEndPoint;
	
	//===============================================
	// Constantes
	//===============================================
	const POINT_BOTTOM = 1;
	const POINT_LEFT = 2;
	const POINT_RIGHT = 3;
	const POINT_TOP = 4;
	
	//===============================================
	// Fonctions
	//===============================================
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

	//===============================================
	// Label
	//===============================================
	/**
	 * Get label
	 *
	 * @return string
	 */
	public function getLabel()
	{
		return $this->_label;
	}
	
	/**
	 * Set label
	 *
	 * @param string $pValue Label of the connector
	 * @return PHPVisio_Connector
	 */
	public function setLabel($pValue)
	{
		$this->_label = $pValue;
		return $this;
	}
	
	//===============================================
	// Links
	//===============================================
	/**
	 * 
	 * @param PHPVisio_Shape $pShape
	 * @param integer $pLinkPoint
	 * @return PHPVisio_Connector
	 */
	public function setLinkStart(PHPVisio_Shape $pShape, $pLinkPoint){
		$this->_linkStartShape = $pShape;
		$this->_linkStartPoint = $pLinkPoint;
		
		return $this;
	}
	
	/**
	 * 
	 * @return PHPVisio_Shape
	 */
	public function getLinkStartShape(){
		return $this->_linkStartShape;
	}
	
	/**
	 * 
	 * @return integer
	 */
	public function getLinkStartPoint(){
		return $this->_linkStartPoint;
	}
	
	/**
	 * 
	 * @param PHPVisio_Shape $pShape
	 * @param integer $pLinkPoint
	 * @return PHPVisio_Connector
	 */
	public function setLinkEnd(PHPVisio_Shape $pShape, $pLinkPoint){
		$this->_linkEndShape = $pShape;
		$this->_linkEndPoint = $pLinkPoint;
		
		return $this;
	}
	
	/**
	 * 
	 * @return PHPVisio_Shape
	 */
	public function getLinkEndShape(){
		return $this->_linkEndShape;
	}
	
	/**
	 * 
	 * @return int
	 */
	public function getLinkEndPoint(){
		return $this->_linkEndPoint;
	}
	
	
}