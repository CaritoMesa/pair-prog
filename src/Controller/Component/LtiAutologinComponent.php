<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Event\Event;

/**
 * LtiLogin component
 *
 * Odpowiada za logowanie użytkownika
 * jeżeli zapytanie jest zapytaniem lti.
 *
 * Jeżeli użytkownik był wcześniej zalogowany zostanie wylogowany
 */
class LtiAutologinComponent extends Component
{
    public $components = ['Auth'];    

    public function beforeFilter(Event $event)
    {
        $request = $event->subject()->request;

        if ($request->is('post') && 
            $request->data('lti_message_type') === 'basic-lti-launch-request' 
        ) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
            }
        }
    }
}
