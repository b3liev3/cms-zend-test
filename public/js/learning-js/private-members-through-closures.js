/*
 * Privileged methods are the ones which have access to the private properties.
 */


var Book = function(newIsbn, newTitle, newAuthor){ //implements Publication
    
    //private atributes.
    var isbn,title,author;
    
    //private method
    function _checkIsbn(isbn){
        //...
    }
    
    //privileged methods
    this.getIsbn = function (){
        return isbn;
    };
    
    this.setIsbn = function(newIsbn){
        if(!_checkIsbn(newIsbn)) throw new Error('Book: Invalid ISBN.');
        isbn = newIsbn;
    };
    
    this.getTitle = function (){
        return title;
    }
    
    this.setTitle = function (newTitle){
        title = newTitle || 'No title specified';
    };
    
    this.getAuthor = function (){
        return author;
    }
    
    this.setAuthor = function(newAuthor){
        author = newAuthor || 'No author specified';
    }
    
    //Constructor code.
    this.setIsbn(newIsbn);
    this.setTitle(newTitle);
    this.setAuthor(newAuthor);
}

//Public, non-priveleged methods.
Book.prototype = {
    display: function (){
        //...
    }
};