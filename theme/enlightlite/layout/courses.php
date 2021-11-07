<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * A double column layout.
 * @package    theme_enlightlite
 * @copyright  2015 onwards LMSACE Dev Team (http://www.lmsace.com)
 * @author    LMSACE Dev Team
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();


require_once($CFG->dirroot."/theme/enlightlite/classes/header_block.php");
$headervalues = header_contents();
require_once($CFG->dirroot."/theme/enlightlite/classes/main_block.php");
$mainblock = main_block();
require_once($CFG->dirroot."/theme/enlightlite/classes/footer_block.php");
$footer = footer_template();
$check = array_merge($mainblock, $headervalues);
$fulltemplate = array_merge($check, $footer);
$OUTPUT->doctype();
echo $OUTPUT->render_from_template('theme_enlightlite/columns2', $fulltemplate);
$noimgurl = $OUTPUT->image_url('no-image', 'theme');
$favicon = $OUTPUT->image_url('favicon2', 'theme');
?>
<script>
    $(document).ready(function(){
        $(".courses").addClass("row");
        let conts="", i=0,
        img, title, url, noimg ='<?= $noimgurl ?>';
        

        $(".courses").find('.coursebox').each(function(){
            url = $(this).find(".coursename> a").attr("href");
            
            if($(this).find(".content").hasClass("no-image")){
                img = "<img src ='"+noimg+"' width='249' height='200'>";
            }else{
                img = $(this).find(".courseimage").attr('width','249').attr('height','200').html();
            }
            title = $(this).find(".coursename").html();
            conts += `<div class="col-sm-6 col-md-2 my-4" >
            <div class="available-content shadow-smx course-containerx">
            <div class="available-img imagex">
                ${img}
            </div>
            <div class="abt-course-holder px-2 py-4" style="height:80px;">
                <h6 class="title-text text-dark text-left mb-0">${title}</h6>
            </div>
            <div class='middlex'>                
                <h6 class = 'title-text text-white text-center mb-0 todropx'>${title}</h6>
                <a href='${url}' class='textx'>Open</a>
            </div>
            </div>            
            </div>`; 
            
        });
       $(".courses").html(conts)
        $(".search-block").css("background", "none")
    });
    $("link[rel*='icon']").attr("href", "<?= $favicon;?>");        
</script>
