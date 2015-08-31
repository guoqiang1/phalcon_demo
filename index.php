<?php
//phpinfo();
//die;
use Phalcon\Loader;
use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Application;
use Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;

try {

    $loader = new \Phalcon\Loader();
    $loader->registerDirs(array(
        './app/controllers/',
        './app/models/',
        './app/config/'
    ))->register();

    $di = new Phalcon\DI\FactoryDefault();
    //视图
    $di->set('view', function(){
        $view = new \Phalcon\Mvc\View();
        $view->setViewsDir('./app/views/');
        return $view;
    });
    //url
    $di->set('url', function(){
        $url = new \Phalcon\Mvc\Url();
        $url->setBaseUri('/phalcon/');
        return $url;
    });
    //数据库连接
    $di->set('db', function () {
        return new DbAdapter(array(
            "host"     => "localhost",
            "username" => "root",
            "password" => "root",
            "dbname"   => "phalcon",
	    'charset'=>'utf8'
        ));
    });
    $application = new \Phalcon\Mvc\Application($di);
    echo $application->handle()->getContent();
} catch(\Phalcon\Exception $e) {
     echo "PhalconException: ", $e->getMessage();
}