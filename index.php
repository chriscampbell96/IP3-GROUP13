<?php
session_start();
include_once 'config.php';

require_once 'class.user.php';

$user_home = new USER();


$user_home->redirect('login.php');


?>

        <table align="center" border="1" width="100%" height="100%" id="data">
        <?php
        $query = "SELECT * FROM tbl_documents";
		$records_per_page=3;
		$newquery = $paginate->paging($query,$records_per_page);
		$paginate->dataview($newquery);
		$paginate->paginglink($query,$records_per_page);
		?>
        </table>
</td>
</tr>
</table>
