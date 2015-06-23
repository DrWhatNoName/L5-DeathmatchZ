<?php namespace App\Auth;

use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Illuminate\Contracts\Auth\UserProvider as UserProviderInterface;
use App\Accounts;

class CustomUserProvider implements UserProviderInterface {

    protected $model;

    protected $salt = 'YourEmulatorHashSalt';

    public function __construct(Accounts $model)
    {
        $this->model = $model;
    }

    public function retrieveById($identifier)
    {
        $user = $this->model->where('CustomerID', $identifier)->first();
        return $user;
    }

    public function retrieveByToken($identifier, $token)
    {
        return;
    }

    public function updateRememberToken(UserContract $user, $token)
    {
        return;
    }

    public function retrieveByCredentials(array $credentials)
    {
        $user = $this->model->where('email', $credentials['email'])
            ->where('IsDeveloper', 1)
            ->first();
        return $user;
    }

    public function validateCredentials(UserContract $user, array $credentials)
    {
        $hash = md5($this->salt . $credentials['password']);

        if($hash === $user->MD5Password){
            return true;
        } else{
            return false;
        }
    }

}