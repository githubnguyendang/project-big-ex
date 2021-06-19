<?php

function showCategories($categories, $parent_id = 0, $char = '')
{
    foreach ($categories as $val) {
        if ($val->parent_id == $parent_id) {
            echo '<option value="' . $val->cate_id . '">' . $char . $val->cate_name . '</option>';
            showCategories($categories, $val->cate_id, $char . "--");
        }
    }
}

?>
