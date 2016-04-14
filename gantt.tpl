{literal}
    <script type="text/javascript">

        function isclick(param)
        {

            var myWindow = window.open("", "MsgWindow", "width=500,height=220");
            myWindow.document.writeln("<p>Activity Information</p>");
            myWindow.document.writeln("<p>Start date: "+param.start_date+"</p>");
            myWindow.document.writeln("<p>End date: "+param.end_date+"</p>");
            myWindow.document.writeln("<p>Description: "+param.description+"</p>");
            myWindow.document.writeln("<p>Url:<a href = 'http://"+param.url+"'>"+param.url+"</a></p>");
            myWindow.document.writeln("<p>Json: "+param.json_dati+"</p>");

        }

    </script>

    <style>
        li.a {
            list-style-type: none;
        }
        td.b {
            background-color: darkorange;
        }
    </style>

{/literal}



<br />
<!--Table-->
<table border="1">
    <tr>
        <td width="100px" align="center"><b>Gantt</b></td>
        {foreach $days as $d}
            <td width="100px" align="center">{$d}</td>
        {/foreach}
    </tr>


    {foreach $resources as $r}
        <tr>
            <td align = "center">{$r.label}</td>
            {foreach $days as $d}
                <td
                        {foreach $activities as $a}
                            {if $a.id_resource == $r.id}

                                {if ($d >= $a.start_date) && ($d <= $a.end_date)}
                                        <li class ="a" onclick="isclick({$a|json_encode|escape})">{$a.description}</li>
                                {/if}
                            {/if}
                        {/foreach}
                </td>
            {/foreach}
        </tr>
    {/foreach}



</table>
