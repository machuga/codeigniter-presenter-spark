Presenter Spark
====================

Presenter is designed to allow you to implement the presenter pattern
easily in your CodeIgniter views.

Installation
------------

### Sparks Manager

In your shell, navigate to the root of your CodeIgniter project and run

    php tools/spark install presenter

### Manually 

* Navigate to your CodeIgniter project's 'sparks' folder
* Extract the presenter spark here, ensure it is named 'presenter'

### Additionally

Be sure to create a directory named 'presenters' in your application folder

How To
------------

You may choose to either autoload the spark, or load it manually via
    
    $this->load->spark('presenter/<version_number>');

To load the presenter, use:

    $this->presenter->load('user', $user)

The second parameter is optional, and may be loaded as an individual
instance later via:
    
    $user_presenter = new User_Presenter($user);

Conventionally, if you have a 'User' model, you would name the presenter
'User_Presenter', and the file name 'user_presenter.php'.  For
clarification, it is assumed that the presenter will be named the same
as your model, and the file name will be all lowercase.

Examples coming soon!


Contact and Credit
-----------------

This spark was created and is maintained by 
[Matthew Machuga](http://matthewmachuga.com), is hosted on [GitHub](http://github.com),
and is made possible by the [GetSparks](http://getsparks.org) team.  Please support their project!
