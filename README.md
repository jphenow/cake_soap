## Introduction

This is a basic example of CakePHP using SoapSource to connect to a WSDL SOAP service so we can use it for our models. It luckily doesn't affect much of our work aside from configuration and a little tweaking, possibly, in the model.

## Where to look

My main changes that are of interest in this example are available in app/{models/game.php,controllers/game_controller.php}

If you're really here out of interest for the soap example, though, most of the interesting is within the model.

## A little explanation

This is something I created as a code example for a company, so there's a decent amount of logic that you may just accept as something thats relatively unrelated to the SOAP example portion of this. I just figured I'd share my learning about my use of SoapSource. 

I'm planning to clear out some of that extra stuff to make it more of an example-only repo.

## You also need:

You'll also need to add this to your databse.php:
    class DATABASE_CONFIG {
        var $soap = array(
            'datasource' => 'soap',
            'wsdl' => 'http://change.me'
        );
    }

You may wish to have a look directly at [SoapSource](https://github.com/Pagebakers/soapsource) for additional options.

### Me

Jon Phenow j.phenow@gmail.com
