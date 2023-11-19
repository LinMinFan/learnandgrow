<?php

namespace App\Admin\Forms;

use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;
use App\Models\Site;
use Storage;

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

        if ($request->hasFile('favicon')) {
            $favicon = $request->file('favicon');
            $favicon_name = $request->file('favicon')->getClientOriginalName();
            $requestData['favicon'] = 'site/'.$favicon_name;
            $favicon->storeAs('public/site', $favicon_name);
        }
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logo_name = $request->file('logo')->getClientOriginalName();
            $requestData['logo'] = 'site/'.$logo_name;
            $logo->storeAs('public/site', $logo_name);
        }
        if ($request->hasFile('og_image')) {
            $og_image = $request->file('og_image');
            $og_image_name = $request->file('og_image')->getClientOriginalName();
            $requestData['og_image'] = 'site/'.$og_image_name;
            $og_image->storeAs('public/site', $og_image_name);
        }

        $message = '';

        try {

            if ($site->update($requestData)) {
                admin_success(__('Processed successfully.'));
            } else {
                admin_success(__('No changes detected.'));
            }

        } catch (\Exception $e) {
            
            $message = $e->getMessage();
        }

        return back()->with($message);
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
        $this->file('favicon',__('favicon'))->removable();
        $this->file('logo',__('logo'))->removable();
        $this->file('og_image',__('og_image'))->removable();
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
