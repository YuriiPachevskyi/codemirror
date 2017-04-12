<?php

//initially
$comment = null;

//if the form is submitted
if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['preview-form-comment'])) {
    $comment = $_POST['preview-form-comment'];
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>CodeMirror - Form</title>
        <link rel="stylesheet" href="plugin/codemirror/lib/codemirror.css">
        <script src="plugin/codemirror/lib/codemirror.js"></script>
        <script src="plugin/codemirror/mode/clike/clike.js"></script>
    </head>
    <body>
        <form id="preview-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <textarea class="codemirror-textarea" name="preview-form-comment" id="preview-form-comment"><?php echo $comment; ?></textarea>
            <br>
            <input type="submit" name="preview-form-submit" id="preview-form-submit" value="Submit">

        </form>
        <div id="preview-comment"><?php echo $comment; ?></div>

        <script>
            var cEditor = CodeMirror.fromTextArea(document.getElementById("preview-form-comment"), {
                lineNumbers: true,
                matchBrackets: true,
                mode: "text/x-csrc"
            });
        </script>
        <script type="text/javascript" src="js/default.js"></script>
    </body>
</html>