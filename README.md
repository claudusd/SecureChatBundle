SecureChatBundle
================
The **SecureChatBundle** bundle create an API to chat with people with message encrypted.

## Installation ##
Add this bundle to your `composer.json` file:

	"require": {
        "claudusd/SecureChatBundle": "*"
    },
    "repositories": [
        {
            "type": "vcs",
            "url":  "https://github.com/claudusd/SecureChatBundle.git"
        }
    ]

Add in your `app/autoload.php` file :

use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
AnnotationDriver::registerAnnotationClasses();

