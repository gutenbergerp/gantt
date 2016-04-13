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

        {foreach $activities as $a}

            <tr>

                {foreach $resources as $r}

                    {if $r.id == $a.id_resource}

                        <td width="100px" align="center">{$r.label}</td>

                    {/if}

                {/foreach}


                {foreach $days as $d}
                    {if ($d >= $a.start_date) && ($d <= $a.end_date)}

                        <td align = "center" bgcolor="#ff8c00" onclick="isclick({$a|json_encode|escape})">{$a.description}</td>

                    {else}
                        <td></td>
                    {/if}
                {/foreach}

            </tr>
	
        {/foreach}
    </table>

<!--
<table border="1">

    <tr>
        <td width="100px" align="center"><b>Gantt</b></td>

        {foreach $days as $d}
            <td width="100px" align="center">{$d}</td>
        {/foreach}

    </tr>

    {foreach $resources as $r}

        <tr>

            <td width="100px" align="center">{$r.label}</td>

            {foreach $activities as $a}

                {if $a.id_resource == $r.id}

                    {foreach $days as $d}
                        {if ($d >= $a.start_date) && ($d <= $a.end_date)}
                            <td align = "center" bgcolor="#ff8c00" onclick="isclick({$a|json_encode|escape})">{$a.description}</td>
                        {else}
                            <td></td>
                        {/if}
                    {/foreach}

                {/if}



            {/foreach}

        </tr>

    {/foreach}

</table>-->