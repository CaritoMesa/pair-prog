<?php

namespace App\Auth;

use Cake\Network\Request;
use Cake\Network\Response;
use Cake\Network\Exception\ForbiddenException;
use Cake\Auth\BaseAuthenticate;
use Cake\ORM\TableRegistry;

use JacobKiers\OAuth\Server;
use JacobKiers\OAuth\SignatureMethod\HmacSha1;
use JacobKiers\OAuth\Request\Request as OAuthRequest;
use JacobKiers\OAuth\OAuthException;

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

        if ($request->getParameter('lti_message_type') !== 'basic-lti-launch-request') {
            return false;
        }


        $users = TableRegistry::get('Users');

        $user = $users->find('all', [
            'conditions' => ['Users.lti_user_id' => $request->getParameter('user_id')]
        ])->first();

        //Si el usuario lti no existe en el sistema que debe ser en el
        //tiempo para crear dinámicamente. 
        //Otro ha iniciado sesión no requerirá la creación de un nuevo usuario -
        //ser utilizado ya creado
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
                'username' => $request->getParameter('user_id')
            ]);

            if ($user->errors()) {
                return false; 
            }

            $users->save($user);
        }

        //En este punto, puede dar los permisos de usuario, que recibieron
        //debido al hecho de que iniciar sesión para usar la plataforma educativa
        //Lti. Sobre la base de la custom_access parámetro, podemos asignar al usuario
        //ciertos poderes (por ej. el acceso al número de material 99)
        //Código de la muestra **podría** tener este aspecto
        //
        //if ($request->getParameter('custom_access') == 'material-nr-99') {
        //  $user->allowAccessToMaterial(99)
        //}
        //
        //$users->save($user)
        //
        //Sin embargo, en este ejemplo simplificado la tecla "custom_access 'es simplemente
        //ista de los nombres de los materiales (sitios web, artículos, sin embargo, no nombrarlos) 
        //(Separados por comas) a la que el usuario recibirá el acceso
        //
        //es decir, si el sistema de educación se establece
        //access=material0,material1
        //
        //Este usuario tendrá acceso a las páginas:
        // /pages/material0
        // /pages/material1
        //
        //Además, en este ejemplo simplificado que damos el permiso solamente
        //la duración de la sesión y, por tanto, no se almacenan en la base de datos, solamente
        //sesión
        //
        // La autenticación se implementa en PagesController::isAuthorized
        $hasAccessTo = explode(',', $request->getParameter('custom_access'));

        foreach ($hasAccessTo as $key => $value) {
            $hasAccessTo[$key] = trim($value);
        }

        return $user->toArray() + [ 'has_access_to' => $hasAccessTo ];
    }

    public function unauthenticated(Request $request, Response $response)
    {
        if ($request->is('post') && $request->data['lti_message_type'] === 'basic-lti-launch-request') {
            $response->statusCode(403);
            $response->body('403 Forbidden');
            return $response;
        }
        
        return null;
    }

    protected function _createOAuthServer()
    {
        $server = new Server(new DatabaseDataStore());
        $server->addSignatureMethod(new HmacSha1());
        return $server;
    }

    protected function _getOAuthRequest()
    {
        return OAuthRequest::fromRequest();
    }
}

