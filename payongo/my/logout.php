<script>
        document.addEventListener('contextmenu', event => event.preventDefault());
</script>
<?php
session_start();
session_destroy(); 
  header('Location: ../my');
?>
