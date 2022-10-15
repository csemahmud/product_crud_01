<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Description of Product
 *
 * @author Mahmudul Hasan Khan CSE
 */

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';

    protected $fillable = [
        'product_name', 
        'upload_path', 
        'product_image', 
        'product_description', 
        'product_quantity', 
        'product_price',
        'pr_publication_status'
    ];
}
