<?PHP
class ModelHash{
    
    public static function getHash($location){
        
        if($location['plugin']=='') $location['plugin']='';        
        
        return md5(serialize(array(
            'plugin'=>strtolower($location['plugin']),
            'controller'=>strtolower($location['controller']),
            'action'=>strtolower($location['action']),
        )));
    }
    
    public static function getHashes($results){
        $output=array();        
        foreach($results as $result){            
            $output[]=self::getHash(array(
                'plugin'=>$result['Sector']['plugin'],
                'controller'=>$result['Sector']['controller'],
                'action'=>$result['Sector']['action'],
            ));            
        }        
        return $output;
    }
}