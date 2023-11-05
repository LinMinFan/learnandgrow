<?php

namespace App\Admin\Controllers;

use App\Models\Admin\Site;
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

        $form->text('title',__('網站標題'));
    
        $form->textarea('keywords',__('關鍵字'));
    
        $form->textarea('description',__('網站描述'));
    
        $form->textarea('google_ga4',__('google ga4'));
    
        $form->textarea('google_gtag',__('google gtag'));
    
        $form->text('copyright',__('版權所有'));
    
        $form->email('email',__('Email'));
    
        $form->image('favicon',__('網站標誌'));
    
        $form->image('logo',__('網站LOGO'));
    
        $form->image('og_image',__('meta 圖片'));

        $form->footer(function ($footer) {
            $footer->disableReset();
            $footer->disableViewCheck();
            $footer->disableEditingCheck();
            $footer->disableCreatingCheck();
        });

        return $form;
    }

}
