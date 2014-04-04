<?php
if (!class_exists('JellTrackVisitorHelper')){
class JellTrackVisitorHelper {


	public static function trackVisitor(){		
	
		self::setSession();
		self::setReferrer();	
		self::setPageviews();	
		
	} //end function

	
	private function clearPageViewsSession(){
		$_SESSION['pageviews'] = array();
	}
	
	public static function setPageviews(){
		if(!isset($_SESSION['pageviews'])){
			$_SESSION['pageviews'] = array();
		}else{
			$_SESSION['pageviews'][] = $_SERVER['REQUEST_URI'];		
		}
		//print_r($_SESSION['pageviews']);
	} //end function



	public static function returnTrackingDetails(){
		
		$details = '';
		//*
		///// REFERRER
		if(isset($_SESSION['referrer'])){
			$ref = $_SESSION['referrer'];
		}else{
			$ref = 'Direct';
		}
		
		$base_url = 'http://' . $_SERVER['HTTP_HOST'];
		
		///// PAGEVIEWS
		if(isset($_SESSION['pageviews']) && count($_SESSION['pageviews'])>0){
			$pageviews = $_SESSION['pageviews'];
		}else{
			$pageviews = 'pageviews not collected';
		}
		
		$details .="---------------------------------------------------- \r \r Referrer: ".$ref."\r \r";
		//*
		if(is_array($pageviews) && count($pageviews)>0){
			$details .= "Pages viewed:\r";
			foreach($pageviews as $k=>$page){
				if($page!=$prev){
					$details .= $base_url.$page."\r";
				}			
				$prev = $page;
			}
			$details .= "\r \r ";
			
			$details .= self::check_searchengine($_SESSION['referrer'] );
		} else{
			$details .= "\r \r ";
			
			$details .= self::check_searchengine($_SESSION['referrer'] );

		} //*/
		return $details;
	}


	public static function setReferrer(){
		if(!isset($_SESSION['referrer'])){		
			$_SESSION['referrer'] = $_SERVER['HTTP_REFERER'];
			//	echo '<!--setting referrer: '.$_SESSION['referrer'].' -->';
		}else{
		//	echo '<!--referrer already set: '.$_SESSION['referrer'].' -->';
		}
	} //end function


	public static function setSession(){
		if (!session_id()) {	
			session_start(); 
		}		
	} //end function



	
	public static function check_searchengine($ref){
	
	  if($ref!=''){
		  $se = '';
		  //for testing     
		  // $ref = 'http://www.google.com/search?rlz=1C1CHMI_enUS351US351&sourceid=chrome&ie=UTF-8&q=graphic+design+firm&';
		  if ( preg_match( '/google.com/', $ref) ) {
			$se = 'Google';
			preg_match( '/[\?|&]q=(.*?)&/', $ref, $matches, PREG_OFFSET_CAPTURE );
			$searchTerm = str_replace( '+', ' ', $matches[1][0] );
		  }
		
		  if( preg_match( '/bing.com/', $ref) ) {
			$se = 'Bing';
			preg_match( '/[\?|&]q=(.*?)&/', $ref, $matches, PREG_OFFSET_CAPTURE );
			$searchTerm = str_replace( '+', ' ', $matches[1][0] );
		  }
		
		  if( preg_match( '/yahoo.com/', $ref) ) {
			$se = 'Yahoo';
			preg_match( '/[\?|&]p=(.*?)&/', $ref, $matches, PREG_OFFSET_CAPTURE );
			$searchTerm = str_replace( '+', ' ', $matches[1][0] );
		  }
		
		  $ip = $_SERVER['REMOTE_ADDR'];
		  
		  if ($se!='' && $se!='Google' ){
			$details .= "Organic search engine info:\n\nSearch engine: ".$se."\r ";
		  }else if($se=='Google' && $searchTerm!=''){
			$details .= "Paid search engine info:\n\nSearch engine: ".$se."\r ";  	
			
			
		
			if ($searchTerm!=''){
				$details .= "Search Term: ".$searchTerm."\r ";
			  }
		  }else if($se!=''){
			$details .= "Search engine info:\n\nSearch engine: ".$se."\r ";  
			
			  if ($searchTerm!=''){
				$details .= "Search Term: ".$searchTerm."\r ";
			  }
		  }
		 
		  if(is_array($_SESSION['pageviews']) && count($_SESSION['pageviews'])>0){  
			$details .= "Landing Page: ".$_SESSION['pageviews'][0]."\r ";
		  }
		 
		$details .= "Visitor IP address: ".$_SERVER['REMOTE_ADDR'].". Look up location: http://www.geoiptool.com/en/?IP=".$_SERVER['REMOTE_ADDR']."\r ";
		
		
			if($details !=''){
				return $details;
			}
		} //end if REF is not empty
	} // end function
	
	
}///end class
}
