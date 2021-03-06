<?php
/**
 * YAWIK
 *
 * @filesource
 * @license MIT
 * @copyright  2013 - 2015 Cross Solution <http://cross-solution.de>
 */
  
/** */
namespace Organizations\Entity;

use Core\Entity\AbstractEntity;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * Employees' Permissions.
 *
 * @ODM\EmbeddedDocument
 * @author Mathias Gelhausen <gelhausen@cross-solution.de>
 * @todo write test
 * @since 0.18
 */
class EmployeePermissions extends AbstractEntity implements EmployeePermissionsInterface
{
    /**
     * The permissions bitmask.
     *
     * Default is EmployeePermissionsInterface::JOBS_VIEW | ~:APPLICATIONS_VIEW
     *
     * @var int
     * @ODM\Int
     */
    protected $permissions;

    /**
     * Creates a instance.
     *
     * @param int $permissions Permissions bit mask
     */
    public function __construct($permissions = 18)
    {
        $this->setPermissions($permissions);
    }

    public function setPermissions($bitmask)
    {
        // TODO: Sanity checks.
        $this->permissions = $bitmask;

        return $this;
    }

    public function getPermissions()
    {
        return $this->permissions;
    }

    public function grant($permission)
    {
        if (!is_array($permission)) {
            $permission = func_get_args();
        }

        $permissions = $this->getPermissions();
        foreach ($permission as $flag) {
            $permissions |= $flag;
        }

        return $this->setPermissions($permissions);
    }

    public function revoke($permission)
    {
        if (!is_array($permission)) {
            $permission = func_get_args();
        }

        $permissions = $this->getPermissions();
        foreach ($permission as $flag) {
            $permissions = $permissions & ~$flag;
        }

        return $this->setPermissions($permissions);
    }

    public function grantAll()
    {
        return $this->setPermissions(self::ALL);
    }

    public function revokeAll()
    {
        return $this->setPermissions(self::NONE);
    }

    public function isAllowed($permission)
    {
        $permissions = $this->getPermissions();

        return ($permissions & $permission) == $permission;
    }
}