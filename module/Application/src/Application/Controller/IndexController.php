<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Form\ContactForm;
use Application\Model\ContactForm as ContactFormModel;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mail\Message;
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $contact_form = new ContactForm();
        $request = $this->getRequest();

        if ($request->isPost()) {
            $contact_form_model = new ContactFormModel();
            $contact_form->setInputFilter($contact_form_model->getInputFilter());
            $contact_form->setData($request->getPost());

            if($contact_form->isValid()) {
                $contact_form_model->exchangeArray($contact_form->getData());

                $config = $this->getServiceLocator()->get('config');
                $message = new Message();
                $message->addTo($config['email']['defaults']['to_address'])
                    ->addFrom($config['email']['defaults']['from_address'])
                    ->setSubject('Order Requirements')
                    ->setBody($contact_form_model);
                $transport = new SmtpTransport();
                $options = new SmtpOptions(
                    $config['email']['auth']
                );
                $transport->setOptions($options);
                $transport->send($message);

                $this->redirect('home');
            }
        }
        return [
            'contact_form' => $contact_form
        ];
    }
}
