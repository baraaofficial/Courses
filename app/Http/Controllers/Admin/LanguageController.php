<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\lang\StoreLangReguest;
use App\Models\Language;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class LanguageController extends Controller
{

    public function index()
    {
        $languages = Language::limit(20)->orderBy('id','DESC')->get();
        return view('admin.languages.index' , compact('languages'));
    }


    public function create()
    {
        return view('admin.languages.create');
    }


    public function store(StoreLangReguest $request)
    {
        $languages = Language::create($request->all());
        if ($request->hasFile('image')) {
            $this->addAttachment($request->file('image'), $languages, 'languages',['image']);
        }
        return redirect()->route('languages.index')
            ->with(['message' => "تم إضافة لغة$languages->name_ar بنجاح"]);
    }


    public function show($id)
    {
        $languages = Language::findOrFail($id);
        DB::table('visit_lang')->insert(
            ['visit' => 1,'created_at' => Carbon::now(),'updated_at' => Carbon::now()]
        );
        // Start chart users new
        $Charts_today_lang      = Language::whereDate('created_at', today())->count();

        // End chart users new
        return view('admin.languages.show',compact('languages','Charts_today_lang'));
    }


    public function edit($id)
    {
        $model = Language::findOrFail($id);
        return view('admin.languages.edit',compact('model'));

    }


    public function update(Request $request, $id)
    {
        $languages = Language::findOrFail($id);
        $languages->update($request->all());

        if ($request->hasFile('image')) {
            $this->updateAttachment($request->file('image'),'languages', $languages, 'languages');
        }

        return redirect()->route('languages.index')
            ->with(['message' => "تم تعديل $languages->name_ar بنجاح"]);
    }


    public function destroy($id)
    {
        $languages = Language::findOrFail($id);
        $languages->delete();
        return redirect()->route('languages.index')
            ->with(['delete' => "تم حذف لغة $languages->name_ar"]);
    }
    private $imageExtensions = [
        'jpg',
        'jpeg',
        'gif',
        'png',
        'bmp',
        'svg',
        'svgz',
        'cgm',
        'djv',
        'djvu',
        'ico',
        'ief',
        'jpe',
        'pbm',
        'pgm',
        'pnm',
        'ppm',
        'ras',
        'rgb',
        'tif',
        'tiff',
        'wbmp',
        'xbm',
        'xpm',
        'xwd'
    ];
    /**
     * @param $key
     * @param $array
     * @param $value
     * @return mixed
     */
    static function inArray($key, $array, $value)
    {
        $return = array_key_exists($key, $array) ? $array[$key] : $value;
        return $return;
    }
    /**
     * @param $file
     * @param $model
     * @param $folder_name
     * @param array $options
     */
    public static function addAttachment($file, $model, $folder_name, array $options = []): void
    {

        //ser options
        // relation
        //usage
        //type
        //size

        $relation = self::inArray('relation', $options, 'attachment');
        $save = self::inArray('save', $options, 'resize');
        $usage = self::inArray('usage', $options, null);
        $type = self::inArray('type', $options, 'image');
        $size = self::inArray('size', $options, 400);
        $quality = self::inArray('quality', $options, 100);
        $folder_name = $folder_name . '/' . Carbon::now()->toDateString();

        ///////////////////////////////

        $destinationPath = public_path() . '/uploads/' . $folder_name . '/';
        $extension = $file->getClientOriginalExtension(); // getting image extension

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755);
        }

        if ($extension == 'svg' || $save == 'original') {

            $name = $file->getFilename() . '.' . $extension; // renaming image
            $file->move($destinationPath, $name); // uploading file to given
            $model->$relation()->create(
                [
                    'path' => 'uploads/' . $folder_name . '/' . $name,
                    'type' => $type,
                    'usage' => $usage
                ]
            );

            return;
        }

        $imageResize = self::resizePhoto($extension, $destinationPath, $file, $size, $quality);


        $model->$relation()->create(
            [
                'path' => '/uploads/' . $folder_name . '/' . $imageResize,
                'type' => $type,
                'usage' => $usage
            ]
        );
    }
    /**
     * @param $file
     * @param $oldFiles
     * @param $model
     * @param $folder_name
     * @param array $options
     */
    static function updateAttachment($file, $oldFiles, $model, $folder_name, array $options = []): void
    {
        //ser options
        // relation
        //usage
        //type
        //size

        $relation = self::inArray('relation', $options, 'attachment');
        $usage = self::inArray('usage', $options, null);
        $type = self::inArray('type', $options, 'image');
        $size = self::inArray('size', $options, 400);
        $folder_name = $folder_name . '/' . Carbon::now()->toDateString();

        ///////////////////////////////
        ///

        if ($oldFiles) {
            File::delete(public_path() . '/' . $oldFiles->path);
        }

        $image = $file;
        $destinationPath = public_path() . 'uploads/' . $folder_name . '/';
        $extension = '.jpg'; // getting image extension
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755);
        }
        if ($extension == 'svg') {

            $name = $file->getFilename() . '.' . $extension; // renaming image
            $file->move($destinationPath, $name); // uploading file to given

            $input =
                [
                    'path' => 'uploads/' . $folder_name . '/' . $name,
                    'type' => $type,
                    'usage' => $usage
                ];


            if ($oldFiles) {
                $model->$relation()->where(['type' => $type])->update($input);

            } else {

                $model->$relation()->create($input);
            }

            return;
        }

        $imageResize = self::resizePhoto($extension, $destinationPath, $file, $size);

        $input =
            [
                'path' => 'uploads/' . $folder_name . '/' . $imageResize,
                'type' => $type,
                'usage' => $usage,
            ];

        if ($oldFiles) {
            $oldFiles->update($input);
        } else {

            $model->$relation()->create($input);
        }
    }

    /**
     * @param $extension
     * @param string $destinationPath
     * @param mixed $file
     * @param int $size
     * @param int $quality
     * @return  string
     */
    public static function resizePhoto($extension, string $destinationPath, $file, int $size = 400, $quality = 100): string
    {
        $image = $size . '-' . time() . '-' . rand(11111, 99999) . '.' . $extension;

        $resize_image = Image::make($file);
        $resize_image->resize($size, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . $image, $quality);

        return $image;
    }
}
