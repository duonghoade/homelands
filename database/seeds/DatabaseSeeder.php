<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\SubCategory;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $json = File::get(storage_path() . "/data.json");
        $categories = json_decode($json);
        foreach ($categories as $category) {
            $category_create = Category::create(["name" => $category->name]);
            $subs = $category->subs;
            foreach ($subs as $sub) {
              $category_create->subs()->create(["name"=>$sub->name]);
            }
        }

        Model::reguard();
    }
}
