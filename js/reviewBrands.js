function change($category) {
    if ($category === "Telewizory") {
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
        document.getElementById("detailedStars1").innerHTML = '<p>Obraz:</p>';
        document.getElementById("detailedStars2").innerHTML = '<p>Dźwięk:</p>';
        document.getElementById("detailedStars3").innerHTML = '<p>Funkcje dodatkowe:</p>';
        document.getElementById("detailedStars4").innerHTML = '<p>Wygląd:</p>';
    }
    if ($category === "Komputery i laptopy") {
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
        document.getElementById("detailedStars1").innerHTML = '<p>Prędkość:</p>';
        document.getElementById("detailedStars2").innerHTML = '<p>Dźwięk:</p>';
        document.getElementById("detailedStars3").innerHTML = '<p>Podzespoły:</p>';
        document.getElementById("detailedStars4").innerHTML = '<p>Klawiatura i obudowa:</p>';
    }
    if ($category === "Telefony i smartfony") {
        document.getElementById("brand").innerHTML = '<p>Marka:</p>'
                + '<select name="brand" class="textLeft">'
                + '<option>Xiaomi</option>'
                + '<option>LG</option>'
                + '<option>Apple</option>'
                + '<option>Samsung</option>'
                + '<option>Huawei</option>'
                + '<option>Nokia</option> '
                + '</select><br>';
        document.getElementById("detailedStars1").innerHTML = '<p>Aparat:</p>';
        document.getElementById("detailedStars2").innerHTML = '<p>Bateria:</p>';
        document.getElementById("detailedStars3").innerHTML = '<p>Funkcje telefonu:</p>';
        document.getElementById("detailedStars4").innerHTML = '<p>Wygląd:</p>';
    }
    if ($category === "Urządzenia peryferyjne") {
        document.getElementById("brand").innerHTML = '<p>Marka:</p>'
                + '<select name="brand" class="textLeft">'
                + '<option>Canon</option>'
                + '<option>Logitech</option>'
                + '<option>Rival</option>'
                + '<option>Media-Tech</option>'
                + '<option>Philips</option>'
                + '<option>DeskJet</option> '
                + '</select><br>';
        document.getElementById("detailedStars1").innerHTML = '<p>-:</p>';
        document.getElementById("detailedStars2").innerHTML = '<p>-:</p>';
        document.getElementById("detailedStars3").innerHTML = '<p>-:</p>';
        document.getElementById("detailedStars4").innerHTML = '<p>usunąć?:</p>';
    }
    if ($category === "Podzespoły") {
        document.getElementById("brand").innerHTML = '<p>Marka:</p>'
                + '<select name="brand" class="textLeft">'
                + '<option>Intel</option>'
                + '<option>AMD</option>'
                + '<option>MSI</option>'
                + '<option>GeForce</option>'
                + '<option>GTX</option>'
                + '</select><br>';
        document.getElementById("detailedStars1").innerHTML = '<p>Prędkość:</p>';
        document.getElementById("detailedStars2").innerHTML = '<p>Temperatura:</p>';
        document.getElementById("detailedStars3").innerHTML = '<p>Kompatybilność:</p>';
        document.getElementById("detailedStars4").innerHTML = '<p>Dodatkowe technologie:</p>';
    }
    if ($category === "Aparaty i kamery") {
        document.getElementById("brand").innerHTML = '<p>Marka:</p>'
                + '<select name="brand" class="textLeft">'
                + '<option>Canon</option>'
                + '<option>Nicon</option>'
                + '<option>Sony</option>'
                + '</select><br>';
        document.getElementById("detailedStars1").innerHTML = '<p>Rozdzielczość:</p>';
        document.getElementById("detailedStars2").innerHTML = '<p>Kontrola ekspozycji:</p>';
        document.getElementById("detailedStars3").innerHTML = '<p>Przybliżenie optyczne:</p>';
        document.getElementById("detailedStars4").innerHTML = '<p>Matryca:</p>';
    }

}