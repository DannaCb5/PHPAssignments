
# TO DO MVC NOTES

## app.js
	iffy function with no name which runs on execution.

### 1. Store - Database Management - Global key: value pairs. I/O [{}, {}]

### 2. Model - Gets information from store. Abstracted API for DB. CRUD. 
         Create: adds a title and saves record.
         Read: Robust store find - Poly morphism
         Update: Reorder
         Drop: Delete
         
### 3. Template - To convert data object to HTML {}=></>

### 4. View - Gets information from template.  Add event
```javascript
function View(template) {
  this.template = template;

  this.ENTER_KEY = 13;  //these keycodes can be found at https://keycode.info 
  this.ESCAPE_KEY = 27;

    qs('[data-id="' + id + '"]') 
    // - query by attribute instead of id, tag..
    // $delete(element.method, target, type, handler)

      else if (event === 'itemToggle') {
    $delegate(self.$todoList, '.toggle', 'click', function () {
      handler({
        id: self._itemId(this),
        completed: this.checked
      });
    });
```
Described as:
calling the function $delegate adding the type which is event listener 'click' and add it to the element.method self.$todoList with the target 'toggle', then we run and anonamous function.  In that function we call a function named handler, passing an object with the property id with a key: value of id: self._itemId() pair passing argument (this), our next property with the key: value pair.

```$delegate(self.$todoList, 'li .edit', 'blur', function () {})```

Event delegation:<br/>

|              |              |<br/>

CHILD          CHILD          CHILD<br/>

Document.queryselector("Parent").addEventlistener("blur") function (event) { event target} - when you use parent `<addr>` for the qs then you only do this once.  If it were child it would be 3 times.

### 5. Controller - Gets information from model and view
  npm run text
    |       |
  server     |_____ cy:run____
    |   |________              |
    |            |             |
   gulp     test-server      Cypress

   node.js
   npm/yarn/bower - package manager
      node - modules
      package.json
      dependencies
      dev-dependencies
      jshint - linter - eslint
      gulp/grunt/brunch/broccoli - task runner - pacage
      grunt - task runner
      Cypress - Testing framework
      sass - simple scripting language - interpreter
      underscore.js
      lodash
      jquery - used for eventlistner in our program

   constructor - when you instantiate a new object off of a function. Clues you have a constructor function are: Name is capitalised.  A lot of binding of this.
## 
### css - frameworks:
   - bootstrap
   - materialize
   - foundation
   - skeleton

The Window interface represents a window containing a DOM document; the document property points to the DOM document loaded in that window. ... A global variable, window , representing the window in which the script is running, is exposed to

helpers.js:  jQuery
let dogScope = window.qs('.cat');
letdog1 = document.querySelector(".dog");
letdog2 = window.qs('.dog', cat);

store.js:

localstorage collection - nosql version of a database. stored in the browser. ex. .getitem returns a key value from localstorage, .setitem adds a key value to localstorage
MongoDB is similar in the fact that they are nosql database.  Other things are different.

JSON.strinify - turns object into string, JSON.parse - turns a string into an object.

Cookies, localserver are stored in the browser.
Sessions, mysql are stored on the server. 

Prototypical inheritance.
   Prototype

let kroger = new store
let publix = new store
let sprint = new store

if you put prototype between store and find then the instantiations will inherit the properties of store.
store.prototype.find
kroger.find
publix.find
sprint.find

**constructor**
is a function that runs each time there is an instantion of the function.
callback - function that is executed after another function has function.
higher order function - function that takes a function.

**loops**
- for
- while
- do while
- for each
- for in

**functions**
- call
- apply
- bind

defining an object: defining property of javascript.
var objName = {key1: value, key2: value}
another name for key is property, indexes, positions.

global nodelist - all of the dom elements

helpers.js

@param - parameter is an argument.

Xhr = AJAX

### RESOURCES
github workshopper/javascripting
Javascript Seacher on Twitter
https://github.com/getify/You-Dont-Know-JS
https://docs.google.com/document/u/1/?ftv=1
web development bootcamp at the clubhouse
https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object
https://medium.freecodecamp.org/
khanacademy.org for training
learncodefrom.us for teaching resources
typescript and coffeescript are libraries that force you to show you datatypes.
