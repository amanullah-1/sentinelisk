<?php

namespace Sentinel\Models;

use Hashids;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

class User extends \Cartalyst\Sentry\Users\Eloquent\User implements UserContract
{
    use \Venturecraft\Revisionable\RevisionableTrait;
    
    protected $dontKeepRevisionOf = array(
        'persist_code',
        'last_login',
        'activation_code',
        'activated',
        'activated_at',
        'password',
        'reset_password_code'
    );
    
    /**
     * Set the Sentry User Model Hasher to be the same as the configured Sentry Hasher
     */
    public static function boot()
    {
        parent::boot();
        static::setHasher(app()->make('sentry.hasher'));
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->getPersistCode();
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     *
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->persist_code = $value;

        $this->save();
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return "persist_code";
    }

    /**
     * Use a mutator to derive the appropriate hash for this user
     *
     * @return mixed
     */
    public function getHashAttribute()
    {
        return Hashids::encode($this->attributes['id']);
    }

    public function getGravatarAttribute($d = 'mm', $s = 300, $r = 'g', $img = false, $atts = array() ) 
    {
       $url = 'http://www.gravatar.com/avatar/';
       $url .= md5( strtolower( trim( $this->attributes['email'] ) ) );
       $url .= "?s=$s&d=mm&r=$r";
       if ( $img ) 
       {
            $url = '<img src="' . $url . '"';
            foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }
        
        return $url;
    }
}
