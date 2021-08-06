<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class bookAdder extends Controller
{
    public function add(request $request){
        $queryResult = Book::insert([
            'title' => $request->title,
            'description' => $request->description,
            'date_published' => $request->date_published,
            'image' => $request->image,
            'publisher' => $request->publisher,
            'pages' => $request->pages,
            'author' => $request->author,
            'price' => $request->price,
        ]);
        return $queryResult;
    }
}
