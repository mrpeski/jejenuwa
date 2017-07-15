<?php

namespace App;

use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;



class Media extends Model
{
	protected $fillable = ['file_path', 'name', 'thumbnail_path', 'alt_text'];

    protected $baseDir = 'files';

    protected $allowed_type = ['doc', 'image', 'video' ];


    public function path() {
    	$value = $this->getMime();
    	$type = ($value == 'application') ? 'doc': $value;
    	return url('admin/media/'.$type.'/'.$this->name);
    }
    
	/**
	 * Adds new Image to DB
	 *
	 * @param UploadedFile $file
	 * @return void
	 */		
    public function addNew(UploadedFile $file) {
    	$name = $file->getClientOriginalName();

    			$this->saveAs($name)
    				 ->moveToDisk($file);

	    			if($this->isImage($file)){
						$this->setImageFileInfo($file);
	    				$path = $this->makeImageThumbnail($file, 200, 200);
	    				$this->setThumbnailPath($path);
	    			} else {
						$this->setFileInfo($file);
	    				$this->setDefaultThumbnailPath();
	    			}
	    			
	    		$this->saveToDb();
    	return 1;
    }

	/**
	 * Sets media name
	 *
	 * @param string $name
	 * @return void
	 */
    protected function saveAs($name=NULL) {
    	$this->name = sprintf('%s-%s', time(), ($name)?: 'name');
        return $this;
    }

	/**
	 * Sets only Image type Information
	 *
	 * @param UploadedFile $file
	 * @return void
	 */
    public function setImageFileInfo(UploadedFile $file) {

    	$made = Image::make($file);
		$this->alt_text = sprintf('%s', $this->name);
        $this->user_id = Auth::id() ?: 0;
		$this->filesize = $made->fileSize();
		$this->width = $made->width();
		$this->height = $made->height();
		$this->mime = $made->mime();

		return $this;
    }

	/**
	 * Sets other media types information
	 *
	 * @param UploadedFile $file
	 * @return void
	 */
    public function setFileInfo(UploadedFile $file) {

		$this->alt_text = sprintf('%s', $this->name);
        $this->user_id = Auth::id() ?: 0;
		$this->filesize = $file->getClientSize();
		$this->width = NULL;
		$this->height = NULL;
		$this->mime = $file->getClientMimeType();

		return $this;
    }

	/**
	 * Moves file to local disk
	 *
	 * @param UploadedFile $file
	 * @return void
	 */
    public function moveToDisk(UploadedFile $file) {
		$filetype = $this->getFileType($file);
    	$this->file_path = $file->storeAs("public/{$filetype}", $this->name);
    	return $this;
    }
    

    public function saveToDb() {
    	$this->save();
    }

	public function isImg()
	{
		 return explode('/', $this->mime)[0] === 'image';
	}

	public function isVideo()
	{
		 return explode('/', $this->mime)[0] === 'video';
	}
    

    protected function setThumbnailPath($path) {
    	$this->thumbnail_path = $path;
    }

	protected function isImage(UploadedFile $file) {
		return explode('/', $file->getClientMimeType())[0] === 'image';
	}

	protected function setDefaultThumbnailPath() {
		$this->thumbnail_path = 'default/'. explode('/', $this->mime )[1].'_thumbnail.jpg';
	}

    protected function getMime() {
    	return explode('/', $this->mime)[0];
    }

	/**
	 * Generates Image thumbnail
	 *
	 * @param UploadedFile $image
	 * @param int $width
	 * @param int $height
	 * @return void
	 */
    public function makeImageThumbnail(UploadedFile $image, $width, $height) 
    {

    	$name = $this->name;
    	$parts = explode('.', $name);
    	$name = $parts[0] .'_'. $width . 'x' . $height . '.' . $parts[count($parts)-1];

    	$path =  storage_path("app/public/images/{$name}");
    	$image = Image::make($image)->fit($width, $height)->save($path);

    	return "public/images/{$name}";
    }

	public function getFileType(UploadedFile $file)
	{
		 return $filetype = explode('/', $file->getClientMimeType())[0];
	}
    
}
