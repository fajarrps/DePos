function fileValidation(num)
{
    var fl = 'file'+num
    var fileInput = document.getElementById(fl);
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
    if(!allowedExtensions.exec(filePath))
    {
        alert('Format yang diperbolehkan .jpeg/.jpg/.png only.');
        fileInput.value = '';
        return false;
    }
}

function fileValidationPdf(num)
{
    var fl = 'lampiran'+num
    var fileInput = document.getElementById(fl);
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.pdf)$/i;
    if(!allowedExtensions.exec(filePath))
    {
        alert('Format yang diperbolehkan .pdf/.jpeg/.jpg/.png only.');
        fileInput.value = '';
        return false;
    }
}

function readURL(input, id) 
{
  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {

        if (id == 'file0') 
        {
          $('#foto0')
              .attr('src', e.target.result)
              .height(100);
              
        }
        if (id == 'file1') 
        {
          $('#foto1')
              .attr('src', e.target.result)
              .height(100);
        }
        if (id == 'file2') 
        {
          $('#foto2')
              .attr('src', e.target.result)
              .height(100);
        }
        if (id == 'file3') 
        {
          $('#foto3')
              .attr('src', e.target.result)
              .height(100);
        }
        if (id == 'file4') 
        {
          $('#foto4')
              .attr('src', e.target.result)
              .height(100);
        }
        if (id == 'file5') 
        {
          $('#foto5')
              .attr('src', e.target.result)
              .height(100);
        }
      };
      reader.readAsDataURL(input.files[0]);
    }
}

$(document).ready(function() {
  de();

  $("#fileU").on("change", function() {

    if ($("#fileU").val() != "") {
      $("input[type=button]").attr("style", "display:block");
    } else {
      de();
    }
  });
  $("input[type=button]").click(function() {
    $("#fileU").val('');
    de();
  })

})

function de() {
  $("input[type=button]").attr("style", "display:none");
}