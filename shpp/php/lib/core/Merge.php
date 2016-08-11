<?php

/**
 * Created by PhpStorm.
 * User: Yurii Chekan
 * Date: 08.08.2016
 * Time: 23:45
 * gromret@gmail.com
 */
class Merge
{
    private $_files;

    public function __construct()
    {
        require_once('fpdf/fpdf.php');
        require_once('fpdi/fpdi.php');
    }

    /**
     * Add a PDF for inclusion in the merge with a valid file path
     * Pages should be formatted: 1, 2, 3 (default: all)
     * @param $path
     * @param string $pages
     * @return $this
     * @throws exception
     * @internal param $page
     */
    public function addPDF($path, $pages)
    {
        if (file_exists($path)) {
            if (strtolower($pages) != 'all')
                $pages = $this->_rewritepages($pages);
            $this->_files[] = array($path, $pages);
        } else
            throw new exception("I can not download the file '$path'");
        return $this;
    }

    /**
     * @param string $output
     * @param string $outputpath
     * @return bool
     * @throws exception
     */
    public function merge($output = 'browser', $outputpath = 'newfile.pdf')
    {
        if (!isset($this->_files) || !is_array($this->_files)) : throw new exception("I can not merge PDFs"); endif;

        $fpdi = new FPDI;

        // The main function for merge
        foreach ($this->_files as $file) {
            $filename = $file[0];
            $filepages = $file[1];

            $count = $fpdi->setSourceFile($filename);

            // Add the pages
            if ($filepages == 'all') {
                for ($i = 1; $i <= $count; ++$i) {
                    $template = $fpdi->importPage($i);
                    $size = $fpdi->getTemplateSize($template);

                    $fpdi->AddPage('P', array($size['w'], $size['h']));
                    $fpdi->useTemplate($template);
                }
            } else {
                foreach ($filepages as $page) {
                    if (!$template = $fpdi->importPage($page)) : throw new exception("Could not load page '$page' in PDF '$filename'. Check that the page exists."); endif;
                    $size = $fpdi->getTemplateSize($template);

                    $fpdi->AddPage('P', array($size['w']), $size['h']);
                    $fpdi->useTemplate($template);
                }
            }
        }
        // The output operations
        $mode = $this->_switchmode($output);

        if ($mode == 'S')
            return $fpdi->Output($outputpath, 'S');
        else {
            if ($fpdi->Output($outputpath, $mode))
                return true;
            else {
                return false;
                throw new exception("Error outputting PDF to '$output'");
            }
        }
    }

    /**
     * FPDI uses single characters for specifying the output location. Change our more descriptive string into proper format.
     */
    private function _switchmode($mode)
    {
        switch ($mode) {
            case 'download':
                return 'D';
                break;
            case 'browser':
                return 'I';
                break;
            case 'file':
                return 'F';
                break;
            default:
                return 'I';
                break;
        }
    }

    private function _rewritepages($pages)
    {
        $pages = str_replace(' ', '', $pages);
        $part = explode(',', $pages);

        // The parse hyphens
        foreach ($part as $i) {
            $index = explode('-', $i);

            if (count($index) == 2) {
                $x = $index[0]; // The started page
                $y = $index[1]; // The end page

                if ($x > $y) : throw exception("Starting page, '$x' is greater than ending page '$y'.");
                    return false;
                endif;

                // The add middle pages
                while ($x <= $y) : $newpages[] = (int)$x;
                    ++$x; endwhile;
            } else
                $newpages[] = (int)$index[0];
        }
        return $newpages;
    }
}