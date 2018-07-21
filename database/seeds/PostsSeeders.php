<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostsSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

    	for ($i=1; $i <= 10 ; $i++) { 
            //Create Categories
    		$category = new Category;
    		$category->name = "Categoría " . $i;
    		$category->user_id = 1;
    		$category->save();

            //Create Tags
    		$tag 	      = new Tag;
    		$tag->name    = "Tag " . $i;
    		$tag->user_id = 1;
    		$tag->save();
    	}

        //Create Posts
    	for ($i=1; $i <= 20 ; $i++) { 
    		$post = new Post;

    		$post->title     = "Entrada de prueba " . $i;
    		$post->body      = $this->bodyGenerator(new Faker);
    		$post->excerpt   = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt tenetur qui corporis officiis reiciendis aperiam distinctio minus laborum necessitatibus';
    		$post->slug      = 'entrada-de-prueba-' . $i;
    		$post->published = 1;
    		$post->user_id   = 1;

    		$post->save();

            //Categories

            $post->categories()->sync(Category::limit(rand(1,9))->pluck('id'));

            //Tags
            $post->tags()->sync(Tag::limit(rand(1,9))->pluck('id'));

            
    	}

    }


    private function bodyGenerator(Faker $faker){

    	$numParagraphs = rand(3,9);

    	$body = '';

    	for ($i=1; $i <= $numParagraphs ; $i++) { 
    		$body .= '<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt tenetur qui corporis officiis reiciendis aperiam distinctio minus laborum necessitatibus sit amet, consectetur adipisicing reiciendis aperiam distinctio minus.</p>';
    	}

    	return $body;
    }
}
