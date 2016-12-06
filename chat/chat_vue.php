<table id="table_message">
    <?php
    while($don = $message->fetch()) :
        if(pair($don['ID']))        
            $color = "";        
        else        
            $color = "#EDEDED";        
    ?>
    <tr style="background-color:<?= $color; ?>">
        <td class="info_message" valign="top">
            <span style="font-size:small"><?= "De ".$don['Pseudo'];?></span></br>
            <?= getRelativeTime($don['Date']); ?>   
        </td>
        <td class="message" >
            <div class="message2" >
                <?= $don['Message']; ?>
            </div>    
        </td>     
    </tr> 
    <?php endwhile; ?>
</table>