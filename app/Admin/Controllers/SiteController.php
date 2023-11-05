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
            ->title('網站設置')
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
    
        $form->text('keywords',__('關鍵字'));
    
        $form->text('description',__('網站描述'));
    
        $form->text('google_ga4',__('google ga4'));
    
        $form->text('google_gtag',__('google gtag'));
    
        $form->text('copyright',__('版權所有'));
    
        $form->text('email',__('Email'));
    
        $form->text('favicon',__('網站標誌'));
    
        $form->text('logo',__('網站LOGO'));
    
        $form->text('og_image',__('meta 圖片'));

        $form->footer(function ($footer) {
            $footer->disableReset();
            $footer->disableViewCheck();
            $footer->disableEditingCheck();
            $footer->disableCreatingCheck();
        });

        return $form;
    }

}
