<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\GalleryImage;
use App\Models\Sosmed;
use App\Models\Customer_Service;

class LandingPageController extends Controller
{
    public function index()
    {
        // Get data for the landing page
        $galleries = Gallery::where('status', 1)->with('images')->latest()->get();
        $sosmed = Sosmed::all();
        $contactServices = Customer_Service::all();

        // Group social media by platform
        $groupedSosmed = [
            'YouTube'   => [],
            'Instagram' => [],
            'Facebook'  => [],
            'TikTok'    => [],
        ];

        foreach ($sosmed as $item) {
            $platform = $this->detectPlatformFromUrl($item->url);
            if (array_key_exists($platform, $groupedSosmed)) {
                $groupedSosmed[$platform][] = $item;
            }
        }

        return view('fullobster.home', compact(
            'galleries',
            'groupedSosmed',
            'contactServices'
        ));
    }

    /**
     * Detect social media platform from URL
     */
    private function detectPlatformFromUrl($url)
    {
        if (str_contains($url, 'youtube.com') || str_contains($url, 'youtu.be')) {
            return 'YouTube';
        } elseif (str_contains($url, 'instagram.com')) {
            return 'Instagram';
        } elseif (str_contains($url, 'facebook.com') || str_contains($url, 'fb.com')) {
            return 'Facebook';
        } elseif (str_contains($url, 'tiktok.com')) {
            return 'TikTok';
        }

        return 'Other';
    }
}