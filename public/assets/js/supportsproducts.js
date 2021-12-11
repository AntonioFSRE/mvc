document.getElementById("photoName").addEventListener("change", validateFile)

function validateFile(){
    const allowedExtensions =  ['jpg','png','jpeg'],
        sizeLimit = 5000000;

    const { name:file, size:fileSize } = this.files[0];

    const fileExtension = file.split(".").pop();

    if(!allowedExtensions.includes(fileExtension)){
        alert("Please upload only photo files!");
        this.value = null;
    }else if(fileSize > sizeLimit){
        alert("File size too large!")
        this.value = null;
    }
}