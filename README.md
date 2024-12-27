# Introduction to Object-Oriented Programming (OOP)

## 1.1 What is Object-Oriented Programming (OOP)?
Object-Oriented Programming (OOP) is a programming paradigm that structures code around "objects," which are instances of classes. These objects encapsulate **data** (properties) and **behavior** (methods), making the code modular, reusable, and easier to maintain.

---

## 1.2 Benefits of OOP
- **Modularity:** Code is divided into self-contained classes, simplifying maintenance.
- **Reusability:** Classes and objects can be reused across different projects.
- **Scalability:** OOP makes adding new features or extending functionality seamless.
- **Real-World Modeling:** Mirrors real-world entities, making software development intuitive.
---

## 1.3 OOP vs. Procedural Programming

### Procedural Example:

```php
// Procedural approach for employee salary calculation
$employees = [];

function addEmployee($id, $name, $position, $salary, $bonus = null) {
    global $employees;
    $employees[$id] = [
        'name' => $name,
        'position' => $position,
        'salary' => $salary,
        'bonus' => $bonus
    ];
}

function calculateSalary($id) {
    global $employees;
    $employee = $employees[$id];

    if ($employee['position'] === 'Manager') {
        return $employee['salary'] + $employee['bonus'];
    } elseif ($employee['position'] === 'Intern') {
        return $employee['salary'] / 2;
    }
    return $employee['salary'];
}

addEmployee(1, 'Alice', 'Manager', 8000, 2000);
addEmployee(2, 'Bob', 'Engineer', 5000);
addEmployee(3, 'Charlie', 'Intern', 2000);

echo calculateSalary(1); // Output: 10000
```

### OOP Example:

``` php

```

### Comparison:

| **Feature**             | **Procedural Programming** | **Object-Oriented Programming** |
| ----------------------- | -------------------------- |---------------------------------|
| **Approach**            | Function-based             | Object-based                    |
| **Data and Behavior**   | Separate                   | Combined in objects             |
| **Code Reusability**    | Limited                    | High (inheritance)              |
| **Ease of Maintenance** | Difficult as programs grow | Easier due to modularity        |



### 2. Basic Concepts of OOP
### 2.1 Classes and Objects
## Classes

- **Classes** : are used to group the code that handles a certain topic into one place.
It is a template for creating objects, providing initial values for state
(properties/attributes) and implementations of behavior methods.
- **Objects:** Instances of a class, representing specific entities with their own data and behavior.

```php
class YouCodeMember {
    // Properties/Attributes
    // Public property
    public $name;

    // Protected property
    protected $age;
    // Private property
    private $role;

    // Method to display member information
    public function displayInfo() {
        return "Name: {$this->name}, Age: {$this->age}, Role: {$this->role}";
    }
}
```
```php

// Creating an object (instance) of the YouCodeMember class
$member1 = new YouCodeMember("Khalid oukha", 25, "Student");

// Accessing properties and calling methods of the object
echo $member1->displayInfo(); // Output: Name: khalid oukha, Age: 25, Role: Student

```
---Constructor

### 2.2 Properties and Methods

- **Properties:** Variables that hold the state or attributes of an object.
- **Methods:** Functions defined within a class that describe the object's behavior.
---

### 2.3 The `$this` Keyword

- `$this` refers to the current instance of the class and is used to access properties and methods within the class.

---

### 2.4 Constructors and Destructors

- **Constructor:** A special method that initializes an object when it is created.
- **Destructor:** A special method that is automatically called when an object is no longer in use.

Example:

```php
class User {
    public $username;
    public function __construct($username) {
        $this->username = $username;
        echo "User {$this->username} created.\n";
    }

    public function __destruct() {
        echo "User {$this->username} destroyed.\n";
    }
}

$user = new User("Alice"); // Output: User Alice created.
// When the script ends, the destructor is called:
// Output: User Alice destroyed.
```
# 3. Core Principles of OOP

## 3.1 Encapsulation

Encapsulation is the principle of bundling data (properties) and methods (functions) that operate on the data into a single unit, typically a class. It also restricts direct access to some of an object's components, which helps prevent unintended interference and misuse.

### Key Features:

- **Access Modifiers**: Control the visibility of properties and methods:
  - `public`: Accessible from anywhere.
  - `protected`: Accessible only within the class and its subclasses.
  - `private`: Accessible only within the class.
  - 
## Access private properties

To access `private` properties from outside the class, we use publicly defined
setters and getters. Using private properties limit the possible interaction to
our private properties from public scope. 
```php
    // Getters and setters for protected property $age
    public function getAge() {
        return $this->age;
    }

    public function setAge($newAge) {
        $this->age = $newAge;
    }

    // Getters and setters for private property $role
    public function getRole() {
        return $this->role;
    }

    public function setRole($newRole) {
        $this->role = $newRole;
    }

```
---

## 3.2 Inheritance

Inheritance allows a class (child class) to inherit properties and methods from another class (parent class). It promotes code reuse and establishes a hierarchical relationship between classes.

### Key Features:

- The `extends` keyword is used to create a child class.
- A child class can override methods from the parent class.

---

## 3.3 Polymorphism

Polymorphism enables one interface to be used for a general class of actions, making code more flexible and reusable. It is achieved through method overriding or implementing interfaces.

### Key Features:

- **Method overriding**: A child class provides a specific implementation for a method in the parent class.
- **Interfaces**: Define a contract that implementing classes must adhere to.
- - **Method overloading**: A class can have multiple methods with the same name but different parameter lists (number, type, or order of parameters), allowing methods to perform similar or varied tasks based on the input.

#### Example 1: Child Class Overrides Parent Method and Adds Additional Logic

In this example, the `Dog` class overrides the `speak` method of the `Animal` class to add extra logic while keeping the base behavior.

```php
class Animal {
    public function speak() {
        echo "Animal speaks.\n";
    }
}

class Dog extends Animal {
    public function speak() {
        // Retain parent behavior
        parent::speak();
        // Add additional logic
        echo "Dog barks.\n";
    }
}

$dog = new Dog();
$dog->speak(); 
// Outputs:
// Animal speaks.
// Dog barks.
```

#### Example 2: Interface Implementation

Here, two classes (`Circle` and `Square`) implement a `Shape` interface and provide their specific implementation for the `draw` method.

```php
interface Shape {
    public function draw();
}

class Circle implements Shape {
    public function draw() {
        echo "Drawing a Circle.\n";
    }
}

class Square implements Shape {
    public function draw() {
        echo "Drawing a Square.\n";
    }
}

$circle = new Circle();
$circle->draw(); // Outputs: Drawing a Circle.

$square = new Square();
$square->draw(); // Outputs: Drawing a Square.
```

---


## 3.4 Abstraction

Abstraction focuses on exposing only the essential features of an object while hiding the unnecessary details. It is implemented using abstract classes or interfaces.

### Key Features:

- **Abstract Classes**: Serve as a blueprint for other classes. Cannot be instantiated directly.
- **Interfaces**: Define a set of methods that implementing classes must include.

### Example of Abstract Classes:

Abstract classes can define both concrete methods (with implementation) and abstract methods (without implementation). A child class inheriting the abstract class must provide an implementation for the abstract methods.

```php
abstract class Vehicle {
    abstract public function move();

    public function fuelType() {
        echo "This vehicle uses fuel.\n";
    }
}

class Car extends Vehicle {
    public function move() {
        echo "Car is moving.\n";
    }
}

$car = new Car();
$car->move(); // Outputs: Car is moving.
$car->fuelType(); // Outputs: This vehicle uses fuel.
```

### Example of Interfaces:

Interfaces only declare methods and do not provide any implementation. A class that implements an interface must provide an implementation for all its methods.

```php
interface Flyable {
    public function fly();
}

class Airplane implements Flyable {
    public function fly() {
        echo "Airplane is flying.\n";
    }
}

class Bird implements Flyable {
    public function fly() {
        echo "Bird is flying.\n";
    }
}

$plane = new Airplane();
$plane->fly(); // Outputs: Airplane is flying.

$bird = new Bird();
$bird->fly(); // Outputs: Bird is flying.
```

### Key Differences Between Abstract Classes and Interfaces:

| Feature                  | Abstract Classes                            | Interfaces                             |
|--------------------------|---------------------------------------------|---------------------------------------|
| **Inheritance**          | A class can inherit only one abstract class | A class can implement multiple interfaces |
| **Implementation**       | Can have both abstract and concrete methods | All methods must be abstract            |
| **Properties**           | Can have properties with access modifiers  | Cannot have properties                  |
| **Default Method Logic** | Can provide default method implementations  | Cannot provide any method implementations |

---

mainly as utilities. The following are the main use cases for them:
## Static Methods and Properties

Static methods and properties are those properties with the `static` keyword in front of them. They enable us to approach methods and properties of a class without the need to first create an object out of the class. They are used mainly as utilities. The following are the main use cases for them:

### Example of Static Methods with `self` Keyword

Static methods can call other static methods or access static properties using the `self` keyword. This is useful when logic does not depend on instance-specific data.

```php
class Example {
    // Static property
    private static $greeting = "Hello";

    // Static method
    public static function sayHello() {
        return self::$greeting . " from static method!";
    }
}

// Calling the static method externally
echo Example::sayHello();
// Outputs: Hello from static method!
```

### When to Use Static Methods and Properties

1. **Utility Functions**:
2. **Shared State or Behavior**:
4. **Helper Classes**:


### Key Considerations for Static Usage

- **Not for Instance-Specific Logic**: Avoid static methods if the logic requires or modifies the state of individual objects.

## Traits

Traits are a mechanism for code reuse. A Trait is intended to reduce some
limitations of single inheritance by enabling a developer to reuse sets of
methods freely in several independent classes living in different class
hierarchies. 

A Trait is similar to a class, but only intended to group functionality in a
fine-grained and consistent way. It is not possible to instantiate a Trait on
its own.

Some people refer to traits as "like an automatic CTRL+C/CTRL+V for your
classes". You specificity some methods in a trait and "import" them into your
class. It will make your code behave like the methods were written inside your
class.

When using a trait, we should be on the lookout for code duplication and for
naming conflicts that are the result of calling the methods in different traits
with the same name. 

Imagine you are building a project where multiple classes (e.g., `User` and `Order`) need logging functionality.

```php
trait Logger {
    public function log($message) {
        echo "[LOG]: $message\n";
    }
}

class User {
    use Logger;

    public function createUser($name) {
        $this->log("Creating user: $name");
        echo "User '$name' created.\n";
    }
}

class Order {
    use Logger;

    public function createOrder($orderId) {
        $this->log("Creating order: $orderId");
        echo "Order '$orderId' created.\n";
    }
}

// Using the classes
$user = new User();
$user->createUser("Alice");
// Outputs:
// [LOG]: Creating user: Alice
// User 'Alice' created.

$order = new Order();
$order->createOrder("12345");
// Outputs:
// [LOG]: Creating order: 12345
// Order '12345' created.
```

## Namespaces and code integration

Namespaces and code integration are used when the project grow in complexity,
and we need to start organizating our code and integrate them from different
resources. Or when we have multiple class or methods with the same name.
* Syntax for Declaring a Namespace:
````php
namespace Youcode; 

````
* Example of Setting a Namespace in a PHP File:

````php
namespace YourNamespace;

class YouCodeMember {
    // Class code here...
}

````
* using namespace

````php 
// File: index.php

require_once 'YourNamespace/YouCodeMember.php'; // Include the file containing the namespaced class

use YourNamespace\YouCodeMember; // Import the class with the "use" statement

// Create an object (instance) of the class
$member = new YouCodeMember();

// Access methods and properties of the object
// $member->methodName();
// $member->propertyName;

````
## Autoload

* PHP autoloading eliminates the need to explicitly include or require files containing class definitions.
It dynamically loads class files when a class is first used in the code.

* PHP provides autoloading functions (spl_autoload_register or __autoload) that allow developers to register custom autoloaders.
The autoloading functions are responsible for finding and including the necessary class files based on the class name.

````php
spl_autoload_register(function ($className) {
    $path = __DIR__ . '/classes/' . str_replace('\\', '/', $className) . '.php';
    if (file_exists($path)) {
        require_once $path;
    }
});

````

## Principes SOLID 
### 1. Single Responsibility Principle (SRP)
* This principle states that a class should have only one reason to change. In other words, a class should have only one responsibility.

### 2. Open/Closed Principle (OCP)
* This principle suggests that software entities should be open for extension but closed for modification. It encourages the extension of behavior without modifying existing code.

### 3. Liskov Substitution Principle (LSP)
* The LSP emphasizes that objects of a derived class should be usable as objects of the base class without altering the correctness of the program.

### 4. Interface Segregation Principle (ISP)
* This principle advocates splitting larger interfaces into smaller and specific interfaces, thereby avoiding forcing classes to implement unused methods.

### 5. Dependency Inversion Principle (DIP)
* The DIP promotes depending on abstractions rather than implementation details. High-level modules should not depend on low-level modules but on abstractions.

