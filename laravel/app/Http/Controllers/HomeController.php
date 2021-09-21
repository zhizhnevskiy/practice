<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
//        dump($_ENV);
//        dump(env('MY_SETTING'));
//        dump(config('app.timezone'));
//        dump(config('database.connections.mysql.database'));

//        $insert = DB::insert('
//            INSERT
//            INTO posts (title, content)
//            VALUES (?,?)
//            ', ['Title №5', 'Text in title №5']);
//        var_dump($insert);

//        $update = DB::update('
//        UPDATE posts
//        SET created_at = :create, updated_at = :update
//        WHERE created_at IS NULL OR updated_at IS NULL
//        ',
//            [
//                'create' => NOW(),
//                'update' => NOW()
//            ]
//        );
//        var_dump($update);

//        $delete = DB::delete("
//            DELETE FROM posts WHERE id = :id",
//            [
//                'id' => 5,
//            ]
//        );
//        var_dump($delete);

        DB::beginTransaction();
        try {
           DB::update('
        UPDATE posts SET created_at = :create WHERE created_at IS NULL
        ', ['create' => NOW()]);
           DB::update('
        UPDATE posts SET updated_at = :update WHERE updated_at IS NULL
        ', ['update' => NOW()]);
           DB::commit();
        } catch (\Exception $e){
            DB::rollBack();
            echo $e->getMessage();
        }

        $posts = DB::select('
            SELECT * FROM posts WHERE id > :id
            ',
            ['id' => 1]
        );
        return $posts;

        return view('home', [
            'count' => 24,
            'name' => 'Yura'
        ]);
    }
}
