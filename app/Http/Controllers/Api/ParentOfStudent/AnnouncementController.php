<?php

namespace App\Http\Controllers\Api\ParentOfStudent;

use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnnouncementController extends Controller
{
    public function getAnnouncements()
    {
        $announcement = Announcement::where('status', 0)->latest()->get();

        $announcementsData = $announcement->map(function ($item) {
            return [
                'title' => $item->title,
                'content' => $item->content,
                'created_at' => $item->created_at->isoFormat('dddd, D MMMM YYYY'),
            ];
        });

        return $announcementsData;
    }
}
