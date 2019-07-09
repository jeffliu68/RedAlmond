<?php

namespace RedAlmond\Cms\Setup;

use Magento\Cms\Model\Page;
use Magento\Cms\Model\PageFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallData implements InstallDataInterface
{
    /**
     * Page factory
     *
     * @var PageFactory
     */
    private $pageFactory;

    /**
     * Init
     *
     * @param PageFactory $pageFactory
     */
    public function __construct(PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;
    }

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $cmsPages = [
            [
                'title' => 'Buttons Style Guide 2.2',
                'page_layout' => '2columns-right',
                'meta_keywords' => 'Page keywords',
                'meta_description' => 'Page description',
                'identifier' => 'buttons-style-guide-2-2',
                'content_heading' => '',
                'content' => '<style>.grid {  display: grid; grid-template-columns: 1fr 1fr 1fr; grid-gap: 40px; }</style>
                    <h1>BUTTONS</h1>
                    <div class="grid">
                    <div class="col"><button class="button primary tocart" type="button"><span><span>Load More</span></span></button></div>
                    <div class="col"><button class="button btn-continue" title="Continue Shopping" type="button"><span><span>Continue Shopping</span></span></button></div>
                    <div class="col"><button class="action primary checkout" type="button">Checkout</button></div>
                    </div>',
                'is_active' => 1,
                'stores' => [0],
                'sort_order' => 0
            ]
        ];

        /**
         * Insert default and system pages
         */
        foreach ($cmsPages as $data) {
            $this->createPage()->setData($data)->save();
        }
    }

    /**
     * Create page
     *
     * @return Page
     */
    public function createPage()
    {
        return $this->pageFactory->create();
    }
}
