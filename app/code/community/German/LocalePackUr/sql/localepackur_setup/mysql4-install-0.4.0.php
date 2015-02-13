<?php
/**
 * @category  German
 * @package   German_LocalePack
 * @authors   MaWoScha <mawoscha@siempro.co, http://www.siempro.co/>
 * @developer MaWoScha <mawoscha@siempro.co, http://www.siempro.co/>  
 * @version   0.4.0.
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
$installer = $this;

$installer->startSetup();

$blockContent = <<<EOD
If you have any questions or suggestions, please contact us either
{{depend store_email}}by email <a href="mailto:{{var store_email}}">{{var store_email}}</a>,{{/depend}}
{{depend store_phone}}by phone at <a href="tel:{{var phone}}">{{var store_phone}}</a>,{{/depend}}
via <a title="My Service-Site on Skype" href="skype:my.shop?chat" target="_blank">Skype-Chat</a> (Username: my.shop)
or in Facebook on our <a title="My Fanpage in Facebook" href="http://www.facebook.com/my.shop" target="_blank">My Fanpage</a>.
EOD;

$storeId = 9;

$staticBlocks = array(
    array(
        'title'         => 'eMail Template Say Hello (ur)',
        'identifier'    => 'email_template_say_hello',
        'content'       => 'عزیز',
        'is_active'     => 0,
        'stores'        => array($storeId)
    ),
    array(
        'title'         => 'eMail Template Contact (ur)',
        'identifier'    => 'email_template_contact',
        'content'       => $blockContent,
        'is_active'     => 0,
        'stores'        => array($storeId)
    ),
    array(
        'title'         => 'eMail Template Say Bye (ur)',
        'identifier'    => 'email_template_say_bye',
        'content'       => 'آپ کی خریداری کے لئے آپ کا شکریہ!',
        'is_active'     => 0,
        'stores'        => array($storeId)
    )
);

/**
 * Insert default blocks
 */
foreach ($staticBlocks as $data) {
    try {
        Mage::getModel('cms/block')->setData($data)->save();
    } catch (Exception $e) {
        # To prevent exception "A block identifier with the same properties already exists
        # in the selected store." in "app:code:core:Mage:Cms:Model:Resource:Block.php"
#        throw new Exception("Oops, mi error in UR German LocalePack");
    }
}

$installer->endSetup();

?>
