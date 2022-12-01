<?php
/**
 * =======================================================================================
 *                           GemFramework (c) GemPixel
 * ---------------------------------------------------------------------------------------
 *  This software is packaged with an exclusive framework as such distribution
 *  or modification of this framework is not allowed before prior consent from
 *  GemPixel. If you find that this framework is packaged in a software not distributed
 *  by GemPixel or authorized parties, you must not use this software and contact GemPixel
 *  at https://gempixel.com/contact to inform them of this misuse.
 * =======================================================================================
 *
 * @package GemPixel\Premium-URL-Shortener
 * @author GemPixel (https://gempixel.com)
 * @license https://gempixel.com/licenses
 * @link https://gempixel.com
 */

namespace Helpers;

use Helpers\QR\DiamondModule;
use Helpers\QR\EyeGenerator;
use Helpers\QR\HeartModule;
use BaconQrCode\Common\ErrorCorrectionLevel;
use BaconQrCode\Encoder\Encoder;
use BaconQrCode\Exception\WriterException;
use BaconQrCode\Renderer\Color\Alpha;
use BaconQrCode\Renderer\Color\ColorInterface;
use BaconQrCode\Renderer\Color\Rgb;
use BaconQrCode\Renderer\Eye\EyeInterface;
use BaconQrCode\Renderer\Eye\ModuleEye;
use BaconQrCode\Renderer\Eye\SimpleCircleEye;
use BaconQrCode\Renderer\Eye\SquareEye;
use BaconQrCode\Renderer\Image\EpsImageBackEnd;
use BaconQrCode\Renderer\Image\ImageBackEndInterface;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Module\DotsModule;
use BaconQrCode\Renderer\Module\ModuleInterface;
use BaconQrCode\Renderer\Module\RoundnessModule;
use BaconQrCode\Renderer\Module\SquareModule;
use BaconQrCode\Renderer\RendererStyle\EyeFill;
use BaconQrCode\Renderer\RendererStyle\Fill;
use BaconQrCode\Renderer\RendererStyle\Gradient;
use BaconQrCode\Renderer\RendererStyle\GradientType;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

class QRImagick {
    /**
     * Instance of the writer
     *
     * @author GemPixel <https://gempixel.com>
     * @version 6.0
     */
    private $writer = null;
    /**
     * Add Logo
     *
     * @author GemPixel <https://gempixel.com>
     * @version 6.0
     */
    private $logo = null;
    /**
     * Get Extension
     *
     * @author GemPixel <https://gempixel.com>
     * @version 6.0
     */
    private $extension = null;
    /**
     * Instance of the QR
     *
     * @author GemPixel <https://gempixel.com>
     * @version 6.0
     */
    private $Qr = null;

    /**
     * Generate QR Code
     *
     * @author GemPixel <https://gempixel.com>
     * @version 6.7
     */
    public function __construct($data, $size = 200, $margin = 10){

        $this->Qr = new \stdClass;

        $this->Qr->module = SquareModule::instance();

        $this->Qr->eye = SquareEye::instance();

        $this->Qr->fill = Fill::withForegroundColor(new Rgb(255,255,255), new Rgb(0,0,0), EyeFill::inherit(), EyeFill::inherit(), EyeFill::inherit());

        $this->Qr->data = $data;
        $this->Qr->size = $size;
        $this->Qr->margin = $margin;

        $this->Qr->errorLevel = ErrorCorrectionLevel::M();

        $this->Qr->logo = null;

        return $this;

    }
    /**
     * Add Logo
     *
     * @author GemPixel <https://gempixel.com>
     * @version 6.0
     * @param [type] $path
     * @param integer $size
     * @return void
     */
    public function withLogo($path, $size = 50){
        $this->Qr->logo = [$path, $size];
        return $this;
    }
    /**
     * Create a QR Code format
     *
     * @author GemPixel <https://gempixel.com>
     * @version 6.7
     * @return void
     */
    public function format($format = 'svg'){

        $this->writer = new SvgImageBackEnd();
        $this->extension = in_array($format, ['png', 'pdf']) ? $format : 'svg';

        return $this;
    }
    /**
     * Set Background and Foreground color
     *
     * @author GemPixel <https://gempixel.com>
     * @version 6.0
     * @param array $bg
     * @param array $fg
     * @return void
     */
    public function color($fg, $bg, $frame = null, $eye = null){
        
        $bgColor = [255,255,255];
        
        \preg_match('|rgb\((.*)\)|', $bg, $color);
        if(isset($color[1])){
            $bgColor = \explode(',', $color[1]);
        }
        $alpha  = $bg === null || empty($bg) ? 0 : 100;
        $this->Qr->bgColor = new Alpha($alpha, new Rgb(...$bgColor));

        $fgColor = [0,0,0];

        \preg_match('|rgb\((.*)\)|', $fg, $color);
        if(isset($color[1])){
            $fgColor = \explode(',', $color[1]);
        }

        $this->Qr->fgColor = new Rgb(...$fgColor);

        $frameColor = $eyeColor = $fgColor;

        if($frame){
            \preg_match('|rgb\((.*)\)|', $frame, $color);
            if(isset($color[1])){
                $frameColor = \explode(',', $color[1]);
            }
        }

        if($eye){
            \preg_match('|rgb\((.*)\)|', $eye, $color);
            if(isset($color[1])){
                $eyeColor = \explode(',', $color[1]);
            }
        }

        $this->Qr->eyeColor = new EyeFill(new Rgb(...$frameColor), new Rgb(...$eyeColor));

        $this->Qr->fill = Fill::withForegroundColor($this->Qr->bgColor, $this->Qr->fgColor, $this->Qr->eyeColor, $this->Qr->eyeColor, $this->Qr->eyeColor);

        return $this;
    }
    /**
     * Gradient
     *
     * @author GemPixel <https://gempixel.com>
     * @version 6.0
     * @param [type] $fg
     * @param [type] $bg
     * @param [type] $eye
     * @return void
     */
    public function gradient($fg, $bg, $type, $frame= null, $eye = null){

        \preg_match('|rgb\((.*)\)|', $bg, $color);

        if(isset($color[1])){
            $bgColor = \explode(',', $color[1]);
        } else {
            $bgColor = [255,255,255];
        }

        $alpha  = $bg === null || empty($bg) ? 0 : 100;
        
        $this->Qr->bgColor = new Alpha($alpha, new Rgb(...$bgColor));
        
        $fgColor = [];

        foreach($fg as $fgcolor){
            \preg_match('|rgb\((.*)\)|', $fgcolor, $color);
            $fgColor[] = new Rgb(...\explode(',', $color[1]));
        }

        if(in_array($type, ['vertical', 'horizontal', 'diagonal', 'radial'])){
            $type = strtoupper($type);
            $fgColor[] = GradientType::$type();
        } else{
            $fgColor[] = GradientType::VERTICAL();
        }

        $this->Qr->fgColor = new Gradient($fgColor[0], $fgColor[1], $fgColor[2]);

        $this->Qr->eyeColor = EyeFill::inherit();

        if($frame){
            \preg_match('|rgb\((.*)\)|', $frame, $color);
            if(isset($color[1])){
                $frameColor = \explode(',', $color[1]);
            }
        }

        if($eye){
            \preg_match('|rgb\((.*)\)|', $eye, $color);
            if(isset($color[1])){
                $eyeColor = \explode(',', $color[1]);
            }
        }
        
        if(isset($frameColor) && isset($eyeColor)){
            
            $this->Qr->eyeColor = new EyeFill(new Rgb(...$frameColor), new Rgb(...$eyeColor));

            $this->Qr->fill = Fill::withForegroundGradient($this->Qr->bgColor, $this->Qr->fgColor, $this->Qr->eyeColor, $this->Qr->eyeColor, $this->Qr->eyeColor);

        }elseif(isset($frameColor)){

            $this->Qr->eyeColor = new EyeFill(new Rgb(...$frameColor), $fgColor[0]);
            
            $this->Qr->fill = Fill::withForegroundGradient($this->Qr->bgColor, $this->Qr->fgColor, $this->Qr->eyeColor, $this->Qr->eyeColor, new EyeFill(new Rgb(...$frameColor), $fgColor[1]));

        }elseif(isset($eyeColor)){
            
            $this->Qr->eyeColor = new EyeFill($fgColor[0], new Rgb(...$eyeColor));
            
            $this->Qr->fill = Fill::withForegroundGradient($this->Qr->bgColor, $this->Qr->fgColor, $this->Qr->eyeColor, $this->Qr->eyeColor, new EyeFill($fgColor[1], new Rgb(...$eyeColor)));

        } else {
            $this->Qr->fill = Fill::withForegroundGradient($this->Qr->bgColor, $this->Qr->fgColor, $this->Qr->eyeColor, $this->Qr->eyeColor,  $this->Qr->eyeColor);
            
        }        

        return $this;
    }

    /**
     * Eye
     *
     * @author GemPixel <https://gempixel.com>
     * @version 6.0
     * @param string $type
     * @return void
     */
    public function eye($eye = 'square', $frame='square'){
        
        $this->Qr->eye = EyeGenerator::instance($eye, $frame);

        return $this;
    }
    /**
     * Module
     *
     * @author GemPixel <https://gempixel.com>
     * @version 6.0
     * @param string $type
     * @param float $size
     * @return void
     */
    public function module($type = 'square', $size = 0.5){
        
        if ($type == 'heart') {
            $this->Qr->module = new HeartModule($size*1.5);
        }

        if ($type == 'diamond') {
            $this->Qr->module = new DiamondModule($size*1.5);
        }

        if ($type == 'dot') {
            $this->Qr->module = new DotsModule($size*1.5);
        }

        if ($type == 'circle') {
            $this->Qr->module = new RoundnessModule($size);
        }
        
        return $this;
    }
    /**
     * Download QR
     *
     * @author GemPixel <https://gempixel.com>
     * @version 6.0
     * @return void
     */
    public function string(){

        $renderer = new ImageRenderer(
            new RendererStyle($this->Qr->size, $this->Qr->margin, $this->Qr->module, $this->Qr->eye, $this->Qr->fill),
            $this->writer
        );

        $writer = new Writer($renderer);

        $qr = $writer->writeString($this->Qr->data, 'UTF-8', $this->Qr->errorLevel);

        if($this->extension != 'svg'){
            
            $png = new \Imagick();
            if($this->Qr->bgColor instanceof Alpha){
                $png->setBackgroundColor(new \ImagickPixel('transparent'));
            }
            $png->readImageBlob($qr);
            $png->setImageFormat("png32");
            $png->resizeImage($this->Qr->size, $this->Qr->size, \Imagick::FILTER_BOX , 1);   

            $qr = $png->getImageBlob();

            if($this->Qr->logo){
                $logo = new \Imagick($this->Qr->logo[0]);
                $logo->setImageFormat('png32');
                $this->Qr->logo[1] = $this->Qr->logo[1] * 0.75;
                $logo->resizeimage($this->Qr->logo[1], $this->Qr->logo[1], \Imagick::FILTER_BOX, 1);
                $png->compositeimage($logo->getimage(), \Imagick::COMPOSITE_OVER, ($this->Qr->size - $this->Qr->logo[1]) /2, ($this->Qr->size - $this->Qr->logo[1]) /2);
                $png->setImageFormat('png32');
    
                $qr = $png->getImageBlob();
            }
        }

        if($this->Qr->logo && $this->extension == 'svg'){

            $xml = new \SimpleXMLElement($qr);

            $logoImageData = new \Imagick($this->Qr->logo[0]);

            $this->Qr->logo[1] = $this->Qr->logo[1] * 0.75;

            $xmlAttributes = $xml->attributes();

            $x = intval($xmlAttributes->width) / 2 - $this->Qr->logo[1] / 2;
            $y = intval($xmlAttributes->height) / 2 - $this->Qr->logo[1] / 2;

            $imageDefinition = $xml->addChild('image');
            $imageDefinition->addAttribute('x', strval($x));
            $imageDefinition->addAttribute('y', strval($y));
            $imageDefinition->addAttribute('width', strval($this->Qr->logo[1]));
            $imageDefinition->addAttribute('height', strval($this->Qr->logo[1]));
            $imageDefinition->addAttribute('preserveAspectRatio', 'none');

            $imageDefinition->addAttribute('href', 'data:'.$logoImageData->getImageMimeType().';base64,' . base64_encode($logoImageData->getImageBlob()));

            return $xml->asXML();
        }

        if($this->extension == 'pdf'){
     
            $pdf = new \FPDF();
            $pdf->AddPage();
            $pdf->Image('data:image/png;base64,' . base64_encode($qr), 10, 10, 190, 0, 'png');
            return $pdf->Output('S');
        }

        return $qr;
    }
    /**
     * Return extension
     *
     * @author GemPixel <https://gempixel.com>
     * @version 6.0
     * @return void
     */
    public function extension(){
        return $this->extension;
    }
    /**
     * Get Mime Type
     *
     * @author GemPixel <https://gempixel.com>
     * @version 6.0
     * @return void
     */
    public function getMimeType(){

        if($this->extension == 'svg'){
            return 'image/svg+xml';
        } else {
            return 'image/png';
        }
    }
    /**
     * Error Correction
     *
     * @author GemPixel <https://gempixel.com> 
     * @version 6.7
     * @param string $level
     * @return void
     */
    public function errorCorrection(string $level = 'm'){
        
        $level = strtoupper($level);

        $this->Qr->errorLevel = ErrorCorrectionLevel::$level();
    }
    /**
     * Generate QR
     *
     * @author GemPixel <https://gempixel.com>
     * @version 6.0
     * @return void
     */
    public function create($output = 'raw', $file = null){


        $renderer = new ImageRenderer(
            new RendererStyle($this->Qr->size, $this->Qr->margin, $this->Qr->module, $this->Qr->eye, $this->Qr->fill),
            $this->writer
        );

        $writer = new Writer($renderer);
        try{
            $qr = $writer->writeString($this->Qr->data, 'UTF-8', $this->Qr->errorLevel);
        } catch(\Exception $e){
            return new \Exception(e('An error occurred'));
        }


        if($this->extension != 'svg'){
            
            $png = new \Imagick();
            if($this->Qr->bgColor instanceof Alpha){
                $png->setBackgroundColor(new \ImagickPixel('transparent'));
            }
            $png->readImageBlob($qr);
            $png->setImageFormat("png32");
            $png->resizeImage($this->Qr->size, $this->Qr->size, \Imagick::FILTER_BOX, 1);   

            $qr = $png->getImageBlob();

            if($this->Qr->logo){
    
                $logo = new \Imagick($this->Qr->logo[0]);
                $logo->setBackgroundColor(new \ImagickPixel('transparent'));
                $logo->setImageFormat('png32');
                $logo->resizeimage($this->Qr->logo[1], $this->Qr->logo[1], \Imagick::FILTER_BOX, 1);
    
                $new = new \Imagick();
                $new->newimage( $this->Qr->size, $this->Qr->size, "none");    
                $new->compositeimage($png->getimage(), \Imagick::COMPOSITE_COPY, 0, 0);
                $new->compositeimage($logo->getimage(), \Imagick::COMPOSITE_COPY, ($this->Qr->size - $this->Qr->logo[1]) /2, ($this->Qr->size - $this->Qr->logo[1]) /2);
                $new->setImageFormat('png32');
    
                $qr = $new->getImageBlob();
            }
        }

        if($this->Qr->logo && $this->extension == 'svg'){

            $xml = new \SimpleXMLElement($qr);

            $logoImageData = new \Imagick($this->Qr->logo[0]);

            $this->Qr->logo[1] = $this->Qr->logo[1] * 0.75; 

            $xmlAttributes = $xml->attributes();

            $x = intval($xmlAttributes->width) / 2 - $this->Qr->logo[1] / 2;
            $y = intval($xmlAttributes->height) / 2 - $this->Qr->logo[1] / 2;

            $imageDefinition = $xml->addChild('image');
            $imageDefinition->addAttribute('x', strval($x));
            $imageDefinition->addAttribute('y', strval($y));
            $imageDefinition->addAttribute('width', strval($this->Qr->logo[1]));
            $imageDefinition->addAttribute('height', strval($this->Qr->logo[1]));
            $imageDefinition->addAttribute('preserveAspectRatio', 'none');

            $imageDefinition->addAttribute('href', 'data:'.$logoImageData->getImageMimeType().';base64,' . base64_encode($logoImageData->getImageBlob()));

            $qr = $xml->asXML();
        }

        if($output == 'file') {            
            if(config('cdn') && config('cdn')->enabled){
                return \Helpers\CDN::factory()->uploadRaw(str_replace(PUB.'/', '', $file), $qr, $this->getMimeType());                
            }
            return file_put_contents($file, $qr);
        }
        
        if($output == 'uri') return 'data:'.$this->getMimeType().';base64,'.base64_encode($qr);

        header('Content-Type: '.$this->getMimeType());
        echo $qr;
        exit;
    }

}