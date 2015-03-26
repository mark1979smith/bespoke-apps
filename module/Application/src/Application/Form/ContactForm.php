<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 26/03/2015
 * Time: 20:05
 */

namespace Application\Form;


use Zend\Form\Form;

class ContactForm  extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('contact');

        /**
         * Name
         */
        $this->add([
            'name' => 'Name',
            'type' => 'Text',
            'attributes' => [
                'placeholder'       => 'Name:',
                'data-constraints'  => '@NotEmpty @Required @AlphaSpecial'
            ]
        ]);

        /**
         * Email
         */
        $this->add([
            'name' => 'Email',
            'type' => 'Text',
            'attributes' => [
                'placeholder'       => 'Email:',
                'data-constraints'  => '@NotEmpty @Required @Email'
            ]
        ]);

        /**
         * Telephone
         */
        $this->add([
            'name' => 'Telephone',
            'type' => 'Text',
            'attributes' => [
                'placeholder'       => 'Telephone:',
                'data-constraints'  => '@NotEmpty @Required'
            ]
        ]);

        /**
         * Message
         */
        $this->add([
            'name' => 'Details',
            'type' => 'Textarea',
            'attributes' => [
                'placeholder'       => 'Details:',
                'data-constraints'  => '@NotEmpty @Required'
            ]
        ]);

        /**
         * Submit Button
         */
        $this->add([
            'name' => 'Submit',
            'type' => 'Submit',
            'attributes' => [
                'value'             => 'Get a quote!',
                'data-type'         => 'submit',
                'class'             => 'btn'
            ]
        ]);

    }



}