<script src="../Public/Js/sweetalert.min.js"></script>
<script>
    function borrarRegistro(id) {
        swal({
                title: "¿Seguro?",
                text: "El registro sera irecuperable!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Poof! Se comvirtio en chocapick!", {
                        icon: "success",
                    });
                    location.href = "./eliminar.php?id=" + id;
                } else {
                    swal("Salvado!");
                }
            });
    }
    function borrarCargo(id) {
        swal({
                title: "¿Seguro?",
                text: "El registro sera irecuperable!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Poof! Se comvirtio en chocapick!", {
                        icon: "success",
                    });
                    location.href = "./eliminarcargo.php?id=" + id;
                } else {
                    swal("Salvado!");
                }
            });
    }
</script>
<script>
    $('.ui.dropdown').dropdown();
</script>
</body>

</html>