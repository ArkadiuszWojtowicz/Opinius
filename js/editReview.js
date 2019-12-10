
function editReview($IdComment) {
        document.getElementById('editReview').innerHTML = '<p>Edytuj swoją opinię:</p><form action ="scripts/editReview.php" method="post"><textarea autofocus rows="8" style="margin-top:10px;background-color:#efefef;" name="editReview" class="textLeft" required></textarea>\n\
                                                   <br><button type="submit" value="'+$IdComment+'" name="edit" class="edit">Zatwierdź</button></form>';
}
