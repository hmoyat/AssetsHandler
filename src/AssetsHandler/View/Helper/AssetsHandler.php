<?php
/**
 * Created by PhpStorm.
 * User: hmoya
 * Date: 8/25/14
 * Time: 2:03 PM
 */

namespace AssetsHandler\View\Helper;


use Zend\View\Helper\AbstractHelper;

class AssetsHandler extends AbstractHelper
{

    private $_path = null;

    public function __construct($path)
    {
        $this->_path = $path;
    }

    public function __invoke($path)
    {
        if (!is_string($path))
            throw new \InvalidArgumentException('URL must be a string');

        $path = trim($path);
        if (strlen($path) == 0)
            throw new \InvalidArgumentException('URL can not be an empty string');

        $separator = ($path[0] != '/' && $this->_path[strlen($this->_path) - 1] != '/') ? '/' : '';
        return $this->_path . $separator . $path;
    }

} 