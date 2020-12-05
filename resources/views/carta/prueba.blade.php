<!DOCTYPE html>
<html>

<body>
    <div class="mail">
        <h2>Input Credit Card No.[Starting with 4 length 13 or 16 digits (Visa) and Submit</h2>
        <form name="form1" action="#">
            <ul>
                <li><input type='text' name='text1' /></li>
                <li>&nbsp;</li>
                <li class="submit"><input type="submit" name="submit" value="Submit" onclick="cardnumber(document.form1.text1)" /></li>
                <li>&nbsp;</li>
            </ul>
        </form>
    </div>
    <script src="{{ asset('../../../../../public/js/validar_card.js"></script>

</body>

</html>