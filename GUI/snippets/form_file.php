<?PHP
/**
* GUI Template: convert file template
*
* @category   GUI
* @package    MySQLConverterTool
* @author     Andrey Hristov <andrey@php.net>, Ulf Wendel <ulf.wendel@phpdoc.de>, Saif Lacrimosa <cool2309@gmail.com>
* @copyright  1997-2006 The PHP Group
* @license    http://www.php.net/license/3_0.txt  PHP License 3.0
* @version    CVS: $Id:$, Release: @package_version@
* @link       http://www.mysql.com
* @since      Available since Release 1.0
*/
?>
<p class="lead text-primary">
    Convert a file
</p>
<p class="text-primary">
    You can choose if the result of the conversion gets displayed on the 
    screen or if you want to modify the source file. By default a
    backup of the source file will be created before 
    it gets modified.
</p><hr>
<?PHP
if (!empty($snippet_errors)) {
?>
<div class="maintextbox">
    <h2>Errors</h2>    
    <ul>
    <?PHP
    foreach ($snippet_errors as $field => $msg)
        printf('<li class="error">%s</li>', htmlspecialchars($msg));
    ?>
    </ul>    
</div>            
<?php
}
?>  
<div class="maintextbox">    
<form action="<?php print $_SERVER['PHP_SELF']; ?>" name="file" id="file" method="post">
    <script language="JavaScript">
        
        function activate_backup() {                     
                        
            if (document.file.update[0].checked == true)
                document.file.backup.checked = false;
                
            if (document.file.update[1].checked == true)
                document.file.backup.checked = true;            
            
        }
        
        function validate_form() {
            
            if (document.file.file.value == "") {
                document.file.file.focus();
                alert("Please specify a file!");                
                return false;
            }
            
            return true;
        }
        
    </script>
        <p class="lead">Convert a file</p>
        <br />
        <table class="table table-striped table-bordered table-hover">        
        <tr>
            <td class="<?php print isset($snippet_errors['file']) ? 'formlabelerror' : 'formlabel'; ?>">File</td>
            <td class="formelement"><input type="text" class="form-control" name="file" size="60" value="<?php print (isset($_POST['file'])) ? $_POST['file'] : ''; ?>" /></td>
        </tr>                
        <tr>
            <td class="<?php print (isset($snippet_errors['update'])) ? 'formlabelerror' : 'formlabel'; ?>">Update&nbsp;file?</td>
            <td class="formelement">
                <div class="btn-group" data-toggle="buttons">
                  <label class="btn btn-primary">
                        <input type="radio" name="update" id="update" value="no" onClick="activate_backup()" <?php print (isset($_POST['update']) && $_POST['update'] != 'no') ? '' : 'checked'; ?>> No<br />
                    </label>
                    <label class="btn btn-primary">
                        <input type="radio" name="update" id="update" value="yes" onClick="activate_backup()" <?php print (isset($_POST['update']) && $_POST['update'] == 'yes') ? 'checked' : ''; ?>> Yes
                    </label>
                </div>
            </td>
        <tr>
        <tr>
            <td class="<?php print (isset($snippet_errors['backup'])) ? 'formlabelerror' : 'formlabel'; ?>">Backup file?</td>
            <td class="formelement">
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-success">
                        <input type="checkbox" name="backup" id="backup" <?php print (isset($_POST['backup'])) ? 'checked' : ''; ?>> Yes, backup the originial file to &lt;name.org&gt;              
                    </label>
                </div>
            </td>
        <tr>
        <tr>
            <td colspan="2" class="formsubmit">
                <input type="submit" name="start" class="btn btn-info" value="Start the conversion" onclick="return validate_form()">&nbsp;&nbsp;
                <input type="submit" name="cancel" class="btn btn-info" value="Cancel">
            </td>
        </tr>        
        </table>
</form>
</div>