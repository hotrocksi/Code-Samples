<?php


class jsonFeedRead
{
 
	public function jsonFeedProc($jsonFeed) {
  
		$jsonURL = file_get_contents($jsonFeed);
		$data = json_decode($jsonURL,true);
		return $data;
		
	}
	
	public function getFixtures($fixtures) {
		
		$output = "<div class=\"fixtures_wrap\">";
		
		foreach($fixtures as $key => $fixture)
		{
			$output .= "<div class=\"fix_details\">";
			
			//Fixture ID
			$output .= "ID: ".$fixture['FixId'];
			
			//Fixture Date (converted to UK format)
			$date = strtotime($fixture['FixDate']);
			$fix_date = date('d-m-Y', $date);
			$output .= ", Date: ".$fix_date;
			$output .= "</div>";
			
			$teams = $fixture['Teams'];
			foreach($teams as $key => $team) {
				
				$scoreline = "<div class=\"result\">";
				
				//Team A and Score
				$scoreline .= $team['0']['TmnmDisplay']." ".$fixture['FixFullPtsA'];
				//Separator
				$scoreline .= " - ";
				//Score and Team B
				$scoreline .= $fixture['FixFullPtsB']." ".$team['1']['TmnmDisplay'];
				
				$scoreline .= "</div>";
				$output .= $scoreline;
			}
			
			$output .= "<br/>";

		}
		$output .= "</div>";
		return $output;
	}
	
}