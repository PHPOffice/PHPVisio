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
 * PHPVisio_Sheet
 *
 * @category	PHPVisio
 * @package		PHPVisio
 * @copyright	Copyright (c) 2012 - 2012 PHPVisio (https://github.com/PHPOffice/PHPVisio)
 */
class PHPVisio_Sheet
{
	/**
	 * Name
	 * 
	 * @var string
	 */
	private $_name;
	
	/**
	 * Parent Visio
	 * 
	 * @var PHPVisio
	 */
	private $_parent;
	
	/**
	 * Index
	 *
	 * @var integer
	 */
	private $_index;
	
	/**
	 * Collection of PHPVisio_Shape objects
	 * 
	 * @var PHPVisio_Shape[]
	 */
	private $_shapeCollection = array();
	
	/**
	 * Active shape
	 *
	 * @var int
	 */
	private $_activeShapeIndex = 0;
	
	/**
	 * Collection of PHPVisio_Connector objects
	 *
	 * @var PHPVisio_Connector[]
	 */
	private $_connectorCollection = array();
	
	/**
	 * Active connector
	 *
	 * @var int
	 */
	private $_activeConnectorIndex = 0;
	
	public function __construct(PHPVisio $pParent){
		$this->_parent = $pParent;
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
	 * Get name
	 *
	 * @return string
	 */
	public function getName()
	{
		return $this->_name;
	}
	
	/**
	 * Set name
	 *
	 * @param string $pValue Name of the sheet
	 * @return PHPVisio_Sheet
	 */
	public function setName($pValue)
	{
		$this->_name = $pValue;
		return $this;
	}
	
	//===============================================
	// Shapes
	//===============================================
	/**
	 * Add a shape used by the current sheet
	 * @return PHPVisio_Shape
	 */
	public function addShape(){
		$newShape = new PHPVisio_Shape($this->_parent, $this);
		$this->_shapeCollection[] = $newShape;
		$this->_activeShapeIndex = $this->getShapeCount() - 1;
		return $newShape;
	}

	/**
	 * Returns a collection of all shapes used by the sheet
	 * 
	 * @return PHPVisio_Shape[]
	 */
	public function getShapes(){
		return $this->_shapeCollection;
	}

	/**
	 * 
	 * @return number
	 */
	public function getShapeCount(){
		return count($this->_shapeCollection);
	}
	
	//===============================================
	// Connectors
	//===============================================
	/**
	 * Add a connector used by the current sheet
	 * @return PHPVisio_Connector
	 */
	public function addConnector(){
		$newConnector = new PHPVisio_Connector($this->_parent, $this);
		$this->_connectorCollection[] = $newConnector;
		$this->_activeConnectorIndex = $this->getConnectorCount() - 1;
		return $newConnector;
	}
	
	/**
	 * Returns a collection of all connectors created in the sheet
	 *
	 * @return PHPVisio_Connector[]
	 */
	public function getConnectors()
	{
		return $this->_connectorCollection;
	}

	public function getConnectorCount(){
		return count($this->_connectorCollection);
	}
}