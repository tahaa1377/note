<div id="top-wrapper" style="background-color: #ff0009">
    <? if (isset($_SESSION['email'])){ ?>
        <span id="wellcome"><?=$_SESSION['email']." خوش آمدید"?></span>
        <a href="/note/logout" class="btn" style="text-decoration-line: unset ;float: left;margin: 5px;"> خروج</a>
    <?}else{?>
        <span id="wellcome"><?="مهمان"." خوش آمدید"?></span>
        <a href="/note/login" class="btn" style="text-decoration-line: unset ;float: right;margin: 5px">ورود</a>
    <?}?>
</div>
<br>
<br>
<br>
<br>
<div id="chage_page_ajax">

</div>
<script>



    function note_toggle(id,page) {

        $.ajax('/note/toggle/'+id+'/'+page, {

            dataType: 'json'
            , type: 'post'
            , success: function (data) {
                $('#update_ajax').html(data);
            }
        });
    }

    function note_remove(id,page) {

        $.ajax('/note/remove_task/'+id+'/'+page, {

            dataType: 'json'
            , type: 'post'
            , success: function (data) {
                $('#update_ajax').html(data);
            }
        });
    }

    function changePage(page) {

        $.ajax('/note/notes/change_page/'+page, {

            dataType: 'json'
            , type: 'post',
                success: function (data) {
                $('#chage_page_ajax').html(data);
            }
        }
        );

    }

    $(function () {
       changePage(1);
    });
</script>