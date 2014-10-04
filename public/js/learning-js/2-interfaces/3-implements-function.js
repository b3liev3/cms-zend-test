console.log('3-implements-function.js');
/*
The implements function, which checks to see if an object declares that it implements the required interfaces.
*/

function implements(object){
    for(var i = 1; i < arguments.length; i++){ //skiping the first element
        
        var interfaceName = arguments[i];
        var interfaceFound = false;
        for(var j = 0; j < object.implementsInterfaces.length; j++){
            if(object.implementsInterfaces[j] == interfaceName){
                interfaceFount = true;
                break;
            }
        }
        if(!interfaceFount){
            return false; // An interface was not found.
        }
    }
    return true; //All interfaces were found.
}