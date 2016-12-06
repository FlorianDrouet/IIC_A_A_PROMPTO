<table id="chat"> 
    <tr>
        <td id="titre">Conversation avec ....</td>
    </tr>     
    <tr>     
        <td style="height: 150px;">     
            <div id="chat_aff"></div>     
        </td>     
    </tr>     
    <tr>     
        <td id="form" valign="top">     
            <table id="form2">
                <tr>
                    <td>
                        <input id="message" type="text" placeholder="Message" maxlength="20" />
                    </td>                     
                    <td>                     
                        <button id="submit">GO</button>                     
                    </td>
                </tr>     
            </table> 
        </td>     
    </tr> 
</table>
<script>
$(document).ready(function() {
    setInterval(function()
    {
        $("#chat_aff").load("chat/chat_control.php",function(){});   
    },1000);     
 
    $("#submit").click(function()
    { 
        var message = $("#message").val();     
        $("#message").val("");
     
        $.ajax({
            type: 'GET',
            url: 'chat/chat_control.php?name=test&message='+message         
        });     
    });
}); 
</script>