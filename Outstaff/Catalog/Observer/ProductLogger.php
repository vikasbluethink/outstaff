<?php

namespace Outstaff\Catalog\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Locale\Resolver;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;
use Outstaff\Catalog\Logger\Logger;

/**
 * Observer for product log
 */
class ProductLogger implements ObserverInterface
{
    /**
     * @var Logger
     */
    protected $logger;
    /**
     * @var Resolver
     */
    protected $localeResolver;
    /**
     * @var TimezoneInterface
     */
    protected $timezoneInterface;

    /**
     * @param Logger $logger
     * @param Resolver $localeResolver
     * @param TimezoneInterface $timezoneInterface
     */
    public function __construct(
        Logger $logger,
        Resolver $localeResolver,
        TimezoneInterface $timezoneInterface
    ) {
        $this->logger = $logger;
        $this->localeResolver = $localeResolver;
        $this->timezoneInterface = $timezoneInterface;
    }

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        $product = $observer->getProduct();
        $dateTime = $this->timezoneInterface->date()->format('Y-m-d H:i:s');
        $this->logger->info("Product details");
        $this->logger->info($product->getId());
        $this->logger->info($dateTime);
    }
}
