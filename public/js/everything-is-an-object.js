/*functions behave as objects and so they can have attributes*/
function displayError(message){
    displayError.numTimesExecuted++;
    alert(message);
}
displayError.numTimesExecuted = 0;

/*We can modify classes after they have been defined and objects after they have ben instantiated*/

/*Class Person*/
function Person(name, age){
    this._name = name;
    this._age = age;
};

Person.prototype = {
    getName: function (){ return this._name; },
    getAge: function (){ return this._age;}
};

var alice = new Person('Alice',93);
var bill = new Person('Bill',30);

//modify the class
Person.prototype.getGreeting = function(){
    return 'Hi ' + this.getName() + '!';
};

/*Modify a specific instance.*/
alice.displayGreeting = function(){
    alert(this.getGreeting());
}
