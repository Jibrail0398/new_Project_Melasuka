</div>
  <script src="../../../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../../assets/js/sidebarmenu.js"></script>
  <script src="../../../assets/js/app.min.js"></script>
  <script src="../../../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../../../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../../../assets/js/dashboard.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function hapus(kode_obat) {
        Swal.fire({
            title: 'Anda yakin ingin menghapus produk ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#1583ff',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batalkan',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "delete-obat.php?kode_obat=" + kode_obat;
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                return false;
            }
        });
    }
</script>
<script>
new DataTable('#example', {
    initComplete: function () {
        this.api()
            .columns()
            .every(function () {
                let column = this;
                let title = column.footer().textContent;
 
                // Create input element
                let input = document.createElement('input');
                input.placeholder = title;
                column.footer().replaceChildren(input);
 
                // Event listener for user input
                input.addEventListener('keyup', () => {
                    if (column.search() !== this.value) {
                        column.search(input.value).draw();
                    }
                });
            });
    }
});
</script>
</body>

</html>