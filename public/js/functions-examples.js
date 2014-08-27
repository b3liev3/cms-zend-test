/*An anonymous function, executed immediately*/
(function() {
    var foo = 10;
    var bar = 2;
    console.log(foo * bar);
})();

/*An anonymous function with arguments*/
(function (foo,bar){
    console.log(foo * bar);
})(10,2);

/*reurning a value*/
var baz = (function (foo,bar){
    return (foo * bar);
})(10,2);
console.log(baz);

/*An anonymous function used as closure*/
/* This is a complicated technique*/
var baz;

(function(){
    baz = function(boo,bar){
        return boo * bar;
    };
})();

console.log(baz(3,4));