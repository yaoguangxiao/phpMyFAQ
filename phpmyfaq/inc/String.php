<?php
/**
 * The string wrapper class. 
 *
 * @package    phpMyFAQ
 * @subpackage PMF_String
 * @license    MPL
 * @author     Anatoliy Belsky <ab@php.net>
 * @since      2009-04-06
 * @version    SVN: $Id$
 * @copyright  2009 phpMyFAQ Team
 *
 * The contents of this file are subject to the Mozilla Public License
 * Version 1.1 (the "License"); you may not use this file except in
 * compliance with the License. You may obtain a copy of the License at
 * http://www.mozilla.org/MPL/
 *
 * Software distributed under the License is distributed on an "AS IS"
 * basis, WITHOUT WARRANTY OF ANY KIND, either express or implied. See the
 * License for the specific language governing rights and limitations
 * under the License.
 */

/**
 * PMF_String
 * 
 * The class uses mbstring extension if available. It's strongly recommended
 * to use and extend this class instead of using direct string functions. Doing so
 * you garantee your code is upwards compatible with UTF-8 improvements.
 *
 * @package    phpMyFAQ
 * @subpackage PMF_String
 * @license    MPL
 * @author     Anatoliy Belsky <ab@php.net>
 * @since      2009-04-06
 * @version    SVN: $Id$
 * @copyright  2009 phpMyFAQ Team
 */
class PMF_String
{
    /**
     * Instance
     * 
     * @var PMF_String
     */
    private static $instance;
    
    /**
     * Constructor
     *
     * @return void
     */
    private final function __construct()
    {
    }
    
    /** 
     * Initalize myself
     * 
     * @return void
     */
    public static function init($encoding = null)
    {
        if (!self::$instance) {
            if (extension_loaded('mbstring')) {
                self::$instance = PMF_String_Mbstring::getInstance($encoding);
            } else {
                self::$instance = PMF_String_Basic::getInstance($encoding);
            }
        }
    }
    
    /**
     * Get current encoding
     * 
     * @return string
     */
    public static function getEncoding()
    {
        return self::$instance->getEncoding();
    }    
    
    /**
     * Get string character count
     * 
     * @param string $str String
     * 
     * @return int
     */
    public static function strlen($str)
    {
        return self::$instance->strlen($str);
    }
    

    /**
     * Get a part of string
     * 
     * @param string  $str    String
     * @param integer $start  Start
     * @param integer $length Length
     * 
     * @return string
     */
    public static function substr($str, $start, $length = null)
    {
        return self::$instance->substr($str, $start, $length);
    }    
    
    /**
     * Get position of the first occurence of a string
     * 
     * @param string $haystack Haystack
     * @param string $needle   Needle
     * @param string $offset   Offset
     * 
     * @return int
     */
    public static function strpos($haystack, $needle, $offset = null)
    {
        return self::$instance->strpos($haystack, $needle, $offset);
    }    
    
    /**
     * Make a string lower case
     * 
     * @param string $str String
     * 
     * @return string
     */
    public static function strtolower($str)
    {
        return self::$instance->strtolower($str);
    }    
    
    /**
     * Make a string upper case
     * 
     * @param string $str String
     * 
     * @return string
     */
    public static function strtoupper($str)
    {
        return self::$instance->strtoupper($str);
    }
        
    /**
     * Get occurence of a string within another
     * 
     * @param string  $haystack Haystack
     * @param string  $needle   Needle
     * @param boolean $part     Part
     * 
     * @return string|false
     */
    public static function strstr($haystack, $needle, $part = false)
    {
        return self::$instance->strstr($haystack, $needle, $part);
    }
        
    /**
     * Set current encoding
     * 
     * @return string
     */
    public function setEncoding($encoding)
    {
        self::$instance->setEncoding($encoding);
    }
}
