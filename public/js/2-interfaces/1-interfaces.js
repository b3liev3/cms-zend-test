/* Describing them with comments*/

/*
interface Composite{
    function add(child);
    function remove(child);
    function getChild(index);
}

interface FormItem{
    fucntion save();
}
 */

var CompositeForm = function(id,method,action){ //implements Composite, Form Item
    
    //Constructor code...
}

//Implment the composite interface.
CompositeForm.prototype.add = function(child){
    //...
};
CompositeForm.prototype.remove = function(child){
  //...  
};
Compositeform.prototype.getChild = function(child){
    
};

//Implment the FormItem interface.

CompositeForm.prototype.save = function(){
    //...
};