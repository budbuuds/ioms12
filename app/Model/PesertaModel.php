<?php

namespace App\Model;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PesertaModel extends Model
{
    use SoftDeletes;
    use Timestamp;
    protected $table = 'participant';
    protected $primaryKey = 'participant_id';
    protected $fillable = [
        'name',
        'nim',
        'facultas_id',
        'major_id',
        'division_id',
        'sub_division_id',
        'place_of_birth',
        'gender',
        'address',
        'domicile',
        'phone',
        'habbit',
        'fiuture_goals',
        'desease_history',
        'laptop_brand',
        'laptop_processor',
        'laptop_ram',
        'laptop_vga',
        'zone',
        'status'
    ];
}
