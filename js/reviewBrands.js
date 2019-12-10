function change($category) {
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
        document.getElementById("detailedStars1").innerHTML = '<p>Funkcjonalność:</p>';
        document.getElementById("detailedStars2").innerHTML = '<p>Bateria:</p>';
        document.getElementById("detailedStars3").innerHTML = '<p>Zdjęcia:</p>';
        document.getElementById("detailedStars4").innerHTML = '<p>Wyświetlacz:</p>';
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
        document.getElementById("detailedStars1").innerHTML = '<p>Wydajność:</p>';
        document.getElementById("detailedStars2").innerHTML = '<p>Wykonanie:</p>';
        document.getElementById("detailedStars3").innerHTML = '<p>Wyświetlacz:</p>';
        document.getElementById("detailedStars4").innerHTML = '<p>Funkcjonalność:</p>';
    }
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
        document.getElementById("detailedStars3").innerHTML = '<p>Funkcjonalność:</p>';
        document.getElementById("detailedStars4").innerHTML = '<p>Wygląd:</p>';
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
        document.getElementById("detailedStars1").innerHTML = '<p>Wydajność:</p>';
        document.getElementById("detailedStars2").innerHTML = '<p>Wykonanie:</p>';
        document.getElementById("detailedStars3").innerHTML = '<p>Kultura pracy:</p>';
        document.getElementById("detailedStars4").innerHTML = '<p>Wygląd:</p>';
    }
    if ($category === "Aparaty i kamery") {
        document.getElementById("brand").innerHTML = '<p>Marka:</p>'
                + '<select name="brand" class="textLeft">'
                + '<option>Canon</option>'
                + '<option>Nicon</option>'
                + '<option>Sony</option>'
                + '</select><br>';
        document.getElementById("detailedStars1").innerHTML = '<p>Jakość zdjęć:</p>';
        document.getElementById("detailedStars2").innerHTML = '<p>Funkcjonalność:</p>';
        document.getElementById("detailedStars3").innerHTML = '<p>Wygląd:</p>';
        document.getElementById("detailedStars4").innerHTML = '<p>Bateria:</p>';
    }

}