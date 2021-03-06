<?php
/**
 * YAWIK
 *
 * @filesource
 * @license MIT
 * @copyright  2013 - 2015 Cross Solution <http://cross-solution.de>
 */
  
/** */
namespace Organizations\Form;

use Core\Entity\Hydrator\EntityHydrator;
use Core\Form\Hydrator\Strategy\CollectionStrategy;
use Core\Form\ViewPartialProviderInterface;
use Zend\Form\Fieldset;

/**
 * ${CARET}
 * 
 * @author Mathias Gelhausen <gelhausen@cross-solution.de>
 * @todo write test
 * @since 0.18
 */
class EmployeesFieldset extends Fieldset implements ViewPartialProviderInterface
{

    protected $partial = 'organizations/form/employees-fieldset';

    public function setViewPartial($partial)
    {
        $this->partial = (string) $partial;

        return $this;
    }

    public function getViewPartial()
    {
        return $this->partial;
    }

    /**
     * Initializes the fieldset.
     */
    public function init()
    {
        $this->setName('employees');

        $this->add(array(
            'name' => 'searchusers',
            'type' => 'Auth/UserSearchbar',
            'options' => array(
                'description' => /*@translate*/ 'Search for registered users.',
            ),
        ));

        $this->add(array(

            'type' => 'Collection',
            'name' => 'employees',
            'options' => array(
                'count' => 0,
                'should_create_template' => true,
                'use_labeled_items' => false,
                'allow_add' => true,
                'renderFieldset' => true,
                'target_element' => array(
                    'type' => 'Organizations/EmployeeFieldset'
                )
            ),
        ));
        /*@todo needs to be in factory*/
        $hydrator = new EntityHydrator();
        $hydrator->addStrategy('employees', new CollectionStrategy());
        $this->setHydrator($hydrator);
    }
}
