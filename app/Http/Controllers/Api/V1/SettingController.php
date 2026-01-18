<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Footer;
use App\Models\Page;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Http\Resources\V1\SettingResource;


class SettingController extends Controller
{

    public function getGlobalSettings()
    {

        $seviceIds = json_decode(getSetting('home_sevices'));
        $services = [];
        if ($seviceIds !== null && count($seviceIds) > 0) {
            $services = Service::whereIn('id', $seviceIds)
                ->with('images', 'serviceCat')
                ->get()
                ->sortBy(function ($services) use ($seviceIds) {
                    return array_search($services->id, $seviceIds);
                })
                ->values();
        }

        $categoryIds = json_decode(getSetting('header_category'));
        $categories = [];
        if ($categoryIds !== null && count($categoryIds) > 0) {
            $categories = ServiceCategory::whereIn('id', $categoryIds)
                ->with([
                    'services' => function ($query) {
                        $query->latest()->take(3);
                    }
                ])
                ->get()
                ->sortBy(function ($category) use ($categoryIds) {
                    return array_search($category->id, $categoryIds);
                })
                ->values();
        }

        $footerColumns = Footer::query()->orderBy('order_number')->get();
        foreach ($footerColumns as $column) {
            $footerPageIds = json_decode($column->pages);
            $footerPages = Page::query()->whereIn('id', $footerPageIds)->select('slug', 'title')->get();
            $column['pages'] = $footerPages;
        }


        $settings = [
            'home_sevices' => $services,
            'header_category' => $categories,
            'footer_columns' => $footerColumns,
            'currency_symbol' => getSetting('currency_symbol'),
            'address' => getSetting('address'),
            'email' => getSetting('email'),
            'phone_number' => getSetting('phone_number'),
            'whatsapp_number' => getSetting('whatsapp_number'),
            'facebook_link' => getSetting('facebook_link'),
            'youtube_link' => getSetting('youtube_link'),
            'instagram_link' => getSetting('instagram_link'),
            'linkedin_link' => getSetting('linkedin_link'),
            'Skype_link' => getSetting('Skype_link'),
            'twitter_link' => getSetting('twitter_link'),
            'homePage_video_link' => getSetting('homePage_video_link'),
            'privacyPolicy_link' => getSetting('privacyPolicy_link'),
            'google_map_link' => getSetting('google_map_link'),
            'meeting_time' => getSetting('meeting_time'),
        ];
        return response()->json($settings);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = [];
        $settings = [
            'home_sevices' => json_decode(getSetting('home_sevices')),
            'header_category' => json_decode(getSetting('header_category')),
            'currency_symbol' => getSetting('currency_symbol'),
            'address' => getSetting('address'),
            'email' => getSetting('email'),
            'phone_number' => getSetting('phone_number'),
            'whatsapp_number' => getSetting('whatsapp_number'),
            'facebook_link' => getSetting('facebook_link'),
            'youtube_link' => getSetting('youtube_link'),
            'instagram_link' => getSetting('instagram_link'),
            'linkedin_link' => getSetting('linkedin_link'),
            'Skype_link' => getSetting('Skype_link'),
            'twitter_link' => getSetting('twitter_link'),
            'homePage_video_link' => getSetting('homePage_video_link'),
            'privacyPolicy_link' => getSetting('privacyPolicy_link'),
            'google_map_link' => getSetting('google_map_link'),
            'meeting_time' => getSetting('meeting_time'),
        ];

        return response()->json($settings);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $keysToTransform = [
            'home_sevices',
            'header_category',
        ];
        foreach ($data as $type => $value) {
            $settings = Setting::where('key', $type)->first();
            if ($settings) {
                if ($value !== null) {
                    if (is_array($value)) {
                        if (in_array($type, $keysToTransform)) {
                            $value = array_map('intval', $value);
                        }
                        $settings->value = json_encode($value);
                    } else {
                        $settings->value = $value;
                    }
                    $settings->save();
                }
            } else {
                if ($value !== null) {
                    $settings = new Setting();
                    $settings->key = $type;
                    if (is_array($value)) {
                        if (in_array($type, $keysToTransform)) {
                            $value = array_map('intval', $value);
                        }
                        $settings->value = json_encode($value);
                    } else {
                        $settings->value = $value;
                    }
                    $settings->save();
                }
            }
        }
        // // Handle logo_light upload
        // if ($request->hasFile('logo_light')) {
        // 	$settings = Setting::where('key', 'logo_light')->first();
        // 	if ($settings?->value) {
        // 		Storage::disk('public')->delete($settings->value);
        // 	}
        // 	$value = $request->file('logo_light')->store('uploads', 'public');
        // 	$settings->value = '/storage/' . $value;
        // 	$settings->save();
        // }
        // // Handle logo_dark upload
        // if ($request->hasFile('logo_dark')) {
        // 	$settings = Setting::where('key', 'logo_dark')->first();
        // 	if ($settings?->value) {
        // 		Storage::disk('public')->delete($settings->value);
        // 	}
        // 	$value = $request->file('logo_dark')->store('uploads', 'public');
        // 	$settings->value = '/storage/' . $value;
        // 	$settings->save();
        // }

        return response()->json(['status' => 'success']);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


}
