<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* This will give an error. Note the output
 * above, which is before the header() call */
header('Location: http://'.getHostByName(getHostName()).'/newsTechnologyLtd/public/');
exit;
?>