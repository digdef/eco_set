<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $res = app('App\Http\Controllers\Admin\AppBaseController')->sitemap_xml_generator();
        if ($res->status() == 200){
            $this->info("success");
        }
        else{
            $this->info("fault");
        }
    }
}