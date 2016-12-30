<?php

namespace App\Auth;

use Cake\Auth\BaseAuthenticate;
use Cake\Network\Request;
use Cake\Network\Response;
use Cake\ORM\TableRegistry;

use JacobKiers\OAuth\OAuthException;
use JacobKiers\OAuth\Request\Request as OAuthRequest;
use JacobKiers\OAuth\Server;
use JacobKiers\OAuth\SignatureMethod\HmacSha1;

/**
 * Metodos:
 * authenticate
 * unauthenticated
 * _createOAuthServer()
 * _getOAuthRequest()
 **/
class LtiAuthenticate extends BaseAuthenticate 
{
    public function authenticate(Request $_unused, Response $response) 
    {
        $server = $this->_createOAuthServer();

        try {
            $request = $this->_getOAuthRequest();
            $server->verifyRequest($request);
        } catch (OAuthException $e) {
            return false;
        }
        /**
         * Se indica el tipo respuesta lti
         **/
        if ($request->getParameter('lti_message_type') !== 'basic-lti-launch-request') {
            return false;
        }


        $users = TableRegistry::get('Users');

        $user = $users->find('all', [
            'conditions' => ['Users.lti_user_id' => $request->getParameter('user_id')]
        ])->first();
		/**
		 * Si el usuario lti no existe en el sistema 
		 * será creado obteniendo los datos de autenticacion.   
		 *   
		 * Si el usario ya existe no requiere ser creado nuevamente
		 * se ultilizará el existente  
		 **/
        if (empty($user)) {
            if (!$request->getParameter('lis_person_name_given') ||
                !$request->getParameter('lis_person_name_family')
            ) {
                return false;
            }

            $user = $users->newEntity([
                'first_name' => $request->getParameter('lis_person_name_given'),
                'last_name' => $request->getParameter('lis_person_name_family'),
                'lti_user_id' => $request->getParameter('user_id'),
            	'email' => $request->getParameter('lis_person_contact_email_primary'),
                'username' => $request->getParameter('custom_username')
            ]);

            if ($user->errors()) {
                return false; 
            }

            $users->save($user);
        }

        $hasAccessTo = explode(',', $request->getParameter('custom_access'));

        foreach ($hasAccessTo as $key => $value) {
            $hasAccessTo[$key] = trim($value);
        }

        return $user->toArray() + [ 'has_access_to' => $hasAccessTo ];
    }

    /**
     * En caso de no ser autenticado se enviará mensaje de error
     **/
    public function unauthenticated(Request $request, Response $response)
    {
        if ($request->is('post') && $request->data['lti_message_type'] === 'basic-lti-launch-request') {
            $response->statusCode(403);
            $response->body('403 Forbidden');
            return $response;
        }
        
        return null;
    }
    /**
     * funcion protegida
     * firma de autenticacion
     **/
    protected function _createOAuthServer()
    {
        $server = new Server(new DatabaseDataStore());
        $server->addSignatureMethod(new HmacSha1());
        return $server;
    }
    /**
     * funcion pretegida
     **/
    protected function _getOAuthRequest()
    {
        return OAuthRequest::fromRequest();
    }
}

