<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function poster($qrImg, $arabic, $form, $event)
    {
        $image = Image::make(storage_path('app/public/' . $event->ticket_design));
        $image->insert($qrImg, '20', 37, 40);
        $image->text($arabic->utf8Glyphs($form->name), 475, 152, function ($font) {
            $font->file(public_path('assets/fonts/arb.ttf'));
            $font->size(13);
            $font->color('#2157A1');
            $font->align('right');
            $font->valign('bottom');
        });
        $image->text($arabic->utf8Glyphs($form->shop->name), 475, 191, function ($font) {
            $font->file(public_path('assets/fonts/arb.ttf'));
            $font->size(13);
            $font->color('#2157A1');
            $font->align('right');
            $font->valign('bottom');
        });
        $image->text($arabic->utf8Glyphs($form->age. ' سنة ') , 280, 191, function ($font) {
            $font->file(public_path('assets/fonts/arb.ttf'));
            $font->size(12);
            $font->color('#2157A1');
            $font->align('right');
            $font->valign('bottom');
        });
        $image->text($form->mobile, 280, 232, function ($font) {
            $font->file(public_path('assets/fonts/arb.ttf'));
            $font->size(12);
            $font->color('#2157A1');
            $font->align('right');
            $font->valign('bottom');
        });
        $image->text($arabic->utf8Glyphs($form->amount . ' ريال '), 475, 232, function ($font) {
            $font->file(public_path('assets/fonts/arb.ttf'));
            $font->size(13);
            $font->color('#2157A1');
            $font->align('right');
            $font->valign('bottom');
        });
        $ticketPath = 'winterland/' . time() . rand(000, 9999) . '.jpg';
        $image->save(storage_path('app/public/' . $ticketPath));
    }
}
