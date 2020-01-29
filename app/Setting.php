<?php

namespace App;

use Auth;
use Image;
use Storage;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
	protected $fillable = [
		'name', 'name_prefix', 'desc', 'meta_tags', 'yandex_metrica', 'yandex_webmaster', 'google_analytics', 'admin_email'
	];

	public static function add($fields)
	{
		$user = new static;
		$user->fill($fields);
		$user->save();

		return $user;
	}

	public function edit($fields)
	{
		$this->fill($fields); //name,email
		
		$this->save();
	}

	// Logotype
	public function uploadLogotype($image)
	{
		if($image == null) { return; }

		$this->removeLogotype();

		$filename = Str::random(10) . '.' . $image->getClientOriginalExtension();
		$path = '/public/uploads/logotypes/' . $filename;
		$img = Image::make($image);

		Storage::put($path, (string) $img->encode());

		$this->logotype = $filename;
		$this->save();
	}

	public function removeLogotype()
	{
		if($this->logotype != null)
		{
			Storage::disk('public')->delete('uploads/logotypes/' . $this->logotype);
		}
	}

	public function getLogotype()
	{
		if($this->logotype == null)
		{
			return '/assets/noimage.png';
		}

		return '/storage/uploads/logotypes/' . $this->logotype;
	}
	// End::Logotype


	// Favicon
	public function uploadFavicon($image)
	{
		if($image == null) { return; }

		$this->removeFavicon();

		$filename = 'favicon' . '.' . $image->getClientOriginalExtension();

		$filename_48 = '48x48-' . $filename;
		$filename_57 = '57x57-' . $filename;
		$filename_72 = '72x72-' . $filename;
		$filename_114 = '114x114-' . $filename;
		
		$path_48 = '/public/uploads/logotypes/' . $filename_48;
		$path_57 = '/public/uploads/logotypes/' . $filename_57;
		$path_72 = '/public/uploads/logotypes/' . $filename_72;
		$path_114 = '/public/uploads/logotypes/' . $filename_114;

		$img_48 = Image::make($image)->widen(48)->heighten(48);
		$img_57 = Image::make($image)->widen(57)->heighten(57);
		$img_72 = Image::make($image)->widen(72)->heighten(72);
		$img_114 = Image::make($image)->widen(114)->heighten(114);

		Storage::put($path_48, (string) $img_48->encode());
		Storage::put($path_57, (string) $img_57->encode());
		Storage::put($path_72, (string) $img_72->encode());
		Storage::put($path_114, (string) $img_114->encode());

		$this->favicon = $filename;
		$this->save();
	}

	public function getFavicon($size)
	{
		if($this->favicon == null)
		{
			return '/assets/noimage.png';
		}

		return '/storage/uploads/logotypes/' . $size . 'x' . $size . '-' . $this->favicon;
	}

	public function removeFavicon()
	{
		if($this->favicon != null)
		{
			Storage::disk('public')->delete('uploads/logotypes/' . '48x48-' . $this->favicon);
			Storage::disk('public')->delete('uploads/logotypes/' . '57x57-' . $this->favicon);
			Storage::disk('public')->delete('uploads/logotypes/' . '72x72-' . $this->favicon);
			Storage::disk('public')->delete('uploads/logotypes/' . '114x114-' . $this->favicon);
		}
	}

	// End::Favicon

	// Favicon Retina
	public function uploadFaviconRetina($image)
	{
		if($image == null) { return; }

		$this->removeFaviconRetina();

		$filename = 'favicon_retina' . '.' . $image->getClientOriginalExtension();

		$filename_72 = '72x72-' . $filename;
		$filename_114 = '114x114-' . $filename;
		
		$path_72 = '/public/uploads/logotypes/' . $filename_72;
		$path_114 = '/public/uploads/logotypes/' . $filename_114;

		$img_72 = Image::make($image)->widen(72)->heighten(72);
		$img_114 = Image::make($image)->widen(114)->heighten(114);

		Storage::put($path_72, (string) $img_72->encode());
		Storage::put($path_114, (string) $img_114->encode());

		$this->favicon_retina = $filename;
		$this->save();
	}

	public function getFaviconRetina($size)
	{
		if($this->favicon_retina == null)
		{
			return '/assets/noimage.png';
		}

		return '/storage/uploads/logotypes/' . $size . 'x' . $size . '-' . $this->favicon_retina;
	}

	public function removeFaviconRetina()
	{
		if($this->favicon_retina != null)
		{
			Storage::disk('public')->delete('uploads/logotypes/' . '48x48-' . $this->favicon_retina);
			Storage::disk('public')->delete('uploads/logotypes/' . '57x57-' . $this->favicon_retina);
			Storage::disk('public')->delete('uploads/logotypes/' . '72x72-' . $this->favicon_retina);
			Storage::disk('public')->delete('uploads/logotypes/' . '114x114-' . $this->favicon_retina);
		}
	}
	// End::Favicon Retina

	// OG Image
	public function uploadOgImage($image)
	{
		if($image == null) { return; }

		$this->removeOgImage();

		$filename = 'og_image' . '.' . $image->getClientOriginalExtension();
		$path = '/public/uploads/logotypes/' . $filename;
		$img = Image::make($image);

		Storage::put($path, (string) $img->encode());

		$this->og_image = $filename;
		$this->save();
	}

	public function getOgImage()
	{
		if($this->og_image == null)
		{
			return '/assets/noimage.png';
		}

		return '/storage/uploads/logotypes/' . $this->og_image;
	}

	public function removeOgImage()
	{
		if($this->og_image != null)
		{
			Storage::disk('public')->delete('uploads/logotypes/' . $this->og_image);
		}
	}
	// End::OG Image

}
