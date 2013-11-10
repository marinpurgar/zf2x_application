<?php
/**
 * zf2x (http://zf2x.trueaxiom.co.uk/)
 *
 * @link      http://github.com/trueaxiom/zf2x for the canonical source repository
 * @copyright Copyright (c) 2013 True Axiom Limited UK. (http://www.trueaxiom.co.uk)
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace Application\Controller;

use Zend\Form\Form;
use ZF2x\User\Entity\User;
use Zend\View\Model\ViewModel;
use ZF2x\User\Service as UserService;
use ZF2x\User\Dispatcher\CreateUserCommand;
use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController
{
    /**
     * User Service
     *
     * @var ZF2x\User\Service
     */
    protected $userService;

    /**
     * User Login Form
     *
     * @var \Zend\Form\Form
     */
    protected $userLoginForm;

    /**
     * User Join Form
     *
     * @var \Zend\Form\Form
     */
    protected $userJoinForm;

    /**
     * Join Action
     *
     * @return \Zend\View\Model\ViewModel|\Zend\Http\Response
     */
    public function joinAction()
    {
        $form = $this->getUserJoinForm();
        $user = new User;
        $form->bind($user);
        if ($this->getRequest()->isPost()) {
            $form->setData($this->getRequest()->getPost());
            if ($form->isValid()) {
                $userService = $this->getUserService();
                $user = $userService->create($user);
                $redirect = $this->aclRedirect();
                if ($redirect) {
                    return $redirect;
                }
            }
        }
        return new ViewModel(
            array(
                'joinForm'  => $form,
                'loginForm' => $this->getUserLoginForm(),
            )
        );
    }

    /**
     * Login Action
     *
     * @return \Zend\View\Model\ViewModel|\Zend\Http\Response
     */
    public function loginAction()
    {
        $form = $this->getUserLoginForm();
        if ($this->getRequest()->isPost()) {
            $form->setData($this->getRequest()->getPost());
            if ($form->isValid()) {
                $redirect = $this->aclRedirect();
                if ($redirect) {
                    return $redirect;
                }
            }
        }
        return new ViewModel(
            array(
                'form' => $form,
            )
        );
    }

    /**
     * Logout Action
     *
     * @return \Zend\View\Model\ViewModel|\Zend\Http\Response
     */
    public function logoutAction()
    {
        $user = $this->identity('ZF2x\User\Entity\User');
        $userService = $this->getUserService();
        $userService->logout($user);
        $redirect = $this->aclRedirect();
        if ($redirect) {
            return $redirect;
        }

        return new ViewModel();
    }

    /**
     * Dashboard Action
     *
     * @return \Zend\View\Model\ViewModel|\Zend\Http\Response
     */
    public function dashboardAction()
    {
        return new ViewModel();
    }


    /**
     * Gets the User Service.
     *
     * @return ZF2x\User\Service
     */
    public function getUserService()
    {
        return $this->userService;
    }

    /**
     * Sets the User Service.
     *
     * @param ZF2x\User\Service $userService the user service
     *
     * @return self
     */
    public function setUserService(UserService $userService)
    {
        $this->userService = $userService;

        return $this;
    }

    /**
     * Gets the User Login Form.
     *
     * @return \Zend\Form\Form
     */
    public function getUserLoginForm()
    {
        return $this->userLoginForm;
    }

    /**
     * Sets the User Login Form.
     *
     * @param \Zend\Form\Form $userLoginForm the user login form
     *
     * @return self
     */
    public function setUserLoginForm(Form $userLoginForm)
    {
        $this->userLoginForm = $userLoginForm;

        return $this;
    }

    /**
     * Gets the User Join Form.
     *
     * @return \Zend\Form\Form
     */
    public function getUserJoinForm()
    {
        return $this->userJoinForm;
    }

    /**
     * Sets the User Join Form.
     *
     * @param \Zend\Form\Form $userJoinForm the user join form
     *
     * @return self
     */
    public function setUserJoinForm(Form $userJoinForm)
    {
        $this->userJoinForm = $userJoinForm;

        return $this;
    }
}
