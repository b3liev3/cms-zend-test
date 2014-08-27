/*
 *This file is an example of how to make object builders
 */

/*
 Example 1
*/
var Anim = function(){
    console.log("Anim constructor.")
};
Anim.prototype.start = function(){
    console.log("starting.");
};
Anim.prototype.stop = function(){
    console.log("stopping.");
};

/*
 Example 2 
 */
var Car = function (){
    console.log("Car constructor.");
};
Car.prototype = {
    start: function (){
        console.log('Car starts.');
    },
    stop : function (){
        console.log('Car stops.')
    }
};

/*
 Example 3
*/
function Person(name,age){
    this._name = name;
    this._age = age;
    this.getName = function (){return this._name;};
    this.getAge = function (){return this._age;};
}

/*
 A way to add more methods, they only will be inherited when the objects are instantiated with new.
But if we add any other methods after some have been created, these will not inherit them.
 */
Function.prototype.method = function(name,fn){
    this.prototype[name] = fn;
    return this;
};


//execution
var firstAnim = new Anim();

var myAnim = new Anim();
myAnim.start();
myAnim.stop();
//adding functions dynamically
Anim.method('method1', function (){ 
    console.log("Anim method 1 invoked.");
});
Anim.method('method2', function (){ 
    console.log("Anim method 2 invoked.");
});
myAnim.method1();
myAnim.method2();

var anotherAnim = new Anim();
anotherAnim.method1();

console.log('calling firstAnim.method2');
firstAnim.method2();
console.log('but nothing happens, cos it does not have it!');


var newCar = new Car();
newCar.start();
newCar.stop();
//adding functions dynamically
Car.method('method1', function (){ 
    console.log("Car method 1 invoked.");
});
Car.method('method2', function (){ 
    console.log("Car method 2 invoked.");
});
newCar.method1();
newCar.method2();

var pere = new Person('pere',32);
console.log(pere.getAge());
console.log(pere.getName());