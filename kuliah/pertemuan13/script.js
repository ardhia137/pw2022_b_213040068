function previewimage(){
    const gambar = document.querySelector('#gambar');
    const img_preview = document.querySelector('#img-preview');
    img_preview.style.display = 'block';
    var ofReader = new FileReader();
    ofReader.readAsDataURL(gambar.files[0]);

    ofReader.onload = function (oFREvent){
        img_preview.src = oFREvent.target.result;
    }
}