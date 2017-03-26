<?php session_start();?>
<html>
    <head></head>
    <body>
        <?php
        function test_input($data)
            {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
            }
        
        $regexp="";
        $input="";
        $validity="";
        if(isset($_POST["apply"]))
            {
            $_SESSION["regexp"] = $_POST["regexp"];
            $regexp = $_SESSION["regexp"];
            $input = $_POST["input"];
            }
        
        elseif(isset($_POST["submit"]))
            {
            $input = ucwords(strtolower($_POST["input"]));
            
            if(isset($_SESSION["regexp"]))
                {
                $regexp = $_SESSION["regexp"];
                if(preg_match($regexp,$input))
                    {
                    $validity="VALID";
                    }
                else
                    {
                    $validity="INVALID";
                    }
                }
            }
        
        elseif(isset($_POST["test"]))
            {
            $input = test_input($_POST["input"]);
            $regexp = $_SESSION["regexp"];
            }
        ?>
        <form method="POST" action="regexp.php">
            <table border=1 style="font-size:16pt">
                <tr>
                    <td>
                        <input type="text" name="input" size="60"
                        value="<?php echo $input;?>">
                    </td>
                    <td>
                        <input type="text" name="regexp" size="45"
                        value="<?php echo $regexp;?>">
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <button name="submit">SUBMIT</button>
                    </td>
                    <td align="right">
                        <button name="apply">APPLY</button>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <button name="test">TEST INPUT</button>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <?php echo $input;?>
                    </td>
                    <td>
                        <?php echo $regexp;?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $validity;?>
                    </td>
                    <td></td>
                </tr>
            </table>
        </form>
    </body>
</html>