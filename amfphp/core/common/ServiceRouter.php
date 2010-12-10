<?php

/**
 *  The Service Router class is responsible for executing the remote service method and returning it's value.
 * based on the old "Executive" of php 1.9. It looks for a service either explicitely defined in a
 * ClassFindInfo object, or in a service folder.
 *
 * @author Ariel Sommeria-klein
 */
class ServiceRouter implements IServiceRouter{

     /**
     * paths to folders containing services(relative or absolute)
     * @var <array> of paths
     */
    private $serviceFolderPaths;

    /**
     *
     * @var <array> of ClassFindInfo
     */
    private $serviceNames2ClassFindInfo;

    /**
     *
     * @param <array> $serviceFolderPaths folders containing service classes
     * @param <array> $serviceNames2ClassFindInfo a dictionary of service classes represented in a ClassFindInfo.
     */
    public function  __construct($serviceFolderPaths, $serviceNames2ClassFindInfo) {
        $this->serviceFolderPaths = $serviceFolderPaths;
        $this->serviceNames2ClassFindInfo = $serviceNames2ClassFindInfo;
    }

    /**
     * loads and instanciates a service class matching $serviceName, then calls the function defined by $functionName using $parameters as parameters
     * throws an exception if service not found.
     * if the service exists but not the function, an exception is thrown by call_user_func_array. It is pretty explicit, so no furher code was added
     *
     * @param <string> $serviceName
     * @param <string> $functionName
     * @param <array> $parameters
     * @return <mixed> the result of the function call
     *
     */
    public function executeServiceCall($serviceName, $functionName, $parameters){
        $serviceObject = null;
        if(isset ($this->serviceNames2ClassFindInfo[$serviceName])){
            $classFindInfo = $this->serviceNames2ClassFindInfo[$serviceName];
            require_once $classFindInfo->absolutePath;
            $serviceObject = new $classFindInfo->className();
        }else{
            //no class find info. try to look in the folders
            foreach($this->serviceFolderPaths as $folderPath){
                $servicePath = $folderPath . "/" . $serviceName . ".php";
                 throw new Exception($servicePath);
                if(file_exists($servicePath)){
                    require_once $servicePath;
                    $serviceObject = new $serviceName();
                }
            }
            
        }

        if(!$serviceObject){
            throw new Exception("$serviceName service not found ");
        }
        
        return call_user_func_array(array($serviceObject, $functionName), $parameters);

    }
}
?>
