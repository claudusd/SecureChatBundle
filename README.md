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

Add in your `app/autoload.php` file:

    use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
    AnnotationDriver::registerAnnotationClasses();

Add in your `app/AppKernel.php` file:

    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Doctrine\Bundle\MongoDBBundle\DoctrineMongoDBBundle(),
            new Claudusd\SecuredChat\ClaudusdSecureChatBundle(),
        );
        // ...
    }

Add in your `app/config/config.yml` file:

    doctrine_mongodb:
        connections:
            default:
                server: mongodb://localhost:27017
                options: {}
        default_database: test_database
        document_managers:
            default:
                auto_mapping: true

