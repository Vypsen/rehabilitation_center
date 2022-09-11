<?php

namespace App\Modules\Blog\Database\Seeders;

use App\Modules\Blog\Entities\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class BlogDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blog::query()->delete();
        Blog::factory(random_int(80,100))->create();
    }
}
