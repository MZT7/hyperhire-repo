<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Menu extends Model
{
    use HasFactory;
    // use HasRecursiveRelationships;
    use \Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    public function getParentKeyName()
    {
        return 'parent_id';
    }

    public function getLocalKeyName()
    {
        return 'id';
    }
}
