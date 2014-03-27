<?php
namespace ODConverter;

class Converter
{
    private $officeBinary;

    public function __construct($officeBinary)
    {
        $this->officeBinary = $officeBinary;
    }

    public function convert($file, $format)
    {
        $base = pathinfo($file, PATHINFO_FILENAME);
        $ext = pathinfo($file, PATHINFO_EXTENSION);

        $command = "$this->officeBinary --headless --convert-to $format $file";
        exec($command);

        return "$base.$format";
    }
}
