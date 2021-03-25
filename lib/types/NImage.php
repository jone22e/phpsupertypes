<?php


namespace Jone22\SuperTypes;


class NImage {

    private $image;
    private $imageBytea;

    /**
     * NImage constructor.
     * @param $image
     */
    public function __construct($image=null) { $this->image = $image; }

    public function fromBytea($bitea) {
        $this->imageBytea = pg_unescape_bytea($bitea);
        $this->image = imagecreatefromstring(pg_unescape_bytea($bitea));
    }

    public function getResource() {
        imagealphablending($this->image, false);
        imagesavealpha($this->image,true);
        return $this->image;
    }

    public function applyWaterMark($text) {

        $width = imagesx($this->image);
        $height = imagesy($this->image);

        $color = imagecolorallocatealpha($this->image, 255,255,255, 80);
        $wm = $text;
        for ($i = 0; $i <= $height; $i=$i+50) {
            for ($a = 0; $a < $width; $a=$a+90) {
                imagettftext($this->image, 10, 45, $a, $i, $color, $_SERVER['DOCUMENT_ROOT'] . '/font/ProximaNova-Regular.woff', $wm);
            }
           // imagettftext($this->image, 10, 45, 90, $i, $color, $_SERVER['DOCUMENT_ROOT'] . '/font/ProximaNova-Regular.woff', $wm);
           // imagettftext($this->image, 10, 45, 180, $i, $color, $_SERVER['DOCUMENT_ROOT'] . '/font/ProximaNova-Regular.woff', $wm);
           // imagettftext($this->image, 10, 45, 270, $i, $color, $_SERVER['DOCUMENT_ROOT'] . '/font/ProximaNova-Regular.woff', $wm);
           // imagettftext($this->image, 10, 45, 360, $i, $color, $_SERVER['DOCUMENT_ROOT'] . '/font/ProximaNova-Regular.woff', $wm);
        }
        imagealphablending($this->image, false);
        imagesavealpha($this->image, true);
    }

    public function toImage() {
        return imagepng($this->image);
    }

    public function toImageBytes() {
        return $this->imageBytea;
    }

    public function toBase64() {

        imagealphablending($this->image, false);
        imagesavealpha($this->image,true);

        ob_start();
        imagepng($this->image);
        $data = ob_get_clean();
        return "data:image/png;base64,".base64_encode($data);
    }

    public function toBase64fromBytes() {
        ob_start();
        imagepng($this->imageBytea);
        $data = ob_get_clean();
        return "data:image/png;base64,".base64_encode($data);
    }

    public function createImage($text, $fontSize = 10, $imgWidth = 50, $imgHeight = 50) {
        $font = $_SERVER['DOCUMENT_ROOT'] . '/font/ProximaNova-Regular.woff';

        $this->image = imagecreatetruecolor($imgWidth, $imgHeight);
        //create some colors
        $white = imagecolorallocate($this->image, 255, 255, 255);
        $grey = imagecolorallocate($this->image, 128, 128, 128);
        $black = imagecolorallocate($this->image, 0, 0, 0);
        imagefilledrectangle($this->image, 0, 0, $imgWidth - 1, $imgHeight - 1, $white);

        //break lines
        $splitText = explode ( "\\n" , $text );
        $lines = count($splitText);

        foreach($splitText as $txt){
            $textBox = imagettfbbox($fontSize,$angle,$font,$txt);
            $textWidth = abs(max($textBox[2], $textBox[4]));
            $textHeight = abs(max($textBox[5], $textBox[7]));
            $x = (imagesx($this->image) - $textWidth)/2;
            $y = ((imagesy($this->image) + $textHeight)/2)-($lines-2)*$textHeight - $fontSize;
            $lines = $lines-1;

            //add some shadow to the text
            imagettftext($this->image, $fontSize, $angle, $x, $y, $grey, $font, $txt);

            //add the text
            imagettftext($this->image, $fontSize, $angle, $x, $y, $black, $font, $txt);
        }
    }


}