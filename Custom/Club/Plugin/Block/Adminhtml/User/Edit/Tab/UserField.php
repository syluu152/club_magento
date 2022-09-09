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
            $fieldset = $form->addFieldset('admin_user_club', ['legend' => __('User Club Field')]);
            $fieldset->addField(
                'user_club',
                'select',
                [
                    'name' => 'user_club',
                    'label' => __('User Club'),
                    'id' => 'user_club',
                    'title' => __('User Club'),
//                    'values' => $this->_systemStore->getStoreValuesForForm(false, true)
                    'options' => $this->storeManager->getStore()->getName()
                ]
            );

            $subject->setForm($form);
        }

        return $proceed();
    }

}
