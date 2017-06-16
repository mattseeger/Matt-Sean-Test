<?php
/**
 * Default Controller
 *
 * @author mseeger
 */
class products extends Controller{

    
    public function __construct() {
        parent::__construct();
        
    }
    
    public function Index(){
        $sfdc = new SFDCConnector();
        $products = $sfdc->query("SELECT Name, SBQQ__ProductPictureID__c, Id, ProductCode, Description, Image__c, Configurable_on_Website__c FROM Product2 WHERE Visible_On_Website__c = TRUE AND Name != '' AND Description != '' AND ProductCode != '' ORDER BY Configurable_on_Website__c DESC, Name ASC LIMIT 30");
        $this->view->renderHeader();
        $this->view->render("productListing", $products);
        $this->view->renderFooter();
    }
    
    public function configure(){
        $this->view->renderHeader();
        $this->view->render("index");
        echo "<pre>";
        $sfdc = new SFDCConnector();
        $resp = $sfdc->LoadProductByID($_GET['pid']);
        
        
        echo var_dump($resp);
        echo "</pre>";
        $this->view->renderFooter();
    }
    
}

?>