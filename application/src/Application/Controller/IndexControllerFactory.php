<?php
/**
 * zf2x (http://zf2x.trueaxiom.co.uk/)
 *
 * @link      http://github.com/trueaxiom/zf2x for the canonical source repository
 * @copyright Copyright (c) 2013 True Axiom Limited UK. (http://www.trueaxiom.co.uk)
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace Application\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class IndexControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $controller     = new IndexController;
        $services       = $serviceLocator->getServiceLocator();
        $forms          = $services->get('FormElementManager');
        $joinForm       = $forms->get('zf2x.user.form.join');
        $loginForm      = $forms->get('zf2x.user.form.login');
        $userService    = $services->get('zf2x.user.service');
        $controller->setUserLoginForm($loginForm);
        $controller->setUserJoinForm($joinForm);
        $controller->setUserService($userService);

        return $controller;
    }
}
