function slideSwitch() {
    var $active = $('#slideshow IMG.active');
    if ($active.length === 0)
        $active = $('#slideshow IMG:last');
    var $next = $active.next().length ? $active.next()
            : $('#slideshow IMG:first');
    $active.addClass('last-active');

    $next.css({opacity: 0.0})
            .addClass('active')
            .animate({opacity: 1.0}, 1000, function () {
                $active.removeClass('active last-active');
            });
}
$(function () {
    setInterval("slideSwitch()", 5000);
});

function showStar1() {
    $('.s1').fadeIn(1000);
}
function showStar2() {
    $('.s2').fadeIn(2000);
}
function showStar3() {
    $('.s3').fadeIn(3000);
}
function showStar4() {
    $('.s4').fadeIn(4000);
}
function showStar5() {
    $('.s5').fadeIn(5000);
}

$(function () {
    setTimeout(function () {
        $('.icon-star-filled-slide').fadeOut(1000);
    }, 1000);
    setInterval("showStar1()", 1000);
    setInterval("showStar2()", 1000);
    setInterval("showStar3()", 1000);
    setInterval("showStar4()", 1000);
    setInterval("showStar5()", 1000);
//    setInterval("setTimeout(function(){ $('.icon-star-filled-slide').fadeOut(1000); }, 1000)", 6000);
    setInterval("$('.icon-star-filled-slide').fadeOut(1000)", 7000);
});
//    include_once "scripts/class/database.php";
//
//function removeOpinion($x, $y){
//    $db = new Database("localhost", "root", "", "opinius");
//    $db->DELETE("DELETE FROM items WHERE (`id-item` = '$x')");
//}



function changeColor1star() {
    document.getElementById("stars").innerHTML = '<label><input type="radio" style="display:none" value="5" name="button" onclick="changeColor5star()"><i class="icon-star-filled" name="button"></i></label>'
            + ' <label><input type="radio" style="display:none" value="4" name="button" onclick="changeColor4star()"><i class="icon-star-filled" name="button"></i></label>'
            + ' <label><input type="radio" style="display:none" value="3" name="button" onclick="changeColor3star()"><i class="icon-star-filled" name="button"></i></label>'
            + ' <label><input type="radio" style="display:none" value="2" name="button" onclick="changeColor2star()"><i class="icon-star-filled" name="button"></i></label>'
            + ' <label><input type="radio" style="display:none" value="1" name="button" checked="checked" onclick="changeColor1star()"><i class="icon-star-filled" style="color:yellow" name="button"></i></label>';
}
function changeColor2star() {
    document.getElementById("stars").innerHTML = '<label><input type="radio" style="display:none" value="5" name="button" onclick="changeColor5star()"><i class="icon-star-filled" name="button"></i></label>'
            + ' <label><input type="radio" style="display:none" value="4" name="button" onclick="changeColor4star()"><i class="icon-star-filled" name="button"></i></label>'
            + ' <label><input type="radio" style="display:none" value="3" name="button" onclick="changeColor3star()"><i class="icon-star-filled" name="button"></i></label>'
            + ' <label><input type="radio" style="display:none" value="2" name="button" checked="checked" onclick="changeColor2star()"><i class="icon-star-filled" style="color:yellow;" name="button"></i></label>'
            + ' <label><input type="radio" style="display:none" value="1" name="button" onclick="changeColor1star()"><i class="icon-star-filled" style="color:yellow;" name="button"></i></label>';
}
function changeColor3star() {
    document.getElementById("stars").innerHTML = '<label><input type="radio" style="display:none" value="5" name="button" onclick="changeColor5star()"><i class="icon-star-filled" name="button"></i></label>'
            + ' <label><input type="radio" style="display:none" value="4" name="button" onclick="changeColor4star()"><i class="icon-star-filled" name="button"></i></label>'
            + ' <label><input type="radio" style="display:none" value="3" name="button" checked="checked" onclick="changeColor3star()"><i class="icon-star-filled" style="color:yellow;" name="button"></i></label>'
            + ' <label><input type="radio" style="display:none" value="2" name="button" onclick="changeColor2star()"><i class="icon-star-filled" style="color:yellow;" name="button"></i></label>'
            + ' <label><input type="radio" style="display:none" value="1" name="button" onclick="changeColor1star()"><i class="icon-star-filled" style="color:yellow;" name="button"></i></label>';
}
function changeColor4star() {
    document.getElementById("stars").innerHTML = '<label><input type="radio" style="display:none" value="5" name="button" onclick="changeColor5star()"><i class="icon-star-filled" name="button"></i></label>'
            + ' <label><input type="radio" style="display:none" value="4" name="button" checked="checked" onclick="changeColor4star()"><i class="icon-star-filled" style="color:yellow;" name="button"></i></label>'
            + ' <label><input type="radio" style="display:none" value="3" name="button" onclick="changeColor3star()"><i class="icon-star-filled" style="color:yellow;" name="button"></i></label>'
            + ' <label><input type="radio" style="display:none" value="2" name="button" onclick="changeColor2star()"><i class="icon-star-filled" style="color:yellow;" name="button"></i></label>'
            + ' <label><input type="radio" style="display:none" value="1" name="button" onclick="changeColor1star()"><i class="icon-star-filled" style="color:yellow;" name="button"></i></label>';
}
function changeColor5star() {
    document.getElementById("stars").innerHTML = '<label><input type="radio" style="display:none" value="5" name="button" checked="checked" onclick="changeColor5star()"><i class="icon-star-filled" style="color:yellow;" name="button"></i></label>'
            + ' <label><input type="radio" style="display:none" value="4" name="button" onclick="changeColor4star()"><i class="icon-star-filled" style="color:yellow;" name="button"></i></label>'
            + ' <label><input type="radio" style="display:none" value="3" name="button" onclick="changeColor3star()"><i class="icon-star-filled" style="color:yellow;" name="button"></i></label>'
            + ' <label><input type="radio" style="display:none" value="2" name="button" onclick="changeColor2star()"><i class="icon-star-filled" style="color:yellow;" name="button"></i></label>'
            + ' <label><input type="radio" style="display:none" value="1" name="button" onclick="changeColor1star()"><i class="icon-star-filled" style="color:yellow;" name="button"></i></label>';
}

function change($number) {
    if ($number === "Telewizory") {
        document.getElementById("brand").innerHTML = '<p>Marka:</p>'
                + '<select name="brand" class="textLeft">'
                + '<option>Samsung</option>'
                + '<option>LG</option>'
                + '<option>Panasonic</option>'
                + '<option>Toshiba</option>'
                + '<option>Thomson</option>'
                + '<option>Philips</option>'
                + '<option>Manta</option> '
                + '</select><br>';
    }
    if ($number === "Komputery i laptopy") {
        document.getElementById("brand").innerHTML = '<p>Marka:</p>'
                + '<select name="brand" class="textLeft">'
                + '<option>Lenovo</option>'
                + '<option>HP</option>'
                + '<option>MSI</option>'
                + '<option>Acer</option>'
                + '<option>Asus</option>'
                + '<option>Dell</option> '
                + '<option>Apple</option> '
                + '</select><br>';
    }
    if ($number === "Telefony i smartfony") {
        document.getElementById("brand").innerHTML = '<p>Marka:</p>'
                + '<select name="brand" class="textLeft">'
                + '<option>Xiaomi</option>'
                + '<option>LG</option>'
                + '<option>Apple</option>'
                + '<option>Samsung</option>'
                + '<option>Huawei</option>'
                + '<option>Nokia</option> '
                + '</select><br>';
    }
    if ($number === "Urządzenia peryferyjne") {
        document.getElementById("brand").innerHTML = '<p>Marka:</p>'
                + '<select name="brand" class="textLeft">'
                + '<option>Canon</option>'
                + '<option>Logitech</option>'
                + '<option>Rival</option>'
                + '<option>Media-Tech</option>'
                + '<option>Philips</option>'
                + '<option>DeskJet</option> '
                + '</select><br>';
    }
    if ($number === "Podzespoły") {
        document.getElementById("brand").innerHTML = '<p>Marka:</p>'
                + '<select name="brand" class="textLeft">'
                + '<option>Intel</option>'
                + '<option>AMD</option>'
                + '<option>MSI</option>'
                + '<option>GeForce</option>'
                + '<option>GTX</option>'
                + '</select><br>';
    }
    if ($number === "Aparaty i kamery") {
        document.getElementById("brand").innerHTML = '<p>Marka:</p>'
                + '<select name="brand" class="textLeft">'
                + '<option>Canon</option>'
                + '<option>Nicon</option>'
                + '<option>Sony</option>'
                + '</select><br>';
    }

}
