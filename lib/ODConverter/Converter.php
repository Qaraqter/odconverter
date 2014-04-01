<?php
namespace ODConverter;

class Converter
{
    private $officeBinary;

    public function __construct($officeBinary)
    {
        $this->officeBinary = $officeBinary;
    }

    public function convert($file, $format, $outputDir = '.')
    {
        $outputDir = realpath($outputDir);

        $base = pathinfo($file, PATHINFO_FILENAME);
        $ext = pathinfo($file, PATHINFO_EXTENSION);

        $command = sprintf('%s --headless --convert-to %s --outdir %s %s 2>&1', $this->officeBinary, $format, $outputDir, $file);

        // Environment variable HOME should be set to a location that is
        // writable for the current user. By default Apache has no HOME set.
        exec('echo $HOME', $output);
        $home = $output[0];
        if (!$home) {
            $command = sprintf('export HOME=%s; %s; unset HOME', $outputDir, $command);
        }

        exec($command, $output, $value);

        return "$outputDir/$base.$format";
    }
}
