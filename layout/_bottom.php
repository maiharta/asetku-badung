</div>
<footer class="main-footer">
  <div class="footer-left">
    Copyright &copy; Maiharta 2024</a>
  </div>
  <div class="footer-right">

  </div>
</footer>
</div>
</div>

<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<script>
  $(document).ready(function() {
    $("#search").keyup(function() {
      var query = $(this).val();
      if (query != "") {
        $.ajax({
          url: 'search.php',
          method: 'POST',
          data: {
            query: query
          },
          success: function(data) {
            var suggestions = JSON.parse(data);
            var suggestionBox = $('#suggestion-box');
            suggestionBox.html('');
            suggestions.forEach(function(item) {
              suggestionBox.append('<div class="suggestion">' + item + '</div>');
            });
          }
        });
      } else {
        $('#suggestion-box').html('');
      }
    });

    $(document).on('click', '.suggestion', function() {
      var value = $(this).text();
      $('#search').val(value);
      $('#suggestion-box').html('');
    });
  });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $('select[name="tipeAset"]').change(function() {
      var selectedTipe = $(this).val();
      if (selectedTipe.toLowerCase() === 'mobil (kendaraan)' || selectedTipe.toLowerCase() === 'motor (kendaraan)' || selectedTipe.toLowerCase() === 'truck (kendaraan)') {
        $('input[name="samsat"]').prop('disabled', false);
        $('tr[name="samsat"]').prop('hidden', false);
      } else {
        $('input[name="samsat"]').prop('disabled', true);
        $('tr[name="samsat"]').prop('hidden', true);
      }
    });
  });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="../assets/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="../assets/modules/jquery.sparkline.min.js"></script>
<script src="../assets/modules/Chart.min.js"></script>
<script src="../assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
<script src="../assets/modules/summernote/summernote-bs4.js"></script>
<script src="../assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
<script src="../assets/modules/datatables/datatables.min.js"></script>
<script src="../assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
<script src="../assets/modules/jquery-ui/jquery-ui.min.js"></script>
<script src="../assets/modules/izitoast/js/iziToast.min.js"></script>

<!-- Template JS File -->
<script src="../assets/js/scripts.js"></script>
<script src="../assets/js/custom.js"></script>

<!-- Page Specific JS File -->
<script src="../assets/js/page/index.js"></script>
</body>

</html>