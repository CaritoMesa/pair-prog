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

        //Jeżeli użytkownik lti nie istnieje w systemie to należy go w tym
        //momencie dynamicznie utworzyć. 
        //Kolejne już logowanie nie będą wymagały tworzenia nowego użytkownika -
        //tylko zostanie użyty już wcześniej utworzony
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

        //W tym momencie mozna nadac uzytkownikowi uprawnienia, które uzyskał
        //z racji tego że zalogował się z platformy edukacyjnej przy użyciu
        //Lti. Na bazie parametru custom_access, możemy przydzielić użytkownikowi
        //pewne uprawnienia (np. dostęp do materiału numer 99) 
        //Przykładowy kod **mógłby** wyglądać następująco
        //
        //if ($request->getParameter('custom_access') == 'material-nr-99') {
        //  $user->allowAccessToMaterial(99)
        //}
        //
        //$users->save($user)
        //
        //Jednakże w tym uproszczonym przykładzie klucz 'custom_access' to po prostu
        //lista nazw materialow(stron, artykułów, jakkolwiek ich nie nazwac) 
        //(rozdzielona przecinkiem) do których uzytkownik otrzyma dostęp
        //
        //czyli jesli w systemie edukacyjnym zostanie ustawione
        //access=material0,material1
        //
        //to uzytkownik bedzie mial dostep do stron:
        // /pages/material0
        // /pages/material1
        //
        //Dodatkowo w tym uproszczonym przykładzie nadajemy uprawnienia tylko
        //na czas trwania sesji stąd też nie są one zapisywane w bazie danych, tylko
        //w sesji
        //
        // Autoryzacja jest zaimplementowana w PagesController::isAuthorized
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

