<?php
// Call MySQLConverterTool_SelectDBTest::main() if this source file is executed directly.
if (!defined("PHPUnit_MAIN_METHOD")) {
    define("PHPUnit_MAIN_METHOD", "MySQLConverterTool_SelectDBTest::main");
}

require_once "PHPUnit/Framework/TestCase.php";
require_once "PHPUnit/Framework/TestSuite.php";
require_once "MySQLConverterTool/Converter.php";
require_once "MySQLConverterTool/UnitTests/Converter/ConverterTest.php";

/**
* UnitTests: real life tests, PHPUnit test of Function/SelectDB
*
* @category   Real-life UnitTests
* @package    MySQLConverterTool
* @author     Andrey Hristov <andrey@php.net>, Ulf Wendel <ulf.wendel@phpdoc.de>, Saif Lacrimosa <cool2309@gmail.com>
* @copyright  1997-2006 The PHP Group
* @license    http://www.php.net/license/3_0.txt  PHP License 3.0
* @version    CVS: $Id:$, Release: @package_version@
* @link       http://www.mysql.com
* @since      Class available since Release 1.0
*/
class MySQLConverterTool_UnitTests_Converter_SelectDBTest extends MySQLConverterTool_UnitTests_Converter_ConverterTest {      
    
    public function testConvertFile() {
        
        
        $files = array( 'select_db001.php'
                        );
                        
        foreach ($files as $k => $file) {
            $file = dirname(__FILE__) . '/TestCode/' . $file;
            $test_spec = $this->parseTestFile($file);
            if ($err = $this->validateTestSpec($test_spec)) {
                $this->fail(sprintf("[%s]\n%s\n", $file, $err));
                return;
            }
            if ($err = $this->runTestSpec($test_spec)) {
                $this->fail(sprintf("[%s]\n%s\n", $file, $err));
                return;
            };
        }
        
    } 
    
    
}

// Call MySQLConverterTool_SelectDBTest::main() if this source file is executed directly.
if (PHPUnit_MAIN_METHOD == "MySQLConverterTool_SelectDBTest::main") {
    MySQLConverterTool_SelectDBTest::main();
}
?>