<?php

namespace App\Auth;

use JacobKiers\OAuth\DataStore\DataStoreInterface;
use JacobKiers\OAuth\Consumer\Consumer;
use JacobKiers\OAuth\Consumer\ConsumerInterface;
use JacobKiers\OAuth\Token\Token;
use JacobKiers\OAuth\Token\TokenInterface;

use Cake\ORM\TableRegistry;

class DatabaseDataStore implements DataStoreInterface
{
    public function lookupConsumer($key)
    {
        $oAuthConsumers = TableRegistry::get('OAuthConsumers');

        $consumer = $oAuthConsumers->find('all', [
            'conditions' => ['OAuthConsumers.key_auth' => $key ]
        ])->first();

        if (!$consumer) {
            return null;
        }

        return new Consumer($key, $consumer->secret);
    }

    public function lookupToken(ConsumerInterface $consumer, $token_type, $token_key)
    {
        return new Token($consumer->getKey(), "");
    }

    public function lookupNonce(ConsumerInterface $consumer, TokenInterface $token, $nonce, $timestamp)
    {
        return null;
    }

    public function newRequestToken(ConsumerInterface $consumer, $callback = null)
    {
        return null;
    }

    public function newAccessToken(ConsumerInterface $consumer, TokenInterface $token, $verifier = null)
    {
        return null;
    }
}
