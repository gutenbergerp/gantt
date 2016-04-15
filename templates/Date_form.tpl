<form name='get_date_range' action='index.php' method='post'>

    <table  cellpadding="2" cellspacing="0">

        <tr class='header'>
            <td colspan="2"><strong>INSERT DATE RANGE</strong></td>
        </tr>

        <tr>

            <td>From</td>
            <td>
                <input type="text" name="from"/>
            </td>

            <td>To</td>
            <td>
                <input name='to' type='text'/>
            </td>

            <td>Duration</td>
            <td>
                <input name='duration' type='text' size = '5'/>
            </td>

            <td>Select interval</td>
            <td>
                <select name="interval">
                    <option value="D">Days</option>
                    <option value="H">Hours</option>
                    <option value="W">Weeks</option>
                </select>
            </td>

        </tr>
    </table>

    <br/>

    <input type="submit" value="Submit">
</form>