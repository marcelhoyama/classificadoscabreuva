<?php

class controller {
    protected $db;
	
public function __construct() {
		try {
		
     
		} catch (PDOException $e) {
			
		}
}

    public function loadView ($viewName, $viewData= array()){
        extract($viewData);
        require 'views/'.$viewName.'.php';
    }
    
    public function loadTemplate($viewName, $viewData=array()) {
        
        require 'views/template.php';
        
    }
      public function loadTemplate_1($viewName, $viewData=array()) {
        
        require 'views/template_1.php';
        
    }
    
    public function loadViewInTemplate($viewName, $viewData=array()) {
        extract($viewData);
        require 'views/'.$viewName.'.php';
        
    }
}

