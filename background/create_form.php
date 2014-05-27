<!--
	-we have our html form here where user information will be entered
	-we used the 'required' html5 property to prevent empty fields
-->
<form id='addUserForm' action='#' method='post' border='0'>
    <table>
        <tr>
            <td>名稱</td>
            <td><input type='text' id='username' name='username' required /></td>
			<td id="message"><td>
        </tr>
            <td></td>
            <td>                
                <input type='submit' id='submit' value='Save' class='customBtn' />
            </td>
        </tr>
    </table>
</form>