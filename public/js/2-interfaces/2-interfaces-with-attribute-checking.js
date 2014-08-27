console.log('2-interfaces-with-attribute-checking.js');

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

var Compositeform = function(id,method,action){
    this.implementsInterfaces = ['Composite','FormItem'];
    //...
};

function adForm(formInstance){
    //here wer are checint that the formInstance really does implement
    if(!implements(formInstance, 'Composite', 'FormItem')){
        throw new Error("Object does not implement a required interface.");
    }
}

function Form (){
    //code...
};

var aux1 = new Form();
adForm(aux1);