<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Marketingimage;
use App\Http\Requests\CreateImageRequest;
use App\Http\Requests\EditImageRequest;
use Input;
use Image;

class MarketingImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Marketingimage::all();

   		return view('marketingimages.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marketingimages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateImageRequest $request)
    {
        //create new instance of model to save from form

   		$marketingImage = new Marketingimage([
       		'image_name'        => $request->get('image_name'),
       		'image_extension'   => $request->file('image')->getClientOriginalExtension(),
       		'mobile_image_name' => $request->get('mobile_image_name'),
       		'mobile_extension'  => $request->file('mobile_image')->getClientOriginalExtension(),
       		'is_active'         => $request->get('is_active'),
       		'is_featured'       => $request->get('is_featured'),

   		]);

   		//define the image paths

   		$destinationFolder = '/img/marketing/';
   		$destinationThumbnail = '/img/marketing/thumbnails/';
   		$destinationMobile = '/img/marketing/mobile/';

   		//assign the image paths to new model, so we can save them to DB

   		$marketingImage->image_path = $destinationFolder;
   		$marketingImage->mobile_image_path = $destinationMobile;

   		// format checkbox values and save model

   		$this->formatCheckboxValue($marketingImage);
   		$marketingImage->save();

   		//parts of the image we will need

   		$file = Input::file('image');

   		$imageName = $marketingImage->image_name;
   		$extension = $request->file('image')->getClientOriginalExtension();

   		//create instance of image from temp upload

   		$image = Image::make($file->getRealPath());

   		//save image with thumbnail

   		$image->save(public_path() . $destinationFolder . $imageName . '.' . $extension)
       		->resize(60, 60)
       		// ->greyscale()
       		->save(public_path() . $destinationThumbnail . 'thumb-' . $imageName . '.' . $extension);

   		// now for mobile

   		$mobileFile = Input::file('mobile_image');

   		$mobileImageName = $marketingImage->mobile_image_name;
   		$mobileExtension = $request->file('mobile_image')->getClientOriginalExtension();

   		//create instance of image from temp upload
   		$mobileImage = Image::make($mobileFile->getRealPath());
   		$mobileImage->save(public_path() . $destinationMobile . $mobileImageName . '.' . $mobileExtension);


   		// Process the uploaded image, add $model->attribute and folder name

   		flash()->success('Marketing Image Created!');

   		return redirect()->route('marketingimages.show', [$marketingImage]);
    }


	public function formatCheckboxValue($marketingImage)
	{

   		$marketingImage->is_active = ($marketingImage->is_active == null) ? 0 : 1;
   		$marketingImage->is_featured = ($marketingImage->is_featured == null) ? 0 : 1;
	}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $marketingImage = Marketingimage::findOrFail($id);

   		return view('marketingimages.show', compact('marketingImage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marketingImage = Marketingimage::findOrFail($id);

   		return view('marketingimages.edit', compact('marketingImage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EditImageRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, EditImageRequest $request)
    {
        $marketingImage = Marketingimage::findOrFail($id);

   		$marketingImage->is_active = $request->get('is_active');
   		$marketingImage->is_featured = $request->get('is_featured');

   		$this->formatCheckboxValue($marketingImage);
   		$marketingImage->save();

   		if ( ! empty(Input::file('image'))){

       		$destinationFolder = '/img/marketing/';
       		$destinationThumbnail = '/img/marketing/thumbnails/';

       		$file = Input::file('image');

       		$imageName = $marketingImage->image_name;
       		$extension = $request->file('image')->getClientOriginalExtension();

       		//create instance of image from temp upload
       		$image = Image::make($file->getRealPath());

       		//save image with thumbnail
       		$image->save(public_path() . $destinationFolder . $imageName . '.' . $extension)
           		->resize(60, 60)
           		// ->greyscale()
           		->save(public_path() . $destinationThumbnail . 'thumb-' . $imageName . '.' . $extension);

   		}

   		if ( ! empty(Input::file('mobile_image'))) {

       		$destinationMobile = '/img/marketing/mobile/';
       		$mobileFile = Input::file('mobile_image');

       		$mobileImageName = $marketingImage->mobile_image_name;
       		$mobileExtension = $request->file('mobile_image')->getClientOriginalExtension();

       		//create instance of image from temp upload
       		$mobileImage = Image::make($mobileFile->getRealPath());
       		$mobileImage->save(public_path() . $destinationMobile . $mobileImageName . '.' . $mobileExtension);
   		}

   		flash()->success('image edited!');
   		return view('marketingimages.edit', compact('marketingImage'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marketingImage = Marketingimage::findOrFail($id);
   		$thumbPath = $marketingImage->image_path.'thumbnails/';

   		File::delete(public_path($marketingImage->image_path).
                            $marketingImage->image_name . '.' .
                            $marketingImage->image_extension);

   		File::delete(public_path($marketingImage->mobile_image_path).
                            $marketingImage->mobile_image_name . '.' .
                            $marketingImage->mobile_extension);
  	 	File::delete(public_path($thumbPath). 'thumb-' .
                            $marketingImage->image_name . '.' .
                            $marketingImage->image_extension);

    	Marketingimage::destroy($id);

   		flash()->success('image deleted!');

   		return redirect()->route('marketingimages.index');
    }
}
