<?php

namespace App\Admin\Controllers;

use App\Models\Site;
use App\Admin\Forms\Setting;
use App\Http\Controllers\Controller;
use Encore\Admin\Layout\Content;

class SiteController extends Controller
{

    public function index(Content $content)
    {
        return $content
            ->title(__('Site Config'))
            ->body(new Setting());
    }

    public function form()
    {
        $form = new \Encore\Admin\Form(new Site);
        
        $form->tools(
            function (\Encore\Admin\Form\Tools $tools) {
                $tools->disableList();
                $tools->disableDelete();
                $tools->disableView();
            }
        );

        $form->text('title',__('site_title'));
    
        $form->textarea('keywords',__('keywords'));
    
        $form->textarea('description',__('description'));
    
        $form->textarea('google_ga4',__('google_ga4'));
    
        $form->textarea('google_gtag',__('google_gtag'));
    
        $form->text('copyright',__('copyright'));
    
        $form->email('email',__('email'));
    
        $form->image('favicon',__('favicon'));
    
        $form->image('logo',__('logo'));
    
        $form->image('og_image',__('og_image'));

        $form->footer(function ($footer) {
            $footer->disableReset();
            $footer->disableViewCheck();
            $footer->disableEditingCheck();
            $footer->disableCreatingCheck();
        });

        return $form;
    }

}
