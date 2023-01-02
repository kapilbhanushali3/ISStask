<?php

// Resize Width and Height of a Canvas/Image in PHP

class Canvas{

    public $w;
    public $h;
  

    function __construct($w,$h) {
        $this->w = $w;
        $this->h = $h;
    }

    public function canvasAspectRatio(){
        return $this->w/$this->h;
    }

    public function resizeHeight($w){
        $h = $w / $this->canvasAspectRatio();
        return $h;
    }

    public function resizeWeight($h){
        $w = $h * $this->canvasAspectRatio();
        return $w;
    }

    public function getCoverResult()
    {
    	return 'width: '.$this->w.', height: '.$this->h;
    }

    public function getContainResult($w,$h)
    {
    	if($this->w<=$w && $this->h<=$h)
    	{
    		return 'width: '.$this->w.', height: '.$this->h;
    	}

    	if($this->h>$h)
    	{
    		$image_w=$this->resizeWeight($h);
    		return 'width: '.floor($image_w).', height: '.$h;
    	}

    	if($this->w>$w)
    	{
    		$image_h=$this->resizeHeight($w);
    		return 'width: '.$w.', height: '.floor($image_h);
    	}
		

    }

}

$imageA = new Canvas(250,500);
$imageB = new Canvas(500,90);

$res_contain = $imageB->getContainResult($imageA->w,$imageA->h);
$res_cover = $imageB->getCoverResult();

echo 'Contain :- '.$res_contain;
echo "<br>";
echo 'Cover :- '.$res_cover;