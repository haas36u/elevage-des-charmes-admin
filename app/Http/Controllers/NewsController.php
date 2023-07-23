<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;

class NewsController extends Controller
{
    public function getAll()
    {
      $allNews = News::select('id_news', 'date_news', 'titre_news', 'description_courte', 'lien_news', 'galerie_news', 'images_news', 'year_news')
                  ->orderBy('date_filter_news', 'DESC')
                  ->get();

      return view('news.news-management', [
         'all_news'=> $allNews,
      ]);
    }

    public function getOneToUpdate($id)
    {
      $news = News::select('id_news', 'date_news', 'titre_news', 'description_courte', 'date_filter_news', 'lien_news', 'galerie_news', 'images_news', 'year_news')
                  ->where('id_news', $id)
                  ->get();

      return view('news.news-update', [
         'news'=> $news[0],
      ]);
    }

    public function create()
    {
      $attributes = request();
      $attributes['year_news'] = DateTime::createFromFormat("Y-m-d", $attributes['date_filter_news'])->format("Y");
      News::create([
         'date_news' => $attributes['date_news'],
         'titre_news' => $attributes['titre_news'],
         'description_courte' => $attributes['description_courte'],
         'description_news' => $attributes['description_courte'],
         'date_filter_news' => $attributes['date_filter_news'],
         'year_news' => $attributes['year_news'],
         'lien_news' => $attributes['lien_news'] == "on" ? true : false,
         'galerie_news' => $attributes['galerie_news'] ==  "on" ? true : false,
         'images_news' => $attributes['images_news'] ==  "on" ? true : false,
         ]
      );

      return redirect('/news-management');
    }

    public function update($id)
    {
      $attributes = request();
      $attributes['year_news'] = DateTime::createFromFormat("Y-m-d", $attributes['date_filter_news'])->format("Y");
      News::where('id_news', $id)->update([
         'date_news' => $attributes['date_news'],
         'titre_news' => $attributes['titre_news'],
         'description_courte' => $attributes['description_courte'],
         'description_news' => $attributes['description_news'],
         'date_filter_news' => $attributes['date_filter_news'],
         'year_news' => $attributes['year_news'],
         'lien_news' => $attributes['lien_news'] == "on" ? true : false,
         'galerie_news' => $attributes['galerie_news'] ==  "on" ? true : false,
         'images_news' => $attributes['images_news'] ==  "on" ? true : false,
         ]
      );

      return redirect('/news-management');
    }

    public function delete($id)
    {
      News::where('id_news', $id)->delete();
      return redirect('/news-management');
    }
}