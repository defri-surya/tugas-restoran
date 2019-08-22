<?php
//
function OtomatisID()
{
$querycount="SELECT count(id) as LastID FROM penjualan";
$result=mysql_query($querycount) or die(mysql_error());
$row=mysql_fetch_array($result, MYSQL_ASSOC);
return $row['LastID'];
}
 
function FormatNoTrans($num) {
        $num=$num+1; switch (strlen($num))
        {    
        case 1 : $NoTrans = "PK0000".$num; break;    
        case 2 : $NoTrans = "PK000".$num; break;    
        case 3 : $NoTrans = "PK00".$num; break;    
        case 4 : $NoTrans = "PK0".$num; break;    
        default: $NoTrans = $num;        
        }          
        return $NoTrans;
}
?>