<form action="/download" method="POST">
    <input type="text" name= "file" placeholder="File Name"  class="form-control-sm" value="users">
    <select name="extension" id="extension" class="form-select-sm">
        <option value="csv">CSV</option>
        <option value="json">JSON</option>
        <option value="xml">XML</option>
    </select>
    <button type="submit" class="btn btn-warning"> DownLoad </button>
</form>