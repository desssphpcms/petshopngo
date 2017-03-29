<?php
/**************************************************

* Name Theme

* Author: The Cmsmart Development Team 

* Date Created: 2013

* Websites: http://cmsmart.net

* Technical Support: Forum - http://cmsm4art.net/support

* GNU General Public License v3 (http://opensource.org/licenses/GPL-3.0)

* Copyright © 2011-2013 Cmsmart.net. All Rights Reserved.

***************************************************/

class Cmsmart_ThemeSetting_Block_Navigation extends Mage_Core_Block_Template
{
	//NEW:
	protected $_isAccordion = FALSE;
	
    protected $_categoryInstance = null;

    /**
     * Current category key
     *
     * @var string
     */
    protected $_currentCategoryKey;

    /**
     * Array of level position counters
     *
     * @var array
     */
    protected $_itemLevelPositions = array();

    protected function _construct()
    {
        $this->addData(array(
            'cache_lifetime'    => false,
            'cache_tags'        => array(Mage_Catalog_Model_Category::CACHE_TAG, Mage_Core_Model_Store_Group::CACHE_TAG),
        ));
    }

    /**
     * Get Key pieces for caching block content
     *
     * @return array
     */
    public function getCacheKeyInfo()
    {
        $shortCacheId = array(
            'CATALOG_NAVIGATION',
            Mage::app()->getStore()->getId(),
            Mage::getDesign()->getPackageName(),
            Mage::getDesign()->getTheme('template'),
            Mage::getSingleton('customer/session')->getCustomerGroupId(),
            'template' => $this->getTemplate(),
            'name' => $this->getNameInLayout(),
            $this->getCurrenCategoryKey()
        );
        $cacheId = $shortCacheId;

        $shortCacheId = array_values($shortCacheId);
        $shortCacheId = implode('|', $shortCacheId);
        $shortCacheId = md5($shortCacheId);

        $cacheId['category_path'] = $this->getCurrenCategoryKey();
        $cacheId['short_cache_id'] = $shortCacheId;

        return $cacheId;
    }

    /**
     * Get current category key
     *
     * @return mixed
     */
    public function getCurrenCategoryKey()
    {
        if (!$this->_currentCategoryKey) {
            $category = Mage::registry('current_category');
            if ($category) {
                $this->_currentCategoryKey = $category->getPath();
            } else {
                $this->_currentCategoryKey = Mage::app()->getStore()->getRootCategoryId();
            }
        }

        return $this->_currentCategoryKey;
    }

    /**
     * Get catagories of current store
     *
     * @return Varien_Data_Tree_Node_Collection
     */
    public function getStoreCategories()
    {
        $helper = Mage::helper('catalog/category');
        return $helper->getStoreCategories();
    }

    /**
     * Retrieve child categories of current category
     *
     * @return Varien_Data_Tree_Node_Collection
     */
    public function getCurrentChildCategories()
    {
        $layer = Mage::getSingleton('catalog/layer');
        $category   = $layer->getCurrentCategory();
        /* @var $category Mage_Catalog_Model_Category */
        $categories = $category->getChildrenCategories();
        $productCollection = Mage::getResourceModel('catalog/product_collection');
        $layer->prepareProductCollection($productCollection);
        $productCollection->addCountToCategories($categories);
        return $categories;
    }

    /**
     * Checkin activity of category
     *
     * @param   Varien_Object $category
     * @return  bool
     */
    public function isCategoryActive($category)
    {
        if ($this->getCurrentCategory()) {
            return in_array($category->getId(), $this->getCurrentCategory()->getPathIds());
        }
        return false;
    }

    protected function _getCategoryInstance()
    {
        if (is_null($this->_categoryInstance)) {
            $this->_categoryInstance = Mage::getModel('catalog/category');
        }
        return $this->_categoryInstance;
    }

    /**
     * Get url for category data
     *
     * @param Mage_Catalog_Model_Category $category
     * @return string
     */
    public function getCategoryUrl($category)
    {
        if ($category instanceof Mage_Catalog_Model_Category) {
            $url = $category->getUrl();
        } else {
            $url = $this->_getCategoryInstance()
                ->setData($category->getData())
                ->getUrl();
        }

        return $url;
    }

    /**
     * Return item position representation in menu tree
     *
     * @param int $level
     * @return string
     */
    protected function _getItemPosition($level)
    {
        if ($level == 0) {
            $zeroLevelPosition = isset($this->_itemLevelPositions[$level]) ? $this->_itemLevelPositions[$level] + 1 : 1;
            $this->_itemLevelPositions = array();
            $this->_itemLevelPositions[$level] = $zeroLevelPosition;
        } elseif (isset($this->_itemLevelPositions[$level])) {
            $this->_itemLevelPositions[$level]++;
        } else {
            $this->_itemLevelPositions[$level] = 1;
        }

        $position = array();
        for($i = 0; $i <= $level; $i++) {
            if (isset($this->_itemLevelPositions[$i])) {
                $position[] = $this->_itemLevelPositions[$i];
            }
        }
        return implode('-', $position);
    }
	
    /**
     * Get description for category data
     *
     * @param Mage_Catalog_Model_Category $category
     * @return string
     */
    public function getDescription($category)
    {
    	//print_r($category);die;
    	if ($category instanceof Mage_Catalog_Model_Category) {
    		$description = $category->getDescription();
    	} else {
    		$description = $this->_getCategoryInstance()
    		->setData($category->getData())
    		->getDescription();
    	}
    
    	return $description;
    }
    
    /**
     * Render category to html
     *
     * @param Mage_Catalog_Model_Category $category
     * @param int Nesting level number
     * @param boolean Whether ot not this item is last, affects list item class
     * @param boolean Whether ot not this item is first, affects list item class
     * @param boolean Whether ot not this item is outermost, affects list item class
     * @param string Extra class of outermost list items
     * @param string If specified wraps children list in div with this class
     * @param boolean Whether ot not to add on* attributes to list item
     * @return string
     */
    protected function _renderCategoryMenuItemHtml($category, $level = 0, $isLast = false, $isFirst = false,
        $isOutermost = false, $outermostItemClass = '', $childrenWrapClass = '', $noEventAttributes = false)
    {
    	
        if (!$category->getIsActive()) {
            return '';
        }
        $html = array();
        //Zend_Debug::dump($category);
        //print_r($category);
        //echo $category->getId();
        // get all children
        if (Mage::helper('catalog/category_flat')->isEnabled()) {
            $children = (array)$category->getChildrenNodes();
            $childrenCount = count($children);
        } else {
            $children = $category->getChildren();
            $childrenCount = $children->count();
        }
        $hasChildren = ($children && $childrenCount);

        // select active children
        $activeChildren = array();
        foreach ($children as $child) {
            if ($child->getIsActive()) {
                $activeChildren[] = $child;
            }
        }
        
        //print_r($activeChildren);
        $activeChildrenCount = count($activeChildren);
        $hasActiveChildren = ($activeChildrenCount > 0);

        // prepare list item html classes
        $classes = array();
        $classes[] = 'level' . $level;
        $classes[] = 'nav-' . $this->_getItemPosition($level);
        if ($this->isCategoryActive($category)) {
            $classes[] = 'active';
        }
        $linkClass = '';
        if ($isOutermost && $outermostItemClass) {
            $classes[] = $outermostItemClass;
            $linkClass = ' class="'.$outermostItemClass.'"';
        }
        if ($isFirst) {
            $classes[] = 'first';
        }
        if ($isLast) {
            $classes[] = 'last';
        }
        if ($hasActiveChildren) {
            $classes[] = 'parent';
        }
		
		//NEW: add special class if level == 1 and menu is not an accordion.
		if ($this->_isAccordion == FALSE && $level == 1) {
			$classes[] = 'item';
		}
		
        // prepare list item attributes
        $attributes = array();
        if (count($classes) > 0) {
            $attributes['class'] = implode(' ', $classes);
        }
        if ($hasActiveChildren && !$noEventAttributes) {
             $attributes['onmouseover'] = 'toggleMenu(this,1)';
             $attributes['onmouseout'] = 'toggleMenu(this,0)';
        }

        // assemble list item with attributes
        
        $htmlLi = '<li ';
        foreach ($attributes as $attrName => $attrValue) {
            $htmlLi .= ' ' . $attrName . '="' . str_replace('"', '\"', $attrValue) . '"';
        }
        $htmlLi .= '>';
        $html[] = $htmlLi;

        // add block static at menu level 1
        // trung kien
        $cat=Mage::getModel('catalog/category')->load($category->getId());
        
        if($level == 1){
        	//Zend_Debug::dump($category);
        	/*$products = Mage::getModel('catalog/product')
					    ->getCollection()
					    ->addCategoryFilter($category)
					    ->load();
        	*/
        	//Zend_Debug::dump($category);
        	$model=$cat->getDisplay_mode();
        	if($model == 'PAGE')
        	{
        		$landing_page=$cat->getLanding_page();
        		//$block = Mage::getModel('cms/block')->load($landing_page);
        		//$blockId = "category_block"; //block id to be assigned here
        		$block = Mage::getModel('cms/block')->load($landing_page);
        		//echo $title = $block->getTitle(); // get block title
        		$isActive = $block->getIsActive(); // get block status
        		//Zend_Debug::dump($block);
        		$block_html='';
        		if($isActive==1)
        			//$block_html =$block->getContent();
        			$block_html=$this->getLayout()->createBlock('cms/block')->setBlockId($landing_page)->toHtml();
        		//echo $block->getTitle();
        		$html[] = '<a href="'.$this->getCategoryUrl($category).'"'.$linkClass.'><span>' . $this->escapeHtml($category->getName()).'</span></a>';
        		$html[] = '<div>'.$block_html.'</div>';
        		//$landing_page=$cat->getLanding_page();
        		  		
        	}
        	
        	/*
        	if($products->count() == 0)
        	{
        		//Zend_Debug::dump($cat);
	        	$html[] = '<a><span>' . $this->escapeHtml($category->getName()).'</span></a>';
	        	$html[] = '<div>'.$cat->getDescription().'</div>';
	        	//$html[] = $this->getDescription($category);
	        	//$html[] = '</a>';
        	}
        	else if($products->count() == 1){
	        	//var_dump($products->getFirstItem()->getData());
	        	$html[] = '<a href="#"'.$linkClass.'>';
	        	$html[] = '<span>' . $this->escapeHtml($category->getName()).'</span>';
	        	$html[] = '</a>';
        	}
        	*/
        	else
        	{
        	
	        		$html[] = '<a href="'.$this->getCategoryUrl($category).'"'.$linkClass.'>';
	        		$html[] = '<span>' . $this->escapeHtml($category->getName()) . '</span>';
	        		$html[] = '</a>';
        		 	}
        	
        }
        
        else{
        	//$html[] = '<div class="div_imagethumb">'.$cat->getThumbnail();
        	$show=Mage::getStoreConfig('themesetting/mainmenu/thumbnail_category');
        	$img=$cat->getThumbnail();
        	if($show){
        		if($img)
        			$html[]='<img src="'.Mage::getBaseUrl('media').'catalog/category/'.$img.'" />';
        	}
        	$html[] = '<a href="'.$this->getCategoryUrl($category).'"'.$linkClass.'>';
        	$html[] = '<span>' . $this->escapeHtml($category->getName()) . '</span>';
        	$html[] = '</a>';
        	//$html[] = '</div>';
        }

        // render children
        $htmlChildren = '';
        $j = 0;
        foreach ($activeChildren as $child) {
            $htmlChildren .= $this->_renderCategoryMenuItemHtml(
                $child,
                ($level + 1),
                ($j == $activeChildrenCount - 1),
                ($j == 0),
                false,
                $outermostItemClass,
                $childrenWrapClass,
                $noEventAttributes
            );
            
            $j++;
        }
        // trung kien
        //if($category->getLandingPage() != '')
        /*if($level == 1){
        	if($category->getName() == 'Specail')
        		$htmlChildren='<li>'.$category->getDisplayMode().'</li>';
        }*/
        
        if (!empty($htmlChildren)) {
			
			//NEW: add opener if menu is used as accordion.
			if ($this->_isAccordion == TRUE)
				$html[] = '<span class="opener">&nbsp;</span>';
			
            if ($childrenWrapClass) {
                $html[] = '<div class="' . $childrenWrapClass . '">';
            }
            $html[] = '<ul class="level' . $level . '">';
            $html[] = $htmlChildren;
            $html[] = '</ul>';
            if ($childrenWrapClass) {
                $html[] = '</div>';
            }
        }
		
        $html[] = '</li>';
		
        
        $html = implode("\n", $html);
        //echo $html;die;
        return $html;
    }

    /**
     * Render category to html
     *
     * @deprecated deprecated after 1.4
     * @param Mage_Catalog_Model_Category $category
     * @param int Nesting level number
     * @param boolean Whether ot not this item is last, affects list item class
     * @return string
     */
    public function drawItem($category, $level = 0, $last = false)
    {
        return $this->_renderCategoryMenuItemHtml($category, $level, $last);
    }

    /**
     * Enter description here...
     *
     * @return Mage_Catalog_Model_Category
     */
    public function getCurrentCategory()
    {
        if (Mage::getSingleton('catalog/layer')) {
            return Mage::getSingleton('catalog/layer')->getCurrentCategory();
        }
        return false;
    }

    /**
     * Enter description here...
     *
     * @return string
     */
    public function getCurrentCategoryPath()
    {
        if ($this->getCurrentCategory()) {
            return explode(',', $this->getCurrentCategory()->getPathInStore());
        }
        return array();
    }

    /**
     * Enter description here...
     *
     * @param Mage_Catalog_Model_Category $category
     * @return string
     */
    public function drawOpenCategoryItem($category) {
        $html = '';
        if (!$category->getIsActive()) {
            return $html;
        }

        $html.= '<li';

        if ($this->isCategoryActive($category)) {
            $html.= ' class="active"';
        }

        $html.= '>'."\n";
        $html.= '<a href="'.$this->getCategoryUrl($category).'"><span>'.$this->htmlEscape($category->getName()).'</span></a>'."\n";

        if (in_array($category->getId(), $this->getCurrentCategoryPath())){
            $children = $category->getChildren();
            $hasChildren = $children && $children->count();

            if ($hasChildren) {
                $htmlChildren = '';
                foreach ($children as $child) {
                    $htmlChildren.= $this->drawOpenCategoryItem($child);
                }

                if (!empty($htmlChildren)) {
                    $html.= '<ul>'."\n"
                            .$htmlChildren
                            .'</ul>';
                }
            }
        }
        $html.= '</li>'."\n";
        return $html;
    }

    /**
     * Render categories menu in HTML
     *
	 * @param bool Add opener if menu is used as accordion.
     * @param int Level number for list item class to start from
     * @param string Extra class of outermost list items
     * @param string If specified wraps children list in div with this class
     * @return string
     */
    public function renderCategoriesMenuHtml($isAccordion = FALSE, $level = 0, $outermostItemClass = '', $childrenWrapClass = '')
    {
    	//die;
		//NEW: save additional attribute
		$this->_isAccordion = $isAccordion;
		
        $activeCategories = array();
        foreach ($this->getStoreCategories() as $child) {
            if ($child->getIsActive()) {
                $activeCategories[] = $child;
            }
        }
        
        //Zend_Debug::dump($activeCategories);
        $activeCategoriesCount = count($activeCategories);
        $hasActiveCategoriesCount = ($activeCategoriesCount > 0);

        if (!$hasActiveCategoriesCount) {
            return '';
        }

        $html = '';
        $j = 0;
        //var_dump($activeCategories);die;
        //Zend_Debug::dump($activeCategories);
        //Mage::log(var_export($this->debug(), TRUE));
        
        foreach ($activeCategories as $category) {
        	//var_dump($category);die;
        	//print_r($category);
        	
            $html .= $this->_renderCategoryMenuItemHtml(
                $category,
                $level,
                ($j == $activeCategoriesCount - 1),
                ($j == 0),
                true,
                $outermostItemClass,
                $childrenWrapClass,
                true
            );
            //echo $html;die;
            //echo 'yes';die;
            
            $j++;
        }
		//$html='';
        return $html;
    }

}
?>
