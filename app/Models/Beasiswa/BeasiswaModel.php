<?php

namespace App\Models\Beasiswa;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class BeasiswaModel extends Model
{
    use Notifiable;

    protected $primaryKey = 'id';
    protected $table = 'beasiswa';
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';

    protected $fillable = [
        'nama', 'description', 'logo', 'tahap', 'periode', 'tanggal_mulai', 'tanggal_selesai', 'kuota_beasiswa', 'create_time', 'update_time'
    ];
}