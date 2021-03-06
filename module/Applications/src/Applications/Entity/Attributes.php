<?php
/**
 * YAWIK
 *
 * @filesource
 * @copyright (c) 2013-2015 Cross Solution (http://cross-solution.de)
 * @license   MIT
 */

/**  */ 
namespace Applications\Entity;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Core\Entity\AbstractEntity;

/**
 * Holds various attributes like "send me a carbon copy" or "i accept the privacy policy".
 *
 * @author Mathias Gelhausen <gelhausen@cross-solution.de>
 * @ODM\EmbeddedDocument
 */
class Attributes extends AbstractEntity
{
    /**
     * 
     * @var boolean
     * @ODM\Boolean
     */
    protected $privacyPolicy;
    
    /**
     * 
     * @var boolean
     * @ODM\Boolean
     */
    protected $carbonCopy;
    
    public function setAcceptedPrivacyPolicy($flag)
    {
        $this->privacyPolicy = (bool) $flag;
        return $this;
    }
    
    public function getAcceptedPrivacyPolicy()
    {
        return $this->privacyPolicy;
    }
    
    public function setSendCarbonCopy($flag)
    {
        $this->carbonCopy = (bool) $flag;
        return $this;
    }
    
    public function getSendCarbonCopy()
    {
        return $this->carbonCopy;
    }
}
