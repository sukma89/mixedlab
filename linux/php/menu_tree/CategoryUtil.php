<?php
/**
 * Category Utility class
 * @author James Tang<james@fwso.cn>
 * @copyright (C) 2011 James Tang.
 * @package category
 * @subpackage classes
 */

class CategoryUtil {
	
	/**
	 * Store raw category data fetched from database/
	 * @var array
	 */
	private $_rawDataSet;
	
	/**
	 * Store carefully structured category hierachy.
	 * @var array
	 */
	private $_hierachySet;

	/**
	 * The HTML structure of the categories.
	 * @var string
	 */
	private $_htmlTree;

	private $_maxDepth = 0;
	
	/**
	 * Contruct an category instance from raw data.
	 * @param array $dataSet
	 */
	public function __construct(array $dataSet) {
		$this->_rawDataSet = $dataSet;
		$this->_htmlTree = NULL;
		$this->_init();
	}

	/**
	 * Read data from a file
	 * and construct an CategoryUtil instance
	 * 
	 * @param string $path, file location
	 */
	public static function readFromFile ($path) {
		//TODO read from file
	}

	/**
	 * Write the hierachy data set to file
	 */
	public function writeHierachySet () {
		//TODO write hierachy data set to file
	}

	/**
	 * Get category by id
	 * @param integer $categoryId
	 * @return array
	 */
	public function getCategory ($categoryId) {
		return isset($this->_rawDateSet[$categoryId]) ? 
			$this->_rawDateSet[$categoryId] : NULL;	
	}

	/**
	 * Get the number of Items belong to the specified category.
	 * NOTE: this method is used for testing only, so it return 
	 * a random number
	 *
	 * @param $categoryId
	 * @return integer 
	 */
	public function getItemCount ($categoryId) {
		return mt_rand(1, 5000);	
	}

	public function getMaxDepth () {
		return $this->_maxDepth;
	}

	public function getHtmlTree () {

		if ($this->_htmlTree === NULL) {
			$this->_htmlTree = '';
			$this->_getHtml($this->_hierachySet);
		}

		return $this->_htmlTree;	
	}

	private function _getHtml ($child, $depth=0) {

		$depth++;

		if ($depth > $this->_maxDepth) {
			$this->_maxDepth = $depth;
		}


		$this->_htmlTree .= '<ul class="depth_' . $depth . '">' . "\n";	

		foreach ($child as $c) {

			$class = 'item';

			if (isset($c['children'])) {
				$class .= ' hasChild';
			}

			$this->_htmlTree .= '<li class="' . $class . '">';
			$this->_htmlTree .= '<a href="JavaScript:void(0);" title="' 
				. $c['name'] . '" class="' . $class . '">' 
				. $c['name'] . '(' . $this->getItemCount( $c['id']) 
				. ')</a>';

			if (isset($c['children'])) {

				$this->_getHtml($c['children'], $depth);
			}

			$this->_htmlTree .= '</li>';

		} //foreach

		$this->_htmlTree .= '</ul>';	
	}

	private function _getChild ($id) {
		$child = array();
		foreach ($this->_rawDataSet as $key=>$value) {
			if ($value['parent'] == $id) {
				$child[] = $value;
			}	
		}
		return count($child) > 0 ? $child : NULL;
	}

	private function _processChild (&$child) {
		
		foreach ($child as &$c) {
			$child2 = $this->_getChild($c['id']);
			if ($child2) {
				$c['children'] = $child2;
				$this->_processChild($c['children']);
			}
		}
	}
	
	private function _init() {
		$this->_hierachySet = $this->_getChild(0);

		if ($this->_hierachySet) {
			$this->_processChild($this->_hierachySet);
		}	
	}
}
