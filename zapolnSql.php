<style>
    .lalka{
        width:100px;
    }

</style>
<?php 
    include ("classes.php");
    $main_page = new Page;
    $cont_v2='<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
        function AjaxFormRequest(result_id,form,url) {
            jQuery.ajax({
                url:     url,
                type:     "POST",
                dataType: "html",
                data: jQuery("#"+form).serialize(),
                success: function(response) {
                    document.getElementById(result_id).innerHTML = response;
                },
                error: function(response) {
                    document.getElementById(result_id).innerHTML = "Возникла ошибка при отправке формы. Попробуйте еще раз";
                }
        });
        $(\':input\',\'#formMain\')
        .not(\':button, :submit, :reset, :hidden\')
        .val(\'\')
        .removeAttr(\'checked\')
        .removeAttr(\'selected\');
        }

</script>

    <form class="form" action="zapisSQL.php" method="post" id="form">
        <table border=0 align=center>
            <tr><td colspan=2>
                <select id="table" name="table">
                    <option value= "ammo">ammo</option>
                    <option value= "ammo_reviews">ammo_reviews</option>
                    <option value= "customers">customers</option>
                    <option value= "order_items">order_items</option>
                    <option value= "orders">orders</option>
                </select>
            </td></tr>
            <tr>
            <td>
                <select id="column1" name="column1" class="lalka">
                    <option value=\'nazv\'> nazv </option>
                </select>
            </td><td>
                <input id="value1"  type="text" name="value1" size=3 maxlength=25 class="lalka">
            </td>
        </tr>
        <tr>
            <td>
                <select id="column2" name="column2" class="lalka">
                    <option value=\'caliber\'> caliber </option>
                </select>
            </td><td>
                <input id="value2" type="text" name="value2" size=3 maxlength=25 class="lalka">
            </td>
        </tr>
        <tr>
            <td>
                <select id="column3" name="column3" class="lalka">
                    <option value=\'typ\'> typ </option>
                </select>
            </td><td>
                <input id="value3" type="text" name="value3" size=3 maxlength=25 class="lalka">
            </td>
        </tr>
        <tr>
            <td>
                <select id="column4" name="column4" class="lalka">
                    <option value=\'mass\'> mass </option>
                </select>
            </td><td>
                <input  id="value4" type="text" name="value4" size=3 maxlength=25 class="lalka">
            </td>
        </tr>
        <tr>
            <td>
                <select id="column5" name="column5" class="lalka">
                    <option value=\'typeammo\'> typeammo </option>
                </select>
            </td><td>
                <input id="value5" type="text" name="value5" size=3 maxlength=25 class="lalka">
            </td>
        </tr>
        <tr>
            <td>
                <select id="column6" name="column6" class="lalka">
                    <option value=\'maker\'> maker </option>
                </select>
            </td><td>
                <input id="value6" type="text" name="value6" size=3 maxlength=25 class="lalka">
            </td>
        </tr>
        <tr>
            <td>
                <select id="column7" name="column7" class="lalka">
                    <option value=\'price\'> price </option>
                </select>
            </td><td>
                <input id="value7" type="text" name="value7" size=3 maxlength=25 class="lalka">
            </td>
        </tr>
        <tr>
            <td>
                <select id="column8" name="column8" class="lalka">
                    <option value=\'type\'> type </option>
                </select>
            </td><td>
                <input id="value8" type="text" name="value8" size=3 maxlength=25 class="lalka">
            </td>
        </tr>
            <tr><td colspan=2><input type=button value="SQL" name="submit" class="button" id="button" onclick="AjaxFormRequest(\'messegeResult\', \'form\', \'zapisSQL.php\')"\></td></tr>
    
    
    
        </table>
    </form> <div id="messegeResult"></div>';
    

    $main_page->SetContent($cont_v2);
    $main_page->Display();
   
    
?>





        <script type="text/javascript">$(document).ready(function () {
        $("#table").change(function () {
            var val = $(this).val();
            if (val == "ammo") {
                $("#column1").html("<option value='nazv'> nazv </option>");
                $("#column2").html("<option value='caliber'> caliber </option>");
                $("#column3").html("<option value='typ'> typ </option>");
                $("#column4").html("<option value='mass'> mass </option>");
                $("#column5").html("<option value='typeammo'> typeammo </option>");
                $("#column6").html("<option value='maker'> maker </option>");
                $("#column7").html("<option value='price'> price </option>");
                $("#column8").html("<option value='type'> type </option>");
            } else if (val == "ammo_reviews") {
                $("#column1").html("<option value='ammoid'>ammoid</option>");
                $("#column2").html("<option value='review'>review</option>");
                $("#column3").html("<option value='NULL'> NULL </option>");
                $("#column4").html("<option value='NULL'> NULL </option>");
                $("#column5").html("<option value='NULL'> NULL </option>");
                $("#column6").html("<option value='NULL'> NULL </option>");
                $("#column7").html("<option value='NULL'> NULL </option>");
                $("#column8").html("<option value='NULL'> NULL </option>");
            } else if (val == "customers") {
                $("#column1").html("<option value='name'>name</option>");
                $("#column2").html("<option value='address'>address</option>");
                $("#column3").html("<option value='city'>city</option>");
                $("#column4").html("<option value='NULL'> NULL </option>");
                $("#column5").html("<option value='NULL'> NULL </option>");
                $("#column6").html("<option value='NULL'> NULL </option>");
                $("#column7").html("<option value='NULL'> NULL </option>");
                $("#column8").html("<option value='NULL'> NULL </option>");
            } else if (val == "order_items") {
                $("#column1").html("<option value='orderid'>orderid</option>");
                $("#column2").html("<option value='ammoid'>ammoid</option>");
                $("#column3").html("<option value='quantity'> quantity </option>");
                $("#column4").html("<option value='NULL'> NULL </option>");
                $("#column5").html("<option value='NULL'> NULL </option>");
                $("#column6").html("<option value='NULL'> NULL </option>");
                $("#column7").html("<option value='NULL'> NULL </option>");
                $("#column8").html("<option value='NULL'> NULL </option>");
            }else if (val == "orders") {
                $("#column1").html("<option value='customerid'>customerid</option>");
                $("#column2").html("<option value='amount'>amount</option>");
                $("#column3").html("<option value='date'>date</option>");
                $("#column4").html("<option value='NULL'> NULL </option>");
                $("#column5").html("<option value='NULL'> NULL </option>");
                $("#column6").html("<option value='NULL'> NULL </option>");
                $("#column7").html("<option value='NULL'> NULL </option>");
                $("#column8").html("<option value='NULL'> NULL </option>");
        }});
    });</script>
    <script>
        $('form').on('submit', function() {
    var value = $(this).find('input[name="value1"]').val();
    $.post(
        'zapisSQL.php',
        {'value': value},
        function(data) {
            $('.message').html(data);
        }
    );
    return false;
    });
    </script>
    
    </table>

</form>

