<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Book;
use \App\Genre;
class ActionController extends Controller
{
  public function insertBook(Request $request) {
    //dd($request->input());
    $newBook = new Book();
    $newBook->title = $request->input('title');
    $newBook->author = $request->input('author');
    $newBook->release = $request->input('release');
    $newBook->genre_id = $request->input('genre');

    $newBook->save();
    foreach ($request->input('translations') as $translation) {
      $newBook->translations()->attach($translation);
    }
    return redirect('/');
  }

  public function deleteBook(Request $request) {
    Book::destroy($request->input('id'));
    return redirect('/');
  }

  public function updateBook(Request $request) {
    $book = Book::find($request->input('id'));
    $book->title = $request->input('title');
    $book->author = $request->input('author');
    $book->release = $request->input('release');
    $book->genre_id = $request->input('genre');
    $book->save();
    $book->translations()->detach();
    foreach ($request->input('translations') as $translation) {
      $book->translations()->attach($translation);
    }
    return redirect('/');
  }

  public function insertGenre(Request $request) {
  $newGenre = new Genre();
  $newGenre->name = $request->input('name');
  $newGenre->save();
  return redirect('/');
  }

  public function updateGenre(Request $request) {
    $genre = Genre::find($request->input('id'));
    $genre->name = $request->input('name');
    $genre->save();
    return redirect('/');
  }

  public function orderBy(Request $request) {
    dd($request);
    $change = DB::table('books')->orderBy($request->input(), 'desc');
  }
}
