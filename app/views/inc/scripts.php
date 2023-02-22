<script>
    var clientSession = <?= isset($_SESSION['client_session']) ? $_SESSION['client_session'] :  'false' ?>
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?= URLROOT ?>/public/js/jquery.js"></script>
<script src="<?= URLROOT ?>/public/js/index.js"></script>
<script src="<?= URLROOT ?>/public/js/flowbite.js"></script>
</body>

</html>