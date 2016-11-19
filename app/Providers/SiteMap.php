<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Article;
use Carbon\Carbon;

class SiteMap extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    public function getSiteMap()
    {
        $siteMap = $this->createSiteMap();
        return $siteMap;
    }

    protected function createSiteMap()
    {
        $articles = $this->getArticles();
        $lastmod = Carbon::now();
        $url = trim(url(),'/').'/';
        $xml = [];
        $xml[] = '<?xml version="1.0" encoding="utf-8"?'.'>';
        $xml[] = '<urlset xmlns="http://www.luguobo.com/schemas/sitemap/0.9">';
        $xml[] = '<url>';
        $xml[] = '<loc>'.$url.'</loc>';
        $xml[] = '<lastmod>'.$lastmod.'</lastmod>';
        $xml[] = '<changefreq>daily</changefreq>';
        $xml[] = '<priority>0.8</priority>';
        $xml[] = '</url>';

        foreach ($articles as $key => $val) {
            $xml[] = '<url>';
            $xml[] = ' <loc>'.$url.'article/'.$val->id.'</loc>';
            $xml[] = '<lastmod>'.$val->created_at.'</lastmod>';
            $xml[] = '</url>';
        }

        $xml[] = '</urlset>';

        return join("\n",$xml);
    }

    protected function getArticles()
    {
        return Article::where('created_at','<=',Carbon::now())->orderBy('created_at','desc')->get();
    }

}
