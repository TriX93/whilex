<?php
/*
 * While($x) 
 *   Copyright (C) 2013  While($x) Team
 * 
 *   WebSite: http://www.whilex.it/
 *   GitHub: https://github.com/whilex
 *
 *   This program is free software: you can redistribute it and/or modify
 *   it under the terms of the GNU Affero General Public License as published by
 *   the Free Software Foundation, either version 3 of the License, or
 *   (at your option) any later version.
 *
 *   This program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU Affero General Public License for more details.
 *
 *   You should have received a copy of the GNU Affero General Public License
 *   along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
if(!isset($_SESSION)) session_start();

include "security.core.php";

class poll extends phpSecurityClass{
 
	public function send($title,$text,$qtype)
	{
		$mysql = mysql_start();
		
		if(!$this->num($qtype)){
			$_SESSION['login'] = 0;
			return 0;
		}
		
		$text = str_replace("&","&amp;",$text);
		$text = str_replace("<","&lt;",$text);
		$text = str_replace(">","&gt;",$text);
		$text = str_replace("\"","&quot;",$text);
		$text = str_replace("'","&apos;",$text);
		
		$title = str_replace("&","&amp;",$title);
		$title = str_replace("<","&lt;",$title);
		$title = str_replace(">","&gt;",$title);
		$title = str_replace("\"","&quot;",$title);
		$title = str_replace("'","&apos;",$title);
		
		
		mysql_query("INSERT INTO 
						poll_post (`title`,`content`,`id_user`,`type`,`qtype`)
						VALUES ('$title','$text','".$_SESSION['userid']."','Q','".$qtype."')
						")
		or die(mysql_error()); 

		mysql_kill($mysql);
		
		return 1;
	}
	
	public function subsend($text,$id)
	{
		$mysql = mysql_start();
		
		if(!$this->num($id)){
			$_SESSION['login'] = 0;
			return 0;
		}
		
		$text = str_replace("&","&amp;",$text);
		$text = str_replace("<","&lt;",$text);
		$text = str_replace(">","&gt;",$text);
		$text = str_replace("\"","&quot;",$text);
		$text = str_replace("'","&apos;",$text);
		
		
		mysql_query("INSERT INTO 
						poll_post (`content`,`id_user`,`parent_id`, `type`)
						VALUES ('$text','".$_SESSION['userid']."','$id', 'A')
						")
		or die(mysql_error()); 

		mysql_kill($mysql);
		
		return 1;
	}
	
	public function quest()
	{
		$mysql = Database::init();
                $array = $mysql->select('poll_post')->where('type', 'Q')->orderby('id', 'DESC')->run();
		foreach($array as $row){ 
                    $ansCount = count($mysql->select('poll_post')->where('type', 'A')->andwhere('parent_id', $row['id'])->run());
                    ?>
		     <div>
                          <h2><a href=\index.php?page=poll&view=<?php echo $row['id']; ?>> <?php echo $row['title']; ?></a></h2>
                          <div class="poolInfoBar">
                              <span class="ansCounter"><?php echo $ansCount[0]; ?> <span class="icon-comments"></span>  </span>  
                          </div>
                          <p><?php echo $row['content']; ?> </p>
                          
                     </div>
		<?php }
		
		return 1;
	}
	
	public function idquest($id)
	{
		$mysql = Database::init();
		if(!$this->num($id)){
			$_SESSION['login'] = 0;
			return 0;
		}
		
		$sql = "SELECT * FROM poll_post,users WHERE poll_post.id_user = users.id AND poll_post.id = '".$id."' ORDER BY users.id DESC";
		
		foreach($array as $row){
			echo "<h2><a href=\"index.php?page=poll&view=".$id."\">".$row['title']."?</a></h2>@".$row['nick'].": ".$row['content']."<br /><br /><hr>";
		}
		
		$sql = "SELECT * FROM poll_post,users WHERE poll_post.id_user = users.id AND poll_post.parent_id = '".$id."' ORDER BY poll_post.id ASC";
		$array = mysql_query($sql) or die(mysql_error());
		while($row = mysql_fetch_array($array)){
			echo "<br />@".$row['nick'].": ".$row['content']."<br /><br /><hr>";
		}

		mysql_kill($mysql);
		
		return 1;
	}
}
?>
