<?php

use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creo 20 comentarios

    	for ($i=1; $i <= 20 ; $i++) { 
    		$comment = new Comment;

    		$comment->name = str_random(10);
    		$comment->email = str_random(rand(10,20)) . '@gmail.com';
    		$comment->body = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam alias, inventore, iure qui illo laborum, magnam fugiat necessitatibus officia perspiciatis ea tempora nisi laudantium dolor nulla, magni ratione deserunt. Aspernatur!';
            $comment->post_id = $i;

    		$comment->save();
    	}

        //Creo respuestas para cada uno de esos comentarios

        for ($i=1; $i <= 20 ; $i++) { 
        	$numResponses = rand(1,3);
        	for ($x=0; $x <= $numResponses ; $x++) { 
        		$comment = new Comment;

        		$comment->name = str_random(10);
                $comment->email = str_random(rand(10,20)) . '@gmail.com';
        		$comment->body = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam alias, inventore, iure qui illo laborum, magnam fugiat necessitatibus officia perspiciatis ea tempora nisi laudantium dolor nulla, magni ratione deserunt. Aspernatur!';
        		$comment->comment_id = $i;
        		$comment->save();
        	}
        }
    }
}
