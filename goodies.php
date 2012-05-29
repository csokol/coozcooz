<?php
    function htmlGrade($grade) {
        $html = "<div class='grade'>";
	    for ($i = 0; $i < $grade; $i++) {
	        $html .= "<div class='starFull'></div>";
	    }
	    for ($i = 5; $i > $grade; $i--) {
	        $html .= "<div class='starEmpty'></div>";
	    }
        $html .= "</div>";
        return $html;
    }
?>
