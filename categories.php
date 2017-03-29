<?php 
require_once 'app/Mage.php';
Mage::app();


        if (($inputFile = fopen("var/import/categorieslevel.csv", "r")) !== FALSE) {
    while (($row = fgetcsv($inputFile, 1000, ",")) !== FALSE) {
       // echo $row[0] . "\n"; // Will output  data contained in the first column
	     $array0=trim($row[0]);
		 $array1=trim($row[1]);
		 $array2=trim($row[2]);
		 
			
		$cat = Mage::getResourceModel('catalog/category_collection')->addFieldToFilter('name', $array2);
        // print_r($cat->getData());
	     print_r($cat->getFirstItem()->getEntityId());
		  echo "<br/>";
 
		$cat_id  = $sdsds;
		$sub_id  = $fdsdsd;
		$tert_id = $dsds;
		
		//echo $cat_id.','.$sub_id.','.$tert_id;
		
       

		     
    }
    fclose($inputFile);
}

?>


