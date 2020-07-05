<?=form_open_multipart('admin/tes')?>
    <input type="file" name="file[]" multiple>
    <input type="text" name="nama">
    <button type="submit">Simpan</button>
<?=form_close()?>