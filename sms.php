public function send_sms($message,$mobile_no,$type_id)
        {
            $qaMobile = Mage::helper('helper/cron')->qaTeamMobile();
            if(Mage::helper('helper/cron')->isStaging() && !empty($qaMobile)){
                $mobile_no = Mage::helper("pring")->validate_mobile_no($qaMobile);
            }
            $ExternalLibPath=Mage::getBaseDir('lib') . DS . 'dbconmgr' . DS .'dbconmgr.php';
            require_once ($ExternalLibPath);

            $db = new dbconmgr();
            $db->connect();
            //print_r($message); //exit;

                $value_first_user_name      =   "tcsconnectxml";//Mage::getStoreConfig('pringconfig/pring_group/pring_username');
                $value_first_password       =   "connect123";//Mage::getStoreConfig('pringconfig/pring_group/pring_secretkey');

                $data   =   array();

                $data['data']   =   '<?xml version="1.0" encoding="ISO-8859-1"?><!DOCTYPE MESSAGE SYSTEM "http://127.0.0.1/psms/dtd/messagev12.dtd"><MESSAGE VER="1.2"><USER USERNAME="'.$value_first_user_name.'" PASSWORD="'.$value_first_password.'"/><SMS  UDH="0" CODING="1" TEXT="'.$message.'" PROPERTY="0" ID="1"><ADDRESS FROM="YAYVO" TO="'.$mobile_no.'" SEQ="1" TAG="some clientside random data"/></SMS></MESSAGE>';

                $data['action'] =   "send";
                $url            =   "http://pace.myvaluefirst.com/psms/servlet/psms.Eservice2";

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_HEADER, 0);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_TIMEOUT, 100000);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                    $output = curl_exec($ch);
                    curl_close($ch);

                    $dbname     = (string)Mage::getConfig()->getNode('global/resources/default_setup/connection/dbname');
                    $tableName  =   $dbname.'.tcs_pring_log';

                    $url                    =   $url;
                    $coreWrite              =   Mage::getSingleton('core/resource')->getConnection('core_write');
                    $pringInsertResponse    =   "INSERT INTO $tableName(type,url,response) VALUES   ('$type_id','$url','$output')";
                    $coreWrite->query($pringInsertResponse);

                    // if user login in magento get data <!-- Zaid Code Start -->
                    if($user = Mage::getSingleton('admin/session')->getUser())
                    {
                        if($user->getId())
                        {
                            $user_name      =       $user->username;
                            $user_id        =       $user->getId();
                            $user_ip        =       Mage::app()->getRequest()->getClientIp();
                        }
                        else
                        {
                            $user_name      =       "";
                            $user_id        =       "";
                            $user_ip        =       "";
                        }
                    }

                    // if user login in Magento get data <!-- Zaid Code End -->


                    //SMS COUNT W.R.T CHARACTER LENETH
                    $smsCount   =   ceil(strlen($message)/160);

                    //SAVE LOG
                    $tableName          =   $dbname.'.tcs_valuefirst_log';
                    $message            =   addslashes($message);
                    $valuFirstLogQuery  =   "INSERT INTO $tableName(mobile_no,message,type_id,total_sms,user_id,user_name,user_ip) VALUES ('$mobile_no','$message','$type_id','$smsCount','$user_id','$user_name','$user_ip')";
                    $db->runquery($valuFirstLogQuery);

        }