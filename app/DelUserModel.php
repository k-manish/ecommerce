<?php

/**
* File Name :Cart.php
* File Path :Controller/
* Author :Manish Kumar
* Date of creation :13/09/2016
* Comments if any : 
*
*/

namespace App;

use FileMaker;
use App\config\dbconfig;

class DelUserModel extends FileMaker
{
    /**
     *@var object keep FileMaker Object
     */
    protected $fm;
    
    public function __construct()
    {
        $this->fm=new FileMaker(dbname,ipaddr,username,password);
    }
    
    /**
     *@param int $id
     *@return boolean
     */
    public function delUser($id)
    {
        $deleteRecord = $this->fm->newDeleteCommand('USER', $id);
        if(FileMaker::isError($deleteRecord))
        {
            return false;
        }
        $result = $deleteRecord->execute();
        if(FileMaker::isError($result))
        {
            return false;
        }
        return true;
    }
}
