<?php

?>
<h1>Adicione um novo Livro</h1>

<form enctype="multipart/form-data"
        method="post">
    <div>
        <h2>Add a New Book</h2>
        <label for="name" >book Name</label>
        <input name="name"
               required
               placeholder="Percy jackson e algo assim"
               id="name" >
    </div>
    <div>
        <label for="image_path" >Image</label>
        <input name="image_path"
               type="file"
               accept="image/*"
               id="image_path">
    </div>
    <input type="submit" value="Enviar">
</form>
