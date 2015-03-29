<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 26/03/2015
 * Time: 20:03
 */

namespace Application\Model;


use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class ContactForm implements InputFilterAwareInterface
{
    /**
     * Client Name
     * @var string
     */
    public $name;

    /**
     * Client Email Address
     * @var string
     */
    public $email;

    /**
     * Client Telephone
     * @var string
     */
    public $telephone;

    /**
     * Client Requirements
     * @var string
     */
    public $details;

    /**
     * @var InputFilter
     */
    protected $inputFilter;

    public function exchangeArray($data)
    {
        $this->name = (isset($data['Name']))            ? $data['Name'] : null;
        $this->email = (isset($data['Email']))          ? $data['Email'] : null;
        $this->telephone = (isset($data['Telephone']))  ? $data['Telephone'] : null;
        $this->details = (isset($data['Details']))      ? $data['Details'] : null;
    }

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();

            $inputFilter->add([
                'name'     => 'Name',
                'required' => true,
                'filters'  => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
                'validators' => [
                    [
                        'name'    => 'StringLength',
                        'options' => [
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ],
                    ],
                ],
            ]);

            $inputFilter->add([
                'name'     => 'Email',
                'required' => true,
                'filters'  => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
                'validators' => [
                    [
                        'name'    => 'EmailAddress',
                        'options' => array(
                            'domain' => false,
                            'messages' => array(
                            )
                        )
                    ],
                ],
            ]);

            $inputFilter->add([
                'name'     => 'Telephone',
                'required' => true,
                'filters'  => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
                'validators' => [
                    [
                        'name'    => 'StringLength',
                        'options' => [
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 15,
                        ],
                    ]
                ],
            ]);


            $inputFilter->add([
                'name'     => 'Details',
                'required' => true,
                'filters'  => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
                'validators' => [
                    [
                        'name'    => 'StringLength',
                        'options' => [
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                        ],
                    ],
                ],
            ]);

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }

    public function __toString()
    {
        return 'Name: ' . $this->name . PHP_EOL .
                'Email: '. $this->email . PHP_EOL .
                'Telephone: '. $this->telephone . PHP_EOL .
                'Details: ' . $this->details;
    }

}