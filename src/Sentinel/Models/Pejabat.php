<?php

namespace Sentinel\Models;

use Illuminate\Database\Eloquent\Model;

class Pejabat extends Model
{  
    use \Venturecraft\Revisionable\RevisionableTrait;

    protected $revisionEnabled = true;
    protected $revisionCreationsEnabled = true;

    protected $revisionFormattedFields = array(
        'title'  => 'string:<strong>%s</strong>',
        'public' => 'boolean:No|Yes',
        'created_at' => 'datetime:m/d/Y g:i A',
        'deleted_at' => 'isEmpty:Active|Deleted'
    );

    protected $revisionFormattedFieldNames = array(
    'title' => 'Title',
    'jenis_pejabat' => 'Jenis Pejabat',
    'deleted_at' => 'Deleted At'
);

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pejabat';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['jenis_pejabat', 'negeri', 'nama'];
}
