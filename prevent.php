<?php 

$input = "
<script>
    location.replace('<malicious website>');

</script>
";

echo htmlspecialchars($input)