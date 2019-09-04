<?php
/**
 * Created by PhpStorm
 * User: chenyi
 * Date: 2019-09-04
 * Time: 19:20
 */

namespace App\Models;

use Encore\Admin\Auth\Database\Administrator;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    /**
     * @var string
     */
    protected $table = 'articles';

    /**
     * @var string
     */
    protected $connection = 'mysql';

    public function users()
    {
        return $this->belongsTo(Administrator::class, 'author_id', 'id');
    }
}
