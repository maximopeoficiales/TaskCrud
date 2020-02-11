<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';/* especifica con que tabla se relaciona este modelo*/
    protected $fillable = ['title'];/* campos que se van a rellenar */

    /* Una tarea pertenece a un usuario  */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
