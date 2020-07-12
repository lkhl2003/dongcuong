Entity Word
-----------------

CONTENTS OF THIS FILE
---------------------

 * Introduction
 * Requirements
 * Recommended modules
 * Installation
 * Configuration

INTRODUCTION
------------

This module is used to download the node content into word document.
Entity Word can create a word document from node entity based on title and body.
URL to use: /entity-word/{node_id}/word in your required twig file
to download the entity content.
Example: /entity-word/10/word

REQUIREMENTS
------------

PhpWord library is used to convert node content into word document(docx).
It will be installed automatically with modules installation.

RECOMMENDED MODULES
-------------------

There is not a required recommended modules.

INSTALLATION
------------

Use [Composer](https://getcomposer.org/) to get entity word
(https://www.drupal.org/project/entity_word).

  ```
  composer require drupal/entity_word

  ```

CONFIGURATION
-------------

Configure the word document setting in Administration » Configuration » System.
Set the file name of docx using node token from Filename for generated
word document.
Choose the paper settings from drop-down.
Set the font family, font size and color of the font from Title Font Settings.
Add the inline style to the node content from paragraph style.
