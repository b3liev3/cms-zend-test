/*
 * Example of:
 *  .static attributes
 *  .static method
 */
var Book = (function (){
    
    //private static attributes
    var _numOfBooks = 0;
    
    //private static method
    function _checkIsbn(isbn){
        return true;
    }
    
    //Return the constructor
    return function(newIsbn,newTitle,newAuthor){ //Implements Publication
        
        //private atributes.
        var _isbn,_title,_author;
   
    
        //privileged methods
        this.getIsbn = function (){
            return _isbn;
        };
    
        this.setIsbn = function(newIsbn){
            if(!_checkIsbn(newIsbn)) throw new Error('Book: Invalid ISBN.');
            _isbn = newIsbn;
        };
    
        this.getTitle = function (){
            return _title;
        }
    
        this.setTitle = function (newTitle){
            _title = newTitle || 'No title specified';
        };
    
        this.getAuthor = function (){
            return _author;
        }
    
        this.setAuthor = function(newAuthor){
            _author = newAuthor || 'No author specified';
        }
    
        //Constructor code.
        _numOfBooks++; //static attribute
        if(_numOfBooks > 50){
            //do something
        }
        
        this.getNumberOfBooks = function (){
            return _numOfBooks;
        };
        
        this.setIsbn(newIsbn);
        this.setTitle(newTitle);
        this.setAuthor(newAuthor);
    }
})();

//Public static method
Book.convertToTitleCase = function(inputString){
    //...
};

//Public, non-priveleged methods.
Book.prototype = {
    display: function(){},
    anotherMethod: function(){}
};

var var1 = new Book('a','a','a');
var var2 = new Book('a','a','a');
var var3 = new Book('a','a','a');
var var4 = new Book('a','a','a');

console.log(var4.getNumberOfBooks());