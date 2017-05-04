
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="templates/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="templates/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="templates/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  </head>
  <body>


		</body>
		</html>

<?php

class paginate
{
	private $db;

	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}

	public function dataview($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
                <td><?php echo $row['docID']; ?></td>
                <td><?php echo $row['docTitle']; ?></td>
								<td><?php echo $row['docDesc']; ?></td>
								<td><?php echo $row['docLastChange']; ?></td>
								<td><?php echo $row['docFile']; ?></td>
								<td><?php echo $row['docStatus']?></td>
								<td style="align-items:center; text-align:center; width:25%;">
							  <a href="uploads/<?php echo $row['docFile'] ?>" download="<?php echo $row['docFile']  ?>" class="btn btn-info" style="color:white; background-color:#f05133; margin-bottom:10px; margin-top:10px; border:1pt solid #BF691E; border-radius:10px;"><i class="fa fa-download"></i> Download</a>
								<a href="editDoc.php?edit_id=<?php echo $row['docID']; ?>" class="btn btn-info" style="border-radius:10px; margin-bottom:10px; margin-top:10px;"><i class="fa fa-book"></i> Edit/Delete</a>
								</td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>

            </tr>
            <?php
		}

	}

  public function dataviewtwo($query)
  {
    $stmt = $this->db->prepare($query);
    $stmt->execute();

    if($stmt->rowCount()>0)
    {
      while($row=$stmt->fetch(PDO::FETCH_ASSOC))
      {
        ?>
                <tr>
                <td><?php echo $row['docID']; ?></td>
                <td><?php echo $row['docTitle']; ?></td>
                <td><?php echo $row['docDesc']; ?></td>
                <td><?php echo $row['docLastChange']; ?></td>
                <td><?php echo $row['docFile']; ?></td>
                <td><?php echo $row['userID']?></td>
                <td style="align-items:center; text-align:center; width:30%;">
                  <a href="uploads/<?php echo $row['docFile'] ?>" download="<?php echo $row['docFile']  ?>" class="btn btn-info" style="color:white; margin-top:10px; margin-bottom:10px; background-color:#f05133; border:1pt solid #BF691E; border-radius:10px;"><i class="fa fa-download"></i> Download</a>
                  <a href="doc_revision.php?delete_id=<?php print($row['docID']); ?>" style="color:white color:white; margin-top:10px; margin-bottom:10px; border-radius:10px;" class="btn btn-info"><i class="fa fa-pencil-square-o"></i> Upload Revision</a>
               </td>
                </tr>
                <?php
      }
    }
    else
    {
      ?>
            <tr>

            </tr>
            <?php
    }

  }

  public function dataviewthree($query)
  {
    $stmt = $this->db->prepare($query);
    $stmt->execute();

    if($stmt->rowCount()>0)
    {
      while($row=$stmt->fetch(PDO::FETCH_ASSOC))
      {
        ?>
                <tr>
                <td><?php echo $row['revID']; ?></td>
                <td><?php echo $row['revTitle']; ?></td>
                <td><?php echo $row['revDesc']; ?></td>
                <td><?php echo $row['revFile']; ?></td>
                <td><?php echo $row['docID']; ?></td>
                <td><?php echo $row['revStatus']?></td>
                <td style="align-items:center; text-align:center; width:25%;">
                  <a href="deleteRevs.php?revision_id=<?php print($row['revID']); ?>" class="btn" style="background-color:#BF3944; color:white; margin-top:10px; margin-bottom:10px; border-radius:10px;"><i class="fa fa-fw fa-trash-o"></i> Delete</a>
                </td>
                </tr>
                <?php
      }
    }
    else
    {
      ?>
            <tr>

            </tr>
            <?php
    }

  }

  public function dataviewfour($query)
  {
    $stmt = $this->db->prepare($query);
    $stmt->execute();

    if($stmt->rowCount()>0)
    {
      while($row=$stmt->fetch(PDO::FETCH_ASSOC))
      {
        ?>
                <tr>
                <td><?php echo $row['userID']; ?></td>
                <td><?php echo $row['userName']; ?></td>
                <td><?php echo $row['userFirstName']; ?> <?php echo $row['userSurname']; ?></td>
                <td><?php echo $row['userEmail']; ?></td>
                <td><?php echo $row['userRole']; ?></td>
                <td><?php echo $row['userStatus']?></td>
                <td style="align-items:center; text-align:center; width:30%;">
                <a href="editUser.php?edit_id=<?php echo $row['userID']; ?>" style="border-radius:10px; background-color:#f05133; color:white" id="getUser" class="btn"><i class="fa fa-fw fa-pencil"></i> Edit</a>
                </td>
                </tr>
                <?php
      }
    }
    else
    {
      ?>
            <tr>

            </tr>
            <?php
    }

  }

  public function dataviewfive($query)
  {
    $stmt = $this->db->prepare($query);
    $stmt->execute();

    if($stmt->rowCount()>0)
    {
      while($row=$stmt->fetch(PDO::FETCH_ASSOC))
      {
        ?>
                <tr>
                <td><?php echo $row['msgID']; ?></td>
                <td><?php echo $row['msgTitle']; ?></td>
                <td><?php echo $row['msgEntry']; ?></td>
                <td><?php echo $row['msgFrom']; ?></td>
                <td></td>

                <td><?php echo $row['msgDate']?></td>
                <td style="align-items:center; text-align:center; width:30%;">
                <a href="replymsg.php" style="border-radius:10px; background-color:#f05133; color:white" id="getUser" class="btn"><i class="fa fa-fw fa-pencil"></i> Reply</a>
                </td>
                </tr>
                <?php
      }
    }
    else
    {
      ?>
            <tr>

            </tr>
            <?php
    }

  }


	public function paging($query,$records_per_page)
	{
		$starting_position=0;
		if(isset($_GET["page_no"]))
		{
			$starting_position=($_GET["page_no"]-1)*$records_per_page;
		}
		$query2=$query." limit $starting_position,$records_per_page";
		return $query2;
	}

	public function paginglink($query,$records_per_page)
	{

		$self = $_SERVER['PHP_SELF'];

		$stmt = $this->db->prepare($query);
		$stmt->execute();

		$total_no_of_records = $stmt->rowCount();

		if($total_no_of_records > 0)
		{
			?><div>
				<nav class="pages" aria-label="Page navigation">
					<ul class="pagination" style="border:1pt solid #D3D3D3; border-radius:10px; padding:10px;">
						<?php

			$total_no_of_pages=ceil($total_no_of_records/$records_per_page);
			$current_page=1;
			if(isset($_GET["page_no"]))
			{
				$current_page=$_GET["page_no"];
			}
			if($current_page!=1)
			{
				$previous =$current_page-1;
				echo "<a href='".$self."?page_no=1'>First</a>&nbsp;&nbsp;";
				echo "<a href='".$self."?page_no=".$previous."'>Previous</a>&nbsp;&nbsp;";
			}
			for($i=1;$i<=$total_no_of_pages;$i++)
			{
				if($i==$current_page)
				{
					echo "<strong><a href='".$self."?page_no=".$i."' style='color:black;text-decoration:none'>".$i."</a></strong>&nbsp;&nbsp;";
				}
				else
				{
					echo "<a href='".$self."?page_no=".$i."'>".$i."</a>&nbsp;&nbsp;";
				}
			}
			if($current_page!=$total_no_of_pages)
			{
				$next=$current_page+1;
				echo "<a href='".$self."?page_no=".$next."'>Next</a>&nbsp;&nbsp;";
				echo "<a href='".$self."?page_no=".$total_no_of_pages."'>Last</a>&nbsp;&nbsp;";
			}
			?></ul></nav></div><?php
		}
	}
}
