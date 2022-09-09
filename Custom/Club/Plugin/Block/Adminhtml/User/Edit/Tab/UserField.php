<?php
namespace Custom\Club\Plugin\Block\Adminhtml\User\Edit\Tab;

use Magento\Framework\App\Config\ScopeConfigInterface;

class UserField
{
    private $storeManager;

    protected $_systemStore;


    public function __construct(\Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Store\Model\System\Store $systemStore)
    {
        $this->storeManager = $storeManager;
        $this->_systemStore = $systemStore;
    }

    public function aroundGetFormHtml(
        \Magento\User\Block\User\Edit\Tab\Main $subject,
        \Closure $proceed)
    {
        $form = $subject->getForm();
        if (is_object($form))
        {
            $fieldset = $form->addFieldset('admin_user_store_id', ['legend' => __('Store')]);
            $fieldset->addField(
                'store_id',
                'select',
                [
                    'name' => 'store_id',
                    'label' => __('Store'),
                    'title' => __('Store'),
                    'values' => $this->_systemStore->getStoreValuesForForm(false, false),
                    'class' => 'select'
//                    'options' => $this->storeManager->getStore()->getName()
                ]
            );
            $subject->setForm($form);
        }

        return $proceed();
    }

}
