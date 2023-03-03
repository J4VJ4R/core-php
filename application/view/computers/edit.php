<div class="container">
    <h2>You are in the View: application/view/computers/edit.php (everything in this box comes from that file)</h2>
    <!-- add computer form -->
    <div>
        <h3>Edit a computer</h3>
        <form action="<?php echo URL; ?>computers/updatecomputer" method="POST">
            <label>Brand</label>
            <input autofocus type="text" name="brand" value="<?php echo htmlspecialchars($computer->brand, ENT_QUOTES, 'UTF-8'); ?>" required />
            <label>Description</label>
            <input type="text" name="description" value="<?php echo htmlspecialchars($computer->description, ENT_QUOTES, 'UTF-8'); ?>" required />
            <label>Link</label>
            <input type="text" name="link" value="<?php echo htmlspecialchars($computer->link, ENT_QUOTES, 'UTF-8'); ?>" />
            <input type="hidden" name="computer_id" value="<?php echo htmlspecialchars($computer->id, ENT_QUOTES, 'UTF-8'); ?>" />
            <input type="submit" name="submit_update_computer" value="Update" />
        </form>
    </div>
</div>

