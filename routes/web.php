<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomePageController@welcome')->name('welcome');

Auth::routes();

Route::get('/home', 'HomePageController@home')->name('home');
Route::get('/redirect/{social}', 'SocialAuthController@redirect');
Route::get('/callback/{social}', 'SocialAuthController@callback');
Route::prefix('user')->group(function () {
    Route::get('{id}/edit', 'UserController@edit')->name('user.edit');
    Route::post('{id}/edit', 'UserController@update')->name('user.update');
    Route::get('/change-password', 'UserController@editpass')->name('user.editpass');
    Route::post('/change-password', 'UserController@updatepass')->name('user.updatepass');
    Route::get('{name?}', 'UserController@index')->name('user.index');
});

Route::prefix('song')->group(function () {
    Route::get('create', 'SongController@create')->name('song.create');
    Route::post('store', 'SongController@store')->name('song.store');
    Route::get('edit/{id}', 'SongController@edit')->name('song.edit');
    Route::post('edit/{id}', 'SongController@update')->name('song.update');
    Route::get('delete/{id}', 'SongController@delete')->name('song.delete');
    Route::get('search', 'SongController@search')->name('song.search');
    Route::get('listenMusic/{id}', 'SongController@listen')->name('song.listen');
    Route::get('song-new', 'SongController@songNew')->name('song.songNew');
    Route::get('listenTheMost', 'SongController@listenTheMost')->name('song.listenTheMost');
    Route::post('like','SongController@like')->name('song.like');
    Route::post('reply-comment-song/{id}','SongController@replyCommentSong')->name('song.replyCommentSong');
    Route::post('comment-song/{id}','SongController@commentSong')->name('song.commentSong');
});

Route::prefix('songs')->group(function (){
    Route::get('song-new', 'NewSongController@songNew')->name('songs.songNew');
    Route::get('listenMusic/{id}', 'NewSongController@listen')->name('songs.listen');
    Route::get('listenTheMost', 'NewSongController@listenTheMost')->name('songs.listenTheMost');
    Route::get('search', 'NewSongController@search')->name('songs.search');
});

Route::prefix('playlists')->group(function (){
    Route::get('index', 'PlayListController@index')->name('playlist.index');
    Route::get('create', 'PlayListController@create')->name('playlist.create');
    Route::post('create', 'PlayListController@store')->name('playlist.store');
    Route::get('addSong/{playlist_id}/{song_id}', 'PlayListController@addSongToPlaylist')->name('playlist.addSong');
    Route::get('deleteSong/{playlist_id}/{song_id}', 'PlayListController@deleteSongInPlaylist')->name('playlist.deleteSong');
    Route::get('information/{id}', 'PlayListController@information')->name('playlist.information');
    Route::get('delete/{id}', 'PlayListController@delete')->name('playlist.delete');
    Route::get('edit/{id}','PlayListController@edit')->name('playlist.edit');
    Route::post('edit/{id}','PlayListController@update')->name('playlist.update');
    Route::post('likePlaylist','PlayListController@likePlaylist')->name('playlist.like');
    Route::get('informationOC/{id}', 'PlayListController@informationOC')->name('playlist.informationOC');
    Route::get('listen/{id}', 'PlayListController@listen')->name('playlist.listen');
    Route::get('listenGuest/{id}', 'PlayListController@listenGuest')->name('playlist.listenGuest');
    Route::post('reply_comment/{id}', 'PlayListController@replyComment')->name('playlist.reply_comment');
    Route::post('comment/{id}', 'PlayListController@comment')->name('playlist.comment');

});

Route::prefix('singers')->group(function (){
    Route::get('index', 'SingerController@index')->name('singer.index');
    Route::get('create', 'SingerController@create')->name('singer.create');
    Route::post('create', 'SingerController@store')->name('singer.store');
    Route::get('guest', 'SingerController@singerGuest')->name('singer.guest');
    Route::get('information/{id}', 'SingerController@information')->name('singer.information');
    Route::get('informationOC/{id}', 'SingerController@informationSingerGuest')->name('singer.informationGuest');
    Route::post('addSingers/{id}', 'SingerController@addSingers')->name('singer.addSingers');
    Route::post('autocomplete', 'SingerController@autocomplete')->name('singer.autocomplete');
    Route::get('listen/{id}', 'SingerController@listen')->name('singer.listen');
    Route::get('listenGuest/{id}', 'SingerController@listenGuest')->name('singer.listenGuest');
    Route::post('comment/{id}', 'SingerController@comment')->name('singer.comment');
    Route::post('reply_comment/{id}', 'SingerController@replyComment')->name('singer.reply_comment');
});

Route::prefix('tags')->group(function () {
    Route::get('index/{id}', 'TagController@index')->name('tags.index');
    Route::post('addTags/{id}', 'TagController@addTags')->name('tags.create');
    Route::post('autocomplete', 'TagController@autocomplete')->name('tags.autocomplete');
});


