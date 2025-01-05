<?php
 
namespace App\View\Composers;
 
use Illuminate\View\View;
 
class PathToAssetsAdmin
{
    public function compose(View $view): void
    {
        $view->with([
            'admin_assets_img' => asset('assets/admin/img/'), 
            'admin_assets_css' => asset('assets/admin/css/'), 
            'admin_assets_js'  => asset('assets/admin/js/')
        ]);
    }
}