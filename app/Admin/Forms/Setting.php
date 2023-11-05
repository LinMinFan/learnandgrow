<?php

namespace App\Admin\Forms;

use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;
use App\Models\Admin\Site;

class Setting extends Form
{
    /**
     * The form title.
     *
     * @var string
     */
    public function title()
    {
        return __('genernalConfig menu');
    }

    /**
     * Handle the form request.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request)
    {
        //dump($request->all());

        $site = Site::find(1);

        $requestData = $request->input();

        $hasChanges = false;

        foreach ($requestData as $key => $value) {
            if ($site->{$key} !== $value) {
                $hasChanges = true;
                break;
            }
        }

        if ($hasChanges) {
            $site->update($requestData);
            admin_success(__('Processed successfully.'));
        } else {
            admin_success(__('No changes detected.'));
        }

        return back();
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $this->text('title',__('site_title'));
        $this->textarea('keywords',__('keywords'));
        $this->textarea('description',__('description'));
        $this->textarea('google_ga4',__('google_ga4'));
        $this->textarea('google_gtag',__('google_gtag'));
        $this->text('copyright',__('copyright'));
        $this->email('email',__('email'));
        $this->image('favicon',__('favicon'));
        $this->image('logo',__('logo'));
        $this->image('og_image',__('og_image'));
    }

    /**
     * The data of the form.
     *
     * @return array $data
     */
    public function data()
    {
        $data = Site::find(1);
        return [
            'title'       => $data->title,
            'keywords'      => $data->keywords,
            'description' => $data->description,
            'google_ga4' => $data->google_ga4,
            'google_gtag' =>$data->google_gtag,
            'copyright' => $data->copyright,
            'email' => $data->email,
            'favicon' => $data->favicon,
            'logo' => $data->logo,
            'og_image' => $data->og_image,
        ];
    }
}
