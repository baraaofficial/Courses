<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Framework;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class FrameworkController extends Controller
{

    public function index()
    {
        $frameworks = Framework::limit(20)->orderBy('id','DESC')->get();
        return view('admin.frameworks.index',compact('frameworks'));
    }


    public function create()
    {
        return view('admin.frameworks.create');
    }


    public function store(Request $request)
    {

        $frameworks = Framework::create($request->all());
        if ($request->hasFile('image')) {
            $this->addAttachment($request->file('image'), $frameworks, 'frameworks',['image']);
        }

        return redirect()->route('frameworks.index')
            ->with(['message' => "تم إضافة لغة$frameworks->name_ar بنجاح"]);
    }


    public function show($id)
    {
        $frameworks = Framework::findOrFail($id);
        return view('admin.frameworks.show',compact('frameworks'));
    }


    public function edit($id)
    {
        $model = Framework::findOrFail($id);
        return view('admin.frameworks.edit',compact('model'));
    }


    public function update(Request $request, $id)
    {
        $frameworks = Framework::findOrFail($id);
        $frameworks->update($request->all());

        if ($request->hasFile('image')) {
            $this->updateAttachment($request->file('image'),'frameworks', $frameworks, 'frameworks');
        }

        return redirect()->route('frameworks.index')
            ->with(['message' => "تم تعديل $frameworks->name_ar بنجاح"]);
    }


    public function destroy($id)
    {
        $frameworks = Framework::findOrFail($id);
        $frameworks->delete();
        return redirect()->route('frameworks.index')
            ->with(['delete' => "تم حذف $frameworks->name_ar"]);
    }

    public function search(Request $request)
    {
        $frameworks = Framework::where(function($frameworks) use($request){

            if ($request->input('keyword'))
            {
                $frameworks->where(function($frameworks) use($request){
                    $frameworks->where('name_ar','like','%'.$request->keyword.'%');
                    $frameworks->orWhere('name_en','like','%'.$request->keyword.'%');
                    $frameworks->orWhere('description_ar','like','%'.$request->keyword.'%');
                    $frameworks->orWhere('description_en','like','%'.$request->keyword.'%');
                    $frameworks->orWhere('status','like','%'.$request->keyword.'%');
                    $frameworks->orWhere('by','like','%'.$request->keyword.'%');
                });
            }

        })->latest()->limit(10)->get();
        //   dd($request);
        return view('admin.frameworks.search',compact('frameworks'));
    }

    public function delete() {
        $frameworks = Framework::onlyTrashed()->paginate(10);
        return view('admin.frameworks.delete', compact('frameworks'));
    }

    public function recovery($id)
    {
        $frameworks = Framework::where('id', $id)->withTrashed()->first();
        $frameworks->restore();

        return redirect()->route('frameworks.index')
            ->with('message', "لقد نجحت في استعادة بيئة العمل $frameworks->name_ar");
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
        'xwd',
        'jfif'
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
