<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServerType extends Model {
    protected $fillable = ['code', 'name'];

    public function servers() {
        return $this->hasMany(Server::class);
    }
}