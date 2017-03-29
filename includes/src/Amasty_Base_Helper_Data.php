<?php 
/**************************************************

* Name Theme

* Author: The Cmsmart Development Team 

* Date Created: 2013

* Websites: http://cmsmart.net

* Technical Support: Forum - http://cmsmart.net/support

* GNU General Public License v3 (http://opensource.org/licenses/GPL-3.0)

* Copyright © 2011-2013 Cmsmart.net. All Rights Reserved.

***************************************************/

?>
<?php
/**
 * @copyright  Copyright (c) 2010 Amasty (http://www.amasty.com)
 */  
class Amasty_Base_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function isVersionLessThan($major=1, $minor=4)
    {
        $curr = explode('.', Mage::getVersion()); // 1.3. compatibility
        $need = func_get_args();
        foreach ($need as $k => $v){
            if ($curr[$k] != $v)
                return ($curr[$k] < $v);
        }
        return false;
    } 
    
    public function isModuleActive($code)
    {
        return ('true' == (string)Mage::getConfig()->getNode('modules/'.$code.'/active'));
    } 
    
}