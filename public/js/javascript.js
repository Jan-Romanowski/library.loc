
function filt(){
    var checkboxj = document.getElementById("checkBoxJ");
    var checkboxw = document.getElementById("checkBoxW");

    if (checkboxj.checked == true && checkboxw == true){
        document.location.href = "/songs/songsFilter-1";
    }
    else if(checkboxj.checked == true && checkboxw == false){
        document.location.href = "/songs/songsFilter-3";
    }
    else if(checkboxj.checked == false && checkboxw == true){
        document.location.href = "/songs/songsFilter-2";
    }
    else{
        document.location.href = "/songs/songsFilter-4";
    }
}