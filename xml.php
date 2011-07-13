<?php

	class Text
	{	
		//this class is responsible for parsing an XML file for text, and outputing that
		//text onto the website.
	
	
		//make the member properties private:	
		private $html = "";
	
		//public methods:
	
		public function addParagraph($file_name)
		{
			$xmlDoc = new DOMDocument();
			$xmlDoc -> load($file_name);
		
			$element = $xmlDoc->documentElement;
		
			foreach ($element->childNodes as $node)
			{
				if ($node->nodeName == "paragraph")
				{
					foreach ($node->childNodes as $paragraph)
					{
						if ($paragraph->nodeName == "type")
						{	
								if ($paragraph->nodeValue == "primary")
								{	
									$this->html = $this->html . "<p class = \"primary\">";
								}
								else if ($paragraph->nodeValue == "secondary")
								{
									$this->html = $this->html . "<p class = \"secondary\">";
								}
						}
						else if ($paragraph->nodeName == "body")
						{
							$this->html = $this->html . $paragraph->firstChild->nodeValue."<br />";
						}
					}
					$this->html = $this->html . "</p>";
				}
			}
		}
		
		public function printHTML()
		{
			print $this->html;
		}
		
	};
	
	class Pictures
	{
		private $html = "";
	
		public function addPicture($file_name)
		{
			$xmlDoc = new DOMDocument();
			$xmlDoc -> load($file_name);
		
			$element = $xmlDoc -> documentElement;
		
			$html = "<img";
		
			foreach ($element->childNodes as $node)
			{
				if ($node->nodeName == "location")
				{
					$src = " src = \""; //add space + beginning quotes
					$src = $src . $node->firstChild->nodeValue;
					$src = $src . "\""; //add ending quotes
					$html = $html . $src; //add to html
				}
				else if ($node->nodeName == "id")
				{
					$id = " id = \""; //add space + beginning quotes
					$id = $id . $node->firstChild->nodeValue;
					$id = $id . "\""; //add ending quotes
					$html = $html . $id; //add to html
				}
				else if ($node->nodeName == "map")
				{
					$map_html = "<map";
					$area_count == 0;
					foreach ($node->childNodes as $map_node)
					{
						if ($map_node -> nodeName == "name")
						{
							$map_name = " name = \"";
							$map_name = $map_name . $map_node->firstChild->nodeValue;
							$map_name = $map_name . "\"";
							$map_html = $map_html . $map_name;
							$html = $html . " usemap=\"#" . $map_node->firstChild->nodeValue . "\"";
						}
						else if ($map_node -> nodeName == "id")
						{
							$map_id = " id = \"";
							$map_id = $map_id . $map_node->firstChild->nodeValue;
							$map_id = $map_id . "\"";
							$map_html = $map_html . $map_id;
						}
						else if ($map_node -> nodeName == "area")
						{	
							if ($area_count == 0)
							{
								$this->html= $this->html . $map_html . ">";
								$area_count++;
							}
						
							$area_html = "<area";
						
							foreach ($map_node -> childNodes as $area_node)
							{
								if ($area_node -> nodeName == "shape")
								{
									$area_shape = " shape=\"";
									$area_shape = $area_shape . $area_node -> firstChild -> nodeValue;
									$area_shape = $area_shape . "\"";
									$area_html = $area_html . $area_shape;
								}
								else if ($area_node -> nodeName == "coords")
								{
									$area_coords = " coords=\"";
									$area_coords = $area_coords . $area_node -> firstChild -> nodeValue;
									$area_coords = $area_coords . "\"";
									$area_html = $area_html . $area_coords;
								}
								else if ($area_node -> nodeName == "link")
								{
									$area_href = " href=\"";
									$area_href = $area_href . $area_node -> firstChild -> nodeValue;
									$area_href = $area_href . "\"";
									$area_html = $area_html . $area_href;
								}
								else if ($area_node -> nodename == "alt")
								{
									$area_alt = " alt=\"";
									$area_alt = $area_alt . $area_node -> firstChild -> nodeValue;
									$area_alt = $area_alt . "\"";
									$area_html = $area_html . $area_alt;
								}
							}
							$this->html= $this->html . $area_html . " />";
						}
					}
					$this->html= $this->html . "</map>";
				}
			}
			$this->html= $this->html . $html . "/>";
		}
		
		public function printHTML()
		{
			print $this->html;
		}
	};
?>