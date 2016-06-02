<?php

/**
  Description of pageMenu :
  Use to display the page menu.

 */
class pageMenu {

    function __construct() {
        
    }

    public function displayPagination($nbPages, $current) {
        $i = 1;
        $first = FALSE;
        $content = "";
        if ($nbPages > 6) {
            while ($i <= $nbPages) {
                if ($i == $current) {
                    $content = $content . "<li role = \"presentation\"  class = \"active\"><a href=\"#\">" . $i . "</a></li>";
                    $first = FALSE;
                } else if ($i > 3 && $i < ($nbPages - 3) && $i != $current) {
                    if (!$first) {
                        $content = $content . "<li role = \"presentation\"><a href=\"#\" id=\"MABITE\"> ... </a></li>";
                        $first = TRUE;
                    }
                } else {
                    $content = $content . "<li role = \"presentation\"><a href=\"#\">" . $i . "</a></li>";
                }
                $i += 1;
            }
        } else {
            while ($i <= $nbPages) {
                if ($i == $current) {
                    $content = $content . "<li role = \"presentation\"  class = \"active\"><a href=\"#\">" . $i . "</a></li>";
                } else {
                    $content = $content . "<li role = \"presentation\"><a href=\"#\">" . $i . "</a></li>";
                }
                $i += 1;
            }
        }
        return $content;
    }

}
