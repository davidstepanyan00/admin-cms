<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $secret
 */
class OauthClient extends Model
{
    public $table = 'oauth_clients';
}
