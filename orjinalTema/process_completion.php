<?php

include_once "sessions.php";
$getLessonId=$_GET['lessonId'];


if($userId!="" || $getLessonId!="")
{

			
			
			ob_start(); 
			include_once "connectionDB.php";
			
			$query="select count(*) as OK from lessonProgress where userId=$userId and lessonId=$getLessonId";
			$runQuery=mysql_query($query);
			while($fetchQuery=mysql_fetch_array($runQuery))
				$lessonProgress=$fetchQuery["OK"];
			
			if($lessonProgress==0)
			{
				$query="insert into lessonProgress (userId,lessonId,lessonLegendId) values ('$userId','$getLessonId',2)";
				$runQuery=mysql_query($query);
				
				$query="select courseId from lessons where id=$getLessonId";
				$runQuery=mysql_query($query);
				while($fetchQuery=mysql_fetch_array($runQuery))
					echo $courseId=$fetchQuery["courseId"];

				header("Location:course.php?courseId=$courseId");

			}
			else
				header("Location:lesson.php?lessonId=$getLessonId");
			
			
			ob_end_flush();	
			
			
		
}
else //userId // CourseId
{
	
	header('Location:login.php');
	
}

?>


