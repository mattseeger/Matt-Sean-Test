<?php
/**
 * Default Controller
 *
 * @author mseeger
 */
class debug extends Controller{
    /**
     *
     * @var Salesforce 
     */
            
    public function __construct() {
        parent::__construct();
        
    }
    
    public function Index(){
        $sfdc = new SFDCConnector();
        $packageVersions = new stdClass();
        $packageVersions->PackageVersion = new stdClass();
        $packageVersions->PackageVersion->majorNumber = 28;
        $packageVersions->PackageVersion->minorNumber = 0;
        $packageVersions->PackageVersion->namespace = "SBQQ";
        $packageVersionsHeader = new SoapHeader("urn:enterprise.soap.sforce.com",PackageVersions, $packageVersions);
        $sfdc->soap->__setSoapHeaders($packageVersionsHeader);
//$products = $sfdc->query("SELECT Name, SBQQ__ProductPictureID__c, Id, ProductCode, Description, Image__c FROM Product2 WHERE Name != '' AND Description != '' AND ProductCode != '' ORDER BY Name ASC LIMIT 10");
        echo "<pre>";
        echo "**Requst Header\n";
        var_dump($sfdc->soap->__getLastRequestHeaders());
        echo "**Requst\n";
        var_dump($sfdc->soap->__getLastRequest());
        echo "**Response Header\n";
        var_dump($sfdc->soap->__getLastResponseHeaders());
        echo "**Response\n";
        var_dump($sfdc->soap->__getLastResponse());
        var_dump($sfdc->soap);
        $products = $sfdc->query("SELECT Name, sbqq__ProductPictureID__c, Id, ProductCode, Description, Image__c FROM Product2 WHERE Name != '' AND Description != '' AND ProductCode != '' ORDER BY Name ASC LIMIT 10");
        var_dump($products);
        echo "</pre>";
    }
}

?>