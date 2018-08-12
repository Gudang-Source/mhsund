$(document).ready(function(){
    $("#ktknik").click(function(){
        $("#innik").html('<input type="text" name="nik" class="form-control form-control-sm w-100" placeholder="Masukan NIK anda">');
        $("#ktknik").html('<a id="ktknik" class="float-right text-success">Simpan</a>');
    });
});