<!-- 
    * Create a base class Product with properties like name, price, and description.

    * Create derived classes like PhysicalProduct (with additional properties like weight and dimensions) and DigitalProduct (with additional properties like downloadLink).

    * Write a program that creates objects of these classes, setting their specific properties, and demonstrates how inheritance helps categorize product types.
 -->

<!-- 
    * Create a base class Employee with properties like name, department, and a method calculateSalary() (which can be empty in the base class).

    * Create derived classes like Manager, Developer, and Salesperson that inherit from Employee and implement their specific calculateSalary() methods based on different criteria.

    * Write a program that creates objects of these classes, sets their information, and calls calculateSalary() on each object (you can use a placeholder value for now).
  -->


<!-- 
    1. Building a Shape Hierarchy (Inheritance, Abstract Classes):
      * Create an abstract class Shape with abstract methods getArea() and getPerimeter().

      * Derive concrete classes Square, Rectangle, Circle, and Triangle from Shape.

      * Implement getArea() and getPerimeter() in each concrete class based on their respective formulas.

      * Inherit a ColoredShape class from Shape with a color property and a method getColor().

      * Override some shapes (e.g., Square) to inherit from ColoredShape and demonstrate polymorphism.

      * Create objects of different shapes, calculate their areas and perimeters, and display the color if applicable.
   -->


<!-- 
    2. Secure File Uploader (Object-Oriented Design, Access Modifiers):

      * Design a class FileUploader with a private uploadDirectory property.

      * Create a public method uploadFile() that takes the filename, file data, and allowed extensions as arguments.

      ** Implement validation using access modifiers: **
        * Check if the file extension is allowed using a private helper method.
        * Throw an exception (e.g., InvalidFileExtensionException) within the private method if the extension is invalid.
        * Use try-catch blocks in uploadFile() to handle exceptions gracefully.
        * If valid, move the uploaded file to the uploadDirectory using a protected method moveFile().
    -->


<!-- 
      3. E-commerce Product Catalog (Classes, Objects, Static Members):

        * Define a class Product with properties like name, price, stock, and a static property TAX_RATE.

        * Implement public methods like getName(), getPrice(), getStock(), calculateTax(), and reduceStock() (using static methods for calculations).

        * Create various product objects (e.g., Electronics, Clothing, Books) derived from Product with potential price adjustments or tax overrides.

        * Create a ShoppingCart class to manage products and implement methods to add, remove, and display items in the cart along with their total cost (including tax).
     -->