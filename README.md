<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Basic Project Template</h1>
    <br>
</p>

Yii 2 Basic Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
rapidly creating small projects.

The template contains the basic features including user login/logout and a contact page.
It includes all commonly used configurations that would allow you to focus on adding new
features to your application.

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-basic.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-basic)



REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.4.0.

APPAsset

<pre><code>
    vendor/font-awesome/css/font-awesome.min.css,
    vendor/bootstrap/css/bootstrap.min.css,
    vendor/metisMenu/metisMenu.min.css,
    dist/css/sb-admin-2.css

    vendor/jquery/jquery.min.js,
    vendor/bootstrap/js/bootstrap.min.js,
    vendor/metisMenu/metisMenu.min.js,
    dist/js/sb-admin-2.js
</code></pre>

INSTALLATION
------------

### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this project template using the following command:

DIRECTORY STRUCTURE
-------------------

<pre><code>

  assets/             contains assets definition
  commands/           contains console commands (controllers)
  config/             contains application configurations
  controllers/        contains Web controller classes
  mail/               contains view files for e-mails
  models/             contains model classes
  modules/            contains modules  
    financeiro/       contains module classe
        controllers/  contains Web controller classes
        models/       contains model classes
        views/        contains view files for the Web application  
  runtime/            contains files generated during runtime
  tests/              contains various tests for the basic application
  vendor/             contains dependent 3rd-party packages
  views/              contains view files for the Web application
  web/                contains the entry script and Web resources

</code></pre>

DB
--

<pre><code>

    CREATE TABLE tipo
(
    id INT NOT NULL,
    tipo VARCHAR (50) NOT NULL,
    CONSTRAINT  PRIMARY KEY (id),
)

CREATE TABLE categoria
(
    id INT NOT NULL, 
    categoria VARCHAR (50)  NOT NULL,
    id_tipo INT NOT NULL, 
    CONSTRAINT  PRIMARY KEY (id),
    CONSTRAINT  FOREIGN KEY (id_tipo),        
)

CREATE TABLE situacao
(
    id INT NOT NULL,
    situacao VARCHAR (50)  NOT NULL,
    CONSTRAINT PRIMARY KEY (id),
)

CREATE TABLE lancamento
(
    id INT NOT NULL,
    descricao VARCHAR (50)  NOT NULL,
    valor DOUBLE  NOT NULL,
    validade DATE NOT NULL,
    id_tipo INT NOT NULL, 
    id_categoria INT NOT NULL,
    id_situacao INT NOT NULL,
    CONSTRAINT  PRIMARY KEY (id),
    CONSTRAINT  FOREIGN KEY (id_categoria),
    CONSTRAINT  FOREIGN KEY (id_situacao),
    CONSTRAINT  FOREIGN KEY (id_tipo),      
)

</code></pre>
