var Composite = new Interface('Composite',['add','remove','getChild']);
var FormItem = new Interface('FormItem',['save']);

var CompositeForm = function(id,method,action){
	//implments Composite, FormItem
};

function addForm(formInstance){
	Interface.ensureImplements(formInstance,Composite,FormItem);
	//This funciton will throw an error if a required method is not implemented, halting execution of the function.
	//All code beneath this line will be executed only if the check pass.
}

//Implement the Composite interface.

CompositeForm.prototype.add = function(child){
	
};
CompositeForm.prototype.remove = function(child){
	
};
CompositeForm.prototype.getChild = function (index){
	
};

//Implement the FormItem interface.

CompositeForm.prototype.save = function (){
	
};