
    <span class="btn" onclick="changePage(1)">1</span>
    <? if ($Index-3 > 0){ ?>
        <span>...</span>
    <?}?>
    <? for ($i=$Index-2;$i<=$Index+2;$i++){?>
        <?if ($i<=1 || $i>=$count){
            continue;
        }
        if ($i != $Index){
            ?>
            <span class="btn" onclick="changePage(<?=$i?>)"><?=$i?></span>
        <?}else{?>
            <span><?=$i?></span>

        <?}}?>
    <? if ($Index+3 < $count){ ?>
        <span>...</span>
    <?}?>

    <span class="btn" onclick="changePage(<?=$count?>)"><?=$count?></span>

    <br>
    <br>
    <div id="update_ajax">
        <?
        if (isset($_SESSION['email'])){?>
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
                    <li><span onclick="note_remove(<?=$value['note_id']?>,<?=$Index?>)" class="btn">حذف</span></li>
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
    </div>
