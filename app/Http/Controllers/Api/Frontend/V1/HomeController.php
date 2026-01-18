<?php

namespace App\Http\Controllers\Api\Frontend\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\V1\ServiceResource;
use App\Http\Resources\V1\PageResource;
use App\Http\Resources\V1\ServeResource;
use App\Http\Resources\V1\HomeSliderResource;
use App\Http\Resources\V1\CounterResource;
use App\Http\Resources\V1\QuoteResource;
use App\Http\Resources\V1\AboutResource;
use App\Http\Resources\V1\VisionResource;
use App\Http\Resources\V1\PolicyResource;
use App\Models\ServiceCategory;
use App\Models\Service;
use App\Models\Footer;
use App\Models\Page;
use App\Models\Serve;
use App\Models\HomeSlider;
use App\Models\Counter;
use App\Models\Quote;
use App\Models\About;
use App\Models\Vision;
use App\Models\Policy;

class HomeController extends Controller
{


    public function getCategories()
    {
        $category = ServiceCategory::query()->with('services')->get();
        return ServiceResource::collection($category);
    }

    public function showService(string $slug)
    {
        $service = Service::query()->with('serviceCat', 'images')->where('slug', $slug)->first();
        return ServiceResource::make($service);
    }

    public function getallServices()
    {
        $Package = Service::query()->get();
        return ServiceResource::collection($Package);
    }

    public function getHeroData()
    {
        $heroData = HomeSlider::where('status', '1')->first();
        return HomeSliderResource::make($heroData);
    }

    public function getServices()
    {
        $service = Service::with('serviceCat', 'images')->get();

        return ServiceResource::collection($service);
    }

    public function getCustomPage($slug)
    {
        $page = Page::where('slug', $slug)->first();

        return PageResource::make($page);
    }

    public function getAllSettings()
    {
        $footerColumns = Footer::query()->orderBy('order_number')->get();
        foreach ($footerColumns as $column) {
            $footerPageIds = json_decode($column->pages);
            $footerPages = Page::query()->whereIn('id', $footerPageIds)->select('slug', 'title')->get();
            $column['pages'] = $footerPages;
        }

        $settings = [
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
        ];

        return response()->json($settings);
    }


    public function getServiceData($slug)
    {
        $serviceData = Service::where('slug', $slug)->first();
        return ServiceResource::make($serviceData);
    }

    public function getServes()
    {
        $serveData = Serve::where('status', 1)->orderBy('order_number')->get();
        return ServeResource::collection($serveData);
    }

    public function getQuotes()
    {
        $quoteData = Quote::where('status', 1)->orderBy('order_number')->get();
        return QuoteResource::collection($quoteData);
    }


    public function getCounters()
    {
        $counters = Counter::where('status', 1)->orderBy('order_number')->get();
        return CounterResource::collection($counters);
    }

    public function getAboutContent()
    {
        $aboutContent = About::where('status', 1)->orderBy('order_number')->get();
        return AboutResource::collection($aboutContent);
    }

    public function getVisionContent()
    {
        $visionContent = Vision::where('status', 1)->orderBy('order_number')->get();
        return VisionResource::collection($visionContent);
    }

    public function getPolicies()
    {
        $policies = Policy::where('status', 1)->orderBy('order_number')->get();
        return PolicyResource::collection($policies);
    }
}
