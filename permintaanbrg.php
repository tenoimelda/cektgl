<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class permintaanbrg extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'permintaanbrgs';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tanggal', 'nama_brg', 'permintaan','users_id'];

    
}
