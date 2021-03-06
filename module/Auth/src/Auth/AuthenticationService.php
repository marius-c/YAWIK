<?php
/**
 * YAWIK
 *
 * @filesource
 * @copyright (c) 2013-2015 Cross Solution (http://cross-solution.de)
 * @license   MIT
 */
namespace Auth;

use Zend\Authentication\AuthenticationService as ZendAuthService;
use Zend\Authentication\Adapter\AdapterInterface;
use Core\Repository\RepositoryInterface;
use Auth\Entity\AnonymousUser;

class AuthenticationService extends ZendAuthService {

    protected $user;
    /**
     * @var RepositoryInterface;
     */
    protected $repository;

    /**
     * @param RepositoryInterface $repository
     */
    public function __construct(RepositoryInterface $repository) {
        $this->setRepository($repository);
    }

    /**
     * @return RepositoryInterface
     */
    public function getRepository() {
        return $this->repository;
    }

    /**
     * @param RepositoryInterface $repository
     * @return $this
     */
    public function setRepository($repository) {
        $this->repository = $repository;
        return $this;
    }

    /**
     * @return AnonymousUser
     * @throws \OutOfBoundsException
     */
    public function getUser() {
        if (!$this->user) {
            if ($this->hasIdentity() && ($id = $this->getIdentity())) {
                $user = $this->getRepository()->find($id);
                if (!$user) {
                    throw new \OutOfBoundsException('Unknown user id: ' . $id);
                }
                $this->user = $user;
            } else {
                $this->user = new AnonymousUser();
            }
        }

        return $this->user;
    }

    /**
     * @param AdapterInterface $adapter
     * @return \Zend\Authentication\Result
     */
    public function authenticate(AdapterInterface $adapter = null) {
        $this->user = null; // clear user (especially guest user)
        return parent::authenticate($adapter);
    }

}