<?php
/**
 * YAWIK
 * 
 * @filesource
 * @copyright (c) 2013-2015 Cross Solution (http://cross-solution.de)
 * @license   MIT
 * @author    weitz@cross-solution.de
 */

namespace JobsTest\Controller;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;
/*

use Zend\Loader\ClassMapAutoloader;
use Zend\Loader\AutoloaderFactory;
use Zend\ServiceManager\ServiceManager;
use Zend\View\HelperPluginManager;
use Auth\Service\AuthViewHelperFactory;

use Zend\Console\Console;
use Zend\EventManager\StaticEventManager;
use Zend\Http\Request as HttpRequest;
use Zend\Mvc\Application;
use Zend\Mvc\MvcEvent;
*/

/**
 * Class ImportControllerTest
 * @package JobsTest\Controller
 */
class ImportControllerTest extends AbstractHttpControllerTestCase
{
    /**
     * setup
     */
    public function setUp()
    {
        ////AutoloaderFactory::factory(array('Zend\Loader\ClassMapAutoloader'=>array(array('ImportControllerTest' => __FILE__ ))));

        //$config = include '../config/config.php';

        ////$config['listeners'][] = 'testCaseListener';
        ////$config['service_manager']['instances']['testCaseListener'] = 'ImportControllerTest';
        ////$config['service_manager']['services']['Auth/CheckPermissionsListener'] = 'White Bunny';

        //$this->setApplicationConfig(
        //     $config
        //);
        parent::setUp();

        //$sm = new ServiceManager();
        //$checkPermissionsListener = $this->getMock('Zend\EventManager\ListenerAggregateInterface');
        //$sm->setService('Auth/CheckPermissionsListener', $checkPermissionsListener);


        /*
        $f = new Factory();
        $sm = new ServiceManager();
        $auth = $this->getMock('\Zend\Authentication\AuthenticationService');
        $sm->setService('AuthenticationService', $auth);

        $hm = new HelperPluginManager();
        $hm->setServicelocator($sm);


        $helper = $f->createService($hm);

        $this->assertInstanceOf('\Auth\View\Helper\Auth', $helper);
        $this->assertSame($auth, $helper->getService());
        */
    }

    /*
    public function getApplication()
    {
        if ($this->application) {
            return $this->application;
        }
        $appConfig = $this->applicationConfig;
        Console::overrideIsConsole($this->getUseConsoleRequest());
        //$this->application = Application::init($appConfig);

        $smConfig = isset($configuration['service_manager']) ? $configuration['service_manager'] : array();
        $listeners = isset($configuration['listeners']) ? $configuration['listeners'] : array();
        $serviceManager = new ServiceManager(new Service\ServiceManagerConfig($smConfig));
        $serviceManager->setService('ApplicationConfig', $configuration);
        $serviceManager->get('ModuleManager')->loadModules();
        // TODO Mocks
        return $serviceManager->get('Application')->bootstrap($listeners);


        $events = $this->application->getEventManager();
        $events->detach($this->application->getServiceManager()->get('SendResponseListener'));

        return $this->application;
    }
    */

    /**
     *
     */
    public function testImportActionCanBeAccessed()
    {
        $this->assertTrue(True);

        /*
        $this->dispatch('/');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('application');
        $this->assertControllerName('application_index');
        $this->assertControllerClass('IndexController');
        $this->assertMatchedRouteName('home');
        */
    }

}