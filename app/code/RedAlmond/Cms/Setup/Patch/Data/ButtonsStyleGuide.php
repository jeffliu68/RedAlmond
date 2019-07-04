<?php

namespace RedAlmond\Cms\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchVersionInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class ButtonsStyleGuide implements DataPatchInterface, PatchVersionInterface
{
    /**
     * @var \Magento\Cms\Model\PageFactory
     */
    private $pageFactory;

    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * ButtonsStyleGuide constructor.
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param \Magento\Cms\Model\PageFactory $pageFactory
     */
    public function __construct(
        \Magento\Cms\Model\PageFactory $pageFactory
    ) {
        $this->pageFactory = $pageFactory;
    }

    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function apply()
    {
        $cmsPages = [
            [
                'title' => 'Buttons Style Guide',
                'page_layout' => '1column',
                'identifier' => 'buttons-style-guide',
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
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public static function getVersion()
    {
        return '2.0.0';
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }

    /**
     * Create page model instance
     *
     * @return \Magento\Cms\Model\Page
     */
    private function createPage()
    {
        return $this->pageFactory->create();
    }
}
