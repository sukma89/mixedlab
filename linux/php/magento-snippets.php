///1. Check whether an Module exists and is active
$modules = (array)Mage::getConfig()->getNode('modules')->children();
		
if (isset($modules['Mage_AdminNotification']) &&
  $modules['Mage_AdminNotification']->active == 'true') {

///2. Log messages to Admin Nofification
  $message = Mage::getModel ( 'adminnotification/inbox' );

  $title = "Hello, You have new message";
  $desc = "This is a new Test Message";
  $url = "http://www.google.com";

  $message->setSeverity ( Mage_AdminNotification_Model_Inbox::SEVERITY_NOTICE );

  $message->setTitle ( $title);
  $message->setDescription ( $desc);
  $message->setUrl ( $url );
  $message->save ();
}  

