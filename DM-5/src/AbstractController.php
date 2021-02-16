<?php
namespace Base;

use App\Model\User;
use Imagick;

abstract class AbstractController
{
    /** @var View */
    protected $view;
    /** @var User */
    protected $user;

    protected function redirect(string $url)
    {
        throw new RedirectException($url);
    }

    public function setView(View $view): void
    {
        $this->view = $view;
    }

    public function getUser()
    {
        $userId = $_SESSION['id'];
        if (!$userId) {
            return null;
        }

        $user = User::getById($userId);
        if (!$user) {
            return null;
        }
        
        $this->user = $user;
        
        return $user;
    }
    
    protected function setImage(array $img, int $width, int $height = 0)
    {
        if (!empty($img)) {
            $imagePath = DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR;
            $imageName = time();
            $ext = ($img['type'] == 'image/png') ? '.png' : '.jpg';
            
            $watermark = new Imagick();
            $watermark->readImage(PROJECT_ROOT_DIR . $imagePath . "watermark.png");
            
            
            $imagick = new Imagick();
            $imagick->readImage($img['tmp_name']);
            $imagick->setImageCompression(imagick::COMPRESSION_JPEG);
            $imagick->setImageCompressionQuality(90);
            if ($height > 0) {
                $imagick->cropThumbnailImage($width, $height, true);
            } else {
                $imagick->scaleImage($width, 9999, true);
            }
            
            $imagick->compositeImage($watermark, Imagick::COMPOSITE_OVER, 15, 15);
            $imagick->writeImage(PROJECT_ROOT_DIR . $imagePath . $imageName . $ext);
            $image = $imageName . $ext;
        }
        
        return $image;
    }
}