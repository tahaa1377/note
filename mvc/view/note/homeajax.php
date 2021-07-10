<?if (isset($_SESSION['email'])){?>
        <ul class="todo-entry">
            <li>btn</li>
            <li>btn</li>
            <li>title</li>
            <li>desc</li>
            <li>time</li>
        </ul>
        <? foreach ($record as  $value){
            if ($value['isDone']==0){
                $val="pending";
            }else{
                $val="done";
            }
            ?>
            <ul class="todo-entry <?=$val?>" >
                <li><span onclick="note_toggle(<?=$value['note_id']?>,<?=$Index?>)"  class="btn">انجام</span></li>
                <li><span onclick="note_remove(<?=$value['note_id']?>,<?=$Index?>)"  class="btn">حذف</span></li>
                <li><?=$value['note_title']?></li>
                <li><?=$value['note_desc']?></li>
                <li><?=$value['note_time']?></li>
            </ul>
        <?}}else{?>
        <div> ابتدا ثبت نام کنید </div>
    <?}?>
    <? if (isset($_SESSION['email'])){?>
        <a href="/note/add_task" class="btn" style="float: right; margin-right: 80px">add</a>
    <?}?>
