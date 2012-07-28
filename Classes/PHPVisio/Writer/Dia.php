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
 * PHPVisio_Writer_Dia
 * 
 * File format : *.dia
 * 
 * Docs :
 * http://s-tech.elsat.net.pl/libdia/README.txt
 *
 * @category	PHPVisio
 * @package		PHPVisio
 * @copyright	Copyright (c) 2012 - 2012 PHPVisio (https://github.com/PHPOffice/PHPVisio)
 */
class PHPVisio_Writer_Dia
{
	/**
	 * PHPVisio object
	 *
	 * @var PHPVisio
	 */
	private $_phpVisio;
	
	
	/**
	 * Create a new PHPVisio_Writer_Dia
	 *
	 * @param	PHPVisio	$phpVisio	PHPVisio object
	 */
	public function __construct(PHPVisio $phpVisio) {
		$this->_phpVisio	= $phpVisio;
	}
	
	public function save($pFilename = null){
	
	}
}


?>