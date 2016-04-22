<form name='get_date_range'  method='post'>

    <table  cellpadding="2" cellspacing="0">

        <tr class='header'>
            <td colspan = "8"><strong>INSERT DATE RANGE (ISO STANDARD AAAA-MM-DD HH:MM:SS)</strong></td>
        </tr>

        <tr>

            <td>From</td>
            <td>
                <input type="text" name="from" value = '{$fields.from}'/>
            </td>

            <td>To</td>
            <td>
                <input type='text' name='to' value = '{$fields.to}' />
            </td>

            <td>Duration</td>
            <td>
                <input name='duration' type='text' size = '5' value = '{$fields.duration}'/>
            </td>

            <td>Select interval</td>
            <td>
                <select name="interval">
                    <option value="M" {if ($fields.interval)== 'M'}selected{/if}>Minutes</option>
                    <option value="H" {if ($fields.interval)== 'H'}selected{/if}>Hours</option>
                    <option value="D" {if ($fields.interval)== 'D'}selected{/if}>Days</option>
                    <option value="W" {if ($fields.interval)== 'W'}selected{/if}>Weeks</option>
                </select>
            </td>

        </tr>
    </table>

    <br/>

    <input type="submit" value="Submit">
</form>
