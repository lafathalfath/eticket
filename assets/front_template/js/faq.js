  // On Enter Form Search FAQ
  var input = document.getElementById("faqsearch");
  input.addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
      // $('#faqsearch').val();
      // $('#faqformsearch').serialize();
      // alert("Success");
      $.ajax({
        url: "<?= base_url('home/faq/faqresult'); ?>",
        data: $('#faqformsearch').serialize(),
        type: 'POST',
        dataType: 'JSON',
        success: function(data) {
          
        }
      });
      event.preventDefault();
    }
  });