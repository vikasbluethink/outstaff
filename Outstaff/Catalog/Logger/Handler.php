<?php

namespace Outstaff\Catalog\Logger;

use Magento\Framework\Logger\Handler\Base;

/**
 * Custom logger handler
 */
class Handler extends Base
{
    /**
     * Logging level
     * @var int
     */
    protected $loggerType = Logger::INFO;
    /**
     * File name
     * @var string
     */
    protected $fileName = '/var/log/product_save.log';

}
