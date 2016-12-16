<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Event\Event;
use Cake\I18n\I18n;

I18n::locale('es');

/**
 * LtiLogin component
 *
 * Responsable de inicio de sesión de usuario
 * si la consulta está pidiendo lti.
 *
 * Si había iniciado una sesión previamente será sacado fuera
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
